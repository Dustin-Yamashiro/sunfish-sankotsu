<?php
/**
 * Template Name: 会社概要
 *
 * 会社概要、その他の事業を掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();

$company_business_items = array(
	array(
		'title' => 'サンフィッシュ石垣島',
		'texts' => array(
			'石垣島で初心者向けシュノーケリングツアーを毎日運営。幻の島上陸・ウミガメなど石垣の海を丸ごと体験できます。現場に出続けるガイドが、安全・丁寧にご案内します。',
		),
		'image'  => 'common/logo/sunfish-ishigaki-logo.png',
		'alt'    => 'サンフィッシュ石垣島のロゴ',
		'url'    => 'https://isigakijima-diving.com/',
	),
	array(
		'title' => 'フィッシュソング（釣り船）',
		'texts' => array(
			'石垣島発の釣り船ツアー。初心者から経験者まで楽しめる海釣り体験を提供しています。南国の青い海で、非日常のフィッシング体験をお楽しみください。',
		),
		'image'  => 'common/logo/fish-song-logo.png',
		'alt'    => 'フィッシュソングのロゴ',
		'url'    => 'https://fishsong-ishigakijima.com/',
	),
	array(
		'title' => 'サンフィッシュ宮古島',
		'texts' => array(
			'宮古島のシュノーケリングツアー専門店。エメラルドグリーンの透明度抜群の海で、サンゴや熱帯魚との出会いを初心者でも安心してお楽しみいただけます。',
		),
		'image'  => 'common/logo/sunfish-miyakojima-logo.png',
		'alt'    => 'サンフィッシュ宮古島のロゴ',
		'url'    => 'https://miyakojima-snorkeling-tours.com/',
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

<?php get_template_part( 'template-parts/sec-company' ); ?>

<section class="p-sec-business u-pd-pt-5 u-pd-pb-6" aria-labelledby="company-business-title">
	<div class="p-sec-business__inner u-container">
		<div class="p-sec-business__title c-sec-title c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Company</p>
			<h2 id="company-business-title" class="c-sec-title__main">その他の事業</h2>
		</div>

		<div class="p-sec-business__list">
			<?php foreach ( $company_business_items as $index => $item ) : ?>
				<article class="p-sec-business__item<?php echo 1 === $index ? ' p-sec-business__item--reverse' : ''; ?>">
					<div class="p-sec-business__content">
						<h3 class="p-sec-business__item-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<div class="p-sec-business__body">
							<?php foreach ( $item['texts'] as $text ) : ?>
								<p><?php echo esc_html( $text ); ?></p>
							<?php endforeach; ?>
						</div>
						<?php if ( ! empty( $item['url'] ) ) : ?>
							<div class="p-sec-business__button c-sec-btn c-sec-btn--next">
								<a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer">公式ページ</a>
							</div>
						<?php endif; ?>
					</div>

					<picture class="p-sec-business__media">
						<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="400" height="400" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy">
					</picture>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>
