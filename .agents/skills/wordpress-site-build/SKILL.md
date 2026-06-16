---
name: wordpress-site-build
description: この local-env テンプレートで WordPress オリジナルテーマを制作・修正するための手順。ページ、セクション、SCSS、PHP テンプレート、カスタムフィールド、レスポンシブ対応、Figma やスクリーンショットからの実装時に使う。
---

# WordPress サイト制作

1. `AGENTS.md`, `docs/agent.md`, `docs/design-brief.md`, `docs/css-design.md` を読む。
2. 編集対象のテンプレート、セクション、ブロックを特定する。
3. 元画像や元ファイルは `assets/` に置き、`themes/swell_child/assets` を直接編集しない。
4. 画像は `theme_image_url()` を使い、PHP では元画像の拡張子のまま指定する。
5. SCSS は適切な FLOCSS 階層に partial を追加し、`assets/scss/style.scss` に読み込む。
6. PHP の処理は `themes/swell_child/inc` に置き、テンプレートは markup 中心に保つ。
7. フェードイン、スライダー、GSAP、ScrollTrigger、Splide、パララックスを扱う場合は `.agents/skills/rich-animation/SKILL.md` と `docs/animation.md` を読む。
8. 余白やスペース調整の `margin`, `padding`, `gap` などは、原則 4 の倍数の px 値で指定する。
9. 通常の可読テキストの `font-size` は原則 `16px` 以上にする。明示指示やデザイン上の必要性がある場合だけ例外を許容する。
10. PHP、JS、SCSS、assets を触った場合は `npm run build` と `npm run lint:php` で確認する。

デザインを読む場合は `docs/design-review-checklist.md` に沿って Figma やスクリーンショットを確認し、大きな実装前に `docs/design-brief.md` を更新する。
