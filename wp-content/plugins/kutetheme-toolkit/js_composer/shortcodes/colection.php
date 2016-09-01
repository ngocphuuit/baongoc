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
    "name"        => __( "KT Colections", 'kutetheme'),
    "base"        => "kt_colection",
    "category"    => __('Kute Theme', 'kutetheme' ),
    "description" => __( "Display colections", 'kutetheme'),
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
            'description' => __( 'Display title box featured', 'kutetheme' )
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Display  type", 'kutetheme'),
            "param_name"  => "display_type",
            "admin_label" => true,
            'std'         => '1',
            'value'       => array(
                __( 'Style 1', 'kutetheme' ) => '1',
            ),
        ),
        array(
            "type"        => "kt_taxonomy",
            "taxonomy"    => "colection_cat",
            "class"       => "",
            "heading"     => __("Category", 'kutetheme'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => '',
            'multiple'    => true,
            'hide_empty'  => false,
            'placeholder' => __('Choose categoy', 'kutetheme'),
            "description" => __("Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'kutetheme')
        ),
        array(
            "type"        => "kt_number",
            "heading"     => __( "Number", 'kutetheme' ),
            "param_name"  => "number",
            "value"       => "4",
            "admin_label" => true,
            'description' => __( 'The number of colection put out from your site.', 'kutetheme' ),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'kutetheme' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
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
            "value"       => "200",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
        ),
        array(
            "type"        => "kt_number",
            "heading"     => __("Margin", 'kutetheme'),
            "param_name"  => "margin",
            "value"       => "30",
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

            'group'          => __( 'Design options', 'js_composer' )
        ),
    )
));

class WPBakeryShortCode_Kt_colection extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'kt_colection', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'title'         => '',
            'display_type'  =>'1',
            'taxonomy'   => '',
            'number'        => 4,
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 30,
            'slidespeed'     => 200,
            'css'            => '',
            'el_class'       => '',
            'nav'            => 'true',
            'loop'           => 'false',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 3,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
        ), $atts );
        extract($atts);
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '  ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' section8 block-collections ', '' ), implode( ' ', $elementClass ) );
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
        
        if( ! $taxonomy ){
			$terms = get_terms( 'colection_cat' ,array('hide_empty' => false));
        }else{
        	$taxonomy = explode(',', $taxonomy);
            
			$terms = get_terms( 'colection_cat', array('hide_empty' => false,'include'=>$taxonomy) );
        }
        ob_start(); ?>
        <!-- Style 1 -->
        <?php if( $display_type ==1 ): ?>
        <div class=" <?php echo esc_attr( $elementClass ); ?>">
        	<?php if( $title ):?>
        	<h3 class="section-title"><?php echo esc_html( $title );?></h3>
        	<?php endif;?>
        	<?php
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$count = count( $terms);
				?>
				<ul class="nav-tab tab-column-<?php echo $count;?>">
                    <?php
                    $i =0;
                    foreach( $terms as $term){
                    if( $i == 0 ) $class ="active"; else $class='';
                	?>
                		<li class="<?php echo esc_attr($class);?>"><a data-toggle="tab" href="#tab-colection-<?php echo esc_attr( $term->term_id );?>"><?php echo esc_html( $term->name );?></a></li>
                	<?php
                	$i++;
                    }
                    ?>
                </ul>
                <div class="tab-container">
                	<?php
                	$i= 0;
                    foreach( $terms as $term){
                    if( $i==0) $class ="active"; else $class='';
                	?>
                	<div id="tab-colection-<?php echo esc_attr( $term->term_id );?>" class="tab-panel <?php echo esc_attr( $class);?>">
                		<?php
                		$args = array(  
							'post_type'      => 'colection', 
							'post_status' 	 => 'publish',
							'posts_per_page' => $number,
							'tax_query' 	 => array(
								array(
									'taxonomy' => 'colection_cat',
									'field'    => 'ID',
									'terms'    => $term->term_id,
								),
							),
				        );
				        $colections = new WP_Query(  $args );
                        
				        if( $colections->have_posts() ){  ?>
                        <?php 
                        if( ( $colections->post_count <=  1 ) ){
                            $data_carousel['loop'] = 'false';
                        }
                        
                        if( $use_responsive){
                            $arr = array(
                                '0' => array(
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
                            
                            // if( ( $colections->post_count <  $items_mobile ) || ( $colections->post_count <  $items_tablet ) || ( $colections->post_count <  $items_destop ) ){
                            //     $data_carousel['loop'] = 'false';
                            // }else{
                            //     $data_carousel['loop'] = $loop;
                            // }
                        }else{
                            $data_carousel['items'] =  $items_destop;
                            
                            // if( $colections->post_count <  3 ){
                            //     $data_carousel['loop'] = 'false';
                            // }else{
                            //     $data_carousel['loop'] = $loop;
                            // }
                        }

                        ?>
				        	<ul class="collection-list owl-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
				        		<?php
				        		$i = 1;
				        		while ( $colections->have_posts() ) {
				        			$colections->the_post();
				        			$_kt_page_colection_design = get_post_meta( get_the_ID(),'_kt_page_colection_design',true );
				        			?>
				        			<?php if( $i % 2 ): ?>
				        			<li class="item">
				        				<?php if( has_post_thumbnail( )):?>
				        				<div class="image banner-boder-zoom2">
				        					<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'colection-thumb' );?></a>
				        				</div>
				        				<?php endif;?>	
				        				<div class="info">
		                                    <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		                                    <div class="desc"><?php the_excerpt();?></div>
		                                    <?php if( $_kt_page_colection_design ):?>
		                                    <div class="author"><?php _e('Designed by','kutetheme');?>: <?php echo esc_html( $_kt_page_colection_design );?></div>
		                                	<?php endif;?>
		                                    <div class="collection-button">
		                                        <a href="<?php the_permalink();?>"><?php _e( 'View Collection', 'kutetheme' ) ; ?></a>
		                                    </div>
		                                </div>
				        			</li>
				        			<?php else:?>
				        			<li class="item">	
				        				<div class="info">
		                                    <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		                                    <div class="desc"><?php the_excerpt();?></div>
		                                    <?php if( $_kt_page_colection_design ):?>
		                                    <div class="author"><?php _e('Designed by','kutetheme');?>: <?php echo esc_html( $_kt_page_colection_design );?></div>
		                                	<?php endif;?>
		                                    <div class="collection-button">
		                                        <a href="<?php the_permalink();?>"><?php _e('View Collection','kutetheme');?></a>
		                                    </div>
		                                </div>
		                                <?php if( has_post_thumbnail( )):?>
				        				<div class="image banner-boder-zoom2">
				        					<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'colection-thumb' );?></a>
				        				</div>
				        				<?php endif;?>
				        			</li>
				        			<?php endif;?>
				        			<?php
				        			$i++;
				        		}
				        		?>
				        	</ul>
				        	<?php
				        }else{
				        	?>
				        	<p><?php _e('No colection','kutetheme');?></p>
				        	<?php
				        }
                		?>
                	</div>
                	<?php
                	$i++;
                	wp_reset_postdata();
                    }
                    ?>
                </div>
				<?php

			}
        	?>
        </div>
    	<?php endif;?>
        <!-- ./Style 1 -->
        <?php
        
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}