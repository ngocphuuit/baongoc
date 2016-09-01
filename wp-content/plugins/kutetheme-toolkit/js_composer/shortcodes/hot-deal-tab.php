<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name"                    => __( "Hot Deal Tab", 'kutetheme'),
    "base"                    => "hot_deal",
    "category"                => __('Kute Theme', 'kutetheme' ),
    "description"             => __( "Show tab hot deal", 'kutetheme'),
    "as_parent"               => array('only' => 'tab_sections'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
            'std'         => 'kt_shop_catalog_164',
            "description" => __( "Product size", 'kutetheme' ),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Number Post", 'kutetheme' ),
            "param_name"  => "per_page",
            'std'         => 5,
            "admin_label" => false,
            'description' => __( 'Number post in a slide', 'kutetheme' )
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Style", 'kutetheme'),
            "param_name"  => "style",
            "admin_label" => true,
            'std'         => 'style-1',
            'value'       => array(
        		__( 'Style 1', 'kutetheme' ) => 'style-1',
                __( 'Style 2', 'kutetheme' ) => 'style-2',
        	),
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
            "description" => __( "Designates the ascending or descending order.", 'kutetheme' )
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'CSS Animation', 'js_composer' ),
            'param_name'  => 'css_animation',
            'admin_label' => false,
            'value'       => array(
        		__( 'No', 'js_composer' ) => '',
        		__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
        		__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
        		__( 'Left to right', 'js_composer' ) => 'left-to-right',
        		__( 'Right to left', 'js_composer' ) => 'right-to-left',
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
            "value"       => "30",
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
            'admin_label' => false
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
			"heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
			"param_name"  => "items_tablet",
			"value"       => "3",
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
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
    ),
    "js_view" => 'VcColumnView'
));
vc_map( array(
    "name"            => __("Section Tab", 'kutetheme'),
    "base"            => "tab_sections",
    "content_element" => true,
    "as_child"        => array('only' => 'hot_deal'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params"          => array(
        // add params same as with any other content element
        array(
            "type"        => "textfield",
            "heading"     => __( "Header", 'kutetheme' ),
            "param_name"  => "header",
            "admin_label" => true,
        ),
        array(
			"type"        => "kt_number",
			"heading"     => __("Reduction from", 'kutetheme'),
			"param_name"  => "reduction_from",
			"value"       => "0",
            "suffix"      => __("%", 'kutetheme'),
			"description" => __('The reduction from', 'kutetheme'),
            'admin_label' => true,
	  	),
        array(
			"type"        => "kt_number",
			"heading"     => __("Reduction to", 'kutetheme'),
			"param_name"  => "reduction_to",
			"value"       => "0",
            "suffix"      => __("%", 'kutetheme'),
			"description" => __('The reduction to', 'kutetheme'),
            'admin_label' => true,
	  	)
    )
) );
class WPBakeryShortCode_Hot_Deal extends WPBakeryShortCodesContainer {
    public $product_size = 'kt_shop_catalog_164';
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'hot_deal', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'          => 'Tabs Name',
            'size'           => 'kt_shop_catalog_164',
            'per_page'       => 5,
            'taxonomy'       => 0,
            'orderby'        => 'date',
            'order'          => 'DESC',
            
            'style'         => 'style-1',
            
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'loop'           => 'false',
            'slidespeed'     => 250,
            'margin'         => 0,
            
            'css'            => '',
            'el_class'       => '',
            'nav'            => 'true',
            //Default
            'items_destop'   => 4,
            'items_tablet'   => 3,
            'items_mobile'   => 1,
            
