<?php
/**
 * 会社概要セクションのテンプレート。
 *
 * 会社概要の見出し、会社情報リスト、地図を出力します。
 *
 * @package SunfishSankotsu
 */

$section_modifier = is_string( $args ) && '' !== $args ? ' p-sec-company--' . sanitize_html_class( $args ) : '';
?>

<section class="p-sec-company<?php echo esc_attr( $section_modifier ); ?>" aria-labelledby="about-company-title">
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
						<dd class="p-sec-company__description"><a href="mailto:info@test.com">info@test.com</a></dd>
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
				<iframe src="<?php echo esc_url( 'https://www.google.com/maps?q=%E9%A6%96%E9%87%8C%E5%9F%8E%E5%85%AC%E5%9C%92&output=embed' ); ?>" width="640" height="440" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="首里城公園の地図"></iframe>
			</div>
		</div>
	</div>
</section>
