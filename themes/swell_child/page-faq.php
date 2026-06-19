<?php
/**
 * Template Name: よくある質問
 *
 * FAQカテゴリと静的な質問・回答アコーディオンを掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();

$faq_categories = array(
	array(
		'id'    => 'private',
		'title' => '貸切散骨について',
		'items' => array(
			array(
				'question' => '質問タイトルが入ります',
				'answer'   => array(
					'テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。',
					'テキストが入ります。テキストが入ります。テキストが入ります。',
				),
			),
			array(
				'question' => '貸切散骨は何名まで乗船できますか？',
				'answer'   => array(
					'乗船人数はプランや当日の海況により調整します。ご家族の人数やご希望を伺ったうえで、安全に実施できる形をご案内します。',
				),
			),
			array(
				'question' => '散骨場所は指定できますか？',
				'answer'   => array(
					'石垣島近海の海況や安全面を確認し、ご希望に近い海域をご提案します。当日の天候によっては船長判断で調整する場合があります。',
				),
			),
		),
	),
	array(
		'id'    => 'proxy',
		'title' => '代理散骨について',
		'items' => array(
			array(
				'question' => '質問タイトルが入ります',
				'answer'   => array(
					'テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。',
					'テキストが入ります。テキストが入ります。テキストが入ります。',
				),
			),
			array(
				'question' => '代理散骨でも証明書は発行されますか？',
				'answer'   => array(
					'散骨後には、実施内容が分かる証明書の発行に対応しています。写真や動画のご案内についても事前にご相談ください。',
				),
			),
			array(
				'question' => '遠方からでも依頼できますか？',
				'answer'   => array(
					'遠方の方でもご相談いただけます。必要な準備やお預かり方法について、事前に分かりやすくご案内します。',
				),
			),
		),
	),
	array(
		'id'    => 'ashes',
		'title' => 'ご遺骨・粉骨について',
		'items' => array(
			array(
				'question' => '粉骨は必要ですか？',
				'answer'   => array(
					'海洋散骨では、ご遺骨を粉骨した状態で海へお還しします。粉骨について不明点がある場合もご相談ください。',
				),
			),
			array(
				'question' => '手元供養用に一部を残せますか？',
				'answer'   => array(
					'ご希望に応じて、一部を手元供養として残す形もご相談いただけます。事前にご家族の意向を確認しながら進めます。',
				),
			),
			array(
				'question' => '必要な書類はありますか？',
				'answer'   => array(
					'必要書類は状況によって異なります。お申し込み時に確認し、準備が必要なものを個別にご案内します。',
				),
			),
		),
	),
	array(
		'id'    => 'price',
		'title' => '費用・お支払いについて',
		'items' => array(
			array(
				'question' => '追加費用は発生しますか？',
				'answer'   => array(
					'基本的な内容は各プラン料金に含まれます。追加対応が必要な場合は、事前に内容と費用をお伝えします。',
				),
			),
			array(
				'question' => '支払い方法を教えてください',
				'answer'   => array(
					'お支払い方法はお申し込み内容に合わせてご案内します。詳細はお問い合わせ時にご確認ください。',
				),
			),
			array(
				'question' => '見積もりだけでも相談できますか？',
				'answer'   => array(
					'可能です。人数やご希望日が未定の段階でも、検討状況に合わせて概算をご案内します。',
				),
			),
		),
	),
	array(
		'id'    => 'schedule',
		'title' => '当日の流れについて',
		'items' => array(
			array(
				'question' => '雨天や荒天の場合はどうなりますか？',
				'answer'   => array(
					'安全な出航が難しい場合は、日程変更をご相談します。海況を確認しながら無理のない実施日を調整します。',
				),
			),
			array(
				'question' => '服装に決まりはありますか？',
				'answer'   => array(
					'厳密な決まりはありません。船上で過ごしやすく、風や日差しに対応しやすい服装をおすすめします。',
				),
			),
			array(
				'question' => '当日の所要時間はどれくらいですか？',
				'answer'   => array(
					'所要時間はプランや海況により変わります。集合から解散までの目安は、お申し込み時に個別にご案内します。',
				),
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
						<a class="l-faq__nav-link" href="#faq-<?php echo esc_attr( $faq_category['id'] ); ?>"><?php echo esc_html( $faq_category['title'] ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="l-faq__content">
			<h2 id="faq-list-title" class="l-faq__hidden-title">よくある質問一覧</h2>
			<?php foreach ( $faq_categories as $faq_category ) : ?>
				<section id="faq-<?php echo esc_attr( $faq_category['id'] ); ?>" class="l-faq__category" aria-labelledby="faq-<?php echo esc_attr( $faq_category['id'] ); ?>-title">
					<h3 id="faq-<?php echo esc_attr( $faq_category['id'] ); ?>-title" class="l-faq__heading"><?php echo esc_html( $faq_category['title'] ); ?></h3>
					<?php
					get_template_part(
						'template-parts/faq-accordion',
						null,
						array(
							'items'      => $faq_category['items'],
							'id_base'    => 'faq-' . $faq_category['id'],
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
