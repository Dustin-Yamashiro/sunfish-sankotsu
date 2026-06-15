<?php
get_header();
?>

<section class="p-not-found u-container">
	<h1 class="c-title"><?php esc_html_e( 'ページが見つかりません', 'local-env' ); ?></h1>
	<p><?php esc_html_e( 'URL を確認するか、トップページから目的のページをお探しください。', 'local-env' ); ?></p>
</section>

<?php
get_footer();
