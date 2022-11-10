<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'ssc_child_setup' );

if ( ! function_exists( 'ssc_child_setup' ) ) {

	function ssc_child_setup() {

		// Home Page Menu
		register_nav_menus(
			array(
				'home_page_menu' => __( 'Home Page Menu', 'ssc_child' ),
			)
		);

		// Footer Menu
		register_nav_menus(
			array(
				'footer_menu' => __( 'Footer Menu', 'ssc_child' ),
			)
		);

	}
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'ssc-wp-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
    '/hooks.php',     // Custom hooks.
	'/customizer.php' // Customizer additions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

// Records Post Type
if ( ! function_exists('records') ) {

	// Register Custom Post Type
	function records() {
	
		$labels = array(
			'name'                  => _x( 'Records', 'Post Type General Name', 'ssc-child' ),
			'singular_name'         => _x( 'Record', 'Post Type Singular Name', 'ssc-child' ),
			'menu_name'             => __( 'Records', 'ssc-child' ),
			'name_admin_bar'        => __( 'Record', 'ssc-child' ),
			'archives'              => __( 'Records Archives', 'ssc-child' ),
			'attributes'            => __( 'Record Attributes', 'ssc-child' ),
			'parent_item_colon'     => __( 'Records:', 'ssc-child' ),
			'all_items'             => __( 'All Records', 'ssc-child' ),
			'add_new_item'          => __( 'Add New Record', 'ssc-child' ),
			'add_new'               => __( 'Add New', 'ssc-child' ),
			'new_item'              => __( 'New Record', 'ssc-child' ),
			'edit_item'             => __( 'Edit Record', 'ssc-child' ),
			'update_item'           => __( 'Update Record', 'ssc-child' ),
			'view_item'             => __( 'View Record', 'ssc-child' ),
			'view_items'            => __( 'View Records', 'ssc-child' ),
			'search_items'          => __( 'Search Records', 'ssc-child' ),
			'not_found'             => __( 'Not found', 'ssc-child' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ssc-child' ),
			'featured_image'        => __( 'Featured Image', 'ssc-child' ),
			'set_featured_image'    => __( 'Set featured image', 'ssc-child' ),
			'remove_featured_image' => __( 'Remove featured image', 'ssc-child' ),
			'use_featured_image'    => __( 'Use as featured image', 'ssc-child' ),
			'insert_into_item'      => __( 'Insert into item', 'ssc-child' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ssc-child' ),
			'items_list'            => __( 'Items list', 'ssc-child' ),
			'items_list_navigation' => __( 'Items list navigation', 'ssc-child' ),
			'filter_items_list'     => __( 'Filter items list', 'ssc-child' ),
		);
		$args = array(
			'label'                 => __( 'Record', 'ssc-child' ),
			'description'           => __( 'Records of Fishing Records', 'ssc-child' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-awards',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'records', $args );
	
	}
	add_action( 'init', 'records', 0 );
	
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(

		array(
			'page_title' => 'Theme Options',
			'menu_title' => 'Theme Options',
			'menu-slug'  => 'theme-options',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-admin-tools'
		)
	);
}
	