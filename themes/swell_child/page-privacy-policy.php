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
		'title' => '1. 収集する個人情報',
		'texts' => array(
			'当社は以下の個人情報を収集します。',
		),
		'items' => array(
			'氏名・住所・電話番号・メールアドレス',
			'故人に関する情報（散骨サービス利用時）',
			'お支払い情報',
		),
	),
	array(
		'title' => '2. 利用目的',
		'texts' => array(
			'収集した個人情報は以下の目的で使用します。',
		),
		'items' => array(
			'サービスの提供および運営',
			'お問い合わせへの対応',
			'法令上の義務の履行',
			'当社サービスに関するご案内（同意いただいた場合）',
		),
	),
	array(
		'title' => '3. 第三者への提供',
		'texts' => array(
			'当社は、以下の場合を除き、個人情報を第三者に提供しません。',
		),
		'items' => array(
			'法令に基づく場合',
			'お客様の同意がある場合',
			'人の生命・身体・財産の保護に必要な場合',
		),
	),
	array(
		'title' => '4. 個人情報の安全管理',
		'texts' => array(
			'当社は個人情報の漏洩・滅失・毀損を防ぐため、適切なセキュリティ措置を講じます。',
		),
	),
	array(
		'title' => '5. 開示・訂正・削除',
		'texts' => array(
			'お客様は自己の個人情報の開示・訂正・削除を請求できます。下記お問い合わせ先までご連絡ください。',
		),
	),
	array(
		'title' => '6. Cookieの使用',
		'texts' => array(
			'当社ウェブサイトでは、サービス改善のためCookieを使用する場合があります。ブラウザの設定により無効化できます。',
		),
	),
	array(
		'title' => '7. お問い合わせ',
		'texts' => array(
			'個人情報に関するお問い合わせは下記までお願いします。',
		),
		'contacts' => array(
			array(
				'term'  => '合同会社サンフィッシュ',
				'value' => '',
			),
			array(
				'term'  => 'Email',
				'value' => 'sunfish.ishigaki@gmail.com',
				'url'   => 'mailto:sunfish.ishigaki@gmail.com',
			),
			array(
				'term'  => 'LINE',
				'value' => 'https://lin.ee/S6W9e0r',
				'url'   => 'https://lin.ee/S6W9e0r',
			),
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
			<div class="l-legal__section">
				<div class="l-legal__body">
					<p>合同会社サンフィッシュ（以下「当社」）は、お客様の個人情報の保護を重要な責務と認識し、以下のとおり取り扱います。</p>
				</div>
			</div>

			<?php foreach ( $privacy_sections as $index => $section ) : ?>
				<?php $heading_id = 'privacy-policy-section-' . ( $index + 1 ); ?>
				<article class="l-legal__section" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="l-legal__heading"><?php echo esc_html( $section['title'] ); ?></h2>
					<div class="l-legal__body">
						<?php foreach ( $section['texts'] as $text ) : ?>
							<p><?php echo esc_html( $text ); ?></p>
						<?php endforeach; ?>

						<?php if ( ! empty( $section['items'] ) ) : ?>
							<ul class="l-legal__items">
								<?php foreach ( $section['items'] as $item ) : ?>
									<li class="l-legal__item"><?php echo esc_html( $item ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<?php if ( ! empty( $section['contacts'] ) ) : ?>
							<dl class="l-legal__contact-list">
								<?php foreach ( $section['contacts'] as $contact ) : ?>
									<div class="l-legal__contact-row">
										<dt class="l-legal__contact-term"><?php echo esc_html( $contact['term'] ); ?><?php echo '' !== $contact['value'] ? '：' : ''; ?></dt>
										<?php if ( '' !== $contact['value'] ) : ?>
											<dd class="l-legal__contact-description">
												<?php if ( ! empty( $contact['url'] ) ) : ?>
													<a href="<?php echo esc_url( $contact['url'] ); ?>"<?php echo 0 === strpos( $contact['url'], 'http' ) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>><?php echo esc_html( $contact['value'] ); ?></a>
												<?php else : ?>
													<?php echo esc_html( $contact['value'] ); ?>
												<?php endif; ?>
											</dd>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</dl>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
