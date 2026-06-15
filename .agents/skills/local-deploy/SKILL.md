---
name: local-deploy
description: この WordPress テーマテンプレートをローカルマシンから rsync で安全にデプロイするための手順。dev/prod の dry-run、差分確認、本番確認、トラブルシュートを行うときに使う。
---

# ローカルデプロイ

1. `docs/deploy.md` を読み、`.env` に対象サーバーとパスが設定されているか確認する。
2. デプロイ前に必ず `npm run build` を実行する。
3. `npm run deploy:dry -- dev` または `npm run deploy:dry -- prod` を実行し、rsync の差分を確認する。
4. dev へ反映するときは `npm run deploy:dev` を使う。
5. prod へ反映するときは dry-run 確認後、確認プロンプトまたは `CONFIRM_PROD=1` を使う。
6. この手順に `git push`、リモート `git pull`、DB 操作、`wp search-replace` を混ぜない。
