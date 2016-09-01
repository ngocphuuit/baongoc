<?php get_header() ?>

<?php
wp_reset_postdata();

global $porto_settings, $porto_layout;

$options = array();
$options['themeConfig'] = true;
if (isset($porto_settings['post-related-style']) && 'style-4' == $porto_settings['post-related-style']) {
    $options['lg'] = ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') ? 1 : 2;
    $options['md'] = 1;
    $options['sm'] = 1;
} else {
    $options['lg'] = ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') ? 3 : 4;
    $options['md'] = 3;
    $options['sm'] = 2;
}
$options = json_encode($options);
?>

<div id="content" role="main" class="<?php if ($porto_layout === 'widewidth' || $porto_layout === 'wide-left-sidebar' || $porto_layout === 'wide-right-sidebar') { echo 'm-t-lg m-b-xl'; if (porto_get_wrapper_type() !=='boxed') echo ' m-r-md m-l-md'; } ?>">

    <?php if (have_posts()) : the_post();
        $post_layout = get_post_meta($post->ID, 'post_layout', true);
        $post_layout = ($post_layout == 'default' || !$post_layout) ? $porto_settings['post-content-layout'] : $post_layout;
        ?>

        <?php get_template_part('content', 'post-' . $post_layout); ?>

        <?php
        if ($porto_settings['post-related']) :
            $related_posts = porto_get_related_posts($post->ID);
            if ($related_posts->have_posts()) : ?>
                <hr class="tall"/>
                <div class="related-posts">
                    <h4 class="sub-title"><?php echo __('Related <strong>Posts</strong>', 'porto'); ?></h4>
                    <div class="row">
                        <div class="post-carousel porto-carousel owl-carousel show-nav-title" data-plugin-options="<?php echo esc_attr($options) ?>">
                        <?php
                        while ($related_posts->have_posts()) {
                            $related_posts->the_post();

                            get_template_part('content', 'post-item');
                        }
                        ?>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        endif;
    endif; ?>

</div>

<?php get_footer() ?>