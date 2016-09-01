<?php
// Exit if accessed directly
if ( ! defined('ABSPATH')) exit;

vc_map( array(
    "name"        => __( "Box Products", 'kutetheme'),
    "base"        => "box_products",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Show list product in box hot deal, best selling,...", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"        => "dropdown",
        	"heading"     => __("Type", 'kutetheme'),
        	"param_name"  => "type",
            "admin_label" => true,
            'std'         => 'hot-deals',
            'value'       => array(
        		__( 'Hot Deals', 'kutetheme' )    => 'hot-deals',
                __( 'Best selling', 'kutetheme' ) => 'best-selling',
                __( 'New Arrivals', 'kutetheme' ) => 'recent-product',
                __( 'Most Review', 'kutetheme' )  => 'most-review',
                __( 'By IDs', 'kutetheme' )       => 'by-ids'
        	),
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
                __( 'Style 3', 'kutetheme' ) => 'style-3',
                __( 'Style 4', 'kutetheme' ) => 'style-4',
        	),
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
            "type"        => "textfield",
            "heading"     => __( "Ids", 'kutetheme' ),
            "param_name"  => "ids",
            "admin_label" => true,
            "description" => __("Get product by list ids.( Input IDs which separated by a comma ',' )",'kutetheme'),
            "dependency"  => array("element" => "type", "value" => array( 'by-ids' ) ),
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order by", 'kutetheme'),
            "param_name" => "orderby",
            "value"      => array(
        		__( 'None', 'kutetheme' )     => 'none',
                __( 'ID', 'kutetheme' )       => 'ID',
                __( 'Author', 'kutetheme' )   => 'author',
                __( 'Name', 'kutetheme' )     => 'name',
                __( 'Date', 'kutetheme' )     => 'date',
                __( 'Modified', 'kutetheme' ) => 'modified',
                __( 'Rand', 'kutetheme' )     => 'rand',
                __( 'Discount', 'kutetheme' ) => 'discount'
        	),
            'std'         => 'date',
            "description" => __("Select how to sort retrieved posts.",'kutetheme'),
            "dependency"  => array( "element" => "type", "value" => array( 'hot-deals' ) ),
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order way", 'kutetheme'),
            "param_name" => "order",
            "value"      => array(
                __('ASC', 'kutetheme') => 'ASC',
                __('DESC', 'kutetheme') => 'DESC'
        	),
            'std'         => 'DESC',
            "description" => __("Designates the ascending or descending order.",'kutetheme'),
            "dependency"  => array( "element" => "type", "value" => array( 'hot-deals' ) ),
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
            "type"        => "colorpicker",
            "heading"     => __("Main Color", 'kutetheme'),
            "param_name"  => "main_color",
            "admin_label" => true,
        ),
        array(
    		'type'        => 'attach_images',
    		'heading'     => __( 'Banner', 'kutetheme' ),
    		'param_name'  => 'banner',
            'description' => __( 'Setup banner for the box on bottom', 'kutetheme' ),
            "dependency"  => array( "element" => "style", "value" => array( 'style-1', 'style-2' ) ),
    	),
        array(
            "type"        => "textfield",
            "heading"     => __( "Banner Link", 'kutetheme' ),
            "param_name"  => "banner_link",
            "admin_label" => false,
            "dependency"  => array( "element" => "style", "value" => array( 'style-1', 'style-2' ) ),
        ),
        array(
            "type"        => "kt_number",
            "heading"     => __("Slide Speed Banner", 'kutetheme'),
            "param_name"  => "speed_banner",
            "value"       => "250",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        // Carousel
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'AutoPlay', 'kutetheme' ),
            'param_name' => 'autoplay',
            'value'      => array(
				__( 'Yes', 'js_composer' ) => 'true',
				__( 'No', 'js_composer' )  => 'false'
			),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Navigation', 'kutetheme' ),
            'param_name' => 'navigation',
            'value'      => array(
				__( 'Yes', 'js_composer' ) => 'true',
				__( 'No', 'js_composer' )  => 'false'
			),
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'kutetheme' ),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Loop', 'kutetheme' ),
            'param_name' => 'loop',
            'value'      => array(
				__( 'Yes', 'js_composer' ) => 'true',
				__( 'No', 'js_composer' )  => 'false'
			),
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
			"value"       => "10",
            "suffix"      => __("px", 'kutetheme'),
			"description" => __('Distance( or space) between 2 item', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Use Carousel Responsive', 'kutetheme' ),
            'param_name' => 'use_responsive',
            'value'      => array(
				__( 'Yes', 'js_composer' ) => 1,
				__( 'No', 'js_composer' )  => 0
			),
            'std'         => 1,
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
			"heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
			"param_name"  => "items_tablet",
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
        array(
			'type'        => 'css_editor',
			'heading'     => __( 'Css', 'js_composer' ),
			'param_name'  => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'       => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
		),
        
    )
));

