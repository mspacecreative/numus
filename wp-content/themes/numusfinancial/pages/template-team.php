<?php
/*
Template Name: Our team Template
*/
get_header(); ?>
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
		
		<?php if( have_rows('management') ):
			while ( have_rows('management') ) : the_row(); ?>
			<?php $name = get_sub_field('name');
				$img = get_sub_field('image');
				$phone = get_sub_field('phone');
				$email = get_sub_field('email'); ?>
			<div class="block-management">
				<div class="photo"><img src="<?php echo $img['url']; ?>" alt="<?php echo $name; ?>" /></div>
				<div class="team-content">
					<h3><?php echo $name; ?></h3>
					<cite><?php the_sub_field('title'); ?></cite>
					<?php the_sub_field('bio'); ?>
					<ul class="contact">
						<?php if($phone): ?><li class="phone"><i class="fa fa-phone"></i> <?php echo $phone; ?></li><?php endif; ?>
						<?php if($email): ?><li class="email"><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li><?php endif; ?>
					</ul>
				</div>
			</div>
	    <?php endwhile;
				endif; ?>
					
		<?php wp_link_pages(); ?>
		<?php comments_template(); ?>
	</div>
</section>

<section id="our-team" class="blue-section">
	<div class="container">
	<?php if( have_rows('staff') ):
		while ( have_rows('staff') ) : the_row(); ?>
		<?php $name = get_sub_field('name');
			$email = get_sub_field('email'); ?>
		<div class="block-staff">
			<div class="team-content">
				<h3><?php echo $name; ?></h3>
				<cite><?php the_sub_field('title'); ?></cite>
				<?php the_sub_field('bio'); ?>
				<ul class="contact">
					<?php if($email): ?><li class="email"><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li><?php endif; ?>
				</ul>
			</div>
		</div>
    <?php endwhile;
		endif; ?>
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>