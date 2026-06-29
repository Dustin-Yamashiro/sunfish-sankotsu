<?php
/**
 * 固定ページ共通キービジュアル
 *
 * 下層固定ページのタイトル付きキービジュアルを出力します。
 *
 * @package LocalEnvTheme
 */

$page_kv_defaults = array(
	'id'    => 'page-title-' . get_queried_object_id(),
	'title' => get_the_title(),
);

$page_kv_args = wp_parse_args( is_array( $args ) ? $args : array(), $page_kv_defaults );
?>

<section class="l-page-kv" aria-labelledby="<?php echo esc_attr( $page_kv_args['id'] ); ?>">
	<picture class="l-page-kv__media">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'visuals/bg/sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'visuals/bg/sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="石垣島の海に花を手向ける様子" fetchpriority="high">
	</picture>
	<div class="l-page-kv__inner u-container">
		<h1 id="<?php echo esc_attr( $page_kv_args['id'] ); ?>" class="l-page-kv__title u-bg-wipe u-bg-wipe--load"><?php echo esc_html( $page_kv_args['title'] ); ?></h1>
	</div>
</section>
