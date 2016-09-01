<?php 
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="<?php echo esc_attr( $elementClass ); ?>" id="change-color-<?php echo esc_attr( $id ); ?>" data-target="change-color" data-color="<?php echo esc_attr( $main_color ); ?>" data-rgb="<?php echo esc_attr( implode( ',', $main_color_rgb ) );  ?>">
    <!-- featured category Digital -->
    <div class="category-featured digital container-tab">
        <nav class="navbar nav-menu show-brand">
          <div class="container-fuild">
            <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-brand">
                <a href="<?php echo  $term_link ? esc_url( $term_link ) : ''; ?>">
                    <?php echo wp_get_attachment_image( $icon,'full'); ?>
                    <?php  echo ( isset( $title ) && $title ) ?  esc_html( $title ) : __( 'Tabs Name', 'kutetheme' );  ?>
                </a>
              </div>
              <a href="#" class="toggle-menu"></a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">           
                <ul class="nav navbar-nav">
                    <?php generate_tabs($id, $term->term_id, $per_page, $tabs, $ajax, $tabs_type, $banner_left, $number_column ); ?>
                </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
          <div class="floor-elevator">
                <a href="#" class="btn-elevator up fa fa-angle-up"></a>
                <a href="#" class="btn-elevator down fa fa-angle-down"></a>
          </div>
        </nav>
       <div class="product-featured clearfix" <?php echo isset($style) ? $style : '';  ?>>
            <div class="row">
                <?php $has_banner_left = array(); ?>
                <?php if( ! kt_is_mobile() ): ?>
                    <?php if( ! is_wp_error( $subcats ) && count( $subcats ) > 0 ) : ?>
                        <div class="col-sm-2 sub-category-wapper">
                            <ul class="sub-category-list">
                                <?php foreach( $subcats as $cate ): ?>
                                    <?php $cate_link = get_term_link($cate); ?>
                                    <li><a href="<?php echo esc_url( $cate_link ); ?>"><?php echo esc_html( $cate->name ) ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <?php $number_per_slide = 8; ?>
                    <?php $banner_left_ids = explode( ',', $banner_left ); $count_banner_left = count( $banner_left_ids ); ?>
                    <?php $has_banner_left = array(); ?>
                    <?php if( $count_banner_left > 0 ): ?>
                        <?php foreach($banner_left_ids as $l) :  ?>
                            <?php 
                                $banner_left_html = wp_get_attachment_image( $l, 'full' );
                                if( $banner_left_html )
                                    $has_banner_left[] = $banner_left_html;
                            ?>
                        <?php endforeach;?>
                        <?php if( count( $has_banner_left ) > 0 ) : ?>
                            <div class="col-sm-2 manufacture-list">
                                <div class="manufacture-waper">
                                    <div class="owl-carousel-vertical" data-items="1" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false">
                                        <?php foreach( $has_banner_left as $i => $bf ): ?>
                                            <?php if( $i % $number_per_slide == 0 ): ?>
                                            <div class="item">
                                                <ul>
                                            <?php endif; ?>
                                            <li>
                                                <a href="<?php echo  $term_link ? esc_url( $term_link ) : ''; ?>">
                                                    <?php echo balanceTags( $bf );?>
                                                </a>
                                            </li>
                                            <?php if( ( $i % $number_per_slide ) == ( $number_per_slide - 1 ) ): ?>
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        
                                        <?php if( ( $count_banner_left % $number_per_slide ) > 0 ): ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                
            <?php if( ! kt_is_mobile() ):  ?>
                <?php if( is_wp_error( $subcats ) || count( $subcats ) < 1 ): ?>
                    <?php if( count( $has_banner_left ) < 1 ) : ?>
                        <div class="col-sm-12 col-right-tab">
                    <?php else: ?>
                        <div class="col-sm-10 col-right-tab">
                    <?php endif; ?>
                <?php else: ?>
                    <?php if( count( $has_banner_left ) < 1 ) : ?>
                        <div class="col-sm-10 col-right-tab">
                    <?php else: ?>
                        <div class="col-sm-8 col-right-tab">
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="col-sm-12 col-right-tab">
            <?php endif; ?>
                    <div class="product-featured-tab-content">
                        <div class="tab-container enable-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                            <div class="cover-loading">
                                <img src="<?php echo KUTETHEME_PLUGIN_URL ?>js_composer/assets/imgs/loading.gif" width="60" height="64" />
                            </div>
                            <?php  $meta_query = WC()->query->get_meta_query(); ?>
                            <?php if( ! $ajax ): ?>
                                <?php foreach( $tabs as $i => $tab ): ?>
                                    <?php
                                        $products = kt_products( $tab, $term->term_id, $meta_query, $per_page, $atts); 
                                        
                                        $id_section_tab = 'tab-' . $id . '-' . $i;
                                        
                                        $class_section_tab = "";
                                        if( $i == 0 ){
                                            $class_section_tab = "active";
                                        }
                                        kt_template_tab_4( $products, $number_column, $id_section_tab, $class_section_tab )
                                    ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php if( isset( $tabs[0] ) && is_array( $tabs[0] ) && count( $tabs[0] ) > 0 ): ?>
                                    <?php $products = kt_products( $tabs[0], $term->term_id, $meta_query, $per_page, $atts ); ?>
                                    <?php kt_template_tab_4( $products, $number_column, 'tab-' . $id . '-0', "active" ) ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div><!--./tab-container-->
                    </div>
                </div>
            </div>
       </div>
    </div>
    <!-- end featured category Digital-->
</div>