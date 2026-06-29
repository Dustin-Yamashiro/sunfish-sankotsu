<?php
/**
 * Front page template.
 *
 * @package LocalEnvTheme
 */

get_header();
?>

<section class="l-kv" aria-labelledby="front-hero-title">
	<picture class="l-kv__media">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="石垣島の海に花を手向ける様子" fetchpriority="high">
	</picture>
	<div class="l-kv__content u-container">
		<h1 id="front-hero-title" class="l-kv__title">石垣の海を、<br>「あの人と繋がる場所」へ</h1>
	</div>
</section>

<section class="p-sec-appeal u-pd-pt-5" aria-labelledby="sec-appeal-title">
	<div class="p-sec-appeal__main u-container">
		<div class="p-sec-appeal__content">
			<h2 id="sec-appeal-title" class="p-sec-appeal__title u-fade-up">お墓ではない<br>「想い」を残す、供養のカタチ</h2>
			<div class="p-sec-appeal__body">
				<ul class="p-sec-appeal__list">
					<li>お墓を継ぐ人がいない。</li>
					<li>子どもや孫に負担を残したくない。</li>
					<li>墓じまい後の遺骨の供養先に悩んでいる。</li>
				</ul>
				<p>そうした供養の悩みを抱える方は、<br>現代では少なくありません。</p>
				<p>でも、本当に大切なのは、<br>故人様を大切に想い、家族の記憶に残り続け、<br>カタチがなくても、そっと手を合わせられること。</p>
				<p>いつまでも変わることのない、<br>ご家族の「想い」を繋ぐために。</p>
			</div>
		</div>

		<div class="p-sec-appeal__collage">
			<picture class="p-sec-appeal__photo p-sec-appeal__photo--01 u-photo-fade u-photo-fade--left">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/beach-wave.jpg' ) ); ?>" width="204" height="147" alt="石垣島の砂浜に寄せる透明な波" loading="lazy">
			</picture>
			<picture class="p-sec-appeal__photo p-sec-appeal__photo--02 u-photo-fade u-photo-fade--right">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/floating-flowers.png' ) ); ?>" width="288" height="216" alt="石垣島の海に浮かぶ色とりどりの花" loading="lazy">
			</picture>
			<picture class="p-sec-appeal__photo p-sec-appeal__photo--03 u-photo-fade u-photo-fade--left">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/scattering-flowers.png' ) ); ?>" width="316" height="337" alt="船上から石垣島の海へ花を手向ける手元" loading="lazy">
			</picture>
			<picture class="p-sec-appeal__photo p-sec-appeal__photo--04 u-photo-fade u-photo-fade--right">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/boat-sky.jpg' ) ); ?>" width="268" height="335" alt="船上から見える石垣島の穏やかな海と青空" loading="lazy">
			</picture>
		</div>
	</div>

	<div class="p-sec-appeal__choice">
		<div class="u-container">
			<p class="p-sec-appeal__choice-text">
				<span class="p-sec-appeal__choice-prefix">その想いに</span>
				<span class="p-sec-appeal__choice-keyword u-text-fade">“海洋散骨”</span>
				<span class="p-sec-appeal__choice-suffix">という選択肢を</span>
			</p>
		</div>
	</div>
</section>

<section class="p-sec-split u-pd-pt-5 u-pd-pb-6" aria-labelledby="front--title">
	<div class="p-sec-split__inner u-container">
		<div class="p-sec-split__content">
			<div class="p-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Introduction</p>
				<h2 id="front--title" class="c-sec-title__main">海洋散骨とは</h2>
			</div>
			<div class="p-sec-split__body">
				<p>海洋散骨とは、お墓へ納骨する代わりに、ご遺骨を粉骨して海へ供養する自然葬の一つです。</p>
				<p>通常の供養とは違い、散骨した海をこれからも故人様を想う場所として残せる供養として選ばれています。</p>
				<p>石垣島海洋散骨センターでは、海洋散骨が初めての方でも安心して故人様をお見送りできるよう、分かりやすく丁寧にサポートいたします。</p>
			</div>
		</div>

		<div class="p-sec-split__visual">
			<picture class="p-sec-split__image p-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-sub.png' ) ); ?>" width="254" height="170" alt="船のそばの海面に浮かぶ白い花" loading="lazy">
			</picture>
			<picture class="p-sec-split__image p-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-main.png' ) ); ?>" width="500" height="333" alt="石垣島の海に向かって船上で花を手向ける人" loading="lazy">
			</picture>
		</div>

		<div class="p-sec-split__button c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/beginner/' ) ); ?>">初めての方へ</a>
		</div>
	</div>
</section>

