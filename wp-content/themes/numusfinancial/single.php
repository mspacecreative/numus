<?php get_header(); ?>

<?php $image = get_field('image'); ?>
<?php if( !empty($image) ): ?>
<div class="top-banner stripped-bg" style="background-image:url(<?php echo $image['url']; ?>);"></div>
<?php endif; ?>

<section class="connect-section">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'blocks/content', get_post_type() ); ?>
			<?php comments_template(); ?>
			<?php get_template_part( 'blocks/pager-single', get_post_type() ); ?>
		<?php endwhile; ?>
	</div>
</section>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>