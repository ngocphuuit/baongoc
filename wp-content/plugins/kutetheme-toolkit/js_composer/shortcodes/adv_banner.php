<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "KT Banner text", 'kutetheme'),
    "base" => "kt_banner_text",
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
            "type"        => "textfield",
            "heading"     => __( "SubTitle", 'kutetheme' ),
            "param_name"  => "sub_title",
            "admin_label" => true
        ),
        array(
            "type"        => "attach_image",
            "heading"     => __("Background Image", 'kutetheme'),
            "param_name"  => "img",
            "admin_label" => false,
            'description' => __( 'It shows background image of banner', 'kutetheme' )
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Button text", 'kutetheme' ),
            "param_name"  => "button_text",
            "admin_label" => false
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Link", 'kutetheme'),
            "param_name"  => "link",
            "admin_label" => false,
            'description' => __( 'It shows link.', 'kutetheme' )
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

class WPBakeryShortCode_kt_banner_text extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'kt_banner_text', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'  => '',
            'sub_title'=>'',
            'img'=>'',
            'button_text'=>'Shop now',
            'link'    => '#',
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
        
        $att_icon_url ="";
        if( $img ){
            $att_icon = wp_get_attachment_image_src( $img , 'full' );  
            $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : ''; 
        }

        ob_start();
        ?>
        <div class="<?php echo esc_attr( $elementClass );?> banner-boder-zoom2 banner-text">
            <?php if( $att_icon_url && $att_icon_url !=""): ?>
            <a href="<?php echo esc_url( $link );?>"><img src="<?php echo esc_url( $att_icon_url );?>" alt=""></a>
            <?php endif; ?>
            <div class="banner-content">
                <?php if( $title !=""):?>
                <h2 class="banner-title"><?php echo esc_html( $title );?></h2>
                <?php endif;?>
                <?php if( $sub_title !=""):?>
                <div class="banner-desc"><?php echo esc_html( $sub_title );?></div>
                <?php endif;?>
                <a href="<?php echo esc_url( $link );?>" class="banner-button"><?php echo esc_html( $button_text );?></a>
            </div>
        </div>
        <?php 
        return ob_get_clean();
    }
    

}