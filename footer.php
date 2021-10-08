<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
<div class="wrapper" id="wrapper-footer">
	<div class="container-md">
		<div class="row">
			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'footer_menu',
					'container_class' => 'footer-container col-sm-12 col-md-8 offset-md-2',
					'menu_class'      => 'footer-menu',
					'menu_id'         => 'footer-menu',
				)
			);
			?>
		</div>
	</div>
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row">
			<div class="col-md-12">
				<footer class="site-footer" id="colophon">
					<div class="site-info">
						<?php ssc_child_add_site_info(); ?>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
			</div><!--col end -->
		</div><!-- row end -->
	</div><!-- container end -->
</div><!-- wrapper end -->
</div><!-- #page we need this extra closing tag here -->
<?php wp_footer(); ?>
</body>
</html>
