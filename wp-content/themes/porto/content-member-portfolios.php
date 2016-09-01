<?php
global $porto_settings, $porto_layout;

$portfolio_ids = get_post_meta(get_the_ID(), 'member_portfolios', true);
$portfolios = porto_get_portfolios_by_ids($portfolio_ids);

$options = array();
$options['themeConfig'] = true;
$options['lg'] = ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') ? 3 : 4;
$options['md'] = 3;
$options['sm'] = 2;
$options = json_encode($options);

if ($portfolios->have_posts()) : ?>
    <div class="post-gap"></div>

    <div class="related-portfolios <?php echo $porto_settings['portfolio-related-style'] ?>">
        <h4 class="sub-title"><?php echo __('My <strong>Work</strong>', 'porto'); ?></h4>
        <div class="row">
            <div class="portfolio-carousel porto-carousel owl-carousel show-nav-title" data-plugin-options="<?php echo esc_attr($options) ?>">
                <?php
                while ($portfolios->have_posts()) {
                    $portfolios->the_post();

                    get_template_part('content', 'portfolio-item');
                }
                ?>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_postdata();
?>