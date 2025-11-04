<?php

// function xroof_enqueue_scripts()
// {
//     // === Styles ===

//     wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.css', array(), '5.3', 'all');
//     wp_enqueue_style('xroof-slider', get_template_directory_uri() . '/assets/css/tiny-slider.css', array(), '2.9.4', 'all');
//     wp_enqueue_style('xroof-glightbox', get_template_directory_uri() . '/assets/css/glightbox.min.css', array(), '3.3.1', 'all');
//     wp_enqueue_style('xroof-aos', get_template_directory_uri() . '/assets/css/aos.css', array(), '2.3.4', 'all');
//     wp_enqueue_style('xroof-unit', get_template_directory_uri() . '/assets/css/xroof-unit.css', array(), '1.0.0', 'all');
//     wp_enqueue_style('xroof-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');
//     wp_enqueue_style('xroof-style', get_stylesheet_uri());

//     // === Scripts ===
//     wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.bundle.min.js', array(), '5.3', true);
//     wp_enqueue_script('xroof-particles', get_template_directory_uri() . '/assets/js/particles.min.js', array(), '2.0.0', true);
//     wp_enqueue_script('xroof-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), '2.3.4', true);
//     wp_enqueue_script('xroof-animation', get_template_directory_uri() . '/assets/js/animation.js', array('xroof-aos'), '1.0.0', true);
//     wp_enqueue_script('xroof-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('imagesloaded'), '3.0.6', true);
//     wp_enqueue_script('xroof-tiny-slider', get_template_directory_uri() . '/assets/js/tiny-slider.js', array(), '2.9.4', true);
//     wp_enqueue_script('xroof-glightbox', get_template_directory_uri() . '/assets/js/glightbox.min.js', array(), '3.3.1', true);
//     wp_enqueue_script('xroof-main', get_template_directory_uri() . '/assets/js/main.js', array('xroof-isotope', 'xroof-tiny-slider', 'xroof-glightbox'), '1.0.0', true);

//     // WordPress native comment reply script
//     if (is_singular() && comments_open() && get_option('thread_comments')) {
//         wp_enqueue_script('comment-reply');
//     }
// }
// add_action('wp_enqueue_scripts', 'xroof_enqueue_scripts');

 

function xroof_enqueue_scripts() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.css', array(), '5.3', 'all');
    wp_enqueue_style('xroof-slider', get_template_directory_uri() . '/assets/css/tiny-slider.css', array(), '2.9.4', 'all');
    wp_enqueue_style('xroof-glightbox', get_template_directory_uri() . '/assets/css/glightbox.min.css', array(), '3.3.1', 'all');
    wp_enqueue_style('xroof-aos', get_template_directory_uri() . '/assets/css/aos.css', array(), '2.3.4', 'all');
    wp_enqueue_style('xroof-unit', get_template_directory_uri() . '/assets/css/xroof-unit.css', array(), '1.0.0', 'all');
    wp_enqueue_style('xroof-main', get_template_directory_uri() . '/assets/css/main.css', array('bootstrap-css'), '1.0.0', 'all'); 
    wp_enqueue_style('xroof-style', get_stylesheet_uri());

    // === Scripts ===
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.bundle.min.js', array(), '5.3', true);
    wp_enqueue_script('xroof-particles', get_template_directory_uri() . '/assets/js/particles.min.js', array(), '2.0.0', true);
    wp_enqueue_script('xroof-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), '2.3.4', true);
    wp_enqueue_script('xroof-animation', get_template_directory_uri() . '/assets/js/animation.js', array('xroof-aos'), '1.0.0', true);
    wp_enqueue_script('xroof-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('imagesloaded'), '3.0.6', true);
    wp_enqueue_script('xroof-tiny-slider', get_template_directory_uri() . '/assets/js/tiny-slider.js', array(), '2.9.4', true);
    wp_enqueue_script('xroof-glightbox', get_template_directory_uri() . '/assets/js/glightbox.min.js', array(), '3.3.1', true);
    wp_enqueue_script('xroof-main', get_template_directory_uri() . '/assets/js/main.js', array('xroof-isotope', 'xroof-tiny-slider', 'xroof-glightbox'), '1.0.0', true);

    // WordPress native comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'xroof_enqueue_scripts');
