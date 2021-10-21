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
get_header(); ?>

<div class="wrapper" id="archive-wrapper">
	<div class="container" id="content" tabindex="-1">
		<div class="row">
		<?php 
			$args = array (
			'post_type'      => 'records',
			'status'         => 'publish',
			'order'          => 'ASC',
			'posts_per_page' => -1
			);
			$the_query = new WP_Query($args);
			?>


			<?php if($the_query->have_posts()) : ?>
			<?php while($the_query->have_posts()) : $the_query->the_post(); ?>

			<div class="col-sm-12 col-md-4 record-container">
				<div class="record-image">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy-icon.png" alt="Member Login Icon" class="records-icon">
				<?php 
					$image = get_field('record_photo');
					

					if( !empty( $image ) ) { ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php } else { ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/records-default-image.jpg" alt="Records Image">
					<?php } ?>


				</div>

				<div class="record-content">
					<h3><?php echo the_field( 'record_name' ); ?></h3>
					<h4><?php echo the_field( 'record_set' ); ?></h4>
					<p><?php echo the_field( 'record_details' ); ?></p>

				</div>
			</div>

			<?php endwhile; ?>
			<?php endif; wp_reset_query(); ?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive-wrapper -->

<?php
get_footer();
