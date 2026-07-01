<?php
$use_swell_content_shell = theme_uses_swell_content_shell();
$swell_setting           = class_exists( 'SWELL_Theme' ) ? SWELL_Theme::get_setting() : array();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php class_exists( 'SWELL_Theme' ) ? SWELL_Theme::root_attrs() : ''; ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		(function () {
			var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

			if (!reduceMotion) {
				document.documentElement.classList.add('is-anim-ready');
			}
		}());
	</script>
	<?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>
<div id="body_wrap" <?php body_class(); ?> <?php class_exists( 'SWELL_Theme' ) ? SWELL_Theme::body_attrs() : ''; ?>>
<?php
$header_utility_links = array(
	array(
		'label' => 'よくある質問',
		'url'   => home_url( '/faq/' ),
	),
	array(
		'label' => '会社概要',
		'url'   => home_url( '/company/' ),
	),
	array(
		'label' => '利用規約',
		'url'   => home_url( '/terms/' ),
	),
	array(
		'label' => 'プライバシーポリシー',
		'url'   => home_url( '/privacy-policy/' ),
	),
);

$header_primary_links = array(
	array(
		'label'    => '初めての方へ',
		'url'      => home_url( '/beginner/' ),
		'is_first' => true,
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
);

$header_mobile_links = array_merge( $header_primary_links, $header_utility_links );
?>
<header class="l-custom-header js-header my-setting">
	<div class="l-custom-header__inner">
		<a class="l-custom-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<img src="<?php echo esc_url( theme_image_url( 'common/logo/logo.jpg' ) ); ?>" width="540" height="200" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" fetchpriority="high">
		</a>

		<button class="l-custom-header__toggle js-header-toggle" type="button" aria-controls="site-header-menu" aria-expanded="false" aria-label="メニューを開閉する">
			<span class="l-custom-header__toggle-lines" aria-hidden="true">
				<span></span>
				<span></span>
				<span></span>
			</span>
		</button>

		<div id="site-header-menu" class="l-custom-header__menu-panel js-header-panel">
			<div class="l-custom-header__navs">
				<nav class="l-custom-header__utility" aria-label="補助ナビゲーション">
					<ul class="l-custom-header__utility-list">
						<?php foreach ( $header_utility_links as $link ) : ?>
							<li class="l-custom-header__utility-item">
								<a class="l-custom-header__utility-link" href="<?php echo esc_url( $link['url'] ); ?>">
									<?php echo esc_html( $link['label'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>

				<nav class="l-custom-header__primary" aria-label="グローバルナビゲーション">
					<ul class="l-custom-header__primary-list">
						<?php foreach ( $header_primary_links as $link ) : ?>
							<?php $has_children = ! empty( $link['children'] ) && is_array( $link['children'] ); ?>
							<li class="l-custom-header__primary-item<?php echo $has_children ? ' l-custom-header__primary-item--has-children' : ''; ?>">
								<?php if ( $has_children ) : ?>
									<button class="l-custom-header__primary-link l-custom-header__primary-link--has-children" type="button" aria-haspopup="true">
										<?php echo esc_html( $link['label'] ); ?>
									</button>
								<?php else : ?>
									<a class="l-custom-header__primary-link<?php echo ! empty( $link['is_first'] ) ? ' is-current' : ''; ?>" href="<?php echo esc_url( $link['url'] ); ?>">
										<?php echo esc_html( $link['label'] ); ?>
									</a>
								<?php endif; ?>
								<?php if ( $has_children ) : ?>
									<ul class="l-custom-header__dropdown" aria-label="<?php echo esc_attr( $link['label'] ); ?>の詳細メニュー">
										<?php foreach ( $link['children'] as $child ) : ?>
											<li class="l-custom-header__dropdown-item">
												<a class="l-custom-header__dropdown-link" href="<?php echo esc_url( $child['url'] ); ?>">
													<span class="l-custom-header__dropdown-label"><?php echo esc_html( $child['label'] ); ?></span>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>

			<nav class="l-custom-header__mobile-nav" aria-label="スマートフォン用ナビゲーション">
				<ul class="l-custom-header__mobile-list">
					<?php foreach ( $header_mobile_links as $link ) : ?>
						<?php $has_children = ! empty( $link['children'] ) && is_array( $link['children'] ); ?>
						<li class="l-custom-header__mobile-item<?php echo $has_children ? ' l-custom-header__mobile-item--has-children' : ''; ?>">
							<?php if ( $has_children ) : ?>
								<button class="l-custom-header__mobile-link l-custom-header__mobile-link--button js-header-sub-toggle" type="button" aria-expanded="false" aria-controls="mobile-submenu-<?php echo esc_attr( sanitize_title( $link['label'] ) ); ?>">
									<?php echo esc_html( $link['label'] ); ?>
								</button>
								<ul id="mobile-submenu-<?php echo esc_attr( sanitize_title( $link['label'] ) ); ?>" class="l-custom-header__mobile-sub-list js-header-sub-panel" aria-label="<?php echo esc_attr( $link['label'] ); ?>の詳細メニュー">
									<?php foreach ( $link['children'] as $child ) : ?>
										<li class="l-custom-header__mobile-sub-item">
											<a class="l-custom-header__mobile-sub-link" href="<?php echo esc_url( $child['url'] ); ?>">
												<span class="l-custom-header__mobile-sub-label"><?php echo esc_html( $child['label'] ); ?></span>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php else : ?>
								<a class="l-custom-header__mobile-link<?php echo ! empty( $link['is_first'] ) ? ' is-current' : ''; ?>" href="<?php echo esc_url( $link['url'] ); ?>">
									<?php echo esc_html( $link['label'] ); ?>
								</a>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="l-custom-header__actions">
				<a class="l-custom-header__action l-custom-header__action--contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<img class="l-custom-header__action-icon" src="<?php echo esc_url( theme_image_url( 'common/icon/mail-white.svg' ) ); ?>" width="22" height="18" alt="" aria-hidden="true" fetchpriority="high">
					<span class="l-custom-header__action-text">問い合わせ</span>
				</a>
				<a class="l-custom-header__action l-custom-header__action--line" href="<?php echo esc_url( 'https://lin.ee/S6W9e0r' ); ?>" target="_blank" rel="noopener noreferrer">
					<img class="l-custom-header__action-icon" src="<?php echo esc_url( theme_image_url( 'common/icon/line-large.svg' ) ); ?>" width="30" height="30" alt="" aria-hidden="true" fetchpriority="high">
					<span class="l-custom-header__action-text">LINEで相談</span>
				</a>
			</div>
		</div>
	</div>
</header>
<?php if ( theme_should_show_floating_contact() ) : ?>
	<nav class="l-floating-contact my-setting" aria-label="固定問い合わせメニュー">
		<a class="l-floating-contact__link l-floating-contact__link--contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" aria-label="お問い合わせページへ移動">
			<span class="l-floating-contact__icon" aria-hidden="true">
				<img src="<?php echo esc_url( theme_image_url( 'common/icon/mail-white.svg' ) ); ?>" width="22" height="18" alt="" fetchpriority="high">
			</span>
			<span class="l-floating-contact__label">お問い合わせ</span>
		</a>

		<a class="l-floating-contact__link l-floating-contact__link--line" href="<?php echo esc_url( 'https://lin.ee/S6W9e0r' ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LINEで相談する">
			<span class="l-floating-contact__icon" aria-hidden="true">
				<img src="<?php echo esc_url( theme_image_url( 'common/icon/line-large.svg' ) ); ?>" width="30" height="30" alt="" fetchpriority="high">
			</span>
			<span class="l-floating-contact__label">ご相談</span>
		</a>
	</nav>
<?php endif; ?>
<?php if ( $use_swell_content_shell ) : ?>
	<?php
	if ( class_exists( 'SWELL_Theme' ) ) {
		if ( SWELL_Theme::is_use( 'pjax' ) ) {
			echo '<div data-barba="container" data-barba-namespace="home">';
		}

		if ( SWELL_Theme::is_show_ttltop() ) {
			SWELL_Theme::get_parts( 'parts/top_title_area' );
		}

		theme_output_swell_breadcrumb( 'top' );
	}
	?>
	<div id="content" class="l-content l-container" <?php class_exists( 'SWELL_Theme' ) ? SWELL_Theme::content_attrs() : ''; ?>>
		<?php
		if ( class_exists( 'SWELL_Theme' ) && SWELL_Theme::is_show_pickup_banner() ) {
			$cache_key = ! empty( $swell_setting['cache_top'] ) ? 'pickup_banner' : '';
			SWELL_Theme::get_parts( 'parts/top/pickup_banner', null, $cache_key );
		}
		?>
<?php else : ?>
	<?php theme_output_swell_breadcrumb( 'top' ); ?>
	<main id="primary" class="my-setting">
<?php endif; ?>
