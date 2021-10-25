<?php
/**
 * Template Name: Tables Page with 4 Columns
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?php the_field( 'four_heading_one' );?></th>
                        <th scope="col"><?php the_field( 'four_heading_two' );?></th>
                        <th scope="col"><?php the_field( 'four_heading_three' );?></th>
                        <th scope="col"><?php the_field( 'four_heading_four' );?></th>
                    </tr>
                </thead>
                <?php if( have_rows('four_table_content') ): ?>
                <tbody>
                    <?php 
                    // Loop through rows.
                    while( have_rows('four_table_content') ) : the_row(); ?>
                    <tr>
                        <td><?php echo get_sub_field('column_one'); ?></td>
                        <td><?php echo get_sub_field('column_two'); ?></td>
                        <td><?php echo get_sub_field('column_three'); ?></td>
                        <td><?php echo get_sub_field('column_four'); ?></td>
                    </tr>
                    <?php
                        
                    // End loop.
                    endwhile; ?>
                        
                </tbody>
            </table>
            <?php 
            // No value.
            else :
                // Do something...
            endif; ?>

            <div class="col">
                <?php the_content(); ?>
            </div>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->
<?php
get_footer();
