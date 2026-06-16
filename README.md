# local-env

WordPress オリジナルテーマ制作のためのローカル環境テンプレートです。wp-env で WordPress を起動し、Vite で JS/SCSS を扱い、画像は build 時に WebP へ変換します。公開前はローカルで build し、rsync の dry-run を確認してから反映します。

このリポジトリは Codex と Claude Code を使った制作を前提にしています。Copilot と Cursor 用の設定は入れていません。

## できること

- Docker Desktop + wp-env で WordPress 日本語版のローカル環境を起動する。
- PC では `localhost`、同じ Wi-Fi のスマホでは LAN IP でサイトを確認する。
- Vite で `assets/js/main.js` と `assets/scss/style.scss` を build する。
- `assets/images` の `jpg`, `jpeg`, `png` を `themes/swell_child/assets/images` に WebP 出力する。
- SVG は最適化し、WebP/GIF/AVIF/font/video は必要に応じてコピーする。
- `themes/swell_child/functions.php` を薄く保ち、テーマ処理を `themes/swell_child/inc` に分割する。
- FLOCSS/BEM の SCSS 構成を標準化する。
- GSAP、ScrollTrigger、Splide を使う案件向けに、アニメーション設計ルールとAI用skillを用意する。
- rsync の dry-run を必須に近い運用にして、dev/prod へ安全にデプロイする。
- Codex / Claude Code が迷わないように、制作ルール、デザイン入力、作業手順を Markdown に集約する。

## 必要なもの

- Node.js `>=22.12`
- npm `>=10`
- Docker Desktop
- PHP CLI
- rsync
- ssh

## 最初のセットアップ

初回は依存関係のインストール、wp-env 起動、WordPress 初期設定をまとめて実行します。

```bash
npm run setup
```

実行内容:

1. `npm ci` でルート依存を入れる。
2. `npm run wp:start` で wp-env を起動する。
3. `npm run wp:setup` でテーマ有効化、初期投稿削除、パーマリンク設定などを行う。
4. localhost と LAN IP の WordPress URL を表示する。

ログイン情報:

- ユーザー名: `test`
- パスワード: `test`

## 通常のローカル起動

2 回目以降は次のコマンドで起動します。

```bash
npm run local:start
```

このコマンドは次の処理を行います。

1. `.env` があれば読み込む。
2. Wi-Fi の LAN IP を自動検出する。
3. このリポジトリ専用の Vite をバックグラウンド起動し、PID を `.local/vite.pid` に保存する。
4. `themes/swell_child/localhost.json` を作成し、WordPress から Vite dev server の JS/SCSS を読めるようにする。
5. `wp-env start` を実行する。
6. PC 用 URL とスマホ確認用 URL を表示する。

macOS では `screen` が使える場合、Vite は `<リポジトリ名>-vite` という detached session で起動します。これによりターミナルや AI 実行環境の終了に巻き込まれにくくなります。`npm run local:stop` でこの session も停止します。

起動後に表示される URL の例:

```text
WordPress localhost: http://localhost:8888
WordPress network:   http://192.168.1.23:8888
Vite: http://192.168.1.23:5173/
```

PC では `http://localhost:8888` を開きます。スマホでは PC と同じ Wi-Fi に接続し、表示された `WordPress network` の URL を開きます。

## スマホ実機確認の仕組み

スマホ確認では `localhost` が使えません。スマホにとっての `localhost` はスマホ自身を指すためです。

このテンプレートでは `npm run local:start` 実行時に PC の LAN IP を検出し、Vite の読み込み先を `http://<LAN IP>:5173/` にします。Vite は `0.0.0.0` で起動するため、同じ Wi-Fi 内のスマホからも JS/SCSS を取得できます。

WordPress 側もローカル環境に限り、アクセスしてきたホスト名を `home` / `siteurl` として扱います。これにより PC は `localhost`、スマホは LAN IP のまま確認できます。

LAN IP を自動検出できない場合は `.env` に明示します。

```bash
LOCAL_NETWORK_IP=192.168.1.23
```

Vite の URL を手動指定したい場合:

```bash
VITE_DEV_SERVER_URL=http://192.168.1.23:5173/
```

## 停止と初期化

停止:

```bash
npm run local:stop
```

このコマンドは `.local/vite.pid` に記録された、このリポジトリの Vite だけを停止します。他プロジェクトの Vite プロセスは止めません。`themes/swell_child/localhost.json` と `.local/urls.json` も削除します。

WordPress 環境を破棄する場合:

```bash
npm run local:destroy
```

Docker コンテナと WordPress データを消す操作なので、必要なデータがないことを確認してから実行します。

## よく使うコマンド

```bash
npm run local:start
npm run local:stop
npm run wp:start
npm run wp:stop
npm run wp:setup
npm run build
npm run verify
npm run deploy:dry -- dev
npm run deploy:dev
```

## build の流れ

```bash
npm run build
```

処理順:

1. `npm run clean` で `themes/swell_child/assets` を削除する。
2. `npm run build:vite` で JS/SCSS を `themes/swell_child/assets` に出力する。
3. `npm run build:assets` で画像、SVG、font、video を処理する。

生成物:

- `themes/swell_child/assets/css`
- `themes/swell_child/assets/js`
- `themes/swell_child/assets/images`

`assets/images/**/*.jpg`, `jpeg`, `png` は `themes/swell_child/assets/images/**/*.webp` に変換されます。同じディレクトリに `foo.jpg` と `foo.png` がある場合は、どちらも `foo.webp` になって衝突するため build を失敗させます。

## デプロイの流れ

`.env.example` を参考に `.env` を作ります。

