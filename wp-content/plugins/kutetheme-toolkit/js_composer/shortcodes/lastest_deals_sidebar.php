<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Setting shortcode lastest
vc_map( array(
    "name"        => __( "Lastest Deals", 'kutetheme'),
    "base"        => "lastest_deals_sidebar",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Show lastest deal products in sidebar", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
            'description' => __( 'Display title lastest deal box, It\'s hidden when empty', 'kutetheme' )
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Product Size", 'kutetheme'),
            "param_name"  => "size",
            "value"       => $product_thumbnail,
            'std'         => 'kt_shop_catalog_248',
            "description" => __( "Product size", 'kutetheme' ),
        ),
        array(
            "type"        => "dropdown",
        	"heading"     => __("Type", 'kutetheme'),
        	"param_name"  => "type",
            "admin_label" => true,
            'std'         => 'style-1',
            'value'       => array(
        		__( 'Style 1', 'kutetheme' )    => 'style-1',
                __( 'Style 2', 'kutetheme' )    => 'style-2',
        	),
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Countdown Color", 'kutetheme'),
            "param_name"  => "countdown_color",
            "admin_label" => true,
            "dependency"  => array("element" => "type","value" => array( 'style-2' )),
        ),
        array(
            "type"        => "kt_taxonomy",
            "taxonomy"    => "product_cat",
            "class"       => "",
            "heading"     => __("Category", 'kutetheme'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => 0,
            'multiple'    => true,
            'placeholder' => __('Choose categoy', 'kutetheme'),
            "description" => __("Note: Selected categories will be hide if it empty. Only selected categories will be displayed.", 'kutetheme')
        ),
        array(
            "type"        => "kt_number",
            "heading"     => __("Number Product", 'kutetheme'),
            "param_name"  => "number",
            "value"       => 12,
            "description" => __("Enter number of Product", 'kutetheme')
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order by", 'kutetheme'),
            "param_name" => "orderby",
            "value"      => array(
        		__('None', 'kutetheme')     => 'none',
                __('ID', 'kutetheme')       => 'ID',
                __('Author', 'kutetheme')   => 'author',
                __('Name', 'kutetheme')     => 'name',
                __('Date', 'kutetheme')     => 'date',
                __('Modified', 'kutetheme') => 'modified',
                __('Rand', 'kutetheme')     => 'rand',
        	),
            'std'         => 'date',
            "description" => __("Select how to sort retrieved posts.",'kutetheme')
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
            "description" => __("Designates the ascending or descending order.",'kutetheme')
        ),
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' )
		),
        
        // Carouse
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'AutoPlay', 'kutetheme' ),
            'param_name'  => 'autoplay',
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Navigation', 'kutetheme' ),
            'param_name'  => 'navigation',
            'description' => __( "Show buton 'next' and 'prev' buttons.", 'kutetheme' ),
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
            "value"       => "200",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'kutetheme' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
        )
    )
));
class WPBakeryShortCode_Lastest_Deals_Sidebar extends WPBakeryShortCode {
    public $product_size = 'kt_shop_catalog_248';
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'lastest_deals_sidebar', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'         => '',
            'size'          => 'kt_shop_catalog_248',
            'type'          => 'style-1',
            'countdown_color' => '#ff3366',
            'taxonomy'      => '',
            'number'        => 12,
            //Carousel            
            'autoplay'      => "false",
            'navigation'    => "false",
            'slidespeed'    => 250,
            'loop'          => "false",
            'items'         => 1,
            
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            
        ), $atts );
        extract($atts);
        
        $this->product_size = $size;
        
        if( ! $countdown_color ){
            $countdown_color = '#ff3366';
        }
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'latest-deals ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $elementClass = apply_filters( 'kt_lastest_deals_sidebar_class_container', $elementClass );
        
        // Get products on sale
		$product_ids_on_sale = wc_get_product_ids_on_sale();

		$meta_query = WC()->query->get_meta_query();
        
        $args = array(
			'posts_per_page' => $number,
            'post_type'      => 'product',
            'orderby'        => 'meta_value_num',
            'meta_key'       => '_sale_price_dates_to',
            'order'          => 'DESC',
            'no_found_rows'  => 1,
			'post_status' 	 => 'publish',
			'meta_query' 	 => $meta_query,
			'post__in'		 => array_merge( array( 0 ), $product_ids_on_sale )
		);
        if($taxonomy){
            $args['tax_query'] = 
                array(
            		array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'id',
                        'terms'    => explode( ",", $taxonomy )
            		)
                );
        }
        
        $q = apply_filters( 'woocommerce_shortcode_products_query', $args, $atts );
        
        $query = new WP_Query( $q );
        
        global $woocommerce_loop;
        
        ob_start();
        add_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
        
        if ( $query->have_posts() ) :
            $data_carousel = array(
                "autoplay"           => $autoplay,
                "navigation"         => $navigation,
                "smartSpeed"         => $slidespeed,
                "autoheight"         => "false",
                "loop"               => $loop,
                "dots"               => "false",
                'nav'                => $navigation,
                "autoplayTimeout"    => 1000,
                "autoplayHoverPause" => "true",
                'items'              => 1,
            );
            add_filter("woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
            add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
            if( $type == 'style-1' ):
            ?>
            <div class="<?php echo esc_attr( $elementClass ); ?>">
                <h2 class="latest-deal-title"><?php echo esc_html( $title ); ?></h2>
                <div class="latest-deal-content">
                    <ul class="product-list owl-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                        <?php
                            add_filter("woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
            				while ( $query->have_posts() ) : $query->the_post();
            					wc_get_template_part( 'content', 'product-sidebar' );
            				endwhile; // end of the loop.
                            remove_filter("woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            else:
            remove_action( 'kt_loop_product_function', 'kt_get_tool_quickview' );
            ?>
            <div class="block-hotdeal-week option12 <?php echo esc_attr( $elementClass ); ?>" data-color="<?php echo esc_attr( $countdown_color ) ?>">
                <div class="title"><?php echo esc_html( $title ); ?></div>
                <div class="inner">
                    <ul class="hotdeal-product owl-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <li class="product">
                                <?php wc_get_template_part( 'content', 'product-sidebar-2' ); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <?php
            add_action( 'kt_loop_product_function_quickview' , 'kt_get_tool_quickview', 10);
            endif;
            remove_filter( "woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
            remove_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
        endif;
        
        remove_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
        wp_reset_postdata();
        wp_reset_query();
        $result = ob_get_contents();
        ob_clean();
        return $result;
    }
    
    public function get_size_product( $size ){
        return $this->product_size;
    }
}