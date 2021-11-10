<?php
/**
 * The header for our theme
 * Displays all of the <head> section and everything up till <div id="content">
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
		<div class="container-md header-section">
			<div class="row">
			<!-- Your site title as branding in the menu -->
				<div class="col-sm-2 logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="col-sm-6 title">
					<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
						<h1 class="navbar-brand mb-0"><?php bloginfo( 'name' ); ?></h1>
						<h2><?php bloginfo( 'description' ); ?></h2>
					</a>
				</div>
				<div class="col-sm-6 col-md-4 members-login">
					<a href="/members" class="member-link">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/member-login-icon.png" alt="Member Login Icon" class="ssc-member-login">
						<h5>SSC Member Login</h5>
					</a>
				</div>
			</div>
		</div>
			<!-- .container -->
		<nav id="main-nav" class="navbar navbar-expand-md" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>
			<div class="container-md">
				<div class="row">
					<div class="hamburger">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="navbar-toggler-icon">   
							<i class="fa fa-bars" style="color:#fff; font-size:28px;"></i>
						</span>
						</button>
					</div>
					
					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
						
				</div>
			</div>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
