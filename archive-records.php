<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<div class="wrapper" id="archive-wrapper">
	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main" id="main">
				<?php
				if ( have_posts() ) {
					?>
					<header class="page-header">
						<h1>Records</h1>
					</header><!-- .page-header -->
					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', get_post_format() );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>
			</main><!-- #main -->
			<?php
			// Display the pagination component.
			understrap_pagination();
			?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive-wrapper -->
<?php
get_footer();
