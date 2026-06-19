<?php
/**
 * 散骨プランセクションのテンプレート。
 *
 * 貸切散骨プランと代理散骨プランの概要、料金、写真、詳細導線を出力します。
 *
 * @package SunfishSankotsu
 */

?>
<section class="l-sec-plan" aria-labelledby="front-plan-title">
	<div class="l-sec-plan__heading u-container u-fade-up">
		<div class="l-sec-plan__title c-sec-title">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Plan</p>
			<h2 id="front-plan-title" class="c-sec-title__main">散骨プラン</h2>
		</div>
	</div>

	<div class="l-sec-plan__list u-container">
		<article class="l-sec-plan__card l-sec-plan__card--charter">
			<picture class="l-sec-plan__image">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/plan/charter.png' ) ); ?>" width="520" height="520" alt="石垣島の海を家族で見つめる貸切散骨の様子" loading="lazy">
			</picture>
			<div class="l-sec-plan__panel">
				<div class="l-sec-plan__content">
					<div class="l-sec-plan__summary">
						<h3 class="l-sec-plan__name u-text-fade">家族で見送る、<br>海への旅立ちプラン<span class="l-sec-plan__name-note">（貸切）</span></h3>
						<p class="l-sec-plan__price">
							<span class="l-sec-plan__price-label">税込</span>
							<span class="l-sec-plan__price-number">132,000</span>
							<span class="l-sec-plan__price-unit">円〜</span>
						</p>
					</div>
					<div class="l-sec-plan__body">
						<p>完全貸切の船で、ご家族やご親族とともに散骨を行うプランです。</p>
						<p>事前に伺ったご希望に沿って、船長が準備から進行まで担当し、故人様らしい海への旅立ちをお手伝いします。</p>
					</div>
					<div class="l-sec-plan__button c-sec-btn c-sec-btn--next c-sec-btn--white c-sec-btn--small">
						<a href="<?php echo esc_url( home_url( '/kashikiri/' ) ); ?>">詳しくはこちら</a>
					</div>
				</div>
			</div>
		</article>

		<article class="l-sec-plan__card l-sec-plan__card--proxy">
			<picture class="l-sec-plan__image">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/plan/proxy.png' ) ); ?>" width="520" height="520" alt="石垣島の海へ花を手向ける委託散骨の様子" loading="lazy">
			</picture>
			<div class="l-sec-plan__panel">
				<div class="l-sec-plan__content">
					<div class="l-sec-plan__summary">
						<h3 class="l-sec-plan__name u-text-fade">想いを託す、<br>委託散骨プラン<span class="l-sec-plan__name-note">（代理）</span></h3>
						<p class="l-sec-plan__price">
							<span class="l-sec-plan__price-label">税込</span>
							<span class="l-sec-plan__price-number">55,000</span>
							<span class="l-sec-plan__price-unit">円〜</span>
						</p>
					</div>
					<div class="l-sec-plan__body">
						<p>ご遺族に代わり、船長が散骨を行うプランです。</p>
						<p>大切なご遺骨をお預かりし、ご遺族の想いを受け止めながら、責任を持って石垣島の海へお見送りします。</p>
					</div>
					<div class="l-sec-plan__button c-sec-btn c-sec-btn--next c-sec-btn--white c-sec-btn--small">
						<a href="<?php echo esc_url( home_url( '/dairi/' ) ); ?>">詳しくはこちら</a>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
