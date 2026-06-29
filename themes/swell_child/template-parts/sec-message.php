<?php
/**
 * 代表メッセージセクションのテンプレート。
 *
 * 代表メッセージの写真、見出し、リード文、本文、署名を出力します。
 *
 * @package SunfishSankotsu
 */
?>

<section class="p-sec-message u-pd-pt-3 u-pd-pb-6" aria-labelledby="about-message-title">
	<div class="p-sec-message__inner u-container">
		<picture class="p-sec-message__image">
			<img src="<?php echo esc_url( theme_image_url( 'visuals/message/president.png' ) ); ?>" width="620" height="400" alt="石垣島の海に立つ船長" loading="lazy">
		</picture>

		<div class="p-sec-message__content">
			<div class="p-sec-message__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Message</p>
				<h2 id="about-message-title" class="c-sec-title__main">代表メッセージ</h2>
			</div>

			<p class="p-sec-message__lead">毎日出る海だから、託せる</p>

			<div class="p-sec-message__body">
				<p>これまで、シュノーケリングやダイビングのガイドとして、石垣島の海で多くの時間を過ごしてきました。</p>
				<p>そんな中で、石垣島の海はただ美しいだけの場所ではなく、人の心に残り、人生の大切な時間と結びついていく場所だと感じています。</p>
				<p>大切な方を海へお還しする時間が、ご家族の心に穏やかに残るよう、船長として一つひとつ誠実にお手伝いします。</p>
			</div>

			<p class="p-sec-message__name">代表　浜 佑介</p>
		</div>
	</div>
</section>
