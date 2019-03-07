<?php get_header(); ?>

<?php $terms = get_the_terms( get_the_ID(), 'category'); ?>
<?php if( !empty($terms) ) {
	$term = array_pop($terms);
	$custom_field = get_field('image', $term ); ?>
	<div class="top-banner stripped-bg" style="background-image:url(<?php echo $custom_field['url']; ?>"></div>
<?php } ?>

<section class="connect-section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="title">
				<?php the_archive_title( '<h1>', '</h1>' ); ?>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'blocks/content', get_post_type() ); ?>
			<?php endwhile; ?>
			<?php get_template_part( 'blocks/pager' ); ?>
		<?php else : ?>
			<?php get_template_part( 'blocks/not_found' ); ?>
		<?php endif; ?>
	</div>
</section>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>