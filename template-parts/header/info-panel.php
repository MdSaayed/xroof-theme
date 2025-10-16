<?php
$xroof_info_box_title_1 = get_theme_mod('xroof_info_box_title_1', __('About Us', 'xroof'));
$xroof_info_box_title_2 = get_theme_mod('xroof_info_box_title_2', __('Contact Us', 'xroof'));
$xroof_info_box_text_1 = get_theme_mod('xroof_info_box_text_1', __('At XRoof, we provide trusted roofing solutions that protect homes and businesses. From new installations to repairs and replacements, our expert team delivers quality workmanship with durable materials. We’re committed to honesty, reliability, and lasting results, ensuring your roof is safe, strong, and built to withstand any weather.', 'xroof'));
$xroof_info_box_button_text = get_theme_mod('xroof_info_box_button_text', __('Contact Us', 'xroof'));
$xroof_info_box_button_url = get_theme_mod('xroof_info_box_button_url', __('#', 'xroof'));
$xroof_info_address_text = get_theme_mod('xroof_info_address_text', __('Valentin resides at 24 Street Road in New York
', 'xroof'));
$xroof_info_email = get_theme_mod('xroof_info_email', __('hello@bentol.com', 'xroof'));
$xroof_info_phone = get_theme_mod('xroof_info_phone', __('+181234567', 'xroof'));
$xroof_info_x_url = get_theme_mod('xroof_info_x_url', __('#', 'xroof'));
$xroof_info_facebook_url = get_theme_mod('xroof_info_facebook_url', __('#', 'xroof'));
$xroof_info_behance_url = get_theme_mod('xroof_info_behance_url', __('#', 'xroof'));
$xroof_info_instagram_url = get_theme_mod('xroof_info_instagram_url', __('#', 'xroof'));
?>


<div class="header__info-panel">
    <button id="info-toggle" class="header__info-toggle" aria-label="Menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 100 100" fill="none">
            <rect x="10" y="20" width="80" height="8" rx="0" fill="white" />
            <rect x="10" y="47" width="80" height="5" rx="0" fill="white" />
            <rect x="10" y="74" width="80" height="5" rx="0" fill="white" />
        </svg>
    </button>

    <div id="info-panel" class="header__info px-8">
        <div class="header__info-top">
            <?php xroof_information_box_logo(); ?>

            <button id="info-toggle-close" class="header__info-toggle header__info-toggle--close"
                aria-label="Close info">
                &times;
            </button>
        </div>

        <div class="header__info-content pt-4">
            <div class="header__info-about">
                <?php if ($xroof_info_box_title_1): ?>
                    <h3 class="header__info-title mb-4">
                        <?php echo esc_html($xroof_info_box_title_1); ?>
                    </h3>
                <?php endif; ?>
                <?php if ($xroof_info_box_text_1): ?>
                    <p class="header__info-about-text body-text">
                        <?php echo esc_html($xroof_info_box_text_1); ?>
                    </p>
                <?php endif; ?>

                <?php if ($xroof_info_box_button_text): ?>
                    <a href="<?php echo esc_url($xroof_info_box_button_url); ?>"
                        class="header__info-btn btn-icon-right-primary mt-4">
                        <?php echo esc_html($xroof_info_box_button_text); ?>
                        <svg width="40" height="4" viewBox="0 0 10 7" fill="none">
                            <path
                                d="M9.07926 2.38846C9.15803 2.13084 9.01303 1.85814 8.75541 1.77938L4.55719 0.495857C4.29957 0.417094 4.02687 0.562088 3.94811 0.819712C3.86934 1.07734 4.01434 1.35003 4.27196 1.42879L8.00371 2.5697L6.8628 6.30145C6.78404 6.55908 6.92903 6.83177 7.18666 6.91054C7.44428 6.9893 7.71697 6.8443 7.79574 6.58668L9.07926 2.38846ZM8.61279 2.24585L8.38379 1.81516L0.362471 6.08018L0.591471 6.51086L0.820471 6.94155L8.84179 2.67654L8.61279 2.24585Z"
                                fill="black"></path>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

            <div class="header__info-contact mt-8">
                <?php if ($xroof_info_box_title_2): ?>
                    <h3 class="header__info-title mb-4">
                        <?php echo esc_html($xroof_info_box_title_2); ?>
                    </h3>
                <?php endif; ?>

                <?php if ($xroof_info_address_text): ?>
                    <div class="header__info-item mt-4">
                        <div class="header__info-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-location-arrow" viewBox="0 0 512 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M444.52 3.52L28.74 195.42c-47.97 22.39-31.98 92.75 19.19 92.75h175.91v175.91c0 51.17 70.36 67.17 92.75 19.19l191.9-415.78c15.99-38.39-25.59-79.97-63.97-63.97z">
                                </path>
                            </svg>
                        </div>
                        <span class="header__info-text"><?php echo esc_html($xroof_info_address_text); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($xroof_info_email): ?>
                    <div class="header__info-item mt-4">
                        <div class="header__info-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-far-envelope" viewBox="0 0 512 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                                </path>
                            </svg>
                        </div>
                        <a href="mailto:<?php echo esc_attr($xroof_info_email); ?>" class="header__info-link">
                            <?php echo esc_html($xroof_info_email); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($xroof_info_phone): ?>
                    <div class="header__info-item mt-4">
                        <div class="header__info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                <path
                                    d="M19.7529 15.604L16.956 12.8071C15.9571 11.8082 14.2589 12.2078 13.8594 13.5063C13.5597 14.4054 12.5608 14.9048 11.6618 14.705C9.66395 14.2055 6.96691 11.6084 6.46746 9.51069C6.16779 8.61164 6.76713 7.61273 7.66615 7.3131C8.96472 6.91354 9.36428 5.2154 8.36538 4.2165L5.56845 1.41957C4.76932 0.720333 3.57064 0.720333 2.87141 1.41957L0.973487 3.31748C-0.924431 5.31529 1.17327 10.6095 5.86812 15.3043C10.563 19.9992 15.8572 22.1968 17.855 20.199L19.7529 18.301C20.4522 17.5019 20.4522 16.3032 19.7529 15.604Z"
                                    fill="#EE212B" />
                            </svg>
                        </div>
                        <a href="tel:<?php echo esc_attr($xroof_info_phone); ?>" class="header__info-link">
                            <?php echo esc_html($xroof_info_phone); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($xroof_info_instagram_url || $xroof_info_behance_url || $xroof_info_facebook_url || $xroof_info_x_url)): ?>
                <div class="header__info-social-icon mt-8">
                    <?php if ($xroof_info_x_url): ?>
                        <a href="<?php echo esc_url($xroof_info_x_url); ?>" class="social-icon__link">
                            <svg width="18" height="18" viewBox="0 0 26 26" fill="none">
                                <path
                                    d="M15.3078 11.1708L24.338 0.392578H22.1981L14.3572 9.75115L8.09459 0.392578H0.87146L10.3417 14.5444L0.87146 25.847H3.01147L11.2917 15.964L17.9055 25.847H25.1286L15.3072 11.1708H15.3078ZM12.3767 14.6691L11.4172 13.2599L3.78254 2.0467H7.06947L13.2307 11.0961L14.1903 12.5053L22.1992 24.2681H18.9122L12.3767 14.6696V14.6691Z"
                                    fill="white" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($xroof_info_facebook_url): ?>
                        <a href="<?php echo esc_url($xroof_info_facebook_url); ?>" class="social-icon__link">
                            <svg width="18" height="18" viewBox="0 0 26 26" fill="none">
                                <g clip-path="url(#clip0_328_1833)">
                                    <path
                                        d="M14.92 25.4753V14.1681H18.7138L19.283 9.76021H14.92V6.94641C14.92 5.67061 15.2728 4.80118 17.1043 4.80118L19.4365 4.80022V0.857636C19.0332 0.805223 17.6488 0.685059 16.0374 0.685059C12.6726 0.685059 10.369 2.73888 10.369 6.50985V9.76021H6.56372V14.1681H10.369V25.4753H14.92Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_328_1833">
                                        <rect width="24.7902" height="24.7902" fill="white"
                                            transform="translate(0.60498 0.685059)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($xroof_info_behance_url): ?>
                        <a href="<?php echo esc_url($xroof_info_behance_url); ?>" class="social-icon__link">
                            <svg width="20" height="20" fill="#fff" viewBox="0 0 256 256">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round">
                                </g>
                                <g>
                                    <path
                                        d="M86.26123,32.74414a103.85849,103.85849,0,0,1,100.148,9.25537,153.22442,153.22442,0,0,1-44.543,40.48438A169.26114,169.26114,0,0,0,86.26123,32.74414Zm41.31543,57.28955A152.978,152.978,0,0,0,69.4624,42.09863a104.382,104.382,0,0,0-41.543,57.561A151.8095,151.8095,0,0,0,64,103.99805,151.0488,151.0488,0,0,0,127.57666,90.03369Zm104.22119,31.65772a103.76547,103.76547,0,0,0-32.88965-69.689,169.34119,169.34119,0,0,1-48.39453,43.94092,167.29388,167.29388,0,0,1,13.542,29.89746,168.13983,168.13983,0,0,1,67.74219-4.14941Zm-63.33008,19.53125a167.82141,167.82141,0,0,1,4.44922,38.46972,168.65237,168.65237,0,0,1-6.084,44.77832,104.24218,104.24218,0,0,0,64.68213-86.65185,152.38875,152.38875,0,0,0-63.04737,3.40381Zm-19.64062-10.45459a151.39932,151.39932,0,0,0-12.3916-27.20557A166.974,166.974,0,0,1,64,119.99805a167.82812,167.82812,0,0,1-39.23633-4.6377,103.89032,103.89032,0,0,0,35.958,91.88281A168.9649,168.9649,0,0,1,148.82715,130.76807ZM73.78369,216.72021a103.93363,103.93363,0,0,0,74.58447,13.27051,152.66635,152.66635,0,0,0,8.54883-50.29834,151.825,151.825,0,0,0-3.73291-33.46289A152.89185,152.89185,0,0,0,73.78369,216.72021Z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($xroof_info_instagram_url): ?>
                        <a href="<?php echo esc_url($xroof_info_instagram_url); ?>" class="social-icon__link">
                            <svg width="20" height="20" viewBox="0 0 26 26" fill="none">
                                <g clip-path="url(#clip0_328_333)">
                                    <path
                                        d="M18.6847 0.272461H7.31545C3.61524 0.272461 0.60498 3.36337 0.60498 7.16273V18.8368C0.60498 22.6359 3.61524 25.7268 7.31545 25.7268H18.6849C22.3849 25.7268 25.3951 22.6359 25.3951 18.8368V7.16273C25.3951 3.36337 22.3849 0.272461 18.6847 0.272461ZM23.9418 18.8368C23.9418 21.8131 21.5835 24.2346 18.6847 24.2346H7.31545C4.4166 24.2346 2.05829 21.8131 2.05829 18.8368V7.16273C2.05829 4.1862 4.4166 1.76471 7.31545 1.76471H18.6849C21.5835 1.76471 23.9418 4.1862 23.9418 7.16273V18.8368Z"
                                        fill="white" />
                                    <path
                                        d="M13 6.04004C9.26239 6.04004 6.22168 9.16222 6.22168 13C6.22168 16.8378 9.26239 19.96 13 19.96C16.7377 19.96 19.7784 16.8378 19.7784 13C19.7784 9.16222 16.7377 6.04004 13 6.04004ZM13 18.4678C10.0639 18.4678 7.67498 16.015 7.67498 13C7.67498 9.98524 10.0639 7.53228 13 7.53228C15.9364 7.53228 18.3251 9.98524 18.3251 13C18.3251 16.015 15.9364 18.4678 13 18.4678Z"
                                        fill="white" />
                                    <path
                                        d="M19.9405 3.56836C18.836 3.56836 17.9376 4.49101 17.9376 5.62495C17.9376 6.75909 18.836 7.68174 19.9405 7.68174C21.0451 7.68174 21.9437 6.75909 21.9437 5.62495C21.9437 4.49082 21.0451 3.56836 19.9405 3.56836ZM19.9405 6.1893C19.6376 6.1893 19.3909 5.93606 19.3909 5.62495C19.3909 5.31365 19.6376 5.0606 19.9405 5.0606C20.2437 5.0606 20.4904 5.31365 20.4904 5.62495C20.4904 5.93606 20.2437 6.1893 19.9405 6.1893Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_328_333">
                                        <rect width="24.7902" height="25.4544" fill="white"
                                            transform="translate(0.60498 0.272461)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- xroof_info_box_logo -->