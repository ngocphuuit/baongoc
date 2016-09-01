<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "KT Single product", 'kutetheme'),
    "base" => "kt_single_product",
    "category" => __('Kute Theme', 'kutetheme' ),
    "description" => __( 'Display a product', 'kutetheme' ),
    "params" => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Product ID", 'kutetheme' ),
            "param_name"  => "product_id",
            "admin_label" => true,
        ),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Disable', 'js_composer' ) => 'off',
                __( 'Enable', 'js_composer' )  => 'on',
            ),
            'heading'     => __( 'Enable CountDown', 'kutetheme' ),
            'param_name'  => 'enable_countdown',
            'admin_label' => false,
        ),
        array(
            'type'  => 'kt_datetimepicker',
            'heading'     => __( 'Time', 'kutetheme' ),
            'param_name'  => 'time',
            'admin_label' => false,
            "dependency"  => array( "element" => "enable_countdown", "value" => array( 'on' )),
        ),
        array(
            "type" => "textfield",
            "heading" => __( "Extra class name", "js_composer" ),
            "param_name" => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
        array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'kutetheme' ),
            'param_name' => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kutetheme' ),
            'group' => __( 'Design options', 'kutetheme' ),
            'admin_label' => false,
        ),
    ),
));

class WPBakeryShortCode_kt_single_product extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'kt_single_product', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'  => '',
            'style'       => '1',
            'product_id'       => '',
            'enable_countdown' => 'off',
            'time'             => '',
            'el_class' => '',
            'css' => ''
            
        ), $atts );
        extract($atts);
        $elementClass = array(
            'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra' => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $time = strtotime( $time );
        $y = date( 'Y', $time );
        $m = date( 'm', $time );
        $d = date( 'd', $time );
        $h = date( 'h', $time );
        $mi = date( 'i', $time );
        $s = date( 's', $time );
        ob_start();
        ?>
        <div class="block-deal <?php echo esc_attr( $elementClass);?>">
            <?php if($title):?>
            <h3 class="title"><?php echo esc_html( $title );?></h3>
            <?php endif;?>
            <?php if( $enable_countdown == 'on' && $y > 1970 ): ?>
                <span class="countdown-lastest" data-y="<?php _e( esc_attr( $y ) ) ?>" data-m="<?php _e( esc_attr( $m ) ) ?>" data-d="<?php _e( esc_attr( $d ) ) ?>" data-h="<?php _e( esc_attr( $h  ) ) ?>" data-i="<?php _e( esc_attr( $mi ) ) ?>" data-s="<?php _e( esc_attr( $s ) ) ?>"></span>
            <?php endif; ?>
            <?php $meta_query = WC()->query->get_meta_query();
            $ids = explode( ',', $product_id );
            $args = array(
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
                'posts_per_page'      => 1,
                'meta_query'          => $meta_query,
                'suppress_filter'     => true,
            );
            if( is_array( $ids ) && ! empty( $ids ) ){
                $args[ 'post__in' ] = $ids;
                $args [ 'orderby' ] = 'post__in';
            }
            $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
            if ( $products->have_posts() ) :
                remove_action( 'kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating' );
                while ( $products->have_posts() ) : $products->the_post(); ?>
                    <div class="product-info">
                        <h4 class="product-name"><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title(); ?></a></h4>
                        <div class="desc"><?php the_excerpt() ?></div>
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
                        </div>
                    </div>
            <?php  endwhile; // end of the loop.
                wp_reset_query();
                wp_reset_postdata();
                add_action( 'kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating' );
            endif;
            ?>
        </div>
        <?php 
        return ob_get_clean();
    }
    

}