<?php
/**
 * 3つのこだわりセクション
 *
 * 石垣島海洋散骨センターの3つのこだわりを固定HTMLで出力します。
 *
 * @package SunfishSankotsu
 */

$sec_values_padding_class = 'u-pd-pb-6';

if ( is_string( $args ) && '' !== $args ) {
	$sec_values_padding_class .= ' u-pd-' . sanitize_html_class( $args );
}
?>

<section class="p-sec-values <?php echo esc_attr( $sec_values_padding_class ); ?>" aria-labelledby="kashikiri-values-title">
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
							<p>石垣島で15年以上ダイビングに携わり、「海洋散骨ディレクター」の資格を持つ現役の船長が、散骨のご相談からセレモニーの進行まで一貫して担当します。</p>
							<p>船長自ら故人様への想いやご家族の希望を伺い、当日の海況を見極めながら、石垣島の海でのお見送りをサポートします。</p>
						</div>
					</div>

					<picture class="p-sec-values__image">
						<img src="<?php echo esc_url( theme_image_url( 'visuals/values/01.png' ) ); ?>" width="448" height="408" alt="石垣島の海で船を操縦する船長の手元" loading="lazy">
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
							<p>石垣島海洋散骨センターでは、必要な準備や粉骨の流れ、当日の対応まで、初めての方にもわかりやすいよう、一つずつ丁寧にご説明します。</p>
							<p>費用面でも自社船での直接対応により仲介料を抑え、追加料金なしの安心できる明瞭な価格でご案内しています。</p>
						</div>
					</div>

					<picture class="p-sec-values__image">
						<img src="<?php echo esc_url( theme_image_url( 'visuals/values/02.png' ) ); ?>" width="448" height="408" alt="船上で海洋散骨のプランや準備について説明する様子" loading="lazy">
					</picture>
				</article>
			</li>

			<li class="p-sec-values__item u-fade-up">
				<article class="p-sec-values__card">
					<div class="p-sec-values__content">
						<div class="p-sec-values__head">
							<p class="p-sec-values__number">03</p>
							<h3 class="p-sec-values__card-title">散骨後も続く供養サポート</h3>
						</div>

						<div class="p-sec-values__body">
							<p>故人様らしいお見送りができるよう、ご家族のご希望に合わせて、散骨セレモニーの内容を事前にご相談いただけます。</p>
							<p>散骨後には、写真・動画やGPS付き証明書のお渡しに加え、節目に合わせたメモリアルクルーズにも対応し、海へ還した後も続く供養をお手伝いします。</p>
						</div>
					</div>

					<picture class="p-sec-values__image">
						<img src="<?php echo esc_url( theme_image_url( 'visuals/values/03.png' ) ); ?>" width="448" height="408" alt="海を背景に散骨後の供養サポートについて相談する様子" loading="lazy">
					</picture>
				</article>
			</li>
		</ol>
	</div>
</section>
