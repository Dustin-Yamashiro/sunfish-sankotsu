<?php
/**
 * Template Name: 初めての方へ
 *
 * 初めて海洋散骨を検討する方向けの固定ページテンプレート。
 *
 * @package LocalEnvTheme
 */

get_header();
?>

<?php
get_template_part(
	'template-parts/page-kv',
	null,
	array(
		'id'    => 'beginner-page-title',
		'title' => '初めての方へ',
	)
);
?>

<section class="l-sec-split" aria-labelledby="beginner-introduction-title">
	<div class="l-sec-split__inner u-container">
		<div class="l-sec-split__content">
			<div class="l-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Introduction</p>
				<h2 id="beginner-introduction-title" class="c-sec-title__main">海洋散骨とは</h2>
			</div>
			<div class="l-sec-split__body">
				<p>海洋散骨とは、お墓へ納骨する代わりに、ご遺骨を粉骨して海へ供養する自然葬の一つです。</p>
				<p>ただ海に還すだけでなく、散骨した海をこれからも故人様を想う場所として残す、新しい供養のカタチ。</p>
				<p>石垣島海洋散骨センターでは、海洋散骨が初めての方でも安心して故人様をお見送りできるよう、分かりやすく丁寧にサポートいたします。</p>
			</div>
		</div>

		<div class="l-sec-split__visual">
			<picture class="l-sec-split__image l-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'beginner/introduction-sub.png' ) ); ?>" width="254" height="170" alt="船のそばの海面に浮かぶ白い花" loading="lazy">
			</picture>
			<picture class="l-sec-split__image l-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'beginner/introduction-main.png' ) ); ?>" width="500" height="333" alt="船上で石垣島の海に手を合わせるご家族" loading="lazy">
			</picture>
		</div>
	</div>
</section>

<?php
$reason_items = array(
	array(
		'image' => 'kashikiri-plan/reason-01.png',
		'alt'   => '家族で写真を見ながら海洋散骨について相談する様子',
		'texts' => array(
			'お墓の後継者がいない',
			'子や孫に負担をかけたくない',
		),
	),
	array(
		'image' => 'kashikiri-plan/reason-02.png',
		'alt'   => '家族で海を見ながら故人を見送る様子',
		'texts' => array(
			'故人が好きだった海で散骨がしたい',
			'石垣の海で散骨がしたい',
		),
	),
	array(
		'image' => 'kashikiri-plan/reason-03.png',
		'alt'   => '石垣島の海に浮かぶ散骨用の船',
		'texts' => array(
			'宗教に縛られず自由に還したい',
			'お墓ではなく自然に供養したい',
		),
	),
);
?>

