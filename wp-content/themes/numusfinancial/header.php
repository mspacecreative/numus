<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="<?php bloginfo( 'charset' ); ?>">		
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
		<script type="text/javascript">
			var pathInfo = {
				base: '<?php echo get_template_directory_uri(); ?>/',
				css: 'css/',
				js: 'js/',
				swf: 'swf/',
			}
		</script>
		<?php wp_head(); ?>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-106418883-1', 'auto');
  ga('send', 'pageview');

</script>
		<?php
			if( is_front_page() != 'home_url()'){
				function my_plugin_body_class($classes) {
					$classes[] = 'inner-page';
					return $classes;
				}

				add_filter('body_class', 'my_plugin_body_class');
			}
		?>
	</head>
	<body <?php body_class(); ?> >
		<div id="wrapper">
			<header id="header">
				<div class="container">
					<div class="logo">
						<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img-logo.png" alt="<?php _e('NumusFinancial', 'numusfinancial'); ?>"></a>
					</div>
					<nav id="nav">
						<a class="icon-search" href="#"></a>
						<a class="nav-opener icon-navicon" href="#">
							<span><?php _e('Open', 'numusfinancial'); ?></span>
						</a>
						<form class="form-search">
							<input type="search" placeholder="search...">
						</form>
						<div class="nav-drop">
							<?php if( has_nav_menu( 'primary' ) )
							wp_nav_menu( array(
								'container' => false,
								'theme_location' => 'primary',
								'menu_id'        => 'navigation',
								'menu_class'     => 'navigation',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'walker'         => new Custom_Walker_Nav_Menu
								)
							); ?>
						</div>
					</nav>
				</div>
			</header>
			<main id="main">
			