#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PID_FILE="$ROOT_DIR/.local/vite.pid"
VITE_CONFIG_FILE="$ROOT_DIR/theme/localhost.json"
URLS_FILE="$ROOT_DIR/.local/urls.json"
PROJECT_NAME="$(basename "$ROOT_DIR" | tr -c '[:alnum:]_-' '-')"
VITE_SESSION_NAME="${PROJECT_NAME}-vite"

cd "$ROOT_DIR"

if [ -f "$PID_FILE" ]; then
  VITE_PID="$(cat "$PID_FILE")"
  if [[ "$VITE_PID" == screen:* ]]; then
    VITE_SESSION="${VITE_PID#screen:}"
    if command -v screen >/dev/null 2>&1; then
      echo "Stopping Vite dev server. session=$VITE_SESSION"
      screen -S "$VITE_SESSION" -X quit >/dev/null 2>&1 || true
    fi
  elif kill -0 "$VITE_PID" 2>/dev/null; then
    echo "Stopping Vite dev server. pid=$VITE_PID"
    kill "$VITE_PID"
  fi
  rm -f "$PID_FILE"
fi

if command -v screen >/dev/null 2>&1; then
  screen -S "$VITE_SESSION_NAME" -X quit >/dev/null 2>&1 || true
fi

rm -f "$VITE_CONFIG_FILE" "$URLS_FILE"

if ! npm run wp:stop; then
  echo "wp-env stop failed. Docker may not be running."
fi
