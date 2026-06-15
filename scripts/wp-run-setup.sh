#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

WP_ENV_PATH="$(./node_modules/.bin/wp-env install-path | sed -n '/^\//{p;q;}')"
COMPOSE_FILE="$WP_ENV_PATH/docker-compose.yml"

if [ ! -f "$COMPOSE_FILE" ]; then
  echo "wp-env の docker-compose.yml が見つかりません。先に npm run wp:start を実行してください。"
  exit 1
fi

docker compose -f "$COMPOSE_FILE" exec -T \
  -w /var/www/html \
  --user "$(id -u):$(id -g)" \
  cli bash -s < scripts/wp-setup.sh
