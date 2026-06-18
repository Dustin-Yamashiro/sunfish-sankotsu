<?php
/**
 * 共通コラムセクションのテンプレート。
 *
 * 投稿カテゴリー `column` の記事を、トップページや固定ページで使える
 * Splide スライダー用のコラム一覧として出力します。
 *
 * @package SunfishSankotsu
 */
?>
<?php
$front_column_category = get_category_by_slug( 'column' );
$front_column_args     = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 8,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
);

if ( $front_column_category ) {
	$front_column_args['cat'] = (int) $front_column_category->term_id;
}

$front_column_query = new WP_Query( $front_column_args );
?>
<section class="l-sec-column u-section-space" aria-labelledby="front-column-title">
	<div class="l-sec-column__heading u-container">
		<div class="l-sec-column__title c-sec-title c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Blog</p>
			<h2 id="front-column-title" class="c-sec-title__main">海洋散骨コラム</h2>
		</div>
	</div>

	<div class="l-sec-column__list-wrap u-container">
		<div class="l-sec-column__slider splide js-column-slider" aria-label="海洋散骨コラム記事一覧">
			<div class="splide__track">
				<?php
				SWELL_Theme::get_parts(
					'parts/post_list/loop_sub',
					array(
						'query'     => $front_column_query,
						'list_args' => array(
							'type'           => 'card',
							'max_col'        => '4',
							'max_col_sp'     => '1',
							'ul_add_class'   => 'l-sec-column__list splide__list',
							'show_infeed'    => false,
							'cat_pos'        => 'on_thumb',
							'show_date'      => true,
							'show_modified'  => false,
							'show_author'    => false,
							'excerpt_length' => 80,
							'h_tag'          => 'h3',
						),
					)
				);
				?>
			</div>
		</div>
	</div>

	<div class="l-sec-column__more-wrap u-container">
		<div class="l-sec-column__more c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">もっと見る</a>
		</div>
	</div>
</section>

<?php wp_reset_postdata(); ?>
