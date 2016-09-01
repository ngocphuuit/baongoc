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
    "name"        => __( "KT Featured Products", 'kutetheme'),
    "base"        => "kt_featured_products",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Display Featured Products", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
            'description' => __( 'Display title box featured', 'kutetheme' )
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Product Size", 'kutetheme'),
            "param_name"  => "size",
            "value"       => $product_thumbnail,
            'std'         => 'kt_shop_catalog_270',
            "description" => __( "Product size", 'kutetheme' ),
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Display  type", 'kutetheme'),
            "param_name"  => "display_type",
            "admin_label" => true,
            'std'         => '1',
            'value'       => array(
                __( 'Style 1', 'kutetheme' ) => '1',
                __( 'Style 2', 'kutetheme' ) => '2',
            ),
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Box Type", 'kutetheme'),
            "param_name"  => "box_type",
            "admin_label" => true,
            'std'         => 'featured',
            'value'       => array(
                __( 'Featured', 'kutetheme' ) => 'featured',
                __( 'By IDs', 'kutetheme' ) => 'by_id',
            ),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "IDs", 'kutetheme' ),
            "param_name"  => "ids",
            "admin_label" => false,
            'description' => __( 'Enter your product ID and separate by a commas ",". Ex: 1,2,3...', 'kutetheme' ),
            "dependency"  => array("element" => "box_type","value" => array('by_id'))
        ),
        array(
            "type"        => "kt_number",
            "heading"     => __( "Number", 'kutetheme' ),
            "param_name"  => "number",
            "value"       => "4",
            "admin_label" => true,
            'description' => __( 'The number of products put out from your store.', 'kutetheme' ),
            "dependency"  => array("element" => "box_type","value" => array('featured'))
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
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),

            'group'          => __( 'Design options', 'js_composer' )
        ),
    )
));

class WPBakeryShortCode_Kt_Featured_Products extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'kt_featured_products', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'title'         => __('Hot Categories', 'kutetheme'),
            'size'           => 'kt_shop_catalog_270',
            
            'display_type'  =>'1',
            'box_type'      => 'featured',
            'ids'           =>'',
            'number'        => 4,
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 30,
            'slidespeed'     => 200,
            'css'            => '',
            'el_class'       => '',
            'loop'           => 'false',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 3,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
        ), $atts );
        extract($atts);
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' trending ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $data_carousel = array(
            "autoplay"           => $autoplay,
            "nav"                => $navigation,
            "margin"             => $margin,
            "smartSpeed"         => $slidespeed,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'dots'               => 'false',
            'loop'               => $loop,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
        ob_start();
        
        $args = array(  
            'post_type' => 'product',  
            'meta_key' => '_featured',  
            'meta_value' => 'yes',  
            'posts_per_page' => $number  
        );
        if($ids){
            $ids = explode(',', $ids);
        }else{
            $ids =array();
        }
        if( $box_type =='by_id'){
             $args = array(
                'post_type'=>'product',
                'post__in' => $ids
            );
        }
        $products = get_posts($args);
        $count = count( $products );
        $per_page = 2;
        $loop = false;
        if( $count >2 ) $loop = true;
        ?>
        <!-- Style 1 -->
        <?php if( $display_type == 1 ):?>
        <div class=" <?php echo esc_attr( $elementClass ); ?>">
            <?php if( $title): ?>
            <h2 class="trending-title"><?php echo esc_html( $title );?></h2>
            <?php endif; ?>
            <div class="trending-product owl-carousel nav-center" data-items="1" data-dots="false" data-nav="true" data-autoplay="true" <?php if($loop): ?> data-loop="true" <?php endif;?>>
                <?php 
                    $page = 1;
                    if( $count % $per_page == 0 ){
                        $page = $count / $per_page;
                    }else{
                        $page = $count / $per_page + 1;
                    }
                ?>
                <?php for( $i = 1; $i <= $page ; $i++ ): ?>
                    <ul>
                        <?php 
                        $from = ( $i - 1 ) * $per_page; 
                        $to   = $i * $per_page; 
                        for ($from ; $from < $to; $from ++) { 
                            if( isset($products[$from]) && $products[$from] ){
                                $p = $products[$from];
                                $product = new WC_Product(  $p->ID );
                                ?>
                                    <li>
                                        <div class="product-container">
                                            <div class="product-image">
                                                <a href="<?php echo get_permalink($p->ID); ?>">
                                                   <?php  echo get_the_post_thumbnail( $p->ID, $size ); ?>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name">
                                                    <a href="<?php echo get_permalink($p->ID); ?>"><?php echo esc_html( $p->post_title );?></a>
                                                </h5>
                                                <div class="product-price">
                                                    <?php echo $product->get_price_html(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                <?php endfor;?>
            </div>
        </div>
        <?php endif;?>
        <!-- Style 2 -->
        <?php if( $display_type == 2 ): ?>
            <?php $products = new WP_Query(  $args );?>
            <?php 
            if( ( $products->post_count <  $items_mobile )){
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
                $data_carousel['items'] =  $items_destop;
                
                // if( ( $products->post_count <  3 ) ){
                //     $data_carousel['loop'] = 'false';
                // }else{
                //     $data_carousel['loop'] = $loop;
                // }
            }
            ?>
            <div class="section8 block-trending <?php echo esc_attr( $elementClass ); ?>">
            <h3 class="section-title"><?php echo esc_html( $title );?></h3>
            <?php if( $products->have_posts() ):?>
            <ul class="products-style8 owl-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                <?php while ( $products->have_posts()): $products->the_post(); ?>
                <li class="product autoHeight-item">
                    <div class="product-container">
                        <div class="product-thumb">
                            <?php
                                $product = new WC_Product(  get_the_ID() );
                                $attachment_ids = $product->get_gallery_attachment_ids();
                                $secondary_image = '';
                                if( $attachment_ids ){
                                    $secondary_image = wp_get_attachment_image( $attachment_ids[0], $size );
                                }
                                if( has_post_thumbnail() ){ ?>
                                    <a class="primary_image" href="<?php the_permalink();?>"><?php the_post_thumbnail( $size );?></a>
                                <?php }else{ ?>
                                    <a class="primary_image" href="<?php the_permalink();?>"><?php echo wc_placeholder_img( $size ); ?></a>
                                <?php } 
                                if( $secondary_image != "" ){ ?>
                                    <a class="secondary_image" href="<?php the_permalink();?>"><?php echo $secondary_image; ?></a>
                                <?php }else{ ?>
                                    <a class="secondary_image" href="<?php the_permalink();?>"><?php echo wc_placeholder_img( $size ); ?></a>
                                <?php } ?>
                            <?php kt_get_tool_quickview();?>
                            <div class="product-label"><?php do_action( 'kt_loop_product_label' ); ?></div>
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </div>
                            <div class="box-price">
                                <?php do_action( 'kt_after_shop_loop_item_title' );?>
                            </div>
                            <div class="button-control">
                                <?php kt_get_tool_compare();?>
                                <?php do_action( 'woocommerce_after_shop_loop_item' );?>
                                <?php kt_get_tool_wishlish ();?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endwhile;?>
            </ul>
            <?php endif;?>.
            </div>
        <?php endif;?>
        <?php
        wp_reset_postdata();
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}