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
    <!-- featured category fashion -->
    <div class="category-featured container-tab">
        <nav class="navbar nav-menu nav-menu-red show-brand">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-brand">
                <a href="<?php echo  $term_link ? esc_url( $term_link ) : ''; ?>">
                    <?php echo wp_get_attachment_image( $icon, 'full' ); ?>
                    <?php  echo ( isset( $title ) && $title ) ? esc_html( $title ) : __( 'Tabs Name', 'kutetheme' );  ?>
                </a>
            </div>
            <a href="#" class="toggle-menu"></a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">           
                <ul class="nav navbar-nav">
                    <?php generate_tabs($id, $term->term_id, $per_page, $tabs, $ajax, $tabs_type, $banner_left ); ?>
                </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
          <div class="floor-elevator">
                <a href="#" class="btn-elevator up  fa fa-angle-up"></a>
                <a href="#" class="btn-elevator down fa fa-angle-down"></a>
          </div>
        </nav>
        <?php $banner_top_ids = explode( ',', $banner_top ); $count_banner_top = count( $banner_top_ids );
        if( is_array( $banner_top_ids ) && count( $count_banner_top ) > 0 ):
            $class = 12/ $count_banner_top; ?>
            <div class="category-banner">
                <?php foreach( $banner_top_ids as $b ): ?>
                    <?php $banner_top_html = wp_get_attachment_image( $b, 'full' ); ?>
                    <?php if( $banner_top_html ): ?>
                        <div class="col-sm-<?php echo esc_attr( $class ) ?> banner">
                            <a href="<?php echo  $term_link ? esc_url( $term_link ) : ''; ?>">
                                <?php echo $banner_top_html; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
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
        <?php endif; ?>
        <div class="product-featured clearfix">
            <?php if( is_array( $has_banner_left ) && count( $has_banner_left ) > 0 ): ?>
                <div class="banner-featured">
                    <?php if( isset($featured) && $featured ): ?>
                        <div class="featured-text">
                            <span>
                                <?php  _e( 'featured', 'kutetheme' ) ?>
                            </span>
                        </div>
                    <?php endif; ?>
                     <?php foreach($has_banner_left as $left): ?>
                        <div class="banner-img">
                            <a href="<?php echo ( $term_link ? esc_url( $term_link ) : '' ); ?>">
                                <?php echo balanceTags($left); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>  
            <?php endif; ?>
            <div class="product-featured-content">
                <div class="product-featured-list <?php if( is_array( $has_banner_left ) && count( $has_banner_left ) > 0 ): ?> has_attachment <?php endif; ?>">
                    <div class="tab-container enable-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                        <div class="cover-loading">
                            <img alt="loading" title="loading" src="<?php echo KUTETHEME_PLUGIN_URL ?>js_composer/assets/imgs/loading.gif" width="60" height="64" />
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
                                kt_template_tab_1( $products, $id_section_tab, $class_section_tab )
                            ?>
                                
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php if( isset( $tabs[0] ) && is_array( $tabs[0] ) && count( $tabs[0] ) > 0 ): ?>
                                <?php $products = kt_products( $tabs[0], $term->term_id, $meta_query, $per_page, $atts ); ?>
                                <?php kt_template_tab_1( $products, 'tab-' . $id . '-0', "active" ) ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div><!--./tab-container-->
                </div>
            </div>
       </div>
    </div>
    <!-- end featured category fashion -->
</div>