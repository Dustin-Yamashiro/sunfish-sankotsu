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

<?php get_footer(); ?>
