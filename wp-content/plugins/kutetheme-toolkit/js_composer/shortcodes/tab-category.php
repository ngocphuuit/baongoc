<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name"                    => __( "Categories Tab", 'kutetheme'),
    "base"                    => "categories_tab",
    "category"                => __('Kute Theme', 'kutetheme' ),
    "description"             => __( "Show tab categories", 'kutetheme'),
    "as_parent"               => array('only' => 'tab_section'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element"         => true,
    "show_settings_on_create" => true,
    "params"                  => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Product Size", 'kutetheme'),
            "param_name"  => "size",
            "value"       => $product_thumbnail,
            'std'         => 'kt_shop_catalog_214',
            "description" => __( "Product size", 'kutetheme' ),
            "admin_label" => true,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Number Post", 'kutetheme' ),
            "param_name"  => "per_page",
            'std'         => 6,
            "admin_label" => false,
            'description' => __( 'Number post in a slide', 'kutetheme' )
        ),
        // array(
        //     "type"        => "textfield",
        //     "heading"     => __( "Column", 'kutetheme' ),
        //     "param_name"  => "number_column",
        //     "admin_label" => false,
        //     'std'         => 4,
        //     'description' => __( 'Number column display', 'kutetheme' )
        // ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Column", 'kutetheme'),
            "param_name"  => "number_column",
            "admin_label" => true,
            'std'         => 4,
            'value'       => array(
                __( '2 Column', 'kutetheme' ) => '2',
                __( '3 Column', 'kutetheme' ) => '3',
                __( '4 Column', 'kutetheme' ) => '4',
            ),
            "dependency"  => array("element" => "tabs_type","value" => array('tab-2','tab-3','tab-4','tab-6','tab-7')),
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Tabs Type", 'kutetheme'),
            "param_name"  => "tabs_type",
            "admin_label" => true,
            'std'         => 'tab-1',
            'value'       => array(
        		__( 'Tab 1', 'kutetheme' ) => 'tab-1',
                __( 'Tab 2', 'kutetheme' ) => 'tab-2',
                __( 'Tab 3', 'kutetheme' ) => 'tab-3',
                __( 'Tab 4', 'kutetheme' ) => 'tab-4',
                __( 'Tab 5', 'kutetheme' ) => 'tab-5',
                __( 'Tab 6', 'kutetheme' ) => 'tab-6',
                __( 'Tab 7', 'kutetheme' ) => 'tab-7',
        	),
        ),
        
        array(
            "type"        => "kt_categories",
            "heading"     => __("Choose Category", 'kutetheme'),
            "param_name"  => "category",
            "admin_label" => true,
        ),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Left', 'js_composer' )  => 'left',
                __( 'Right', 'js_composer' ) => 'right',
                
            ),
            'heading'     => __( 'Align', 'kutetheme' ),
            'param_name'  => 'align',
            'admin_label' => false,
            "dependency"  => array("element" => "tabs_type","value" => array('tab-6')),
		),
        
        array(
            "type"        => "kt_number",
            "heading"     => __("The items subcategory on per slide", 'kutetheme'),
            "param_name"  => "number_slide",
            "value"       => "14",
            "suffix"      => __("subcategory", 'kutetheme'),
            "description" => __('The number of items subcategory on per slide', 'kutetheme'),
            'admin_label' => false,
            "dependency"  => array("element" => "tabs_type","value" => array('tab-6')),
	  	),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Main Color", 'kutetheme'),
            "param_name"  => "main_color",
            "admin_label" => true,
        ),
        
        array(
            'type'        => 'attach_image',
            'heading'     => __( 'Icon', 'kutetheme' ),
            'param_name'  => 'icon',
            "dependency"  => array("element" => "tabs_type","value" => array('tab-1', 'tab-2', 'tab-3', 'tab-4', 'tab-5', 'tab-6')),
            'description' => __( 'Setup icon for the tab', 'kutetheme' )
    	),
        
        array(
            'type'        => 'attach_image',
            'heading'     => __( 'Background Image', 'kutetheme' ),
            'param_name'  => 'bg_cate',
            "dependency"  => array("element" => "tabs_type", "value" => array( 'tab-2', 'tab-3', 'tab-4', 'tab-5', 'tab-6' )),
            'description' => __( 'Setup background for box', 'kutetheme' )
    	),
        array(
            'type'        => 'attach_images',
            'heading'     => __( 'Banner top', 'kutetheme' ),
            'param_name'  => 'banner_top',
            "dependency"  => array("element" => "tabs_type","value" => array('tab-1')),
            'description' => __( 'Setup image on  top of the tab', 'kutetheme' )
    	),
        
        array(
            'type'        => 'attach_images',
            'heading'     => __( 'Banner left', 'kutetheme' ),
            'param_name'  => 'banner_left',
            "dependency"  => array("element" => "tabs_type","value" => array('tab-1', 'tab-2', 'tab-3', 'tab-4', 'tab-5', 'tab-6', 'tab-7')),
            'description' => __( 'Setup image on  left of the tab', 'kutetheme' )
    	),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'No', 'js_composer' )  => false,
                __( 'Yes', 'js_composer' ) => true,
            ),
            'heading'     => __( 'Enable AJAX', 'kutetheme' ),
            'param_name'  => 'ajax',
            'admin_label' => true,
		),
        array(
            'type'        => 'checkbox',
            'heading'     => __( 'Featured', 'kutetheme' ),
            'param_name'  => 'featured',
            "dependency"  => array("element" => "tabs_type", "value" => array('tab-1')),
            'description' => __( 'Setup image on  left of the tab', 'kutetheme' ),
            'value'       => array( __( 'Yes', 'kutetheme' ) => 'yes' )
    	),
        
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'CSS Animation', 'js_composer' ),
            'param_name'  => 'css_animation',
            'admin_label' => false,
            'value'       => array(
                __( 'No', 'js_composer' )                 => '',
                __( 'Top to bottom', 'js_composer' )      => 'top-to-bottom',
                __( 'Bottom to top', 'js_composer' )      => 'bottom-to-top',
                __( 'Left to right', 'js_composer' )      => 'left-to-right',
                __( 'Right to left', 'js_composer' )      => 'right-to-left',
                __( 'Appear from center', 'js_composer' ) => "appear"
        	),
        	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'js_composer' )
        ),
        
        // Carousel
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'heading'     => __( 'AutoPlay', 'kutetheme' ),
            'param_name'  => 'autoplay',
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'heading'     => __( 'Navigation', 'kutetheme' ),
            'param_name'  => 'navigation',
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'kutetheme' ),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Loop', 'kutetheme' ),
            'param_name'  => 'loop',
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'kutetheme' ),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            "type"        => "kt_number",
            "heading"     => __("Slide Speed", 'kutetheme'),
            "param_name"  => "slidespeed",
            "value"       => "250",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("Margin", 'kutetheme'),
            "param_name"  => "margin",
            "value"       => "0",
            "suffix"      => __("px", 'kutetheme'),
            "description" => __('Distance( or space) between 2 item', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'heading'     => __( 'Use Carousel Responsive', 'kutetheme' ),
            'param_name'  => 'use_responsive',
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'kutetheme' ),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on destop (Screen resolution of device >= 992px )", 'kutetheme'),
            "param_name"  => "items_destop",
            "value"       => "4",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on tablet lanscape (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
            "param_name"  => "items_tablet",
            "value"       => "3",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on tablet portrait (Screen resolution of device >=480px and < 768px )", 'kutetheme'),
            "param_name"  => "items_tablet_portrait",
            "value"       => "2",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'kutetheme'),
            "param_name"  => "items_mobile",
            "value"       => "1",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The numbers of item on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            'type'        => 'css_editor',
            'heading'     => __( 'Css', 'js_composer' ),
            'param_name'  => 'css',
            'group'       => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
		),
        
    ),
    "js_view" => 'VcColumnView'
));
vc_map( array(
    "name"            => __("Section Tab", 'kutetheme'),
    "base"            => "tab_section",
    "content_element" => true,
    "as_child"        => array('only' => 'categories_tab'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params"          => array(
        // add params same as with any other content element
        array(
            "type"        => "textfield",
            "heading"     => __( "Header", 'kutetheme' ),
            "param_name"  => "header",
            "admin_label" => true,
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Section Type", 'kutetheme'),
            "param_name"  => "section_type",
            "admin_label" => true,
            'std'         => 'best-seller',
            'value'       => array(
        		__( 'Best Sellers', 'kutetheme' ) => 'best-seller',
                __( 'Most Reviews', 'kutetheme' ) => 'most-review',
                __( 'New Arrivals', 'kutetheme' ) => 'new-arrival',
                __( 'On Sales', 'kutetheme' )     => 'on-sales',
                __( 'By Ids', 'kutetheme' )       => 'by-ids',
                __( 'Category', 'kutetheme' )     => 'category',
                __( 'Custom', 'kutetheme' )       => 'custom'
        	),
        ),
        
        array(
            "type"        => "kt_categories",
            "heading"     => __("Choose Category", 'kutetheme'),
            "param_name"  => "section_cate",
            "admin_label" => false,
            "dependency"  => array("element" => "section_type", "value" => array('category')),
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order by", 'kutetheme'),
            "param_name" => "orderby",
            "value"      => array(
                __('None', 'kutetheme')       => 'none',
                __('ID', 'kutetheme')         => 'ID',
                __('Author', 'kutetheme')     => 'author',
                __('Name', 'kutetheme')       => 'name',
                __('Date', 'kutetheme')       => 'date',
                __('Modified', 'kutetheme')   => 'modified',
                __('Rand', 'kutetheme')       => 'rand',
                __('Sale Price', 'kutetheme') => '_sale_price'
        	),
            'std'         => 'date',
            "description" => __("Select how to sort retrieved posts.",'kutetheme'),
            "dependency"  => array("element" => "section_type", "value" => array('custom', 'on-sales', 'category')),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Ids", 'kutetheme' ),
            "param_name"  => "ids",
            "admin_label" => true,
            "description" => __("Get product by list ids.( Input IDs which separated by a comma ',' )",'kutetheme'),
            "dependency"  => array("element" => "section_type", "value" => array( 'by-ids' ) ),
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order", 'kutetheme'),
            "param_name" => "order",
            "value"      => array(
                __('ASC', 'kutetheme')  => 'ASC',
                __('DESC', 'kutetheme') => 'DESC'
        	),
            'std'         => 'DESC',
            "description" => __("Designates the ascending or descending order.",'kutetheme'),
            "dependency"  => array("element" => "section_type", "value" => array('custom', 'on-sales', 'category')),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
    )
) );
class WPBakeryShortCode_Categories_Tab extends WPBakeryShortCodesContainer {
    public $product_size = 'kt_shop_catalog_214';
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'categories_tab', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'          => 'Tabs Name',
            'size'           => 'kt_shop_catalog_214',
            'tabs_type'      => 'tab-1',
            'per_page'       => 6,
            'number_column'  => 4,
            'category'       => 0,
            'term_link'     => '',
            'main_color'     => '#ff3366',
            'icon'           => '',
            'bg_cate'        => '',
            'banner_top'     => '',
            'banner_left'    => '',
            "featured"       => false,
            
            'ajax'           => false,
            
            "align"          => 'left',
            "number_slide"   => 14,
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 0,
            'slidespeed'     => 250,
            'css'            => '',
            'css_animation'  => '',
            'el_class'       => '',
            'nav'            => 'true',
            'loop'           => 'false',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 4,
            'items_tablet'   => 3,
            'items_tablet_portrait' => 2,
            'items_mobile'   => 1,
        ), $atts ) );
        
        global $woocommerce_loop;

        $this->product_size = $size;
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' box-tab-category ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        if( function_exists( 'kt_hex2rgb' )){
            $main_color_rgb = kt_hex2rgb($main_color);
        }else{
            $main_color_rgb = array( 'red' => 255, 'green' => 51, 'blue' => 102 );
        }
        
        $elementClass = apply_filters( 'kt_category_tab_class_container', $elementClass );
        
        $tabs = kt_get_all_attributes( 'tab_section', $content );
       
        if( isset( $bg_cate ) && $bg_cate ): 
            $att_bg = wp_get_attachment_image_src( $bg_cate , 'full' );  
            $att_bg_url =  is_array($att_bg) ? esc_url($att_bg[0]) : ""; 
            if( $att_bg_url ){
                $style = "style='background: #fff url(".$att_bg_url.") no-repeat left bottom;'";
            }
        endif; 
        
        $data_carousel = array(
            "autoplay"      => $autoplay,
            "navigation"    => $navigation,
            "margin"        => $margin,
            "smartSpeed"    => $slidespeed,
            "theme"         => 'style-navigation-bottom',
            "autoheight"    => 'false',
            'nav'           => $navigation,
            'dots'          => 'false',
            'loop'          => $loop,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
        
        if( $use_responsive){
            $arr = array(
                '0' => array(
                    "items" => $items_mobile
                ), 
                '480' => array(
                    "items" => $items_tablet_portrait
                ), 
                '768' => array(
                    "items" => $items_tablet
                ), 
                '992' => array(
                    "items" => $items_destop
                )
            );
            $data_responsive = json_encode($arr);
            $data_carousel["responsive"] = $data_responsive;
        }else{
            if( $product_column > 0 )
                $data_carousel['items'] =  $product_column;
        }
        
        
        if( count( $tabs ) > 0 ):
            $id = uniqid($category);
            $term = get_term( $category, 'product_cat' );
            
            if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/includes/'.$tabs_type.'.php' ) ){
                
                $args = array(
                   'hierarchical'     => 1,
                   'show_option_none' => '',
                   'hide_empty'       => 0,
                   'taxonomy'         => 'product_cat'
                );
                
                if( ! is_wp_error( $term ) && $term ){
                    $args [ 'parent' ] = $term->term_id;
                    $term_link = get_term_link( $term );
                }else{
                    $term = false;
                }
                if( ! kt_is_mobile() ){
                    $subcats = get_categories($args);
                }
                if( $tabs_type == 'tab-1' ){
                    $elementClass .= ' option1 tab-1';
                }elseif( $tabs_type == 'tab-2' ){
                    $elementClass .= ' option2 tab-2';
                }elseif( $tabs_type == 'tab-3' ){
                    $elementClass .= ' option2 tab-3';
                }elseif( $tabs_type == 'tab-4' ){
                    $elementClass .= ' option2 tab-4';
                }elseif( $tabs_type == 'tab-5' ){
                    $elementClass .= ' option2 tab-5';
                }elseif( $tabs_type == 'tab-6' ){
                    $elementClass .= ' option7 tab-6';
                }elseif( $tabs_type == 'tab-7' ){
                    $elementClass .= ' option12 tab-7';
                }
                ob_start();
                add_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
                @include( KUTETHEME_PLUGIN_PATH . 'js_composer/includes/'.$tabs_type.'.php' );
                remove_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
                return ob_get_clean();
            }
        endif;
    }
    public function get_size_product( $size ){
        return $this->product_size;
    }
    public function get_size_product_option_3( $size ){
        return 'kt_shop_catalog_131';
    }
}

