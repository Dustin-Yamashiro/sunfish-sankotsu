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

<section class="p-front-appeal" aria-labelledby="front-appeal-title">
	<div class="p-front-appeal__main u-container">
		<div class="p-front-appeal__content">
			<h2 id="front-appeal-title" class="p-front-appeal__title">お墓ではない<br>「想い」を残す、供養のカタチ</h2>
			<div class="p-front-appeal__body">
				<ul class="p-front-appeal__list">
					<li>お墓を継ぐ人がいない。</li>
					<li>子どもや孫に負担を残したくない。</li>
					<li>墓じまい後の遺骨の供養先に悩んでいる。</li>
				</ul>
				<p>そうした供養の悩みを抱える方は、<br>現代では少なくありません。</p>
				<p>でも、本当に大切なのは、<br>故人様を大切に想い、家族の記憶に残り続け、<br>カタチがなくても、そっと手を合わせられること。</p>
				<p>いつまでも変わることのない、<br>ご家族の「想い」を繋ぐために。</p>
			</div>
		</div>

		<div class="p-front-appeal__collage" aria-hidden="true">
			<picture class="p-front-appeal__photo p-front-appeal__photo--01">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/beach-wave.jpg' ) ); ?>" width="3792" height="2844" alt="" loading="lazy">
			</picture>
			<picture class="p-front-appeal__photo p-front-appeal__photo--02">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/floating-flowers.png' ) ); ?>" width="1672" height="941" alt="" loading="lazy">
			</picture>
			<picture class="p-front-appeal__photo p-front-appeal__photo--03">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/scattering-flowers.png' ) ); ?>" width="1122" height="1402" alt="" loading="lazy">
			</picture>
			<picture class="p-front-appeal__photo p-front-appeal__photo--04">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/appeal/boat-sky.jpg' ) ); ?>" width="4032" height="3024" alt="" loading="lazy">
			</picture>
		</div>
	</div>

	<div class="p-front-appeal__choice">
		<div class="u-container">
			<p class="p-front-appeal__choice-text">
				<span class="p-front-appeal__choice-prefix">その想いに</span>
				<span class="p-front-appeal__choice-keyword">“海洋散骨”</span>
				<span class="p-front-appeal__choice-suffix">という選択肢を</span>
			</p>
		</div>
	</div>
</section>

<section class="p-split u-section-space" aria-labelledby="marine-scattering-introduction-title">
	<div class="p-split__inner u-container">
		<div class="p-split__content">
			<div class="p-split__title c-section-title">
				<p class="c-section-title__sub">Introduction</p>
				<h2 id="marine-scattering-introduction-title" class="c-section-title__main">海洋散骨とは</h2>
			</div>
			<div class="p-split__body">
				<p>海洋散骨とは、お墓へ納骨する代わりに、ご遺骨を粉骨して海へ供養する自然葬の一つです。<br>
				ただ海に還すだけでなく、散骨した海をこれからも故人様を想う場所として残す、新しい供養のカタチです。</p>
				<p>海洋散骨には、粉骨の手続きや必要書類の用意、当日の進行など、初めての方には分かりにくいことが多々あります。<br>
				石垣島海洋散骨センターでは、初めての方でも安心して故人様をお見送りできるよう、分かりやすく丁寧にサポートいたします。</p>
			</div>
		</div>

		<div class="p-split__visual" aria-hidden="true">
			<picture class="p-split__image p-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-sub.png' ) ); ?>" width="1254" height="1254" alt="" loading="lazy">
			</picture>
			<picture class="p-split__image p-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/introduction/intro-main.png' ) ); ?>" width="1536" height="1024" alt="" loading="lazy">
			</picture>
		</div>

		<div class="p-split__button c-section-btn c-section-btn--next">
			<a href="<?php echo esc_url( home_url( '/beginner/' ) ); ?>">初めての方へ</a>
		</div>
	</div>

	<div class="p-split__gallery splide js-intro-gallery" aria-label="海洋散骨の写真ギャラリー">
		<div class="splide__track">
			<ul class="p-split__gallery-list splide__list">
				<li class="p-split__gallery-slide p-split__gallery-slide--01 splide__slide">
					<img src="<?php echo esc_url( theme_image_url( 'front-page/intro-gallery/gallery-02.jpeg' ) ); ?>" width="4032" height="3024" alt="石垣島の青い海と空" loading="lazy">
				</li>
				<li class="p-split__gallery-slide p-split__gallery-slide--02 splide__slide">
					<img src="<?php echo esc_url( theme_image_url( 'front-page/intro-gallery/gallery-01.png' ) ); ?>" width="941" height="1672" alt="船上で手を重ねる様子" loading="lazy">
				</li>
				<li class="p-split__gallery-slide p-split__gallery-slide--03 splide__slide">
					<img src="<?php echo esc_url( theme_image_url( 'front-page/intro-gallery/gallery-03.png' ) ); ?>" width="1122" height="1402" alt="海へ向かって手を合わせる様子" loading="lazy">
				</li>
				<li class="p-split__gallery-slide p-split__gallery-slide--04 splide__slide">
					<img src="<?php echo esc_url( theme_image_url( 'front-page/intro-gallery/gallery-04.png' ) ); ?>" width="1448" height="1086" alt="花を海へ手向ける様子" loading="lazy">
				</li>
				<li class="p-split__gallery-slide p-split__gallery-slide--05 splide__slide">
					<img src="<?php echo esc_url( theme_image_url( 'front-page/intro-gallery/gallery-06.png' ) ); ?>" width="1672" height="941" alt="家族で海を見つめる様子" loading="lazy">
				</li>
				<li class="p-split__gallery-slide p-split__gallery-slide--06 splide__slide">
					<img src="<?php echo esc_url( theme_image_url( 'front-page/intro-gallery/gallery-05.JPG' ) ); ?>" width="1920" height="1440" alt="海に浮かぶ散骨用の船" loading="lazy">
				</li>
			</ul>
		</div>
	</div>
