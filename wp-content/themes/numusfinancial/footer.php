		</main><!-- main end -->
        <footer id="footer">
			<div class="container">
				<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img-logo.png" alt="<?php _e('NumusFinancial', 'numusfinancial'); ?>"></a></div>
				<span class="copy">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php the_field('site_name', 'option'); ?></a> <?php the_field('all_rights_reserved', 'option'); ?></span>
			</div>
		</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>