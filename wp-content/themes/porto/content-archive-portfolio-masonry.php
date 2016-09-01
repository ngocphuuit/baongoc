<?php

global $porto_settings, $porto_layout, $post, $porto_portfolio_columns, $porto_portfolio_view, $porto_portfolio_thumb, $porto_portfolio_thumb_bg, $porto_portfolio_thumb_image, $porto_portfolio_ajax_load, $porto_portfolio_ajax_modal;

$portfolio_columns = $porto_settings['portfolio-grid-columns'];

if ($porto_portfolio_columns)
    $portfolio_columns = $porto_portfolio_columns;

$portfolio_layout = 'masonry';
$portfolio_view = $porto_settings['portfolio-grid-view'];
$portfolio_thumb = $porto_portfolio_thumb ? $porto_portfolio_thumb : $porto_settings['portfolio-archive-thumb'];
$portfolio_thumb_bg = $porto_portfolio_thumb_bg ? $porto_portfolio_thumb_bg : $porto_settings['portfolio-archive-thumb-bg'];
$portfolio_thumb_image = $porto_portfolio_thumb_image ? $porto_portfolio_thumb_image : $porto_settings['portfolio-archive-thumb-image'];
$portfolio_show_link = $porto_settings['portfolio-archive-link'];
$portfolio_show_all_images = $porto_settings['portfolio-archive-all-images'];
$portfolio_images_count = $porto_settings['portfolio-archive-images-count'];
$portfolio_show_zoom = $porto_settings['portfolio-archive-zoom'];
$portfolio_ajax = $porto_settings['portfolio-archive-ajax'];
$portfolio_ajax_modal = $porto_settings['portfolio-archive-ajax-modal'];

if ($porto_portfolio_ajax_load == 'yes') $portfolio_ajax = true;
else if ($porto_portfolio_ajax_load == 'no') $portfolio_ajax = false;

if ($porto_portfolio_ajax_modal == 'yes') $portfolio_ajax_modal = true;
else if ($porto_portfolio_ajax_modal == 'no') $portfolio_ajax_modal = false;

if ($porto_portfolio_view && $porto_portfolio_view != 'classic')
    $portfolio_view = $porto_portfolio_view;

$item_classes = ' portfolio-col-'.$portfolio_columns.' ';
$item_cats = get_the_terms($post->ID, 'portfolio_cat');
if ($item_cats) {
    foreach ($item_cats as $item_cat) {
        $item_classes .= urldecode($item_cat->slug) . ' ';
    }
}

$featured_images = porto_get_featured_images();
$portfolio_link = get_post_meta($post->ID, 'portfolio_link', true);
$show_external_link = $porto_settings['portfolio-external-link'];

$attachment = porto_get_attachment($featured_images[0]['attachment_id']);
if ($portfolio_columns > 2 && $attachment) {
    if ($attachment['width'] > $attachment['height'] * abs($porto_settings['portfolio-archive-masonry-ratio'])) {
        $item_classes .= ' w2';
    }
}

$options = array();
$options['margin'] = 10;
$options['animateOut'] = 'fadeOut';
$options['autoplay'] = true;
$options['autoplayTimeout'] = 3000;
$options = json_encode($options);

$count = count($featured_images);

$classes = array();
$classes[] = 'thumb-info-no-borders';
if ($portfolio_thumb_bg)
    $classes[] = 'thumb-info-' . $portfolio_thumb_bg;

switch ($portfolio_thumb) {
    case 'centered-info': $classes[] = 'thumb-info-centered-info'; $portfolio_show_zoom = false; break;
    case 'bottom-info': $classes[] = 'thumb-info-bottom-info'; break;
    case 'bottom-info-dark': $classes[] = 'thumb-info-bottom-info thumb-info-bottom-info-dark'; break;
    case 'hide-info-hover': $classes[] = 'thumb-info-centered-info thumb-info-hide-info-hover'; break;
}

if ($count > 1 && $portfolio_show_all_images)
    $classes[] = 'thumb-info-no-zoom';
else if ($portfolio_thumb_image)
    $classes[] = 'thumb-info-' . $portfolio_thumb_image;

$ajax_attr = '';
if (!($show_external_link && $portfolio_link) && $portfolio_ajax) {
    $portfolio_show_zoom = $portfolio_show_all_images = false;
    if ($portfolio_ajax_modal)
        $ajax_attr = ' data-ajax-on-modal';
    else
        $ajax_attr = ' data-ajax-on-page';
}