```bash
cp .env.example .env
```

dev への確認と反映:

```bash
npm run build
npm run deploy:dry -- dev
npm run deploy:dev
```

prod への確認と反映:

```bash
npm run build
npm run deploy:dry -- prod
npm run deploy:prod
```

本番反映は確認プロンプト付きです。非対話環境でのみ、明示的に `CONFIRM_PROD=1` を付けます。

```bash
CONFIRM_PROD=1 npm run deploy:prod
```

## 主なディレクトリ

- `assets/js`: Vite に渡す JavaScript のソース。
- `assets/scss`: FLOCSS/BEM で管理する SCSS のソース。
- `assets/images`: 元画像。build 時に WebP 化される。
- `themes/swell`: SWELL親テーマ。商用テーマのためGit管理しない。
- `themes/swell_child`: この案件の実装対象になるSWELL子テーマ。
- `themes/swell_child/inc`: テーマの PHP 処理を責務別に分ける場所。
- `themes/swell_child/assets`: build 生成物。手で編集しない。
- `scripts`: setup、起動、停止、build 補助、deploy 用スクリプト。
- `docs`: 制作ルール、環境、デザイン入力、チェックリスト。
- `.agents/skills`: Codex 向けの再利用可能な作業手順。

## Markdown と AI 設定の役割

- `README.md`: 人間向けの全体説明。環境の使い方、起動、build、deploy、各ファイルの役割を確認する。
- `AGENTS.md`: Codex と汎用 AI エージェント向けの中心ルール。作業前に読む前提。
- `CLAUDE.md`: Claude Code 向けの入口。`AGENTS.md` と `docs/agent.md` を読み込ませる。
- `docs/agent.md`: AI に渡す詳細仕様。テーマ構成、実装手順、守るべきルールをまとめる。
- `docs/css-design.md`: FLOCSS/BEM の命名規則、追加手順、使い分けをまとめる。
- `docs/animation.md`: フェードイン、GSAP、ScrollTrigger、Splide、パララックス、動きを減らす設定の実装方針をまとめる。
- `docs/design-brief.md`: 案件ごとのデザイン、目的、ページ、色、フォント、素材、未決事項を書く入力テンプレート。
- `docs/design-review-checklist.md`: Figma やスクショから読み取る項目のチェックリスト。
- `docs/deploy.md`: rsync deploy の準備、dry-run、本番反映ルール。
- `docs/environment.md`: wp-env、Vite、スマホ確認、画像処理の環境説明。
- `.agents/skills/wordpress-site-build/SKILL.md`: 新規ページやセクション制作時に Codex が参照する手順。
- `.agents/skills/rich-animation/SKILL.md`: GSAP、ScrollTrigger、Splide、フェードイン、パララックス実装時に Codex が参照する手順。
- `.agents/skills/local-deploy/SKILL.md`: ローカルから rsync するときに Codex が参照する安全手順。

## script ファイルの役割

- `scripts/local-start.sh`: Vite と wp-env を起動し、PC/スマホ確認用 URL を準備する。
- `scripts/local-stop.sh`: このリポジトリの Vite だけを停止し、wp-env を停止する。
- `scripts/local-destroy.sh`: 停止後に wp-env 環境を破棄する。
- `scripts/wp-run-setup.sh`: Docker Compose の TTY 問題を避けて、`scripts/wp-setup.sh` を CLI コンテナで実行する。
- `scripts/wp-setup.sh`: WordPress 初期設定、テーマ有効化、不要投稿削除、パーマリンク設定を行う。
- `scripts/show-local-urls.sh`: localhost と LAN IP の WordPress URL を表示する。
- `scripts/clean.mjs`: build 生成物を削除する。
- `scripts/build-assets.mjs`: 画像変換、SVG 最適化、font/video コピーを行う。
- `scripts/deploy.sh`: rsync の dry-run と dev/prod 反映を行う。

## テーマ実装の基本ルール

- `themes/swell_child/functions.php` は `themes/swell_child/inc/*.php` を読み込むだけにする。
- assets 関連は `themes/swell_child/inc/assets.php` に書く。
- helper は `themes/swell_child/inc/helpers.php` に書く。
- カスタム投稿や taxonomy は `themes/swell_child/inc/post-types.php` に書く。
- テンプレート内の URL、属性、テキストは `esc_url()`, `esc_attr()`, `esc_html()` を使う。
- 画像 URL は `theme_image_url()` を使う。
- SCSS は `assets/scss/style.scss` に明示的な順番で `@use` を追加する。

## アニメーション実装の基本ルール

アニメーション方針の正式な管理場所は `docs/animation.md` です。GSAP、ScrollTrigger、Splide は `themes/swell_child/inc/assets.php` で vendor asset として登録済みです。必要なテンプレートや機能でだけ enqueue し、全ページへ無条件に読み込まないでください。

- 単純な hover や transition は CSS で実装する。
- 画面表示時の軽いフェードインは IntersectionObserver + CSS transition を優先する。
- 複数要素の timeline、stagger、ScrollTrigger、パララックスが必要な場合は GSAP を使う。
- 写真、投稿、カードのスライダーは Splide を標準候補にする。
- `prefers-reduced-motion: reduce` で大きな動きやスクロール連動を止める。
- Anime.js、Motion、Swiper、Lenis、Three.js などの重複ライブラリは、明確な依頼がない限り追加しない。
- Codex で実装する場合は `.agents/skills/rich-animation/SKILL.md` も確認する。

## 検証

基本検証:

```bash
npm run verify
```

個別検証:

```bash
npm run build
npm run lint:php
npm audit --audit-level=low
```
