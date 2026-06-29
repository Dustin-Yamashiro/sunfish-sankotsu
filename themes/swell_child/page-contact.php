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

<section class="l-contact u-pd-pt-4 u-pd-pb-6" aria-labelledby="contact-page-title">
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
						<img class="l-contact__method-icon" src="<?php echo esc_url( theme_image_url( 'common/icon/phone.svg' ) ); ?>" width="26" height="26" alt="" aria-hidden="true">
						<span class="l-contact__method-label">050-5799-0684</span>
					</span>
					<span class="l-contact__method-text">12時〜18時・不定休</span>
				</a>
			</section>

			<section class="l-contact__method" aria-labelledby="contact-line-title">
				<h2 id="contact-line-title" class="l-contact__method-title">LINEでのご相談</h2>
				<a id="line-consultation" class="l-contact__method-card" href="<?php echo esc_url( 'https://lin.ee/S6W9e0r' ); ?>" target="_blank" rel="noopener noreferrer">
					<span class="l-contact__method-heading">
						<img class="l-contact__method-icon" src="<?php echo esc_url( theme_image_url( 'common/icon/line.svg' ) ); ?>" width="26" height="26" alt="" aria-hidden="true">
						<span class="l-contact__method-label">LINEでご相談</span>
					</span>
					<span class="l-contact__method-text">1〜2営業日以内を目処に回答しております</span>
				</a>
			</section>
		</div>

		<section class="l-contact__form-section" aria-labelledby="contact-form-title">
			<h2 id="contact-form-title" class="l-contact__form-title">お問い合わせフォーム</h2>

			<?php
			$contact_forms = get_posts(
				array(
					'post_type'              => 'wpcf7_contact_form',
					'title'                  => 'お問い合わせフォーム',
					'post_status'            => 'publish',
					'posts_per_page'         => 1,
					'no_found_rows'          => true,
					'update_post_meta_cache' => false,
					'update_post_term_cache' => false,
				)
			);
			$contact_form  = ! empty( $contact_forms[0] ) ? $contact_forms[0] : null;

			if ( $contact_form && shortcode_exists( 'contact-form-7' ) ) {
				echo do_shortcode(
					sprintf(
						'[contact-form-7 id="%d" title="%s" html_class="l-contact__form"]',
						(int) $contact_form->ID,
						esc_attr( get_the_title( $contact_form ) )
					)
				);
			}
			?>
		</section>
	</div>
</section>

<?php get_footer(); ?>
