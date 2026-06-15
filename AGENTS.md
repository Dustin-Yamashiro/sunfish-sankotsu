# AGENTS.md

このリポジトリは、新規 WordPress オリジナルテーマ制作のテンプレートです。Codex と汎用 AI エージェントは `docs/agent.md` を中心仕様として読み、実装前に関連ファイルと既存パターンを確認してください。

## 基本方針

- 既存動作を明示的な理由なく変えない。
- `theme/functions.php` へ処理を増やさず、`theme/inc/*.php` に責務ごとに追加する。
- PHP の URL、属性、テキスト出力は `esc_url()`, `esc_attr()`, `esc_html()` を使う。
- SCSS は FLOCSS/BEM を守り、`l-`, `c-`, `p-`, `u-`, `is-`, `js-` の接頭辞を使う。
- `style.scss` の `@use` は明示順で管理し、まとめ読み込みに戻さない。
- GSAP、ScrollTrigger、Splide、フェードイン、パララックスを扱う場合は `docs/animation.md` と `.agents/skills/rich-animation/SKILL.md` を確認する。
- 画像は `assets/images` に置き、PHP からは `theme_image_url()` を使う。
- build 生成物の `theme/assets` と `original-blocks/build` は手編集しない。
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

- テーマ PHP: `theme/**/*.php`
- ソース JS: `assets/js/**/*.js`
- ソース SCSS: `assets/scss/**/*.scss`
- ソース画像: `assets/images/**/*`
- カスタムブロック: `original-blocks/src/**/*`
- 案件仕様: `docs/design-brief.md`

## 参照順

1. `README.md`
2. `docs/agent.md`
3. `docs/design-brief.md`
4. `docs/css-design.md`
5. アニメーションやスライダーを触る場合は `docs/animation.md`
6. 必要に応じて `.agents/skills/*/SKILL.md`
