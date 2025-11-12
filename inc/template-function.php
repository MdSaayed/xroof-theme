<?php
function xroof_header_social()
{
    $header_fb_url = get_theme_mod('header_fb_url', __('#', 'xroof'));
    $header_x_url = get_theme_mod('header_x_url', __('#', 'xroof'));
    $header_instagram_url = get_theme_mod('header_instagram_url', __('#', 'xroof'));
    $header_dribbble_url = get_theme_mod('header_dribbble_url', __('#', 'xroof'));

    $social_links = [
        'facebook' => $header_fb_url,
        'x' => $header_x_url,
        'instagram' => $header_instagram_url,
        'dribbble' => $header_dribbble_url,
    ];

    $social_links = array_filter($social_links);

    if (!empty($social_links)): ?>
        <div class="header__social d-flex">
            <?php if (!empty($social_links['facebook'])): ?>
                <a href="<?php echo esc_url($social_links['facebook']); ?>" class="header__social-link mb-0" target="_blank"
                    rel="noopener noreferrer">
                    <svg class="header__social-icon" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M10.2799 17.2634V9.72531H12.8091L13.1886 6.78671H10.2799V4.91084C10.2799 4.06031 10.5151 3.48069 11.7362 3.48069L13.291 3.48005V0.85166C13.0221 0.816718 12.0991 0.736609 11.0249 0.736609C8.78171 0.736609 7.24599 2.10583 7.24599 4.6198V6.78671H4.70911V9.72531H7.24599V17.2634H10.2799Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="16.5268" height="16.5268" fill="white" transform="translate(0.736633 0.736609)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            <?php endif; ?>

            <?php if (!empty($social_links['instagram'])): ?>
                <a href="<?php echo esc_url($social_links['instagram']); ?>" class="header__social-link mb-0" target="_blank"
                    rel="noopener noreferrer">
                    <svg class="header__social-icon" width="15" height="16" viewBox="0 0 17 18" fill="none">
                        <path
                            d="M10.2052 7.70067L16.2254 0.515198H14.7988L9.57146 6.75424L5.39642 0.515198H0.580994L6.89448 9.94974L0.580994 17.4848H2.00766L7.52785 10.8962L11.937 17.4848H16.7524L10.2048 7.70067H10.2052Z"
                            fill="white" />
                    </svg>
                </a>
            <?php endif; ?>

            <?php if (!empty($social_links['x'])): ?>
                <a href="<?php echo esc_url($social_links['x']); ?>" class="header__social-link mb-0" target="_blank"
                    rel="noopener noreferrer">
                    <svg width="20" height="21" viewBox="0 0 17 18" fill="none">
                        <g clip-path="url(#clip0_185_1756)">
                            <path
                                d="M12.1231 0.5152H4.54359C2.07678 0.5152 0.0699463 2.57581 0.0699463 5.10871V12.8914C0.0699463 15.4242 2.07678 17.4848 4.54359 17.4848H12.1232C14.5899 17.4848 16.5967 15.4242 16.5967 12.8914V5.10871C16.5967 2.57581 14.5899 0.5152 12.1231 0.5152ZM15.6278 12.8914C15.6278 14.8756 14.0556 16.49 12.1231 16.49H4.54359C2.61102 16.49 1.03882 14.8756 1.03882 12.8914V5.10871C1.03882 3.12436 2.61102 1.51003 4.54359 1.51003H12.1232C14.0556 1.51003 15.6278 3.12436 15.6278 5.10871V12.8914Z"
                                fill="white" />
                            <path
                                d="M8.33337 4.36C5.84159 4.36 3.81445 6.44145 3.81445 8.99999C3.81445 11.5585 5.84159 13.64 8.33337 13.64C10.8251 13.64 12.8523 11.5585 12.8523 8.99999C12.8523 6.44145 10.8251 4.36 8.33337 4.36ZM8.33337 12.6452C6.37596 12.6452 4.78332 11.01 4.78332 8.99999C4.78332 6.99014 6.37596 5.35483 8.33337 5.35483C10.2909 5.35483 11.8834 6.99014 11.8834 8.99999C11.8834 11.01 10.2909 12.6452 8.33337 12.6452Z"
                                fill="white" />
                            <path
                                d="M12.9603 2.71214C12.2239 2.71214 11.625 3.32724 11.625 4.0832C11.625 4.83929 12.2239 5.45439 12.9603 5.45439C13.6966 5.45439 14.2957 4.83929 14.2957 4.0832C14.2957 3.32711 13.6966 2.71214 12.9603 2.71214ZM12.9603 4.45943C12.7583 4.45943 12.5939 4.29061 12.5939 4.0832C12.5939 3.87566 12.7583 3.70697 12.9603 3.70697C13.1624 3.70697 13.3268 3.87566 13.3268 4.0832C13.3268 4.29061 13.1624 4.45943 12.9603 4.45943Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_185_1756">
                                <rect width="16.5268" height="16.9696" fill="white" transform="translate(0.0699463 0.5152)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            <?php endif; ?>

            <?php if (!empty($social_links['dribbble'])): ?>
                <a href="<?php echo esc_url($social_links['dribbble']); ?>" class="header__social-link mb-0" target="_blank"
                    rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M11.4478 9.73431C12.2434 11.7539 12.835 13.8347 13.2226 15.9767C13.7734 15.6503 14.2834 15.2423 14.7526 14.7731C15.9766 13.5491 16.7518 12.0191 17.0374 10.3667C15.8338 9.87711 14.5282 9.59151 13.1614 9.59151C12.5902 9.59151 12.019 9.63231 11.4478 9.73431ZM14.773 3.24711C14.773 3.22671 14.773 3.22671 14.773 3.24711C13.2226 1.69671 11.1826 0.839914 8.99985 0.839914C8.14304 0.839914 7.30665 0.962314 6.53145 1.22751C7.79625 2.81871 8.91825 4.51191 9.85665 6.28671C11.6518 5.53191 13.3042 4.49151 14.773 3.24711ZM15.4258 3.96111C13.8754 5.28711 12.1618 6.34791 10.3054 7.14351C10.5706 7.69431 10.8358 8.26551 11.0806 8.83671C11.7742 8.71431 12.4678 8.63271 13.1818 8.63271C14.5486 8.63271 15.895 8.87751 17.1598 9.36711V8.99991C17.1598 7.14351 16.5478 5.38911 15.4258 3.96111ZM3.98145 15.4259C5.40945 16.5479 7.16385 17.1599 8.99985 17.1599C10.1626 17.1599 11.305 16.9151 12.3454 16.4459C11.9578 14.2019 11.3254 12.0191 10.5094 9.93831C7.61264 10.7339 5.22585 12.7739 3.98145 15.4259Z"
                            fill="white" />
                        <path
                            d="M8.83664 9.50994C9.26504 9.32634 9.69344 9.18354 10.1218 9.06114C9.89744 8.53074 9.65264 8.02074 9.38744 7.51074C7.18424 8.32674 4.85864 8.73474 2.49224 8.73474C1.94144 8.73474 1.39064 8.71434 0.839844 8.67354V8.99994C0.839844 11.1827 1.69664 13.2227 3.22664 14.7731C3.75704 13.7123 4.45064 12.7535 5.30744 11.8967C6.32744 10.8767 7.53104 10.0607 8.83664 9.50994ZM8.95904 6.65394C7.97984 4.85874 6.85784 3.16554 5.57264 1.59474C4.71584 2.00274 3.92024 2.55354 3.22664 3.22674C1.98224 4.47114 1.20704 6.02154 0.941844 7.71474C1.45184 7.75554 1.98224 7.77594 2.49224 7.77594C4.75664 7.77594 6.93944 7.38834 8.95904 6.65394Z"
                            fill="white" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    <?php endif;
}

