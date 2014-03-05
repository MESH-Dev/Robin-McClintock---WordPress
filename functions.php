<?php
//Enqueue scripts and styles
function my_scripts_method() {
	wp_enqueue_style( 'boilerplate-style', get_stylesheet_uri() );
	wp_enqueue_script('boilerplate-script',get_stylesheet_directory_uri().'/assets/js/boilerplate.js',array('jquery'));
}
add_action('wp_enqueue_scripts','my_scripts_method');


//Theme Supports
add_theme_support( 'automatic-feed-links' );
$args = array(
	'width'         => 200,
	'height'        => 100,
	'flex-width'	=> true,
	'flex-height'	=> true,
	'default-image' => get_template_directory_uri() . '/assets/img/defaultHeader.gif',
);
add_theme_support( 'custom-header', $args );
add_theme_support( 'post-thumbnails' );
$args = array(
	'default-color' => '000000',
	'default-image' => get_template_directory_uri() . '/assets/img/defaultBG.png',
);
add_theme_support( 'custom-background', $args );


// Theme the TinyMCE editor
add_editor_style('custom-editor-style.css');


// Custom CSS for the login page
function wpfme_loginCSS() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/css/login.css"/>';
}
add_action('login_head', 'wpfme_loginCSS');


// Customise the footer in admin area
function wpfme_footer_admin () {
	echo 'Theme designed and developed by <a href="#" target="_blank">MESH Design & Development</a>.';
}
add_filter('admin_footer_text', 'wpfme_footer_admin');


// Custom CSS for the whole admin area
function wpfme_adminCSS() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/css/admin.css"/>';
}
add_action('admin_head', 'wpfme_adminCSS');


// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);


//Widget Sections
register_sidebar(array(
  'name' => __('Blog Sidebar'),
  'id' => 'blog-sidebar',
  'description' => __('Widgets will show in sidebar of the blogroll'),
  'before_title' => '<h3 class="blog-sidebar">',
  'after_title' => '</h3>'
));


//Menus
register_nav_menus(array(
	'main-nav'   => 'Primary Navigation structure for header nav, secondary nav, and breadcrumbs ',
	'footer_nav' => 'Footer Navigation',
	'social-nav' => 'Social navigation to be used in the footer, utility, wherever'
));

?>