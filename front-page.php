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
        <div class="hero-image-container" style="background-image: url('<?php if (get_theme_mod( 'home_hero_img' )) : echo get_theme_mod( 'home_hero_img'); else: echo get_stylesheet_directory_uri() . '/img/home-page-hero.jpg'; endif; ?>');">
            
        </div>
    </div>
</div>

<?php
get_footer();