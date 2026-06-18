<?php
/**
 * 共通スプリットセクションのテンプレート。
 *
 * テキストと写真を横並びで見せる、海洋散骨とは導線用のセクションです。
 * 他ページでも同じ構成を使えるようにテンプレートパーツ化しています。
 *
 * @package SunfishSankotsu
 */
?>
<section class="l-sec-split u-section-space u-section-space--btm-large" aria-labelledby="marine-scattering-introduction-title">
	<div class="l-sec-split__inner u-container">
		<div class="l-sec-split__content">
			<div class="l-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Introduction</p>
				<h2 id="marine-scattering-introduction-title" class="c-sec-title__main">海洋散骨とは</h2>
			</div>
			<div class="l-sec-split__body">
				<p>海洋散骨とは、お墓へ納骨する代わりに、ご遺骨を粉骨して海へ供養する自然葬の一つです。<br>
				ただ海に還すだけでなく、散骨した海をこれからも故人様を想う場所として残す、新しい供養のカタチです。</p>
				<p>海洋散骨には、粉骨の手続きや必要書類の用意、当日の進行など、初めての方には分かりにくいことが多々あります。<br>
				石垣島海洋散骨センターでは、初めての方でも安心して故人様をお見送りできるよう、分かりやすく丁寧にサポートいたします。</p>
			</div>
		</div>

		<div class="l-sec-split__visual" aria-hidden="true">
			<picture class="l-sec-split__image l-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-sub.png' ) ); ?>" width="1254" height="1254" alt="" loading="lazy">
			</picture>
			<picture class="l-sec-split__image l-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-main.png' ) ); ?>" width="1536" height="1024" alt="" loading="lazy">
			</picture>
		</div>

		<div class="l-sec-split__button c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/beginner/' ) ); ?>">初めての方へ</a>
		</div>
	</div>

</section>
