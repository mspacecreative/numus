<?php
/*
Template Name: Contact Template
*/
get_header(); ?>
<?php $image = get_field('image'); ?>
<?php if( !empty($image) ): ?>
<div class="top-banner stripped-bg" style="background-image:url(<?php echo $image['url']; ?>);"></div>
<?php endif; ?>

<section class="contact-section">
	<div class="container">
		<!--<?php $location = get_field('google_map');
			if( !empty($location) ):
		?>
		<div class="img-box">
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
		</div>
		<?php endif; ?>-->
		<div class="img-box">
		<div class="acf-map">
		<?php the_field('google_map_embed'); ?>
		</div>
		</div>
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