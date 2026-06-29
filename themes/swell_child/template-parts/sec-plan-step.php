<?php
/**
 * 散骨プラン共通の流れセクション。
 *
 * 貸切散骨・代理散骨で共通する散骨の流れを出力し、plan 引数に応じて step4 だけ切り替えます。
 *
 * @package SunfishSankotsu
 */

$sec_plan_step_plan = is_array( $args ) && ! empty( $args['plan'] ) ? sanitize_key( (string) $args['plan'] ) : 'kashikiri';

if ( ! in_array( $sec_plan_step_plan, array( 'kashikiri', 'dairi' ), true ) ) {
	$sec_plan_step_plan = 'kashikiri';
}

$sec_plan_step_page_slug = get_post_field( 'post_name', get_queried_object_id() );
$sec_plan_step_title_id  = sanitize_title( ( $sec_plan_step_page_slug ? $sec_plan_step_page_slug : $sec_plan_step_plan ) . '-step-title' );
$sec_plan_step_items     = array(
	array(
		'number' => '1',
		'title'  => '相談・問い合わせ',
		'image'  => 'illustrations/flow/step1-contact.png',
		'texts'  => array(
			'公式LINE、お電話、またはフォームよりお気軽にご連絡ください。',
			'初めてで不安な点や、ご希望の日程・人数等を直接お伺いし、最適なプランをご提案します。',
		),
	),
	array(
		'number' => '2',
		'title'  => 'お申し込み・粉骨手配',
		'image'  => 'illustrations/flow/step2-arrangement.png',
		'texts'  => array(
			'お申し込み後、弊社提携の粉骨専門センターより「送骨キット」をお届けします。',
			'ご遺族には、届いた送骨キットを使ってご遺骨を郵送していただきます。',
		),
	),
	array(
		'number' => '3',
		'title'  => '粉骨・ご遺骨の安置',
		'image'  => 'illustrations/flow/step3-custody.png',
		'texts'  => array(
			'ご遺骨が到着後、散骨に適した2mm以下のパウダー状に加工いたします。',
			'粉骨されたご遺骨は弊社へ届けられ、実施当日まで責任を持って大切に安置・保管させていただきます。',
		),
	),
	array(),
	array(
		'number' => '5',
		'title'  => '帰港・散骨証明書の発行',
		'image'  => 'illustrations/flow/step5-certificate.png',
		'texts'  => array(
			'セレモニー終了後、ゆっくりと旋回して別れを告げ、帰港します。',
			'後日、散骨した正確な緯度経度を記載した「海洋散骨証明書」と、当日の記録写真・動画データを送付いたします。',
		),
	),
	array(
		'number' => '6',
		'title'  => '再訪のご案内',
		'image'  => 'illustrations/flow/step6-reunion.png',
		'texts'  => array(
			'散骨は「お別れ」ではなく、新しい繋がりの始まりです。',
			'数年後、数十年後も「会いにいこう」と、笑顔で石垣島の海を訪れていただけるよう、メモリアルクルーズのご相談も承ります。',
		),
	),
);

$sec_plan_step_items[3] = 'dairi' === $sec_plan_step_plan
	? array(
		'number' => '4',
		'title'  => '選定・散骨セレモニー',
		'image'  => 'illustrations/flow/step4-selection.png',
		'texts'  => array(
			'ご遺族の立ち会いがないからこそ、海が穏やかな日を選定し、散骨ポイントへ出航します。',
			'ポイント到着後は、船長がご遺族に代わり、献酒・散骨・花びらを撒くお見送りを丁寧に行い、その様子を記録します。',
		),
	)
	: array(
		'number' => '4',
		'title'  => '港集合・散骨セレモニー',
		'image'  => 'illustrations/flow/step4-ceremony.png',
		'texts'  => array(
			'自社所有の船が停泊する港に集合し、船長より流れをご説明した後、散骨ポイントへ出港します。',
			'ポイント到着後、開式の辞と各セレモニーを行い、ご家族の手で故人様のご遺骨を海へお還ししていただきます。',
		),
	);
?>

<section class="p-sec-step u-pd-pt-5 u-pd-pb-6" aria-labelledby="<?php echo esc_attr( $sec_plan_step_title_id ); ?>">
	<picture class="p-sec-step__bg" aria-hidden="true">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="" loading="lazy">
	</picture>

	<div class="p-sec-step__inner u-container">
		<div class="p-sec-step__title c-sec-title c-sec-title--center c-sec-title--white u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Step</p>
			<h2 id="<?php echo esc_attr( $sec_plan_step_title_id ); ?>" class="c-sec-title__main">散骨の流れ</h2>
		</div>

		<ol class="p-sec-step__list">
			<?php foreach ( $sec_plan_step_items as $sec_plan_step_item ) : ?>
				<?php
				$sec_plan_step_number = ! empty( $sec_plan_step_item['number'] ) ? (string) $sec_plan_step_item['number'] : '';
				$sec_plan_step_name   = ! empty( $sec_plan_step_item['title'] ) ? (string) $sec_plan_step_item['title'] : '';
				$sec_plan_step_texts  = ! empty( $sec_plan_step_item['texts'] ) && is_array( $sec_plan_step_item['texts'] ) ? $sec_plan_step_item['texts'] : array();
				$sec_plan_step_image  = ! empty( $sec_plan_step_item['image'] ) ? (string) $sec_plan_step_item['image'] : '';
				?>
				<?php if ( '' !== $sec_plan_step_number && '' !== $sec_plan_step_name ) : ?>
					<li class="p-sec-step__item u-fade-up">
						<article class="p-sec-step__card">
							<p class="p-sec-step__label">
								<span class="p-sec-step__label-text">Step</span>
								<span class="p-sec-step__number"><?php echo esc_html( $sec_plan_step_number ); ?></span>
							</p>

							<?php if ( '' !== $sec_plan_step_image ) : ?>
								<div class="p-sec-step__image" aria-hidden="true">
									<img src="<?php echo esc_url( theme_image_url( $sec_plan_step_image ) ); ?>" width="128" height="128" alt="" loading="lazy">
								</div>
							<?php endif; ?>

							<div class="p-sec-step__content">
								<h3 class="p-sec-step__card-title"><?php echo esc_html( $sec_plan_step_name ); ?></h3>
								<?php if ( ! empty( $sec_plan_step_texts ) ) : ?>
									<div class="p-sec-step__body">
										<?php foreach ( $sec_plan_step_texts as $sec_plan_step_text ) : ?>
											<p><?php echo esc_html( (string) $sec_plan_step_text ); ?></p>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</article>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
