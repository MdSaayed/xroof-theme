<?php


function xroof_theme_support()
{
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on xroof, use a find and replace
     * to change 'xroof' to the name of your theme in all the template files.
     */
    load_theme_textdomain('xroof', get_template_directory() . '/languages');

    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('post-formats', array(
        'image',
        'video',
        'audio',
        'gallery',
        'quote',
    ));

    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'xroof'),
    ));

    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'xroof_theme_support');

function xroof_register_footer_widgets()
{
    // Blog Details Sidebar   
    register_sidebar([
        'name' => esc_html__('Blog Details Sidebar', 'xroof'),
        'id' => 'blog-details-sidebar',
        'description' => esc_html__('Widgets in this area will be shown on the Blog Details page.', 'xroof'),
        'before_widget' => '<div id="%1$s" class="widget blog__sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="sidebar__title mb-4">',
        'after_title' => '</h5>',
    ]);

    // Services Details Sidebar
    register_sidebar([
        'name' => esc_html__('Services Details Sidebar', 'xroof'),
        'id' => 'services-details-sidebar',
        'description' => esc_html__('Widgets in this area will be shown on the Services Details page.', 'xroof'),
        'before_widget' => '<div id="%1$s" class="widget sidebar sidebar--left %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="sidebar__title mb-4">',
        'after_title' => '</h5>',
    ]);
    // Project Details Sidebar
    register_sidebar([
        'name' => esc_html__('Project Details Sidebar', 'xroof'),
        'id' => 'project-details-sidebar',
        'description' => esc_html__('Widgets in this area will be shown on the Project Details page.', 'xroof'),
        'before_widget' => '<div id="%1$s" class="sidebar sidebar--right %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="sidebar__title pb-6 pb-xl-8">',
        'after_title' => '</h2>',
    ]);

    // Footer 1 - Brand
    register_sidebar([
        'name' => esc_html__('Footer 1 - Brand', 'xroof'),
        'id' => 'footer1-brand',
        'description' => esc_html__('Add logo, description, social links for Home 1 footer.', 'xroof'),
        'before_widget' => '<div id="%1$s" class="widget footer__widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="footer__title mb-8">',
        'after_title' => '</h5>',
    ]);

    // Footer 1 - Links
    register_sidebar([
        'name' => esc_html__('Footer 1 - Quick Links', 'xroof'),
        'id' => 'footer1-links',
        'description' => esc_html__('Add navigation or quick links for Home 1 footer.', 'xroof'),
        'before_widget' => '<div id="%1$s" class="widget footer__widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="footer__title mb-8">',
        'after_title' => '</h5>',
    ]);

    // Footer 1 - Hours
    register_sidebar([
        'name' => esc_html__('Footer 1 - Working Hours', 'xroof'),
        'id' => 'footer1-hours',
        'description' => esc_html__('Add working hours for Home 1 footer.', 'xroof'),
        'before_widget' => '<div id="%1$s" class="widget footer__widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="footer__title mb-8">',
        'after_title' => '</h5>',
    ]);

    // Footer 1 - Newsletter
    register_sidebar([
        'name' => esc_html__('Footer 1 - Newsletter', 'xroof'),
        'id' => 'footer1-newsletter',
        'description' => esc_html__('Add newsletter form for Home 1 footer.', 'xroof'),
        'before_widget' => '<div id="%1$s" class="widget footer__widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="footer__title mb-8">',
        'after_title' => '</h5>',
    ]);

}

add_action('widgets_init', 'xroof_register_footer_widgets');

// Clean up Contact Form 7 output (remove <span>, <p>, <br>)
add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span|p)[^>]*>/', '', $content);
    $content = preg_replace('/<\/(span|p)>/', '', $content);
    $content = str_replace('<br />', '', $content);
    $content = str_replace('<br>', '', $content);
    return $content;
});

add_filter('mc4wp_form_content', function ($content) {

    $custom_form = '
    <div class="footer__newsletter-form-group d-flex w-100">
        <input type="email" name="EMAIL" class="newsletter-form form-control" placeholder="Your email address" required>
        <button type="submit" class="newsletter-form-btn" aria-label="Submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 11 8" aria-hidden="true">
                <path d="M9.887 3.655c.19.19.19.499 0 .69L6.783 7.449a.437.437 0 0 1-.69 0 .487.487 0 0 1 0-.69L8.853 4 6.093 1.241a.487.487 0 0 1 0-.69.437.437 0 0 1 .69 0L9.887 3.655ZM9.542 4v.488H.458V3.512h9.084V4Z" fill="#EE212B"/>
            </svg>
        </button>
    </div>';

    return $custom_form;
});


// Inludes File
include_once('inc/common/scripts.php');
include_once('inc/template-function.php');
include_once('inc/nav-walker.php');
include_once('inc/breadcrumb.php');
include_once('inc/class-tgm-plugin-activation.php');
include_once('inc/add_plugin.php');
if (class_exists('kirki')) {
    include_once('inc/xroof-kirki.php');
}
