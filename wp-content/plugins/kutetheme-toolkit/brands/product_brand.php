<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//Check exist WooCommerce product
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    final class KT_Product_Brand{
        public function __construct() {
            include_once( 'classes/taxonomies.php' );
        }
    }
    new KT_Product_Brand();
}