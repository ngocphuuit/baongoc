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
    "name"        => __( "Categories Carousel", 'kutetheme'),
    "base"        => "category_carousel",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Display box categories same hot categories in option 11", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __("Title", 'kutetheme'),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Sub title", 'kutetheme'),
            "param_name"  => "subtitle",
            "admin_label" => false,
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
            "type"        => "attach_image",
            "heading"     => __("Banner Image", 'kutetheme'),
            "param_name"  => "banner_image",
            "admin_label" => true,
            'description' => __( 'It shows the image of banner', 'kutetheme' ),
        ),
        array(
            "type"        => "kt_number",
            "heading"     => __( "Number", 'kutetheme' ),
            "param_name"  => "number",
            "value"       => "3",
            "admin_label" => true,
            'description' => __( 'The `number` field is used to display the number of subcategory.', 'kutetheme' )
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Order by', 'js_composer' ),
            'param_name' => 'orderby',
            'value'      => array(
                __( 'Id', 'kutetheme' )    => 'id',
                __( 'Count', 'kutetheme' ) => 'count',
                __( 'Name', 'kutetheme' )  => 'name',
                __( 'Slug', 'kutetheme' )  => 'slug',
                __( 'Term Group ', 'kutetheme' )  => 'term_group',
                __( 'None', 'kutetheme' )  => 'none',
            )
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Order Way', 'js_composer' ),
            'param_name' => 'order',
            'value'      => array(
                __( 'Descending', 'js_composer' ) => 'desc',
                __( 'Ascending', 'js_composer' )  => 'asc'
			)
		),
        
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Hide Empty', 'js_composer' ),
            'param_name' => 'hide',
            'value'      => array(
                __( 'Yes', 'js_composer' ) => '1',
                __( 'No', 'js_composer' )  => '0'
			)
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
            'admin_label' => false
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
            'admin_label' => false
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
            'admin_label' => false
		),
        array(
            "type"        => "kt_number",
            "heading"     => __("Slide Speed", 'kutetheme'),
            "param_name"  => "slidespeed",
            "value"       => "250",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("Margin", 'kutetheme'),
            "param_name"  => "margin",
            "value"       => "0",
            "suffix"      => __("px", 'kutetheme'),
            "description" => __('Distance( or space) between 2 item', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false
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
            "value"       => "3",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
            "param_name"  => "items_tablet",
            "value"       => "2",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'kutetheme'),
            "param_name"  => "items_mobile",
            "value"       => "1",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The numbers of item on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'kutetheme' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
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
class WPBakeryShortCode_Category_Carousel extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'category_carousel', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'title'         =>'',
            'subtitle'      =>'',
            'taxonomy'      => '',
            'banner_image'  => '',
            'number'        => 3,
            'orderby'       => 'id',
            'order'         => 'desc',
            'hide'          => 0,
            
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 0,
            'slidespeed'     => 250,
            'css'            => '',
            'css_animation'  => '',
            'el_class'       => '',
            'nav'            => 'false',
            'loop'           => 'false',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 3,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            
        ), $atts );
        extract($atts);
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        ob_start();
        
        if($taxonomy){
            $ids = explode( ',',$taxonomy );
        }else{
            $ids = array();
        }
        // get terms and workaround WP bug with parents/pad counts
		$args = array(
			'orderby'    => 'id',
			'order'      => 'desc',
			'hide_empty' => 0,
            'include'    => $ids,
			'pad_counts' => true,
		);
        
        $product_categories = get_terms( 'product_cat', $args );
        $count_product = count( $product_categories );
        
        $banner_url = "";
        if( $banner_image ){
            $banner = wp_get_attachment_image_src( $banner_image , 'full' );  
            $banner_url =  is_array($banner) ? esc_url($banner[0]) : ''; 
        }
        ?>
        <div class="hot-cat-section11 option11 parallax" style="background-image: url('<?php echo apply_filters( 'kt_shortcode_category_carousel_bg_parallax', $banner_url ? $banner_url : '/images/paralax11.jpg' ) ; ?>');">
            <div class="overlay"></div>
            <?php if( $product_categories && $count_product ): ?>
                <?php 
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
                    if( $count_product <=1 ){
                        $data_carousel2['loop'] = 'false';
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
                        
                        // if( ( $count_product <  $items_mobile ) || ( $count_product <  $items_tablet ) || ( $count_product <  $items_destop ) ){
                        //     $data_carousel2['loop'] = 'false';
                        // }else{
                        //     $data_carousel2['loop'] = $loop;
                        // }
                    }else{
                        if( $product_column > 0 )
                            $data_carousel['items'] =  $product_column;
                        
                        // if( $count_product <  $product_column ){
                        //     $data_carousel2['loop'] = 'false';
                        // }else{
                        //     $data_carousel2['loop'] = $loop;
                        // }
                    } 
                    
                ?>
                <?php if($title):?>
                <div class="section-title-2">
                    <h2><?php echo esc_html( $title );?></h2>
                    <?php if( $subtitle):?>
                    <span class="subtitle"><?php echo esc_html( $subtitle );?></span>
                    <?php endif;?>
                </div>
            <?php endif;?>
                <div class="hot-cat-9 owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                   <?php foreach($product_categories as $term): 
                        $term_link = esc_attr(get_term_link( $term ) );
                        $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
                        ?>
                       <div class="cat-item">
                            <?php if ( $thumbnail_id ) : ?>
                                <div class="icon">
                                    <a href="<?php echo esc_url( $term_link ); ?>">
                                        <?php echo wp_get_attachment_image( intval( $thumbnail_id ), 'full', 0, array( 'class' => 'hot-cate-thumbnail' ) ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="info">
                                <h3 class="cat-title">
                                    <a href="<?php echo esc_url( $term_link ); ?>">
                                        <?php echo esc_html($term->name) ?>
                                    </a>
                                </h3>
                                <div class="desc"> <?php echo esc_html( $term->description ) ?> </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}