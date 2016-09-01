<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Setting shortcode service
vc_map( array(
    "name"        => __( "Service", 'kutetheme'),
    "base"        => "service",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Display service box", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "kt_taxonomy",
            "taxonomy"    => "service_cat",
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
            "type"        => "textfield",
            "heading"     => __( "Items", 'kutetheme' ),
            "param_name"  => "items",
            "admin_label" => false,
            "std"         => 4,
            'description' => __( 'Display of items', 'kutetheme' )
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
            "description" => __("Designates the ascending or descending order.",'kutetheme')
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Display Style", 'kutetheme'),
            "param_name"  => "style",
            "admin_label" => true,
            "value"       => array(
                'Style 1'   => '1',
                'Style 2'   => '2',
                'Style 3'   => '3',
                'Style 4'   => '4',
            ),
            "std"         => 1,
            "description" => __("The description", 'kutetheme')
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Hide Border", 'kutetheme'),
            "param_name" => "hide_border",
            "value"      => array(
                __('No', 'kutetheme')  => 'no',
                __('Yes', 'kutetheme') => 'yes'
        	),
            'std'         => 'no',
            "description" => __("Hide border service box", 'kutetheme')
        ),
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'kutetheme' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
        )
    )
));
class WPBakeryShortCode_Service extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'service', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'items'         => 4,
            'taxonomy'      => '',
            'orderby'       => 'date',
            'order'         => 'desc',            
            'css_animation' => '',
            'hide_border'   => 'no',
            'el_class'      => '',
            'css'           => '',
            'style'         => 1
            
        ), $atts );
        extract($atts);
        
        if( $hide_border == 'yes' ){
            $class = 'hide_border';
        }else{
            $class = '';
        }
        $elementClass = array(
            'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts ),
            'extra' => $this->getExtraClass( $el_class ),
            'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $args = array(
              'post_type'      => 'service',
              'orderby'        => $orderby,
              'order'          => $order,
              'post_status'    => 'publish',
              'posts_per_page' => $items,
        );
        if( $taxonomy ){
            $args['tax_query'] = 
                array(
            		array(
                        'taxonomy' => 'service_cat',
                        'field'    => 'id',
                        'terms'    => explode( ",", $taxonomy )
            	)
            );
        }
        ob_start();
        $service_query = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
        if( $service_query->have_posts() ){
            if($style == 1):
            ?>
            <div class="service-wapper">
                <div class="service <?php echo esc_attr( $elementClass ); ?>">
                    <div class="row">
                    <?php
                    while( $service_query->have_posts() ):
                        $service_query->the_post();
                        
                        $meta = get_post_meta( get_the_ID());
                        $bootstrapColumn = round( 12 / $items );
                        ?>
                        <div class="col-xs-12 com-sm-6 col-md-<?php echo esc_attr( $bootstrapColumn );?> service-item">
                            <?php if(has_post_thumbnail()):?>
                            <div class="icon">
                                <?php the_post_thumbnail(array(40, 40));?>
                            </div>
                            
                            <?php endif;?>
                            <div class="info">
                                <a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
                                <?php if( isset( $meta['_kt_page_service_desc'] ) ):?>
                                    <span><?php echo esc_html( $meta['_kt_page_service_desc'][0] );?></span>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                    </div>
                </div>
            </div>
        <?php elseif($style == 2):?>
        <!-- Show display style 2 -->
        <div class="services2 <?php echo esc_attr( $elementClass ); ?>">
            <ul>
                <?php
                while ($service_query->have_posts()) {
                    $service_query->the_post();
                    $meta = get_post_meta( get_the_ID());
                    ?>
                    <li class="col-xs-12 col-sm-6 col-md-4 services2-item">
                        <div class="service-wapper">
                            <div class="row">
                                <div class="col-sm-6 image">
                                    <?php if(has_post_thumbnail()):?>
                                    <div class="icon">
                                        <?php the_post_thumbnail(array(64, 64));?>
                                    </div>
                                <?php endif;?>
                                    <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                </div>
                                <div class="col-sm-6 text">
                                    <?php if( isset( $meta['_kt_page_service_desc'] ) ):?>
                                        <?php echo esc_html( $meta['_kt_page_service_desc'][0] );?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>            
        <?php endif;?>

        <?php if( $style == 3):?>
        <?php if($service_query->have_posts() ): ?>
        <div class="service3 <?php echo esc_attr( $elementClass ); ?>"> 
            <div class="row">
                <?php
                while ($service_query->have_posts()) {
                    $service_query->the_post();
                    $_kt_page_service_desc = get_post_meta(get_the_ID(),'_kt_page_service_desc',true);
                    $bootstrapColumn = round( 12 / $items );
                ?>
                <div class="col-sm-12 col-md-<?php echo esc_attr( $bootstrapColumn );?>">
                    <div class="service-item">
                        <?php if(has_post_thumbnail()):?>
                            <div class="icon">
                                <?php the_post_thumbnail(array(50, 50));?>
                            </div>
                        <?php endif;?>
                        <div class="service-info">
                            <h3 class="service-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <?php if( $_kt_page_service_desc): ?>
                            <div class="service-desc"><?php echo esc_html( $_kt_page_service_desc );?></div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
         </div>
        <?php endif;?>
        <?php endif;?>

        <?php if( $style == 4):?>
        <?php if($service_query->have_posts() ): ?>
        <div class="service4 <?php echo esc_attr( $elementClass ); ?>"> 
            <div class="row">
                <?php
                while ($service_query->have_posts()) {
                    $service_query->the_post();
                    $_kt_page_service_desc = get_post_meta(get_the_ID(),'_kt_page_service_desc',true);
                    $bootstrapColumn = round( 12 / $items );
                ?>
                <div class="col-sm-12 col-md-<?php echo esc_attr( $bootstrapColumn );?>">
                    <div class="service-item">
                        <?php if(has_post_thumbnail()):?>
                            <div class="icon">
                                <?php the_post_thumbnail(array(70, 70));?>
                            </div>
                        <?php endif;?>
                        <div class="service-info">
                            <h3 class="service-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <?php if( $_kt_page_service_desc): ?>
                            <div class="service-desc"><?php echo esc_html( $_kt_page_service_desc );?></div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
         </div>
        <?php endif;?>
        <?php endif;?>
        <?php
        }
        wp_reset_postdata();
        wp_reset_query();
        $result = ob_get_clean();
        return $result;
    }
}