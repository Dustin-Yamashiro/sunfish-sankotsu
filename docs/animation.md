# アニメーション設計

このテンプレートでは、通常のフェードイン、投稿・写真スライダー、スクロール連動のリッチ演出を扱います。見た目の派手さより、読み込み速度、操作性、アクセシビリティ、保守性を優先します。

## 基本方針

- CSS だけで自然に実装できる hover、transition、軽い表示切り替えは CSS で実装する。
- 画面表示時のフェードインや少量のスクロール演出は、必要に応じて GSAP を使う。
- 写真、投稿、カードのスライダーは Splide を標準候補にする。
- スクロール量に同期するパララックス、pin、複数要素のタイムライン制御は GSAP ScrollTrigger を使う。
- Anime.js、Motion、Swiper、Lenis、Three.js など、役割が重複するライブラリは明確な依頼がない限り追加しない。
- `prefers-reduced-motion: reduce` の場合は、大きな移動、視差、連続アニメーションを止める。
- アニメーションのためだけに重要テキストや CTA の表示を遅らせすぎない。

## ツール選定

このテンプレートでは、追加ライブラリを GSAP と Splide に限定します。

| 用途 | 第一候補 | 補足 |
| --- | --- | --- |
| hover、開閉、軽い表示切り替え | CSS transition / animation | JS ライブラリを使わない |
| 表示時フェードイン | GSAP または CSS transition | 複数要素や timing 制御がある場合は GSAP |
| 複雑な timeline / stagger / pin / scrub | GSAP / ScrollTrigger | リッチ演出の第一候補 |
| 写真、投稿、カードのスライダー | Splide | WordPress 案件の標準候補 |

他のアニメーションライブラリや最新 CSS 機能は、案件ごとに明確な必要性が出た時点で個別に検討します。テンプレート標準には含めません。

## 依存関係の考え方

GSAP、ScrollTrigger、Splide は `themes/swell_child/inc/assets.php` で vendor asset として登録済みです。npm パッケージとしては追加しません。

登録済み handle:

```text
gsap
gsap-scrolltrigger
splide
splide-auto-scroll
```

必要なテンプレートや機能でだけ enqueue します。全ページへ無条件に読み込まないでください。

```php
wp_enqueue_script( 'gsap' );
wp_enqueue_script( 'gsap-scrolltrigger' );
wp_enqueue_style( 'splide' );
wp_enqueue_script( 'splide' );
```

GSAP 公式プラグインは、個別の npm パッケージとして追加しません。使う場合は、登録済み CDN asset から必要なものだけを読み込み、`gsap.registerPlugin()` で登録します。使用しないプラグインを一括で読み込まないでください。

現在このテンプレートで標準登録している GSAP 公式プラグインは `ScrollTrigger` のみです。

Splide の標準 CSS は `splide` style handle として登録済みです。デザインに合わせて完全に上書きする場合は、Splide の構造 class を使いながら、共通部品なら `assets/scss/object/component`、セクション内の配置なら `assets/scss/object/project` に必要なスタイルを書きます。

## 実装方法の優先順位

アニメーションを実装する際は、次の順番で判断します。

1. CSS だけで簡潔かつ保守しやすく実装できるか。
2. GSAP 本体を使うことで、より明確かつ保守しやすく実装できるか。
3. GSAP 公式プラグインを使う必要があるか。
4. スライダー機能の場合は Splide で実装できるか。

判断時はコード量だけでなく、可読性、保守性、再利用性、レスポンシブ対応、パフォーマンス、アクセシビリティ、停止・破棄、将来の演出変更、AI エージェントが後から理解しやすいかを確認します。

## CSS で実装するもの

以下のような単純な視覚変化は、原則として CSS で実装します。

- ボタンやリンクの hover。
- 色や背景色の変化。
- 下線の伸縮。
- アイコンや矢印の小さな移動。
- 画像の軽微な拡大。
- `focus-visible` 時の表現。
- 単純な表示・非表示。
- 小規模な状態変化。
- 複雑な時間制御を必要としない transition。

CSS で簡潔に完結する処理を、理由なく GSAP へ置き換えないでください。

## JS 構成

