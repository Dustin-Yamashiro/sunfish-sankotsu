# AI エージェント向け仕様

このテンプレートは、WordPress オリジナルテーマ制作を AI と共同で進めるための基準リポジトリです。中心仕様はこのファイル、短い運用ルールは `AGENTS.md`、案件固有の入力は `docs/design-brief.md` に集約します。

## 全体構成

- ローカル WordPress: `wp-env`
- フロントエンド build: Vite
- JavaScript 入口: `assets/js/main.js`
- SCSS 入口: `assets/scss/style.scss`
- アニメーション仕様: `docs/animation.md`
- build 済み assets: `themes/swell_child/assets`
- 元画像: `assets/images`
- build 済み画像: `themes/swell_child/assets/images`
- デプロイ: `scripts/deploy.sh` によるローカル rsync
- 案件固有デザイン: `docs/design-brief.md`

## 制作の流れ

1. `docs/design-brief.md` と、関連する Figma / スクリーンショットを読む。
2. 必要なテンプレート、コンポーネント、画像、WordPress 管理項目を洗い出す。
3. PHP テンプレートと helper を実装し、出力は必ず escape する。
4. SCSS は FLOCSS に沿って追加し、`style.scss` に明示的に読み込む。
5. JavaScript が必要な場合は `assets/js/main.js` から module を読み込む。
6. 画像は `assets/images` に置き、PHP からは `theme_image_url()` で参照する。
7. `npm run build` と `npm run lint:php` を実行する。

## WordPress 実装ルール

- `functions.php` は `themes/swell_child/inc/*.php` を読み込むだけにする。
- `themes/swell_child/inc/setup.php`: テーマサポート、メニュー、エディタ設定。
- `themes/swell_child/inc/assets.php`: Vite dev server、本番 manifest、ローカル URL 調整。
- `themes/swell_child/inc/helpers.php`: URL、パス、画像などの helper。
- `themes/swell_child/inc/post-types.php`: カスタム投稿タイプ、taxonomy。
- テンプレートには markup と単純な loop だけを書く。
- URL は `esc_url()`、属性は `esc_attr()`、通常テキストは `esc_html()` を使う。
- WordPress 管理画面で編集される本文には `the_content()` を使ってよい。

## Vite と assets のルール

- Vite input は `assets/js/main.js` と `assets/scss/style.scss` だけ。
- 画像、font、video は `scripts/build-assets.mjs` で処理する。
- `jpg`, `jpeg`, `png` は build 時に WebP へ変換する。
- PHP では元画像の拡張子で指定する。例: `theme_image_url( 'hero.jpg' )`
- ローカル開発では Vite の `assets/images/hero.jpg` を読む。
- 本番では `themes/swell_child/assets/images/hero.webp` を読む。
- 同じディレクトリで拡張子だけ違う同名画像を置かない。

## スマホ実機確認のルール

- `npm run local:start` は LAN IP を検出し、Vite URL をスマホから届く URL にする。
- PC 確認は `http://localhost:8888` を使う。
- スマホ確認は `http://<LAN IP>:8888` を使う。
- LAN IP を自動検出できない場合は `.env` に `LOCAL_NETWORK_IP` を設定する。
- ローカル環境に限り、WordPress の `home` / `siteurl` は現在のアクセスホストを使う。
- `themes/swell_child/localhost.json` はローカル専用ファイルで、本番へ送らない。

## CSS ルール

詳細は `docs/css-design.md` を参照する。読み込み順は固定し、まとめ読み込みを使わず、FLOCSS/BEM の接頭辞を守る。

共通セクションは `template-parts/sec-*.php`、`assets/scss/layout/_sec-*.scss`、`.l-sec-*` で管理する。トップページ固有セクションは `front-page.php` に直接書き、`assets/scss/layout/_front-*.scss`、`.l-front-*` で管理する。見出しやボタンなどの部品は `.c-sec-title`、`.c-sec-btn` を使う。`template-parts/sec-*.php` の冒頭には、何のセクションか分かる日本語 docblock を書く。詳しい判断基準は `docs/css-design.md` の「セクションのテンプレート化と配置ルール」を参照する。

この案件は SWELL 子テーマのため、SWELL 親テーマの CSS も同時に読み込まれる。class を作成する際は親テーマの既存 class と干渉しない命名を優先し、独自のヘッダー、フッター、固定パーツは `l-custom-*` など案件側だと分かる class にする。SWELL class を直接上書きする場合は、影響範囲を確認して最小限にする。

`margin`, `padding`, `gap` などの余白・スペース調整は、原則として 4 の倍数の px 値で指定する。例外は `1px` の border、画像やアイコンの実寸、フォントサイズ、line-height、デザイン上どうしても必要な厳密値に限定する。ボタン、ラベル、短冊、見出し背景、カード内テキスト面など、文字を包むボックス要素の上下 padding は px ではなく `em` を優先し、font-size の変更に追従させる。Figma の px 値は `padding px / font-size px` を目安に `em` へ換算する。

通常の可読テキストの `font-size` は原則 `16px` 以上にする。デザイン上必要な補助ラベル、注釈、装飾的テキスト、またはユーザーから明示的に小さくする指示がある場合だけ、可読性を確認して `16px` 未満を使う。

## 案件固有デザインルール

石垣島海洋散骨センターのデザイン仕様は `docs/design-brief.md` を正式な参照先とする。

- SWELLのオリジナル子テーマとして制作予定。
- 白、水色、薄い水色、海や花の写真、広い余白を基調にする。
- 投稿/ニュース/コラムのカード部分はSWELL標準デザインを優先する。
- セクション実装前に、添付スクリーンショット、Figma、`docs/design-brief.md` の差分を確認する。
- SP版の正確値は未確認のため、実装時に推測を断定せず、確認事項として残す。

## アニメーションルール

詳細は `docs/animation.md` を参照する。このファイルをアニメーション方針の正式な管理場所とする。画面表示時のフェードイン、Splide のスライダー、GSAP / ScrollTrigger のスクロール演出、パララックスを扱う場合は `.agents/skills/rich-animation/SKILL.md` も参照する。

- hover や軽い transition は CSS を優先する。
- 単純なフェードインは IntersectionObserver + CSS transition を優先する。
- 複数要素の timeline、stagger、スクロール連動は GSAP を使う。
- 写真、投稿、カードのスライダーは Splide を標準候補にする。
- GSAP、ScrollTrigger、Splide は `themes/swell_child/inc/assets.php` の登録済み handle を必要箇所だけ enqueue する。
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
- ユーザーや別エージェントが後から調整したと判断できる既存変更を、依頼対象外の作業で戻さない。特に幅、余白、font-size、配置、class 名、レスポンシブ値は、現在の差分と周辺コードを確認してから必要最小限だけ変更する。
- 実行したコマンド、失敗した検証、未確認の挙動を隠さず報告する。
