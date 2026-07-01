<?php
/**
 * 404 error page.
 *
 * @package LocalEnvTheme
 */

get_header();
?>

<section class="l-status l-status--not-found u-pd-pt-4 u-pd-pb-6" aria-labelledby="not-found-heading">
	<div class="l-status__inner u-container">
		<h1 id="not-found-heading" class="l-status__title">ページが見つかりません</h1>
		<div class="l-status__lead">
			<p>お探しのページは、URLが変更されたか、現在は公開されていない可能性があります。</p>
			<p>お手数ですが、トップページまたはメニューから目的のページをお探しください。</p>
		</div>
		<div class="l-status__button c-sec-btn c-sec-btn--center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a>
		</div>
	</div>
</section>

<?php
get_footer();
