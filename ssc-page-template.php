<?php
/**
 * Template Name: SSC Page Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();

// Define fallback image path
$thumb = get_stylesheet_directory_uri() . '/img/default-hero-image.jpg';
if ( has_post_thumbnail() ) {  
    // Override fallback image if post has any thumbnail
    $thumb = get_the_post_thumbnail_url();
}
?>

<div class="container-fluid hero-image-default d-flex justify-content-center align-items-center" style="background-image: url('<?php echo $thumb;?>')">
     <div class="row">
         <div class="col page-title title-bg">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div class="wrapper" id="page-wrapper">

	<div class="container" id="content" tabindex="-1">
		<div class="row">

			<main class="site-main full-width-content" id="main">

				<?php the_content(); ?>

			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->
<?php
get_footer();
