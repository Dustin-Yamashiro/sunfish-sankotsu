<?php
/**
 * 代表メッセージセクションのテンプレート。
 *
 * 代表メッセージの写真、見出し、リード文、本文、署名を出力します。
 *
 * @package SunfishSankotsu
 */
?>

<section class="p-sec-message" aria-labelledby="about-message-title">
	<div class="p-sec-message__inner u-container">
		<picture class="p-sec-message__image">
			<img src="<?php echo esc_url( theme_image_url( 'about/message-main.png' ) ); ?>" width="620" height="400" alt="船上で石垣島の海を案内する船長とご家族" loading="lazy">
		</picture>

		<div class="p-sec-message__content">
			<div class="p-sec-message__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Message</p>
				<h2 id="about-message-title" class="c-sec-title__main">代表メッセージ</h2>
			</div>

			<p class="p-sec-message__lead">石垣島から海に還る、一番温かいお別れを。</p>

			<div class="p-sec-message__body">
				<p>テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト。</p>
				<p>テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト。</p>
				<p>テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト。</p>
			</div>

			<p class="p-sec-message__name">代表 / 船長　浜 佑介</p>
		</div>
	</div>
</section>
