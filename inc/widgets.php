<?php
if (!defined('ABSPATH'))
    exit;

// Newsletter Form
class Xroof_Newsletter_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'xroof_newsletter_widget',
            __('Xroof: Newsletter Form', 'xroof'),
            array('description' => __('Footer Newsletter form with editable text', 'xroof'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $title = !empty($instance['title']) ? $instance['title'] : '';
        $desc = !empty($instance['desc']) ? $instance['desc'] : '';

        if ($title) {
            echo '<h5 class="footer__title mb-8">' . esc_html($title) . '</h5>';
        }

        if ($desc) {
            echo '<p class="footer__newsletter-text body-text mb-4">' . esc_html($desc) . '</p>';
        }

        ?>
        <form class="d-flex mt-10">
            <div class="footer__newsletter-form-group d-flex w-100">
                <input type="email" class="newsletter-form form-control"
                    placeholder="<?php esc_attr_e('Email Address', 'xroof'); ?>">
                <button type="submit" class="newsletter-form-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 11 8">
                        <path
                            d="M9.887 3.655c.19.19.19.499 0 .69L6.783 7.449a.437.437 0 0 1-.69 0 .487.487 0 0 1 0-.69L8.853 4 6.093 1.241a.487.487 0 0 1 0-.69.437.437 0 0 1 .69 0L9.887 3.655ZM9.542 4v.488H.458V3.512h9.084V4Z"
                            fill="#EE212B"></path>
                    </svg>
                </button>
            </div>
        </form>
        <?php

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $desc = !empty($instance['desc']) ? $instance['desc'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'xroof'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php esc_html_e('Description:', 'xroof'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>"
                name="<?php echo esc_attr($this->get_field_name('desc')); ?>"><?php echo esc_textarea($desc); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['desc'] = (!empty($new_instance['desc'])) ? sanitize_textarea_field($new_instance['desc']) : '';
        return $instance;
    }
}

// Recent Post Widget
class Xroof_Recent_Posts_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'xroof_recent_posts',
            __('XRooF Recent Posts', 'xroof'),
            array('description' => __('Displays recent posts with thumbnails and word-limited titles.', 'xroof'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Post', 'xroof');
        $number = !empty($instance['number']) ? absint($instance['number']) : 3;
        $word_limit = !empty($instance['word_limit']) ? absint($instance['word_limit']) : 0;
        $order = !empty($instance['order']) && in_array(strtoupper($instance['order']), array('ASC', 'DESC')) ? strtoupper($instance['order']) : 'DESC';

        // Widget title
        echo '<div class="sidebar__posts mt-6 mt-xl-8">';
        echo '<h3 class="sidebar__subtitle mb-2 mb-xl-4">' . esc_html($title) . '</h3>';

        // Query recent posts
        $recent_posts = new WP_Query(array(
            'posts_per_page' => $number,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => $order,
        ));

        if ($recent_posts->have_posts()):
            while ($recent_posts->have_posts()):
                $recent_posts->the_post(); ?>
                <div class="sidebar-post d-flex">
                    <div class="sidebar-post__thumb-wrap">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail', array('class' => 'sidebar-post__thumb', 'alt' => esc_attr(get_the_title())));
                            } else {
                                $default_img = apply_filters('xroof_widget_default_thumb', get_template_directory_uri() . '/assets/img/blog/default.png');
                                echo '<img src="' . esc_url($default_img) . '" class="sidebar-post__thumb" alt="' . esc_attr(get_the_title()) . '">';
                            }
                            ?>
                        </a>
                    </div>
                    <div class="sidebar-post__content">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="sidebar-post__link">
                            <h4 class="sidebar-post__title">
                                <?php
                                if ($word_limit > 0) {
                                    echo esc_html(wp_trim_words(get_the_title(), $word_limit, ''));
                                } else {
                                    echo esc_html(get_the_title());
                                }
                                ?>
                            </h4>
                        </a>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        endif;

        echo '</div>'; // .sidebar__posts

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Post', 'xroof');
        $number = !empty($instance['number']) ? absint($instance['number']) : 3;
        $word_limit = !empty($instance['word_limit']) ? absint($instance['word_limit']) : 0;
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Widget Title:', 'xroof'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:', 'xroof'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>"
                name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1"
                value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('word_limit')); ?>"><?php _e('Title word limit (0 = full title):', 'xroof'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('word_limit')); ?>"
                name="<?php echo esc_attr($this->get_field_name('word_limit')); ?>" type="number" step="1" min="0"
                value="<?php echo esc_attr($word_limit); ?>" size="3">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php _e('Order:', 'xroof'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('order')); ?>"
                name="<?php echo esc_attr($this->get_field_name('order')); ?>" class="widefat">
                <option value="DESC" <?php selected($order, 'DESC'); ?>><?php _e('Descending', 'xroof'); ?></option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>><?php _e('Ascending', 'xroof'); ?></option>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 3;
        $instance['word_limit'] = (!empty($new_instance['word_limit'])) ? absint($new_instance['word_limit']) : 0;
        $instance['order'] = (!empty($new_instance['order']) && in_array(strtoupper($new_instance['order']), array('ASC', 'DESC'))) ? strtoupper($new_instance['order']) : 'DESC';
        return $instance;
    }
}

