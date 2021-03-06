<?php
/**
 * Understrap Theme Customizer
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'ssc_child_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function ssc_child_theme_customize_register( $wp_customize ) {

		// Theme settings
		$wp_customize->add_section(
			'ssc_child_theme_layout_options',
			array(
				'title'       => __( 'SSC Theme Customizations', 'ssc-child' ),
				'capability'  => 'edit_theme_options',
				'priority'    => 1,
			)
		);

        // Homepage Hero Image
        $wp_customize->add_setting( 'home_hero_img' , array(
            'title'      => __( 'Home Hero Image', 'ssc-child' ),
            'priority'   => 1,
            'default'    => get_theme_file_uri('img/homepage-hero-image.jpg'), // Add Default Image URL
        ) );
    
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'home_hero_img',
                array(
                    'label'      => __( 'Home Hero Image', 'ssc-child' ),
                    'section'    => 'ssc_child_theme_layout_options',
                    'settings'   => 'home_hero_img' 
                )
            )
        );

        // Homepage Image Link (Left)
        $wp_customize->add_setting( 'home_img_link_left' , array(
            'title'      => __( 'Home Image Link (Left)', 'ssc-child' ),
            'priority'   => 2,
        ) );
    
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'home_img_link_left',
                array(
                    'label'      => __( 'Home Image Link (Left)', 'ssc-child' ),
                    'section'    => 'ssc_child_theme_layout_options',
                    'settings'   => 'home_img_link_left' 
                )
            )
        );

        // Homepage Image Link Text (Left)
        $wp_customize->add_setting( 
            'home_text_link_left', 
                array(
                    'capability'        => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw',
            )
        );
        
        $wp_customize->add_control( 'home_text_link_left', array(
            'type'        => 'url',
            'section'     => 'ssc_child_theme_layout_options',
            'label'       => __( 'URL for Left Image' ),
            'input_attrs' => 
                array(
                    'placeholder' => __( 'https://www.google.com' ),
                ),
            )
        );

        // Homepage Image Link (Right)
        $wp_customize->add_setting( 'home_img_link_right' , array(
            'title'      => __( 'Home Image Link (Right)', 'ssc-child' ),
            'priority'   => 3,
        ) );
    
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'home_img_link_right',
                array(
                    'label'      => __( 'Home Image Link (Right)', 'ssc-child' ),
                    'section'    => 'ssc_child_theme_layout_options',
                    'settings'   => 'home_img_link_right' 
                )
            )
        );

        // Homepage Image Link Text (Right)
        $wp_customize->add_setting( 
            'home_text_link_right', 
                array(
                    'capability'        => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw',
            )
        );
        
        $wp_customize->add_control( 'home_text_link_right', array(
            'type'        => 'url',
            'section'     => 'ssc_child_theme_layout_options',
            'label'       => __( 'URL for Right Image' ),
            'input_attrs' => 
                array(
                    'placeholder' => __( 'https://www.google.com' ),
                ),
            )
        );

        // Footer Text
		$wp_customize->add_setting(
			'ssc_child_site_info_override',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'wp_kses_post',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ssc_child_site_info_override',
				array(
					'label'       => __( 'Footer Site Info', 'ssc-child' ),
					'description' => __( 'Add Links/Text to Footer (HTML is OK)', 'ssc-child' ),
					'section'     => 'ssc_child_theme_layout_options',
					'settings'    => 'ssc_child_site_info_override',
					'type'        => 'textarea',
					'priority'    => 20,
				)
			)
		);

	}
} // End of if function_exists( 'ssc_child_theme_customize_register' ).
add_action( 'customize_register', 'ssc_child_theme_customize_register' );
