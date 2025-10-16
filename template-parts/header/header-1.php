<?php
$header_top_hours = get_theme_mod('header_top_hours', __('Mon - Fri : 8.00 AM - 7.00 PM', 'xroof'));
$header_top_address = get_theme_mod('header_top_address', __('678 Washington DC, USA', 'xroof'));
$address_top_url = get_theme_mod('address_top_url', __('#', 'xroof'));
$header_topbar_switch = get_theme_mod('header_topbar_switch', false);
$header_right_switch = get_theme_mod('header_right_switch', false);
$header_button_text = get_theme_mod('header_button_text', __('Get Started', 'xroof'));
$header_button_link = get_theme_mod('header_button_link', __('#', 'xroof'));
?>


<!-- Starting of the Header One Area Here -->
<header class="header header--style-1">
    <?php if (!empty($header_topbar_switch)): ?>
        <div class="header__top py-4">
            <div class="header__top-container container py-0">
                <div class="header__top-content">
                    <?php if (!empty($header_top_hours)): ?>
                        <div class="header__info-wrap">
                            <p class="header__info-text"><?php echo esc_html($header_top_hours); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($header_top_address)): ?>
                        <div class="header__info-wrap">
                            <a href="<?php echo esc_url($address_top_url); ?>" class="header__info-link">
                                <p class="header__info-text header__info-text--address">
                                    <?php echo esc_html($header_top_address); ?>
                                </p>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php xroof_header_social() ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="header__bottom">
        <div class="header__container container py-4">
            <nav class="nav">
                <?php if (xroof_header_logo()): ?>
                    <div class="nav__logo">
                        <?php xroof_header_logo(); ?>
                    </div>
                <?php endif; ?>

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu_class' => 'nav__menu',
                        'menu_id' => '',
                        'container' => '',
                        'fallback_cb' => 'Xroof_Walker_Nav_Menu::fallback',
                        'walker' => new Xroof_Walker_Nav_Menu,
                    )
                );
                ?>

                <?php if (!empty($header_right_switch) && !empty($header_button_text)): ?>
                    <div class="d-flex align-items-center gap-3">
                        <div class="nav__btn-wrap d-flex gap-2">
                            <a href="<?php echo esc_url($header_button_link); ?>" class="nav__btn btn-icon-right-primary">
                                <?php echo esc_html($header_button_text); ?>
                                <svg width="40" height="4" viewBox="0 0 10 7" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.07926 2.38846C9.15803 2.13084 9.01303 1.85814 8.75541 1.77938L4.55719 0.495857C4.29957 0.417094 4.02687 0.562088 3.94811 0.819712C3.86934 1.07734 4.01434 1.35003 4.27196 1.42879L8.00371 2.5697L6.8628 6.30145C6.78404 6.55908 6.92903 6.83177 7.18666 6.91054C7.44428 6.9893 7.71697 6.8443 7.79574 6.58668L9.07926 2.38846ZM8.61279 2.24585L8.38379 1.81516L0.362471 6.08018L0.591471 6.51086L0.820471 6.94155L8.84179 2.67654L8.61279 2.24585Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <button id="offcanvas-toggle" class="nav__toggle"
                            aria-label="<?php echo esc_attr__('Toggle navigation', 'xroof'); ?>">
                            ☰
                        </button>
                    <?php else: ?>
                        <button id="offcanvas-toggle" class="nav__toggle"
                            aria-label="<?php echo esc_attr__('Toggle navigation', 'xroof'); ?>">
                            ☰
                        </button>
                    <?php endif; ?>
                </div>

            </nav>
        </div>
    </div>
</header>
<!-- End of the Header One Area Here -->


<!-- Template parts -->
<?php echo get_template_part('template-parts/header/offcanvas'); ?>
<?php echo get_template_part('template-parts/header/preloader'); ?>