function xroof_header_logo()
{
    $header_logo = get_theme_mod(
        'header_logo',
        get_template_directory_uri() . '/assets/img/global/logo.png'
    );
    ?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav__link">
        <img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
            class="nav__logo-img">
    </a>

    <?php
}

function xroof_offcanvas_logo()
{
    $xroof_offcanvas_logo = get_theme_mod('xroof_offcanvas_logo', __(get_template_directory_uri() . '/assets/img/global/logo-black.png', 'xroof'));
    ?>
    <?php if (!empty($xroof_offcanvas_logo)): ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="offcanvas__logo-link">
            <img src="<?php echo esc_html($xroof_offcanvas_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                class="offcanvas__logo-img">
        </a>
    <?php endif; ?>
<?php
}

function xroof_information_box_logo()
{
    $xroof_info_box_logo = get_theme_mod('xroof_info_box_logo', __(get_template_directory_uri() . '/assets/img/global/logo-black.png', 'xroof'));
    ?>
    <?php if (!empty($xroof_info_box_logo)): ?>
        <div class="header__info-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_html($xroof_info_box_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                    class="offcanvas__logo-img">
            </a>
        </div>
    <?php endif; ?>
<?php
} 

function xroof_footer_copyright()
{
    $footer_copyright_text = get_theme_mod('footer_copyright_text', __('XRooF Themes 2025. All Rights Reserved.', 'xroof'));
    ?>
    <p class="footer__bottom-text body-text mb-0"><?php echo esc_html($footer_copyright_text); ?></p>
    <?php
}

