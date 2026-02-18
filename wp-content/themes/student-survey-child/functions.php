<?php

/**
 * Enqueue parent theme styles.
 */
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



// Chargement modulaire des fonctionnalités du thème
require_once get_stylesheet_directory() . '/inc/enqueue.php';
require_once get_stylesheet_directory() . '/inc/roles.php';
require_once get_stylesheet_directory() . '/inc/auth-redirect.php';
require_once get_stylesheet_directory() . '/inc/dynamic-menu.php';
require_once get_stylesheet_directory() . '/inc/survey-responses-admin.php';

?>
