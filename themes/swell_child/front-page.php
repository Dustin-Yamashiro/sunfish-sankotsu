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

<section class="l-front-appeal" aria-labelledby="front-appeal-title">
	<div class="l-front-appeal__main u-container">
		<div class="l-front-appeal__content">
			<h2 id="front-appeal-title" class="l-front-appeal__title u-fade-up">お墓ではない<br>「想い」を残す、供養のカタチ</h2>
			<div class="l-front-appeal__body">
				<ul class="l-front-appeal__list">
					<li>お墓を継ぐ人がいない。</li>
					<li>子どもや孫に負担を残したくない。</li>
					<li>墓じまい後の遺骨の供養先に悩んでいる。</li>
				</ul>
				<p>そうした供養の悩みを抱える方は、<br>現代では少なくありません。</p>
				<p>でも、本当に大切なのは、<br>故人様を大切に想い、家族の記憶に残り続け、<br>カタチがなくても、そっと手を合わせられること。</p>
				<p>いつまでも変わることのない、<br>ご家族の「想い」を繋ぐために。</p>
			</div>
		</div>

		<div class="l-front-appeal__collage" aria-hidden="true">
			<picture class="l-front-appeal__photo l-front-appeal__photo--01 u-photo-fade u-photo-fade--left">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/beach-wave.jpg' ) ); ?>" width="204" height="147" alt="" loading="lazy">
			</picture>
			<picture class="l-front-appeal__photo l-front-appeal__photo--02 u-photo-fade u-photo-fade--right">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/floating-flowers.png' ) ); ?>" width="288" height="216" alt="" loading="lazy">
			</picture>
			<picture class="l-front-appeal__photo l-front-appeal__photo--03 u-photo-fade u-photo-fade--left">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/scattering-flowers.png' ) ); ?>" width="316" height="337" alt="" loading="lazy">
			</picture>
			<picture class="l-front-appeal__photo l-front-appeal__photo--04 u-photo-fade u-photo-fade--right">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/boat-sky.jpg' ) ); ?>" width="268" height="335" alt="" loading="lazy">
			</picture>
		</div>
	</div>

	<div class="l-front-appeal__choice">
		<div class="u-container">
			<p class="l-front-appeal__choice-text">
				<span class="l-front-appeal__choice-prefix">その想いに</span>
				<span class="l-front-appeal__choice-keyword u-text-fade">“海洋散骨”</span>
				<span class="l-front-appeal__choice-suffix">という選択肢を</span>
			</p>
		</div>
	</div>
</section>

<section class="l-sec-split l-sec-split--front" aria-labelledby="front--title">
	<div class="l-sec-split__inner u-container">
		<div class="l-sec-split__content">
			<div class="l-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Introduction</p>
				<h2 id="front--title" class="c-sec-title__main">海洋散骨とは</h2>
			</div>
			<div class="l-sec-split__body">
				<p>海洋散骨とは、お墓へ納骨する代わりに、ご遺骨を粉骨して海へ供養する自然葬の一つです。</p>
				<p>ただ海に還すだけでなく、散骨した海をこれからも故人様を想う場所として残す、新しい供養のカタチ。</p>
				<p>石垣島海洋散骨センターでは、海洋散骨が初めての方でも安心して故人様をお見送りできるよう、分かりやすく丁寧にサポートいたします。</p>
			</div>
		</div>

		<div class="l-sec-split__visual" aria-hidden="true">
			<picture class="l-sec-split__image l-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-sub.png' ) ); ?>" width="254" height="170" alt="" loading="lazy">
			</picture>
			<picture class="l-sec-split__image l-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-main.png' ) ); ?>" width="500" height="333" alt="" loading="lazy">
			</picture>
		</div>

		<div class="l-sec-split__button c-sec-btn c-sec-btn--next">
			<a href="<?php echo esc_url( home_url( '/beginner/' ) ); ?>">初めての方へ</a>
		</div>
	</div>
</section>

