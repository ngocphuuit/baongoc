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
    "name"        => __( "Categories", 'kutetheme'),
    "base"        => "categories",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Display box categories same hot categories in option 1", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
            'description' => __( 'Display title box categories', 'kutetheme' )
        ),array(
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
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'kutetheme' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
        ),array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' )
		),
    )
));
class WPBakeryShortCode_Categories extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'categories', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'title'         => __('Hot Categories', 'kutetheme'),
            'taxonomy'      => '',
            'number'        => 3,
            'orderby'       => 'id',
            'order'         => 'desc',
            'hide'          => 0,
            
            'items_destop'  => 4,
            'items_tablet'  => 2,
            'items_mobile'  => 1,
            
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            
        ), $atts );
        extract($atts);
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'hot-categories row', $this->settings['base'], $atts ),
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
        $classes = 'col-xs-'.( 12 / $items_mobile ). ' col-sm-'. ( 12 / $items_tablet ). ' col-md-'.( 12 / $items_destop );
        // get terms and workaround WP bug with parents/pad counts
		$args = array(
			'orderby'    => 'id',
			'order'      => 'desc',
			'hide_empty' => 0,
            'include'    => $ids,
			'pad_counts' => true,
		);
        $product_categories = get_terms( 'product_cat', $args );
        
        $arg_child = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'hide_empty' => 0,
			'pad_counts' => true,
            'number'     => $number
		);
        
        ?>
        <div id="hot-categories" class="<?php echo esc_attr( $elementClass ); ?>">
            <div class="col-sm-12 group-title-box">
                <h2 class="group-title ">
                    <span><?php echo esc_html( $title ); ?></span>
                </h2>
            </div>
            <?php if( $product_categories ): ?>
                <?php foreach($product_categories as $term): 
                
                    $arg_child['parent'] = $term->term_id;
                    
                    $term_link = esc_attr(get_term_link( $term ) );
                    
                    $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );

            		if ( $thumbnail_id ) {
                        $image = wp_get_attachment_image( intval( $thumbnail_id ),'full', 0, array( 'class' => 'hot-cate-img' ) );
            		} else {
            			$image = "";
            		}
                    $children = get_terms( 'product_cat', $arg_child );
                ?>
                    <div class="<?php echo esc_attr($classes) ?> cate-box">
                        <div class="cate-tit">
                            <div class="div-1" style="width: 46%;">
                                <div class="cate-name-wrap">
                                    <p class="cate-name"><?php echo esc_html($term->name) ?></p>
                                </div>
                                <a href="<?php echo esc_url( $term_link ); ?>" class="cate-link link-active" data-ac="flipInX" ><span><?php _e('shop now', 'kutetheme') ?></span></a>
                            </div>
                            <div class="div-2" >
                                <?php if($image) : ?>
                                <a href="<?php echo esc_url( $term_link ); ?>">
                                    <?php echo apply_filters( 'kt_hot_category_image_' . $term->slug , $image) ?>
                                </a>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                        <?php if( count( $children ) >0 ): ?>
                        <div class="cate-content">
                            <ul>
                                <?php foreach($children as $child): ?>
                                    <?php $chil_link = esc_attr( get_term_link( $child ) ); ?>
                                    <li><a href="<?php echo esc_url( $chil_link ) ?>"><?php echo esc_html( $child->name ) ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div> <!-- /.cate-box -->
                <?php endforeach; ?>
            <?php endif; ?>                                                    
        </div> <!-- /#hot-categories -->
        <?php
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}