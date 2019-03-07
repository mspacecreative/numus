<?php get_header(); ?>

<div class="top-banner stripped-bg" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/img-top-banner.jpg);"></div>

<section class="connect-section">
	<div class="container">
		<?php get_template_part( 'blocks/not_found' ); ?>
	</div>
</section>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>