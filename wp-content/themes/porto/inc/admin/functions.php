<?php

function porto_check_theme_options() {
    // check default options
    global $porto_settings;

    ob_start();
    include(porto_admin . '/theme_options/default_options.php');
    $options = ob_get_clean();
    $porto_default_settings = json_decode($options, true);

    foreach ($porto_default_settings as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                if ($key1 != 'google' && (!isset($porto_settings[$key][$key1]) || !$porto_settings[$key][$key1])) {
                    $porto_settings[$key][$key1] = $porto_default_settings[$key][$key1];
                }
            }
        } else {
            if (!isset($porto_settings[$key])) {
                $porto_settings[$key] = $porto_default_settings[$key];
            }
        }
    }

    return $porto_settings;
}

function porto_options_sidebars() {
    return array(
        'wide-left-sidebar',
        'wide-right-sidebar',
        'left-sidebar',
        'right-sidebar'
    );
}

function porto_options_body_wrapper() {
    return array(
        'wide' => array('alt' => 'Wide', 'img' => porto_options_uri.'/layouts/body_wide.jpg'),
        'full' => array('alt' => 'Full', 'img' => porto_options_uri.'/layouts/body_full.jpg'),
        'boxed' => array('alt' => 'Boxed', 'img' => porto_options_uri.'/layouts/body_boxed.jpg'),
    );
}

function porto_options_layouts() {
    return array(
        "widewidth" => array('alt' => 'Wide Width', 'img' => porto_options_uri.'/layouts/page_wide.jpg'),
        "wide-left-sidebar" => array('alt' => 'Wide Left Sidebar', 'img' => porto_options_uri.'/layouts/page_wide_left.jpg'),
        "wide-right-sidebar" => array('alt' => 'Wide Right Sidebar', 'img' => porto_options_uri.'/layouts/page_wide_right.jpg'),
        "fullwidth" => array('alt' => 'Without Sidebar', 'img' => porto_options_uri.'/layouts/page_full.jpg'),
        "left-sidebar" => array('alt' => "Left Sidebar", 'img' => porto_options_uri.'/layouts/page_full_left.jpg'),
        "right-sidebar" => array('alt' => "Right Sidebar", 'img' => porto_options_uri.'/layouts/page_full_right.jpg')
    );
}

function porto_options_wrapper() {
    return array(
        'wide' => array('alt' => 'Wide', 'img' => porto_options_uri.'/layouts/content_wide.jpg'),
        'full' => array('alt' => 'Full', 'img' => porto_options_uri.'/layouts/content_full.jpg'),
        'boxed' => array('alt' => 'Boxed', 'img' => porto_options_uri.'/layouts/content_boxed.jpg'),
    );
}

function porto_options_banner_wrapper() {
    return array(
        'wide' => array('alt' => 'Wide', 'img' => porto_options_uri.'/layouts/content_wide.jpg'),
        'boxed' => array('alt' => 'Boxed', 'img' => porto_options_uri.'/layouts/content_boxed.jpg'),
    );
}

function porto_options_header_types() {
    return array(
        '1' => array('alt' => 'Header Type 1', 'img' => porto_options_uri.'/headers/header_01.jpg'),
        '2' => array('alt' => 'Header Type 2', 'img' => porto_options_uri.'/headers/header_02.jpg'),
        '3' => array('alt' => 'Header Type 3', 'img' => porto_options_uri.'/headers/header_03.jpg'),
        '4' => array('alt' => 'Header Type 4', 'img' => porto_options_uri.'/headers/header_04.jpg'),
        '5' => array('alt' => 'Header Type 5', 'img' => porto_options_uri.'/headers/header_05.jpg'),
        '6' => array('alt' => 'Header Type 6', 'img' => porto_options_uri.'/headers/header_06.jpg'),
        '7' => array('alt' => 'Header Type 7', 'img' => porto_options_uri.'/headers/header_07.jpg'),
        '8' => array('alt' => 'Header Type 8', 'img' => porto_options_uri.'/headers/header_08.jpg'),
        '9' => array('alt' => 'Header Type 9', 'img' => porto_options_uri.'/headers/header_09.jpg'),
        '10' => array('alt' => 'Header Type 10', 'img' => porto_options_uri.'/headers/header_10.jpg'),
        '11' => array('alt' => 'Header Type 11', 'img' => porto_options_uri.'/headers/header_11.jpg'),
        '12' => array('alt' => 'Header Type 12', 'img' => porto_options_uri.'/headers/header_12.jpg'),
        '13' => array('alt' => 'Header Type 13', 'img' => porto_options_uri.'/headers/header_13.jpg'),
        '14' => array('alt' => 'Header Type 14', 'img' => porto_options_uri.'/headers/header_14.jpg'),
        '15' => array('alt' => 'Header Type 15', 'img' => porto_options_uri.'/headers/header_15.jpg'),
        '16' => array('alt' => 'Header Type 16', 'img' => porto_options_uri.'/headers/header_16.jpg'),
        '17' => array('alt' => 'Header Type 17', 'img' => porto_options_uri.'/headers/header_17.jpg'),
        'side' => array('alt' => 'Header Type(Side Navigation)', 'img' => porto_options_uri.'/headers/header_side.jpg'),


    );
}

