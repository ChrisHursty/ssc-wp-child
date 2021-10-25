<?php
/**
 * Template Name: Content Blocks
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
			<main class="site-main" id="main">
            <?php

                // Check value exists.
                if( have_rows('flexible_content') ): ?>
                <div class="container">
                    
                    <?php // Loop through rows.
                    while ( have_rows('flexible_content') ) : the_row(); ?>
                        <div class="row bottom-border">
                                <?php // Case: Paragraph layout.
                                if( get_row_layout() == 'center_text' ):
                                    $text = get_sub_field('text'); ?>
                                    <div class="col-md-8 offset-md-2 text-center">
                                        <p><?php echo $text; ?></p>
                                    </div>
                                    
                                <?php // Case: Download layout.
                                elseif( get_row_layout() == 'image_text' ):
                                    $image = get_sub_field( 'image' );
                                    $text = get_sub_field('text'); ?>
                                    <div class="col-sm-6 col-md-3">
                                        <img src="<?php echo $image;?>" alt="History &amp; Officers">
                                    </div>
                                    <div class="col-sm-6 col-md-9 align-self-center">
                                        <p><?php echo $text; ?></p>
                                    </div>
                                <?php // Case: Download layout.
                                elseif( get_row_layout() == 'text_image' ):
                                    $image = get_sub_field( 'image' );
                                    $text = get_sub_field('text'); ?>
                                    <div class="col-sm-6 col-md-9 align-self-center">
                                        <p><?php echo $text; ?></p>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <img src="<?php echo $image;?>" alt="History &amp; Officers">
                                    </div>
                                    <?php

                                    elseif( get_row_layout() == 'image_and_text_equal' ):
                                        $image = get_sub_field( 'image' );
                                        $text = get_sub_field('text'); ?>
                                        <div class="col-sm-6 col-md-96 align-self-center">
                                            <img src="<?php echo $image;?>" alt="History &amp; Officers">
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <p><?php echo $text; ?></p>
                                        </div>
                                        <?php
                                    
                                endif; ?>
                                </div>
                    <?php // End loop.
                    endwhile; ?>
                    
                </div>
                <?php  // No value.
                else :
                    // Do something...
                endif; ?>

			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->
<?php
get_footer();
