<?php
    $xroof_offcanvas_button_toggle = get_theme_mod('xroof_offcanvas_button_toggle', false);
    $xroof_offcanvas_button_text = get_theme_mod('xroof_offcanvas_button_text', __('Get Started', 'xroof'));
    $xroof_offcanvas_button_url = get_theme_mod('xroof_offcanvas_button_url', __('#', 'xroof'));
?>

<!-- Starting of the offcanvas Area Here-->
<div class="offcanvas offcanvas--style-1">
    <div class="offcanvas__header">
        <div class="offcanvas__logo">
            <?php xroof_offcanvas_logo(); ?>
        </div>
        <button id="offcanvas-close" class="offcanvas__close" aria-label="Close navigation">
            &times;
        </button>
    </div>

    <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu_class' => 'nav__menu',
                'menu_id' => 'offcanvas-nav-menu',
                'container' => '',
                'fallback_cb' => 'Xroof_Walker_Nav_Menu::fallback',
                'walker' => new Xroof_Walker_Nav_Menu,
            )
        );
    ?>
 
    <?php if (!empty($xroof_offcanvas_button_text && $xroof_offcanvas_button_toggle)): ?>
        <div class="offcanvas__actions mt-6">
            <a href="<?php echo esc_url($xroof_offcanvas_button_url); ?>" class="offcanvas__btn btn-icon-right-primary">
                <?php echo esc_html($xroof_offcanvas_button_text); ?>
                <svg width="40" height="4" viewBox="0 0 10 7" fill="none">
                    <path
                        d="M9.07926 2.38846C9.15803 2.13084 9.01303 1.85814 8.75541 1.77938L4.55719 0.495857C4.29957 0.417094 4.02687 0.562088 3.94811 0.819712C3.86934 1.07734 4.01434 1.35003 4.27196 1.42879L8.00371 2.5697L6.8628 6.30145C6.78404 6.55908 6.92903 6.83177 7.18666 6.91054C7.44428 6.9893 7.71697 6.8443 7.79574 6.58668L9.07926 2.38846ZM8.61279 2.24585L8.38379 1.81516L0.362471 6.08018L0.591471 6.51086L0.820471 6.94155L8.84179 2.67654L8.61279 2.24585Z"
                        fill="black" />
                </svg>
            </a>
        </div>
    <?php endif; ?>
</div>
<!-- End of the offcanvas Area Here-->