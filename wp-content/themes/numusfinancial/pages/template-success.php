<?php
/*
Template Name: Success stories Template
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
					
		<?php wp_link_pages(); ?>
		<?php comments_template(); ?>
	</div>

	<?php $partner = get_field('partner_logos');
		if($partner): ?>
	<div class="partner-container">
			
		<?php foreach( $partner as $p ): ?>
		<a href="#<?php echo $p['caption']; ?>"><img src="<?php echo $p['url']; ?>" alt="<?php echo $g['alt']; ?>" /></a>
		<?php endforeach; ?>
	
	</div>
	<?php endif; ?>
</section>

<section id="success-stories" class="blue-section">
	<div class="container">
	<?php $query_args = array(
    		'post_type' => 'success_stories',
    		'order' => 'ASC',
    		'posts_per_page' => -1
		);
		$the_query = new WP_Query( $query_args ); ?>
	
	<?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    	<?php $posttags = get_the_tags(); ?>
        <div class="block-success <?php echo $posttags[0]->name; ?>">
	        <div class="topbar">
		        <span><?php the_field('top_line_text'); ?></span>
		        <time><?php the_field('date'); ?></time>
	        </div>
	        <div class="logo-title">
            <?php $logo = get_field('logo');
	              if($logo): ?>
				<img src="<?php echo $logo['sizes']['success-logo']; ?>" alt="<?php echo get_the_title(); ?>" />
			<?php endif; ?>
	        </div>
	        
	        <?php if(has_post_thumbnail()): ?>
	        	<h3><?php the_post_thumbnail('full'); ?></h3>
	        <?php else: ?>
		    	<h3><?php the_title(); ?></h3>
		    <?php endif; ?>
		    
		    <?php if($amount = get_field('amount')): ?>
	        <div class="amount">
		        <h4>C$<?php echo $amount; ?></h4>
	        </div>
		    <?php endif; ?>
		    
	        <?php if($am_block = get_field('amount_block')):
				foreach($am_block as $am): ?>
        	<div class="amount">
		        <h4>C$<?php echo $am['am_number']; ?></h4>
	        </div>
        	<div class="amount-desc"><?php echo $am['am_text']; ?></div>
	        <?php endforeach;
		          endif; ?>
		    
	        <div class="main">
		        <?php if($text = get_field('text_block')):
					foreach($text as $tx): ?>
		        	<p><?php echo $tx['text']; ?></p>
		        <?php endforeach;
			          endif; ?>
	        </div>
	        <div class="bottom">
            <?php $name = get_field('corp_name');
	              $name1 = get_field('corp_name1');
	              $name2 = get_field('corp_name2');
	              $name3 = get_field('corp_name3');
	              $logo1 = get_field('corp_logo');
	              $logo2 = get_field('corp_logo2'); ?>
				
				<div class="row">
					<div class="col"><?php echo $name; ?></div>
				</div>
				
				<?php if($name1): ?>
				<div class="row">
					<div class="col col-2"><?php echo $name1; ?></div>
					<?php if($name2): ?><div class="col col-2"><?php echo $name2; ?></div><?php endif; ?>
				</div>
				<?php endif; ?>
				
				<?php if($name3): ?>
				<div class="row">
					<div class="col"><?php echo $name3; ?></div>
				</div>
				<?php endif; ?>
				
				<?php if($logo1 && !$logo2): ?>
				<div class="row">
					<div class="col <?php if($logo2) echo 'col-2'?>">
						<img src="<?php echo $logo1['url']; ?>" alt="<?php echo $logo1['title']; ?>" />
					</div>
				</div>
				<?php endif; ?>
				
				<?php if($logo1 && $logo2): ?>
				<table>
					<tr>
						<td>
							<img src="<?php echo $logo1['url']; ?>" alt="<?php echo $logo1['title']; ?>" />
						</td>
						<td>
							<img src="<?php echo $logo2['url']; ?>" alt="<?php echo $logo2['title']; ?>" />
						</td>
					</tr>
				</table>
				<?php endif; ?>
					
		    <!--     <span><?php the_field('bottom_line_text'); ?></span> -->
	        </div>
        </div>
	<?php endwhile; ?>
    <?php endif;
    	wp_reset_query();
    ?>
		
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>