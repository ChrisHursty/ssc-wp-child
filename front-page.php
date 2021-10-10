<?php
/**
 * The home page
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="hero-image-container" style="background-image: url('<?php if (get_theme_mod( 'home_hero_img' )) : echo get_theme_mod( 'home_hero_img' ); else: echo get_stylesheet_directory_uri() . '/img/home-page-hero.jpg'; endif; ?>');">
        </div>
    </div>
</div>
<div class="container-md">
    <div class="row">
        <!-- The WordPress Menu goes here -->
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'home_page_menu',
                'container_class' => 'home-menu-container col-sm-12 col-md-8 offset-md-2',
                'menu_class'      => 'home-page-menu',
                'menu_id'         => 'home-menu',
            )
        );
        ?>
    </div>
</div>

<div class="container image-links">
    <div class="row">
        <?php if( get_theme_mod( 'home_text_link_left' ) && get_theme_mod( 'home_img_link_left' ) ): ?>
        <div class="col-sm-12 col-md-6 left-image">    
            <a href="<?php echo get_theme_mod( 'home_text_link_left' ); ?>" rel="noopener noreferrer" target="_blank">
                <img src="<?php echo get_theme_mod( 'home_img_link_left' ); ?>" alt="home page image link to third party">
            </a>
        </div>
        <?php endif; ?>
        <?php if( get_theme_mod( 'home_text_link_right' ) && get_theme_mod( 'home_img_link_right' ) ): ?>
        <div class="col-sm-12 col-md-6 right-image">
            <a href="<?php echo get_theme_mod( 'home_text_link_right' ); ?>" rel="noopener noreferrer" target="_blank">
                <img src="<?php echo get_theme_mod( 'home_img_link_right' ); ?>" alt="home page image link to third party">
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();