<section class="p-sec-feature js-feature-sec" aria-labelledby="feature-sec-title" data-feature-sec>
	<div class="p-sec-feature__inner u-container">
		<div class="p-sec-feature__message">
			<div class="p-sec-feature__title c-sec-title u-fade-up c-sec-title--white">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">About</p>
				<h2 id="feature-sec-title" class="c-sec-title__main">故人様を想える海を、<br>これからも</h2>
			</div>
			<div class="p-sec-feature__body">
				<p>石垣島海洋散骨センターは、石垣島近海での海洋散骨を専門に行っています。</p>
				<p>私たちが大切にしているのは、海洋散骨を「最後のお別れ」で終わらせないこと。</p>
				<p>ご相談から散骨後の供養まで、ご家族が安心して故人様を見送れるよう、ひとつひとつ丁寧にご案内します。</p>
			</div>
			<div class="p-sec-feature__button c-sec-btn c-sec-btn--next c-sec-btn--white">
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">私たちについて</a>
			</div>
		</div>

		<?php
		$features = array(
			array(
				'title'  => '石垣島の海のプロが一貫対応',
				'texts'  => array(
					'石垣島で15年以上のダイビング経験と「海洋散骨ディレクター」の資格を持つ船長が、ご相談から操船、散骨進行まで一貫して対応。',
					'船長自ら故人様とご家族の想いを伺い、石垣島の海でのお見送りをお手伝いします。',
				),
				'image'  => 'front-page/about/point-01.png',
				'alt'    => '石垣島の海で船を操縦する船長の手元',
			),
			array(
				'title'  => '初めてでも安心のプランと料金',
				'texts'  => array(
					'海洋散骨が初めての方にもわかりやすいよう、プラン内容や必要な準備、当日の流れまで丁寧にご説明。',
					'自社船による直接対応で仲介マージンを抑え、安心できる明瞭な価格でご案内しています。',
				),
				'image'  => 'front-page/about/point-02.png',
				'alt'    => '船上で海洋散骨のプランや準備について説明する様子',
			),
			array(
				'title'  => '散骨後も想える海として残す供養',
				'texts'  => array(
					'故人様らしさとご家族の希望に合わせた散骨方法のご相談が可能。',
					'散骨後には、写真・動画、散骨証明書の発行やメモリアルクルーズの案内にも対応し、海へ還した後も続く供養をお手伝いします。',
				),
				'image'  => 'front-page/about/point-03.png',
				'alt'    => '海を背景に散骨後の供養サポートについて相談する様子',
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

		<img class="p-sec-feature__island" src="<?php echo esc_url( theme_image_url( 'front-page/about/ishigaki.svg' ) ); ?>" width="300" height="375" alt="" loading="lazy" aria-hidden="true">
	</div>
</section>

<?php get_template_part( 'template-parts/sec-plan' ); ?>

<?php
$items = array(
	array(
		'number' => '1',
		'title'  => 'お問い合わせ',
		'image'  => 'illustrations/flow/step1-contact.png',
		'alt'    => '電話とパソコンで相談する人のイラスト',
	),
	array(
		'number' => '2',
		'title'  => '申込み・送骨',
		'image'  => 'illustrations/flow/step2-arrangement.png',
		'alt'    => '送骨キットとご遺骨を納める箱のイラスト',
	),
	array(
		'number' => '3',
		'title'  => '粉骨・安置',
		'image'  => 'illustrations/flow/step3-custody.png',
		'alt'    => 'ご遺骨を大切に預かるスタッフのイラスト',
	),
	array(
		'number' => '4',
		'title'  => '集合・散骨',
		'image'  => 'illustrations/flow/step4-ceremony.png',
		'alt'    => '献花と献酒のための花びら、徳利、杯のイラスト',
	),
	array(
		'number' => '5',
		'title'  => '証明書発行',
		'image'  => 'illustrations/flow/step5-certificate.png',
		'alt'    => '封筒を添えた海洋散骨証明書のイラスト',
	),
	array(
		'number' => '6',
		'title'  => 'いつかの再会',
		'image'  => 'illustrations/flow/step6-reunion.png',
		'alt'    => '石垣島の海を写した写真立てのイラスト',
	),
);
?>
<section class="p-sec-step-short u-pd-pt-5 u-pd-pb-6" aria-labelledby="sec-step-short-title">
	<picture class="p-sec-step-short__bg" aria-hidden="true">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="" loading="lazy">
	</picture>

	<div class="p-sec-step-short__inner u-container">
		<div class="p-sec-step-short__title c-sec-title c-sec-title--white c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade">Step</p>
			<h2 id="sec-step-short-title" class="c-sec-title__main">散骨の流れ</h2>
		</div>

		<ol class="p-sec-step-short__list u-fade-up-group" data-fade-base-delay="180" data-fade-stagger="180">
			<?php foreach ( $items as $item ) : ?>
				<li class="p-sec-step-short__item u-fade-up-item">
					<article class="p-sec-step-short__card">
						<p class="p-sec-step-short__label">
							<span class="p-sec-step-short__label-text">Step</span>
							<span class="p-sec-step-short__number"><?php echo esc_html( $item['number'] ); ?></span>
						</p>
						<div class="p-sec-step-short__icon">
							<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="128" height="128" alt="<?php echo esc_attr( $item['alt'] ); ?>">
						</div>
						<h3 class="p-sec-step-short__name"><?php echo esc_html( $item['title'] ); ?></h3>
					</article>
				</li>
			<?php endforeach; ?>
		</ol>

		<div class="p-sec-step-short__message">
			<h4 class="p-sec-step-short__lead u-bg-wipe">初めての海洋散骨も、<br class="u-br--sp">一つずつ丁寧にご案内します。</h4>
			<div class="p-sec-step-short__body">
				<p>海洋散骨が初めての方もご安心ください。</p>
				<p>石垣島海洋散骨センターでは、<br class="u-br--sp">ご遺族様の不安やご希望を伺いながら、<br>最後までサポートします。</p>
			</div>
		</div>
	</div>
</section>

<?php
get_template_part(
	'template-parts/sec-faq',
	null,
	array(
		'category' => 'general',
	)
);
?>

<?php get_template_part( 'template-parts/sec-news' ); ?>

<?php get_template_part( 'template-parts/sec-column' ); ?>

<?php get_footer(); ?>