// Services List
class Xroof_Services_list_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'xroof_sidebar_services_widget',
            __('Xroof Sidebar Services', 'xroof'),
            ['description' => __('Displays list of service posts in the sidebar', 'xroof')]
        );
    }

    // Output on frontend
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $title = !empty($instance['title']) ? $instance['title'] : __('Our Services', 'xroof');

        // Query service posts
        $query = new WP_Query([
            'post_type' => 'service',
            'posts_per_page' => !empty($instance['number']) ? absint($instance['number']) : 8,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        ?>
        <div class="sidebar__services">
            <?php if ($title): ?>
                <h2 class="sidebar__title pb-6 pb-xl-8 mt-6 mt-xl-8">
                    <?php echo esc_html($title); ?> :
                </h2>
            <?php endif; ?>

            <ul class="sidebar__list pt-6 pt-xl-8">
                <?php if ($query->have_posts()): ?>
                    <?php while ($query->have_posts()):
                        $query->the_post(); ?>
                        <li class="sidebar__item">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                <?php else: ?>
                    <li class="sidebar__item"><?php _e('No services found.', 'xroof'); ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php

        wp_reset_postdata();
        echo $args['after_widget'];
    }

    // Admin form
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Services', 'xroof');
        $number = !empty($instance['number']) ? absint($instance['number']) : 8;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Title:', 'xroof'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
                <?php _e('Number of services to show:', 'xroof'); ?>
            </label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>"
                name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1"
                value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }

    // Save settings
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        return $instance;
    }
}

