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
			<main class="site-main" id="main">
				<?php
				while ( have_posts() ) {
					the_post(); ?>
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<header class="entry-header">
							<div class="entry-meta">
								<?php understrap_posted_on(); ?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php
							the_content();
							understrap_link_pages();
							?>
						</div><!-- .entry-content -->
						<footer class="entry-footer">
							<?php understrap_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-## -->
					<?php understrap_post_nav();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>
			</main><!-- #main -->
			<!-- Do the right sidebar check -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #single-wrapper -->
<?php
get_footer();
