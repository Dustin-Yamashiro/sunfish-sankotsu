<?php
/**
 * FAQセクションのテンプレート。
 *
 * よくある質問の見出し、FAQ投稿の回答パネル、一覧導線を出力します。
 *
 * @package SunfishSankotsu
 */

$sec_faq_category   = ! empty( $args['category'] ) ? sanitize_title( (string) $args['category'] ) : 'general';
$sec_faq_limit      = ! empty( $args['limit'] ) ? (int) $args['limit'] : 5;
$sec_faq_panel_base = 'sec-faq-' . $sec_faq_category;
?>
<section class="p-sec-faq" aria-labelledby="front-faq-title">
	<div class="p-sec-faq__inner u-container">
		<div class="p-sec-faq__title c-sec-title c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">FAQ</p>
			<h2 id="front-faq-title" class="c-sec-title__main">よくある質問</h2>
		</div>

		<div class="p-sec-faq__list">
			<?php
			get_template_part(
				'template-parts/faq-accordion',
				null,
				array(
					'category' => $sec_faq_category,
					'limit'    => $sec_faq_limit,
					'id_base'  => $sec_faq_panel_base,
				)
			);
			?>
		</div>

		<div class="p-sec-faq__more c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">もっとみる</a>
		</div>
	</div>
</section>
