---
name: rich-animation
description: GSAP、ScrollTrigger、Splide、IntersectionObserver を使った WordPress サイトのフェードイン、スライダー、パララックス、スクロール演出を実装・調整するときに使う。画面表示時のアニメーション、写真や投稿のスライダー、リッチなスクロール連動演出、動きを減らす設定の確認を含む。
---

# リッチアニメーション実装

この skill は、`local-env` でアニメーションやスライダーを実装するときの手順です。詳細ルールは `docs/animation.md` を必ず参照します。

## 参照するファイル

1. `AGENTS.md`
2. `docs/agent.md`
3. `docs/design-brief.md`
4. `docs/animation.md`
5. `docs/css-design.md`
6. 対象の PHP テンプレート、JS、SCSS

## 判断基準

- hover、軽い transition、単純な表示切り替えは CSS で実装する。
- 表示時フェードだけなら IntersectionObserver + CSS transition を優先する。
- stagger、timeline、複数要素の制御が必要なら GSAP を使う。
- スクロール量に連動する演出、pin、scrub、parallax は GSAP ScrollTrigger を使う。
- 写真、投稿、カード、ロゴのスライダーは Splide を使う。
- GSAP、ScrollTrigger、Splide は `theme/inc/assets.php` に登録済みの handle を必要箇所だけ enqueue する。
- 追加ライブラリは GSAP と Splide に限定する。他のライブラリはユーザーから明示指示がある場合だけ検討する。
- GSAP を使う場合は、timeline、stagger、matchMedia、context/revert、utils、kill/revert などを活用し、後から調整・破棄しやすい構成にする。
- `prefers-reduced-motion: reduce` で動きを止める、または大幅に弱める。

## 作業手順

1. デザイン資料から、動かす要素、動くタイミング、動きの強さ、スマホ時の挙動を洗い出す。
2. `docs/design-brief.md` の「動き」に、フェード、スライダー、パララックス、自動再生、動きを減らす方針を書く。
3. `docs/animation.md` の優先順位に従い、CSS、IntersectionObserver、GSAP、GSAP 公式プラグイン、Splide のどれで実装するかを決める。GSAP 公式プラグインが必要そうな場合は、固定対応表に頼らず公式プラグイン全体を候補として確認する。
4. 必要な場合だけ `wp_enqueue_script( 'gsap' )`、`wp_enqueue_script( 'gsap-scrolltrigger' )`、`wp_enqueue_style( 'splide' )`、`wp_enqueue_script( 'splide' )` を行う。
5. JS は `assets/js/modules/*.js` に分け、`assets/js/main.js` は初期化だけにする。
6. JS hook は `js-` class または `data-*` にし、CSS は `js-` class に書かない。
7. SCSS は FLOCSS に沿って `component`、`project`、`utility` のどこに置くか決め、`style.scss` に明示的に読み込む。
8. WordPress から出る投稿や画像を対象にする場合は、PHP 側で escape と class 出力を確認する。
9. 実装後に `npm run build:vite` を実行する。PHP を触った場合は `npm run lint:php` も実行する。

## Splide 実装時の確認

- 複数スライダーが同じページにあっても壊れない初期化にする。
- PC、tablet、SP の `perPage` と `gap` を明示する。
- `aria-label` を markup に入れる。
- autoplay を使う場合は、停止できる UI または Splide の pause 操作を維持する。
- WordPress の投稿ループで slide を出す場合、投稿が 0 件、1 件、複数件の状態を考慮する。

## GSAP / ScrollTrigger 実装時の確認

- 複数要素の連続演出は `gsap.timeline()` で管理する。
- レスポンシブで演出を切り替える場合は `gsap.matchMedia()` を検討する。
- 初期化範囲と破棄を管理する必要がある場合は `gsap.context()` と `revert()` を検討する。
- `gsap.registerPlugin(...)` は使用する GSAP 公式プラグインを読み込んだ module 内で行う。
- ScrollTrigger 以外の GSAP 公式プラグインは、要件上必要と判断した場合だけ個別に読み込む。
- fixed header や WordPress 管理バーがある場合、trigger start/end の見え方を確認する。
- 画像読み込み後に高さが変わる演出では、必要に応じて `ScrollTrigger.refresh()` を使う。
- スマホでは pin や scrub を減らす、または無効化する。
- `prefers-reduced-motion: reduce` の場合は timeline や ScrollTrigger を作らない。

## 完了条件

- `npm run build:vite` が通る。
- PC とスマホ幅で表示崩れがない。
- スライダーは矢印、pagination、swipe、キーボード操作を確認する。
- スクロール演出はページ最上部、途中、リロード直後で破綻しない。
- 動きを減らす設定で過剰な motion が止まる。
