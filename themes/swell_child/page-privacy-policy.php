<?php
/**
 * Template Name: プライバシーポリシー
 *
 * 石垣島海洋散骨センターのプライバシーポリシーを掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();

$privacy_sections = array(
	array(
		'title' => '個人情報の取り扱いについて',
		'texts' => array(
			'石垣島海洋散骨センターは、お問い合わせやサービスのお申し込みに際してお預かりする個人情報を、適切かつ慎重に取り扱います。',
			'本ポリシーは、当センターが取得する個人情報の利用目的、管理方法、第三者提供の有無などについて定めるものです。',
		),
	),
	array(
		'title' => '取得する情報について',
		'texts' => array(
			'当センターでは、お問い合わせフォーム、メール、電話、LINE相談、サービスのお申し込みなどを通じて、氏名、電話番号、メールアドレス、ご住所、ご相談内容、実施希望日などの情報を取得する場合があります。',
			'海洋散骨のご案内に必要な範囲で、故人様やご遺族に関する情報、ご遺骨の受け渡しや証明書発行に関する情報をお伺いすることがあります。',
		),
	),
	array(
		'title' => '利用目的について',
		'texts' => array(
			'取得した個人情報は、お問い合わせへの回答、サービス内容のご案内、お見積もり、日程調整、散骨の実施、証明書発行、散骨後のご連絡などに利用します。',
			'また、サービス品質の向上、必要な記録の保管、法令に基づく対応のために利用する場合があります。',
		),
	),
	array(
		'title' => '第三者提供について',
		'texts' => array(
			'当センターは、法令に基づく場合を除き、ご本人の同意なく個人情報を第三者へ提供しません。',
			'粉骨、配送、証明書作成など、サービス提供に必要な業務を外部へ委託する場合は、必要な範囲に限って情報を共有し、適切な管理を行います。',
		),
	),
	array(
		'title' => '安全管理について',
		'texts' => array(
			'当センターは、個人情報の漏えい、紛失、改ざん、不正アクセスを防ぐため、必要かつ適切な安全管理措置を講じます。',
			'個人情報を取り扱う関係者には、適切な管理と守秘を徹底し、不要となった情報は適切な方法で削除または廃棄します。',
		),
	),
	array(
		'title' => '開示・訂正・削除について',
		'texts' => array(
			'ご本人から個人情報の開示、訂正、利用停止、削除などのご希望があった場合は、本人確認のうえ、法令に従って適切に対応します。',
			'個人情報の取り扱いに関するご相談やお問い合わせは、当サイトのお問い合わせフォームよりご連絡ください。',
		),
	),
);
?>

<?php
get_template_part(
	'template-parts/page-kv',
	null,
	array(
		'id'    => 'privacy-policy-page-title',
		'title' => 'プライバシーポリシー',
	)
);
?>

<section class="l-legal u-pd-pt-4 u-pd-pb-6">
	<div class="l-legal__inner u-container u-container--narrow">
		<div class="l-legal__list">
			<?php foreach ( $privacy_sections as $index => $section ) : ?>
				<?php $heading_id = 'privacy-policy-section-' . ( $index + 1 ); ?>
				<article class="l-legal__section" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="l-legal__heading"><?php echo esc_html( $section['title'] ); ?></h2>
					<div class="l-legal__body">
						<?php foreach ( $section['texts'] as $text ) : ?>
							<p><?php echo esc_html( $text ); ?></p>
						<?php endforeach; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
