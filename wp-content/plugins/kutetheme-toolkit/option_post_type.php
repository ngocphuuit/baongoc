<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'kt_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category KuteTheme
 * @package  ThemeOption
 */


add_action( 'cmb2_init', 'kt_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function kt_register_demo_metabox() {
	global $wp_registered_sidebars;
    $sidebars = array();
    

    foreach ( $wp_registered_sidebars as $sidebar ){
        $sidebars[  $sidebar['id'] ] =   $sidebar['name'];
    }
    
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_kt_page_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$page_option = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Page Option', 'kutetheme' ),
		'object_types'  => array( 'page', )
	) );
	$page_option->add_field( array(
	    'name'             => __('Page Title','kutetheme'),
	    'desc'             => __("Display of title.",'kutetheme'),
	    'id'               => 'kt_show_page_title',
	    'type'             => 'select',
	    'default'          => 'show',
	    'options'          => array(
			'show' =>__('Show','kutetheme'),
			'hide' => __( 'Hide', 'kutetheme' ),
	    ),
	) );
	$page_option->add_field( array(
	    'name'             => __('Page breadcrumb','kutetheme'),
	    'desc'             => __("Display Page breadcrumb.",'kutetheme'),
	    'id'               => 'kt_show_page_breadcrumb',
	    'type'             => 'select',
	    'default'          => 'show',
	    'options'          => array(
			'show' =>__('Show','kutetheme'),
			'hide' => __( 'Hide', 'kutetheme' ),
	    ),
	) );
    
    $page_option->add_field( array(
	    'name'             => __('Page Comment','kutetheme'),
	    'desc'             => __("Endable comment page( default: enable ).",'kutetheme'),
	    'id'               => 'kt_enable_page_comment',
	    'type'             => 'select',
	    'default'          => 'show',
	    'options'          => array(
			'show' => __( 'Show','kutetheme'),
			'hide' => __( 'Hide', 'kutetheme' ),
	    ),
	) );
	$page_option->add_field( array(
	    'name'             => __('Page layout','kutetheme'),
	    'desc'             => __("Please choose this page's layout.",'kutetheme'),
	    'id'               => 'kt_page_layout',
	    'type'             => 'select',
	    'show_option_none' => true,
	    'options'          => array(
			'left'  =>__('Left Sidebar','kutetheme'),
			'right' =>__('Right Sidebar','kutetheme'),
			'full'  => __( 'Full width layout', 'kutetheme' ),
	    ),
	) );
	$page_option->add_field( array(
		'name'    => __( 'Sidebar for page layout', 'kutetheme' ),
		'id'      => 'kt_page_used_sidebar',
		'type'    => 'select',
		'show_option_none' => true,
        'options' => $sidebars,
        'desc'    => __( 'Setting sidebar in the area sidebar', 'kutetheme' ),
	) );
        
	$page_option->add_field( array(
		'name' => __( 'Extra page class', 'kutetheme' ),
		'desc' => __( 'If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.', 'kutetheme' ),
		'id'   => 'kt_page_extra_class',
		'type' => 'text',
	) );
	/**
	 * Mega meno
	 */
	$megamenu_option = new_cmb2_box( array(
		'id'            => 'kt_megamenu_metabox',
		'title'         => __( 'Menu Option', 'kutetheme' ),
		'object_types'  => array( 'megamenu' )
	) );
    
	$megamenu_option->add_field( array(
		'name'    => __( 'Menu width', 'kutetheme' ),
		'desc'    => __( 'Setting menu with (Unit px)', 'kutetheme' ),
		'id'      => 'kt_megamenu_width',
		'default' =>830,
		'type'    => 'text',
	) );

	/**
	 * Service option
	 */
	$service_option = new_cmb2_box( array(
		'id'            => $prefix . 'service_metabox',
		'title'         => __( 'Service Option', 'kutetheme' ),
		'object_types'  => array( 'service' )
	) );
    
	$service_option->add_field( array(
		'name' => __( 'Description', 'kutetheme' ),
		'desc' => __( 'Short description', 'kutetheme' ),
		'id'   => $prefix . 'service_desc',
		'type' => 'textarea_small',
	) );

	/**
	 * Look books option
	 */
	$Lookbooks_option = new_cmb2_box( array(
		'id'            => $prefix . 'look_books_metabox',
		'title'         => __( 'Look books Option', 'kutetheme' ),
		'object_types'  => array( 'look-books' )
	) );
    
	$Lookbooks_option->add_field( array(
		'name' => __( 'Location', 'kutetheme' ),
		'id'   => $prefix . 'lookbook_location',
		'type' => 'text',
	) );
	/**
	 * Colections option
	 */
	$colection_option = new_cmb2_box( array(
		'id'            => $prefix . 'colections_metabox',
		'title'         => __( 'Colections Option', 'kutetheme' ),
		'object_types'  => array( 'colection' )
	) );
    
	$colection_option->add_field( array(
		'name' => __( 'Designer', 'kutetheme' ),
		'id'   => $prefix . 'colection_design',
		'type' => 'text',
	) );
	$colection_option->add_field( array(
    'name'    => 'Gallery colection',
    'desc'    => 'Upload an image or enter an URL.',
    'id'      => $prefix .'gallery_colection',
    'type'    => 'file_list',
    // Optional:
    'options' => array(
        'url' => false, // Hide the text input for the url
        'add_upload_file_text' => 'Add colection gallery images' // Change upload button text. Default: "Add or Upload File"
    ),
) );

	/**
	 * Product
	 */
	$product_option = new_cmb2_box( array(
		'id'            => 'kt_product_metabox',
		'title'         => __( 'Product Option', 'kutetheme' ),
		'object_types'  => array( 'product' )
	) );

	$product_option->add_field( array(
		'name' => __( 'Size Chart', 'kutetheme' ),
		'desc' => __( 'Select an image', 'kutetheme' ),
		'id'   => 'kt_product_size_chart',
		'type' => 'file',
	) );
    
}