function generate_tabs($id, $term_id = 0, $per_page = 5, $tabs = array(), $ajax = false, $tabs_type = "tab-1", $banner_left='', $column = 4 ){
    foreach( $tabs as $i => $tab ): $class = "tab-nav"; ?>
        <?php
            extract( shortcode_atts( array(
                'header'       => 'Section Name',
                'section_type' => 'best-seller',
                'section_cate' => 0,
                'orderby'      => 'date',
                'order'        => 'DESC',
                'ids'          => ''
            ), $tab ) );
        ?>
        <?php if( $i == 0 ): $class .= ' active'; endif; ?>
        <?php if( $ajax ): ?>
            <?php if( $i != 0 ): $class .= ' enable_ajax'; endif; ?>
            <li class="<?php echo esc_attr( $class ) ?>" data-number_column="<?php echo esc_attr($column); ?>" data-bannerleft="<?php echo esc_attr( $banner_left ) ?>" data-per_page="<?php echo esc_attr( $per_page ) ?>" data-tabs_type="<?php echo esc_attr( $tabs_type ); ?>" data-affect="<?php echo 'tab-' . $id . '-' . $i; ?>" data-section_type="<?php echo esc_attr( $section_type ) ?>" data-ids="<?php echo esc_attr( $ids ) ?>" data-order="<?php echo esc_attr( $order ) ?>" data-orderby="<?php esc_attr( $orderby ) ?>"  data-section_cate="<?php echo esc_attr( $section_cate ) ?>" data-term="<?php echo esc_attr( $term_id ) ?>">
        <?php else: ?>
            <li class="<?php echo esc_attr( $class ) ?>">
        <?php endif; ?>
            <a data-toggle="tab" href="<?php echo '#tab-' . $id . '-' . $i; ?>">
                <?php
                    if(isset( $header ) && $header ){
                        echo esc_html( $header );
                    }elseif( isset($section_type) && $section_type == 'new-arrival' ){
                        _e( 'New Arrivals', 'kutetheme' );
                    }elseif( $section_type == 'most-review' ){
                        _e( 'Most Reviews', 'kutetheme' );
                    }elseif( $section_type == 'on-sales' ){
                        _e( 'On sales', 'kutetheme' );
                    }elseif( $section_type == 'by-ids' ){
                        _e( 'Tab', 'kutetheme' );
                    }elseif( $section_type == 'category' && isset( $section_cate ) && intval( $section_cate ) >0 ){
                        $child_term = get_term( $section_cate, 'product_cat' );
                        if($child_term){
                            echo esc_html( $child_term->name );
                        }else{
                            _e( "Best Sellers", 'kutetheme' );
                        }
                    }else{
                       _e( "Best Sellers", 'kutetheme' );
                    }
                 ?>
            </a>
        </li>
    <?php
    endforeach;
}

