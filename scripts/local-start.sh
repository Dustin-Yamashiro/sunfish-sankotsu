#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PID_FILE="$ROOT_DIR/.local/vite.pid"
LOG_FILE="$ROOT_DIR/vite.log"
URLS_FILE="$ROOT_DIR/.local/urls.json"
PROJECT_NAME="$(basename "$ROOT_DIR" | tr -c '[:alnum:]_-' '-')"
VITE_SESSION_NAME="${PROJECT_NAME}-vite"

detect_lan_ip() {
  local detected_ip=""

  if command -v ipconfig >/dev/null 2>&1; then
    for interface in en0 en1; do
      detected_ip="$(ipconfig getifaddr "$interface" 2>/dev/null || true)"
      if [ -n "$detected_ip" ]; then
        printf '%s\n' "$detected_ip"
        return 0
      fi
    done
  fi

  if command -v hostname >/dev/null 2>&1; then
    detected_ip="$(hostname -I 2>/dev/null | awk '{ print $1 }' || true)"
    if [ -n "$detected_ip" ]; then
      printf '%s\n' "$detected_ip"
      return 0
    fi
  fi

  if command -v ifconfig >/dev/null 2>&1; then
    detected_ip="$(
      ifconfig 2>/dev/null | awk '
        /^[[:alnum:]]/ {
          if (ip && active) {
            printed = 1;
            print ip;
            exit;
          }
          ip = "";
          active = 0;
        }
        /inet / && $2 !~ /^127\./ {
          ip = $2;
        }
        /status: active/ {
          active = 1;
        }
        END {
          if (!printed && ip && active) {
            print ip;
          }
        }
      '
    )"
    if [ -n "$detected_ip" ]; then
      printf '%s\n' "$detected_ip"
      return 0
    fi
  fi

  return 1
}

screen_session_running() {
  command -v screen >/dev/null 2>&1 && screen -list | grep -q "[.]$VITE_SESSION_NAME[[:space:]]"
}

vite_port_pid() {
  if ! command -v lsof >/dev/null 2>&1; then
    return 1
  fi

  lsof -tiTCP:5173 -sTCP:LISTEN 2>/dev/null | head -n 1
}

cd "$ROOT_DIR"
mkdir -p "$ROOT_DIR/.local"

if [ -f ".env" ]; then
  set -a
  # shellcheck source=/dev/null
  source ".env"
  set +a
fi

WP_PORT="${WP_ENV_PORT:-8888}"
LAN_IP="${LOCAL_NETWORK_IP:-}"

if [ -z "$LAN_IP" ]; then
  LAN_IP="$(detect_lan_ip || true)"
fi

if [ -n "$LAN_IP" ]; then
  DEFAULT_VITE_URL="http://$LAN_IP:5173/"
  WP_NETWORK_URL="http://$LAN_IP:$WP_PORT"
else
  DEFAULT_VITE_URL="http://localhost:5173/"
  WP_NETWORK_URL=""
fi

VITE_URL="${VITE_DEV_SERVER_URL:-$DEFAULT_VITE_URL}"
WP_LOCALHOST_URL="http://localhost:$WP_PORT"

if screen_session_running; then
  echo "Vite is already running. session=$VITE_SESSION_NAME"
  printf 'screen:%s\n' "$VITE_SESSION_NAME" > "$PID_FILE"
elif [ -f "$PID_FILE" ] && [[ "$(cat "$PID_FILE")" != screen:* ]] && kill -0 "$(cat "$PID_FILE")" 2>/dev/null; then
  echo "Vite is already running. pid=$(cat "$PID_FILE")"
elif VITE_PORT_PID="$(vite_port_pid)" && [ -n "$VITE_PORT_PID" ]; then
  echo "Vite is already running. pid=$VITE_PORT_PID"
  echo "$VITE_PORT_PID" > "$PID_FILE"
else
  echo "Starting Vite dev server..."
  if command -v screen >/dev/null 2>&1; then
    screen -dmS "$VITE_SESSION_NAME" bash -lc "cd \"$ROOT_DIR\" && exec ./node_modules/.bin/vite --host 0.0.0.0 --port 5173 --strictPort > \"$LOG_FILE\" 2>&1"
    printf 'screen:%s\n' "$VITE_SESSION_NAME" > "$PID_FILE"
  else
    nohup ./node_modules/.bin/vite --host 0.0.0.0 --port 5173 --strictPort > "$LOG_FILE" 2>&1 &
    echo "$!" > "$PID_FILE"
    disown "$(cat "$PID_FILE")" 2>/dev/null || true
  fi
fi

printf '{ "url": "%s", "localhostUrl": "http://localhost:5173/", "networkUrl": "%s" }\n' "$VITE_URL" "$DEFAULT_VITE_URL" > "$ROOT_DIR/theme/localhost.json"
printf '{ "wordpressLocalhost": "%s", "wordpressNetwork": "%s", "vite": "%s" }\n' "$WP_LOCALHOST_URL" "$WP_NETWORK_URL" "$VITE_URL" > "$URLS_FILE"

echo "Starting wp-env..."
if ! npm run wp:start; then
  echo "wp-env start failed. Cleaning up local Vite state..."
  bash scripts/local-stop.sh || true
  exit 1
fi

echo "Ensuring WordPress environment type is local..."
./node_modules/.bin/wp-env run cli wp config set WP_ENVIRONMENT_TYPE local --type=constant --quiet

echo "WordPress localhost: $WP_LOCALHOST_URL"
if [ -n "$WP_NETWORK_URL" ]; then
  echo "WordPress network:   $WP_NETWORK_URL"
else
  echo "WordPress network:   LAN IP を自動検出できませんでした。LOCAL_NETWORK_IP を .env に設定してください。"
fi
echo "Vite: $VITE_URL"
