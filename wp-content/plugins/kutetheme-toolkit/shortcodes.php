<?php


/* SOCIAL SHORTCODE
================================================= */

function kt_social_icons($atts, $content = null) {
    extract(shortcode_atts(array(
        'type' => '',
        'size' => ''
    ), $atts));

    $facebook = kt_option('facebook_page_url');
    $twitter = kt_option('twitter_username');
    $pinterest = kt_option('pinterest_username');
    $dribbble = kt_option('dribbble_username');
    $vimeo = kt_option('vimeo_username');
    $tumblr = kt_option('tumblr_username');
    $skype = kt_option('skype_username');
    $linkedin = kt_option('linkedin_page_url');
    $googleplus = kt_option('googleplus_page_url');
    $youtube = kt_option('youtube_username');
    $instagram = kt_option('instagram_username');

    $social_icons = '';

    if ($type == '') {
        if ($facebook) {
            $social_icons .= '<a href="'.esc_url($facebook).'" title ="'.__( 'Facebook', 'kutetheme' ).'" ><i class="fa fa-facebook"></i></a>';
        }
        if ($twitter) {
            $social_icons .= '<a href="http://www.twitter.com/'.esc_attr($twitter).'" title = "'.__( 'Twitter', 'kutetheme' ).'" ><i class="fa fa-twitter"></i></a>';
        }
        if ($dribbble) {
            $social_icons .= '<a href="http://www.dribbble.com/'.esc_attr($dribbble).'" title ="'.__( 'Dribbble', 'kutetheme' ).'" ><i class="fa fa-dribbble"></i></a>';
        }
        if ($vimeo) {
            $social_icons .= '<a href="http://www.vimeo.com/'.esc_attr($vimeo).'" title ="'.__( 'Vimeo', 'kutetheme' ).'" ><i class="fa fa-vimeo-square"></i></a>';
        }
        if ($tumblr) {
            $social_icons .= '<a href="http://'.esc_attr($tumblr).'.tumblr.com/" title ="'.__( 'Tumblr', 'kutetheme' ).'" ><i class="fa fa-tumblr"></i></a>';
        } 
        if ($skype) {
            $social_icons .= '<a href="skype:'.esc_attr($skype).'" title ="'.__( 'Skype', 'kutetheme' ).'" ><i class="fa fa-skype"></i></a>';
        }
        if ($linkedin) {
            $social_icons .= '<a href="'.esc_attr($linkedin).'" title ="'.__( 'Linkedin', 'kutetheme' ).'" ><i class="fa fa-linkedin"></i></a>';
        }
        if ($googleplus) {
            $social_icons .= '<a href="'.esc_url( $googleplus ).'" title ="'.__( 'Google Plus', 'kutetheme' ).'" ><i class="fa fa-google-plus"></i></a>';
        }
        if ($youtube) {
            $social_icons .= '<a href="http://www.youtube.com/user/'.esc_attr( $youtube ).'" title ="'.__( 'Youtube', 'kutetheme' ).'"><i class="fa fa-youtube"></i></a>';
        }
        if ($pinterest) {
            $social_icons .= '<a href="http://www.pinterest.com/'.esc_attr( $pinterest ).'/" title ="'.__( 'Pinterest', 'kutetheme' ).'" ><i class="fa fa-pinterest-p"></i></a>';
        }
        if ($instagram) {
            $social_icons .= '<a href="http://instagram.com/'.esc_attr( $instagram ).'" title ="'.__( 'Instagram', 'kutetheme' ).'" ><i class="fa fa-instagram"></i></a>';
        }
        
        if ($vk) {
            $social_icons .= '<a href="https://vk.com/'.esc_attr( $vk ).'" title ="'.__( 'Vk', 'kutetheme' ).'" ><i class="fa fa-vk"></i></a>';
        }
    } else {

        $social_type = explode(',', $type);
        foreach ($social_type as $id) {
            if ($id == "facebook") {
                $social_icons .= '<a href="'.esc_url($facebook).'" title ="'.__( 'Facebook', 'kutetheme' ).'" ><i class="fa fa-facebook"></i></a>'."\n";
            }
            if ($id == "twitter") {
                $social_icons .= '<li class="twitter"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Twitter', 'kutetheme' ).'" href="http://www.twitter.com/'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></li>'."\n";
            }
            if ($id == "dribbble") {
                $social_icons .= '<li class="dribbble"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Dribbble', 'kutetheme' ).'" href="http://www.dribbble.com/'.$dribbble.'" target="_blank"><i class="fa fa-dribbble"></i></a></li>'."\n";
            }
            if ($id == "vimeo") {
                $social_icons .= '<li class="vimeo"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Vimeo', 'kutetheme' ).'" href="http://www.vimeo.com/'.$vimeo.'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>'."\n";
            }
            if ($id == "tumblr") {
                $social_icons .= '<li class="tumblr"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Tumblr', 'kutetheme' ).'" href="http://'.$tumblr.'.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a></li>'."\n";
            }
            if ($id == "skype") {
                $social_icons .= '<li class="skype"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Skype', 'kutetheme' ).'" href="skype:'.$skype.'" target="_blank"><i class="fa fa-skype"></i></a></li>'."\n";
            }
            if ($id == "linkedin") {
                $social_icons .= '<li class="linkedin"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Linkedin', 'kutetheme' ).'" href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>'."\n";
            }
            if ($id == "googleplus") {
                $social_icons .= '<li class="googleplus"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Google Plus', 'kutetheme' ).'" href="'.$googleplus.'" target="_blank"><i class="fa fa-google-plus"></i></a></li>'."\n";
            }
            if ($id == "youtube") {
                $social_icons .= '<li class="youtube"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Youtube', 'kutetheme' ).'" href="http://www.youtube.com/user/'.$youtube.'" target="_blank"><i class="fa fa-youtube"></i></a></li>'."\n";
            }
            if ($id == "pinterest") {
                $social_icons .= '<li class="pinterest"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Pinterest', 'kutetheme' ).'" href="http://www.pinterest.com/'.$pinterest.'/" target="_blank"><i class="fa fa-pinterest"></i></a></li>'."\n";
            }
            if ($id == "instagram") {
                $social_icons .= '<li class="instagram"><a data-toggle="tooltip" data-placement="top" title="'.__( 'Instagram', 'kutetheme' ).'" href="http://instagram.com/'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a></li>'."\n";
            }
        }
            if ($id == "vk") {
                $social_icons .= '<a href="https://vk.com/'.esc_attr( $vk ).'" title ="'.__( 'Vk', 'kutetheme' ).'" ><i class="fa fa-vk"></i></a>'."\n";
            }
    }

    $output = '<ul class="kt_social_icons '.$size.'">';
    $output .= $social_icons;
    $output .= '</ul>';

    return $output;
}

function kt_toolkit_shortcodes(){
    add_shortcode('kt_social', 'kt_social_icons');
    if( class_exists( 'RWMB_Helper' ) ){
        add_shortcode( 'rwmb_meta', array( 'RWMB_Helper', 'shortcode' ) );
    }
}

add_action('init','kt_toolkit_shortcodes');