// Appointment Card
class Xroof_Appointment_Card_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'xroof_appointment_card',
            esc_html__('Xroof Appointment Card', 'xroof-core'),
            ['description' => esc_html__('Displays an appointment card with contact info', 'xroof-core')]
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Default values
        $defaults = [
            'background_image' => get_template_directory_uri() . '/assets/img/global/appointment-card-img.png',
            'heading' => 'Need a Roofing Services',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus',
            'button_text' => 'Book An Appointment',
            'button_url' => home_url('/contact'),
            'phone_number' => '+1234567890'
        ];

        $instance = wp_parse_args((array) $instance, $defaults);

        $background_image = esc_url($instance['background_image']);
        $heading = esc_html($instance['heading']);
        $description = esc_html($instance['description']);
        $button_text = esc_html($instance['button_text']);
        $button_url = esc_url($instance['button_url']);
        $phone_number = esc_attr($instance['phone_number']);

        // Only render markup if all required fields are filled
        if ($background_image && $heading && $description && $button_text && $button_url && $phone_number):
            ?>
            <div class="sidebar__appointment-card mt-6 mt-xl-8" data-bg-img="<?php echo $background_image; ?>">
                <div class="appointment-card__body">
                    <h2 class="appointment-card__heading mb-4"><?php echo $heading; ?></h2>
                    <p class="appointment-card__description body-text">
                        <?php echo $description; ?>
                    </p>

                    <div class="appointment-card__actions mt-6 mt-xl-8">
                        <a href="<?php echo $button_url; ?>" class="appointment-card__btn btn btn-primary">
                            <?php echo $button_text; ?>
                        </a>

                        <a href="tel:<?php echo $phone_number; ?>" class="appointment-card__btn appointment-card__btn--phn">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                <path
                                    d="M19.7529 15.604L16.956 12.8071C15.9571 11.8082 14.2589 12.2078 13.8594 13.5063C13.5597 14.4054 12.5608 14.9048 11.6618 14.705C9.66395 14.2055 6.96691 11.6084 6.46746 9.51069C6.16779 8.61164 6.76713 7.61273 7.66615 7.3131C8.96472 6.91354 9.36428 5.2154 8.36538 4.2165L5.56845 1.41957C4.76932 0.720333 3.57064 0.720333 2.87141 1.41957L0.973487 3.31748C-0.924431 5.31529 1.17327 10.6095 5.86812 15.3043C10.563 19.9992 15.8572 22.1968 17.855 20.199L19.7529 18.301C20.4522 17.5019 20.4522 16.3032 19.7529 15.604Z"
                                    fill="#EE212B" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        endif;

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $defaults = [
            'background_image' => get_template_directory_uri() . '/assets/img/global/appointment-card-img.png',
            'heading' => 'Need a Roofing Services',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus',
            'button_text' => 'Book An Appointment',
            'button_url' => home_url('/contact'),
            'phone_number' => '+1234567890'
        ];

        $instance = wp_parse_args((array) $instance, $defaults);

        $background_image = esc_url($instance['background_image']);
        $heading = esc_attr($instance['heading']);
        $description = esc_attr($instance['description']);
        $button_text = esc_attr($instance['button_text']);
        $button_url = esc_url($instance['button_url']);
        $phone_number = esc_attr($instance['phone_number']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('heading'); ?>"><?php esc_html_e('Heading:', 'xroof-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('heading'); ?>"
                name="<?php echo $this->get_field_name('heading'); ?>" type="text" value="<?php echo $heading; ?>">
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('description'); ?>"><?php esc_html_e('Description:', 'xroof-core'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>"
                name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea>
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('button_text'); ?>"><?php esc_html_e('Button Text:', 'xroof-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>"
                name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>">
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('button_url'); ?>"><?php esc_html_e('Button URL:', 'xroof-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('button_url'); ?>"
                name="<?php echo $this->get_field_name('button_url'); ?>" type="url" value="<?php echo $button_url; ?>">
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('phone_number'); ?>"><?php esc_html_e('Phone Number:', 'xroof-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone_number'); ?>"
                name="<?php echo $this->get_field_name('phone_number'); ?>" type="text" value="<?php echo $phone_number; ?>">
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('background_image'); ?>"><?php esc_html_e('Background Image:', 'xroof-core'); ?></label>
            <input class="widefat upload_image" id="<?php echo $this->get_field_id('background_image'); ?>"
                name="<?php echo $this->get_field_name('background_image'); ?>" type="text"
                value="<?php echo $background_image; ?>">
            <button class="button select-image-button"><?php esc_html_e('Upload Image', 'xroof-core'); ?></button>
        </p>

        <script>
            jQuery(document).ready(function ($) {
                $('.select-image-button').on('click', function (e) {
                    e.preventDefault();
                    let button = $(this);
                    let input = button.prev('.upload_image');
                    let frame = wp.media({
                        title: 'Select or Upload Image',
                        button: { text: 'Use this image' },
                        multiple: false
                    });
                    frame.on('select', function () {
                        let attachment = frame.state().get('selection').first().toJSON();
                        input.val(attachment.url);
                    });
                    frame.open();
                });
            });
        </script>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['background_image'] = (!empty($new_instance['background_image'])) ? esc_url_raw($new_instance['background_image']) : '';
        $instance['heading'] = (!empty($new_instance['heading'])) ? sanitize_text_field($new_instance['heading']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? sanitize_textarea_field($new_instance['description']) : '';
        $instance['button_text'] = (!empty($new_instance['button_text'])) ? sanitize_text_field($new_instance['button_text']) : '';
        $instance['button_url'] = (!empty($new_instance['button_url'])) ? esc_url_raw($new_instance['button_url']) : '';
        $instance['phone_number'] = (!empty($new_instance['phone_number'])) ? sanitize_text_field($new_instance['phone_number']) : '';

        return $instance;
    }
}

