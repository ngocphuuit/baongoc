<?php 
    remove_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5);

    remove_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
    
    add_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    
    add_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
?>
<div class="<?php echo esc_attr( $elementClass ); ?>">
<!-- box product fashion -->
<div class="box-products option7 fashion container-tab <?php if( $align == 'right' ) : ?> right <?php endif; ?>" id="change-color-<?php echo esc_attr( $id ); ?>" data-target="change-color" data-color="<?php echo esc_attr( $main_color ); ?>" data-rgb="<?php echo esc_attr( implode( ',', $main_color_rgb ) );  ?>">
    <div class="box-product-head">
        <div class="box-product-head-left">
            <div class="box-title">
                <span class="icon"><?php echo wp_get_attachment_image( $icon, 'full' ); ?></span>
                <span class="text"><?php  echo ( isset( $title ) && $title ) ? esc_html( $title ) : __( 'Tabs Name', 'kutetheme' );  ?></span>
            </div>
        </div>
        <div class="box-product-head-right">
            <ul class="box-tabs nav-tab">
                <?php generate_tabs($id, $term->term_id, $per_page, $tabs, $ajax, $tabs_type, $banner_left ); ?>
            </ul>
            <div class="floor-elevator">
                <a href="#" class="btn-elevator up fa fa-angle-up"></a>
                <a href="#" class="btn-elevator down fa fa-angle-down"></a>
            </div>
        </div>
    </div>
    <div class="box-produts-content">
        <?php if( ! kt_is_mobile() ): ?>
            <div class="block-product-left">
                <?php if ( isset($subcats) && ! is_wp_error( $subcats ) && count( $subcats ) > 0 ) : ?>
                    <div class="block-sub-cat owl-carousel" data-items="1" data-nav="true" data-loop="false" data-dots="false">
                        <?php foreach( $subcats as $i => $cate ): ?>
                            <?php if( $i % $number_slide == 0 ): ?>
                                <ul class="list-cat">
                            <?php endif; ?>
                                <li><a href="<?php echo get_term_link( $cate ); ?>"><?php echo esc_html( $cate->name ); ?></a></li>
                            <?php if( ( $i % $number_slide ) == ( $number_slide - 1 ) ):  ?>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        
                        <?php if( ( $i % $number_slide ) > 0 ):  ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <?php $banner_left_ids = explode( ',', $banner_left ); $count_banner_left = count( $banner_left_ids ); ?>
                <?php $has_banner_left = array(); ?>
                <?php if( $count_banner_left > 0 ): ?>
                    <?php foreach($banner_left_ids as $l) :  $banner_left_html = wp_get_attachment_image( $l, 'full' ); ?>
                        <?php if( $banner_left_html ): $has_banner_left[] = $banner_left_html; ?>
                            <div class="block-box-products-banner banner-img">
                                <a href="<?php echo esc_url( $term_link ) ? esc_url( $term_link ) : ''; ?>">
                                    <?php echo $banner_left_html;?>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach;?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="block-product-right">
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
                        kt_template_tab_6( $products, $id_section_tab, $class_section_tab,$number_column )
                    ?>
                        
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php if( isset( $tabs[0] ) && is_array( $tabs[0] ) && count( $tabs[0] ) > 0 ): ?>
                        <?php $products = kt_products( $tabs[0], $term->term_id, $meta_query, $per_page, $atts ); ?>
                        <?php kt_template_tab_6( $products, 'tab-' . $id . '-0', "active",$number_column ) ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div><!--./tab-container-->
        </div>
    </div>
</div>
<!-- ./box product fashion -->
</div>
<?php 
remove_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        
remove_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5);

add_action('kt_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
?>