add_action( 'cmb2_init', 'kt_register_about_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function kt_register_about_page_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_kt_about_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'About Page Metabox', 'kutetheme' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_about_page->add_field( array(
		'name' => __( 'Test Text', 'kutetheme' ),
		'desc' => __( 'field description (optional)', 'kutetheme' ),
		'id'   => $prefix . 'text',
		'type' => 'text',
	) );


}

//add_action( 'cmb2_init', 'kt_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function kt_register_repeatable_group_field_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_kt_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Repeating Field Group', 'kutetheme' ),
		'object_types' => array( 'page', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'demo',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries', 'kutetheme' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'kutetheme' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'kutetheme' ),
			'remove_button' => __( 'Remove Entry', 'kutetheme' ),
			'sortable'      => true, // beta
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Entry Title', 'kutetheme' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Description', 'kutetheme' ),
		'description' => __( 'Write a short description for this entry', 'kutetheme' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Entry Image', 'kutetheme' ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image Caption', 'kutetheme' ),
		'id'   => 'image_caption',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'kt_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function kt_register_user_profile_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_kt_user_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', 'kutetheme' ),
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', 'kutetheme' ),
		'desc'     => __( 'field description (optional)', 'kutetheme' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Avatar', 'kutetheme' ),
		'desc'    => __( 'field description (optional)', 'kutetheme' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'kutetheme' ),
		'desc' => __( 'field description (optional)', 'kutetheme' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'kutetheme' ),
		'desc' => __( 'field description (optional)', 'kutetheme' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'kutetheme' ),
		'desc' => __( 'field description (optional)', 'kutetheme' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'kutetheme' ),
		'desc' => __( 'field description (optional)', 'kutetheme' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'User Field', 'kutetheme' ),
		'desc' => __( 'field description (optional)', 'kutetheme' ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'kt_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function kt_register_theme_options_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$option_key = '_kt_theme_options';

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See wiki for more info.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'      => $option_key . 'page',
		'title'   => __( 'Theme Options Metabox', 'kutetheme' ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
		),
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => __( 'Site Background Color', 'kutetheme' ),
		'desc'    => __( 'field description (optional)', 'kutetheme' ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

}