// Info box
class Xroof_Info_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'xroof_info_widget',
            __('Xroof: More Information', 'xroof-core'),
            array('description' => __('Displays customizable business hours or info list.', 'xroof-core'))
        );
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('More Information :', 'xroof-core');
        $items_text = !empty($instance['items']) ? $instance['items'] : '';
        $items = array_filter(array_map('trim', explode("\n", $items_text)));

        echo $args['before_widget'];
        ?>
        <div class="sidebar__services mt-6 mt-xl-8 py-6 py-xl-8">
            <?php if (!empty($title)): ?>
                <h2 class="sidebar__title pb-6 pb-xl-8 mt-6 mt-xl-8">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($items)): ?>
                <ul class="sidebar__list pt-6 pt-xl-8">
                    <?php foreach ($items as $item): ?>
                        <li class="sidebar__item"><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('More Information :', 'xroof-core');
        $items = !empty($instance['items']) ? $instance['items'] : "Monday : 10.00 AM - 4.00 PM\nTuesday : 10.00 AM - 4.00 PM\nWednesday : 10.00 AM - 4.00 PM\nThursday : 10.00 AM - 4.00 PM\nFriday : Close";
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php echo esc_html__('Title:', 'xroof-core'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('items')); ?>">
                <?php echo esc_html__('Items:', 'xroof-core'); ?>
            </label>
            <textarea class="widefat" rows="8" id="<?php echo esc_attr($this->get_field_id('items')); ?>"
                name="<?php echo esc_attr($this->get_field_name('items')); ?>"><?php echo esc_textarea($items); ?></textarea>
            <small style="color:#666; display:block; margin-top:4px;">
                <?php echo esc_html__('👉 For new item, press Enter on a new line.', 'xroof-core'); ?>
            </small>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['items'] = sanitize_textarea_field($new_instance['items']);
        return $instance;
    }
}

