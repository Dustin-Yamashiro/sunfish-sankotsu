<?php
$use_swell_content_shell = theme_uses_swell_content_shell();
$swell_setting           = class_exists( 'SWELL_Theme' ) ? SWELL_Theme::get_setting() : array();

if ( $use_swell_content_shell ) {
	if ( class_exists( 'SWELL_Theme' ) && SWELL_Theme::is_show_sidebar() ) {
		get_sidebar();
	}
	echo '</div>';

	if ( class_exists( 'SWELL_Theme' ) && SWELL_Theme::is_use( 'pjax' ) ) {
		echo '</div>';
	}

	if ( is_active_sidebar( 'before_footer' ) ) {
		echo '<div id="before_footer_widget" class="w-beforeFooter">';
		if ( class_exists( 'SWELL_Theme' ) && ! SWELL_Theme::is_use( 'ajax_footer' ) ) {
			SWELL_Theme::get_parts( 'parts/footer/before_footer' );
		}
		echo '</div>';
	}

	theme_output_swell_breadcrumb( 'bottom' );
} else {
	echo '</main>';
	theme_output_swell_breadcrumb( 'bottom' );
}

$show_footer_contact = theme_should_show_footer_contact();

$footer_contact_cards = array(
	array(
		'label' => 'メールでお問い合わせ',
		'text'  => '1〜2営業日以内を目処に回答しております',
		'url'   => home_url( '/contact/' ),
		'icon'  => 'common/icon/mail-blue.svg',
		'width' => 21,
		'height' => 15,
	),
	array(
		'label' => 'LINEでご相談',
		'text'  => '1〜2営業日以内を目処に回答しております',
		'url'   => 'https://lin.ee/S6W9e0r',
		'icon'  => 'common/icon/line.svg',
		'width' => 26,
		'height' => 26,
		'is_external' => true,
	),
	array(
		'label' => '050-5799-0684',
		'text'  => '12時〜18時・不定休',
		'url'   => 'tel:05057990684',
		'icon'  => 'common/icon/phone.svg',
		'width' => 26,
		'height' => 26,
	),
);

$footer_nav_columns = array(
	array(
		array(
			'label' => '初めての方へ',
			'url'   => home_url( '/beginner/' ),
		),
		array(
			'label' => '私たちについて',
			'url'   => home_url( '/about/' ),
		),
		array(
			'label' => '散骨プラン',
			'children' => array(
				array(
					'label' => '貸切散骨プラン',
					'url'   => home_url( '/kashikiri/' ),
				),
				array(
					'label' => '代理散骨プラン',
					'url'   => home_url( '/dairi/' ),
				),
			),
		),
		array(
			'label' => 'お知らせ',
			'url'   => home_url( '/news/' ),
		),
		array(
			'label' => '海洋散骨コラム',
			'url'   => home_url( '/column/' ),
		),
	),
	array(
		array(
			'label' => 'よくある質問',
			'url'   => home_url( '/faq/' ),
		),
		array(
			'label' => '会社概要',
			'url'   => home_url( '/company/' ),
		),
		array(
			'label' => 'お問い合わせ',
			'url'   => home_url( '/contact/' ),
		),
		array(
			'label' => 'サービス利用規約',
			'url'   => home_url( '/terms/' ),
		),
		array(
			'label' => 'プライバシーポリシー',
			'url'   => home_url( '/privacy-policy/' ),
		),
	),
);
?>