アニメーションが増える場合は、`assets/js/main.js` に直接書き続けず、機能ごとに module を分けます。

```text
assets/js/
  main.js
  modules/
    fade-in.js
    slider.js
    scroll-animation.js
```

`main.js` は初期化だけにします。

```js
import { initFadeIn } from './modules/fade-in';
import { initSliders } from './modules/slider';
import { initScrollAnimation } from './modules/scroll-animation';

initFadeIn();
initSliders();
initScrollAnimation();
```

## class 命名

- スタイル用: `c-`, `p-`, `u-`
- 状態: `is-`
- JS hook: `js-`
- アニメーション初期状態: `is-ready`, `is-inview`, `is-active` など状態名で表す

JS hook にスタイルを書かないでください。

```html
<section class="p-about js-fade-in">
  ...
</section>
```

## GSAP で実装するもの

以下のような、時間・順序・スクロール・複数要素の連動を伴うアニメーションは、原則として GSAP を使用します。

- スクロールで画面内に入った際の表示。
- 複数要素の stagger 表示。
- 見出し、本文、画像、ボタンなどの連続演出。
- timeline 制御。
- パララックス。
- スクロール進行度との同期。
- セクションの固定。
- 横スクロール演出。
- 複雑な画像切り替え。
- SVG アニメーション。
- 文字単位、単語単位、行単位の演出。
- 複数の状態をまたぐアニメーション。
- 実行、停止、再開、逆再生、破棄の管理が必要なもの。

単純なアニメーションを無理に GSAP へ寄せる必要はありません。ただし、CSS で複雑な `@keyframes`、大量の delay、状態 class を管理することになる場合は、GSAP の利用を優先します。

## GSAP 本体の活用方針

GSAP を使う場合は、単に `gsap.to()` を並べるだけでなく、GSAP 本体の機能を活用して、後から調整しやすい構成にします。

- 複数要素の連続演出は `gsap.timeline()` で順序を管理する。
- 共通 duration、ease、stagger は timeline や helper に集約する。
- レスポンシブで演出を切り替える場合は `gsap.matchMedia()` を検討する。
- 初期化範囲と破棄を管理しやすくするため、必要に応じて `gsap.context()` と `revert()` を使う。
- 複数要素の取得や値変換には `gsap.utils` を検討する。
- 同じ演出が増える場合は、module 内で小さな初期化関数や helper に分ける。
- 実行、停止、再開、逆再生が必要な演出は、timeline インスタンスを保持して制御できるようにする。

GSAP の機能を使う目的は、派手にすることではなく、時間制御、状態管理、レスポンシブ対応、破棄処理、将来の演出変更を安全にすることです。

## フェードイン

軽いフェードインは、CSS transition、IntersectionObserver、GSAP のどれが最も保守しやすいかで判断します。

- 単純な表示時フェード: CSS transition または IntersectionObserver。
- stagger、複数要素の timing 制御: GSAP。
- スクロール位置に応じた進行制御: GSAP ScrollTrigger。

標準の動き:

- opacity: `0` から `1`
- y: `24px` から `0`
- duration: `0.6` 秒前後
- ease: `power2.out`
- stagger: `0.08` から `0.12`

## Splide スライダー

写真、投稿、カード一覧のスライダーは Splide を候補にします。

実装前に決めること:

- スライダー対象: 写真、投稿、実績、バナー、ロゴなど
- PC / tablet / SP の表示枚数
- loop の有無
- autoplay の有無
- arrows / pagination の有無
- WordPress から動的に出すか、静的 markup か
- 画像比率とトリミング方針

推奨 class:

```html
<div class="splide p-gallery-slider js-gallery-slider" aria-label="ギャラリー">
  <div class="splide__track">
    <ul class="splide__list">
      <li class="splide__slide">...</li>
    </ul>
  </div>
</div>
```

複数スライダーがある場合は、`data-slider="gallery"` のように種類を分け、JS 側で設定を切り替えます。

ドラッグ、スワイプ、ループ、pagination、前後ボタン、自動再生、キーボード操作、レスポンシブ対応、アクセシビリティ対応を GSAP だけで一から再実装しないでください。

