<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Umbric
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

  <!-- Start Header Area -->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-xl">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->


					<a class="navbar-brand" href="<?php echo get_site_url( ); ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Umbric"></a> 
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="header-right-content ml-auto"> 
							<?php 										
								wp_nav_menu( array(
									'theme_location'  => 'menu-1',
									'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
									'container'       => 'ul',
									'container_class' => 'collapse navbar-collapse',
									'container_id'    => 'bs-example-navbar-collapse-1',
									'menu_class'      => 'nav navbar-nav menu_nav',
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'walker'          => new WP_Bootstrap_Navwalker(),
								) );
							?>
						</div>
						
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->