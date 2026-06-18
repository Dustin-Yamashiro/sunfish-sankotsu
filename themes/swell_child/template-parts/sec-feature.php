<?php
/**
 * 共通特徴セクションのテンプレート。
 *
 * 石垣島海洋散骨センターの強みや大切にしている考え方を、
 * 横スクロール風のポイント表示と導線ボタンで出力します。
 *
 * @package SunfishSankotsu
 */
?>
<section class="l-sec-feature js-feature-sec" aria-labelledby="feature-sec-title" data-feature-sec>
	<div class="l-sec-feature__inner u-container">
		<div class="l-sec-feature__message">
			<div class="l-sec-feature__title c-sec-title c-sec-title--white u-fade-up">
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
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-01.png' ) ); ?>" width="1254" height="1254" alt="石垣島の海で船を操縦する船長の手元" loading="lazy">
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
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-02.png' ) ); ?>" width="1254" height="1254" alt="船上で海洋散骨のプランや準備について説明する様子" loading="lazy">
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
							<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-03.png' ) ); ?>" width="1086" height="1448" alt="海を背景に散骨後の供養サポートについて相談する様子" loading="lazy">
						</picture>
					</article>
				</li>
			</ol>
		</div>
		<div class="l-sec-feature__scrollbar" aria-hidden="true">
			<span class="l-sec-feature__scrollbar-thumb" data-feature-sec-scrollbar></span>
		</div>

		<img class="l-sec-feature__island" src="<?php echo esc_url( theme_image_url( 'front-page/about/ishigaki.svg' ) ); ?>" width="300" height="375" alt="" loading="lazy" aria-hidden="true">
	</div>
</section>
