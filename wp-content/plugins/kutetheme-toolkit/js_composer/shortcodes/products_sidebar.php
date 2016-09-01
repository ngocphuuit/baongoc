<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class WPBakeryShortCode_Product_Sidebar extends WPBakeryShortCode {

    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'product_sidebar', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'          => __( 'NEW PRODUCTS', 'kutetheme' ),
            'style'          => 'style-1',
            'target'         => 'best-seller',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'ids'            => '',
            'taxonomy'       => '',
            'number_product' => 14,
            'per_page'       => 7,
            'css_animation'  => '',
            'el_class'       => '',
            'css'            => '',   
            
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 30,
            'slidespeed'     => 200,
            'css'            => '',
            'el_class'       => '',
            'nav'            => 'true',
            'loop'           => 'false',
            
        ), $atts );
        extract($atts);

        global $woocommerce_loop;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $elementClass = apply_filters( 'kt_product_sidebar_class_container', $elementClass );
        
        $tabs = array(
            'best-sellers' => __( 'Best Sellers', 'kutetheme' ),
            'on-sales'     => __( 'On Sales', 'kutetheme' ),
            'new-arrivals' => __( 'New Products', 'kutetheme' )
        );
        
        $meta_query = WC()->query->get_meta_query();
        $args = array(
			'post_type'				=> 'product',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $number_product,
			'meta_query' 			=> $meta_query,
            'suppress_filter'       => true,
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
        $data_carousel = array(
            "autoplay"           => $autoplay,
            "nav"                => $navigation,
            "margin"             => $margin,
            "smartSpeed"         => $slidespeed,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'items'              => 1,
            'dots'               => 'false',
            'loop'               => $loop,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
        
        if( $target == 'new-arrival' ){
            $args['orderby'] = 'date';
            $args['order'] 	 = 'DESC';
        }elseif( $target == 'on-sales' ){
            $product_ids_on_sale = wc_get_product_ids_on_sale();
            $args['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
            
            if( $orderby == '_sale_price' ){
                $orderby = 'date';
                $order   = 'DESC';
            }
            $args['orderby'] = $orderby;
            $args['order'] 	= $order;
        }elseif( $target == 'custom' ){
            if( $orderby == '_sale_price' ){
                $args['meta_query'] = array(
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
                $args['orderby'] = $orderby;
                $args['order'] 	= $order;
            }
        }elseif( $target == 'most-review'){
            add_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }elseif( $target == 'by-ids' && count( $ids ) > 0 ){
            $args['post__in'] = $ids;
            $args['orderby'] = 'post__in';
        }else{
            $args['meta_key'] = 'total_sales';
            $args['orderby']  = 'meta_value_num';
        }
         
        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
        if( $target == 'most-review'){
            remove_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }
        remove_action( 'kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
        $uniqeID = uniqid();
        ob_start();
        if ( $products->have_posts() ) :
            if( $style == 'style-1' ):
            ?>
            <div class="block-new-product12 <?php echo esc_attr( $elementClass ); ?>">
                <?php if( $title ): ?>
                    <div class="title"><?php echo esc_html( $title ); ?></div>
                <?php endif; ?>
                <div class="inner owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                    <?php $i = 1; ?>
                    <?php  while ( $products->have_posts() ) : $products->the_post(); ?>
                    <?php if( $i == 1 ): ?>
                    <ul class="list-product">
                    <?php endif;?>
                        <li class="product">
                            <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo kt_get_product_thumbnail( 'shop_thumbnail' ); ?>
                                </a>
                            </div>
                            <div class="info">
                                <h3 class="product-name"><a title="<?php echo esc_attr( get_the_title() );?>" href="<?php the_permalink(); ?>"><?php echo esc_attr( get_the_title() );?></a></h3>
                                <?php
                        			/**
                        			 * woocommerce_after_shop_loop_item_title hook
                                     * 
                        			 * @hooked woocommerce_template_loop_price - 5
                        			 * @hooked woocommerce_template_loop_rating - 10
                        			 */
                        			do_action( 'kt_after_shop_loop_item_title' );
                        		?>
                            </div>
                        </li>
                    <?php 
                        if( $i == $per_page ): 
                            $i = 1; 
                            echo '</ul><!--End Ul-->';
                        else:
                            $i++;
                        endif;
                        ?>
                    
                    <?php endwhile; ?>
                    <?php if( $i > 1 ): ?>
                    </ul><!--./ End ul-->
                    <?php endif;?>
                </div>
            </div>
            <?php else: 
            add_action( 'kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
            ?>
                <div class="block-static option-14">
                    <?php if( $title ): ?>
                        <h3 class="title"><span><?php echo esc_html( $title ); ?></span></h3>
                    <?php endif; ?>
                    <div class="block-static-products owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                        <?php $i = 1; ?>
                        <?php  while ( $products->have_posts() ) : $products->the_post(); ?>
                        <?php if( $i == 1 ): ?>
                        <ul class="list">
                        <?php endif;?>
                            <li>
                                <div class="product-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo kt_get_product_thumbnail( 'shop_thumbnail' ); ?>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name">
                                        <a title="<?php echo esc_attr( get_the_title() );?>" href="<?php the_permalink(); ?>">
                                            <?php echo esc_attr( get_the_title() );?>
                                        </a>
                                    </h3>
                                    <?php
                            			/**
                            			 * woocommerce_after_shop_loop_item_title hook
                                         * 
                            			 * @hooked woocommerce_template_loop_price - 5
                            			 * @hooked woocommerce_template_loop_rating - 10
                            			 */
                            			do_action( 'kt_after_shop_loop_item_title' );
                            		?>
                                    <div class="group-button-control">
                                        <?php woocommerce_template_loop_add_to_cart(); ?>
                                        <?php kt_get_tool_wishlish ();?>
                                        <?php kt_get_tool_compare();?>
                                        <?php kt_get_tool_quickview();?>
                                    </div>
                                </div>
                            </li>
                            
                        <?php 
                            if( $i == $per_page ): 
                                $i = 1; 
                                echo '</ul><!--End Ul-->';
                            else:
                                $i++;
                            endif;
                        ?>
                        <?php  endwhile; ?>
                        <?php if( $i > 1 ): ?>
                        </ul><!--./ End ul-->
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;
        endif;
        add_action( 'kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
        wp_reset_query();
        wp_reset_postdata();
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
}



vc_map( array(
    "name"        => __( "Products Sidebar", 'kutetheme'),
    "base"        => "product_sidebar",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( 'Show product best sellers, on sales, new products on sidebar option 12', 'js_composer' ),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Style", 'kutetheme'),
            "param_name" => "style",
            "value"      => array(
                __( 'Style 1', 'kutetheme' )  => 'style-1',
                __( 'Style 2', 'kutetheme' )  => 'style-2'
        	),
            'std'         => 'style-1',
        ),
        
        array(
            "type"        => "dropdown",
            "heading"     => __("Target", 'kutetheme'),
            "param_name"  => "target",
            "admin_label" => true,
            'std'         => 'best-seller',
            'value'       => array(
        		__( 'Best Sellers', 'kutetheme' ) => 'best-seller',
                __( 'Most Reviews', 'kutetheme' ) => 'most-review',
                __( 'New Arrivals', 'kutetheme' ) => 'new-arrival',
                __( 'On Sales', 'kutetheme' )     => 'on-sales',
                __( 'By Ids', 'kutetheme' )       => 'by-ids',
                __( 'Custom', 'kutetheme' )       => 'custom'
        	),
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
            "dependency"  => array("element" => "target", "value" => array('custom', 'on-sales')),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Ids", 'kutetheme' ),
            "param_name"  => "ids",
            "admin_label" => true,
            "description" => __("Get product by list ids.( Input IDs which separated by a comma ',' )",'kutetheme'),
            "dependency"  => array("element" => "target", "value" => array( 'by-ids' ) ),
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
            "dependency"  => array("element" => "target", "value" => array('custom', 'on-sales')),
        ),
        
        array(
            "type"        => "kt_taxonomy",
            "taxonomy"    => "product_cat",
            "class"       => "",
            "heading"     => __("Category", 'kutetheme'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => '',
            'multiple'    => true,
            'hide_empty'  => false,
            'placeholder' => __('Choose categoy', 'kutetheme'),
            "description" => __("Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'kutetheme')
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Quantity', 'js_composer' ),
            'value'       => 14,
            'param_name'  => 'number_product',
            'description' => __( 'The number of product has been taken', 'js_composer' ),
            'admin_label' => false,
		),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Per page', 'js_composer' ),
            'value'       => 7,
            'param_name'  => 'per_page',
            'description' => __( 'The "per_page" shortcode determines how many products to show on the page', 'js_composer' ),
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
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
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
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' ),
            'admin_label'    => false,
		),
    ),
));