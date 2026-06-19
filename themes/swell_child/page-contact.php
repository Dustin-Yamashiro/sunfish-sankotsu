<?php
/**
 * Template Name: お問い合わせ
 *
 * お問い合わせ固定ページ。
 *
 * @package LocalEnvTheme
 */

get_header();

get_template_part(
	'template-parts/page-kv',
	null,
	array(
		'id'    => 'contact-page-title',
		'title' => 'お問い合わせ',
	)
);
?>

<section class="l-contact" aria-labelledby="contact-page-title">
	<div class="l-contact__inner u-container">
		<div class="l-contact__lead">
			<p>ご相談やご不明な点がございましたら、お電話、LINE、フォームよりお気軽にご連絡ください。</p>
			<p>些細な疑問やご不安な点にも、担当者がひとつひとつ丁寧にお答えいたします。</p>
		</div>

		<div class="l-contact__methods" aria-label="お問い合わせ方法">
			<section class="l-contact__method" aria-labelledby="contact-tel-title">
				<h2 id="contact-tel-title" class="l-contact__method-title">電話でのお問い合わせ</h2>
				<a class="l-contact__method-card" href="tel:05057990684">
					<span class="l-contact__method-heading">
						<img class="l-contact__method-icon" src="<?php echo esc_url( theme_image_url( 'footer/icon-phone.svg' ) ); ?>" width="26" height="26" alt="" aria-hidden="true">
						<span class="l-contact__method-label">050-5799-0684</span>
					</span>
					<span class="l-contact__method-text">12時〜18時・不定休</span>
				</a>
			</section>

			<section class="l-contact__method" aria-labelledby="contact-line-title">
				<h2 id="contact-line-title" class="l-contact__method-title">LINEでのご相談</h2>
				<a id="line-consultation" class="l-contact__method-card" href="#line-consultation">
					<span class="l-contact__method-heading">
						<img class="l-contact__method-icon" src="<?php echo esc_url( theme_image_url( 'footer/icon-line.svg' ) ); ?>" width="26" height="26" alt="" aria-hidden="true">
						<span class="l-contact__method-label">LINEでご相談</span>
					</span>
					<span class="l-contact__method-text">1〜2営業日以内を目処に回答しております</span>
				</a>
			</section>
		</div>

		<section class="l-contact__form-section" aria-labelledby="contact-form-title">
			<h2 id="contact-form-title" class="l-contact__form-title">お問い合わせフォーム</h2>

			<form class="l-contact__form" action="#" method="post">
				<div class="l-contact__field">
					<label class="l-contact__label" for="contact-name">
						<span class="l-contact__label-text">お名前</span>
						<span class="l-contact__required">必須</span>
					</label>
					<input id="contact-name" class="l-contact__control" type="text" name="your-name" value="山田 花子" required>
				</div>

				<div class="l-contact__field">
					<label class="l-contact__label" for="contact-kana">
						<span class="l-contact__label-text">ふりがな</span>
						<span class="l-contact__required">必須</span>
					</label>
					<input id="contact-kana" class="l-contact__control" type="text" name="your-kana" value="やまだはなこ" required>
				</div>

				<div class="l-contact__field">
					<label class="l-contact__label" for="contact-tel">
						<span class="l-contact__label-text">電話番号</span>
					</label>
					<input id="contact-tel" class="l-contact__control" type="tel" name="your-tel" value="090-0000-0000">
				</div>

				<div class="l-contact__field">
					<label class="l-contact__label" for="contact-email">
						<span class="l-contact__label-text">メールアドレス</span>
						<span class="l-contact__required">必須</span>
					</label>
					<input id="contact-email" class="l-contact__control" type="email" name="your-email" value="info@test.com" required>
				</div>

				<div class="l-contact__field">
					<label class="l-contact__label" for="contact-type">
						<span class="l-contact__label-text">お問い合わせの種類</span>
						<span class="l-contact__required">必須</span>
					</label>
					<span class="l-contact__select-wrap">
						<select id="contact-type" class="l-contact__control l-contact__control--select" name="your-type" required>
							<option value="貸切散骨について">貸切散骨について</option>
							<option value="代理散骨について">代理散骨について</option>
							<option value="粉骨について">粉骨について</option>
							<option value="メモリアルクルーズについて">メモリアルクルーズについて</option>
							<option value="その他">その他</option>
						</select>
					</span>
				</div>

				<div class="l-contact__field l-contact__field--textarea">
					<label class="l-contact__label" for="contact-message">
						<span class="l-contact__label-text">お問い合わせ内容</span>
						<span class="l-contact__required">必須</span>
					</label>
					<textarea id="contact-message" class="l-contact__control l-contact__control--textarea" name="your-message" required>テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト

テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト</textarea>
				</div>

				<div class="l-contact__privacy">
					<p class="l-contact__privacy-text">
						<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">プライバシーポリシー</a>を必ずお読みください。<br>
						上記の内容に同意頂いた場合は、下記チェックの上、確認画面へお進みください。
					</p>
					<label class="l-contact__privacy-check">
						<input type="checkbox" name="privacy-agree" checked>
						<span>プライバシーポリシーに同意する</span>
					</label>
				</div>

				<div class="l-contact__submit c-sec-btn c-sec-btn--next c-sec-btn--center">
					<button type="button">送信する</button>
				</div>
			</form>
		</section>
	</div>
</section>

<?php get_footer(); ?>
