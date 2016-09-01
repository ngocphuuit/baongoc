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
    "name"        => __( "List Products", 'kutetheme'),
    "base"        => "list_product",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( 'Show product in tab best sellers, on sales, new products on option 1', 'kutetheme' ),
    "params"      => array(
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Title', 'kutetheme' ),
            'value'       => __( 'Special Products', 'kutetheme' ),
            'param_name'  => 'title',
            'description' => __( 'The "per_page" shortcode determines how many products to show on the page', 'kutetheme' ),
            'admin_label' => false,
		),
        
        array(
            "type"        => "kt_categories",
            "heading"     => __("Choose Category", 'kutetheme'),
            "param_name"  => "cat",
            "admin_label" => true,
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Number Product', 'kutetheme' ),
            'param_name'  => 'number',
            'admin_label' => false,
            'value'       => array(
        		__( '2 Products', 'kutetheme' ) => '2',
        		__( '3 Products', 'kutetheme' ) => '3',
        		__( '4 Products', 'kutetheme' ) => '4',
        		__( '6 Products', 'kutetheme' ) => '6',
        	),
        	'description' => __( 'The total number of pages.', 'kutetheme' )
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Type', 'kutetheme' ),
            'param_name'  => 'types',
            'admin_label' => false,
            'value'       => array(
        		__( 'Best saler', 'kutetheme' )   => 'sale',
        		__( 'New arrivals', 'kutetheme' ) => 'arrival',
        		__( 'Most Reviews', 'kutetheme' ) => 'review'
        	),
        	'description' => __( 'Select type query of product', 'kutetheme' )
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'CSS Animation', 'kutetheme' ),
            'param_name'  => 'css_animation',
            'admin_label' => false,
            'value'       => array(
                __( 'No', 'kutetheme' )                 => '',
                __( 'Top to bottom', 'kutetheme' )      => 'top-to-bottom',
                __( 'Bottom to top', 'kutetheme' )      => 'bottom-to-top',
                __( 'Left to right', 'kutetheme' )      => 'left-to-right',
                __( 'Right to left', 'kutetheme' )      => 'right-to-left',
                __( 'Appear from center', 'kutetheme' ) => "appear"
        	),
        	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'kutetheme' )
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'kutetheme' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kutetheme' ),
            'group'          => __( 'Design options', 'kutetheme' ),
            'admin_label'    => false,
		),
    ),
));

class WPBakeryShortCode_List_Product extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'list_product', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'         => '',
            'cat'           => 0,
            'number'        => 4,
            'types'         => 'sale',
            'css_animation' => '',
            'el_class'      => '',
            'css'           => ''
            
        ), $atts );
        extract($atts);

        global $woocommerce_loop;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'popular-tabs ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        ob_start();
        $meta_query = WC()->query->get_meta_query();
        $query = array(
			'post_type'				=> 'product',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $number,
			'meta_query' 			=> $meta_query,
		);
        global $woocommerce_loop;
        $woocommerce_loop['columns'] = $number;
        
        if($cat > 0){
            $query['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    => $cat,
                ),
            );
        }
        
        if( $types == 'arrival' ){
            $query['orderby'] = 'date';
            $query['order']   = 'DESC';
        }
        
        if( $types == 'sale' ){
            $product_ids_on_sale = wc_get_product_ids_on_sale();
            $query['meta_key'] = 'total_sales';
            $query['orderby']  = 'meta_value_num';
            $query['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
        }
        
        if( $types  == 'review' ) {
            add_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }
        
        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $query, $atts ));
        
        if($types == 'review'){
            remove_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }
        
        if ( $products->have_posts() ) :
        ?>
        <div class="mega-group">
            <h4 class="mega-group-header"><span><?php echo esc_html( $title ); ?></span></h4>
            <div class="mega-products">
                <?php while ( $products->have_posts() ) : $products->the_post();?>
                    <?php wc_get_template_part( 'content', 'product-verticalmenu' ); ?>
                <?php endwhile; // end of the loop. ?>
            </div>
        </div>  
        <?php 
        endif;
        return ob_get_clean();
    }
    /**
	 * order_by_rating_post_clauses function.
	 *
	 * @access public
	 * @param array $args
	 * @return array
	 */
	public function order_by_rating_post_clauses( $args ) {
		global $wpdb;

		$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating ";

		$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";

		$args['join'] .= "
			LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
			LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
		";

		$args['orderby'] = "average_rating DESC, $wpdb->posts.post_date DESC";

		$args['groupby'] = "$wpdb->posts.ID";

		return $args;
	}

}