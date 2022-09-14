<?php
require_once('bs5navwalker.php');
function themebs_enqueue_styles() {
  // $theme_styles  = "/css/bootstrap{$suffix}.css";
	// $theme_scripts = "/js/bootstrap{$suffix}.js";

  // wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array());
	// wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), true );

  wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css');
  wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js');
  wp_enqueue_script( 'jquery' );
  wp_enqueue_style( 'core', get_stylesheet_directory_uri() . '/style.css' );
  wp_enqueue_script('core', get_stylesheet_directory_uri() . '/script.js');
}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_styles');
function themebs_enqueue_scripts() {
  remove_filter( 'the_content', 'wpautop' ); remove_filter( 'the_excerpt', 'wpautop' );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js',
  array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_scripts');

function add_featured_image_support_to_your_wordpress_theme() {
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'add_featured_image_support_to_your_wordpress_theme' );

if ( function_exists('register_sidebar') )
register_sidebar();

//WPML - Add a floating language switcher to the footer
// add_action('wp_footer', 'wpml_floating_language_switcher'); 
  
// function wpml_floating_language_switcher() { 
//   echo '<div class="wpml-floating-language-switcher">';
       //PHP action to display the language switcher (see https://wpml.org/documentation/getting-started-guide/language-setup/language-switcher-options/#using-php-actions)
//       do_action('wpml_add_language_selector');
//   echo '</div>'; 
//}