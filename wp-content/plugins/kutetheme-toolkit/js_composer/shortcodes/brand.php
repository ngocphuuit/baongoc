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
    "name"        => __( "Brands", 'kutetheme'),
    "base"        => "brand",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Display brand showcase", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
            'description' => __( 'Show tittle when "show product" is not checked', 'kutetheme' )
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Product Size", 'kutetheme'),
            "param_name"  => "size",
            "value"       => $product_thumbnail,
            'std'         => 'kt_shop_catalog_270',
            "description" => __( "Product size", 'kutetheme' ),
            "admin_label" => true,
        ),
        array(
            "type"        => "kt_taxonomy",
            "taxonomy"    => "product_brand",
            "class"       => "",
            "heading"     => __("Brands", 'kutetheme'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => 0,
            'multiple'    => true,
            'placeholder' => __('Choose categoy', 'kutetheme'),
            "description" => __("Note: Selected categories will be hide if it empty. Only selected categories will be displayed.", 'kutetheme')
        ),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Style 1', 'js_composer' ) => 'true',
                __( 'Style 2', 'js_composer' )  => 'false',
                __( 'Style 3', 'js_composer' )  => 'style3',
                __( 'Style 4', 'js_composer' )  => 'style4'
            ),
            'std'         => 'true',
            'heading'     => __( 'Style', 'kutetheme' ),
            'param_name'  => 'show_product',
            'admin_label' => false,
            'description' => __( 'Yes, Box product will show by brand. If It\'s checked then Null value title is not allow', 'kutetheme' )
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Show 1 Line', 'js_composer' )       => '1-line',
                __( 'Show 2 Line', 'js_composer' )       => '2-line',
                __( 'Show logo style 1', 'js_composer' ) => 'show-logo',
                __( 'Show logo style 2', 'js_composer' ) => 'show-logo2',
            ),
            'heading'     => __( 'Line', 'kutetheme' ),
            'param_name'  => 'line_brand',
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'false' 
                )
             ),
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
            "description" => __("Designates the ascending or descending order.",'kutetheme')
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
            "value"       => 1,
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
            "value"       => "8",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
            "param_name"  => "items_tablet",
            "value"       => "6",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'kutetheme'),
            "param_name"  => "items_mobile",
            "value"       => "4",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The numbers of item on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
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
            'param_name'  => 'autoplay2',
            'group'       => __( 'Product Carousel settings', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Navigation', 'kutetheme' ),
            'param_name'  => 'navigation2',
            'description' => __( "Show buton 'next' and 'prev' buttons.", 'kutetheme' ),
            'group'       => __( 'Product Carousel settings', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Loop', 'kutetheme' ),
            'param_name'  => 'loop2',
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'kutetheme' ),
            'group'       => __( 'Product Carousel settings', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
		),
        array(
            "type"        => "kt_number",
            "heading"     => __("Slide Speed", 'kutetheme'),
            "param_name"  => "slidespeed2",
            "value"       => "250",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Product Carousel settings', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("Margin", 'kutetheme'),
            "param_name"  => "margin2",
            "value"       => 30,
            "suffix"      => __("px", 'kutetheme'),
            "description" => __('Distance( or space) between 2 item', 'kutetheme'),
            'group'       => __( 'Product Carousel settings', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
	  	),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'std'         => 1,
            'heading'     => __( 'Use Carousel Responsive', 'kutetheme' ),
            'param_name'  => 'use_responsive2',
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'kutetheme' ),
            'group'       => __( 'Product Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
		),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on destop (Screen resolution of device >= 992px )", 'kutetheme'),
            "param_name"  => "items_destop2",
            "value"       => "4",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Product Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
            "param_name"  => "items_tablet2",
            "value"       => "2",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Product Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'kutetheme'),
            "param_name"  => "items_mobile2",
            "value"       => "1",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The numbers of item on destop', 'kutetheme'),
            'group'       => __( 'Product Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
            "dependency"  => array(
                "element" => "show_product",
                "value" => array( 
                    'style4' 
                )
             ),
	  	),
        
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' )
		),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'kutetheme' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
        )
    )
));
class WPBakeryShortCode_Brand extends WPBakeryShortCode {
    public $product_size = 'kt_shop_catalog_270';
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'brand', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'title'          => '',
            'size'           => 'kt_shop_catalog_270',
            'taxonomy'      => 0,
            'line_brand'     => '1-line',
            'show_product'   => 'true',
            'orderby'        => 'date',
            'order'          => 'desc',
            
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 1,
            'slidespeed'     => 250,
            'nav'            => 'true',
            'loop'           => 'true',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 8,
            'items_tablet'   => 6,
            'items_mobile'   => 4,
            
            
            //Carousel  Product          
            'autoplay2'       => 'false', 
            'navigation2'     => 'true',
            'margin2'         => 30,
            'slidespeed2'     => 250,
            'nav2'            => 'true',
            'loop2'           => 'true',
            
