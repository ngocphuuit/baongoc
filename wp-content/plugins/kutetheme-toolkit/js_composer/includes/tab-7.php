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
<!-- Tab category -->
<div class="block-tab-category <?php echo esc_attr( $elementClass ); ?>" id="change-color-<?php echo esc_attr( $id ); ?>" data-target="change-color" data-color="<?php echo esc_attr( $main_color ); ?>" data-rgb="<?php echo esc_attr( implode( ',', $main_color_rgb ) );  ?>">
    <div class="container-tab">
        <div class="head">
            <h2 class="title">
                <span class="bar"><i class="fa fa-bars"></i><i class="fa fa-times"></i></span>
                <?php  echo ( isset( $title ) && $title ) ? esc_html( $title ) : __( 'Tabs Name', 'kutetheme' );  ?>
            </h2>
            <ul class="box-tabs nav-tab">
                <?php generate_tabs($id, $term->term_id, $per_page, $tabs, $ajax, $tabs_type, $banner_left ); ?>
            </ul>
        </div>
        <div class="inner <?php echo ( ! kt_is_mobile() && $banner_left ) ? 'has_thumbnail_left' : '' ?>">
            <?php if( ! kt_is_mobile() ): ?>
            <div class="block-banner">
                <?php if ( ! is_wp_error($subcats) && count($subcats) > 0 ) : ?>
                    <ul class="tab-cat">
                        <?php foreach( $subcats as $cate ): ?>
                            <?php 
                                $cate_link = get_term_link( $cate ); 
                                $thumbnail_id = get_woocommerce_term_meta( $cate->term_id, 'thumbnail_id', true );
                                $image = wp_get_attachment_url( $thumbnail_id, array( 18, 18 ) );
                            ?>
                            <?php if( ! is_wp_error( $image ) && $image ) : ?>
                                <li class="has-thumbnail">
                                    <a href="<?php echo esc_url( $cate_link ); ?>">
                                        <img class="img-1" src="<?php echo esc_url( $image ) ; ?>"  alt="<?php echo esc_html( $cate->name ); ?>" />
                                        <?php echo esc_html( $cate->name ); ?>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo esc_url( $cate_link ); ?>"><?php echo esc_html( $cate->name ); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                
                <?php $banner_left_ids = explode( ',', $banner_left ); $count_banner_left = count( $banner_left_ids ); ?>
                <?php $has_banner_left = array(); ?>
                <?php if( $count_banner_left > 0 ): ?>
                    <?php foreach($banner_left_ids as $l) :  ?>
                        <?php  $banner_left_html = wp_get_attachment_image( $l, 'full' ); ?>
                        <?php if( $banner_left_html ): ?>
                            <?php $has_banner_left[] = $banner_left_html; ?>
                            <div class="banner-img has_thumbnail">
                                <a href="<?php echo  $term_link ? esc_url( $term_link ) : ''; ?>">
                                    <?php echo balanceTags( $banner_left_html ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach;?>
                <?php endif; ?>
                
            </div>
            <?php endif; ?>
            <div class="block-content">
                <div class="tab-container enable-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                    <div class="cover-loading">
                        <img src="<?php echo KUTETHEME_PLUGIN_URL ?>js_composer/assets/imgs/loading.gif" width="60" height="64" />
                    </div>
                    <?php  $meta_query = WC()->query->get_meta_query(); ?>
                    <?php if( ! $ajax ): ?>
                        <?php foreach( $tabs as $i => $tab ): 
                            $products = kt_products( $tab, $term->term_id, $meta_query, $per_page, $atts); 
                            
                            $id_section_tab = 'tab-' . $id . '-' . $i;
                            
                            $class_section_tab = "";
                            if( $i == 0 ){
                                $class_section_tab = "active";
                            }
                            kt_template_tab_7( $products, $id_section_tab, $class_section_tab,$number_column )
                        ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php if( isset( $tabs[0] ) && is_array( $tabs[0] ) && count( $tabs[0] ) > 0 ): ?>
                            <?php $products = kt_products( $tabs[0], $term->term_id, $meta_query, $per_page, $atts ); ?>
                            <?php kt_template_tab_7( $products, 'tab-' . $id . '-0', "active", $number_column ) ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div><!--./tab-container-->
            </div>
        </div>
    </div><!--./container tab-->
</div>
<!-- ./Tab category -->