if ($portfolio_show_zoom)
    $classes[] = 'thumb-info-centered-icons';

$class = implode(' ', $classes);

$zoom_src = array();
$zoom_title = array();

$cat_list = '';
$terms = get_the_terms( $post->ID, 'portfolio_cat' );
if ( !is_wp_error( $terms ) && !empty($terms) ) {
    $links = array();
    foreach ( $terms as $term ) {
        $links[] = $term->name;
    }
    $cat_list = join( ', ', $links );
}

if ($count) : ?>
    <article <?php post_class('portfolio portfolio-' . $portfolio_layout . $item_classes); ?>>
        <?php porto_render_rich_snippets(); ?>
        <div class="portfolio-item <?php echo $portfolio_view == 'outimage' ? 'align-center' : $portfolio_view ?>">
            <a class="text-decoration-none" href="<?php if ($show_external_link && $portfolio_link) echo $portfolio_link; else the_permalink() ?>"<?php echo $ajax_attr ?>>
                <span class="thumb-info <?php echo $class ?>">
                    <span class="thumb-info-wrapper">
                        <?php if ($count > 1 && $portfolio_show_all_images) : ?><div class="porto-carousel owl-carousel m-b-none nav-inside show-nav-hover" data-plugin-options="<?php echo esc_attr($options) ?>"><?php endif; ?>
                            <?php
                            $i = 0;
                            foreach ($featured_images as $featured_image) :
                                $attachment_id = $featured_image['attachment_id'];
                                $attachment = porto_get_attachment($attachment_id);
                                if ($attachment) :
                                    $zoom_src[] = $attachment['src'];
                                    $zoom_title[] = $attachment['caption'];
                                    ?>
                                    <img class="img-responsive<?php echo $portfolio_view == 'outimage' ? ' tf-none' : '' ?>" width="<?php echo $attachment['width'] ?>" height="<?php echo $attachment['height'] ?>" src="<?php echo $attachment['src'] ?>" alt="<?php echo $attachment['alt'] ?>" />
                                    <?php
                                    if (!$portfolio_show_all_images) break;
                                    $i++;
                                    if ($i >= $portfolio_images_count) break;
                                endif;
                            endforeach;
                            ?>
                            <?php if ($count > 1 && $portfolio_show_all_images) : ?></div><?php endif; ?>
                        <?php if ($portfolio_view != 'outimage') : ?>
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner<?php if ($portfolio_columns == 5 && ($porto_layout == 'fullwidth' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar')) echo ' font-size-sm'; if ($portfolio_columns == 6 && ($porto_layout == 'fullwidth' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar')) echo ' font-size-xs'; ?>"><?php the_title(); ?></span>
                                <?php
                                if (in_array('cats', $porto_settings['portfolio-metas']) && $cat_list) : ?>
                                    <span class="thumb-info-type"><?php echo $cat_list ?></span>
                                <?php endif ?>
                            </span>
                            <?php if ($portfolio_show_link || $portfolio_show_zoom) : ?>
                                <span class="thumb-info-action">
                                    <?php if ($portfolio_show_link) : ?>
                                        <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fa <?php echo $ajax_attr ? 'fa-plus-square' : 'fa-link' ?>"></i></span>
                                    <?php endif; ?>
                                    <?php if ($portfolio_show_zoom) : ?>
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light thumb-info-zoom" data-src="<?php echo esc_attr(json_encode($zoom_src)) ?>" data-title="<?php echo esc_attr(json_encode($zoom_title)) ?>"><i class="fa fa-search-plus"></i></span>
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </span>
                </span>
                <?php if ($portfolio_view == 'outimage') : ?>
                    <?php if ($portfolio_columns > 4) :?><h5 class="m-t-md m-b-none"><?php the_title(); ?></h5><?php
                    else : ?><h4 class="m-t-md m-b-none"><?php the_title(); ?></h4><?php endif; ?>
                    <?php
                    if (in_array('cats', $porto_settings['portfolio-metas']) && $cat_list) : ?>
                        <p class="m-b-sm color-body"><?php echo $cat_list ?></p>
                    <?php endif;
                endif; ?>
            </a>
        </div>
    </article>
<?php
endif;