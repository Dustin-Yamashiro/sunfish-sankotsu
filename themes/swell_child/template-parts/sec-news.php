<?php
/**
 * お知らせセクションのテンプレート。
 *
 * 投稿カテゴリー `news` の最新記事を、お知らせ一覧として出力します。
 *
 * @package SunfishSankotsu
 */

$sec_news_category = get_category_by_slug( 'news' );
$sec_news_query_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 3,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
);

if ( $sec_news_category && 0 < (int) $sec_news_category->count ) {
	$sec_news_query_args['cat'] = (int) $sec_news_category->term_id;
}

$sec_news_query = new WP_Query( $sec_news_query_args );
?>
<section class="p-sec-news u-pd-py-5" aria-labelledby="front-news-title">
	<div class="p-sec-news__inner u-container">
		<div class="p-sec-news__title c-sec-title u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">News</p>
			<h2 id="front-news-title" class="c-sec-title__main">お知らせ</h2>
		</div>

		<div class="p-sec-news__list">
			<?php if ( $sec_news_query->have_posts() ) : ?>
				<?php while ( $sec_news_query->have_posts() ) : ?>
					<?php
					$sec_news_query->the_post();
					$sec_news_item_id = 'front-news-title-item-' . get_the_ID();
					$sec_news_terms   = get_the_category();
					$sec_news_term    = null;
					$sec_news_base_id = $sec_news_category ? (int) $sec_news_category->term_id : 0;

					foreach ( $sec_news_terms as $sec_news_candidate ) {
						if ( (int) $sec_news_candidate->term_id !== $sec_news_base_id ) {
							$sec_news_term = $sec_news_candidate;
							break;
						}
					}

					if ( ! $sec_news_term && ! empty( $sec_news_terms[0] ) ) {
						$sec_news_term = $sec_news_terms[0];
					}
					?>
						<article class="p-sec-news__item" aria-labelledby="<?php echo esc_attr( $sec_news_item_id ); ?>">
							<a class="p-sec-news__link" href="<?php echo esc_url( get_permalink() ); ?>">
								<span class="p-sec-news__meta">
									<time class="p-sec-news__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
									<?php if ( $sec_news_term ) : ?>
										<span class="p-sec-news__category"><?php echo esc_html( $sec_news_term->name ); ?></span>
									<?php endif; ?>
								</span>
								<h3 id="<?php echo esc_attr( $sec_news_item_id ); ?>" class="p-sec-news__item-title"><?php echo esc_html( get_the_title() ); ?></h3>
							</a>
						</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p class="p-sec-news__empty">現在お知らせはありません。</p>
			<?php endif; ?>
		</div>

		<div class="p-sec-news__more c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">もっとみる</a>
		</div>
	</div>
</section>
