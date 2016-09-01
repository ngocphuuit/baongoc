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
     "name"        => __( "Popular Category", 'kutetheme'),
     "base"        => "popular_category",
     "category"    => __('Kute Theme', 'kutetheme' ),
     "description" => __( "Display popular category", 'kutetheme'),
     "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
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
        	),
        ),
        array(
            'type'        => 'attach_image',
            'heading'     => __( 'Box background', 'kutetheme' ),
            'param_name'  => 'box_background',
            "dependency"  => array("element" => "type","value" => array('style-2')),
            'description' => __( 'Setup background for the box', 'kutetheme' )
        ),
        array(
            "type"        => "kt_taxonomy",
            "taxonomy"    => "product_cat",
            "class"       => "",
            "heading"     => __("Category", 'kutetheme'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => 0,
            'multiple'    => false,
            'placeholder' => __('Choose categoy', 'kutetheme'),
            "description" => __("Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'kutetheme')
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Number Child Category", 'kutetheme' ),
            "param_name"  => "per_page",
            'std'         => 5,
            "admin_label" => false,
            'description' => __( 'Number child category be showed', 'kutetheme' )
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order by", 'kutetheme'),
            "param_name" => "orderby",
            "value"      => array(
        		__('None', 'kutetheme')     => 'none',
                __('ID', 'kutetheme')       => 'ID',
                __('Author', 'kutetheme')   => 'author',
                __('Name', 'kutetheme')     => 'name',
                __('Date', 'kutetheme')     => 'date',
                __('Modified', 'kutetheme') => 'modified',
                __('Rand', 'kutetheme')     => 'rand',
        	),
            'std'         => 'date',
            "description" => __("Select how to sort retrieved posts.",'kutetheme'),
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order", 'kutetheme'),
            "param_name" => "order",
            "value"      => array(
                __('ASC', 'kutetheme')  => 'ASC',
                __('DESC', 'kutetheme') => 'DESC'
        	),
            'std'         => 'DESC',
            "description" => __("Designates the ascending or descending order.", 'kutetheme')
        ),
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' ),
            'admin_label'    => false,
		),
        
    )
));

class WPBakeryShortCode_Popular_Category extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'popular_category', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'         => '',
            'type'          => 'style-1',
            'box_background'=> 0,
            'taxonomy'      => '',
            'per_page'      => 5,
            'orderby'       => 'date',
            'order'         => 'desc',
            'css'           => '',
            'css_animation' => '',
            'el_class'      => '',
        ), $atts ) );
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        ob_start();
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $term = get_term( $taxonomy, 'product_cat' );
        
        if( ! is_wp_error($term) && $term ):
            $link = get_term_link($term);
            
            $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
    		
            if ( $thumbnail_id ) {
    			$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                if( is_array($image) && isset($image[0]) && $image[0] ){
                    $image = $image[0];
                }else{
                    $image = "";
                }
    		} else {
    			$image = "";
    		}
            // get bg
            $bg = wp_get_attachment_image_src( $box_background, 'full');
            $args = array(
               'hierarchical'     => 1,
               'show_option_none' => '',
               'hide_empty'       => 0,
               'parent'           => $term->term_id,
               'taxonomy'         => 'product_cat',
               'number'           => $per_page
            );
            if( $bg ){
                $image = $bg[0];
            }

            $subcats = get_categories($args);
            if( $type == 'style-1' ): ?>
                <div class="block-popular-cat <?php echo esc_attr( $elementClass ); ?>">
                    <div class="parent-categories"><?php echo  $title ? esc_html( $title ) : esc_html( $term->name ) ?></div>
                    <div class="block-popular-inner">
                        <?php if( $image): ?>
                        <div class="image banner-boder-zoom2">
                            <a href="<?php echo esc_url( $link ); ?>">
                                <img src="<?php echo esc_url( $image ) ?>" alt="<?php echo esc_attr( $term->name ) ?>" class="popular-cate-img" />
                            </a>
                        </div>
                        <?php endif;?>
                        <div class="sub-categories">
                            <ul>
                                <?php foreach( $subcats as $cate ): ?>
                                    <?php $cate_link = get_term_link($cate); ?>
                                    <li><a href="<?php echo esc_url( $cate_link ); ?>"><?php echo esc_html( $cate->name ) ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="<?php echo esc_url( $link ); ?>" class="more"><?php _e( 'More', 'kutetheme' ) ?></a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Block cat -->
                <div class="section-bolock-cat option12 <?php echo esc_attr( $elementClass ); ?>">
                    <div class="block-cat" style="background-image: url('<?php echo esc_url( $image ) ?>');">
                        <ul class="sub-cat">
                            <?php foreach( $subcats as $cate ): ?>
                                <?php $cate_link = get_term_link($cate); ?>
                                <li><a href="<?php echo esc_url( $cate_link ); ?>"><?php echo esc_html( $cate->name ) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url( $link ); ?>" class="read-more"><?php _e( 'View all', 'kutetheme' ) ?></a>
                    </div>
                </div>
                <!-- Block cat -->
            <?php endif;
        endif;
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}