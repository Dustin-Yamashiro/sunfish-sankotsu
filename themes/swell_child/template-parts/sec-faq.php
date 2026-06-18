<?php
/**
 * FAQセクションのテンプレート。
 *
 * よくある質問の見出し、質問リスト、回答パネル、一覧導線を出力します。
 *
 * @package SunfishSankotsu
 */

$sec_faq_panel_base = 'front-faq-title';
$sec_faq_items      = array(
	array(
		'question' => '海洋散骨が初めてでも相談できますか？',
		'answer'   => array(
			'はい。プラン内容や必要な準備、当日の流れまで、初めての方にも分かりやすくご案内します。',
			'ご家族の不安やご希望を伺いながら、無理のない形で進められるよう丁寧にサポートいたします。',
		),
	),
	array(
		'question' => '散骨する場所は指定できますか？',
		'answer'   => array(
			'石垣島近海の海況や安全面を確認したうえで、ご希望に近い海域をご提案します。',
			'当日の天候や波の状況によっては、船長の判断で安全に実施できる場所へ調整する場合があります。',
		),
	),
	array(
		'question' => '遺骨はどのように準備すればよいですか？',
		'answer'   => array(
			'海洋散骨では、ご遺骨を粉骨した状態で海へお還しします。',
			'粉骨や必要書類についても事前にご説明しますので、分からないことがあればご相談ください。',
		),
	),
	array(
		'question' => '雨天や荒天の場合はどうなりますか？',
		'answer'   => array(
			'安全な出航が難しい場合は、日程の変更をご相談させていただきます。',
			'石垣島の海況を確認しながら、ご家族にとって無理のない日程で進めます。',
		),
	),
	array(
		'question' => '散骨後に証明書は発行されますか？',
		'answer'   => array(
			'散骨後には、散骨証明書の発行に対応しています。',
			'ご希望に応じて写真や動画のご案内、メモリアルクルーズのご相談も承ります。',
		),
	),
);
?>
<section class="l-sec-faq" aria-labelledby="front-faq-title">
	<div class="l-sec-faq__inner u-container">
		<div class="l-sec-faq__title c-sec-title c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">FAQ</p>
			<h2 id="front-faq-title" class="c-sec-title__main">よくある質問</h2>
		</div>

		<div class="l-sec-faq__list js-faq-accordion">
			<?php foreach ( $sec_faq_items as $faq_index => $faq_item ) : ?>
				<?php
				$faq_number   = $faq_index + 1;
				$faq_panel_id = $sec_faq_panel_base . '-panel-' . $faq_number;
				?>
				<section class="l-sec-faq__item">
					<h3 class="l-sec-faq__question">
						<button class="l-sec-faq__trigger js-faq-accordion-button" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $faq_panel_id ); ?>">
							<span class="l-sec-faq__mark l-sec-faq__mark--question" aria-hidden="true">Q.</span>
							<span class="l-sec-faq__question-text"><?php echo esc_html( $faq_item['question'] ); ?></span>
							<span class="l-sec-faq__toggle-icon" aria-hidden="true"></span>
						</button>
					</h3>
					<div id="<?php echo esc_attr( $faq_panel_id ); ?>" class="l-sec-faq__answer js-faq-accordion-panel" aria-hidden="true">
						<div class="l-sec-faq__answer-inner">
							<span class="l-sec-faq__mark l-sec-faq__mark--answer" aria-hidden="true">A.</span>
							<div class="l-sec-faq__answer-body">
								<?php foreach ( $faq_item['answer'] as $faq_answer ) : ?>
									<p><?php echo esc_html( $faq_answer ); ?></p>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endforeach; ?>
		</div>

		<div class="l-sec-faq__more c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">もっとみる</a>
		</div>
	</div>
</section>
