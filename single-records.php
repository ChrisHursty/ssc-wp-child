<?php
/**
 * The template for displaying all single posts
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

$image = get_field('record_photo');
$size = 'full';	
?>

<div class="container-fluid hero-image-default d-flex justify-content-center align-items-center" style="background-image: url('<?php echo $thumb;?>')">
     <div class="row">
         <div class="col page-title title-bg">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>
<div class="wrapper" id="single-wrapper">
	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<main class="container site-main" id="main">
                <h1>Single Record</h1>
				<div class="row record-container">
					<div class="col-md-6 records-text">
						<h4><?php echo the_field( 'record_name' ); ?></h4>
						<h4><?php echo the_field( 'record_set' ); ?></h4>
						<p><?php echo the_field( 'record_details' ); ?></p>
					</div>
					<div class="col-md-6 records-image">
					<?php 
						$image = get_field('record_photo');
						if( !empty( $image ) ): ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					</div>
				</div>
			</main><!-- #main -->
			<!-- Do the right sidebar check -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #single-wrapper -->
<?php
get_footer();
