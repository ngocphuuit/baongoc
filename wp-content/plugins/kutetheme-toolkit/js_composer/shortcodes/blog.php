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
     "name"        => __( "Blogs", 'kutetheme'),
     "base"        => "blog_carousel",
     "category"    => __('Kute Theme', 'kutetheme' ),
     "description" => __( "Display blog by carousel", 'kutetheme'),
     "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Display Style", 'kutetheme'),
            "param_name" => "style",
            "value"      => array(
                __('Style 1', 'kutetheme') => 'style-1',
                __('Style 2', 'kutetheme') => 'style-2',
                __('Style 3', 'kutetheme') => 'style-3',
                __('Style 4', 'kutetheme') => 'style-4',
                __('Style 5', 'kutetheme') => 'style-5'
        	),
            'std'         => 'DESC',
            "description" => __("Show blog carousel by difference style.",'kutetheme')
        ),
        array(
            'type'  => 'textfield',
            'heading'     => __( 'Subtitle', 'kutetheme' ),
            'param_name'  => 'subtitle',
            'admin_label' => false,
            "dependency"  => array("element" => "style","value" => array('style-4','style-5')),
		),
        array(
            "type"        => "textfield",
            "heading"     => __( "Number Post", 'kutetheme' ),
            "param_name"  => "per_page",
            'std'         => 10,
            "admin_label" => false,
            'description' => __( 'Number post in a slide', 'kutetheme' )
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
                __('ASC', 'kutetheme') => 'ASC',
                __('DESC', 'kutetheme') => 'DESC'
        	),
            'std'         => 'DESC',
            "description" => __("Designates the ascending or descending order.",'kutetheme')
        ),
        // Carousel
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'AutoPlay', 'kutetheme' ),
            'param_name'  => 'autoplay',
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Navigation', 'kutetheme' ),
            'param_name'  => 'navigation',
            'description' => __( "Show buton 'next' and 'prev' buttons.", 'kutetheme' ),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Loop', 'kutetheme' ),
            'param_name'  => 'loop',
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'kutetheme' ),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            "type"        => "kt_number",
            "heading"     => __("Slide Speed", 'kutetheme'),
            "param_name"  => "slidespeed",
            "value"       => "250",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "kt_number",
            "heading"     => __("Margin", 'kutetheme'),
            "param_name"  => "margin",
            "value"       => "0",
            "suffix"      => __("px", 'kutetheme'),
            "description" => __('Distance( or space) between 2 item', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'std'         => 1,
            'heading'     => __( 'Use Carousel Responsive', 'kutetheme' ),
            'param_name'  => 'use_responsive',
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'kutetheme' ),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
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
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' ),
            'admin_label'    => false,
		),
        
    )
));