add_action( 'wp_ajax_kt_load_tab_section', 'kt_ajax_load_tab_section' );
add_action( 'wp_ajax_nopriv_kt_load_tab_section', 'kt_ajax_load_tab_section' );

/**
 * Handle request then generate response using WP_Ajax_Response
 * 
*/

function kt_ajax_load_tab_section() {
    $tab = $_REQUEST['data'];
    
    $meta_query = WC()->query->get_meta_query();
    $products = kt_products( $tab, $tab['term'], $meta_query, $tab['per_page'] );
    if( ! shortcode_exists( 'yith_compare_button' ) ){
        if( class_exists( 'YITH_Woocompare_Frontend' ) ){
            $yith_compare = new YITH_Woocompare_Frontend();
            add_shortcode( 'yith_compare_button', array( $yith_compare , 'compare_button_sc' ) );
        }
    }
    if( isset( $tab[ 'tabs_type' ] ) ){
        if( ! isset( $tab['affect'] ) ){
            $tab['affect'] = "";
        }
        if( ! isset( $tab['number_column'] ) ){
            $tab['number_column'] = 4;
        }

        if( $tab[ 'tabs_type' ] == 'tab-7' ){
            kt_template_tab_7( $products, $tab['affect'], "active" , $tab['number_column']);
        }elseif( $tab[ 'tabs_type' ] == 'tab-6' ){
            kt_template_tab_6( $products, $tab['affect'], "active" , $tab['number_column']);
        }elseif( $tab[ 'tabs_type' ] == 'tab-5' ){
            kt_template_tab_5( $products, $tab['number_column'], $tab['affect'], "active" );
        }elseif( $tab[ 'tabs_type' ] == 'tab-4' ){
            kt_template_tab_4( $products, $tab['number_column'], $tab['affect'], "active" );
        }elseif( $tab[ 'tabs_type' ] == 'tab-2' || $tab[ 'tabs_type' ] == 'tab-3' ){
            kt_template_tab_2( $products,  $tab['number_column'], $tab['affect'], "active" );
        }else{
            kt_template_tab_1( $products, $tab['affect'], "active");
        }
    }
    die();
}
function kt_template_tab_1( $products, $id, $class = "" ){
    if ( $products->have_posts() ) : ?>
        <!-- tab product -->
        <div class="tab-panel <?php echo esc_attr( $class ) ?>" id="<?php echo esc_attr( $id ) ?>">
            <ul class="product-list on-carousel">
                <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    <?php wc_get_template_part( 'content', 'product-tab' ); ?>
                <?php endwhile; // end of the loop. ?>
            </ul>
        </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata();
}
function kt_template_tab_2( $products, $column = 4, $id = "", $class = "" ){
    if ( $products->have_posts() ) : ?>
        <?php
        $columns_class = array();
        $bostrap_class_col =  round(12/$column);
        $columns_class[] = 'col-md-'.$bostrap_class_col;
        ?>
        <div class="tab-panel <?php echo esc_attr( $class ) ?>" id="<?php echo esc_attr( $id ) ?>">
            <div class="container-products">
                <?php if( kt_is_mobile() ): ?>
                    <ul class="product-list on-carousel">
                <?php else: ?>
                    <ul class="product-list row product-columns columns-<?php echo esc_attr( $column )?>">
                <?php endif; ?>                                   
                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                        <li style="clear: none" class="product-item <?php if( ! kt_is_mobile() ): ?> <?php echo esc_attr( implode(' ', $columns_class) );?><?php endif; ?>" style="clear: none">
                            <?php wc_get_template_part( 'content', 'product-tab2' ); ?>
                        </li>
                    <?php endwhile; // end of the loop. ?>
               </ul>
           </div>
        </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata();
}

