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

## ルール

- `@use "./**/_*.scss"` のようなまとめ読み込みは使わない。
- `style.scss` で foundation、layout、component、project、utility の順に読む。
- 色やフォントは `foundation/_variables.scss` に寄せる。
- breakpoint と計算処理は `foundation/_mixin.scss` に寄せる。
- `js-` class に CSS を書かない。