</section>

<section class="p-feature-sec js-feature-sec" aria-labelledby="feature-sec-title" data-feature-sec>
	<div class="p-feature-sec__inner u-container">
		<div class="p-feature-sec__message">
			<div class="p-feature-sec__title c-section-title c-section-title--white">
				<p class="c-section-title__sub">About</p>
				<h2 id="feature-sec-title" class="c-section-title__main">故人様を想える海を、<br>これからも</h2>
			</div>
			<div class="p-feature-sec__body">
				<p>石垣島海洋散骨センターは、石垣島近海での海洋散骨を専門に行っています。</p>
				<p>私たちが大切にしているのは、海洋散骨を「最後のお別れ」で終わらせないこと。</p>
				<p>ご相談から散骨後の供養まで、ご家族が安心して故人様を見送れるよう、ひとつひとつ丁寧にご案内します。</p>
			</div>
			<div class="p-feature-sec__button c-section-btn c-section-btn--next c-section-btn--white">
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">私たちについて</a>
			</div>
		</div>

		<div class="p-feature-sec__points" data-feature-sec-points>
			<ol class="p-feature-sec__point-list">
				<li class="p-feature-sec__point-item p-feature-sec__point-item--01 is-active" data-feature-sec-card data-point-index="1">
					<article class="p-feature-sec__point-card">
						<div class="p-feature-sec__point-content">
							<p class="p-feature-sec__point-label">
								<span class="p-feature-sec__point-text">Point</span>
								<span class="p-feature-sec__point-number">1</span>
							</p>
							<h3 class="p-feature-sec__point-title">石垣島の海のプロが一貫対応</h3>
							<div class="p-feature-sec__point-body">
								<p>石垣島で15年以上のダイビング経験と「海洋散骨ディレクター」の資格を持つ船長が、ご相談から操船、散骨進行まで一貫して対応。</p>
								<p>船長自ら故人様とご家族の想いを伺い、石垣島の海でのお見送りをお手伝いします。</p>
							</div>
						</div>
						<picture class="p-feature-sec__point-image">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-01.png' ) ); ?>" width="1254" height="1254" alt="石垣島の海で船を操縦する船長の手元" loading="lazy">
						</picture>
					</article>
				</li>
				<li class="p-feature-sec__point-item p-feature-sec__point-item--02" data-feature-sec-card data-point-index="2">
					<article class="p-feature-sec__point-card">
						<div class="p-feature-sec__point-content">
							<p class="p-feature-sec__point-label">
								<span class="p-feature-sec__point-text">Point</span>
								<span class="p-feature-sec__point-number">2</span>
							</p>
							<h3 class="p-feature-sec__point-title">初めてでも安心のプランと料金</h3>
							<div class="p-feature-sec__point-body">
								<p>海洋散骨が初めての方にもわかりやすいよう、プラン内容や必要な準備、当日の流れまで丁寧にご説明。</p>
								<p>自社船による直接対応で仲介マージンを抑え、安心できる明瞭な価格でご案内しています。</p>
							</div>
						</div>
						<picture class="p-feature-sec__point-image">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-02.png' ) ); ?>" width="1254" height="1254" alt="船上で海洋散骨のプランや準備について説明する様子" loading="lazy">
						</picture>
					</article>
				</li>
				<li class="p-feature-sec__point-item p-feature-sec__point-item--03" data-feature-sec-card data-point-index="3">
					<article class="p-feature-sec__point-card">
						<div class="p-feature-sec__point-content">
							<p class="p-feature-sec__point-label">
								<span class="p-feature-sec__point-text">Point</span>
								<span class="p-feature-sec__point-number">3</span>
							</p>
							<h3 class="p-feature-sec__point-title">散骨後も想える海として残す供養</h3>
							<div class="p-feature-sec__point-body">
								<p>散骨の際、故人様らしさとご家族の希望に合わせた見送り方のご相談が可能。</p>
								<p>散骨後には、写真・動画、散骨証明書の発行やメモリアルクルーズの案内にも対応し、海へ還した後も続く供養をお手伝いします。</p>
							</div>
						</div>
						<picture class="p-feature-sec__point-image">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-03.png' ) ); ?>" width="1086" height="1448" alt="海を背景に散骨後の供養サポートについて相談する様子" loading="lazy">
						</picture>
					</article>
				</li>
			</ol>
		</div>
		<div class="p-feature-sec__scrollbar" aria-hidden="true">
			<span class="p-feature-sec__scrollbar-thumb" data-feature-sec-scrollbar></span>
		</div>

		<img class="p-feature-sec__island" src="<?php echo esc_url( theme_image_url( 'front-page/about/ishigaki.svg' ) ); ?>" width="300" height="375" alt="" loading="lazy" aria-hidden="true">
	</div>
</section>

<?php get_footer(); ?>