<div class="l-custom-footer-area u-bg--gradient my-setting">
	<?php if ( $show_footer_contact ) : ?>
		<section class="l-custom-footer-contact u-pd-py-5" aria-labelledby="footer-contact-title">
			<div class="l-custom-footer-contact__inner u-container">
				<div class="c-sec-title c-sec-title--center c-sec-title--white u-fade-up">
					<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Contact</p>
					<h2 id="footer-contact-title" class="c-sec-title__main">お問い合わせ</h2>
				</div>

				<div class="l-custom-footer-contact__lead">
					<p class="l-custom-footer-contact__lead-text">
						海洋散骨についてのご相談は、<br class="u-br--tb"><br class="u-br--sp">フォーム・メール・お電話から承ります。<br>
					</p>
					<p class="l-custom-footer-contact__lead-text">
						ご希望日や人数が未定の段階でも、<br class="u-br--sp">お気軽にご連絡ください。
					</p>
				</div>

				<div class="l-custom-footer-contact__cards">
					<?php foreach ( $footer_contact_cards as $card ) : ?>
						<a class="l-custom-footer-contact__card" href="<?php echo esc_url( $card['url'] ); ?>"<?php echo ! empty( $card['is_external'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
							<span class="l-custom-footer-contact__card-heading">
								<img class="l-custom-footer-contact__card-icon" src="<?php echo esc_url( theme_image_url( $card['icon'] ) ); ?>" width="<?php echo esc_attr( $card['width'] ); ?>" height="<?php echo esc_attr( $card['height'] ); ?>" alt="" aria-hidden="true" loading="lazy">
								<span class="l-custom-footer-contact__card-label"><?php echo esc_html( $card['label'] ); ?></span>
							</span>
							<span class="l-custom-footer-contact__card-text"><?php echo esc_html( $card['text'] ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<footer class="l-custom-footer<?php echo $show_footer_contact ? '' : ' l-custom-footer--standalone'; ?>">
		<div class="l-custom-footer__inner u-container u-pd-py-3">
			<div class="l-custom-footer__company">
				<a class="l-custom-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<img src="<?php echo esc_url( theme_image_url( 'common/logo/logo-white.png' ) ); ?>" width="511" height="511" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" loading="lazy">
				</a>
				<address class="l-custom-footer__address">
					<span>運営：合同会社サンフィッシュ</span>
					<span>URL：<a href="https://isigakijima-diving.com/" target="_blank" rel="noopener noreferrer">https://isigakijima-diving.com/</a></span>
					<span>〒907-0002 沖縄県石垣市真栄里393-32</span>
					<span><a href="tel:05057990684">TEL：050-5799-0684</a></span>
				</address>
			</div>

			<nav class="l-custom-footer__nav" aria-label="フッターナビゲーション">
				<?php foreach ( $footer_nav_columns as $column ) : ?>
					<ul class="l-custom-footer__nav-list">
						<?php foreach ( $column as $item ) : ?>
							<?php $has_children = ! empty( $item['children'] ) && is_array( $item['children'] ); ?>
							<li class="l-custom-footer__nav-item<?php echo $has_children ? ' l-custom-footer__nav-item--has-children' : ''; ?>">
								<?php if ( $has_children ) : ?>
									<span class="l-custom-footer__nav-label"><?php echo esc_html( $item['label'] ); ?></span>
									<ul class="l-custom-footer__child-list">
										<?php foreach ( $item['children'] as $child ) : ?>
											<li class="l-custom-footer__child-item">
												<a class="l-custom-footer__nav-link l-custom-footer__nav-link--child" href="<?php echo esc_url( $child['url'] ); ?>">
													<?php echo esc_html( $child['label'] ); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<a class="l-custom-footer__nav-link" href="<?php echo esc_url( $item['url'] ); ?>">
										<?php echo esc_html( $item['label'] ); ?>
									</a>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endforeach; ?>
			</nav>
		</div>
		<p class="l-custom-footer__copyright">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> Sun Fish Co.,Ltd. All Rights Reserved.</p>
	</footer>
</div>
<?php
if ( $use_swell_content_shell && class_exists( 'SWELL_Theme' ) ) {
	if ( has_nav_menu( 'fix_bottom_menu' ) ) {
		$cache_key = ! empty( $swell_setting['cache_bottom_menu'] ) ? 'fix_bottom_menu' : '';
		SWELL_Theme::get_parts( 'parts/footer/fix_menu', null, $cache_key );
	}

	SWELL_Theme::get_parts( 'parts/footer/fix_btns' );
	SWELL_Theme::get_parts( 'parts/footer/modals' );
}
?>
</div><!--/ #body_wrap-->
<?php wp_footer(); ?>
<?php
if ( ! empty( $swell_setting['foot_code'] ) ) {
	echo $swell_setting['foot_code']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
?>
</body>
</html>
