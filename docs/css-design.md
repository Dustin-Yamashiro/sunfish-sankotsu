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
    _custom-header.scss
    _custom-footer.scss
    _kv.scss
    _page.scss
    _section.scss
    _form.scss
    _front-appeal.scss
    _front-step.scss
    _sec-split.scss
    _sec-feature.scss
    _sec-plan.scss
    _sec-faq.scss
    _sec-news.scss
    _sec-column.scss
  object/
    component/
      _title.scss
      _sec-title.scss
      _sec-btn.scss
      _breadcrumb.scss
      _tag.scss
    project/
      案件固有の小さな表現が必要な場合だけ追加する
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
- `layout` には header、footer、page、section、form、KV、ページ内の大きなセクション骨格を置く。
- `component` には見出し、ボタン、パンくず、タグなど複数ページで使う部品を置く。
- `project` にはページや案件に強く閉じた小さな表現だけを置く。ページ全体のセクション骨格は、トップページ固有でも `layout` に置く。
- `utility` には背景、改行、コンテナ、本文幅など単一責務の補助 class だけを置く。

`portfolio-site` のアニメーション、`ryuudai-aquaxmgrid` の濃色グラデーションや独自セクション、`uchina-partners` の Instagram プラグイン調整や個別カード UI は、案件依存が強いため標準テンプレートには含めません。必要になった案件で `project` または専用 component として追加します。

## 接頭辞

- `l-`: レイアウト。ヘッダー、フッター、ページ全体の大枠。
- `c-`: コンポーネント。複数ページで再利用できる UI。
- `p-`: プロジェクト。特定ページや特定機能に閉じた小さな固有表現。ページ内の大きなセクション骨格には原則使わない。
- `u-`: ユーティリティ。余白、背景、表示制御など単一責務。
- `is-`: 状態。開閉、現在地、アクティブ状態。
- `js-`: JavaScript 用 hook。スタイルを書かない。

## セクションのテンプレート化と配置ルール

この案件では、ページ内の大きなセクションを「レイアウトのまとまり」として扱います。見出し、本文、画像、ボタン、投稿一覧などを含むセクション全体の骨格は、`object/project` ではなく `layout` に置きます。

### 共通セクション

複数ページで使い回す可能性があるセクションは、PHP テンプレートパーツと SCSS を分けて管理します。

- PHP: `themes/swell_child/template-parts/sec-*.php`
- SCSS: `assets/scss/layout/_sec-*.scss`
- class: `.l-sec-*`

例:

```text
template-parts/sec-plan.php
assets/scss/layout/_sec-plan.scss
.l-sec-plan
.l-sec-plan__list
.l-sec-plan__card
```

`template-parts/sections/` のような階層は作らず、現在は `template-parts/` 直下へ置きます。ファイル名には `l-` を付けず、HTML/CSS の class 名だけ `l-sec-*` にします。

各 `sec-*.php` の冒頭には、日本語の docblock で「何のセクションか」「どの投稿・配列・導線を出力するか」「JS やスライダーなど関係する機能があるか」を簡潔に書きます。AI エージェントがファイルを開いた時に、本文を全部読まなくても役割を判断できる状態にしてください。

共通セクションにする基準は次の通りです。

- 他ページでも同じ構成を使う可能性がある。
- セクション単位で順番を入れ替える可能性がある。
- `front-page.php` に置くと長くなり、管理しにくい。
- 見た目だけでなく、投稿取得やFAQ配列などセクション単位のまとまりがある。

### トップページ固有セクション

トップページでしか使わないセクションは、無理にテンプレートパーツ化しません。`front-page.php` に直接書き、SCSS だけ `layout` に分けます。

- PHP: `themes/swell_child/front-page.php`
- SCSS: `assets/scss/layout/_front-*.scss`
- class: `.l-front-*`

例:

```text
front-page.php
assets/scss/layout/_front-appeal.scss
.l-front-appeal

assets/scss/layout/_front-step.scss
.l-front-step
```

トップページ固有でも、セクション全体の配置、余白、背景、画像コラージュ、横並び、流れのカード配置などを担う場合は `l-` として扱います。`p-front-*` は使いません。

### component と section の違い

見出しやボタンのように、セクションの中で部品として使うものは `component` に置きます。

- `assets/scss/object/component/_sec-title.scss`
- `assets/scss/object/component/_sec-btn.scss`
- `.c-sec-title`
- `.c-sec-btn`

`c-sec-title` や `c-sec-btn` は単独の UI 部品です。`l-sec-*` や `l-front-*` は、それらの部品を含むセクション全体のレイアウトです。

### project を使う場面

`object/project` は、セクション全体の骨格ではなく、特定ページや特定機能に閉じた小さな表現が必要な場合だけ使います。

- WordPress 管理画面由来の特定コンテンツだけに当てる補助表現。
- 1ページ内のごく限定的な装飾で、共通セクションとして再利用しないもの。
- component 化するほど汎用ではないが、layout に入れるほど大きな構造でもないもの。

迷った場合は、まず「セクション全体の配置を持つか」で判断します。セクション全体なら `layout`、部品なら `component`、限定的な小表現なら `project` です。

## SWELL 子テーマでの class 命名

この案件は SWELL の子テーマとして制作するため、SWELL 親テーマの CSS も同時に読み込まれます。class を作成する際は、SWELL 親テーマの既存 class と干渉しない命名を優先してください。