class WPBakeryShortCode_Box_Products extends WPBakeryShortCode {
    public $product_size = 'kt_shop_catalog_204';
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'box_products', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'          => '',
            'size'           => 'kt_shop_catalog_204',
            'per_page'       => 5,
            'type'           => 'hot-deals',
            'taxonomy'       => 0,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'main_color'     => '#ff3300',
            
            'style'          => 'style-1',
            
            'banner'         => '',
            'banner_link'    => '',
            'speed_banner'   => '250',
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 20,
            'slidespeed'     => 250,
            'nav'            => 'true',
            'loop'           => 'false',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 4,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
            'css'            => '',
            'css_animation'  => '',
            'el_class'       => '',
        ), $atts ) );
        
         global $woocommerce_loop;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'box-products ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        if( function_exists( 'kt_hex2rgb' )){
            $main_color_rgb = kt_hex2rgb($main_color);
        }else{
            $main_color_rgb = array( 'red' => 255, 'green' => 51, 'blue' => 102 );
        }
        $cate_ids = array();
        ob_start();
        $meta_query = WC()->query->get_meta_query();
        
        add_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
        
        $args = array(
			'post_type'			  => 'product',
			'post_status'		  => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' 	  => $per_page,
            'suppress_filter'     => true,
			'meta_query'          => $meta_query
		);
        if( $type == 'hot-deals' ){
            $product_ids_on_sale = wc_get_product_ids_on_sale();
            
            $args['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
            if( $orderby == 'discount' ){
                $newargs['meta_key'] = '_reduction_percent';
                $newargs['orderby']  = 'meta_value_num';
            }else{
                $args['orderby']  = $orderby;
            }
            $args['order'] 	 = $order;
            
            if( ! $title ){
                
                $title = __( 'Hot Deals', 'kutetheme');
            }
        }elseif( $type == 'best-selling' ){
            $newargs['meta_key'] = 'total_sales';
            $newargs['orderby']  = 'meta_value_num';
            
            if( ! $title ){
                $title = __( 'Best Selling', 'kutetheme');
            }
        }elseif( $type == 'recent-product' ){
            $args['orderby'] = $orderby;
            $args['order'] 	 = $order;
            if( ! $title ){
                $title = __( 'New Arrivals', 'kutetheme');
            }
        }elseif( $type == 'most-review' ){
            add_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
            
            if( ! $title ){
                $title = __( 'Most Reviews', 'kutetheme');
            }
        }elseif( $type == 'by-ids' ){
            $ids = explode( ',', $ids );
            
            if( is_array( $ids ) && ! empty( $ids ) ){
                $args[ 'post__in' ] = $ids;
                $args[ 'orderby' ] = 'post__in';
            }
            
            if( ! $title ){
                $title = __( 'New Arrivals', 'kutetheme');
            }
        }
        $data_carousel = array(
            "autoplay"    => $autoplay,
            "navigation"  => $navigation,
            "margin"      => $margin,
            "smartSpeed"  => $slidespeed,
            "theme"       => 'style-navigation-top',
            "autoheight"  => 'false',
            'nav'         => $navigation,
            'dots'        => 'false',
            'loop'        => $loop,
            'autoplayTimeout' => 1000,
            'autoplayHoverPause' => 'true',
        );
        $unique_id = uniqid();
        
        if( $taxonomy ){
            $cate_ids = explode( ",", $taxonomy );
        }
        
        if( $style == "style-1" or $style == "style-2" ):
            add_filter("woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
            add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
            remove_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
            
            if( count( $cate_ids ) > 0 ) {
                $args['tax_query'] = array(
                    array(
            			'taxonomy' => 'product_cat',
            			'field'    => 'id',
            			'terms'    => $cate_ids
            		)
                );
            }
            
            $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
            
            if( $products->have_posts() ): 
                if($products->post_count <=1){
                    $data_carousel['loop'] = 'false';
                }

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
                    
                    // if( ( $products->post_count <  $items_mobile ) || ( $products->post_count <  $items_tablet ) || ( $products->post_count <  $items_destop ) ){
                    //     $data_carousel['loop'] = 'false';
                    // }else{
                    //     $data_carousel['loop'] = $loop;
                    // }
                }else{
                    $data_carousel['items'] =  $items_destop;
                    // if( ( $products->post_count <  $items_destop ) ){
                    //     $data_carousel['loop'] = 'false';
                    // }else{
                    //     $data_carousel['loop'] = $loop;
                    // }
                }
                $carousel = _data_carousel($data_carousel);
                $banner_i = 1;
                if( isset( $banner ) && $banner ): 
                    $banner_args = array(
                        'post_type' => 'attachment',
                        'include'   => $banner,
                        'orderby'   => 'post__in'
                    );
                    $list_banner = get_posts( $banner_args );
                    
                    ob_start();
                    foreach( $list_banner as $l ): ?>
                        <li>
                            <a target="_blank" href="<?php echo  $banner_link ? esc_url( $banner_link ) : ''; ?>">
                                <?php echo wp_get_attachment_image( $l->ID, 'full' );?>
                            </a>
                        </li>
                    <?php $banner_i ++ ;
                    endforeach;
                    $banner_carousel = ob_get_clean();
                endif;
                
                ?>
                <div class="container-tab <?php if( $style == "style-1" ): ?> option3 <?php else: ?> option4 <?php endif; ?>">
                    <!-- box product -->
                    <div class="<?php echo apply_filters( 'kt_class_box_product', $elementClass ) ?>" id="change-color-<?php echo esc_attr( $unique_id ); ?>" data-target="change-color" data-color="<?php echo esc_attr( $main_color ); ?>" data-rgb="<?php echo esc_attr ( implode( ',', $main_color_rgb ) ) ;  ?>">
                        <div class="box-product-head">
                            <span class="box-title"><?php echo esc_html( $title ) ?></span>
                            <ul class="box-tabs nav-tab">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-all-<?php echo $unique_id ?>">
                                        <?php _e( 'All', 'edo' ) ?>
                                    </a>
                                </li>
                                <?php if( count( $cate_ids ) ): ?>
                                    <?php foreach( $cate_ids as $id ):  ?>
                                        <?php $term = get_term( $id, 'product_cat' );?>
                                        <?php if( ! is_wp_error( $term ) && $term ): $cate_obj[] = $term; ?>
                                            <li>
                                                <a data-toggle="tab" href="#tab-<?php echo esc_attr( $term->term_id . '-' . $unique_id )  ?>">
                                                    <?php echo esc_html( $term->name )   ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="box-product-content">
                            <?php if( isset( $banner_carousel ) ) : ?>
                            <div class="box-product-adv">
                                <ul class="owl-carousel nav-center" data-slidespeed="<?php echo intval( $speed_banner ) ?>" data-items="1" data-dots="false"  <?php if( $banner_i > 2 ): ?> data-autoplay="true" data-loop="true" <?php else:  ?> data-autoplay="false" data-loop="false" <?php endif;?>  data-nav="true">
                                    <?php echo apply_filters( 'kt_banner_box_product', $banner_carousel ) ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <div class="box-product-list" <?php if( ! isset( $banner_carousel ) ) : ?> style="margin-left: 0;" <?php endif; ?>>
                                <div class="tab-container">
                                    <div id="tab-all-<?php echo esc_attr( $unique_id )  ?>" class="tab-panel active">
        								<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                            <?php $this->kt_loop_product( $products, $carousel ) ?>
                                        <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
        							</div>
                                    <?php if( isset( $cate_obj ) && count( $cate_obj ) > 0 ): ?>
                                        <?php foreach( $cate_obj as  $term ): 
                                            $args['tax_query'] = array(
                                                array(
                                        			'taxonomy' => 'product_cat',
                                        			'field' => 'id',
                                        			'terms' => $term->term_id
                                        		)
                                            );
                                            
                                            $term_products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                                            
                                            if( $term_products->have_posts() ):
                                            ?>
                							<div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel">
                								<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                                    <?php $this->kt_loop_product( $term_products, $carousel ) ?>
                                                <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
                							</div>
                                            <?php else: ?>
                                                <div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel">
                                                    <?php $this->kt_tab_empty(); ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./box product -->
                </div>
                <?php endif; ?>
                <?php 
                    add_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
                    remove_filter( "woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
                    remove_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
                ?>
            <?php endif;?>
            <?php if( $style == "style-3"): ?>
            <div class="tab-product-13 option-13 style2 container-tab">
                <div class="head">
                    <h3 class="title"><?php echo esc_html( $title ) ?></h3>
                    <ul class="box-tabs nav-tab">
                        <?php if( count( $cate_ids ) ): $i = 1; ?>
                            <?php foreach( $cate_ids as $id ):  ?>
                                <?php $term = get_term( $id, 'product_cat' ); ?>
                                <?php if( ! is_wp_error( $term ) && $term ): $cate_obj[] = $term; ?>
                                    <li <?php if( $i == 1 ): ?> class="active" <?php endif; ?>>
                                        <a data-toggle="tab" href="#tab-<?php echo esc_attr( $term->term_id . '-' . $unique_id )  ?>">
                                            <?php echo esc_html( $term->name ); ?>
                                        </a>
                                    </li>
                                    <?php $i++;  ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-container">
                        <?php if( isset( $cate_obj ) &&  count( $cate_obj ) > 0 ): $i = 1; ?>
                        <?php foreach( $cate_obj as  $term ): 
                            $args['tax_query'] = array(
                                array(
                        			'taxonomy' => 'product_cat',
                        			'field' => 'id',
                        			'terms' => $term->term_id
                        		)
                            );
                            $term_products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                            if( $term_products->post_count <=1){
                                $data_carousel['loop'] = 'false';
                            }
                            if( $use_responsive ){
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
                                
                                // if( ( $term_products->post_count <  $items_mobile ) || ( $term_products->post_count <  $items_tablet ) || ( $term_products->post_count <  $items_destop ) ){
                                //     $data_carousel['loop'] = 'false';
                                // }else{
                                //     $data_carousel['loop'] = $loop;
                                // }
                            }else{
                                $data_carousel['items'] =  $items_destop;
                                // if( ( $term_products->post_count <  $items_destop ) ){
                                //     $data_carousel['loop'] = 'false';
                                // }else{
                                //     $data_carousel['loop'] = $loop;
                                // }
                            }
                            $carousel = _data_carousel($data_carousel);
                            if( $term_products->have_posts() ):?>
                            
    						<div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php if( $i == 1 ): ?> active <?php endif; ?>">
                                <ul class="tab-products owl-carousel" <?php echo apply_filters( 'kt_shortcode_box_product_carousel', $carousel ); ?>>
                                    <?php while( $term_products->have_posts() ): $term_products->the_post(); ?>
                                        <li class="product-style3">
                                            <?php wc_get_template_part( 'content', 'product-style3' ); ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php
                                wp_reset_query();
                                wp_reset_postdata(); 
                            ?>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Style 4 -->
            <?php if( $style == "style-4"):
            $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
            ?>
            <div class="block-tab-category14 container-tab">
                <div class="head">
                    <span class="bar"><i class="fa fa-bars"></i></span>
                    <?php if( isset( $cate_ids) && $cate_ids): $i = 1;?>
                    <ul class="box-tabs nav-tab">   
                        <?php foreach( $cate_ids as $id ):   ?>
                            <?php $term = get_term( $id, 'product_cat' ); ?>
                            <?php if( ! is_wp_error( $term ) && $term ): $cate_obj[] = $term; ?>
                                <li <?php if( $i == 1 ): ?> class="active" <?php endif; ?>>
                                    <a data-toggle="tab" href="#tab-<?php echo esc_attr( $term->term_id . '-' . $unique_id )  ?>">
                                        <?php echo esc_html( $term->name ); ?>
                                    </a>
                                </li>
                                <?php $i++;  ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif;?>
                    <a class="link-all" href="<?php echo esc_url( $shop_page_url );?>"><?php _e('View all','kutetheme');?></a>
                </div>
                <div class="tab-container">
                    <?php if( isset( $cate_obj ) && $cate_obj ): $i = 1; ?>
                    <?php foreach( $cate_obj as  $term ): 
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'id',
                                'terms' => $term->term_id
                            )
                        );
                        $term_products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                        if( $term_products->have_posts() ):?>
                        <?php 

                        if( $term_products->post_count <=1 ){
                            $data_carousel['loop'] = 'false';
                        }
                        if( $use_responsive ){
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
                            
                            // if( ( $term_products->post_count <  $items_mobile ) || ( $term_products->post_count <  $items_tablet ) || ( $term_products->post_count <  $items_destop ) ){
                            //     $data_carousel['loop'] = 'false';
                            // }else{
                            //     $data_carousel['loop'] = $loop;
                            // }
                        }else{
                            $data_carousel['items'] =  $items_destop;
                            // if( ( $term_products->post_count <  $items_destop ) ){
                            //     $data_carousel['loop'] = 'false';
                            // }else{
                            //     $data_carousel['loop'] = $loop;
                            // }
                        }
                        $carousel = _data_carousel($data_carousel);
                        
                        ?>
                        <div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php if( $i == 1 ): ?> active <?php endif; ?>">
                            <div class="row">
                                <?php 
                                    remove_filter( "woocommerce_get_price_html_from_to", "kt_get_price_html_from_to", 10 , 4);
                                    remove_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
                                ?>
                                <?php while( $term_products->have_posts() ): $term_products->the_post(); ?>
                                    <div class="col-sm-4 col-md-3">
                                        <div class="product-style4">
                                            <?php wc_get_template_part( 'content', 'product-style4' ); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php
                            wp_reset_query();
                            wp_reset_postdata(); 
                        ?>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif;?>
            <!-- ./Style 4 -->
        <?php 
        if( $type == 'most-review' ){
            remove_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }
        remove_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
        return ob_get_clean();
    }
    /**
     * order_by_rating_post_clauses function.
     *
     * @access public
     * @param array $args
     * @return array
     */
    public function order_by_rating_post_clauses( $args ) {
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
    /**
     * 
     * 
     */
     public function kt_loop_product( $products, $data_carousel = ''){
        ?>
        <ul class="product-list owl-carousel nav-center" <?php echo apply_filters( 'kt_shortcode_box_product_carousel', $data_carousel ); ?> data-allitems="<?php echo esc_attr( $products->post_count );?>">
            <?php while( $products->have_posts() ): $products->the_post(); ?>
                <li>
                    <?php wc_get_template_part( 'content', 'box-product' ); ?>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php
        wp_reset_query();
        wp_reset_postdata(); 
     }
     public function kt_tab_empty(){
        ?>
            <label><?php _e( 'Empty product', 'kutetheme' ) ?></label>
        <?php
     }
     
    public function get_size_product( $size ){
        return $this->product_size;
    }
}