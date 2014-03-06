<?php
//Enqueue scripts and styles
function my_scripts_method() {
	wp_enqueue_style( 'mcclintock-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery-ui',get_stylesheet_directory_uri().'/assets/js/jquery-ui-1.10.3.custom.min.js',array('jquery'));
	wp_enqueue_script('jquery-mousewheel',get_stylesheet_directory_uri().'/assets/js/jquery.mousewheel.min.js',array('jquery'));
	wp_enqueue_script('jquery-kinetic',get_stylesheet_directory_uri().'/assets/js/jquery.kinetic.min.js',array('jquery'));
	wp_enqueue_script('jquery-smoothscroll',get_stylesheet_directory_uri().'/assets/js/jquery.smoothdivscroll-1.3-min.js',array('jquery'));

	wp_enqueue_script('mcclintock-script',get_stylesheet_directory_uri().'/assets/js/script.js',array('jquery'));


}
add_action('wp_enqueue_scripts','my_scripts_method');


//Theme Supports
add_theme_support( 'automatic-feed-links' );
$args = array(
	'width'         => 260,
	'height'        => 40,
	'flex-width'	=> true,
	'flex-height'	=> true,
	'default-image' => get_template_directory_uri() . '/assets/img/logo.png',
);
add_theme_support( 'custom-header', $args );
add_theme_support( 'post-thumbnails' );
$args = array(
	'default-color' => 'ffffff',
	//'default-image' => get_template_directory_uri() . '/assets/img/defaultBG.png',
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


//Paintings CPT
add_action( 'init', 'work_init' );
function work_init() {
	$labels = array(
		'name'               => _x( 'Work' ),
		'singular_name'      => _x( 'Work'),
		'menu_name'          => _x( 'Work' ),
		'name_admin_bar'     => _x( 'Work' ),
		'add_new'            => _x( 'Add New' ),
		'add_new_item'       => __( 'Add New Work' ),
		'new_item'           => __( 'New Work' ),
		'edit_item'          => __( 'Edit Work' ),
		'view_item'          => __( 'View Work' ),
		'all_items'          => __( 'All Work' ),
		'search_items'       => __( 'Search Work' ),
		'parent_item_colon'  => __( 'Parent Work:' ),
		'not_found'          => __( 'No work found.' ),
		'not_found_in_trash' => __( 'No work found in Trash.' ),
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'work' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'slug', 'thumbnail' )
	);
	register_post_type( 'work', $args );
}


add_filter( 'manage_edit-work_columns', 'set_custom_edit_work_columns' );
add_action( 'manage_work_posts_custom_column' , 'custom_work_column', 10, 2 );

function set_custom_edit_work_columns($columns) {
	unset( $columns['date'] );

    $columns['work_year'] = __( 'Year');
    $columns['work_medium'] = __( 'Medium');
    $columns['work_dimensions'] = __( 'Dimensions');
    $columns['work_additional'] = __( 'Additional');
    $columns['work_preview'] = __( 'Work');
    return $columns;
}

function custom_work_column( $column, $post_id ) {
    switch ( $column ) {
        case 'work_preview' :
            $img = get_the_post_thumbnail($post_id, array(150,150));
            echo $img;
        break;

        case 'work_year' :
            $meta = get_post_meta($post_id, 'year', true);
            echo $meta;
        break;

        case 'work_medium' :
            $meta = get_post_meta($post_id, 'medium', true);
            echo $meta;
        break;

        case 'work_dimensions' :
            $meta = get_post_meta($post_id, 'dimensions', true);
            echo $meta;
        break;

        case 'work_additional' :
            $meta = get_post_meta($post_id, 'additional', true);
            echo $meta;
        break;
    }
}
?>