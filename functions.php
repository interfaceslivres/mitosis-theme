<?php
	
add_theme_support( 'post-thumbnails' );

function register_menus() { 
    register_nav_menus(
        array(
            'main-menu' => 'Menu Principal',
            'sidebar-menu' => 'Menu Lateral',
            'footer-menu' => 'Menu do Footer',
            'test-menu' => 'Menu test',
        )
    ); 
}
add_action( 'init', 'register_menus' );

function themename_custom_logo_setup() {
	$defaults = array(

		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
?>

