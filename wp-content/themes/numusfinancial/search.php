<?php get_header(); ?>

<div class="top-banner stripped-bg" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/img-top-banner.jpg);"></div>
<section class="connect-section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="title">
				<h1><?php printf( __( 'Search Results for: %s', 'numusfinancial' ), '<span>' . get_search_query() . '</span>'); ?></h1>
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