function porto_options_footer_types() {
    return array(
        '1' => array('alt' => 'Footer Type 1', 'img' => porto_options_uri.'/footers/footer_01.jpg'),
        '2' => array('alt' => 'Footer Type 2', 'img' => porto_options_uri.'/footers/footer_02.jpg'),
        '3' => array('alt' => 'Footer Type 3', 'img' => porto_options_uri.'/footers/footer_03.jpg')


    );
}

function porto_demo_types() {
    return array(
        'landing' => array('alt' => 'Landing', 'img' => porto_options_uri.'/demos/landing.jpg'),
        'classic-original' => array('alt' => 'Classic Original', 'img' => porto_options_uri.'/demos/classic_original.jpg'),
        'classic-color' => array('alt' => 'Classic Color', 'img' => porto_options_uri.'/demos/classic_color.jpg'),
        'classic-light' => array('alt' => 'Classic Light', 'img' => porto_options_uri.'/demos/classic_light.jpg'),
        'classic-video' => array('alt' => 'Classic Video', 'img' => porto_options_uri.'/demos/classic_video.jpg'),
        'classic-video-light' => array('alt' => 'Classic Video Light', 'img' => porto_options_uri.'/demos/classic_video_light.jpg'),
        'corporate1' => array('alt' => 'Corporate 1', 'img' => porto_options_uri.'/demos/corporate_1.jpg'),
        'corporate2' => array('alt' => 'Corporate 2', 'img' => porto_options_uri.'/demos/corporate_2.jpg'),
        'corporate3' => array('alt' => 'Corporate 3', 'img' => porto_options_uri.'/demos/corporate_3.jpg'),
        'corporate4' => array('alt' => 'Corporate 4', 'img' => porto_options_uri.'/demos/corporate_4.jpg'),
        'corporate5' => array('alt' => 'Corporate 5', 'img' => porto_options_uri.'/demos/corporate_5.jpg'),
        'corporate6' => array('alt' => 'Corporate 6', 'img' => porto_options_uri.'/demos/corporate_6.jpg'),
        'corporate7' => array('alt' => 'Corporate 7', 'img' => porto_options_uri.'/demos/corporate_7.jpg'),
        'corporate8' => array('alt' => 'Corporate 8', 'img' => porto_options_uri.'/demos/corporate_8.jpg'),
        'corporate-hosting' => array('alt' => 'Corporate Hosting', 'img' => porto_options_uri.'/demos/corporate_hosting.jpg'),
        'corporate-digital-agency' => array('alt' => 'Corporate Digital Agency', 'img' => porto_options_uri.'/demos/corporate_digital_agency.jpg'),
        'corporate-law-office' => array('alt' => 'Corporate Law Office', 'img' => porto_options_uri.'/demos/corporate_law_office.jpg'),
        'shop1' => array('alt' => 'Shop 1', 'img' => porto_options_uri.'/demos/shop_1.jpg'),
        'shop2' => array('alt' => 'Shop 2', 'img' => porto_options_uri.'/demos/shop_2.jpg'),
        'shop3' => array('alt' => 'Shop 3', 'img' => porto_options_uri.'/demos/shop_3.jpg'),
        'shop4' => array('alt' => 'Shop 4', 'img' => porto_options_uri.'/demos/shop_4.jpg'),
        'shop5' => array('alt' => 'Shop 5', 'img' => porto_options_uri.'/demos/shop_5.jpg'),
        'shop6' => array('alt' => 'Shop 6', 'img' => porto_options_uri.'/demos/shop_6.jpg'),
        'shop7' => array('alt' => 'Shop 7', 'img' => porto_options_uri.'/demos/shop_7.jpg'),
        'shop8' => array('alt' => 'Shop 8', 'img' => porto_options_uri.'/demos/shop_8.jpg'),
        'shop9' => array('alt' => 'Shop 9', 'img' => porto_options_uri.'/demos/shop_9.jpg'),
        'shop10' => array('alt' => 'Shop 10', 'img' => porto_options_uri.'/demos/shop_10.jpg'),
        'dark' => array('alt' => 'Dark Original', 'img' => porto_options_uri.'/demos/dark_original.jpg'),
        'rtl' => array('alt' => 'RTL Original', 'img' => porto_options_uri.'/demos/rtl_original.jpg'),
    );
}

function porto_options_breadcrumbs_types() {
    return array(
        '1' => array('alt' => 'Breadcrumbs Type 1', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_01.jpg'),
        '2' => array('alt' => 'Breadcrumbs Type 2', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_02.jpg'),
        '3' => array('alt' => 'Breadcrumbs Type 3', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_03.jpg'),
        '4' => array('alt' => 'Breadcrumbs Type 4', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_04.jpg'),
        '5' => array('alt' => 'Breadcrumbs Type 5', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_05.jpg'),


    );
}