// Project Details
class Xroof_Project_Details_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'xroof_project_details_widget',
            __('Xroof: Project Details', 'xroof-core'),
            ['description' => __('Displays ACF project details such as client, start/end date, address, and rating.', 'xroof-core')]
        );
    }

    public function widget($args, $instance)
    {
        // Run only if ACF is active
        if (!function_exists('get_field')) {
            return;
        }

        $client_name = get_field('project-client-name');
        $start_date = get_field('project_start_date');
        $end_date = get_field('project_end_date');
        $address = get_field('project_address');
        $rating = get_field('project_rating');

        // Check if any data exists
        if (empty($client_name) && empty($start_date) && empty($end_date) && empty($address) && empty($rating)) {
            return;
        }

        echo $args['before_widget'];
        ?>

        <div class="sidebar__project-details mb-6 mb-xl-8">
            <h2 class="sidebar__title pb-6 pb-xl-8">
                <?php echo esc_html__('Project details :', 'xroof-core'); ?>
            </h2>

            <ul class="project-details mt-6 mt-xl-8">

                <?php if (!empty($client_name)): ?>
                    <li class="project-details__item">
                        <div class="project-details__group">
                            <span class="project-details__label"><?php echo esc_html__('Client', 'xroof-core'); ?></span>
                            <span class="project-details__separator">:</span>
                        </div>
                        <span class="project-details__value"><?php echo esc_html($client_name); ?></span>
                    </li>
                <?php endif; ?>

                <?php if (!empty($start_date)): ?>
                    <li class="project-details__item">
                        <div class="project-details__group">
                            <span class="project-details__label"><?php echo esc_html__('Start', 'xroof-core'); ?></span>
                            <span class="project-details__separator">:</span>
                        </div>
                        <span class="project-details__value"><?php echo esc_html($start_date); ?></span>
                    </li>
                <?php endif; ?>

                <?php if (!empty($end_date)): ?>
                    <li class="project-details__item">
                        <div class="project-details__group">
                            <span class="project-details__label"><?php echo esc_html__('End', 'xroof-core'); ?></span>
                            <span class="project-details__separator">:</span>
                        </div>
                        <span class="project-details__value"><?php echo esc_html($end_date); ?></span>
                    </li>
                <?php endif; ?>

                <?php if (!empty($address)): ?>
                    <li class="project-details__item">
                        <div class="project-details__group">
                            <span class="project-details__label"><?php echo esc_html__('Address', 'xroof-core'); ?></span>
                            <span class="project-details__separator">:</span>
                        </div>
                        <span class="project-details__value"><?php echo esc_html($address); ?></span>
                    </li>
                <?php endif; ?>

                <?php if (!empty($rating)): ?>
                    <li class="project-details__item">
                        <div class="project-details__group">
                            <span class="project-details__label"><?php echo esc_html__('Rating', 'xroof-core'); ?></span>
                            <span class="project-details__separator">:</span>
                        </div>
                        <?php
                        $rating_value = floatval($rating);
                        $filled_stars = str_repeat('★', floor($rating_value));
                        $half_star = ($rating_value - floor($rating_value)) >= 0.5 ? '½' : '';
                        $empty_stars = str_repeat('☆', 5 - ceil($rating_value));
                        ?>
                        <span class="project-details__value project-details__rating">
                            <?php echo esc_html($filled_stars . $half_star . $empty_stars); ?>
                        </span>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        ?>
        <p style="color:#555;">
            <?php echo esc_html__('This widget automatically pulls data from ACF fields:', 'xroof-core'); ?><br>
            <code>project-client-name</code>, <code>project_start_date</code>, <code>project_end_date</code>,
            <code>project_address</code>, <code>project_rating</code>
        </p>
        <p style="color:#888;">
            <?php echo esc_html__('Note: This widget will only work if Advanced Custom Fields (ACF) is active and the fields contain data.', 'xroof-core'); ?>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return $old_instance;
    }
}

