<?php
/**
 * Template Name: 会社概要
 *
 * 代表メッセージ、会社概要、その他の事業を掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();

$company_business_items = array(
	array(
		'title' => 'マリンサービスサンフィッシュ石垣島',
		'texts' => array(
			'石垣島の海をフィールドに、少人数制で安心して楽しめるマリンアクティビティを案内しています。',
			'海を熟知したスタッフが、初めての方にも分かりやすくサポートします。',
		),
		'image' => 'company/business-logo.jpg',
		'alt'   => 'マリンサービスサンフィッシュ石垣島のロゴ',
		'url'   => 'https://isigakijima-diving.com/',
	),
	array(
		'title' => 'マリンサービスサンフィッシュ石垣島',
		'texts' => array(
			'石垣島の海をフィールドに、少人数制で安心して楽しめるマリンアクティビティを案内しています。',
			'海を熟知したスタッフが、初めての方にも分かりやすくサポートします。',
		),
		'image' => 'company/business-logo.jpg',
		'alt'   => 'マリンサービスサンフィッシュ石垣島のロゴ',
		'url'   => 'https://isigakijima-diving.com/',
	),
	array(
		'title' => 'マリンサービスサンフィッシュ石垣島',
		'texts' => array(
			'石垣島の海をフィールドに、少人数制で安心して楽しめるマリンアクティビティを案内しています。',
			'海を熟知したスタッフが、初めての方にも分かりやすくサポートします。',
		),
		'image' => 'company/business-logo.jpg',
		'alt'   => 'マリンサービスサンフィッシュ石垣島のロゴ',
		'url'   => 'https://isigakijima-diving.com/',
	),
);
?>

<?php
get_template_part(
	'template-parts/page-kv',
	null,
	array(
		'id'    => 'company-page-title',
		'title' => '会社概要',
	)
);
?>

<?php get_template_part( 'template-parts/sec-message' ); ?>

<?php get_template_part( 'template-parts/sec-company', null, 'pale' ); ?>

<section class="l-business" aria-labelledby="company-business-title">
	<div class="l-business__inner u-container">
		<div class="l-business__title c-sec-title c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Company</p>
			<h2 id="company-business-title" class="c-sec-title__main">その他の事業</h2>
		</div>

		<div class="l-business__list">
			<?php foreach ( $company_business_items as $index => $item ) : ?>
				<article class="l-business__item<?php echo 1 === $index ? ' l-business__item--reverse' : ''; ?>">
					<div class="l-business__content">
						<h3 class="l-business__item-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<div class="l-business__body">
							<?php foreach ( $item['texts'] as $text ) : ?>
								<p><?php echo esc_html( $text ); ?></p>
							<?php endforeach; ?>
						</div>
						<div class="l-business__button c-sec-btn c-sec-btn--next">
							<a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer">詳細はこちら</a>
						</div>
					</div>

					<picture class="l-business__media">
						<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="511" height="511" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy">
					</picture>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>