            //Default
            'use_responsive2' => 1,
            'items_destop2'   => 4,
            'items_tablet2'   => 2,
            'items_mobile2'   => 1,
            
            
            
            'css'            => '',
            'css_animation'  => '',
            'el_class'       => '',
            
        ), $atts );
        extract($atts);
        
        $this->product_size = $size;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'brand ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
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
        
        
        $data_carousel2 = array(
            "autoplay"           => $autoplay2,
            "nav"                => $navigation2,
            "margin"             => $margin2,
            "smartSpeed"         => $slidespeed2,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'dots'               => 'false',
            'loop'               => $loop2,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        ob_start();
        //Set up the taxonomy object and get terms
		add_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
        
        if( taxonomy_exists( 'product_brand' ) ):
            $args_term = array( 
                'hide_empty' => 0, 
                'orderby' => $orderby, 
                'order' => $order 
            );
            if( $taxonomy ){
                $args_term[ 'include' ] = $taxonomy;
            }
    		$terms = get_terms( 'product_brand', $args_term);
            $count_term = count( $terms );
            if( ! is_wp_error($terms) && $count_term > 0 ) :
                if( ( $count_term <=  1 ) ){
                    $data_carousel['loop'] = 'false';
                }

                if( $use_responsive ) {
                    $arr = array( 
                        '0'   => array( 
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
                    
                    // if( ( $count_term <  $items_mobile ) || ( $count_term <  $items_tablet ) || ( $count_term <  $items_destop ) ){
                    //     $data_carousel['loop'] = 'false';
                    // }else{
                    //     $data_carousel['loop'] = $loop;
                    // }
                }else{
                    $data_carousel['items'] = 8;
                    
                    // if( $count_term < 8 ){
                    //     $data_carousel['loop'] = 'false';
                    // }else{
                    //     $data_carousel['loop'] = $loop;
                    // }
                }
                
                if( $show_product == "true" ) :
                    ?>
                    <div class="brand-showcase <?php echo esc_attr( $elementClass ); ?>">
                        <?php if( $title ): ?>
                            <h2 class="brand-showcase-title"><?php echo esc_html( $title ) ; ?></h2>
                        <?php endif; ?>
                        <div class="brand-showcase-box">
                            <ul class="brand-showcase-logo owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                <?php $i = 0; ?>
                                <?php foreach($terms as $term): ?>
                                <li data-tab="showcase-<?php echo esc_attr( $term->term_id ); ?>" class="item<?php echo ( $i ==1 ) ? ' active' : '' ?>">
                                    <h3><?php echo esc_html( $term->name ); ?></h3>
                                </li>
                                <?php $i ++ ; ?>
                                <?php endforeach; ?>
                            </ul>
                            <div class="brand-showcase-content">
                                <?php $i = 1; ?>
                                <?php //add_filter( 'kt_template_loop_product_thumbnail_size', array( $this, 'kt_thumbnail_size' ) ); ?>
                                <?php foreach($terms as $term): ?>
                                    <div class="brand-showcase-content-tab<?php echo ( $i == 1 ) ? ' active' : '' ?>" id="showcase-<?php echo esc_attr( $term->term_id ) ?>">
                                        <?php 
                                        $term_link = get_term_link( $term );
                                        
                                        $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
        
                                		if ( $thumbnail_id ) {
                                		  $image = wp_get_attachment_image( intval( $thumbnail_id ), 'full' );
                                		} else {
                                			$image = "";
                                		}
                                        $meta_query = WC()->query->get_meta_query();
                                        $args = array(
                                			'post_type'				=> 'product',
                                			'post_status'			=> 'publish',
                                			'ignore_sticky_posts'	=> 1,
                                			'posts_per_page' 		=> 4,
                                			'meta_query' 			=> $meta_query,
                                            'suppress_filter'       => true,
                                            'tax_query'             => array(
                                                array(
                                                    'taxonomy' => 'product_brand',
                                                    'field'    => 'id',
                                                    'terms'    => $term->term_id,
                                                    'operator' => 'IN'
                                                ),
                                            )
                                		);
                                        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                                        if( $products->have_posts() ):
                                        ?>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 trademark-info">
                                                <?php if($image): ?>
                                                <div class="trademark-logo">
                                                    <a href="<?php echo esc_url( $term_link ); ?>">
                                                        <?php echo apply_filters( 'kt_brand_image_' . $term->slug, $image ) ?>
                                                    </a>
                                                </div>
                                                <?php endif;?>
                                                <div class="trademark-desc">
                                                    <?php echo esc_html( $term->description ) ?>
                                                </div>
                                                <a href="<?php echo esc_url( $term_link ); ?>" class="trademark-link"><?php _e( 'shop this brand', 'kutetheme' ) ?></a>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 trademark-product">
                                                <div class="row">
                                                    <?php while($products->have_posts()): $products->the_post(); 
                                                        $link = get_the_permalink();
                                                    ?>
                                                    <div class="col-xs-12 col-sm-6 product-item">
                                                        <div class="image-product hover-zoom">
                                                            <a href="<?php echo esc_url( $link ); ?>">
                                                                <?php
                                                        			/**
                                                        			 * kt_loop_product_thumbnail hook
                                                        			 *
                                                        			 * @hooked woocommerce_template_loop_product_thumbnail - 10
                                                        			 */
                                                        			echo woocommerce_get_product_thumbnail( $size );
                                                        		?>
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <a href="<?php echo esc_url( $link ); ?>">
                                                                <h5><?php echo esc_html( get_the_title() ); ?></h5>
                                                            </a>
                                                            <div class="content_price">
                                                                <?php
                                                        			/**
                                                        			 * woocommerce_after_shop_loop_item_title hook
                                                        			 * @hooked woocommerce_template_loop_price - 5
                                                        			 * @hooked woocommerce_template_loop_rating - 10
                                                        			 */
                                                        			do_action( 'kt_after_shop_loop_item_title' );
                                                        		?>
                                                            </div>
                                                            <a class="btn-view-more" title="<?php _e( 'View More', 'kutetheme' ) ?>" href="<?php echo esc_url( $link ); ?>"><?php _e( 'View More', 'kutetheme' ) ?></a>
                                                        </div>
                                                    </div>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i ++ ; ?>
                                        <?php endif; ?>
                                        <?php wp_reset_query(); ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                
                                <?php endforeach; ?>
                                <?php //remove_filter( 'kt_template_loop_product_thumbnail_size', array( $this, 'kt_thumbnail_size' ) ); ?>
                            </div>
                        </div>
                    </div>
                    <?php elseif( $show_product == "false" ) : ?>
                        <?php if( $line_brand == '2-line' ): ?>
                            <div class="option7">
                                <!-- ./blog list -->
                                <div class="row-brand <?php echo esc_attr( $elementClass ); ?>">
                                    <?php if( $title ): ?>
                                        <h2 class="page-heading">
                                            <span class="page-heading-title"><?php echo esc_html( $title ) ; ?></span>
                                        </h2>
                                    <?php endif; ?>
                                    <ul class="band-logo no-product owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                        <?php for($i = 0; $i < count( $terms ); $i += 2 ): ?>
                                            <?php if( isset( $terms[ $i ] ) && $terms[ $i ] ): ?>
                                                <?php $term = $terms[ $i ]; ?>
                                                <li>
                                                    <h3><?php echo esc_html( $term->name ); ?></h3>
                                                    <?php if( isset( $terms[$i + 1] ) && $terms[$i + 1] ): ?>
                                                        <?php $term_2 = $terms[$i + 1]; ?>
                                                        <h3><?php echo esc_html( $term_2->name ); ?></h3>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                                <!-- ./blog list -->
                            </div>
                        <?php elseif( $line_brand =='show-logo'):?>
                            <div class="block-manufacturer-logo <?php echo esc_attr( $elementClass ); ?>">
                                <ul class="owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                    <?php foreach($terms as $term): ?>
                                        <?php
                                        $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
        
                                        if ( $thumbnail_id ) {
                                          $image = wp_get_attachment_image( intval( $thumbnail_id ), 'full' );
                                        } else {
                                            $image = "";
                                        }
                                        ?>
                                        <?php if($image):?>
                                        <li><a href="<?php echo get_term_link( $term); ?> "><?php echo $image;?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php elseif( $line_brand=="show-logo2"):?>
                            <div class="section-band-logo style2 <?php echo esc_attr( $elementClass ); ?>">
                                <ul class="owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                    <?php foreach($terms as $term): ?>
                                        <?php
                                        $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
        
                                        if ( $thumbnail_id ) {
                                          $image = wp_get_attachment_image( intval( $thumbnail_id ), 'full' );
                                        } else {
                                            $image = "";
                                        }
                                        ?>
                                        <?php if($image):?>
                                        <li><a href="<?php echo get_term_link( $term); ?> "><?php echo $image;?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <div class="<?php echo esc_attr( $elementClass ); ?> band-logo no-product owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                <?php foreach($terms as $term): ?>
                                    <h3><?php echo esc_html( $term->name ); ?></h3>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                <?php elseif( $show_product == "style3" ) : ?>
                    <div class="block-top-brands option-13 container-tab">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="head">
                                    <?php if( $title ): ?>    
                                        <div class="title">
                                            <div class="blank"></div>
                                            <div class="text"><?php echo esc_html( $title ); ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="tab">
                                        <ul class="list-brand nav-tab">
                                            <?php $i = 1; ?>
                                            <?php foreach($terms as $term): ?>
                                                <?php
                                                $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
                
                                                if ( $thumbnail_id ) {
                                                  $image = wp_get_attachment_image( intval( $thumbnail_id ), 'full' );
                                                } else {
                                                    $image = "";
                                                }
                                                ?>
                                                <?php if($image):?>
                                                    <li class="item<?php if( $i == 1 ): ?> active<?php endif; ?>">
                                                        <a data-toggle="tab" href="#brand-<?php echo esc_attr( $term->term_id ) ?>">
                                                            <?php echo apply_filters( 'kt_shortcode_brand_thumbnail', $image );?>
                                                        </a>
                                                    </li>
                                                    <?php $i ++ ; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="tab-container">
                                <?php $i = 1;
                                    foreach($terms as $term):
                                        $meta_query = WC()->query->get_meta_query();
                                        $args = array(
                                			'post_type'				=> 'product',
                                			'post_status'			=> 'publish',
                                			'ignore_sticky_posts'	=> 1,
                                			'posts_per_page' 		=> 5,
                                			'meta_query' 			=> $meta_query,
                                            'suppress_filter'       => true,
                                            'tax_query'             => array(
                                                array(
                                                    'taxonomy' => 'product_brand',
                                                    'field'    => 'id',
                                                    'terms'    => $term->term_id,
                                                    'operator' => 'IN'
                                                ),
                                            )
                                		);
                                        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                                        if( $products->have_posts() ): ?>
                                            <div id="brand-<?php echo esc_attr( $term->term_id ) ?>" class="tab-panel <?php if( $i ==1 ): ?>active<?php endif; ?>">
                                                <ul class="tab-products owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                                    <?php while( $products->have_posts() ): $products->the_post(); ?>
                                                        <li class="product-style3">
                                                            <?php wc_get_template_part( 'content', 'product-style3' ); ?>
                                                        </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            <div id="brand-<?php echo esc_attr( $term->term_id ) ?>" class="tab-panel <?php if( $i ==1 ): ?>active<?php endif; ?>">
                                                <h6><?php _e( 'Empty Product', 'kutetheme' ); ?></h6>
                                            </div>
                                        <?php endif; ?>
                                        <?php 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                        ?>
                                        <?php $i++ ; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: //Style 4 ?>
                    <div class="block-top-brands2 option-14 container-tab">
                        <?php if( $title ): ?>    
                            <h2 class="title"><?php echo esc_html( $title ) ?></h2>
                        <?php endif; ?>
                        <div class="list-brands owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                            <?php $i = 1; ?>
                            <?php foreach($terms as $term): ?>
                                <?php
                                $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );

                                if ( $thumbnail_id ) {
                                  $image = wp_get_attachment_image( intval( $thumbnail_id ), 'full' );
                                } else {
                                    $image = "";
                                }
                                ?>
                                <?php if($image):?>
                                    <a class="tab-nav <?php if( $i == 1 ): ?> active<?php endif; ?>" href="#brand14-<?php echo esc_attr( $term->term_id ) ?>">
                                        <?php echo apply_filters( 'kt_shortcode_brand_thumbnail', $image );?>
                                    </a>
                                    <?php $i ++ ; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="tab-container brand-products">
                            <?php $i = 1;
                            remove_action( 'kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
                            foreach($terms as $term):
                                $meta_query = WC()->query->get_meta_query();
                                $args = array(
                        			'post_type'				=> 'product',
                        			'post_status'			=> 'publish',
                        			'ignore_sticky_posts'	=> 1,
                        			'posts_per_page' 		=> 5,
                        			'meta_query' 			=> $meta_query,
                                    'suppress_filter'       => true,
                                    'tax_query'             => array(
                                        array(
                                            'taxonomy' => 'product_brand',
                                            'field'    => 'id',
                                            'terms'    => $term->term_id,
                                            'operator' => 'IN'
                                        ),
                                    )
                        		);
                                $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                                //
                                if( $use_responsive2 ) {
                                    $arr = array( 
                                        '0'   => array( 
                                            "items" => $items_mobile2 
                                        ), 
                                        '768' => array( 
                                            "items" => $items_tablet2 
                                        ), 
                                        '992' => array(
                                            "items" => $items_destop2
                                        )
                                    );
                                    $data_responsive = json_encode($arr);
                                    
                                    $data_carousel2["responsive"] = $data_responsive;
                                    
                                    if( ( $products->post_count <  $items_mobile ) || ( $products->post_count <  $items_tablet ) || ( $products->post_count <  $items_destop ) ){
                                        $data_carousel2['loop'] = 'false';
                                    }else{
                                        $data_carousel2['loop'] = $loop2;
                                    }
                                } else {
                                    $data_carousel2['items'] = 4;
                                    if( $products->post_count < 4 ){
                                        $data_carousel2['loop'] = 'false';
                                    }else{
                                        $data_carousel2['loop'] = $loop2;
                                    }
                                }
                                if( $products->have_posts() ): ?>
                                    <div id="brand14-<?php echo esc_attr( $term->term_id ) ?>" class="tab-panel <?php if( $i ==1 ): ?>active<?php endif; ?>">
                                        <ul class="list-bran-product owl-carousel" <?php echo _data_carousel($data_carousel2); ?>>
                                            <?php while( $products->have_posts() ): $products->the_post(); ?>
                                            <li class="product-style4">
                                                <?php wc_get_template_part( 'content', 'product-style4' ); ?>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div id="brand-<?php echo esc_attr( $term->term_id ) ?>" class="tab-panel empty_product <?php if( $i ==1 ): ?>active<?php endif; ?>">
                                        <h6><?php _e( 'Empty Product', 'kutetheme' ); ?></h6>
                                    </div>
                                <?php endif; ?>
                                <?php 
                                    wp_reset_query();
                                    wp_reset_postdata();
                                ?>
                                <?php $i++ ; ?>
                            <?php 
                            endforeach; 
                            add_action( 'kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
                            ?>
                        </div>
                    </div>
                <?php endif;//if( $show_product == "true" ) :
            endif;//if( ! is_wp_error($terms) && count( $terms ) > 0 ) :
        endif;//if( $tax ):
        $result = ob_get_contents();
        remove_filter( 'kt_product_thumbnail_loop', array( &$this, 'get_size_product' ) );
        ob_end_clean();
        return $result;
    }
    
    public function get_size_product( $size ){
        return $this->product_size;
    }
}