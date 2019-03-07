<?php get_header(); ?>

<?php $image = get_field('image'); ?>
<?php if( !empty($image) ): ?>
<div class="top-banner stripped-bg" style="background-image:url(<?php echo $image['url']; ?>);"></div>
<?php endif; ?>

<section class="connect-section">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_title( '<div class="title"><h1>', '</h1></div>' ); ?>
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'base' ) ); ?>
		<?php endwhile; ?>
		<?php wp_link_pages(); ?>
		<?php comments_template(); ?>
	</div>
</section>

<?php $services = get_field('services');
	if($services): ?>
<section id="our-services" class="blue-section">
	<div class="container">
	<?php foreach( $services as $sv ): ?>
		<?php $img = $sv['image']; ?>
		<div class="block-service">
			<div class="photo"><img src="<?php echo $img['url']; ?>" alt="<?php echo $sv['service_title']; ?>" /></div>
			<article>
				<h2><?php echo $sv['service_title']; ?></h2>
				<?php echo $sv['service_content']; ?>
			</article>
		</div>
	<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>