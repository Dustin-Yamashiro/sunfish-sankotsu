<?php
/**
 * 3つのこだわりセクション
 *
 * 石垣島海洋散骨センターの3つのこだわりを固定HTMLで出力します。
 *
 * @package SunfishSankotsu
 */
?>

<section class="p-sec-values<?php echo ! empty( $args ) ? esc_attr( ' p-sec-values--' . $args ) : ''; ?>" aria-labelledby="kashikiri-values-title">
	<div class="p-sec-values__inner u-container">
		<div class="p-sec-values__title c-sec-title c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Values</p>

			<h2 id="kashikiri-values-title" class="c-sec-title__main">
				<span class="c-sec-title__main-line">石垣島海洋散骨センターの</span>
				<span class="c-sec-title__main-line">
					<span class="c-sec-title__main-accent">3つ</span>
					<span>のこだわり</span>
				</span>
			</h2>
		</div>

		<ol class="p-sec-values__list">
			<li class="p-sec-values__item u-fade-up">
				<article class="p-sec-values__card">
					<div class="p-sec-values__content">
						<div class="p-sec-values__head">
							<p class="p-sec-values__number">01</p>
							<h3 class="p-sec-values__card-title">石垣の海を知る船長が一貫対応</h3>
						</div>
						<div class="p-sec-values__body">
							<p>石垣島で15年以上ダイビングに携わり、「海洋散骨ディレクター」の資格を持つ現役の船長が、散骨のご相談から散骨セレモニーの進行まで一貫して担当します。</p>
							<p>船長自ら故人様への想いやご家族のご希望を伺い、当日の海況を見極めながら、石垣島の海での安全なお見送りをサポートします。</p>
						</div>
					</div>

					<picture class="p-sec-values__image">
						<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-01.png' ) ); ?>" width="448" height="408" alt="石垣島の海で船を操縦する船長の手元" loading="lazy">
					</picture>
				</article>
			</li>

			<li class="p-sec-values__item u-fade-up">
				<article class="p-sec-values__card">
					<div class="p-sec-values__content">
						<div class="p-sec-values__head">
							<p class="p-sec-values__number">02</p>
							<h3 class="p-sec-values__card-title">初めてでも安心のプランと料金</h3>
						</div>

						<div class="p-sec-values__body">
							<p>海洋散骨は多くのご家族にとって初めての経験です。石垣島海洋散骨センターでは、必要な準備や粉骨の対応、当日の流れまで、初めての方にもわかりやすいよう、一つずつ丁寧にご説明します。</p>
							<p>料金に関しても、自社船での直接対応により仲介マージンを抑え、追加料金なしの安心できる明瞭な価格でご案内しています。</p>
						</div>
					</div>

					<picture class="p-sec-values__image">
						<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-02.png' ) ); ?>" width="448" height="408" alt="船上で海洋散骨のプランや準備について説明する様子" loading="lazy">
					</picture>
				</article>
			</li>

			<li class="p-sec-values__item u-fade-up">
				<article class="p-sec-values__card">
					<div class="p-sec-values__content">
						<div class="p-sec-values__head">
							<p class="p-sec-values__number">03</p>
							<h3 class="p-sec-values__card-title">散骨後まで続く供養サポート</h3>
						</div>

						<div class="p-sec-values__body">
							<p>故人様らしいお見送りができるよう、ご家族のご希望に合わせて、散骨セレモニーの内容を事前にご相談いただけます。</p>
							<p>散骨後には、当日の写真・動画やGPS付き証明書のお渡しに加え、四十九日や一周忌といった節目に合わせたメモリアルクルーズにも対応し、海へ還した後も続く供養をお手伝いします。</p>
						</div>
					</div>

					<picture class="p-sec-values__image">
						<img src="<?php echo esc_url( theme_image_url( 'front-page/about/point-03.png' ) ); ?>" width="448" height="408" alt="海を背景に散骨後の供養サポートについて相談する様子" loading="lazy">
					</picture>
				</article>
			</li>
		</ol>
	</div>
</section>
