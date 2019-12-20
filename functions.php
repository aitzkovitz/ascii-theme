<?php 
/**
 * Register and Enqueue Styles.
 */
function ascii_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );

}
add_action( 'wp_enqueue_scripts', 'ascii_register_styles' );


function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu' => __( 'Extra Menu' )
	  	)
	);
}
add_action( 'init', 'register_my_menus' );