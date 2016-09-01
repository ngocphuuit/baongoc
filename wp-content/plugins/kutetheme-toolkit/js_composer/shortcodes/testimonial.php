<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "KT Testimonial", 'kutetheme'),
    "base" => "kt_testimonial",
    "category" => __('Kute Theme', 'kutetheme' ),
    "description" => __( 'Display a Testimonial slide', 'kutetheme' ),
    "params" => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true
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
                __( 'Style 3', 'kutetheme' )    => 'style-3',
        	),
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
            "default"     =>'#000000',
            "dependency"  => array("element" => "type","value" => array('style-1')),
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
            "dependency"  => array("element" => "type","value" => array('style-1')),
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __( "Main color", 'kutetheme' ),
            "param_name"  => "main_color",
            "admin_label" => true,
            "default"     =>'#f2e9e0',
            "dependency"  => array("element" => "type","value" => array('style-3')),
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __( "Text color", 'kutetheme' ),
            "param_name"  => "box_text_color",
            "admin_label" => true,
            "default"     =>'#333333',
            "dependency"  => array("element" => "type","value" => array('style-3')),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
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

class WPBakeryShortCode_kt_testimonial extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'kt_testimonial', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'           => __( 'TESTIMONIALS', 'kutetheme' ),
            'type'            => 'style-1',
            'sub_title'       => '',
            'columns'         => 4,
            'overlay_opacity' =>'0.7',
            'overlay_color'   =>'#000000',
            'main_color'      =>'#f2e9e0',
            'box_text_color'      =>'#333333',
            'el_class'        => '',
            'css'             => '',
            
        ), $atts );
        extract($atts);
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );

        if( $type == 'style-1' ) :
            $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( 'section8 block-testimonials ', '' ), implode( ' ', $elementClass ) );
        endif;
        if( $type == 'style-2'):
            $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( 'block-testimonials2 option12 ', '' ), implode( ' ', $elementClass ) );
        endif;
        if( $type == 'style-3'):
            $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        endif;
        if( $overlay_color == "" ) $overlay_color ="#000000";
        $overlay_color = kt_hex2rgb( $overlay_color );
        $args = array(
              'post_type'      => 'testimonial',
              'post_status'    => 'publish',
              'posts_per_page' => $columns,
        );
        $testimonial_query = new WP_Query(  $args );

        ob_start();
        if( $type == 'style-1' ) :
        ?>
        <div class="<?php echo esc_attr( $elementClass );?>">
            <div class="overlay" style="background-color: rgba(<?php echo esc_attr( $overlay_color['red'] );?>,<?php echo esc_attr( $overlay_color['green'] );?>,<?php echo esc_attr( $overlay_color['blue'] );?>,<?php echo esc_attr( $overlay_opacity );?>);"></div>
            <div class="container">
                <?php if( $title ):?>
                    <h3 class="section-title"><?php echo esc_html( $title );?></h3>
                    <?php endif; ?>
                    <?php if( $testimonial_query->have_posts()): ?>
                    <div class="testimonial-wapper">
                        <div class="testimonials">
                            <ul class="testimonial <?php echo is_rtl() ? 'testimonial-carousel-rtl' :'testimonial-carousel';?> ">
                            <?php
                            while ( $testimonial_query->have_posts()) {
                                $testimonial_query->the_post();
                                ?>
                                <li>
                                    <?php if( has_post_thumbnail( )):?>
                                    <div class="testimonial-image">
                                       <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('testimonial-thumb');?></a>
                                    </div>
                                    <?php endif;?>
                                    <div class="info">
                                        <?php the_content();?>
                                        <p class="testimonial-nane"><?php the_title( );?></p>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>
                        <div class="testimonial-caption"></div>
                    </div>
                    <?php endif;?>
            </div>
        </div>
        <?php elseif( $type == 'style-3'): ?>
        <?php if( $testimonial_query->have_posts()): ?>
        <?php
        $loop = "false";
        if( $testimonial_query->post_count > 1){
            $loop ="true";
        }
        ?>
        <div style="background-color:<?php echo esc_attr( $main_color );?>; color:<?php echo esc_attr( $box_text_color);?>;" data-color="<?php echo esc_attr( $main_color );?>" class="testtimonial-color block-testimonials3 <?php echo esc_attr( $elementClass );?>">
            <ul class="list owl-carousel" data-nav="false" data-dots="true" data-items="1" data-autoplay="true" data-loop="<?php echo $loop;?>">
                <?php while ( $testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
                        <li>
                        <div class="blank"></div>
                        <?php if( has_post_thumbnail( )):?>
                            <div class="image" style="border-color:<?php echo esc_attr( $main_color );?>">
                                    <?php the_post_thumbnail('testimonial-thumb');?>
                            </div>
                        <?php endif;?>
                        <div class="info">
                            <div class="text">
                                <?php the_content();?>
                            </div>
                            <span class="name">- <?php the_title( );?> -</span>
                        </div>
                    </li>
                    <?php endwhile; ?>
            </ul>
        </div>
        <?php endif;?>
        <?php  else: ?>
            <?php if( $testimonial_query->have_posts()): ?>
                <div class="<?php echo esc_attr( $elementClass );?>">
                    <ul class="list testimonial-carousel2" data-nav="false" data-dots="true" data-items="3">
                        <?php while ( $testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
                        <li>

                            <?php if( has_post_thumbnail( )):?>
                                <div class="image">
                                    <a href="#">
                                        <?php the_post_thumbnail('testimonial-thumb');?>
                                    </a>
                                </div>
                            <?php endif;?>
                            <div class="info">
                                <div class="text">
                                    <?php the_content();?>
                                </div>
                                <span class="name">- <?php the_title( );?> -</span>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <div class="testimonial-caption"></div>
                </div>
            <?php endif; ?>
        <?php endif;
        wp_reset_query();
        wp_reset_postdata();
        return ob_get_clean();

    }

}