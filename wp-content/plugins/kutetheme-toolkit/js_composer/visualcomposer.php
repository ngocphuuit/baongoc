<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if( is_admin() ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/custom-fields.php';
}
$style_banner = array(
	__( 'Style 1', 'kutetheme' ) => 'style-1',
    __( 'Style 2', 'kutetheme' ) => 'style-2',
);
$product_thumbnail = array(
    __( 'Catalog Images', 'woocommerce' )     => 'shop_catalog',
    __( 'Product Thumbnails', 'woocommerce' ) => 'shop_thumbnail'
);

if ( kt_check_active_plugin( 'woocommerce/woocommerce.php' ) ) {
    $style_banner = array(
    	__( 'Style 1', 'kutetheme' ) => 'style-1',
        __( 'Style 2', 'kutetheme' ) => 'style-2',
        __( 'Style 3', 'kutetheme' ) => 'style-3',
        __( 'Style 4', 'kutetheme' ) => 'style-4'
    );
    
    $product_size = array(
        'kt_shop_catalog_131' => 131,
        'kt_shop_catalog_142' => 142,
        'kt_shop_catalog_164' => 164,
        'kt_shop_catalog_175' => 175,
        'kt_shop_catalog_193' => 193,
        'kt_shop_catalog_200' => 200,
        'kt_shop_catalog_204' => 204,
        'kt_shop_catalog_214' => 213,
        'kt_shop_catalog_248' => 248,
        'kt_shop_catalog_260' => 260,
        'kt_shop_catalog_270' => 270
        
    );
    $size   = get_option( 'shop_catalog_image_size', array() );
	$width  = isset( $size['width'] )  ? $size['width']  : 300;
	$height = isset( $size['height'] ) ? $size['height'] : 300;
    
    foreach( $product_size as $k => $w ){
        $w = intval( $w ); 
        $h = round( $height * $w / $width ) ;
        $key = $w . 'x' . $h;
        $product_thumbnail[ $key ] = $k;
    }
    
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/tab-category.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/tab-product.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/lastest_deals_sidebar.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/categories.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/lastest_deals.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/list_product.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/popular-cat.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/hot-deal-tab.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/hot-deal.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/box_product.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/featured_products.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/products_sidebar.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/category_carousel.php';
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/kt-product.php';
}


require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/service.php';
require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/brand.php';
require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/blog.php';
require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/adv_banner.php';
require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/look_books.php';
require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/colection.php';
require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/testimonial.php';
require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/banner-title.php';