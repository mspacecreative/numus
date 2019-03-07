<?php
/*
Template Name: Home Template
*/
get_header(); ?>
<div class="visual-box">
	<div class="slick-slider">
		<?php if( have_rows('slider') ): ?>
			<?php while ( have_rows('slider') ) : the_row(); ?>
				<?php $image = get_sub_field('slider_image'); ?>
				<?php if( !empty($image) ): ?>
				<div class="slide" style="background-image:url(<?php echo $image['url']; ?>);">
					<?php if(get_sub_field('slider_description')): ?>
						<div class="text-box">
							<div class="title-slide"><?php the_sub_field('slider_description'); ?></div>
						</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<div class="about-us">
	<div class="container">
		<?php while ( have_posts( ) ) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</div>

<div class="about-facts">
	<?php $image = get_field('information_image'); ?>
	<?php if( !empty($image) ): ?>
		<div class="stripped-bg" style="background-image:url(<?php echo $image['url']; ?>);"></div>
	<?php endif; ?>
	<div class="container block-up">
		<?php if( have_rows('information_blocks') ): ?>
			<?php while ( have_rows('information_blocks') ) : the_row(); ?>
				<div class="box">
					<div class="box-holder">
						<?php $image = get_sub_field('information_image');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
						<?php if(get_sub_field('information_title')): ?>
							<h2><?php the_sub_field('information_title'); ?></h2>
						<?php endif; ?>
						<?php if(get_sub_field('information_description')): ?>
							<?php the_sub_field('information_description'); ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php $image = get_field('block_content_image'); ?>
<?php if( !empty($image) ): ?>
<section class="our-name stripped-bg" style="background-image:url(<?php echo $image['url']; ?>);">
	<div class="container">
		<?php if(get_field('block_content_title')): ?>
			<h1><?php the_field('block_content_title'); ?></h1>
		<?php endif; ?>
		<?php if(get_field('block_content_description')): ?>
			<?php the_field('block_content_description'); ?>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<section class="connect-section">
	<div class="container">
		<div class="two-col">
			<div class="col">
				<div class="connect-text">
					<?php if(get_field('connect_title')): ?>
						<h1><?php the_field('connect_title'); ?></h1>
					<?php endif; ?>
					<?php if(get_field('connect_description')): ?>
						<?php the_field('connect_description'); ?>
					<?php endif; ?>
				</div><span class="line desktop-visible"></span>
				<address class="address-box">
					<?php if(get_field('title_address')): ?>
						<span class="address-title"><?php the_field('title_address'); ?></span>
					<?php endif; ?>
					<ul class="address-list">
						<li>
							<?php if(get_field('content_address')): ?>
								<div class="item"><span class="icon-map-marker"></span>
									<?php the_field('content_address'); ?>
								</div>
							<?php endif; ?>
						</li>
						<li>
							<div class="item"><span class="icon-phone"></span><a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a></div>
							<div class="item"><span class="icon-mail"></span><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></div>
						</li>
					</ul>
				</address>
			</div>
			<div class="col">
				<?php the_field('contact_form'); ?>
			</div>
		</div>
	</div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>