<section class="l-sec-reason" aria-labelledby="beginner-reason-title">
	<div class="l-sec-reason__inner u-container">
		<h2 id="beginner-reason-title" class="l-sec-reason__title u-fade-up">このような「想い」の方に<br>選ばれています</h2>

		<div class="l-sec-reason__list">
			<?php foreach ( $reason_items as $item ) : ?>
				<article class="l-sec-reason__item">
					<picture class="l-sec-reason__image">
						<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="1254" height="1254" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy">
					</picture>

					<ul class="l-sec-reason__text-list l-sec-reason__text-list--bullet">
						<?php foreach ( $item['texts'] as $text ) : ?>
							<li><?php echo esc_html( $text ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="l-sec-feature l-sec-feature--compact js-feature-sec" aria-labelledby="beginner-feature-title" data-feature-sec>
	<div class="l-sec-feature__inner u-container">
		<div class="l-sec-feature__message">
			<div class="l-sec-feature__title c-sec-title u-fade-up c-sec-title--white">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Feature</p>
				<h2 id="beginner-feature-title" class="c-sec-title__main">海洋散骨の魅力</h2>
			</div>
			<div class="l-sec-feature__body">
				<p>海洋散骨は、故人様を海へお還しして終わる供養ではありません。</p>
				<p>散骨した海が、これからも手を合わせる場所として残り続けます。</p>
				<p>お墓とは違う形でも、故人様を大切に想える供養として選ばれています。</p>
			</div>
		</div>

		<?php
		$features = array(
			array(
				'title' => '自然の中へ送り出せる供養',
				'texts' => array(
					'海洋散骨は、従来のお墓の形にとらわれず、自然の中へ故人様を送り出せる供養です。',
					'「自然へ還してあげたい」というご家族の想いを大切にしながら、海や空、風に包まれた場所で故人様を見送ることができます。',
				),
				'image' => 'beginner/feature-01.png',
				'alt'   => '海へ花びらを手向ける手元',
			),
			array(
				'title' => '散骨した海が供養の場所に',
				'texts' => array(
					'海洋散骨では、散骨した海そのものが、故人様を想う場所になります。',
					'お墓がなくても、海を見るたびに故人様を思い出せる、ご家族にとって大切な記憶として残り続けます。',
				),
				'image' => 'beginner/feature-02.jpeg',
				'alt'   => '石垣島の青い海と空',
			),
			array(
				'title' => '無理なく選べるお見送り',
				'texts' => array(
					'散骨の際、海洋散骨は、故人様らしい見送り方を大切にしながら、ご家族の状況に合わせた供養が可能です。',
					'乗船の有無や日程、ご予算に合わせて、ご家族にとって無理のないお見送りの形を選べます。',
				),
				'image' => 'beginner/feature-03.png',
				'alt'   => '船上から海に向かって手を合わせる人',
			),
		);
		?>

		<div class="l-sec-feature__points" data-feature-sec-points>
			<ol class="l-sec-feature__point-list">
				<?php foreach ( $features as $i => $item ) : ?>
					<?php
					$number       = $i + 1;
					$class_number = sprintf( '%02d', $number );
					?>
					<li class="l-sec-feature__point-item l-sec-feature__point-item--<?php echo esc_attr( $class_number ); ?><?php echo 0 === $i ? ' is-active' : ''; ?>" data-feature-sec-card data-point-index="<?php echo esc_attr( $number ); ?>">
						<article class="l-sec-feature__point-card">
							<div class="l-sec-feature__point-content">
								<p class="l-sec-feature__point-label">
									<span class="l-sec-feature__point-text">Point</span>
									<span class="l-sec-feature__point-number"><?php echo esc_html( $number ); ?></span>
								</p>
								<h3 class="l-sec-feature__point-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<div class="l-sec-feature__point-body">
									<?php foreach ( $item['texts'] as $text ) : ?>
										<p><?php echo esc_html( $text ); ?></p>
									<?php endforeach; ?>
								</div>
							</div>
							<picture class="l-sec-feature__point-image">
								<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="292" height="336" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy">
							</picture>
						</article>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div class="l-sec-feature__scrollbar" aria-hidden="true">
			<span class="l-sec-feature__scrollbar-thumb" data-feature-sec-scrollbar></span>
		</div>

		<img class="l-sec-feature__island" src="<?php echo esc_url( theme_image_url( 'front-page/about/ishigaki.svg' ) ); ?>" width="300" height="375" alt="" loading="lazy" aria-hidden="true">
	</div>
</section>

<?php get_template_part( 'template-parts/sec-values' ); ?>

<?php get_template_part( 'template-parts/sec-plan' ); ?>

<?php
$step_icon  = 'front-page/step/contact.png';
$step_items = array(
	array(
		'number' => '1',
		'title'  => '相談・問い合わせ',
		'image'  => $step_icon,
		'texts'  => array(
			'公式LINE、お電話、またはフォームよりお気軽にご連絡ください。',
			'初めてで不安な点や、ご希望の日程・人数などを船長の浜が直接お伺いし、最適なプランをご提案します。',
		),
	),
	array(
		'number' => '2',
		'title'  => 'お申し込み・粉骨手配',
		'image'  => $step_icon,
		'texts'  => array(
			'お申し込み後、弊社提携の粉骨専門センターより「送骨キット」をお届けします。',
			'ご遺骨を郵送いただき、散骨に適した2mm以下のパウダー状に真心を込めて加工いたします。',
		),
	),
	array(
		'number' => '3',
		'title'  => 'ご遺骨の安置',
		'image'  => $step_icon,
		'texts'  => array(
			'粉骨されたご遺骨は、提携先から直接石垣島の弊社へ届けられます。',
			'実施当日まで、船長の浜が責任を持って大切に安置・保管させていただきます。',
		),
	),
	array(
		'number' => '4',
		'title'  => '実施当日・乗船',
		'image'  => $step_icon,
		'texts'  => array(
			'石垣島の港にて待ち合わせ。船長とご挨拶の後、自社船にて出発します。',
			'ダイビングのプロが、その日の風向きや波を読み、最も穏やかで美しいポイント（竹富島沖など）へご案内します。',
		),
	),
	array(
		'number' => '5',
		'title'  => '海洋散骨セレモニー',
		'image'  => $step_icon,
		'texts'  => array(
			'ポイント到着後、エンジンを停止し、静寂の中でセレモニーを行います。',
			'開式の辞、献酒、そしてご家族の手でゆっくりと海へ。最後に花びらを撒き、故人の旅立ちを全員で見守ります。',
		),
	),
	array(
		'number' => '6',
		'title'  => '帰港・散骨証明書の発行',
		'image'  => $step_icon,
		'texts'  => array(
			'セレモニー終了後、ゆっくりと旋回して別れを告げ、帰港します。',
			'後日、散骨した正確な緯度経度を記載した「海洋散骨証明書」と、当日の記録写真・動画データを送付いたします。',
		),
	),
	array(
		'number' => '7',
		'title'  => 'これからの再会',
		'image'  => $step_icon,
		'texts'  => array(
			'散骨は「お別れ」ではなく、新しい繋がりの始まりです。',
			'数年後、数十年後も「会いにいこう」と、笑顔で石垣島の海を訪れていただけるよう、メモリアルクルーズのご相談も承ります。',
		),
	),
);
?>

<section class="l-sec-step" aria-labelledby="beginner-step-title">
	<picture class="l-sec-step__bg" aria-hidden="true">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="" loading="lazy">
	</picture>

	<div class="l-sec-step__inner u-container">
		<div class="l-sec-step__title c-sec-title c-sec-title--center c-sec-title--white u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Step</p>
			<h2 id="beginner-step-title" class="c-sec-title__main">散骨の流れ</h2>
		</div>

		<ol class="l-sec-step__list">
			<?php foreach ( $step_items as $step_item ) : ?>
				<?php
				$step_number = ! empty( $step_item['number'] ) ? (string) $step_item['number'] : '';
				$step_name   = ! empty( $step_item['title'] ) ? (string) $step_item['title'] : '';
				$step_texts  = ! empty( $step_item['texts'] ) && is_array( $step_item['texts'] ) ? $step_item['texts'] : array();
				$step_image  = ! empty( $step_item['image'] ) ? (string) $step_item['image'] : '';
				?>
				<?php if ( '' !== $step_number && '' !== $step_name ) : ?>
					<li class="l-sec-step__item u-fade-up">
						<article class="l-sec-step__card">
							<p class="l-sec-step__label">
								<span class="l-sec-step__label-text">Step</span>
								<span class="l-sec-step__number"><?php echo esc_html( $step_number ); ?></span>
							</p>

							<?php if ( '' !== $step_image ) : ?>
								<div class="l-sec-step__image" aria-hidden="true">
									<img src="<?php echo esc_url( theme_image_url( $step_image ) ); ?>" width="128" height="128" alt="" loading="lazy">
								</div>
							<?php endif; ?>

							<div class="l-sec-step__content">
								<h3 class="l-sec-step__card-title"><?php echo esc_html( $step_name ); ?></h3>
								<?php if ( ! empty( $step_texts ) ) : ?>
									<div class="l-sec-step__body">
										<?php foreach ( $step_texts as $step_text ) : ?>
											<p><?php echo esc_html( (string) $step_text ); ?></p>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</article>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<?php get_template_part( 'template-parts/sec-faq' ); ?>

<?php
get_footer();
?>
