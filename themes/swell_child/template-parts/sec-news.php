<?php
/**
 * 共通お知らせセクションのテンプレート。
 *
 * 投稿カテゴリー `news` の最新記事を、お知らせ一覧として出力します。
 * 日付、カテゴリー、タイトルを並べるトップページ用のニュース導線です。
 *
 * @package SunfishSankotsu
 */
?>
<?php
$front_news_category = get_category_by_slug( 'news' );
$front_news_args     = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 3,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
);

if ( $front_news_category ) {
	$front_news_args['cat'] = (int) $front_news_category->term_id;
}

$front_news_query = new WP_Query( $front_news_args );
?>
<section class="l-sec-news u-section-space" aria-labelledby="front-news-title">
	<div class="l-sec-news__inner u-container">
		<div class="l-sec-news__title c-sec-title u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">News</p>
			<h2 id="front-news-title" class="c-sec-title__main">お知らせ</h2>
		</div>

		<div class="l-sec-news__list">
			<?php if ( $front_news_query->have_posts() ) : ?>
				<?php while ( $front_news_query->have_posts() ) : ?>
					<?php
					$front_news_query->the_post();
					$front_news_item_id = 'front-news-item-' . get_the_ID();
					$front_news_terms   = get_the_category();
					$front_news_term    = null;
					$front_news_base_id = $front_news_category ? (int) $front_news_category->term_id : 0;

					foreach ( $front_news_terms as $front_news_candidate ) {
						if ( (int) $front_news_candidate->term_id !== $front_news_base_id ) {
							$front_news_term = $front_news_candidate;
							break;
						}
					}

					if ( ! $front_news_term && ! empty( $front_news_terms[0] ) ) {
						$front_news_term = $front_news_terms[0];
					}
					?>
						<article class="l-sec-news__item" aria-labelledby="<?php echo esc_attr( $front_news_item_id ); ?>">
							<a class="l-sec-news__link" href="<?php echo esc_url( get_permalink() ); ?>">
								<span class="l-sec-news__meta">
									<time class="l-sec-news__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
									<?php if ( $front_news_term ) : ?>
										<span class="l-sec-news__category"><?php echo esc_html( $front_news_term->name ); ?></span>
									<?php endif; ?>
								</span>
								<h3 id="<?php echo esc_attr( $front_news_item_id ); ?>" class="l-sec-news__item-title"><?php echo esc_html( get_the_title() ); ?></h3>
							</a>
						</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p class="l-sec-news__empty">現在お知らせはありません。</p>
			<?php endif; ?>
		</div>

		<div class="l-sec-news__more c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">もっとみる</a>
		</div>
	</div>
</section>
