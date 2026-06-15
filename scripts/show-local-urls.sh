#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

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

echo "WordPress localhost: http://localhost:$WP_PORT"
if [ -n "$LAN_IP" ]; then
  echo "WordPress network:   http://$LAN_IP:$WP_PORT"
else
  echo "WordPress network:   LAN IP を自動検出できませんでした。LOCAL_NETWORK_IP を .env に設定してください。"
fi
