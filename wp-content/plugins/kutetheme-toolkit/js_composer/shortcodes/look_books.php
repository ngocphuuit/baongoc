<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "KT Look Books", 'kutetheme'),
    "base" => "kt_look_books",
    "category" => __('Kute Theme', 'kutetheme' ),
    "description" => __( 'Display a banner text', 'kutetheme' ),
    "params" => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Per page', 'kutetheme' ),
            'value'       => '4',
            'default'     => '4',
            'param_name'  => 'columns',
            'admin_label' => false,
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __( "Overlay color", 'kutetheme' ),
            "param_name"  => "overlay_color",
            "admin_label" => true,
            "default"     =>'#000000'
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Overlay opacity', 'kutetheme' ),
            'value'       => array(
                __( '0.1', 'kutetheme' )      => '0.1',
                __( '0.2', 'kutetheme' )      => '0.2',
                __( '0.3', 'kutetheme' )      => '0.3',
                __( '0.4', 'kutetheme' )      => '0.4',
                __( '0.5', 'kutetheme' )      => '0.5',
                __( '0.6', 'kutetheme' )      => '0.6',
                __( '0.7', 'kutetheme' )      => '0.7',
                __( '0.8', 'kutetheme' )      => '0.8',
                __( '0.9', 'kutetheme' )      => '0.9',
                __( '1', 'kutetheme' )        => '1',
            ),
            'default'     =>'0.7',
            'param_name'  => 'overlay_opacity',
            'admin_label' => false,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Link submit photos", 'kutetheme' ),
            "param_name"  => "link_submit",
            "value"       => "#",
            "admin_label" => true,
            'description' => __( "You can set the custom link you want.", 'kutetheme' ),
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
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
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
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
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
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
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
            'type'        => 'css_editor',
            'heading'     => __( 'Css', 'js_composer' ),
            'param_name'  => 'css',
            'group'       => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
        ),
    ),
));

class WPBakeryShortCode_kt_look_books extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'kt_look_books', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'           => 'LOOK BOOKS',
            'sub_title'       => '',
            'columns'         => 4,
            'link_submit'     =>'#',
            'overlay_opacity' =>'0.7',
            'overlay_color'   =>'#000000',
            'el_class'        => '',
            'css'             => '',
            //Carousel            
            'autoplay'       => 0, 
            'navigation'     => 0,
            'margin'         => 30,
            'slidespeed'     => 200,
            'css'            => '',
            'el_class'       => '',
            'loop'           => 0,
            //Default
            'use_responsive' => 1,
            'items_destop'   => 3,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
        ), $atts );
        extract($atts);
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( 'section8 block-loock-bocks ', '' ), implode( ' ', $elementClass ) );
        if( $overlay_color =="") $overlay_color ="#000000";
        $overlay_color = kt_hex2rgb( $overlay_color );
        $args = array(
              'post_type'      => 'look-books',
              'post_status'    => 'publish',
              'posts_per_page' => $columns,
        );
        $look_book_query = new WP_Query(  $args );
        
        $data_carousel = array(
            "autoplay"           => ($autoplay == 1 ? "true" : "false"),
            "nav"                => ($navigation == 1 ? "true" : "false"),
            "margin"             => $margin,
            "smartSpeed"         => $slidespeed,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'dots'               => 'false',
            'loop'               => ( $loop == 1 ? "true" : "false" ),
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
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
            
            if( ( $look_book_query->post_count <=1 ) ){
                $data_carousel['loop'] = 'false';
            }
            
        }else{
            $data_carousel['items'] =  $items_destop;
            
            // if( ( $look_book_query->post_count <  3 ) ){
            //     $data_carousel['loop'] = 'false';
            // }else{
            //     $data_carousel['loop'] = $loop;
            // }
        }
        ob_start();
        ?>
        <div class="<?php echo esc_attr( $elementClass );?>">
            <div class="overlay" style="background-color: rgba(<?php echo esc_attr( $overlay_color['red'] );?>,<?php echo esc_attr( $overlay_color['green'] );?>,<?php echo esc_attr( $overlay_color['blue'] );?>,<?php echo esc_attr( $overlay_opacity );?>);"></div>
            <?php if( $title ): ?>
            <h3 class="section-title"><?php echo esc_html( $title );?></h3>
            <?php endif;?>
            <div class="container">
                <?php if( $look_book_query ->have_posts()):?>
                <ul class="loock-boock-list owl-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                    <?php while ( $look_book_query->have_posts()) :
                    $look_book_query->the_post();
                    $_kt_page_lookbook_location = get_post_meta( get_the_ID(),'_kt_page_lookbook_location',true );
                    ?>
                    <li class="">
                        <?php if(has_post_thumbnail()):?>
                        <?php 
                            $full_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" ); 
                        ?>
                        <div class="image">
                            <a class="fancybox" href="<?php echo esc_url( $full_image_src[0] );?>"><?php the_post_thumbnail( 'lookbook-thumb' );?></a>
                        </div>
                        <?php endif;?>
                        <div class="info">
                            <p class="name"><?php the_title();?></p>
                            <?php if( $_kt_page_lookbook_location ):?>
                            <p class="location"><?php echo esc_html( $_kt_page_lookbook_location );?></p>
                            <?php endif;?>
                        </div>
                    </li>
                    <?php endwhile;?>
                </ul>
                <div class="lock-boock-button">
                    <a href="<?php echo esc_url( $link_submit );?>"><?php _e('Submit Your Photos','kutetheme');?></a>
                    <a href="<?php echo get_post_type_archive_link( 'look-books' ); ?>"><?php _e('View All','kutethme');?></a>
                </div>
                <?php else:?>
                    <p><?php _e('No Look Book item.','kutetheme');?></p>
                <?php endif;?>
            </div>
        </div>
        <?php 
        wp_reset_query();
        wp_reset_postdata();
        return ob_get_clean();

    }

}