<section class="l-sec-feature js-feature-sec" aria-labelledby="feature-sec-title" data-feature-sec>
	<div class="l-sec-feature__inner u-container">
		<div class="l-sec-feature__message">
			<div class="l-sec-feature__title c-sec-title u-fade-up c-sec-title--white">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">About</p>
				<h2 id="feature-sec-title" class="c-sec-title__main">故人様を想える海を、<br>これからも</h2>
			</div>
			<div class="l-sec-feature__body">
				<p>石垣島海洋散骨センターは、石垣島近海での海洋散骨を専門に行っています。</p>
				<p>私たちが大切にしているのは、海洋散骨を「最後のお別れ」で終わらせないこと。</p>
				<p>ご相談から散骨後の供養まで、ご家族が安心して故人様を見送れるよう、ひとつひとつ丁寧にご案内します。</p>
			</div>
			<div class="l-sec-feature__button c-sec-btn c-sec-btn--next c-sec-btn--white">
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">私たちについて</a>
			</div>
		</div>

		<div class="l-sec-feature__points" data-feature-sec-points>
			<ol class="l-sec-feature__point-list">
				<li class="l-sec-feature__point-item l-sec-feature__point-item--01 is-active" data-feature-sec-card data-point-index="1">
					<article class="l-sec-feature__point-card">
						<div class="l-sec-feature__point-content">
							<p class="l-sec-feature__point-label">
								<span class="l-sec-feature__point-text">Point</span>
								<span class="l-sec-feature__point-number">1</span>
							</p>
							<h3 class="l-sec-feature__point-title">石垣島の海のプロが一貫対応</h3>
							<div class="l-sec-feature__point-body">
								<p>石垣島で15年以上のダイビング経験と「海洋散骨ディレクター」の資格を持つ船長が、ご相談から操船、散骨進行まで一貫して対応。</p>
								<p>船長自ら故人様とご家族の想いを伺い、石垣島の海でのお見送りをお手伝いします。</p>
							</div>
						</div>
						<picture class="l-sec-feature__point-image">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-01.png' ) ); ?>" width="292" height="336" alt="石垣島の海で船を操縦する船長の手元" loading="lazy">
						</picture>
					</article>
				</li>
				<li class="l-sec-feature__point-item l-sec-feature__point-item--02" data-feature-sec-card data-point-index="2">
					<article class="l-sec-feature__point-card">
						<div class="l-sec-feature__point-content">
							<p class="l-sec-feature__point-label">
								<span class="l-sec-feature__point-text">Point</span>
								<span class="l-sec-feature__point-number">2</span>
							</p>
							<h3 class="l-sec-feature__point-title">初めてでも安心のプランと料金</h3>
							<div class="l-sec-feature__point-body">
								<p>海洋散骨が初めての方にもわかりやすいよう、プラン内容や必要な準備、当日の流れまで丁寧にご説明。</p>
								<p>自社船による直接対応で仲介マージンを抑え、安心できる明瞭な価格でご案内しています。</p>
							</div>
						</div>
						<picture class="l-sec-feature__point-image">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-02.png' ) ); ?>" width="292" height="336" alt="船上で海洋散骨のプランや準備について説明する様子" loading="lazy">
						</picture>
					</article>
				</li>
				<li class="l-sec-feature__point-item l-sec-feature__point-item--03" data-feature-sec-card data-point-index="3">
					<article class="l-sec-feature__point-card">
						<div class="l-sec-feature__point-content">
							<p class="l-sec-feature__point-label">
								<span class="l-sec-feature__point-text">Point</span>
								<span class="l-sec-feature__point-number">3</span>
							</p>
							<h3 class="l-sec-feature__point-title">散骨後も想える海として残す供養</h3>
							<div class="l-sec-feature__point-body">
								<p>散骨の際、故人様らしさとご家族の希望に合わせた見送り方のご相談が可能。</p>
								<p>散骨後には、写真・動画、散骨証明書の発行やメモリアルクルーズの案内にも対応し、海へ還した後も続く供養をお手伝いします。</p>
							</div>
						</div>
						<picture class="l-sec-feature__point-image">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-03.png' ) ); ?>" width="292" height="336" alt="海を背景に散骨後の供養サポートについて相談する様子" loading="lazy">
						</picture>
					</article>
				</li>
			</ol>
		</div>

		<div class="l-sec-feature__scrollbar" aria-hidden="true">
			<span class="l-sec-feature__scrollbar-thumb" data-feature-sec-scrollbar></span>
		</div>

		<img class="l-sec-feature__island" src="<?php echo esc_url( theme_image_url( 'front-page/about/ishigaki.svg' ) ); ?>" width="300" height="375" alt="石垣島の白いイメージ画像" loading="lazy" aria-hidden="true">
	</div>
