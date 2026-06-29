<?php
/**
 * Template Name: 代理散骨プラン
 *
 * 代理散骨プラン固定ページテンプレート。
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
		'id'    => 'dairi-page-title',
		'title' => '代理散骨プラン',
	)
);
?>

<section class="p-sec-split u-pd-pt-3" aria-labelledby="dairi-about-title">
	<div class="p-sec-split__inner u-container">
		<div class="p-sec-split__content">
			<div class="p-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">About</p>
				<h2 id="dairi-about-title" class="c-sec-title__main">想いを託す、<br>委託型の散骨プラン</h2>
			</div>
			<div class="p-sec-split__body">
				<p>代理散骨プランは、ご遺族の方に代わり、船長が故人様を海へお見送りするプランです。</p>
				<p>遠方にお住まいの方や、ご事情により乗船が難しい場合でも、石垣島の海での散骨が可能です。</p>
				<p>故人様への想いとご家族の気持ちに寄り添い、ご不安な点を事前に確認しながら、責任を持ってお見送りいたします。</p>
			</div>
		</div>

		<div class="p-sec-split__visual">
			<picture class="p-sec-split__image p-sec-split__image--01">
					<img src="<?php echo esc_url( theme_image_url( 'visuals/split/dairi/01.png' ) ); ?>" width="1536" height="1024" alt="白い手袋で花を石垣島の海へ手向ける様子" loading="lazy">
			</picture>
			<picture class="p-sec-split__image p-sec-split__image--02">
					<img src="<?php echo esc_url( theme_image_url( 'visuals/split/dairi/02.png' ) ); ?>" width="1672" height="941" alt="石垣島の港から船を出す船長の後ろ姿" loading="lazy">
			</picture>
		</div>
	</div>
</section>

<?php
$reason_items = array(
	array(
		'image' => 'illustrations/appeal/dairi/reason1.png',
		'alt'   => '家族で写真を見ながら海洋散骨について相談する様子',
		'text'  => '供養の費用を<br>出来る限り抑えたい',
	),
	array(
		'image' => 'illustrations/appeal/dairi/reason2.png',
		'alt'   => '家族で海を見ながら故人を見送る様子',
		'text'  => '遠方に住んでいるが<br>海洋散骨がしたい',
	),
	array(
		'image' => 'illustrations/appeal/dairi/reason3.png',
		'alt'   => '石垣島の海に浮かぶ散骨用の船',
		'text'  => '故人様を家族だけで<br>供養したい',
	),
);
?>

<section class="p-sec-reason u-pd-pt-5 u-pd-pb-7" aria-labelledby="dairi-reason-title">
	<div class="p-sec-reason__inner u-container">
		<h2 id="dairi-reason-title" class="p-sec-reason__title u-fade-up">このような「想い」の方に<br>選ばれています</h2>

		<div class="p-sec-reason__list">
			<?php foreach ( $reason_items as $item ) : ?>
				<?php
				$image = ! empty( $item['image'] ) ? (string) $item['image'] : '';
				$alt   = ! empty( $item['alt'] ) ? (string) $item['alt'] : '';
				$text  = ! empty( $item['text'] ) ? (string) $item['text'] : '';
				?>
				<article class="p-sec-reason__item">
					<?php if ( '' !== $image ) : ?>
						<picture class="p-sec-reason__image">
							<img src="<?php echo esc_url( theme_image_url( $image ) ); ?>" width="1254" height="1254" alt="<?php echo esc_attr( $alt ); ?>" loading="lazy">
						</picture>
					<?php endif; ?>

					<?php if ( '' !== $text ) : ?>
						<p class="p-sec-reason__text"><?php echo wp_kses( $text, array( 'br' => array() ) ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="p-sec-feature p-sec-feature--compact js-feature-sec" aria-labelledby="dairi-feature-title" data-feature-sec>
	<div class="p-sec-feature__inner u-container">
		<div class="p-sec-feature__message">
			<div class="p-sec-feature__title c-sec-title u-fade-up c-sec-title--white">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Feature</p>
				<h2 id="dairi-feature-title" class="c-sec-title__main">代理散骨プランの魅力</h2>
			</div>
			<div class="p-sec-feature__body">
				<p>代理散骨は、直接の散骨が難しいご家族の方でも、大切な方を海へ送り出せる供養です。</p>
				<p>石垣島海洋散骨センターでは、代理での散骨でもご不安な点がないよう、丁寧な対応を心がけ、大切な方の供養をサポートします。</p>
			</div>
			<div class="p-sec-feature__button c-sec-btn c-sec-btn--next c-sec-btn--white">
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
			</div>
		</div>

		<?php
		$features = array(
			array(
				'title'  => '行けなくても託せるお見送り',
				'texts'  => array(
					'代理散骨なら、遠方にお住まいの方や船が苦手な方でも、石垣島の海で散骨が可能です。',
					'船長自らご家族の想いを受け取り、責任を持って故人様をお見送りします。',
				),
				'image'  => 'visuals/feature/dairi/01.png',
				'alt'    => '船上で花束を手に海を見つめる船長',
			),
			array(
				'title'  => 'ご家族の負担を抑える供養',
				'texts'  => array(
					'代理散骨は、通常の葬儀や貸切散骨に比べて、費用の負担を抑えながら選べる供養です。',
					'移動や宿泊、日程調整の負担も抑え、ご家族に無理のない形で故人様をお見送りできます。',
					),
					'image'  => 'visuals/feature/dairi/02.png',
					'alt'    => '石垣島の青い海に白い花びらが浮かぶ様子',
				),
			array(
				'title'  => '見えない不安を残さない散骨',
				'texts'  => array(
					'代理散骨では、託した供養が見えないまま終わらないよう、当日の様子を記録に残します。',
					'散骨後のメモリアルクルーズにも対応し、散骨後も石垣島の海を故人様に会いに行ける場所として残し続けます。',
				),
				'image'  => 'visuals/feature/dairi/03.png',
				'alt'    => '船上で散骨後の写真記録を見返す様子',
			),
		);
		?>


		<div class="p-sec-feature__points" data-feature-sec-points>
			<ol class="p-sec-feature__point-list">
				<?php foreach ( $features as $i => $item ) : ?>
					<?php
					$number       = $i + 1;
					$class_number = sprintf( '%02d', $number );
					?>
					<li class="p-sec-feature__point-item p-sec-feature__point-item--<?php echo esc_attr( $class_number ); ?><?php echo 0 === $i ? ' is-active' : ''; ?>" data-feature-sec-card data-point-index="<?php echo esc_attr( $number ); ?>">
						<article class="p-sec-feature__point-card">
							<div class="p-sec-feature__point-content">
								<p class="p-sec-feature__point-label">
									<span class="p-sec-feature__point-text">Point</span>
									<span class="p-sec-feature__point-number"><?php echo esc_html( $number ); ?></span>
								</p>
								<h3 class="p-sec-feature__point-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<div class="p-sec-feature__point-body">
									<?php foreach ( $item['texts'] as $text ) : ?>
										<p><?php echo esc_html( $text ); ?></p>
									<?php endforeach; ?>
								</div>
							</div>
							<picture class="p-sec-feature__point-image">
								<img src="<?php echo esc_url( theme_image_url( $item['image'] ) ); ?>" width="292" height="336" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy">
							</picture>
						</article>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div class="p-sec-feature__scrollbar" aria-hidden="true">
			<span class="p-sec-feature__scrollbar-thumb" data-feature-sec-scrollbar></span>
		</div>

		<img class="p-sec-feature__island" src="<?php echo esc_url( theme_image_url( 'common/icon/ishigaki.svg' ) ); ?>" width="300" height="375" alt="" loading="lazy" aria-hidden="true">
	</div>
</section>

<?php get_template_part( 'template-parts/sec-values' ); ?>

<section class="p-sec-plan-detail u-pd-pt-5 u-pd-pb-6" aria-labelledby="dairi-plan-detail-title">
	<div class="p-sec-plan-detail__inner u-container">
		<div class="p-sec-plan-detail__title c-sec-title c-sec-title--center">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Plan Details</p>
			<h2 id="dairi-plan-detail-title" class="c-sec-title__main">プラン詳細</h2>
		</div>

		<dl class="p-sec-plan-detail__table">
			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">料金</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">55,000円 〜</p>
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--note">※粉骨加工費用が別途33,000円〜かかります。</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">散骨エリア</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">石垣島近海</p>
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--note">※遺骨受領後、最適な海域へ出航します。</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">出航日</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">相談の上決定</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">支払い方法</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">事前決済：銀行振込 / クレジットカード</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">天候不良時の対応</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text"><strong>【弊社判断による中止の場合：キャンセル料無料】</strong></p>
					<p class="p-sec-plan-detail__text">前日18:00までに海況を判断しご連絡します。滞在中の別日程への振替、または代理散骨への切り替え（差額返金）、全額返金のいずれかを選択いただけます。</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">キャンセル対応</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text">詳しくは<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>">ご利用規約ページ</a>をご確認ください。</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">準備するもの</dt>
				<dd class="p-sec-plan-detail__value">
					<div class="p-sec-plan-detail__item-list">
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">①埋火葬許可証のコピー（または改葬許可証）</p>
							<p class="p-sec-plan-detail__item-text">故人様が正しく火葬・埋葬されていることを証明する書類です。</p>
						</div>
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">② お申込者様の身分証明書のコピー</p>
							<p class="p-sec-plan-detail__item-text">ご遺骨の所有権者であることを確認するため、運転免許証等のコピーをいただきます。</p>
						</div>
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">③ 海洋散骨同意書</p>
							<p class="p-sec-plan-detail__item-text">弊社よりお送りする書類に、署名・捺印をいただきます。</p>
						</div>
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">④ ご遺骨（粉骨済み）</p>
							<p class="p-sec-plan-detail__item-text">弊社提携の専門センターにて粉骨を行う場合は、お申し込み後に送付する「送骨キット」をご利用ください。</p>
						</div>
					</div>
				</dd>
			</div>
		</dl>

		<?php get_template_part( 'template-parts/sec-plan-options' ); ?>
	</div>
</section>

<?php
get_template_part(
	'template-parts/sec-plan-step',
	null,
	array(
		'plan' => 'dairi',
	)
);
?>

<?php
get_template_part(
	'template-parts/sec-faq',
	null,
	array(
		'category' => 'dairi',
	)
);
?>

<?php
get_footer();
?>