class WPBakeryShortCode_Blog_Carousel extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'blog_carousel', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'          => __( 'From the blog', 'kutetheme' ),
            'subtitle'       => '',
            'per_page'       => 10,
            'orderby'        => 'date',
            'order'          => 'desc',
            
            'style'          => 'style-1',
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 30,
            'slidespeed'     => 250,
            'css'            => '',
            'css_animation'  => '',
            'el_class'       => '',
            'loop'           => 'true',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 4,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
        ), $atts ) );
        
         global $woocommerce_loop;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $data_carousel = array(
            "autoplay"           => $autoplay,
            "nav"                => $navigation,
            "margin"             => $margin,
            "smartSpeed"         => $slidespeed,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'dots'               => 'false',
            'loop'               => $loop,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
        
        
        $args = array(
			'post_type'				=> 'post',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $per_page,
            'suppress_filter'       => true,
            'orderby'               => $orderby,
            'order'                 => $order
		);
        $posts = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
        $temping_post_thumbnail = KUTETHEME_PLUGIN_URL . 'js_composer/assets/imgs/post-thumbnail.png';
        
        ob_start();
        if( $posts->have_posts() ):
            if( $posts->post_count <=1 ){
                $data_carousel['loop'] = 'false';
            }

            if( $use_responsive ){
                $arr = array( 
                    '0'   => array( 
                        "items" => $items_mobile 
                    ), 
                    '768' => array( 
                        "items" => $items_tablet 
                    ), 
                    '992' => array(
                        "items" => $items_destop
                    )
                );
                $data_responsive = json_encode($arr);
                $data_carousel["responsive"] = $data_responsive;
                // if( ( $posts->post_count <  $items_mobile ) || ( $posts->post_count <  $items_tablet ) || ( $posts->post_count <  $items_destop ) ){
                //     $data_carousel['loop'] = 'false';
                // }
            }else{
                $data_carousel['items'] = $items_destop;
                // if( ( $posts->post_count <  4 ) ){
                //     $data_carousel['loop'] = 'false';
                // }else{
                //     $data_carousel['loop'] = $loop;
                // }
            }
            if( $style == 'style-2' ):
            ?>
            <div class="option7">
                <!-- ./box product diltal -->
                <div class="row-blog <?php echo esc_attr( $elementClass ); ?>">
                    <!-- blog list -->
                    <div class="blog-list">
                        <h2 class="page-heading">
                            <span class="page-heading-title"><?php echo esc_html( $title ) ?></span>
                        </h2>
                        <div class="blog-list-wapper">
                            <ul class="owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                <?php add_filter( 'excerpt_length', 'kt_custom_blog_excerpt_length' ); ?>
                                <?php while( $posts->have_posts() ): $posts->the_post(); ?>
                                    <li>
                                        <?php if( has_post_thumbnail() ): ?>
                                            <div class="post-thumb image-hover2">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php
                                                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "kt_post_blog_268x255" );
                                                    if( $thumbnail_src ):?>
                                                        <img width="<?php echo esc_attr( $thumbnail_src[1])?>" height="<?php echo esc_attr( $thumbnail_src[2])?>" alt="<?php the_title() ?>" class="owl-lazy attachment-post-thumbnail wp-post-image" src="<?php echo esc_url( $temping_post_thumbnail ); ?>" data-src="<?php echo esc_url( $thumbnail_src[0] ) ?>" />
                                                    <?php else: ?>
                                                        <img width="<?php echo esc_attr( $thumbnail_src[1])?>" height="<?php echo esc_attr( $thumbnail_src[2])?>" alt="<?php the_title() ?>" class="owl-lazy attachment-post-thumbnail wp-post-image" src="<?php echo esc_url( $temping_post_thumbnail ) ?>" />
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="post-desc">
                                            <h5 class="post-title">
                                                <a  href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                            </h5>
                                            <div class="post-meta">
                                                <span class="date"><?php echo get_the_date('F j, Y');?></span>
                                            </div>
                                            <div class="desc">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <?php if( has_tag() ): ?>
                                                <div class="meta-tags">
                                                   <i class="fa fa-tag"></i>
                                                   <?php the_tags() ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                                <?php remove_filter( 'excerpt_length', 'kt_custom_blog_excerpt_length' ); ?>  
                            </ul>
                        </div>
                    </div>
                    <!-- ./blog list -->
                </div>
            </div>
            <?php
            endif;
            if( $style == 'style-1' ):                
            ?>
            <!-- blog list -->
            <div class="blog-list <?php echo esc_attr( $elementClass ); ?>">
                <h2 class="page-heading">
                    <span class="page-heading-title"><?php echo esc_html( $title ) ?></span>
                </h2>
                <div class="blog-list-wapper">
                    <ul class="owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                        <?php while( $posts->have_posts() ): $posts->the_post(); ?>
                        <li>
                            <?php if( has_post_thumbnail() ): ?>
                            <div class="post-thumb image-hover2">
                                                      
                                <a href="<?php the_permalink() ?>">
                                    <?php
                                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "kt_post_blog_268x255" );
                                    if( $thumbnail_src ):
                                    ?>
                                    <img width="<?php echo esc_attr( $thumbnail_src[1])?>" height="<?php echo esc_attr( $thumbnail_src[2])?>" alt="<?php the_title() ?>" class="owl-lazy attachment-post-thumbnail wp-post-image" src="<?php echo esc_url( $temping_post_thumbnail ); ?>" data-src="<?php echo esc_url( $thumbnail_src[0] ) ?>" />
                                    <?php else: ?>
                                        <img width="<?php echo esc_attr( $thumbnail_src[1])?>" height="<?php echo esc_attr( $thumbnail_src[2])?>" alt="<?php the_title() ?>" class="owl-lazy attachment-post-thumbnail wp-post-image" src="<?php echo esc_url( $temping_post_thumbnail ) ?>" />
                                    <?php endif; ?>
                                 </a>
                            </div>
                            <?php endif; ?>
    
                            <div class="post-desc">
                                <h5 class="post-title">
                                    <a  href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                </h5>
                                <div class="post-meta">
                                    <span class="date"><?php echo get_the_date('F j, Y');?></span>
                                    <span class="comment">
                                        <?php comments_number(
                                            __('0 Comment', 'kutetheme'),
                                            __('1 Comment', 'kutetheme'),
                                            __('% Comments', 'kutetheme')
                                        ); ?>
                                    </span>
                                </div>
                                <div class="readmore">
                                    <a href="<?php the_permalink() ?>"><?php _e( 'Readmore', 'kutetheme' ) ?></a>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <!-- ./blog list -->
            <?php
            endif;
            if( $style == 'style-3'):
            ?>
            <div class="block-blogs <?php echo esc_attr( $elementClass ); ?>">
                <?php if( $title ):?>
                <h3 class="section-title"><?php echo esc_html( $title ) ?></h3>
                <?php endif; ?>
                <div class="blog-list">
                    <div class="blog-list-wapper">
                        <ul class="owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                            <?php while( $posts->have_posts() ): $posts->the_post(); ?>
                            <li>
                                <?php if( has_post_thumbnail( ) ): ?>
                                <div class="post-thumb image-hover2">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'kt_post_blog_268x255' );?></a>
                                </div>
                                <?php endif; ?>
                                <div class="post-desc">
                                    <h5 class="post-title">
                                        <a href="<?php the_permalink();?>"><?php the_title( );?></a>
                                    </h5>
                                    <div class="post-meta">
                                        <span class="date"><?php echo get_the_date('F j, Y');?></span>
                                        <span class="comment">
                                        <?php comments_number(
                                            __('0 Comment', 'kutetheme'),
                                            __('1 Comment', 'kutetheme'),
                                            __('% Comments', 'kutetheme')
                                        ); ?>
                                        </span>
                                    </div>
                                    <div class="readmore">
                                        <a href="<?php the_permalink();?>"><?php _e('Readmore','kutetheme');?></a>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            endif;
            if( $style == 'style-4'):
            ?>
            <div class="section-blog-12 option12 <?php echo esc_attr( $elementClass ); ?>">
                <div class="section-title-12"><?php echo esc_html( $title ) ?>
                    <?php if( ! empty( $subtitle ) ): ?>
                        <span class="sub-title"><?php echo esc_html( $subtitle ); ?></span>
                    <?php endif; ?>
                </div>
                <?php if( $posts->have_posts() ): ?>
                    <div class="blogs-list owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                        <?php while( $posts->have_posts() ): $posts->the_post(); ?>
                        <div class="blog12">
                            <?php if( has_post_thumbnail( ) ): ?>
                                <div class="thumb banner-boder-zoom2">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'lookbook-thumb' );?></a>
                                </div>
                            <?php endif; ?>
                            <div class="info">
                                <span class="date"><?php echo get_the_date('j F');?></span>
                                <h2 class="blog-title"><a href="<?php the_permalink();?>"><?php the_title( );?></a></h2>
                                <a href="<?php the_permalink();?>" class="read-more"><?php _e( 'Read more', 'kutetheme' ) ?></a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif;?>
            <?php if( $style == 'style-5' ):?>
            <div class="<?php echo esc_attr( $elementClass );?>">
                <?php if( $title && $subtitle ):?>
                <div class="section-title-2">
                    <h2><?php echo esc_html( $title );?></h2>
                    <span class="subtitle"><?php echo esc_html( $subtitle );?></span>
                </div>
                <?php endif;?>
                <?php if($posts->have_posts()):?>
                <div class="lasttest-blog11 owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                    <?php $i = 1; while( $posts->have_posts()): $posts->the_post(); ?>
                    <?php if( $i%2 ):?>
                    <div class="item-blog">
                        <?php if( has_post_thumbnail()):?>
                        <div class="thumb banner-boder-zoom2">
                            <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail( 'lookbook-thumb');?>
                            </a>
                            <span class="cat"><?php echo get_the_date('F j, Y');?></span>
                        </div>
                        <?php endif;?>
                        <div class="info">
                            <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title( );?></a></h2>
                            <div class="desc"><?php the_excerpt(); ?></div>
                            <a class="readmore" href="<?php the_permalink();?>"><?php _e('Readmore','kutetheme');?></a>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="item-blog">
                        <div class="info">
                            <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title( );?></a></h2>
                            <div class="desc"><?php the_excerpt(); ?></div>
                            <a class="readmore" href="<?php the_permalink();?>"><?php _e('Readmore','kutetheme');?></a>
                        </div>
                        <?php if( has_post_thumbnail()):?>
                        <div class="thumb banner-boder-zoom2">
                            <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail( 'lookbook-thumb');?>
                            </a>
                            <span class="cat"><?php echo get_the_date('F j, Y');?></span>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php endif;?>
                    <?php $i++; endwhile;?>
                </div>
                <?php endif;?>
            </div>
            <?php endif;?>
        <?php
        endif;
        wp_reset_query();
        wp_reset_postdata();
        
        $result = ob_get_clean();
        return $result;
    }
}