</section>

<?php get_template_part( 'template-parts/sec-plan' ); ?>

<?php
$front_step_items = array(
	array(
		'number' => '1',
		'title'  => 'お問い合わせ',
		'image'  => 'front-page/step/contact.png',
		'alt'    => '電話で海洋散骨について問い合わせる人のイラスト',
	),
	array(
		'number' => '2',
		'title'  => '申込み',
		'image'  => 'front-page/step/contact.png',
		'alt'    => '海洋散骨の申込みを行うイラスト',
	),
	array(
		'number' => '3',
		'title'  => '粉骨',
		'image'  => 'front-page/step/contact.png',
		'alt'    => '散骨前に粉骨を行うイラスト',
	),
	array(
		'number' => '4',
		'title'  => '散骨',
		'image'  => 'front-page/step/contact.png',
		'alt'    => '海で散骨を行うイラスト',
	),
	array(
		'number' => '5',
		'title'  => '証明書の発行',
		'image'  => 'front-page/step/contact.png',
		'alt'    => '散骨証明書を発行するイラスト',
	),
	array(
		'number' => '6',
		'title'  => 'これからの再会',
		'image'  => 'front-page/step/contact.png',
		'alt'    => '散骨した海を再び訪れるイラスト',
	),
);
?>
<section class="l-front-step" aria-labelledby="front-step-title">
	<picture class="l-front-step__bg" aria-hidden="true">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="" loading="lazy">
	</picture>

	<div class="l-front-step__inner u-container">
		<div class="l-front-step__title c-sec-title c-sec-title--white c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Step</p>
			<h2 id="front-step-title" class="c-sec-title__main">散骨の流れ</h2>
		</div>

		<ol class="l-front-step__list u-step-flow">
			<?php foreach ( $front_step_items as $front_step_item ) : ?>
				<li class="l-front-step__item">
					<article class="l-front-step__card">
						<p class="l-front-step__label u-step-flow-group">
							<span class="l-front-step__label-text u-step-flow-label u-step-flow-label--text u-text-fade--chars">Step</span>
							<span class="l-front-step__number u-step-flow-label u-step-flow-label--number u-text-fade--chars"><?php echo esc_html( $front_step_item['number'] ); ?></span>
						</p>
						<div class="l-front-step__icon">
							<img src="<?php echo esc_url( theme_image_url( $front_step_item['image'] ) ); ?>" width="128" height="128" alt="<?php echo esc_attr( $front_step_item['alt'] ); ?>">
						</div>
						<h3 class="l-front-step__name"><?php echo esc_html( $front_step_item['title'] ); ?></h3>
					</article>
				</li>
			<?php endforeach; ?>
		</ol>

		<div class="l-front-step__message">
			<h4 class="l-front-step__lead u-bg-wipe">初めての海洋散骨も、<br class="u-br--sp">一つずつ丁寧にご案内します。</h4>
			<div class="l-front-step__body">
				<p>海洋散骨が初めての方もご安心ください。</p>
				<p>石垣島海洋散骨センターでは、<br class="u-br--sp">ご遺族様の不安やご希望を伺いながら、<br>最後までサポートします。</p>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/sec-faq' ); ?>

<?php get_template_part( 'template-parts/sec-news' ); ?>

<?php get_template_part( 'template-parts/sec-column' ); ?>

<?php get_footer(); ?>
