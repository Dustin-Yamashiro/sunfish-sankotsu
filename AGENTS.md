# AGENTS.md

このリポジトリは、新規 WordPress オリジナルテーマ制作のテンプレートです。Codex と汎用 AI エージェントは `docs/agent.md` を中心仕様として読み、実装前に関連ファイルと既存パターンを確認してください。

## 基本方針

- 既存動作を明示的な理由なく変えない。
- `themes/swell_child/functions.php` へ処理を増やさず、`themes/swell_child/inc/*.php` に責務ごとに追加する。
- PHP の URL、属性、テキスト出力は `esc_url()`, `esc_attr()`, `esc_html()` を使う。
- SCSS は FLOCSS/BEM を守り、`l-`, `c-`, `p-`, `u-`, `is-`, `js-` の接頭辞を使う。
- 共通セクションは `template-parts/sec-*.php`、`object/project/_sec-*.scss`、`.p-sec-*` で管理する。トップページ固有セクションは `front-page.php`、`object/project/_sec-*.scss`、`.p-sec-*` で管理する。ヘッダー、フッター、KV などの共通系は `layout/common/`、ページ単位のスタイルは `layout/page/` に置く。詳細は `docs/css-design.md` を参照する。
- `template-parts/sec-*.php` の冒頭には、何のセクションか分かる日本語 docblock を書く。
- この案件は SWELL 子テーマのため、SWELL 親テーマの既存 class と干渉しない命名を優先する。独自のヘッダー、フッター、固定パーツは `l-custom-*` など案件側だと分かる名前にする。
- 余白やスペース調整の `margin`, `padding`, `gap` などは、原則 4 の倍数の px 値で指定する。ただし、ボタン、ラベル、短冊、見出し背景、カード内テキスト面など、文字を包むボックス要素の上下 padding は `em` を優先し、font-size に追従させる。
- 通常の可読テキストの `font-size` は原則 `16px` 以上にする。明示指示やデザイン上の必要性がある場合だけ例外を許容する。
- `style.scss` の `@use` は明示順で管理し、まとめ読み込みに戻さない。
- GSAP、ScrollTrigger、Splide、フェードイン、パララックスを扱う場合は `docs/animation.md` と `.agents/skills/rich-animation/SKILL.md` を確認する。
- 画像は `assets/images` に置き、PHP からは `theme_image_url()` を使う。
- build 生成物の `themes/swell_child/assets` は手編集しない。
- デプロイは必ず `npm run deploy:dry -- dev|prod` で dry-run を確認してから行う。
- 本番デプロイは `CONFIRM_PROD=1` または確認プロンプトなしに実行しない。
- Copilot と Cursor 用の設定はこのテンプレートでは管理しない。

## 標準コマンド

```bash
npm run setup
npm run local:start
npm run local:stop
npm run build
npm run lint:php
npm run verify
npm run deploy:dry -- dev
npm run deploy:dev
```

## 編集対象

- テーマ PHP: `themes/swell_child/**/*.php`
- ソース JS: `assets/js/**/*.js`
- ソース SCSS: `assets/scss/**/*.scss`
- ソース画像: `assets/images/**/*`
- 案件仕様: `docs/design-brief.md`

## 参照順

1. `README.md`
2. `docs/agent.md`
3. `docs/design-brief.md`
4. `docs/css-design.md`
5. アニメーションやスライダーを触る場合は `docs/animation.md`
6. 必要に応じて `.agents/skills/*/SKILL.md`
