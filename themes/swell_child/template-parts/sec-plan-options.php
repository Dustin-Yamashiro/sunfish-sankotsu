<?php
/**
 * プラン詳細の共通オプションブロック。
 *
 * 貸切散骨・代理散骨のプラン詳細内で共通表示する、プランに含まれるものと追加オプションを出力します。
 *
 * @package SunfishSankotsu
 */
?>

<div class="p-sec-plan-detail__included">
	<h3 class="p-sec-plan-detail__section-heading">［ プランに含まれるもの ］</h3>

	<ul class="p-sec-plan-detail__included-list">
		<li class="p-sec-plan-detail__included-item">
			<article class="p-sec-plan-detail__included-card">
				<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/flower.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<h4 class="p-sec-plan-detail__card-title">献花用の花びら</h4>
				<div class="p-sec-plan-detail__card-body">
					<p>石垣島の自然に配慮し、環境負荷の少ない季節の色鮮やかな生花（花びらのみ）をご用意します。</p>
					<p>海一面に広がる花びらが、故人様の旅立ちを美しく彩ります。</p>
				</div>
			</article>
		</li>

		<li class="p-sec-plan-detail__included-item">
			<article class="p-sec-plan-detail__included-card">
				<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/sake.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<h4 class="p-sec-plan-detail__card-title">献酒（地酒・日本酒）</h4>
				<div class="p-sec-plan-detail__card-body">
					<p>故人様を偲び、海を清めるための献酒をご用意します。</p>
					<p>石垣島の地酒（泡盛）または日本酒を使用し、古来からの儀礼を大切に守ります。</p>
				</div>
			</article>
		</li>

		<li class="p-sec-plan-detail__included-item">
			<article class="p-sec-plan-detail__included-card">
				<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/materials.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<h4 class="p-sec-plan-detail__card-title">環境対応・散骨用資材</h4>
				<div class="p-sec-plan-detail__card-body">
					<p>遺骨を納める袋は、海中で速やかに溶ける特殊な水溶性紙を使用。</p>
					<p>環境保護のガイドラインを遵守した、海に優しいお見送りをお約束します。</p>
				</div>
			</article>
		</li>

		<li class="p-sec-plan-detail__included-item">
			<article class="p-sec-plan-detail__included-card">
				<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/photo-video.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<h4 class="p-sec-plan-detail__card-title">写真・動画撮影データ</h4>
				<div class="p-sec-plan-detail__card-body">
					<p>現役ダイバーの撮影技術を活かし、セレモニーの様子を記録します。</p>
					<p>青い海、献花の瞬間など、一生の記憶に残るシーンをデータ形式で無料提供いたします。</p>
				</div>
			</article>
		</li>

		<li class="p-sec-plan-detail__included-item">
			<article class="p-sec-plan-detail__included-card">
				<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/shoumeisyo.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<h4 class="p-sec-plan-detail__card-title">海洋散骨証明書</h4>
				<div class="p-sec-plan-detail__card-body">
					<p>散骨を実施した正確な日時と、GPSによる緯度経度を記載したオリジナルの証明書を発行します。</p>
					<p>後日、ご自宅へ大切に郵送いたします。</p>
				</div>
			</article>
		</li>
	</ul>
</div>

<div class="p-sec-plan-detail__options">
	<h3 class="p-sec-plan-detail__section-heading">［ 追加オプション ］</h3>

	<ul class="p-sec-plan-detail__option-list">
		<li class="p-sec-plan-detail__option-item">
			<article class="p-sec-plan-detail__option-card">
				<div class="p-sec-plan-detail__option-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/urn.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<div class="p-sec-plan-detail__option-content">
					<h4 class="p-sec-plan-detail__option-title">安心粉骨・洗浄パック</h4>
					<p class="p-sec-plan-detail__option-text">提携専門業者による粉骨・六価クロム除去・洗浄。散骨に必須な工程をワンストップで行います。</p>
					<p class="p-sec-plan-detail__option-price">税込 33,000円〜</p>
				</div>
			</article>
		</li>

		<li class="p-sec-plan-detail__option-item">
			<article class="p-sec-plan-detail__option-card">
				<div class="p-sec-plan-detail__option-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/special-flower.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<div class="p-sec-plan-detail__option-content">
					<h4 class="p-sec-plan-detail__option-title">献花用・特別フラワー</h4>
					<p class="p-sec-plan-detail__option-text">故人様の好きだった花や色に合わせた花材をご用意。故人様に合った形で還すことができます。</p>
					<p class="p-sec-plan-detail__option-price">税込 11,000円〜</p>
				</div>
			</article>
		</li>

		<li class="p-sec-plan-detail__option-item">
			<article class="p-sec-plan-detail__option-card">
				<div class="p-sec-plan-detail__option-icon" aria-hidden="true">
					<img src="<?php echo esc_url( theme_image_url( 'illustrations/options/memorial-cruise.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
				</div>
				<div class="p-sec-plan-detail__option-content">
					<h4 class="p-sec-plan-detail__option-title">メモリアル・クルーズ</h4>
					<p class="p-sec-plan-detail__option-text">一周忌や三回忌に合わせたクルーズが可能。GPSで記録した散骨ポイントへ再びご案内します。</p>
					<p class="p-sec-plan-detail__option-price">税込 55,000円〜</p>
				</div>
			</article>
		</li>
	</ul>
</div>
