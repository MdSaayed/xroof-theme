<?php
function xroof_breadcrumb()
{
    global $post;

    if (is_front_page() && is_home()) {
        $title = esc_html__('Home', 'xroof');
    } elseif (is_front_page()) {
        $title = esc_html__('Front Page', 'xroof');
    } elseif (is_home()) {
        $title = get_option('page_for_posts') ? get_the_title(get_option('page_for_posts')) : esc_html__('Blog', 'xroof');
    } elseif (is_singular('post')) {
        $title = get_the_title();
    } elseif (is_singular('service')) {
        $title = get_the_title();
    } elseif (is_singular('product')) {
        $title = get_the_title();
    } elseif (is_search()) {
        $title = esc_html__('Search Results for: ', 'xroof') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page Not Found', 'xroof');
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }

    $_id = get_the_ID();
    if (is_singular('product')) {
        $_id = $post->ID;
    } elseif (function_exists('is_shop') && is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $breadcrumb_bg_img = get_theme_mod(
        'breadcrumb_bg_img',
        esc_url(get_template_directory_uri() . '/assets/img/global/breadcrumbs-bg.png')
    );
    $breadcrumb_switch = (function_exists('get_field') && get_field('breadcrumb_test', $_id) !== null)
        ? get_field('breadcrumb_test', $_id)
        : true;

    if (is_404()) {
        $breadcrumb_switch = false;
    }

    if ($breadcrumb_switch): ?>
        <section class="breadcrumbs breadcrumbs--style-1" data-bg-img="<?php echo esc_url($breadcrumb_bg_img); ?>">
            <div class="breadcrumbs__container container">
                <h2 class="breadcrumbs__title title-xl-white"><?php echo xroof_kses($title); ?></h2>
                <?php if (function_exists('bcn_display')): ?>
                    <ul class="breadcrumbs__list m-0 mt-4">
                        <?php bcn_display(); ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
    <?php endif;
}

add_action('xroof_header_before', 'xroof_breadcrumb');
