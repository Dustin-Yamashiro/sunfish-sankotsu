<?php
get_header();
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article <?php post_class( 'p-single u-container' ); ?>>
			<h1 class="c-title"><?php echo esc_html( get_the_title() ); ?></h1>
			<div class="p-single__body">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
