<?php
/**
 * Template Name: お問い合わせ完了
 *
 * お問い合わせ送信後のサンクスページ。
 *
 * @package LocalEnvTheme
 */

get_header();
?>

<section class="l-status l-status--thanks u-pd-pt-4 u-pd-pb-6" aria-labelledby="thanks-heading">
	<div class="l-status__inner u-container">
		<h1 id="thanks-heading" class="l-status__title">お問い合わせ<br>ありがとうございます</h1>
		<div class="l-status__lead">
			<p>送信内容を確認のうえ、担当者より1〜2営業日以内を目処にご連絡いたします。</p>
			<p>自動返信メールが届いていない場合は、迷惑メールフォルダもあわせてご確認ください。</p>
		</div>
		<div class="l-status__button c-sec-btn c-sec-btn--center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
