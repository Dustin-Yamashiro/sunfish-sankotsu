# CSS 設計

SCSS は FLOCSS と BEM を基準にします。既存案件の制作方法に合わせ、読み込み順を固定し、クラスの責務を明確に分けます。

## ディレクトリ

```text
assets/scss/
  foundation/
    _reset.scss
    _variables.scss
    _mixin.scss
    _base.scss
  layout/
    _header.scss
    _footer.scss
    _page.scss
    _section.scss
    _form.scss
    _single.scss
    _archive.scss
  object/
    component/
      _title.scss
      _section-title.scss
      _section-btn.scss
      _breadcrumb.scss
      _tag.scss
    project/
      _front-page.scss
      _content.scss
    utility/
      _bg.scss
      _br.scss
      _container.scss
      _contents.scss
  style.scss
```

## 既存案件からの反映方針

`portfolio-site`、`ryuudai-aquaxmgrid`、`uchina-partners` の 3 案件を比較し、案件固有の装飾ではなく新規制作テンプレートとして再利用しやすい構成だけを標準化しています。

- `_reset.scss` と `_mixin.scss` は 3 案件でほぼ共通のため、このテンプレートでも共通基盤として維持する。
- `_variables.scss` は案件ごとに最も差が出るため、白・黒・グレー・base・main・accent・border・text・muted など最低限のトークンだけを標準化する。
- `_base.scss` は `uchina-partners` 系のシンプルな body 設定をベースにし、Instagram プラグイン調整や案件固有フォント読み込みは入れない。
- `layout` には複数案件で繰り返し出る header、footer、page、section、form、single、archive の土台だけを置く。
- `component` には見出し、ボタン、パンくず、タグなど複数ページで使う部品を置く。
- `project` にはトップページやコンテンツ固有の表現を置く。案件ごとのセクション装飾はここに追加する。
- `utility` には背景、改行、コンテナ、本文幅など単一責務の補助 class だけを置く。

`portfolio-site` のアニメーション、`ryuudai-aquaxmgrid` の濃色グラデーションや独自セクション、`uchina-partners` の Instagram プラグイン調整や個別カード UI は、案件依存が強いため標準テンプレートには含めません。必要になった案件で `project` または専用 component として追加します。

## 接頭辞

- `l-`: レイアウト。ヘッダー、フッター、ページ全体の大枠。
- `c-`: コンポーネント。複数ページで再利用できる UI。
- `p-`: プロジェクト。特定ページや特定セクションの固有表現。
- `u-`: ユーティリティ。余白、背景、表示制御など単一責務。
- `is-`: 状態。開閉、現在地、アクティブ状態。
- `js-`: JavaScript 用 hook。スタイルを書かない。

## SWELL 子テーマでの class 命名

この案件は SWELL の子テーマとして制作するため、SWELL 親テーマの CSS も同時に読み込まれます。class を作成する際は、SWELL 親テーマの既存 class と干渉しない命名を優先してください。

- SWELL が使っている可能性が高い `.l-header`, `.l-footer`, `.c-gnav`, `.p-spMenu`, `.l-content`, `.post_content` などを、独自パーツの主 class として安易に使わない。
- 独自のヘッダー、フッター、固定パーツは `l-custom-header`, `l-custom-footer` のように `custom` を含め、SWELL 標準部品と区別する。
- ページ固有セクションは `p-front-*`, `p-about-*`, `p-plan-*` のように、ページ名や用途を含める。
- SWELL 標準の投稿一覧、記事本文、ブロック装飾を調整する場合は、どの SWELL class を上書きしているかを確認してから最小範囲で書く。
- SWELL 親テーマの見た目を消すためだけに `!important` を多用しない。まず class 名の分離、詳細度、読み込み順で解決する。
- 既存の SWELL class へ直接スタイルを書く場合は、影響範囲が投稿、固定ページ、管理画面由来ブロックに広がらないか確認する。

## BEM の書き方

```scss
.p-section {}
.p-section__body {}
.p-section__button {}
.p-section__button--primary {}
```

## 新しいセクションを追加する手順

1. 汎用化できる見出しやボタンは `object/component` に置く。
2. ページ固有の配置や余白は `object/project` に置く。
3. `assets/scss/style.scss` に読み込みを追加する。
4. 同じ見た目が 2 箇所以上に増えたら component 化を検討する。

## 余白とスペース調整

`margin`, `padding`, `gap`, `top`, `right`, `bottom`, `left`, `inset`, `translate` など、余白や位置調整に使う px 値は、原則として 4 の倍数で指定します。

- 基本単位は `4px` とし、`8px`, `12px`, `16px`, `24px`, `32px`, `40px`, `48px`, `64px`, `80px`, `96px`, `120px` のように段階的に使う。
- Figma やスクリーンショットの見た目を再現する場合も、まず 4 の倍数へ丸めて成立するか確認する。
- 余白の微調整で `13px`, `22px`, `37px` のような任意値を安易に使わない。
- 例外は、`1px` の border、アイコンや画像の実寸、フォントサイズ、line-height、デザイン上どうしても必要な厳密値に限定する。
- 例外値を使う場合は、なぜ 4 の倍数にできないかを実装時に判断できる状態にする。

## フォントサイズ

本文、ナビ、ボタン、カード、フォーム、FAQ など、通常の可読テキストの `font-size` は原則 `16px` 以上にします。

- デフォルトの本文サイズは `16px` を基準にする。
- PC/SP を問わず、説明文、リンク、ボタン、フォーム入力、FAQ本文などは `16px` 未満にしない。
- 補助ラベル、英字の小見出し、日付、注釈、装飾的なテキストなど、デザイン上必要だと判断できる場合だけ `15px` 以下を検討する。
- ユーザーから「フォントを小さくして」など明示的な指示がある場合は、可読性とアクセシビリティへの影響を確認したうえで `16px` 未満を指定してよい。
- `16px` 未満にする場合は、文字量、コントラスト、タップ領域、スマホ表示で読みにくくならないかを確認する。

## ルール

- `@use "./**/_*.scss"` のようなまとめ読み込みは使わない。
- `style.scss` で foundation、layout、component、project、utility の順に読む。
- 色やフォントは `foundation/_variables.scss` に寄せる。
- breakpoint と計算処理は `foundation/_mixin.scss` に寄せる。
- `js-` class に CSS を書かない。
- SWELL 親テーマの既存 class と干渉しない命名を優先し、独自パーツは `l-custom-*` や用途が分かる `p-*` で作る。
- 余白やスペース調整の px 値は原則 4 の倍数にする。
- 通常の可読テキストの font-size は原則 16px 以上にする。