特殊なスライド切り替え演出が必要な場合は、スライダーとしての操作・状態管理を Splide に任せ、視覚的なアニメーションだけを GSAP で補助します。

## GSAP / ScrollTrigger

GSAP は、CSS transition だけでは管理しづらい演出に限定して使います。

使ってよい例:

- hero 内の複数要素を順番に表示する。
- セクション見出しと画像をタイムラインで連動させる。
- スクロールに応じて写真を少しだけ動かす。
- pin や scrub を使った明確な演出意図がある。

避ける例:

- hover 色変更だけのために GSAP を使う。
- 本文全体を過剰に動かして読みにくくする。
- スマホで重い pin / scrub を多用する。
- レイアウト崩れの原因になる transform を無計画に重ねる。

ScrollTrigger を使う場合は、WordPress 管理バー、固定ヘッダー、画像遅延読み込みによる高さ変化を考慮します。画像読み込み後やフォント読み込み後に必要なら `ScrollTrigger.refresh()` を実行します。

## GSAP 公式プラグイン

GSAP 本体だけでは実装が複雑になる場合は、GSAP 公式プラグイン全体を候補として確認し、要件に合うものだけを使用できます。ただし、使用できそうという理由だけで読み込まないでください。

確認順:

1. CSS で簡潔に実装できないか。
2. GSAP 本体だけで実装できないか。
3. 既に使用中の GSAP プラグインで対応できないか。
4. GSAP 公式プラグイン一覧を確認し、要件に合う新たな公式プラグインを読み込む必要があるか。

固定の「この演出ならこのプラグイン」という対応表は作りません。GSAP 公式ドキュメントのプラグイン一覧を確認し、演出要件、実装量、保守性、アクセシビリティ、停止・破棄のしやすさを比較して判断します。

標準登録済みは ScrollTrigger のみです。その他の公式プラグインは、案件で明確に必要と判断した時点で、必要なものだけを個別に登録・読み込みます。

## SCSS の置き場所

- 汎用スライダー UI: `assets/scss/object/component/_slider.scss`
- 特定セクションだけの演出: `assets/scss/object/project/_*.scss`
- 表示制御だけの補助: `assets/scss/object/utility/_*.scss`

追加した partial は `assets/scss/style.scss` に明示的に読み込みます。

## アクセシビリティ

- 自動再生スライダーは、ユーザーが止められる設計にする。
- 重要な情報をアニメーション後にしか読めない状態にしない。
- `prefers-reduced-motion: reduce` では transform、parallax、scrub、smooth scroll、自動再生を止める、または duration を短くする。
- Splide の `aria-label` を設定する。
- 矢印ボタンや pagination はキーボードで操作できる状態を維持する。
- アニメーションが無効でも、コンテンツの閲覧や操作に支障が出ない構造にする。

## パフォーマンス

- アニメーション対象は `transform` と `opacity` を中心にする。
- `top`, `left`, `width`, `height` を連続的に動かさない。
- 大量の要素へ個別 ScrollTrigger を作らない。
- スマホでは演出量を減らす。
- Lighthouse や実機確認で引っかかる演出は削る。
- 大きな filter、box-shadow、複雑な clip-path の連続アニメーションは必要性を確認する。

## 初期化と破棄

アニメーション処理は、対象要素が存在する場合だけ初期化します。

- 重複初期化を防ぐ。
- リサイズ時に必要な再計算を行う。
- ブレークポイントごとの切り替えを考慮する。
- イベントリスナーを解除できる構成にする。
- GSAP timeline を必要に応じて `kill()` する。
- ScrollTrigger を必要に応じて `kill()` または `refresh()` する。
- Splide インスタンスを必要に応じて `destroy()` する。

ページ遷移や部分更新がある環境でも、同じ処理が重複して登録されないようにします。

## 実装後の確認

最低限、以下を確認します。

- `npm run build:vite` が通る。
- PC とスマホ幅でレイアウトが崩れない。
- `prefers-reduced-motion` 時に過剰な動きが止まる。
- スライダーの矢印、pagination、swipe が動く。
- WordPress の固定ヘッダーや管理バーと ScrollTrigger が干渉しない。
