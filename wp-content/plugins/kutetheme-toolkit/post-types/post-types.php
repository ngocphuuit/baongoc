<?php

if ( ! defined('ABSPATH')) exit;

function register_post_type_init() {
    
    $labels = array(
        'name'               => __( 'Mega Menu', 'kutetheme' ),
        'singular_name'      => __( 'Mega Menu Item', 'kutetheme' ),
        'add_new'            => __( 'Add New', 'kutetheme' ),
        'add_new_item'       => __( 'Add New Menu Item', 'kutetheme' ),
        'edit_item'          => __( 'Edit Menu Item', 'kutetheme' ),
        'new_item'           => __( 'New Menu Item', 'kutetheme' ),
        'view_item'          => __( 'View Menu Item', 'kutetheme' ),
        'search_items'       => __( 'Search Menu Items', 'kutetheme' ),
        'not_found'          => __( 'No Menu Items found', 'kutetheme' ),
        'not_found_in_trash' => __( 'No Menu Items found in Trash', 'kutetheme' ),
        'parent_item_colon'  => __( 'Parent Menu Item:', 'kutetheme' ),
        'menu_name'          => __( 'Mega Menu', 'kutetheme' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => __('Mega Menus.', 'kutetheme'),
        'supports'            => array( 'title', 'editor' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 40,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => false,
        'capability_type'     => 'page',
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
    );

    register_post_type( 'megamenu', $args );
    
    /* Testimonials */
    $labels = array(
        'name'               => __( 'Testimonial', 'kutetheme' ),
        'singular_name'      => __( 'Testimonial', 'kutetheme'),
        'add_new'            => __( 'Add New', 'kutetheme' ),
        'all_items'          => __( 'Testimonials', 'kutetheme' ),
        'add_new_item'       => __( 'Add New Testimonial', 'kutetheme' ),
        'edit_item'          => __( 'Edit Testimonial', 'kutetheme' ),
        'new_item'           => __( 'New Testimonial', 'kutetheme' ),
        'view_item'          => __( 'View Testimonial', 'kutetheme' ),
        'search_items'       => __( 'Search Testimonial', 'kutetheme' ),
        'not_found'          => __( 'No Testimonial found', 'kutetheme' ),
        'not_found_in_trash' => __( 'No Testimonial found in Trash', 'kutetheme' ),
        'parent_item_colon'  => __( 'Parent Testimonial', 'kutetheme' ),
        'menu_name'          => __( 'Testimonials', 'kutetheme' )
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'rewrite'            => false,
        'query_var'          => false,
        'publicly_queryable' => false,
        'public'             => true,
        'menu_icon'          => 'dashicons-editor-quote',
        

    );
    register_post_type( 'testimonial', $args );

    /* Services */
    $labels = array(
        'name'               => __( 'Services', 'kutetheme' ),
        'singular_name'      => __( 'Services', 'kutetheme'),
        'add_new'            => __( 'Add New', 'kutetheme' ),
        'all_items'          => __( 'Services', 'kutetheme' ),
        'add_new_item'       => __( 'Add New Service', 'kutetheme' ),
        'edit_item'          => __( 'Edit Service', 'kutetheme' ),
        'new_item'           => __( 'New Service', 'kutetheme' ),
        'view_item'          => __( 'View Service', 'kutetheme' ),
        'search_items'       => __( 'Search Service', 'kutetheme' ),
        'not_found'          => __( 'No Service found', 'kutetheme' ),
        'not_found_in_trash' => __( 'No Service found in Trash', 'kutetheme' ),
        'parent_item_colon'  => __( 'Parent Service', 'kutetheme' ),
        'menu_name'          => __( 'Services', 'kutetheme' )
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'rewrite'            => true,
        'query_var'          => true,
        'publicly_queryable' => true,
        'public'             => true,
        'menu_icon'          => 'dashicons-update'
    );
    register_post_type( 'service', $args );

    /* Look Boock */
    $labels = array(
        'name'               => __( 'Look Boocks', 'kutetheme' ),
        'singular_name'      => __( 'Look Boocks', 'kutetheme'),
        'add_new'            => __( 'Add New', 'kutetheme' ),
        'all_items'          => __( 'Look Boock', 'kutetheme' ),
        'add_new_item'       => __( 'Add New Look Boock', 'kutetheme' ),
        'edit_item'          => __( 'Edit Look Boock', 'kutetheme' ),
        'new_item'           => __( 'New Look Boock', 'kutetheme' ),
        'view_item'          => __( 'View Look Boock', 'kutetheme' ),
        'search_items'       => __( 'Search Look Boock', 'kutetheme' ),
        'not_found'          => __( 'No Look Boocks found', 'kutetheme' ),
        'not_found_in_trash' => __( 'No Look Boocks found in Trash', 'kutetheme' ),
        'parent_item_colon'  => __( 'Parent Look Boock', 'kutetheme' ),
        'menu_name'          => __( 'Look Boocks', 'kutetheme' )
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'rewrite'            => true,
        'query_var'          => true,
        'publicly_queryable' => true,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-update'
    );
    register_post_type( 'look-books', $args );
    /* COLLECTIONS  */
    $labels = array(
        'name'               => __( 'Colections', 'kutetheme' ),
        'singular_name'      => __( 'Colections', 'kutetheme'),
        'add_new'            => __( 'Add New', 'kutetheme' ),
        'all_items'          => __( 'Colections', 'kutetheme' ),
        'add_new_item'       => __( 'Add New Colection', 'kutetheme' ),
        'edit_item'          => __( 'Edit Colection', 'kutetheme' ),
        'new_item'           => __( 'New Colection', 'kutetheme' ),
        'view_item'          => __( 'View Colection', 'kutetheme' ),
        'search_items'       => __( 'Search Colection', 'kutetheme' ),
        'not_found'          => __( 'No Colection found', 'kutetheme' ),
        'not_found_in_trash' => __( 'No Colection found in Trash', 'kutetheme' ),
        'parent_item_colon'  => __( 'Parent Colection', 'kutetheme' ),
        'menu_name'          => __( 'Colections', 'kutetheme' )
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'supports'           => array( 'title', 'thumbnail', 'editor','excerpt' ),
        'rewrite'            => true,
        'query_var'          => true,
        'publicly_queryable' => true,
        'public'             => true,
        'menu_icon'          => 'dashicons-update'
    );
    register_post_type( 'colection', $args );
    
    flush_rewrite_rules();
}

add_action( 'init', 'register_post_type_init' );

// hook into the init action and call create_service_taxonomies when it fires
add_action( 'init', 'create_service_taxonomies', 0 );

// create two taxonomies, service and writers for the post type "book"
function create_service_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => __( 'Categories', 'kutetheme' ),
		'singular_name'     => __( 'Categories', 'kutetheme' ),
		'search_items'      => __( 'Search Categories', 'kutetheme' ),
		'all_items'         => __( 'All Categories', 'kutetheme' ),
		'parent_item'       => __( 'Parent Categories', 'kutetheme' ),
		'parent_item_colon' => __( 'Parent Categories:', 'kutetheme' ),
		'edit_item'         => __( 'Edit Categories', 'kutetheme' ),
		'update_item'       => __( 'Update Categories', 'kutetheme' ),
		'add_new_item'      => __( 'Add New Categories', 'kutetheme' ),
		'new_item_name'     => __( 'New Categories Name', 'kutetheme' ),
		'menu_name'         => __( 'Categories', 'kutetheme' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'service_cat' ),
	);

	register_taxonomy( 'service_cat', 'service', $args );

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Categories', 'kutetheme' ),
        'singular_name'     => __( 'Categories', 'kutetheme' ),
        'search_items'      => __( 'Search Categories', 'kutetheme' ),
        'all_items'         => __( 'All Categories', 'kutetheme' ),
        'parent_item'       => __( 'Parent Categories', 'kutetheme' ),
        'parent_item_colon' => __( 'Parent Categories:', 'kutetheme' ),
        'edit_item'         => __( 'Edit Categories', 'kutetheme' ),
        'update_item'       => __( 'Update Categories', 'kutetheme' ),
        'add_new_item'      => __( 'Add New Categories', 'kutetheme' ),
        'new_item_name'     => __( 'New Categories Name', 'kutetheme' ),
        'menu_name'         => __( 'Categories', 'kutetheme' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'colection_cat' ),
    );
    register_taxonomy( 'colection_cat', 'colection', $args );
}