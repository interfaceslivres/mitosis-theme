<?php

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

?>

