<?php
/**
 * 会社概要セクションのテンプレート。
 *
 * 会社概要の見出し、会社情報リスト、地図を出力します。
 *
 * @package SunfishSankotsu
 */

$section_classes = array( 'p-sec-company' );

if ( is_page( 'about' ) ) {
	$section_classes[] = 'u-pd-pt-5';
	$section_classes[] = 'u-pd-pb-1';
} elseif ( is_page( 'company' ) ) {
	$section_classes[] = 'u-pd-pt-3';
	$section_classes[] = 'u-pd-pb-1';
} else {
	$section_classes[] = 'u-pd-py-5';
}
?>

<section class="<?php echo esc_attr( implode( ' ', $section_classes ) ); ?>" aria-labelledby="about-company-title">
	<div class="p-sec-company__inner u-container">
		<div class="p-sec-company__title c-sec-title c-sec-title--center u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Company</p>
			<h2 id="about-company-title" class="c-sec-title__main">会社概要</h2>
		</div>

		<div class="p-sec-company__body">
			<div class="p-sec-company__info">
				<dl class="p-sec-company__list">
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">会社名</dt>
						<dd class="p-sec-company__description">合同会社サンフィッシュ</dd>
					</div>
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">所在地</dt>
						<dd class="p-sec-company__description">〒907-0002<br>沖縄県石垣市真栄里393-32</dd>
					</div>
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">代表者名</dt>
						<dd class="p-sec-company__description">浜 佑介</dd>
					</div>
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">設立年</dt>
						<dd class="p-sec-company__description">2022年 11月</dd>
					</div>
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">電話番号</dt>
						<dd class="p-sec-company__description"><a href="tel:05057990684">050-5799-0684</a></dd>
					</div>
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">メールアドレス</dt>
						<dd class="p-sec-company__description"><a href="mailto:info@ishigaki-sankotsu.com">info@ishigaki-sankotsu.com</a></dd>
					</div>
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">保有船舶 / 提携マリーナ</dt>
						<dd class="p-sec-company__description">Michelle号・浜崎マリーナ</dd>
					</div>
					<div class="p-sec-company__item">
						<dt class="p-sec-company__term">事業内容</dt>
						<dd class="p-sec-company__description">・海洋散骨事業<br>・ダイビングショップ</dd>
					</div>
				</dl>
			</div>

			<div class="p-sec-company__map">
				<iframe src="<?php echo esc_url( 'https://www.google.com/maps?q=%E6%B2%96%E7%B8%84%E7%9C%8C%E7%9F%B3%E5%9E%A3%E5%B8%82%E7%9C%9F%E6%A0%84%E9%87%8C393-32&output=embed' ); ?>" width="640" height="440" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="沖縄県石垣市真栄里393-32の地図"></iframe>
			</div>
		</div>
	</div>
</section>
