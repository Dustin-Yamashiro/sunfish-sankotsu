<?php
/**
 * Template Name: 初めての方へ
 *
 * 初めて海洋散骨を検討する方向けの固定ページテンプレート。
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
		'id'    => 'beginner-page-title',
		'title' => '初めての方へ',
	)
);
?>

<section class="p-sec-split u-pd-pt-3" aria-labelledby="beginner-introduction-title">
	<div class="p-sec-split__inner u-container">
		<div class="p-sec-split__content">
			<div class="p-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Introduction</p>
				<h2 id="beginner-introduction-title" class="c-sec-title__main">海洋散骨とは</h2>
			</div>
			<div class="p-sec-split__body">
				<p>海洋散骨とは、お墓へ納骨する代わりに、ご遺骨を粉骨して海へ供養する自然葬の一つです。</p>
				<p>通常の供養とは違い、散骨した海をこれからも故人様を想う場所として残せる、新しい供養のカタチとして選ばれています。</p>
				<p>石垣島海洋散骨センターでは、海洋散骨が初めての方でも安心して故人様をお見送りできるよう、分かりやすく丁寧にサポートしています。</p>
			</div>
		</div>

		<div class="p-sec-split__visual">
			<picture class="p-sec-split__image p-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'visuals/split/beginner/01.png' ) ); ?>" width="254" height="170" alt="船のそばの海面に浮かぶ白い花" loading="lazy">
			</picture>
			<picture class="p-sec-split__image p-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'visuals/split/beginner/02.png' ) ); ?>" width="500" height="333" alt="船上で石垣島の海に手を合わせるご家族" loading="lazy">
			</picture>
		</div>
	</div>
</section>

<?php
$reason_items = array(
	array(
		'image' => 'illustrations/appeal/beginner/reason1.png',
		'alt'   => '家族で写真を見ながら海洋散骨について相談する様子',
		'texts' => array(
			'お墓の後継者がいない',
			'子や孫に負担をかけたくない',
		),
	),
	array(
		'image' => 'illustrations/appeal/beginner/reason2.png',
		'alt'   => '家族で海を見ながら故人を見送る様子',
		'texts' => array(
			'故人が好きだった海で散骨がしたい',
			'石垣の海で散骨がしたい',
		),
	),
	array(
		'image' => 'illustrations/appeal/beginner/reason3.png',
		'alt'   => '石垣島の海に浮かぶ散骨用の船',
		'texts' => array(
			'宗教に縛られず自由に還したい',
			'お墓ではなく自然に供養したい',
		),
	),
);
?>

<section class="p-sec-reason u-pd-pt-5 u-pd-pb-7" aria-labelledby="beginner-reason-title">
	<div class="p-sec-reason__inner u-container">
		<h2 id="beginner-reason-title" class="p-sec-reason__title u-fade-up">このような「想い」の方に<br>選ばれています</h2>

		<div class="p-sec-reason__list">
			<?php foreach ( $reason_items as $item ) : ?>
				<article class="p-sec-reason__item">
					<picture class="p-sec-reason__image">
						<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="1254" height="1254" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy">
					</picture>

					<ul class="p-sec-reason__text-list p-sec-reason__text-list--bullet">
						<?php foreach ( $item['texts'] as $text ) : ?>
							<li><?php echo esc_html( $text ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="p-sec-feature p-sec-feature--compact js-feature-sec" aria-labelledby="beginner-feature-title" data-feature-sec>
	<div class="p-sec-feature__inner u-container">
		<div class="p-sec-feature__message">
			<div class="p-sec-feature__title c-sec-title u-fade-up c-sec-title--white">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Feature</p>
				<h2 id="beginner-feature-title" class="c-sec-title__main">海洋散骨の魅力</h2>
			</div>
			<div class="p-sec-feature__body">
				<p>海洋散骨は、故人様を海へお還しして終わる供養ではありません。</p>
				<p>散骨した海が、これからも手を合わせる場所として残り続けます。</p>
				<p>お墓とは違う形でも、故人様を大切に想える、新しいカタチの供養として選ばれています。</p>
			</div>
		</div>

		<?php
		$features = array(
			array(
				'title' => '自然の中へ送り出せる供養',
				'texts' => array(
					'海洋散骨は、従来のお墓の形にとらわれず、自然の中へ故人様を送り出せる供養です。',
					'ご家族の想いを大切にしながら、海や空、風に包まれた場所で故人様を見送ることができます。',
				),
				'image' => 'visuals/feature/beginner/01.png',
				'alt'   => '海へ花びらを手向ける手元',
			),
			array(
				'title' => '散骨した海が供養の場所に',
				'texts' => array(
					'海洋散骨では、散骨した海そのものが故人様を想う場所になります。',
					'お墓がなくても、海を見るたびに故人様を思い出せる、ご家族の大切な記憶として残り続けます。',
				),
				'image' => 'visuals/feature/beginner/02.jpeg',
				'alt'   => '石垣島の青い海と空',
			),
			array(
				'title' => '無理なく選べるお見送り',
				'texts' => array(
					'海洋散骨は、故人様らしさを大切にしつつ、ご家族の状況に合わせた供養が可能です。',
					'乗船の有無や日程、ご予算に合わせて、ご家族にとって無理のないお見送りの形を選べます。',
				),
				'image' => 'visuals/feature/beginner/03.png',
				'alt'   => '船上から海に向かって手を合わせる人',
			),
		);
		?>

		<div class="p-sec-feature__points" data-feature-sec-points>
			<ol class="p-sec-feature__point-list">
				<?php foreach ( $features as $i => $item ) : ?>
					<?php
					$number       = $i + 1;
					$class_number = sprintf( '%02d', $number );
					?>
					<li class="p-sec-feature__point-item p-sec-feature__point-item--<?php echo esc_attr( $class_number ); ?><?php echo 0 === $i ? ' is-active' : ''; ?>" data-feature-sec-card data-point-index="<?php echo esc_attr( $number ); ?>">
						<article class="p-sec-feature__point-card">
							<div class="p-sec-feature__point-content">
								<p class="p-sec-feature__point-label">
									<span class="p-sec-feature__point-text">Point</span>
									<span class="p-sec-feature__point-number"><?php echo esc_html( $number ); ?></span>
								</p>
								<h3 class="p-sec-feature__point-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<div class="p-sec-feature__point-body">
									<?php foreach ( $item['texts'] as $text ) : ?>
										<p><?php echo esc_html( $text ); ?></p>
									<?php endforeach; ?>
								</div>
							</div>
							<picture class="p-sec-feature__point-image">
								<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="292" height="336" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy">
							</picture>
						</article>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div class="p-sec-feature__scrollbar" aria-hidden="true">
			<span class="p-sec-feature__scrollbar-thumb" data-feature-sec-scrollbar></span>
		</div>

		<img class="p-sec-feature__island" src="<?php echo esc_url( theme_image_url( 'common/icon/ishigaki.svg' ) ); ?>" width="300" height="375" alt="" loading="lazy" aria-hidden="true">
	</div>
</section>

<?php get_template_part( 'template-parts/sec-values' ); ?>

<?php get_template_part( 'template-parts/sec-plan' ); ?>

<?php
get_template_part(
	'template-parts/sec-plan-step',
	null,
	array(
		'plan' => 'kashikiri',
	)
);
?>

<?php
get_template_part(
	'template-parts/sec-faq',
	null,
	array(
		'category' => 'beginner',
	)
);
?>

<?php
get_footer();
?>
