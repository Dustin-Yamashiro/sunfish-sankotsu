<?php
/**
 * Template Name: よくある質問
 *
 * FAQカテゴリーとFAQ投稿の質問・回答アコーディオンを掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();

$faq_categories = get_terms(
	array(
		'taxonomy'   => 'faq_category',
		'hide_empty' => true,
		'meta_key'   => 'display_order',
		'orderby'    => 'meta_value_num',
		'order'      => 'ASC',
	)
);

if ( is_wp_error( $faq_categories ) ) {
	$faq_categories = array();
}
?>

<?php
get_template_part(
	'template-parts/page-kv',
	null,
	array(
		'id'    => 'faq-page-title',
		'title' => 'よくある質問',
	)
);
?>

<section class="l-faq" aria-labelledby="faq-list-title">
	<div class="l-faq__inner u-container">
		<nav class="l-faq__nav" aria-label="FAQカテゴリー">
			<ul class="l-faq__nav-list">
				<?php foreach ( $faq_categories as $faq_category ) : ?>
					<li class="l-faq__nav-item">
						<a class="l-faq__nav-link" href="#faq-<?php echo esc_attr( $faq_category->slug ); ?>"><?php echo esc_html( $faq_category->name ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="l-faq__content">
			<h2 id="faq-list-title" class="l-faq__hidden-title">よくある質問一覧</h2>
			<?php foreach ( $faq_categories as $faq_category ) : ?>
				<section id="faq-<?php echo esc_attr( $faq_category->slug ); ?>" class="l-faq__category" aria-labelledby="faq-<?php echo esc_attr( $faq_category->slug ); ?>-title">
					<h3 id="faq-<?php echo esc_attr( $faq_category->slug ); ?>-title" class="l-faq__heading"><?php echo esc_html( $faq_category->name ); ?></h3>
					<?php
					get_template_part(
						'template-parts/faq-accordion',
						null,
						array(
							'category' => $faq_category->slug,
							'limit'    => -1,
							'id_base'  => 'faq-' . $faq_category->slug,
						)
					);
					?>
				</section>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>
