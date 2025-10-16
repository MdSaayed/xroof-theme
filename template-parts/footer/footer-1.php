<?php
    // Footer Widgets
    $footer1_has_widgets = (
        is_active_sidebar('footer1-brand') ||
        is_active_sidebar('footer1-links') ||
        is_active_sidebar('footer1-hours') ||
        is_active_sidebar('footer1-newsletter')
    );

    // Footer Copyright
    $footer1_copyright_text1 = get_theme_mod('footer1_copyright_text1', __('XRooF Themes 2025. All Rights Reserved.', 'xroof'));

    // Footer Bottom Links
    $footer_terms_text = get_theme_mod('footer_terms_text', __('Terms & Conditions', 'xroof'));
    $footer_terms_url = get_theme_mod('footer_terms_url', __('#', 'xroof'));
    $footer_privacy_text = get_theme_mod('footer_privacy_text', __('Privacy Policy', 'xroof'));
    $footer_privacy_url = get_theme_mod('footer_privacy_url', __('#', 'xroof'));
?>

<!-- Staring of the Footer Area Here -->
<footer class="footer footer--style-1">
    <div class="footer__content <?php echo $footer1_has_widgets ? '' : 'py-2'; ?>">
        <div class="footer__container container <?php echo $footer1_has_widgets ? 'pb-4' : 'py-2'; ?>">
            <?php if ($footer1_has_widgets): ?>
                <div class="footer__inner pb-20">
                    <?php if (is_active_sidebar('footer1-brand')): ?>
                        <div class="footer__col footer__brand">
                            <?php dynamic_sidebar('footer1-brand'); ?>
                        </div>
                    <?php endif ?>

                    <?php if (is_active_sidebar('footer1-links')): ?>
                        <div class="footer__col footer__links">
                            <?php dynamic_sidebar('footer1-links'); ?>
                        </div>
                    <?php endif ?>

                    <?php if (is_active_sidebar('footer1-hours')): ?>
                        <div class="footer__col footer__hours">
                            <?php dynamic_sidebar('footer1-hours'); ?>
                        </div>
                    <?php endif ?>

                    <?php if (is_active_sidebar('footer1-newsletter')): ?>
                        <div class="footer__col footer__newsletter">
                            <?php dynamic_sidebar('footer1-newsletter'); ?>
                        </div>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <div class="footer__bottom">
                <div
                    class="d-flex flex-column gap-3 flex-md-row <?php echo ($footer_privacy_text || $footer_terms_text) ? 'justify-content-between' : 'justify-content-center'; ?> align-items-center text-center text-md-start">
                    <?php if (!empty($footer1_copyright_text1)): ?>
                        <p class="footer__bottom-text body-text text-white mb-0">
                            <?php echo xroof_kses($footer1_copyright_text1); ?>
                        </p>
                    <?php endif; ?>


                    <?php if ($footer_privacy_text || $footer_terms_text): ?>
                        <ul class="footer__bootom-nav d-flex flex-wrap justify-content-center list-inline mb-0">
                            <?php if ($footer_privacy_text): ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url($footer_privacy_url); ?>" class="footer__bottom-nav-link">
                                        <?php echo esc_html($footer_privacy_text); ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if ($footer_terms_text): ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url($footer_terms_url); ?>" class="footer__bottom-nav-link">
                                        <?php echo esc_html($footer_terms_text); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of the Footer Area Here -->