<?php get_header() ?>

<?php

global $porto_settings, $wp_query;

$term = $wp_query->queried_object;
$term_id = $term->term_id;

$faq_infinite = $porto_settings['faq-infinite'];

if ($faq_infinite) {
    global $wp_rewrite, $wp_query;

    $page_num = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $page_link = get_pagenum_link();
    $page_max_num = $wp_query->max_num_pages;

    if ( !$wp_rewrite->using_permalinks() || is_admin() || strpos($page_link, '?') ) {
        if (strpos($page_link, '?') !== false)
            $page_path = apply_filters( 'get_pagenum_link', $page_link . '&amp;paged=');
        else
            $page_path = apply_filters( 'get_pagenum_link', $page_link . '?paged=');
    } else {
        $page_path = apply_filters( 'get_pagenum_link', $page_link . user_trailingslashit( $wp_rewrite->pagination_base . "/" ));
    }
}

?>

<div id="content" role="main">

    <?php if (category_description()) : ?>
        <div class="page-content">
            <?php echo category_description() ?>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>

        <div class="page-faqs <?php if ($faq_infinite) echo ' infinite-container' ?> clearfix">

            <?php
            if ($porto_settings['faq-cat-sort-pos'] !== 'hide') {
                if ($porto_settings['faq-cat-sort-pos'] === 'sidebar' && !($porto_layout == 'widewidth' || $porto_layout == 'fullwidth')) {
                    add_action('porto_before_sidebar', 'porto_show_faq_tax_filter', 1);
                } else if ($porto_settings['faq-cat-sort-pos'] === 'content') {
                    $faq_taxs = array();

                    $taxs = get_categories(array(
                        'taxonomy' => 'faq_cat',
                        'child_of' => $term_id,
                        'orderby' => isset($porto_settings['faq-cat-orderby']) ? $porto_settings['faq-cat-orderby'] : 'name',
                        'order' => isset($porto_settings['faq-cat-order']) ? $porto_settings['faq-cat-order'] : 'asc'
                    ));

                    foreach ($taxs as $tax) {
                        $faq_taxs[urldecode($tax->slug)] = $tax->name;
                    }

                    // Show Filters
                    if (is_array($faq_taxs) && !empty($faq_taxs)) : ?>
                        <ul class="faq-filter nav nav-pills sort-source">
                            <li class="active" data-filter="*"><a href="#"><?php echo __('Show All', 'porto'); ?></a></li>
                            <?php foreach ($faq_taxs as $faq_tax_slug => $faq_tax_name) : ?>
                                <li data-filter="<?php echo esc_attr($faq_tax_slug) ?>"><a href="#"><?php echo esc_html($faq_tax_name) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <hr>
                    <?php endif;
                }
            }
            ?>

            <div class="faq-row <?php if ($faq_infinite) : ?> faqs-infinite<?php endif; ?>"<?php if ($faq_infinite) : ?> data-pagenum="<?php echo esc_attr($page_num) ?>" data-pagemaxnum="<?php echo esc_attr($page_max_num) ?>" data-path="<?php echo esc_url($page_path) ?>"<?php endif; ?>>
                <?php
                while (have_posts()) {
                    the_post();

                    get_template_part('content', 'archive-faq');
                }
                ?>
            </div>

            <?php porto_pagination(); ?>

        </div>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>

        <p><?php _e('Apologies, but no results were found for the requested archive.', 'porto'); ?></p>

    <?php endif; ?>

</div>

<?php get_footer() ?>