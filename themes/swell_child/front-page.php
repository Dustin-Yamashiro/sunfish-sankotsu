<?php
/**
 * Front page template.
 *
 * @package LocalEnvTheme
 */

get_header();
?>

<section class="l-kv" aria-labelledby="front-hero-title">
	<picture class="l-kv__media">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="石垣島の海に花を手向ける様子" fetchpriority="high">
	</picture>
	<div class="l-kv__content u-container">
		<h1 id="front-hero-title" class="l-kv__title">石垣の海を、<br>「あの人と繋がる場所」へ</h1>
	</div>
</section>

<section class="p-front-appeal" aria-labelledby="front-appeal-title">
	<div class="p-front-appeal__main u-container">
		<div class="p-front-appeal__content">
			<h2 id="front-appeal-title" class="p-front-appeal__title">お墓ではない<br>「想い」を残す、供養のカタチ</h2>
			<div class="p-front-appeal__body">
				<ul class="p-front-appeal__list">
					<li>お墓を継ぐ人がいない。</li>
					<li>子どもや孫に負担を残したくない。</li>
					<li>墓じまい後の遺骨の供養先に悩んでいる。</li>
				</ul>
				<p>そうした供養の悩みを抱える方は、<br>現代では少なくありません。</p>
				<p>でも、本当に大切なのは、<br>故人様を大切に想い、家族の記憶に残り続け、<br>カタチがなくても、そっと手を合わせられること。</p>
				<p>いつまでも変わることのない、<br>ご家族の「想い」を繋ぐために。</p>
			</div>
		</div>

		<div class="p-front-appeal__collage" aria-hidden="true">
			<picture class="p-front-appeal__photo p-front-appeal__photo--01">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/beach-wave.jpg' ) ); ?>" width="3792" height="2844" alt="" loading="lazy">
			</picture>
			<picture class="p-front-appeal__photo p-front-appeal__photo--02">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/floating-flowers.png' ) ); ?>" width="1672" height="941" alt="" loading="lazy">
			</picture>
			<picture class="p-front-appeal__photo p-front-appeal__photo--03">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/scattering-flowers.png' ) ); ?>" width="1122" height="1402" alt="" loading="lazy">
			</picture>
			<picture class="p-front-appeal__photo p-front-appeal__photo--04">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/boat-sky.jpg' ) ); ?>" width="4032" height="3024" alt="" loading="lazy">
			</picture>
		</div>
	</div>

	<div class="p-front-appeal__choice">
		<div class="u-container">
			<p class="p-front-appeal__choice-text">
				<span class="p-front-appeal__choice-prefix">その想いに</span>
				<span class="p-front-appeal__choice-keyword">“海洋散骨”</span>
				<span class="p-front-appeal__choice-suffix">という選択肢を</span>
			</p>
		</div>
	</div>
</section>

<section class="p-split u-section-space" aria-labelledby="marine-scattering-introduction-title">
	<div class="p-split__inner u-container">
		<div class="p-split__content">
			<div class="p-split__title c-section-title">
				<p class="c-section-title__sub">Introduction</p>
				<h2 id="marine-scattering-introduction-title" class="c-section-title__main">海洋散骨とは</h2>
			</div>
			<div class="p-split__body">
				<p>海洋散骨とは、お墓へ納骨する代わりに、ご遺骨を粉骨して海へ供養する自然葬の一つです。<br>
				ただ海に還すだけでなく、散骨した海をこれからも故人様を想う場所として残す、新しい供養のカタチです。</p>
				<p>海洋散骨には、粉骨の手続きや必要書類の用意、当日の進行など、初めての方には分かりにくいことが多々あります。<br>
				石垣島海洋散骨センターでは、初めての方でも安心して故人様をお見送りできるよう、分かりやすく丁寧にサポートいたします。</p>
			</div>
		</div>

		<div class="p-split__visual" aria-hidden="true">
			<picture class="p-split__image p-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-sub.png' ) ); ?>" width="1254" height="1254" alt="" loading="lazy">
			</picture>
			<picture class="p-split__image p-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-main.png' ) ); ?>" width="1536" height="1024" alt="" loading="lazy">
			</picture>
		</div>

		<div class="p-split__button c-section-btn c-section-btn--next">
			<a href="<?php echo esc_url( home_url( '/beginner/' ) ); ?>">初めての方へ</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
