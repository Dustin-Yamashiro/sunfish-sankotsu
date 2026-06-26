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
		'title' => '第1条（目的）',
		'texts' => array(
			'本規約は、合同会社サンフィッシュ（以下「当社」）が提供する海洋散骨サービス（以下「本サービス」）の利用条件を定めるものです。',
		),
	),
	array(
		'title' => '第2条（適用）',
		'texts' => array(
			'本規約は、本サービスを利用するすべてのお客様（以下「利用者」）に適用されます。',
		),
	),
	array(
		'title' => '第3条（サービス内容）',
		'texts' => array(
			'当社は、墓地、埋葬等に関する法律および関連法令を遵守した上で、石垣島近海における海洋散骨サービスを提供します。',
		),
	),
	array(
		'title' => '第4条（申込方法）',
		'texts' => array(
			'サービスのお申込みは、当社所定のフォームまたは電話・LINEにてお受けします。申込完了後、当社より確認のご連絡をいたします。',
		),
	),
	array(
		'title' => '第5条（料金および支払い）',
		'texts' => array(
			'料金は当社ウェブサイトに掲載の金額とします。お支払いは、サービス実施前までに銀行振込またはクレジットカードにてお願いいたします。',
		),
	),
	array(
		'title' => '第6条（キャンセル・変更）',
		'items' => array(
			'お客様都合によるキャンセルは、実施日7日前までは無料、3〜6日前は料金の50%、2日前以降は料金の100%をキャンセル料としていただきます。',
			'天候・海況不良による中止の場合、代替日程を設けるか全額返金いたします。',
		),
		'list_type' => 'ol',
	),
	array(
		'title' => '第7条（遺骨の取り扱い）',
		'texts' => array(
			'お預かりした遺骨は、法令に基づき適切に取り扱い、散骨後の回収はできません。散骨は一度限りの不可逆的な行為であることをご了承ください。',
		),
	),
	array(
		'title' => '第8条（禁止事項）',
		'texts' => array(
			'利用者は以下の行為を行ってはなりません。',
		),
		'items' => array(
			'法令または公序良俗に反する行為',
			'当社または第三者の権利を侵害する行為',
			'虚偽の情報を申告する行為',
		),
	),
	array(
		'title' => '第9条（免責事項）',
		'texts' => array(
			'天候・海況など不可抗力による損害について、当社は責任を負いかねます。また、散骨後の遺骨の状態について保証はいたしません。',
		),
	),
	array(
		'title' => '第10条（個人情報の取り扱い）',
		'texts' => array(
			'お客様の個人情報は、当社プライバシーポリシーに従い適切に管理します。',
		),
	),
	array(
		'title' => '第11条（規約の変更）',
		'texts' => array(
			'当社は必要に応じて本規約を変更することがあります。変更後の規約はウェブサイトに掲載した時点で効力を生じます。',
		),
	),
	array(
		'title' => '第12条（準拠法・管轄）',
		'texts' => array(
			'本規約は日本法に準拠し、那覇地方裁判所を第一審の専属的合意管轄裁判所とします。',
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

<section class="l-legal u-pd-pt-4 u-pd-pb-6">
	<div class="l-legal__inner u-container u-container--narrow">
		<div class="l-legal__list">
			<?php foreach ( $terms_sections as $index => $section ) : ?>
				<?php $heading_id = 'terms-section-' . ( $index + 1 ); ?>
				<article class="l-legal__section" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="l-legal__heading"><?php echo esc_html( $section['title'] ); ?></h2>
					<div class="l-legal__body">
						<?php if ( ! empty( $section['texts'] ) ) : ?>
							<?php foreach ( $section['texts'] as $text ) : ?>
								<p><?php echo esc_html( $text ); ?></p>
							<?php endforeach; ?>
						<?php endif; ?>

						<?php if ( ! empty( $section['items'] ) ) : ?>
							<?php $list_tag = ! empty( $section['list_type'] ) && 'ol' === $section['list_type'] ? 'ol' : 'ul'; ?>
							<<?php echo esc_html( $list_tag ); ?> class="l-legal__items">
								<?php foreach ( $section['items'] as $item ) : ?>
									<li class="l-legal__item"><?php echo esc_html( $item ); ?></li>
								<?php endforeach; ?>
							</<?php echo esc_html( $list_tag ); ?>>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