            'use_responsive' => 1,
            'css_animation'  => '',
        ), $atts ) );
        
        global $woocommerce_loop;
        $this->product_size = $size;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' box-tab-category ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $meta_query = WC()->query->get_meta_query();
        
        $args = array(
			'post_type'			  => 'product',
			'post_status'		  => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' 	  => $per_page,
            'suppress_filter'     => true,
            'orderby'             => $orderby,
            'order'               => $order
		);
        
        if( $taxonomy ){
            $args['tax_query'] = 
                array(
            		array(
            			'taxonomy' => 'product_cat',
            			'field' => 'id',
            			'terms' => explode( ",", $taxonomy )
                	)
                );
        }
        $product_ids_on_sale = wc_get_product_ids_on_sale();
        
        $args['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
        
        $data_carousel = array(
            "autoplay"           => $autoplay,
            "navigation"         => $navigation,
            "margin"             => $margin,
            "smartSpeed"         => $slidespeed,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'nav'                => $navigation,
            'dots'               => 'false',
            'loop'               => $loop,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
        
        
        $tabs = kt_get_all_attributes( 'tab_sections', $content );
        if( count( $tabs ) >0 ) :
        $unique = uniqid();
        $new_title = array( 
            __( 'hot' ),
            __( 'deals' )
         );
        $charact = explode( ' ', $title );
        if( is_array( $charact ) && count( $charact ) > 1 ){
            $new_title = $charact;
        }
        ?>
        <?php ob_start(); ?>
        <div class="<?php if( $style == "style-1" ): ?> option3 <?php else: ?> option4 <?php endif; ?>">
            <!-- Hot deals -->
            <div class="hot-deals-row container-tab">
                <div class="hot-deals-box only_countdown">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="hot-deals-tab">
                                <div class="hot-deals-title vertical-text">
                                    <?php if( $title && strlen( $title ) > 0 ): $j = 1; ?>
                                        <?php for( $i = 0; $i < strlen( $title ); $i++ ): ?>
                                            <?php if( isset( $title[$i] ) ):  ?>
                                                <?php if( ! trim($title[$i]) ) $j++; ?>
                                                <span<?php echo " class='word-{$j}'" ?>><?php echo esc_html( $title[$i] ) ?></span>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="hot-deals-tab-box">
                                    <ul class="nav-tab">
                                        <?php $i = 1; ?>
                                            <?php foreach( $tabs as $tab ): 
                                                    extract( shortcode_atts( array(
                                                        'header'         => __( 'Tab name', 'kutetheme' ),
                                                        'reduction_from' => 0,
                                                        'reduction_to'   => 0,
                                                    ), $tab ) );
                                                ?>
                                              <li <?php if( $i ==1 ): ?> class="active" <?php endif; ?> ><a data-toggle="tab" href="#hotdeals-<?php echo $unique ?>-<?php echo $i; ?>"><?php echo $header; ?></a></li>
                                              <?php $i++; ?>
                                            <?php endforeach; ?>
                                    </ul>
                                    <div class="box-count-down">
                                        <span class="countdown-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 hot-deals-tab-content-col">
                            <div class="hot-deals-tab-content tab-container">
                                <?php $i = 1; ?>
                                <?php 
                                $max_time = 0;
                                foreach( $tabs as $tab ) :
                                    extract( shortcode_atts( array(
                                        'header'         => __( 'Tab name', 'kutetheme' ),
                                        'reduction_from' => 0,
                                        'reduction_to'   => 0,
                                    ), $tab ) );
                                    $meta   = $meta_query;
                                    $meta[] = array(
                                        'key' => '_reduction_percent',
                                        'value' => array(
                                            $reduction_from, 
                                            $reduction_to
                                        ),
                                        'compare' => 'BETWEEN'
                                    );
                                    
                                    $args['meta_query'] = $meta;
                                    $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                                    
                                    if( $products->have_posts() ):
                                    if($products->post_count <=1 ){
                                        $data_carousel['loop'] = 'false';
                                    }
                                    if( $use_responsive){
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
                                        
                                        // if( ( $products->post_count <  $items_mobile ) || ( $products->post_count <  $items_tablet ) || ( $products->post_count <  $items_destop ) ){
                                        //     $data_carousel['loop'] = 'false';
                                        // }else{
                                        //     $data_carousel['loop'] = $loop;
                                        // }
                                    }else{
                                        if( $items_destop =="" || $items_destop <= 0 ){
                                            $items_destop = 4;
                                        }
                                        $data_carousel['items'] =  $items_destop;
                                        
                                        // if( ( $products->post_count <  $items_destop ) ){
                                        //     $data_carousel['loop'] = 'false';
                                        // }else{
                                        //     $data_carousel['loop'] = $loop;
                                        // }
                                    }
                                    
                                    $carousel = _data_carousel( $data_carousel );
                                    
                                    add_filter("woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
                                    add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
                                    remove_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
                                    add_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
                                    ?>
                                    <div id="hotdeals-<?php echo $unique ?>-<?php echo $i; ?>" class="tab-panel <?php if( $i ==1 ): ?>active<?php endif; ?>">
                                        <?php do_action( "woocommerce_shortcode_before_hot_deal_loop" ); ?>
                                        <ul class="product-list owl-carousel nav-center" <?php echo $carousel; ?>>
                                            <?php while( $products->have_posts() ): $products->the_post(); ?>
                                                <li>
                                					<?php 
                                                        wc_get_template_part( 'content', 'product-hot-deal' );
                                                        // Get date sale 
                                                        $time = kt_get_max_date_sale( get_the_ID() );
                                                        if( $time > $max_time ){
                                                            $max_time = $time;
                                                        }
    
                                                    ?>
                                                </li>
                                			<?php endwhile; ?>
                                        </ul>
                                    <?php do_action( "woocommerce_shortcode_after_hot_deal_loop" ); ?>
                                    </div> 
                                <?php 
                                remove_filter( "woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
                                remove_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
                                add_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
                                remove_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
                                ?>
                                <?php else: ?>
                                    <div id="hotdeals-<?php echo $unique ?>-<?php echo $i; ?>" class="tab-panel <?php if( $i ==1 ): ?>active<?php endif; ?>">
                                        <label><?php _e( 'Empty product', 'kutetheme' ) ?></label>
                                    </div>
                                <?php endif; ?>
                                <?php 
                                    wp_reset_query();
                                    wp_reset_postdata(); 
                                ?>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                                <?php 
                                if( $max_time > 0 ){
                                    $y = date( 'Y', $max_time );
                                    $m = date( 'm', $max_time );
                                    $d = date( 'd', $max_time );
                                    ?>
                                    <input class="max-time-sale" data-y="<?php echo esc_attr( $y );?>" data-m="<?php echo esc_attr( $m );?>" data-d="<?php echo esc_attr( $d );?>" type="hidden" value="" />
                                    <?php

                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Hot deals -->
        <?php
        endif;
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    public function get_size_product( $size ){
        return $this->product_size;
    }
}