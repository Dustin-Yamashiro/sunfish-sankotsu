<?php
/**
 * Template Name: 私たちについて
 *
 * 石垣島海洋散骨センターの想い、代表メッセージ、会社概要を掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();
?>

<section class="l-page-kv" aria-labelledby="about-page-title">
	<picture class="l-page-kv__media">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="石垣島の海に花を手向ける様子" fetchpriority="high">
	</picture>
	<div class="l-page-kv__inner u-container">
		<h1 id="about-page-title" class="l-page-kv__title u-bg-wipe u-bg-wipe--load">私たちについて</h1>
	</div>
</section>

<section class="l-sec-split" aria-labelledby="about-vision-title">
	<div class="l-sec-split__inner u-container">
		<div class="l-sec-split__content">
			<div class="l-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Vision</p>
				<h2 id="about-vision-title" class="c-sec-title__main">石垣島の海を、<br>「あの人と繋がる場所」へ</h2>
			</div>
			<div class="l-sec-split__body">
				<p>石垣島海洋散骨センターは、沖縄・石垣エリアを拠点に海洋散骨を行う散骨専門業者です。</p>
				<p>私たちが大切にしているのは、海洋散骨を「最後のお別れ」だけで終わらせないこと。</p>
				<p>散骨した石垣島の海が、これからもご家族が手を合わせ、故人様を想える場所として残るよう、ご希望や不安を伺いながらご案内します。</p>
			</div>
		</div>

		<div class="l-sec-split__visual">
			<picture class="l-sec-split__image l-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'about/vision-sub.jpeg' ) ); ?>" width="254" height="170" alt="石垣島の透明な海と青空" loading="lazy">
			</picture>
			<picture class="l-sec-split__image l-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'about/vision-main.jpg' ) ); ?>" width="500" height="333" alt="石垣島の浅瀬に浮かぶサンフィッシュの船" loading="lazy">
			</picture>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/sec-message' ); ?>

<?php get_template_part( 'template-parts/sec-values', null, 'py' ); ?>

<?php get_template_part( 'template-parts/sec-company' ); ?>

<?php get_template_part( 'template-parts/sec-faq' ); ?>

<?php
get_footer();
?>
