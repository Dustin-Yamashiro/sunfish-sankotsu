# デプロイ

このテンプレートは GitHub Actions を使わず、ローカルで build して rsync します。rsync は高速で実用的ですが、`--delete` の影響が大きいため必ず dry-run を挟みます。

## 準備

`.env.example` をコピーして `.env` を作成します。

```bash
cp .env.example .env
```

設定項目:

- `DEV_SSH_HOST`
- `DEV_THEME_PATH`
- `PRD_SSH_HOST`
- `PRD_THEME_PATH`

## dry-run

```bash
npm run build
npm run deploy:dry -- dev
npm run deploy:dry -- prod
```

rsync の itemized changes を見て、削除や上書きが想定通りか確認します。

## 反映

```bash
npm run deploy:dev
npm run deploy:prod
```

本番は確認プロンプトで `deploy prod` と入力しない限り実行されません。非対話環境で実行する場合のみ次のようにします。

```bash
CONFIRM_PROD=1 npm run deploy:prod
```

## ルール

- deploy script に `git push` を混ぜない。
- deploy script に DB 操作を混ぜない。
- `theme/assets` がない場合は deploy しない。
- `--delete` は `scripts/deploy.sh` 内だけで扱う。
- dry-run で意図しない削除がある場合は本実行しない。
