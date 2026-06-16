<?php
get_header();
?>

<section class="p-archive u-container">
	<h1 class="c-title"><?php echo esc_html( get_the_archive_title() ); ?></h1>

	<?php if ( have_posts() ) : ?>
		<div class="p-archive__list">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class( 'p-archive__item' ); ?>>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="p-archive__link">
						<h2 class="p-archive__title"><?php echo esc_html( get_the_title() ); ?></h2>
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
							<?php echo esc_html( get_the_date() ); ?>
						</time>
					</a>
				</article>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</section>

<?php
get_footer();
