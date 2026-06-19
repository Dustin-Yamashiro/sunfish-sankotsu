<?php
/**
 * FAQアコーディオンパーツ。
 *
 * FAQ項目の配列を受け取り、共通の質問・回答アコーディオンを出力します。
 *
 * @package SunfishSankotsu
 */

$faq_items      = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$faq_id_base    = ! empty( $args['id_base'] ) ? sanitize_title( (string) $args['id_base'] ) : 'faq-accordion';
$faq_open_first = ! empty( $args['open_first'] );

if ( empty( $faq_items ) ) {
	return;
}
?>

<div class="c-faq-accordion js-faq-accordion">
	<?php foreach ( $faq_items as $faq_index => $faq_item ) : ?>
		<?php
		$faq_question = isset( $faq_item['question'] ) ? (string) $faq_item['question'] : '';
		$faq_answers  = isset( $faq_item['answer'] ) && is_array( $faq_item['answer'] ) ? $faq_item['answer'] : array();
		$faq_panel_id = $faq_id_base . '-panel-' . ( $faq_index + 1 );
		$faq_is_open  = $faq_open_first && 0 === $faq_index;
		?>
		<section class="c-faq-accordion__item js-faq-accordion-item<?php echo $faq_is_open ? ' is-open' : ''; ?>">
			<h3 class="c-faq-accordion__question">
				<button class="c-faq-accordion__trigger js-faq-accordion-button" type="button" aria-expanded="<?php echo $faq_is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $faq_panel_id ); ?>">
					<span class="c-faq-accordion__mark c-faq-accordion__mark--question" aria-hidden="true">Q.</span>
					<span class="c-faq-accordion__question-text"><?php echo esc_html( $faq_question ); ?></span>
					<span class="c-faq-accordion__toggle-icon" aria-hidden="true"></span>
				</button>
			</h3>
			<div id="<?php echo esc_attr( $faq_panel_id ); ?>" class="c-faq-accordion__answer js-faq-accordion-panel" aria-hidden="<?php echo $faq_is_open ? 'false' : 'true'; ?>">
				<div class="c-faq-accordion__answer-inner">
					<span class="c-faq-accordion__mark c-faq-accordion__mark--answer" aria-hidden="true">A.</span>
					<div class="c-faq-accordion__answer-body">
						<?php foreach ( $faq_answers as $faq_answer ) : ?>
							<p><?php echo esc_html( $faq_answer ); ?></p>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endforeach; ?>
</div>
