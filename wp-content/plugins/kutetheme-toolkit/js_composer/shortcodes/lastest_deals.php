<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map( array(
    "name"        => __( "Lastest Deal Products Carousel", 'kutetheme'),
    "base"        => "lastest_deal_products",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "List lastest deal product are display by owl carousel", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
            'description' => __( 'It displays title list product', 'kutetheme' )
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
            "description" => __("Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'kutetheme')
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Product Size", 'kutetheme'),
            "param_name"  => "size",
            "value"       => $product_thumbnail,
            'std'         => 'kt_shop_catalog_204',
            "description" => __( "Product size", 'kutetheme' ),
            "admin_label" => true,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Number Product", 'kutetheme'),
            "param_name"  => "number",
            "value"       => 12,
            "description" => __("Enter number of Product", 'kutetheme')
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Product per columns", 'kutetheme'),
            "param_name"  => "product_column",
            "value"       => 3,
            "description" => __("Enter number product on columns", 'kutetheme')
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
                __('Rand', 'kutetheme')     => 'rand',/*
                __('Regular Price', 'kutetheme') => '_regular_price',
                __('Sale Price', 'kutetheme') => '_sale_price',*/
        	),
            'std'         => 'date',
            "description" => __("Select how to sort retrieved posts.",'kutetheme'),
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
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'kutetheme' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
        ),
        // Carousel
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
            'group'       => __( 'Carousel settings', 'kutetheme' )
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("Margin", 'kutetheme'),
            "param_name"  => "margin",
            "value"       => "30",
            "suffix"      => __("px", 'kutetheme'),
            "description" => __('Distance( or space) between 2 item', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' )
	  	),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'std'         => 1,
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
            "value"       => "3",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of item on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' )
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
            "param_name"  => "items_tablet",
            "value"       => "2",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of item on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' )
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'kutetheme'),
            "param_name"  => "items_mobile",
            "value"       => "1",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of item on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' )
	  	),
        
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'kutetheme' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'kutetheme' )
		)
    )
));
class WPBakeryShortCode_Lastest_Deal_Products extends WPBakeryShortCode {
    public $product_size = 'kt_shop_catalog_204';
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'lastest_deal_products', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'          => '&nbsp;',
            'taxonomy'       => '',
            'size'           => 'kt_shop_catalog_204',
            'number'         => 10,
            'product_column' => 5,
            'orderby'        => 'date',
            'order'          => 'DESC',
            //Carousel            
            'autoplay'       => '', 
            'navigation'     => '',
            'margin'         => 10,
            'slidespeed'     => 200,
            'css'            => '',
            'el_class'       => '',
            'nav'            => "true",
            'loop'           => "false",
            //Default
            'use_responsive' => 1,
            'items_destop'   => 5,
            'items_tablet'   => 3,
            'items_mobile'   => 1,
            //
            'columns'        => 1,
        ), $atts );
        extract($atts);
        $this->product_size = $size;
        // Get products on sale
		$product_ids_on_sale = wc_get_product_ids_on_sale();
        
		$meta_query = WC()->query->get_meta_query();
        
        $args = array(
            'posts_per_page' => $number,
            'post_type'      => 'product',
            'order'          => $order,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'meta_query'     => $meta_query,
            'post__in'       => array_merge( array( 0 ), $product_ids_on_sale )
		);
        $args["orderby"] = $orderby;
        
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
        $query_product = new WP_Query( $q );
        global $woocommerce_loop, $post;
        $woocommerce_loop['columns'] = $columns;
        
        ob_start();
        if ( $query_product->have_posts() ) : 
            $data_carousel = array(
                "autoplay"      => $autoplay,
                "navigation"    => $navigation,
                "margin"        => $margin,
                "smartSpeed"    => $slidespeed,
                "loop"          => $loop,
                "theme"         => 'style-navigation-bottom',
                "autoheight"    => "false",
                'nav'           => $navigation,
                'dots'          => "false"
            );
            if( $use_responsive ) {
                $arr = array(
                    '0' => array(
                        "items" => $items_mobile
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
                
                if( ( $query_product->post_count <= 1  ) ){
                    $data_carousel['loop'] = 'false';
                }
                
            }else{
                if( $product_column > 0 )
                    $data_carousel['items'] =  $product_column;
                
                // if( ( $query_product->post_count <  $product_column ) ){
                //     $data_carousel['loop'] = 'false';
                // }else{
                //     $data_carousel['loop'] = $loop;
                // }
            }
            
            $elementClass = array(
                'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
            );
            $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        ?>
        <div class="<?php  echo esc_attr( $el_class ); ?>">
            <?php if( $title ): ?>
                <h2 class="page-heading">
                    <span class="page-heading-title"><?php echo esc_html( $title ); ?></span>
                </h2>
            <?php endif; ?>
            <div class="latest-deals-product container-data-time">
                <span class="count-down-time2">
                    <span class="icon-clock"></span>
                    <span class="text-end"><?php _e( 'end in', 'kutetheme' ); ?></span>
                    <span class="countdown-lastest stick-countdown"></span>
                </span>
                <ul class="product-list owl-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                     <?php
                        add_filter("woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
                        add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
                        add_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
                        $max = 0;
                        while ( $query_product->have_posts() ) : $query_product->the_post(); $id = get_the_ID(); global $post;  ?>
                            <?php $time = kt_get_max_date_sale( $id );
                            if( $time > $max ) {
                                $max = $time;
                            } ?>
                            <li>
        					   <?php wc_get_template_part( 'content', 'product-lastest-deal' );?>
                            </li>
                        <?php
        				endwhile; // end of the loop.
                        remove_filter( "woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
                        remove_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
                        remove_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
                     ?>
                </ul>
                <?php
                    if( $max > 0 ){
                        $y = date('Y',$max);
                        $m = date('m',$max);
                        $d = date('d',$max);
                        ?>
                        <input class="max-time" type="hidden" value="" data-y="<?php echo esc_attr( $y );?>" data-m="<?php echo esc_attr( $m );?>" data-d="<?php echo esc_attr( $d );?>" />
                        <?php
                    }
                    
                ?>
            </div>
        </div>
        <?php
        endif; wp_reset_postdata();
        wp_reset_query();
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    public function get_size_product( $size ){
        return $this->product_size;
    }
}