<?php
/**
 * Template Name: 私たちについて
 *
 * 石垣島海洋散骨センターの想い、代表メッセージ、会社概要を掲載する固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();
?>

<?php
get_template_part(
	'template-parts/page-kv',
	null,
	array(
		'id'    => 'about-page-title',
		'title' => '私たちについて',
	)
);
?>

<section class="p-sec-split u-pd-pt-3 u-pd-pb-1" aria-labelledby="about-vision-title">
	<div class="p-sec-split__inner u-container">
		<div class="p-sec-split__content">
			<div class="p-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Vision</p>
				<h2 id="about-vision-title" class="c-sec-title__main">石垣島の海を、<br>「あの人と繋がる場所」へ</h2>
			</div>
			<div class="p-sec-split__body">
				<p>石垣島海洋散骨センターは、沖縄・石垣エリアを拠点に海洋散骨を行う散骨専門業者です。</p>
				<p>私たちが大切にしているのは、海洋散骨を「最後のお別れ」だけで終わらせないこと。</p>
				<p>散骨した石垣島の海が、これからもご家族が手を合わせ、故人様を想える場所として残るよう、ご希望や不安を伺いながら丁寧にご案内します。</p>
			</div>
		</div>

		<div class="p-sec-split__visual">
			<picture class="p-sec-split__image p-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'about/vision-sub.jpeg' ) ); ?>" width="254" height="170" alt="石垣島の透明な海と青空" loading="lazy">
			</picture>
			<picture class="p-sec-split__image p-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'about/vision-main.jpg' ) ); ?>" width="500" height="333" alt="石垣島の浅瀬に浮かぶサンフィッシュの船" loading="lazy">
			</picture>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/sec-message' ); ?>

<?php get_template_part( 'template-parts/sec-values', null, 'pt-5' ); ?>

<?php get_template_part( 'template-parts/sec-company' ); ?>

<?php
get_template_part(
	'template-parts/sec-faq',
	null,
	array(
		'category' => 'general',
	)
);
?>

<?php
get_footer();
?>
