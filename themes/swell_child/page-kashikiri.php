<?php
/**
 * Template Name: 貸切散骨プラン
 *
 * 貸切散骨プラン固定ページテンプレート。
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
		'id'    => 'kashikiri-page-title',
		'title' => '貸切散骨プラン',
	)
);
?>

<section class="p-sec-split u-pd-pt-3" aria-labelledby="kashikiri-about-title">
	<div class="p-sec-split__inner u-container">
		<div class="p-sec-split__content">
			<div class="p-sec-split__title c-sec-title u-fade-up">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">About</p>
				<h2 id="kashikiri-about-title" class="c-sec-title__main">家族で見送る、<br>完全貸切の散骨プラン</h2>
			</div>
			<div class="p-sec-split__body">
				<p>貸切散骨プランは、貸切の船にご家族やご親族で乗船し、故人様を海へお見送りするプランです。<br>他のご家族と同乗しないため、周囲を気にせず、故人様との時間を大切にしながらゆっくりと故人様との時間を過ごせます。</p>
				<p>石垣島海洋散骨センターの貸切散骨プランは、自社で船を保有しているため、完全貸切でのご案内が可能です。<br>ご相談から粉骨手配、操船、セレモニー進行まで船長が一貫して担当し、石垣島での散骨を一つずつお手伝いします。</p>
			</div>
		</div>

		<div class="p-sec-split__visual">
			<picture class="p-sec-split__image p-sec-split__image--01">
				<img src="<?php echo esc_url( theme_image_url( 'kashikiri-plan/about-sub.png' ) ); ?>" width="1536" height="1024" alt="船上で石垣島の海に花を手向け、手を合わせるご家族" loading="lazy">
			</picture>
			<picture class="p-sec-split__image p-sec-split__image--02">
				<img src="<?php echo esc_url( theme_image_url( 'kashikiri-plan/about-main.png' ) ); ?>" width="1619" height="972" alt="貸切船の上から石垣島の海を眺めるご家族" loading="lazy">
			</picture>
		</div>
	</div>
</section>

<?php
$reason_items = array(
	array(
		'image' => 'kashikiri-plan/reason-01.png',
		'alt'   => '家族で写真を見ながら海洋散骨について相談する様子',
		'text'  => '故人との最後の時間を<br>完全貸切で過ごしたい',
	),
	array(
		'image' => 'kashikiri-plan/reason-02.png',
		'alt'   => '家族で海を見ながら故人を見送る様子',
		'text'  => '家族や親族みんなで<br>供養がしたい',
	),
	array(
		'image' => 'kashikiri-plan/reason-03.png',
		'alt'   => '石垣島の海に浮かぶ散骨用の船',
		'text'  => '散骨が思い出に残る<br>日にしたい',
	),
);
?>

<section class="p-sec-reason u-pd-pt-5 u-pd-pb-6" aria-labelledby="kashikiri-reason-title">
	<div class="p-sec-reason__inner u-container">
		<h2 id="kashikiri-reason-title" class="p-sec-reason__title u-fade-up">このような「想い」の方に<br>選ばれています</h2>

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

<section class="p-sec-feature p-sec-feature--compact js-feature-sec" aria-labelledby="kashikiri-feature-title" data-feature-sec>
	<div class="p-sec-feature__inner u-container">
		<div class="p-sec-feature__message">
			<div class="p-sec-feature__title c-sec-title u-fade-up c-sec-title--white">
				<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Feature</p>
				<h2 id="kashikiri-feature-title" class="c-sec-title__main">貸切散骨プランの魅力</h2>
			</div>
			<div class="p-sec-feature__body">
				<p>貸切散骨は、ご家族やご親族だけで大切な方を海へ送り出せる供養です。</p>
				<p>石垣島海洋散骨センターでは、自社船でのご案内と船長による一貫対応で、大切な方への想いを形にするお見送りをお手伝いします。</p>
			</div>
			<div class="p-sec-feature__button c-sec-btn c-sec-btn--next c-sec-btn--white">
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
			</div>
		</div>

		<?php
		$features = array(
			array(
				'title'  => '完全貸切のプライベート空間',
				'texts'  => array(
					'自社船での完全貸切だからこそ、ご家族やご親族だけで故人様をお見送りいただけます。',
					'周囲に気を遣う必要のないプライベートな空間で、ゆっくりと故人様との時間を過ごすことができます。',
				),
				'image'  => 'kashikiri-plan/feature-01-card.jpg',
				'alt'    => '石垣島の海に浮かぶ貸切散骨用の自社船',
			),
			array(
				'title'  => '自分たちで送り出す供養',
				'texts'  => array(
					'貸切散骨では、ご遺族様自身の手で故人様を海へお送りできます。',
					'通常の葬儀とは違い、海の景色や波の音とともに故人様を見送った時間が、散骨後もご家族の記憶に残り続けます。',
				),
				'image'  => 'kashikiri-plan/feature-02-card.png',
				'alt'    => 'ご遺族が船上から石垣島の海へ散骨する様子',
			),
			array(
				'title'  => '故人らしさを込める見送り',
				'texts'  => array(
					'貸切散骨では、故人様のお人柄やご家族の望みに合わせて、供養のかたちを考えることができます。',
					'船長自ら想いを伺い、故人様らしさを大切にしたセレモニーになるようサポートします。',
				),
				'image'  => 'kashikiri-plan/feature-03-card.png',
				'alt'    => '海を眺めながら船上で手を重ねるご家族',
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

		<img class="p-sec-feature__island" src="<?php echo esc_url( theme_image_url( 'front-page/about/ishigaki.svg' ) ); ?>" width="300" height="375" alt="" loading="lazy" aria-hidden="true">
	</div>
</section>

<?php get_template_part( 'template-parts/sec-values' ); ?>

<section class="p-sec-plan-detail u-pd-pt-5 u-pd-pb-6" aria-labelledby="kashikiri-plan-detail-title">
	<div class="p-sec-plan-detail__inner u-container">
		<div class="p-sec-plan-detail__title c-sec-title c-sec-title--center">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Plan Details</p>
			<h2 id="kashikiri-plan-detail-title" class="c-sec-title__main">プラン詳細</h2>
		</div>

		<dl class="p-sec-plan-detail__table">
			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">料金</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">132,000円 〜</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">乗船定員</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">最大10名様まで</p>
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--note">※ご家族だけでゆったりとお過ごしいただけるよう、少人数制を基本としています。10名以上の場合は別途ご相談ください</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">乗船場所</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">石垣港 浜崎マリーナ（または石垣漁港）</p>
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--note">※市街地のホテルから車で約5～10分。送迎については事前相談にて承ります。</p>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">所要時間</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--lead">約60分～90分（港からの往復移動を含む）</p>
					<p class="p-sec-plan-detail__text p-sec-plan-detail__text--note">※セレモニー自体は約20～30分、移動時間は片道約15～20分程度です</p>
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
					<p class="p-sec-plan-detail__text">詳しくは<a href="<?php echo esc_url( home_url( '/policy/' ) ); ?>">キャンセルポリシーページ</a>を閲覧ください</p>
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

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">当日の服装</dt>
				<dd class="p-sec-plan-detail__value">
					<p class="p-sec-plan-detail__text">船上での安全と、一般の観光客への配慮から、以下のようにお願いしております。</p>
					<div class="p-sec-plan-detail__item-list">
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">・平服（カジュアルな服装）でお越しください</p>
							<p class="p-sec-plan-detail__item-text">喪服でのご乗船は、港を利用する他のお客様への配慮や、船上での安全面（動きやすさ）からご遠慮いただいております。かりゆしウェア、ポロシャツ、チノパンなど、リラックスした動きやすい服装を推奨します。</p>
						</div>
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">・足元は平らな靴</p>
							<p class="p-sec-plan-detail__item-text">船内は滑りやすい箇所があるため、ヒールのないパンプスやスニーカー、デッキシューズ、サンダルなどでお越しください。</p>
						</div>
					</div>
				</dd>
			</div>

			<div class="p-sec-plan-detail__row">
				<dt class="p-sec-plan-detail__label">推奨する持ち物</dt>
				<dd class="p-sec-plan-detail__value">
					<div class="p-sec-plan-detail__item-list">
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">・故人様の好きだった飲み物・食べ物（少量）</p>
							<p class="p-sec-plan-detail__item-text">お酒以外にも、お好きだった銘柄の飲料などがあればお持ち込みいただけます。</p>
						</div>
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">・酔い止め薬</p>
							<p class="p-sec-plan-detail__item-text">船酔いが心配な方は、乗船の30分〜1時間前の服用をおすすめします。</p>
						</div>
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">・サングラス・帽子</p>
							<p class="p-sec-plan-detail__item-text">石垣島の強い日差しを遮るために重宝します。</p>
						</div>
						<div class="p-sec-plan-detail__item">
							<p class="p-sec-plan-detail__item-title">・タオル・ハンカチ</p>
							<p class="p-sec-plan-detail__item-text">お別れの儀式の際や、万が一波しぶきがかかった際のために。</p>
						</div>
					</div>
				</dd>
			</div>
		</dl>

		<div class="p-sec-plan-detail__included">
			<h3 class="p-sec-plan-detail__section-heading">［ プランに含まれるもの ］</h3>

			<ul class="p-sec-plan-detail__included-list">
				<li class="p-sec-plan-detail__included-item">
					<article class="p-sec-plan-detail__included-card">
						<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<h4 class="p-sec-plan-detail__card-title">献花用の花びら</h4>
						<div class="p-sec-plan-detail__card-body">
							<p>石垣島の自然に配慮し、環境負荷の少ない季節の色鮮やかな生花（花びらのみ）をご用意します。</p>
							<p>海一面に広がる花びらが、故人様の旅立ちを美しく彩ります。</p>
						</div>
					</article>
				</li>

				<li class="p-sec-plan-detail__included-item">
					<article class="p-sec-plan-detail__included-card">
						<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<h4 class="p-sec-plan-detail__card-title">献酒（地酒・日本酒）</h4>
						<div class="p-sec-plan-detail__card-body">
							<p>故人様を偲び、海を清めるための献酒をご用意します。</p>
							<p>石垣島の地酒（泡盛）または日本酒を使用し、古来からの儀礼を大切に守ります。</p>
						</div>
					</article>
				</li>

				<li class="p-sec-plan-detail__included-item">
					<article class="p-sec-plan-detail__included-card">
						<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<h4 class="p-sec-plan-detail__card-title">環境対応・散骨用資材</h4>
						<div class="p-sec-plan-detail__card-body">
							<p>遺骨を納める袋は、海中で速やかに溶ける特殊な水溶性紙を使用。</p>
							<p>環境保護のガイドラインを遵守した、海に優しいお見送りをお約束します。</p>
						</div>
					</article>
				</li>

				<li class="p-sec-plan-detail__included-item">
					<article class="p-sec-plan-detail__included-card">
						<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<h4 class="p-sec-plan-detail__card-title">写真・動画撮影データ</h4>
						<div class="p-sec-plan-detail__card-body">
							<p>現役ダイバーの撮影技術を活かし、セレモニーの様子を記録します。</p>
							<p>青い海、献花の瞬間など、一生の記憶に残るシーンをデータ形式で無料提供いたします。</p>
						</div>
					</article>
				</li>

				<li class="p-sec-plan-detail__included-item">
					<article class="p-sec-plan-detail__included-card">
						<div class="p-sec-plan-detail__included-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<h4 class="p-sec-plan-detail__card-title">海洋散骨証明書</h4>
						<div class="p-sec-plan-detail__card-body">
							<p>散骨を実施した正確な日時と、GPSによる緯度経度を記載したオリジナルの証明書を発行します。</p>
							<p>後日、ご自宅へ大切に郵送いたします。</p>
						</div>
					</article>
				</li>
			</ul>
		</div>

		<div class="p-sec-plan-detail__options">
			<h3 class="p-sec-plan-detail__section-heading">［ 追加オプション ］</h3>

			<ul class="p-sec-plan-detail__option-list">
				<li class="p-sec-plan-detail__option-item">
					<article class="p-sec-plan-detail__option-card">
						<div class="p-sec-plan-detail__option-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<div class="p-sec-plan-detail__option-content">
							<h4 class="p-sec-plan-detail__option-title">安心粉骨・洗浄パック</h4>
							<p class="p-sec-plan-detail__option-text">提携専門業者による粉骨・六価クロム除去・洗浄。散骨に必須な工程をワンストップで代理。</p>
							<p class="p-sec-plan-detail__option-price">税込 33,000円〜</p>
						</div>
					</article>
				</li>

				<li class="p-sec-plan-detail__option-item">
					<article class="p-sec-plan-detail__option-card">
						<div class="p-sec-plan-detail__option-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<div class="p-sec-plan-detail__option-content">
							<h4 class="p-sec-plan-detail__option-title">献花用・特別フラワー</h4>
							<p class="p-sec-plan-detail__option-text">故人様の好きだった花や色に合わせた花材をご用意。故人様に合った形で還すことができます。</p>
							<p class="p-sec-plan-detail__option-price">税込 11,000円〜</p>
						</div>
					</article>
				</li>

				<li class="p-sec-plan-detail__option-item">
					<article class="p-sec-plan-detail__option-card">
						<div class="p-sec-plan-detail__option-icon" aria-hidden="true">
							<img src="<?php echo esc_url( theme_image_url( 'front-page/step/contact.png' ) ); ?>" width="128" height="128" alt="" loading="lazy">
						</div>
						<div class="p-sec-plan-detail__option-content">
							<h4 class="p-sec-plan-detail__option-title">メモリアル・クルーズ</h4>
							<p class="p-sec-plan-detail__option-text">一周忌や三回忌に合わせたクルーズが可能。GPSで記録した散骨ポイントへ再びご案内します。</p>
							<p class="p-sec-plan-detail__option-price">税込 55,000円〜</p>
						</div>
					</article>
				</li>
			</ul>
		</div>
	</div>
</section>

<?php
$kashikiri_step_icon  = 'front-page/step/contact.png';
$kashikiri_step_items = array(
	array(
		'number' => '1',
		'title'  => '相談・問い合わせ',
		'image'  => $kashikiri_step_icon,
		'texts'  => array(
			'公式LINE、お電話、またはフォームよりお気軽にご連絡ください。',
			'初めてで不安な点や、ご希望の日程・人数などを船長の浜が直接お伺いし、最適なプランをご提案します。',
		),
	),
	array(
		'number' => '2',
		'title'  => 'お申し込み・粉骨手配',
		'image'  => $kashikiri_step_icon,
		'texts'  => array(
			'お申し込み後、弊社提携の粉骨専門センターより「送骨キット」をお届けします。',
			'ご遺骨を郵送いただき、散骨に適した2mm以下のパウダー状に真心を込めて加工いたします。',
		),
	),
	array(
		'number' => '3',
		'title'  => 'ご遺骨の安置',
		'image'  => $kashikiri_step_icon,
		'texts'  => array(
			'粉骨されたご遺骨は、提携先から直接石垣島の弊社へ届けられます。',
			'実施当日まで、船長の浜が責任を持って大切に安置・保管させていただきます。',
		),
	),
	array(
		'number' => '4',
		'title'  => '実施当日・乗船',
		'image'  => $kashikiri_step_icon,
		'texts'  => array(
			'石垣島の港にて待ち合わせ。船長とご挨拶の後、自社船にて出発します。',
			'ダイビングのプロが、その日の風向きや波を読み、最も穏やかで美しいポイント（竹富島沖など）へご案内します。',
		),
	),
	array(
		'number' => '5',
		'title'  => '海洋散骨セレモニー',
		'image'  => $kashikiri_step_icon,
		'texts'  => array(
			'ポイント到着後、エンジンを停止し、静寂の中でセレモニーを行います。',
			'開式の辞、献酒、そしてご家族の手でゆっくりと海へ。最後に花びらを撒き、故人の旅立ちを全員で見守ります。',
		),
	),
	array(
		'number' => '6',
		'title'  => '帰港・散骨証明書の発行',
		'image'  => $kashikiri_step_icon,
		'texts'  => array(
			'セレモニー終了後、ゆっくりと旋回して別れを告げ、帰港します。',
			'後日、散骨した正確な緯度経度を記載した「海洋散骨証明書」と、当日の記録写真・動画データを送付いたします。',
		),
	),
	array(
		'number' => '7',
		'title'  => 'これからの再会',
		'image'  => $kashikiri_step_icon,
		'texts'  => array(
			'散骨は「お別れ」ではなく、新しい繋がりの始まりです。',
			'数年後、数十年後も「会いにいこう」と、笑顔で石垣島の海を訪れていただけるよう、メモリアルクルーズのご相談も承ります。',
		),
	),
);
?>

<section class="p-sec-step u-pd-pt-5 u-pd-pb-6" aria-labelledby="kashikiri-step-title">
	<picture class="p-sec-step__bg" aria-hidden="true">
		<source media="(max-width: 740px)" srcset="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers-sp.png' ) ); ?>">
		<img src="<?php echo esc_url( theme_image_url( 'front-page/key-visual-sea-flowers.png' ) ); ?>" width="2688" height="1408" alt="" loading="lazy">
	</picture>

	<div class="p-sec-step__inner u-container">
		<div class="p-sec-step__title c-sec-title c-sec-title--center c-sec-title--white u-fade-up">
			<p class="c-sec-title__sub u-text-fade u-text-fade--chars">Step</p>
			<h2 id="kashikiri-step-title" class="c-sec-title__main">散骨の流れ</h2>
		</div>

		<ol class="p-sec-step__list">
			<?php foreach ( $kashikiri_step_items as $kashikiri_step_item ) : ?>
				<?php
				$kashikiri_step_number = ! empty( $kashikiri_step_item['number'] ) ? (string) $kashikiri_step_item['number'] : '';
				$kashikiri_step_name   = ! empty( $kashikiri_step_item['title'] ) ? (string) $kashikiri_step_item['title'] : '';
				$kashikiri_step_texts  = ! empty( $kashikiri_step_item['texts'] ) && is_array( $kashikiri_step_item['texts'] ) ? $kashikiri_step_item['texts'] : array();
				$kashikiri_step_image  = ! empty( $kashikiri_step_item['image'] ) ? (string) $kashikiri_step_item['image'] : '';
				?>
				<?php if ( '' !== $kashikiri_step_number && '' !== $kashikiri_step_name ) : ?>
					<li class="p-sec-step__item u-fade-up">
						<article class="p-sec-step__card">
							<p class="p-sec-step__label">
								<span class="p-sec-step__label-text">Step</span>
								<span class="p-sec-step__number"><?php echo esc_html( $kashikiri_step_number ); ?></span>
							</p>

							<?php if ( '' !== $kashikiri_step_image ) : ?>
								<div class="p-sec-step__image" aria-hidden="true">
									<img src="<?php echo esc_url( theme_image_url( $kashikiri_step_image ) ); ?>" width="128" height="128" alt="" loading="lazy">
								</div>
							<?php endif; ?>

							<div class="p-sec-step__content">
								<h3 class="p-sec-step__card-title"><?php echo esc_html( $kashikiri_step_name ); ?></h3>
								<?php if ( ! empty( $kashikiri_step_texts ) ) : ?>
									<div class="p-sec-step__body">
										<?php foreach ( $kashikiri_step_texts as $kashikiri_step_text ) : ?>
											<p><?php echo esc_html( (string) $kashikiri_step_text ); ?></p>
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

<?php
get_template_part(
	'template-parts/sec-faq',
	null,
	array(
		'category' => 'kashikiri',
	)
);
?>

<?php
get_footer();
?>
