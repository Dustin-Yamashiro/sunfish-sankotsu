# AI エージェント向け仕様

このテンプレートは、WordPress オリジナルテーマ制作を AI と共同で進めるための基準リポジトリです。中心仕様はこのファイル、短い運用ルールは `AGENTS.md`、案件固有の入力は `docs/design-brief.md` に集約します。

## 全体構成

- ローカル WordPress: `wp-env`
- フロントエンド build: Vite
- JavaScript 入口: `assets/js/main.js`
- SCSS 入口: `assets/scss/style.scss`
- アニメーション仕様: `docs/animation.md`
- build 済み assets: `theme/assets`
- 元画像: `assets/images`
- build 済み画像: `theme/assets/images`
- デプロイ: `scripts/deploy.sh` によるローカル rsync

## 制作の流れ

1. `docs/design-brief.md` と、関連する Figma / スクリーンショットを読む。
2. 必要なテンプレート、コンポーネント、画像、WordPress 管理項目を洗い出す。
3. PHP テンプレートと helper を実装し、出力は必ず escape する。
4. SCSS は FLOCSS に沿って追加し、`style.scss` に明示的に読み込む。
5. JavaScript が必要な場合は `assets/js/main.js` から module を読み込む。
6. 画像は `assets/images` に置き、PHP からは `theme_image_url()` で参照する。
7. `npm run build` と `npm run lint:php` を実行する。

## WordPress 実装ルール

- `functions.php` は `theme/inc/*.php` を読み込むだけにする。
- `theme/inc/setup.php`: テーマサポート、メニュー、エディタ設定。
- `theme/inc/assets.php`: Vite dev server、本番 manifest、ローカル URL 調整。
- `theme/inc/helpers.php`: URL、パス、画像などの helper。
- `theme/inc/post-types.php`: カスタム投稿タイプ、taxonomy。
- テンプレートには markup と単純な loop だけを書く。
- URL は `esc_url()`、属性は `esc_attr()`、通常テキストは `esc_html()` を使う。
- WordPress 管理画面で編集される本文には `the_content()` を使ってよい。

## Vite と assets のルール

- Vite input は `assets/js/main.js` と `assets/scss/style.scss` だけ。
- 画像、font、video は `scripts/build-assets.mjs` で処理する。
- `jpg`, `jpeg`, `png` は build 時に WebP へ変換する。
- PHP では元画像の拡張子で指定する。例: `theme_image_url( 'hero.jpg' )`
- ローカル開発では Vite の `assets/images/hero.jpg` を読む。
- 本番では `theme/assets/images/hero.webp` を読む。
- 同じディレクトリで拡張子だけ違う同名画像を置かない。

## スマホ実機確認のルール

- `npm run local:start` は LAN IP を検出し、Vite URL をスマホから届く URL にする。
- PC 確認は `http://localhost:8888` を使う。
- スマホ確認は `http://<LAN IP>:8888` を使う。
- LAN IP を自動検出できない場合は `.env` に `LOCAL_NETWORK_IP` を設定する。
- ローカル環境に限り、WordPress の `home` / `siteurl` は現在のアクセスホストを使う。
- `theme/localhost.json` はローカル専用ファイルで、本番へ送らない。

## CSS ルール

詳細は `docs/css-design.md` を参照する。読み込み順は固定し、まとめ読み込みを使わず、FLOCSS/BEM の接頭辞を守る。

## アニメーションルール

詳細は `docs/animation.md` を参照する。このファイルをアニメーション方針の正式な管理場所とする。画面表示時のフェードイン、Splide のスライダー、GSAP / ScrollTrigger のスクロール演出、パララックスを扱う場合は `.agents/skills/rich-animation/SKILL.md` も参照する。

- hover や軽い transition は CSS を優先する。
- 単純なフェードインは IntersectionObserver + CSS transition を優先する。
- 複数要素の timeline、stagger、スクロール連動は GSAP を使う。
- 写真、投稿、カードのスライダーは Splide を標準候補にする。
- GSAP、ScrollTrigger、Splide は `theme/inc/assets.php` の登録済み handle を必要箇所だけ enqueue する。
- 追加ライブラリは GSAP と Splide に限定する。他のライブラリはユーザーから明示指示がある場合だけ検討する。
- `prefers-reduced-motion: reduce` で過剰な動きを止める。
- JS hook の `js-` class に CSS を書かない。

## デプロイルール

- デプロイ前に build と dry-run を実行する。
- `deploy:dry` は rsync の dry-run のみ行う。
- `deploy:dev` と `deploy:prod` は `git push` を実行しない。
- 本番デプロイには明示的な確認が必要。
- `.env` の秘密情報をコミットしない。

## AI との共同作業ルール

- 大きな実装前に `docs/design-brief.md` へ判断事項と未決事項を残す。
- 変更は小さく確認しやすい単位にする。
- build 生成物を手で編集しない。
- 実行したコマンド、失敗した検証、未確認の挙動を隠さず報告する。
