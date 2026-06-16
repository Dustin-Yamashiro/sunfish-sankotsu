# 環境

## wp-env

`.wp-env.json` は WordPress 日本語版、SWELL親テーマ、SWELL子テーマを読み込みます。

- 標準ポート: `8888`
- 上書き: `WP_ENV_PORT`
- デバッグ: 有効

```bash
npm run wp:start
npm run wp:stop
npm run wp:destroy
npm run wp:setup
```

## ローカル起動

```bash
npm run local:start
```

`scripts/local-start.sh` はこのリポジトリ用の Vite PID を `.local/vite.pid` に保存し、`themes/swell_child/localhost.json` を作成します。LAN IP を検出できた場合は、スマホ確認用の WordPress URL と Vite URL も表示します。

```bash
npm run local:stop
```

`scripts/local-stop.sh` は PID ファイルに記録された Vite だけを停止します。他プロジェクトの Vite プロセスは停止しません。

## スマホ確認

スマホで確認する場合は、PC とスマホを同じ Wi-Fi に接続します。`npm run local:start` の出力にある `WordPress network` の URL をスマホで開きます。

LAN IP を自動検出できない場合:

```bash
LOCAL_NETWORK_IP=192.168.1.23
```

Vite の URL を固定したい場合:

```bash
VITE_DEV_SERVER_URL=http://192.168.1.23:5173/
```

## build

```bash
npm run build
```

処理順:

1. `themes/swell_child/assets` を削除。
2. Vite が JS/SCSS を `themes/swell_child/assets` に出力。
3. `scripts/build-assets.mjs` が画像、SVG、font、video を処理。

## 画像処理

- 元画像: `assets/images`
- 出力先: `themes/swell_child/assets/images`
- `jpg`, `jpeg`, `png`: WebP 変換
- `svg`: SVGO 最適化
- `webp`, `gif`, `avif`: コピー

PHP では元画像の拡張子で指定します。

```php
<img src="<?php echo esc_url( theme_image_url( 'hero.jpg' ) ); ?>" alt="">
```

開発中は Vite の `assets/images/hero.jpg`、本番では `themes/swell_child/assets/images/hero.webp` を読みます。