- SWELL が使っている可能性が高い `.l-header`, `.l-footer`, `.c-gnav`, `.p-spMenu`, `.l-content`, `.post_content` などを、独自パーツの主 class として安易に使わない。
- 独自のヘッダー、フッター、固定パーツは `l-custom-header`, `l-custom-footer` のように `custom` を含め、SWELL 標準部品と区別する。
- ページ固有でもセクション全体の骨格は `l-front-*`, `l-about-*`, `l-plan-*` のように `l-` で扱う。`p-*` は小さな固有表現に限定する。
- SWELL 標準の投稿一覧、記事本文、ブロック装飾を調整する場合は、どの SWELL class を上書きしているかを確認してから最小範囲で書く。
- SWELL 親テーマの見た目を消すためだけに `!important` を多用しない。まず class 名の分離、詳細度、読み込み順で解決する。
- 既存の SWELL class へ直接スタイルを書く場合は、影響範囲が投稿、固定ページ、管理画面由来ブロックに広がらないか確認する。

## BEM の書き方

```scss
.l-sec-plan {}
.l-sec-plan__body {}
.l-sec-plan__button {}
.l-sec-plan__button--primary {}
```

BEM の block 名は、できるだけ接頭辞を除いて 1 単語にする。1 単語で意味が曖昧になる場合だけ、ハイフン区切りの 2 単語までを基本にする。3 単語以上の block 名は、責務が広すぎる、または component/project の分類が誤っている可能性を疑う。

写真やカードなど中身の差し替えが起きる要素で、modifier が配置スロットを表す場合は、内容名ではなく `--01`, `--02` のような番号名を使う。例: `.l-front-appeal__photo--01`。写真そのものの意味に依存する `--beach`, `--flower` のような名前は、差し替え時に class 名まで変更が必要になるため避ける。

固定フォーマットの画像枠は、原則 `width` と `aspect-ratio` で形を定義し、任意の `width` + `height` 固定だけで縦横を決めない。`img` には `object-fit` と必要に応じた `object-position` を指定し、写真差し替え時のトリミングだけを調整できる状態にする。

## 新しいセクションを追加する手順

1. 汎用化できる見出しやボタンは `object/component` に置く。
2. 複数ページで使い回すセクションは `template-parts/sec-*.php` と `layout/_sec-*.scss` に分け、class は `.l-sec-*` にする。
3. トップページ固有で使い回さないセクションは `front-page.php` に直接書き、SCSS は `layout/_front-*.scss`、class は `.l-front-*` にする。
4. `assets/scss/style.scss` に読み込みを追加する。
5. 同じ見た目が 2 箇所以上に増えたら component 化または共通セクション化を検討する。

## 余白とスペース調整

`margin`, `padding`, `gap`, `top`, `right`, `bottom`, `left`, `inset`, `translate` など、余白や位置調整に使う px 値は、原則として 4 の倍数で指定します。

- 基本単位は `4px` とし、`8px`, `12px`, `16px`, `24px`, `32px`, `40px`, `48px`, `64px`, `80px`, `96px`, `120px` のように段階的に使う。
- Figma やスクリーンショットの見た目を再現する場合も、まず 4 の倍数へ丸めて成立するか確認する。
- 余白の微調整で `13px`, `22px`, `37px` のような任意値を安易に使わない。
- 例外は、`1px` の border、アイコンや画像の実寸、フォントサイズ、line-height、デザイン上どうしても必要な厳密値に限定する。
- 例外値を使う場合は、なぜ 4 の倍数にできないかを実装時に判断できる状態にする。

ボタン、ラベル、短冊、見出し背景、カード内テキスト面など、文字を包むボックス要素の上下 padding は原則 `em` で指定します。`em` はその要素の `font-size` に追従するため、ブレークポイントごとの文字サイズ変更や将来のフォントサイズ調整時に、ボックスの上下余白も同じ比率で伸縮します。Figma の px 値を使う場合は `padding px / font-size px` を目安に `em` へ換算してください。例: `font-size: 35px` で上下 `24px 26px` の場合は `padding-block: 0.69em 0.74em`。

セクション外側の大きな余白、レイアウト用の `gap`、コンテナガター、画像やカードの配置寸法など、文字サイズに追従させない余白は引き続き 4 の倍数の px 値を基準にします。ボックスの左右 padding も、固定幅や横方向の揃えを優先する場合は px 指定でよいですが、文字サイズに合わせて横幅も伸縮させたい部品では `em` を優先してください。

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
- 共通セクションは `template-parts/sec-*.php`、`layout/_sec-*.scss`、`.l-sec-*` で揃える。
- `template-parts/sec-*.php` の冒頭には、セクションの役割を説明する日本語 docblock を必ず書く。
- トップページ固有セクションは `front-page.php`、`layout/_front-*.scss`、`.l-front-*` で揃える。
- ファイル名には `l-` を付けない。`l-` は class 名の接頭辞としてだけ使う。
- セクション見出しとセクションボタンは `.c-sec-title`、`.c-sec-btn` を使う。
- 色やフォントは `foundation/_variables.scss` に寄せる。
- breakpoint と計算処理は `foundation/_mixin.scss` に寄せる。
- `js-` class に CSS を書かない。
- SWELL 親テーマの既存 class と干渉しない命名を優先し、独自パーツは `l-custom-*` や用途が分かる `p-*` で作る。
- 余白やスペース調整の px 値は原則 4 の倍数にする。
- 文字を包むボックス要素の上下 padding は原則 `em` で指定し、font-size に追従させる。
- 通常の可読テキストの font-size は原則 16px 以上にする。
- ユーザーが後から調整したと判断できる幅、余白、font-size、配置、class 名は、依頼対象に直接関係しない限り戻さない。変更が必要な場合は、既存値を変更する理由を明確にして最小範囲で触る。