function kt_template_tab_4( $products, $column = 3, $id = "", $class = "" ){
    if ( $products->have_posts() ) :?>
        <!-- tab product -->
        <?php
        $columns_class = array();
        $bostrap_class_col =  round(12/$column);
        $columns_class[] = 'col-md-'.$bostrap_class_col;
        ?>
        <div class="tab-panel <?php echo esc_attr( $class ) ?>" id="<?php echo esc_attr( $id ) ?>">
           <div class="row">
                <div class="col-sm-12 category-list-product">
                    <?php if( kt_is_mobile() ): ?>
                        <ul class="product-list on-carousel">
                    <?php else: ?>
                        <ul class="product-list row product-columns columns-<?php echo esc_attr($column);?> ">                                    
                    <?php endif; ?>  
                        <?php while( $products->have_posts() ): $products->the_post(); ?>
                            <li style="clear: none" class="product-item<?php if( ! kt_is_mobile() ): ?> <?php echo esc_attr( implode(' ', $columns_class) );?><?php endif; ?>">
                                <?php wc_get_template_part( 'content', 'product-tab2' ); ?>
                            </li>
                        <?php endwhile; // end of the loop. ?>
                    </ul>
                </div>
           </div>
        </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata();
}

function kt_template_tab_5( $products, $column = 3, $id = "", $class = "" ){
    if ( $products->have_posts() ) : ?>
        <?php
        $columns_class = array();
        $bostrap_class_col =  round(12/$column);
        $columns_class[] = 'col-md-'.$bostrap_class_col;
        ?>
        <div class="tab-panel <?php echo esc_attr( $class ) ?>" id="<?php echo esc_attr( $id ) ?>">
            <div class="box-right">
                <?php if( kt_is_mobile() ): ?>
                    <ul class="product-list on-carousel">
                <?php else: ?>
                    <ul class="product-list columns-<?php echo esc_attr($column);?>">                                    
                <?php endif; ?>                         
                    <?php  while ( $products->have_posts() ) : $products->the_post(); ?>
                        <li style="clear: none" class="<?php if( ! kt_is_mobile() ): ?> <?php //echo esc_attr( implode(' ', $columns_class) );?> item-20 <?php else: ?>item-product<?php endif; ?>">
                            <?php wc_get_template_part( 'content', 'product-tab2' ); ?>
                        </li>
                    <?php endwhile; // end of the loop. ?>
               </ul>
           </div>
        </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata();
}
function kt_template_tab_6( $products, $id = "", $class = "",$columns = 4 ){
    if ( $products->have_posts() ) :?>
        <!-- tab product -->
        <div class="tab-panel <?php echo esc_attr( $class ) ?>" id="<?php echo esc_attr( $id ) ?>">
            <ul class="<?php if( kt_is_mobile() ): ?>product-list on-carousel <?php endif; ?>products autoHeight columns-<?php echo esc_attr($columns);?>">
                <?php while ( $products->have_posts() ) : $products->the_post();?>
                    <li class="product autoHeight-item">
                        <?php wc_get_template_part( 'content', 'product-tab6' ); ?>
                    </li>
                <?php endwhile; // end of the loop. ?>
            </ul>
        </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata(); 
}
function kt_template_tab_7( $products, $id = "", $class = "",$columns = 3 ){
    $list_class = array('tab-products product-list'); 
    $list_class[] = 'columns-'.$columns;
    if ( $products->have_posts() ) :?>
        <div id="<?php echo esc_attr( $id ) ?>" class="tab-panel <?php echo esc_attr( $class ) ?>" >
            <ul class="<?php echo esc_attr( implode(' ', $list_class) );?>">
                <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    <li class="product-style3">
                        <?php wc_get_template_part( 'content', 'product-tab12' ); ?>
                    </li>
                <?php endwhile; // end of the loop. ?>
            </ul>
        </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata();
}
/**
 * Execute query to get product
 * 
 * @param $tab array all the setting of section tab
 * @param $term int term_id tab
 * @param $meta_query array default empty array
 * @param $per_page int default 5
 * @param $atts array shortcode setting default empty array
 * @return $products array
 * */
