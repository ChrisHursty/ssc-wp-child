<?php
/**
 * Custom hooks
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'ssc_child_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function ssc_child_site_info() {
		do_action( 'ssc_child_site_info' );
	}
}

add_action( 'ssc_child_site_info', 'ssc_child_add_site_info' );
if ( ! function_exists( 'ssc_child_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function ssc_child_add_site_info() {

		$site_info = '';

		// Check if customizer site info has value.
		if ( get_theme_mod( 'ssc_child_site_info_override' ) ) {
			$site_info = get_theme_mod( 'ssc_child_site_info_override' );
		}

		echo apply_filters( 'ssc_child_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}
