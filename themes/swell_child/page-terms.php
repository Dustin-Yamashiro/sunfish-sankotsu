<?php
/**
 * Template Name: サービス利用規約
 *
 * 石垣島海洋散骨センターのサービス利用規約を掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();

$terms_sections = array(
	array(
		'title' => '散骨クルーズにおける基本方針',
		'texts' => array(
			'石垣島海洋散骨センターは、故人様とご家族のお気持ちを大切にしながら、石垣島近海での海洋散骨を安全かつ丁寧に執り行います。',
			'本規約は、当センターが提供する海洋散骨サービスをご利用いただく際の基本的な条件を定めるものです。お申し込み前に内容をご確認いただき、ご不明点は事前にお問い合わせください。',
		),
	),
	array(
		'title' => 'お申し込みとご準備について',
		'texts' => array(
			'お申し込み後、実施希望日、乗船人数、ご遺骨の状態、献花や献酒などのご希望を確認し、当日の流れをご案内します。',
			'粉骨、必要書類、ご遺骨の受け渡し方法などは、ご利用プランに応じて個別にご案内します。ご家族側で準備が必要なものがある場合は、事前に余裕をもってお知らせします。',
		),
	),
	array(
		'title' => '料金とお支払いについて',
		'texts' => array(
			'サービス料金は、各プランページまたは個別のお見積もりに記載された金額に基づきます。追加のご希望がある場合は、事前に内容と費用をご案内します。',
			'お支払い方法や期日は、お申し込み時にご案内します。期日までに確認が取れない場合、実施日の調整をお願いすることがあります。',
		),
	),
	array(
		'title' => '日程変更・中止について',
		'texts' => array(
			'海上で実施するサービスの性質上、天候、海況、船舶の安全判断により、日程変更または中止をご相談する場合があります。',
			'安全な実施が難しいと判断した場合は、船長の判断を優先し、代替日程や対応方法について速やかにご連絡します。',
		),
	),
	array(
		'title' => 'ご遺骨のお取り扱いについて',
		'texts' => array(
			'お預かりしたご遺骨は、散骨の実施まで責任をもって丁寧に管理します。ご遺骨の受け渡し、保管、散骨の方法については、ご家族のご希望を確認しながら進めます。',
			'法令や安全上の観点から対応できないご希望がある場合は、理由を説明したうえで、可能な範囲で代替案をご提案します。',
		),
	),
	array(
		'title' => '個人情報と記録の取り扱いについて',
		'texts' => array(
			'お申し込みやご相談の際にお預かりした個人情報は、サービスのご案内、実施、連絡、証明書発行など、必要な範囲でのみ利用します。',
			'散骨当日の写真や動画、証明書などの記録は、ご家族への共有を目的として取り扱います。公開利用が必要な場合は、事前に同意をいただきます。',
		),
	),
);
?>

<?php
get_template_part(
	'template-parts/page-kv',
	null,
	array(
		'id'    => 'terms-page-title',
		'title' => '利用規約',
	)
);
?>

<section class="l-legal">
	<div class="l-legal__inner u-container u-container--narrow">
		<div class="l-legal__list">
			<?php foreach ( $terms_sections as $index => $section ) : ?>
				<?php $heading_id = 'terms-section-' . ( $index + 1 ); ?>
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
