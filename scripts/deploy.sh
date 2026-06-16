#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
TARGET="${1:-}"
DRY_RUN="${DRY_RUN:-false}"

cd "$ROOT_DIR"
THEME_SOURCE_DIR="themes/swell_child"

if [ "$TARGET" != "dev" ] && [ "$TARGET" != "prod" ]; then
  echo "Usage: bash scripts/deploy.sh dev|prod"
  exit 1
fi

if [ -f ".env" ]; then
  set -a
  # shellcheck source=/dev/null
  source ".env"
  set +a
fi

if [ ! -d "$THEME_SOURCE_DIR/assets" ]; then
  echo "$THEME_SOURCE_DIR/assets がありません。先に npm run build を実行してください。"
  exit 1
fi

if [ "$TARGET" = "dev" ]; then
  SSH_HOST="${DEV_SSH_HOST:?DEV_SSH_HOST is required}"
  THEME_PATH="${DEV_THEME_PATH:?DEV_THEME_PATH is required}"
else
  SSH_HOST="${PRD_SSH_HOST:?PRD_SSH_HOST is required}"
  THEME_PATH="${PRD_THEME_PATH:?PRD_THEME_PATH is required}"
fi

if [ "$TARGET" = "prod" ] && [ "$DRY_RUN" != "true" ] && [ "${CONFIRM_PROD:-}" != "1" ]; then
  if [ ! -t 0 ]; then
    echo "Production deploy requires CONFIRM_PROD=1 in non-interactive mode."
    exit 1
  fi

  read -r -p "本番へデプロイします。続行するには 'deploy prod' と入力してください: " CONFIRMATION
  if [ "$CONFIRMATION" != "deploy prod" ]; then
    echo "キャンセルしました。"
    exit 1
  fi
fi

RSYNC_FLAGS=(-az --delete --itemize-changes --exclude="localhost.json" --exclude=".DS_Store")
if [ "$DRY_RUN" = "true" ]; then
  RSYNC_FLAGS+=(--dry-run)
fi

echo "Sync child theme to $TARGET..."
rsync "${RSYNC_FLAGS[@]}" "$THEME_SOURCE_DIR/" "$SSH_HOST:$THEME_PATH"

if [ "$DRY_RUN" = "true" ]; then
  echo "Dry-run completed."
else
  echo "Deploy completed."
fi