//  Xroof Photo Gallery Widget
class Xroof_Photo_Gallery_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'xroof_photo_gallery',
            esc_html__('Xroof: Photo Gallery', 'xroof-core'),
            ['description' => esc_html__('Display a photo gallery with selected images.', 'xroof-core')]
        );
        add_action('admin_enqueue_scripts', array($this, 'enqueue_media_script'));
    }

    public function enqueue_media_script($hook) {
        if ('widgets.php' === $hook || (isset($_GET['customize_autosaved']) && 'true' === $_GET['customize_autosaved'])) {
            wp_enqueue_media();
        }
    }

    public function widget($args, $instance) {
        $title  = !empty($instance['title']) ? $instance['title'] : esc_html__('Photo Gallery', 'xroof-core');
        $images = !empty($instance['images']) ? $instance['images'] : [];

        if (empty($images)) {
            return;
        }

        echo $args['before_widget']; ?>

        <div class="sidebar__gallery mt-6 mt-xl-8">
            <h3 class="sidebar__subtitle mb-4 mb-xl-8"><?php echo esc_html($title); ?></h3>

            <div class="gallery">
                <?php foreach ($images as $image_id) :
                    $img_url   = wp_get_attachment_image_url($image_id, 'large');
                    $img_alt   = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    $img_title = get_the_title($image_id);

                    if ($img_url): ?>
                        <div class="gallery__item">
                            <div class="gallery__img-wrap">
                                <img src="<?php echo esc_url($img_url); ?>"
                                    alt="<?php echo esc_attr($img_alt ? $img_alt : $img_title); ?>"
                                    class="gallery__img">
                            </div>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>

        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title  = isset($instance['title']) ? esc_attr($instance['title']) : esc_html__('Photo Gallery', 'xroof-core');
        $images = isset($instance['images']) ? $instance['images'] : [];
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Title:', 'xroof-core'); ?>
            </label>
            <input class="widefat"
                   id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label><?php esc_html_e('Select Images:', 'xroof-core'); ?></label>
            
            <br><small style="font-size: 11px; color: #888; font-style: italic;">Image size will be 110x100.</small>

            <input type="hidden"
                   id="<?php echo esc_attr($this->get_field_id('images')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('images')); ?>"
                   value="<?php echo esc_attr(implode(',', (array)$images)); ?>"
                   class="xroof-gallery-ids-field">

            <button type="button" class="button select-xroof-gallery-images"
                    data-target-input="#<?php echo esc_attr($this->get_field_id('images')); ?>"
                    data-target-preview="#<?php echo esc_attr($this->get_field_id('images')); ?>-preview-ul">
                <?php esc_html_e('Select Images', 'xroof-core'); ?>
            </button>

            <ul class="xroof-gallery-preview"
                id="<?php echo esc_attr($this->get_field_id('images')); ?>-preview-ul"
                style="margin-top:10px;">
                <?php
                if (!empty($images)) {
                    foreach ($images as $image_id) {
                        $thumb = wp_get_attachment_image_url($image_id, 'thumbnail');
                        if ($thumb) {
                            echo '<li style="display:inline-block;margin-right:5px;">
                                    <img src="' . esc_url($thumb) . '" width="60" height="60" style="border-radius:4px;">
                                </li>';
                        }
                    }
                }
                ?>
            </ul>
        </p>

        <script>
            (function() {
                function setupGalleryUploader(targetElement) {
                    if (targetElement.classList.contains('select-xroof-gallery-images')) {
                        const button = targetElement;
                        const inputId = button.getAttribute('data-target-input');
                        const previewId = button.getAttribute('data-target-preview');
                        
                        const input = document.querySelector(inputId);
                        const preview = document.querySelector(previewId);

                        if (!input || !preview || !window.wp || !window.wp.media) {
                            console.error('WordPress Media Library or required elements not found.');
                            return;
                        }

                        const mediaUploader = wp.media({
                            title: '<?php echo esc_js(esc_html__('Select Images', 'xroof-core')); ?>',
                            button: {text: '<?php echo esc_js(esc_html__('Use these images', 'xroof-core')); ?>'},
                            multiple: true
                        });

                        mediaUploader.on('select', function () {
                            const attachments = mediaUploader.state().get('selection').toJSON();
                            const ids = attachments.map(att => att.id);
                            
                            input.value = ids.join(',');

                            preview.innerHTML = '';
                            attachments.forEach(att => {
                                const thumb = att.sizes && att.sizes.thumbnail ? att.sizes.thumbnail.url : att.url;
                                
                                const listItem = document.createElement('li');
                                listItem.style.display = 'inline-block';
                                listItem.style.marginRight = '5px';
                                
                                const img = document.createElement('img');
                                img.src = thumb;
                                img.width = 60;
                                img.height = 60;
                                img.style.borderRadius = '4px';
                                
                                listItem.appendChild(img);
                                preview.appendChild(listItem);
                            });
                            
                            mediaUploader.close();
                            input.dispatchEvent(new Event('change', { bubbles: true }));
                        });

                        mediaUploader.open();
                    }
                }

                if (window.jQuery) {
                    window.jQuery(document).on('click', '.select-xroof-gallery-images', function(e) {
                         e.preventDefault();
                         setupGalleryUploader(this);
                    });
                } else {
                    document.addEventListener('click', function(e) {
                         if (e.target && e.target.classList.contains('select-xroof-gallery-images')) {
                             e.preventDefault();
                             setupGalleryUploader(e.target);
                         }
                    });
                }
            })();
        </script>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title']  = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['images'] = !empty($new_instance['images']) ? array_map('absint', explode(',', $new_instance['images'])) : [];
        return $instance;
    }
}
 
function xroof_register_widgets()
{
    register_widget('Xroof_Newsletter_Widget');
    register_widget('Xroof_Recent_Posts_Widget');
    register_widget('Xroof_Services_list_Widget');
    register_widget('Xroof_Appointment_Card_Widget');
    register_widget('Xroof_Info_Widget');
    register_widget('Xroof_Project_Details_Widget');
    register_widget('Xroof_Photo_Gallery_Widget');
}
add_action('widgets_init', 'xroof_register_widgets');



