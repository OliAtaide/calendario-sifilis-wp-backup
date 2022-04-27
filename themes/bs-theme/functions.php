<?php

function custom_theme_assets() {
    $the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

    $theme_styles  = "/css/bootstrap{$suffix}.css";
	$theme_scripts = "/js/bootstrap{$suffix}.js";

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    // wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    // wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
}

add_action('wp_enqueue_scripts', 'custom_theme_assets');