function kt_products( $tab , $term, $meta_query = array(), $per_page = 5, $atts = array() ){             
    $newargs = array(
		'post_type'				=> 'product',
		'post_status'			=> 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' 		=> $per_page,
		'meta_query' 			=> $meta_query,
        'suppress_filter'       => true
	);
    if( $term ){
        $newargs [ 'tax_query' ] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $term,
                'operator' => 'IN'
            )
        );
    }
    extract( shortcode_atts( array(
        'header'       => 'Section Name',
        'section_type' => 'best-seller',
        'section_cate' => 0,
        'orderby'      => 'date',
        'order'        => 'DESC',
        'ids'          => ''
    ), $tab ) );
    
    if( $section_type == 'new-arrival' ){
        $newargs['orderby'] = 'date';
        $newargs['order'] 	 = 'DESC';
    }elseif( $section_type == 'on-sales' ){
        $product_ids_on_sale = wc_get_product_ids_on_sale();
        $newargs['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
        
        if( $orderby == '_sale_price' ){
            $orderby = 'date';
            $order   = 'DESC';
        }
        $newargs['orderby'] = $orderby;
        $newargs['order'] 	= $order;
    }elseif( $section_type == 'custom' ){
        if( $orderby == '_sale_price' ){
            $newargs['meta_query'] = array(
                'relation' => 'OR',
                array( // Simple products type
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                ),
                array( // Variable products type
                    'key'           => '_min_variation_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            );
        }else{
            $newargs['orderby'] = $orderby;
            $newargs['order'] 	= $order;
        }
    }elseif( $section_type == 'most-review'){
        add_filter( 'posts_clauses', 'kt_order_by_rating_post_clauses' );
    }elseif( $section_type == 'category' && intval( $tab['section_cate'] ) > 0 ){
        $chil_term = get_term( $section_cate, 'product_cat' );
        if( $chil_term ){
            $newargs['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    => $chil_term->term_id,
                    'operator' => 'IN'
                ),
            );
        }
        if( $orderby == '_sale_price' ){
            $newargs['meta_query'] = array(
                'relation' => 'OR',
                array( // Simple products type
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                ),
                array( // Variable products type
                    'key'           => '_min_variation_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            );
        }else{
            $newargs['orderby'] = $orderby;
            $newargs['order'] 	= $order;
        }
    }elseif( $section_type == 'by-ids' && $ids ){
        $newargs['post__in'] = explode( ',', $ids );
        $newargs['orderby'] = 'post__in';
    }else{
        $newargs['meta_key'] = 'total_sales';
        $newargs['orderby']  = 'meta_value_num';
    }
    $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $newargs, $atts ) );
    
    if( $section_type == 'most-review'){
        remove_filter( 'posts_clauses', 'kt_order_by_rating_post_clauses' );
    }
    return $products;
}
function kt_products_on_sale_in_category( $term_id = 0 ){
    $deal_args = array(
    	'posts_per_page'    => 5,
        'post_type'         => 'product',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'no_found_rows' 	=> 1,
    	'post_status' 		=> 'publish',
    	'meta_query' 		=> $meta_query,
    	'post__in'			=> array_merge( array( 0 ), $product_ids_on_sale )
    );
    if( $term_id ){
        $deal_args [ 'tax_query' ] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $term_id,
                'operator' => 'IN'
            )
        );
    }
    $deal_product = new WP_Query( $deal_args );
    if( $deal_product->have_posts() ){
        //add_filter( 'kt_template_loop_product_thumbnail_size', array( $this, 'kt_thumbnail_size_131x160' ) );
        while($deal_product->have_posts()): $deal_product->the_post();
            wc_get_template_part( 'content', 'tab-category-deal' );
        endwhile;
    }
}
/**
 * order_by_rating_post_clauses function.
 *
 * @access public
 * @param array $args
 * @return array
 */
function kt_order_by_rating_post_clauses( $args ) {
	global $wpdb;

	$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating ";

	$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";

	$args['join'] .= "
		LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
		LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
	";

	$args['orderby'] = "average_rating DESC, $wpdb->posts.post_date DESC";

	$args['groupby'] = "$wpdb->posts.ID";

	return $args;
}
