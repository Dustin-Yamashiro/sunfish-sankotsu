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

<section class="p-plan-sec" aria-labelledby="front-plan-title">
	<div class="p-plan-sec__heading u-container">
		<div class="p-plan-sec__title c-section-title">
			<p class="c-section-title__sub">Plan</p>
			<h2 id="front-plan-title" class="c-section-title__main">散骨プラン</h2>
		</div>
	</div>

	<div class="p-plan-sec__list u-container">
		<article class="p-plan-sec__card p-plan-sec__card--charter">
			<picture class="p-plan-sec__image">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/plan/charter.png' ) ); ?>" width="1672" height="941" alt="石垣島の海を家族で見つめる貸切散骨の様子" loading="lazy">
			</picture>
			<div class="p-plan-sec__panel">
				<div class="p-plan-sec__content">
					<div class="p-plan-sec__summary">
						<h3 class="p-plan-sec__name">家族で見送る、<br>海への旅立ちプラン<span class="p-plan-sec__name-note">（貸切）</span></h3>
						<p class="p-plan-sec__price">
							<span class="p-plan-sec__price-label">税込</span>
							<span class="p-plan-sec__price-number">132,000</span>
							<span class="p-plan-sec__price-unit">円〜</span>
						</p>
					</div>
					<div class="p-plan-sec__body">
						<p>完全貸切の船で、ご家族やご親族とともに散骨を行うプランです。</p>
						<p>事前に伺ったご希望に沿って、船長が準備から進行まで担当し、故人様らしい海への旅立ちをお手伝いします。</p>
					</div>
					<div class="p-plan-sec__button c-section-btn c-section-btn--next c-section-btn--white c-section-btn--small">
						<a href="<?php echo esc_url( home_url( '/kashikiri/' ) ); ?>">詳しくはこちら</a>
					</div>
				</div>
			</div>
		</article>

		<article class="p-plan-sec__card p-plan-sec__card--proxy">
			<picture class="p-plan-sec__image">
				<img src="<?php echo esc_url( theme_image_url( 'front-page/plan/proxy.png' ) ); ?>" width="1536" height="1024" alt="石垣島の海へ花を手向ける委託散骨の様子" loading="lazy">
			</picture>
			<div class="p-plan-sec__panel">
				<div class="p-plan-sec__content">
					<div class="p-plan-sec__summary">
						<h3 class="p-plan-sec__name">想いを託す、<br>委託散骨プラン<span class="p-plan-sec__name-note">（代理）</span></h3>
						<p class="p-plan-sec__price">
							<span class="p-plan-sec__price-label">税込</span>
							<span class="p-plan-sec__price-number">55,000</span>
							<span class="p-plan-sec__price-unit">円〜</span>
						</p>
					</div>
					<div class="p-plan-sec__body">
						<p>ご遺族に代わり、船長が散骨を行うプランです。</p>
						<p>大切なご遺骨をお預かりし、ご遺族の想いを受け止めながら、責任を持って石垣島の海へお見送りします。</p>
					</div>
					<div class="p-plan-sec__button c-section-btn c-section-btn--next c-section-btn--white c-section-btn--small">
						<a href="<?php echo esc_url( home_url( '/dairi/' ) ); ?>">詳しくはこちら</a>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>

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
<section class="p-step-sec" aria-labelledby="front-step-title">
	<picture class="p-step-sec__bg" aria-hidden="true">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="" loading="lazy">
	</picture>

	<div class="p-step-sec__inner u-container">
		<div class="p-step-sec__title c-section-title c-section-title--white c-section-title--center">
			<p class="c-section-title__sub">Step</p>
			<h2 id="front-step-title" class="c-section-title__main">散骨の流れ</h2>
		</div>

		<ol class="p-step-sec__list">
			<?php foreach ( $front_step_items as $front_step_item ) : ?>
				<li class="p-step-sec__item">
					<article class="p-step-sec__card">
						<p class="p-step-sec__label">
							<span class="p-step-sec__label-text">Step</span>
							<span class="p-step-sec__number"><?php echo esc_html( $front_step_item['number'] ); ?></span>
						</p>
						<div class="p-step-sec__icon">
							<img src="<?php echo esc_url( theme_image_url( $front_step_item['image'] ) ); ?>" width="1024" height="1024" alt="<?php echo esc_attr( $front_step_item['alt'] ); ?>">
						</div>
						<h3 class="p-step-sec__name"><?php echo esc_html( $front_step_item['title'] ); ?></h3>
					</article>
				</li>
			<?php endforeach; ?>
		</ol>

		<div class="p-step-sec__message">
			<h4 class="p-step-sec__lead">初めての海洋散骨も、<br class="u-br--sp">一つずつ丁寧にご案内します。</h4>
			<div class="p-step-sec__body">
				<p>海洋散骨が初めての方もご安心ください。</p>
				<p>石垣島海洋散骨センターでは、<br class="u-br--sp">ご遺族様の不安やご希望を伺いながら、<br>最後までサポートします。</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
