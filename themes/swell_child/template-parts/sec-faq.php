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
					'items'   => $sec_faq_items,
					'id_base' => $sec_faq_panel_base,
				)
			);
			?>
		</div>

		<div class="p-sec-faq__more c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">もっとみる</a>
		</div>
	</div>
</section>
