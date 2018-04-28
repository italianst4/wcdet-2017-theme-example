<?php
/* Add styles and scripts */
add_action( 'wp_enqueue_scripts',  function() {
	// load parent styles
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	
	// load styles
	wp_enqueue_style( 'theme-global', get_stylesheet_uri() );
	
	// load simplrjs
	wp_enqueue_script('simplrjs', get_stylesheet_directory_uri() . '/assets/js/third_party/simplr.min.js', [] );
	wp_localize_script( 'simplrjs', 'ambr_global', [
		'theme_root_uri' => get_stylesheet_directory_uri()
	]);
	
	// to use the WordPress REST API
	wp_enqueue_script( 'wp-api' );

	// let's load the javascript for respective pages
	if(is_front_page()) {
		wp_enqueue_script('front_page', get_stylesheet_directory_uri() . '/assets/js/pages/front_page/front_page.js', ['jquery', 'wp-api', 'simplrjs'] );
	}
});