function xroof_kses($xroof_custom_tag = '')
{
    $xroof_allowed_html = [
        'svg' => [
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewBox' => true,
            'fill' => true,
            'stroke' => true,
        ],
        'path' => [
            'd' => true,
            'fill' => true,
            'stroke' => true,
            'stroke-width' => true,
            'stroke-linecap' => true,
            'stroke-linejoin' => true,
            'opacity' => true,
            'fill-rule' => true,
            'clip-rule' => true,
        ],

        'a' => [
            'class' => [],
            'href' => [],
            'title' => [],
            'target' => [],
            'rel' => [],
        ],
        'b' => [],
        'blockquote' => [
            'cite' => [],
        ],
        'cite' => [
            'title' => [],
        ],
        'code' => [],
        'del' => [
            'datetime' => [],
            'title' => [],
        ],
        'dd' => [],
        'div' => [
            'class' => [],
            'title' => [],
            'style' => [],
        ],
        'dl' => [],
        'dt' => [],
        'em' => [],
        'h1' => [],
        'h2' => [],
        'h3' => [],
        'h4' => [],
        'h5' => [],
        'h6' => [],
        'i' => [
            'class' => [],
        ],
        'img' => [
            'alt' => [],
            'class' => [],
            'height' => [],
            'src' => [],
            'width' => [],
        ],
        'li' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'iframe' => array(
            'width' => array(),
            'height' => array(),
            'scrolling' => array(),
            'frameborder' => array(),
            'allow' => array(),
            'src' => array(),
        ),
        'strike' => array(),
        'br' => array(),
        'strong' => array(),
    ];

    return wp_kses($xroof_custom_tag, $xroof_allowed_html);
}
function xroof_navigation()
{
    $pages = paginate_links(array(
        'type' => 'array',
        'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left svg-arrow-40"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right svg-arrow-40"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
    ));

    if ($pages) {
        echo '<nav class="blog__pagination mt-10 mt-xl-15"><ul>';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul></nav>';
    }
}

function xroof_blog_share() {
    $post_url   = get_permalink();
    $post_title = get_the_title();
    ?>

    <div class="blog-details__share-links">

        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($post_url); ?>"
            class="blog-details__share-link popup-share" target="_blank" rel="noopener">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                <path d="M14.92 25.4753V14.1681H18.7138L19.283 9.76021H14.92V6.94641C14.92 5.67061 15.2728 4.80118 17.1043 4.80118L19.4365 4.80022V0.857636C19.0332 0.805223 17.6488 0.685059 16.0374 0.685059C12.6726 0.685059 10.369 2.73888 10.369 6.50985V9.76021H6.56372V14.1681H10.369V25.4753H14.92Z" fill="white"/>
            </svg>
        </a>

        <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url($post_url); ?>&text=<?php echo esc_attr($post_title); ?>"
            class="blog-details__share-link popup-share" target="_blank" rel="noopener">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                <path d="M24.26 6.5a9.31 9.31 0 0 1-2.66.73 4.64 4.64 0 0 0 2.04-2.56 9.27 9.27 0 0 1-2.94 1.13 4.62 4.62 0 0 0-7.87 4.21 13.1 13.1 0 0 1-9.51-4.82 4.62 4.62 0 0 0 1.43 6.17 4.59 4.59 0 0 1-2.09-.58v.06a4.62 4.62 0 0 0 3.7 4.53 4.65 4.65 0 0 1-2.08.08 4.63 4.63 0 0 0 4.32 3.21 9.26 9.26 0 0 1-5.73 1.97 13.05 13.05 0 0 0 7.08 2.07c8.5 0 13.15-7.05 13.15-13.16 0-.2-.01-.39-.02-.58A9.39 9.39 0 0 0 24.26 6.5z" fill="white"/>
            </svg>
        </a>

        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url($post_url); ?>"
            class="blog-details__share-link" target="_blank" rel="noopener">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 448 512" fill="white">
                <path d="M100.28 448H7.4V148.9h92.88zm-46.44-338C24.07 110 0 85.93 
                0 56.5S24.07 3 53.84 3c29.77 0 53.84 24.07 
                53.84 53.5S83.61 110 53.84 110zM447.9 448h-92.4V306.4c0-33.7-.7-77.1-47-77.1-47 
                0-54.2 36.8-54.2 74.8V448h-92.4V148.9h88.7v40.8h1.3c12.4-23.5 
                42.6-48.2 87.7-48.2 93.8 0 111.2 61.7 
                111.2 141.9V448z"/>
            </svg>
        </a>
    </div>

    <?php
}

function xroof_get_link_attribute($link)
{
    if (is_string(value: $link)) {
        $link = ['url' => $link];
    }
    $url = !empty($link['url']) ? esc_url($link['url']) : '#';
    $target = !empty($link['is_external']) ? ' target="_blank"' : '';
    $rel = !empty($link['nofollow']) ? ' rel="nofollow noopener"' : ' rel="noopener"';
    return 'href="' . $url . '"' . $target . $rel;
}

function xroof_reading_time($post_id = null, $words_per_minute = 200)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $minutes = ceil($word_count / $words_per_minute);

    if ($minutes < 1) {
        $minutes = 1;
    }

    return esc_html($minutes . ' min read');
}

function xroof_get_menus()
{
    $menus = wp_get_nav_menus();
    $options = [];

    if (!empty($menus)) {
        foreach ($menus as $menu) {
            $options[$menu->term_id] = $menu->name;
        }
    }

    return $options;
}




