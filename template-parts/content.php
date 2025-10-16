<?php if (is_single()): ?>
    <article class="blog-details">
        <div class="container">
            <div class="row g-4 g-xl-5">
                <div class="col-lg-8">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-details__content'); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="blog-details__thumbnail-wrap">
                                <?php the_post_thumbnail(
                                    'large',
                                    array('class' => 'blog-details__details-thumb', 'alt' => esc_attr(get_the_title()))
                                ); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="blog-details__highlight-title my-4"> <?php the_title(); ?></h2>
                        <?php the_content(); ?>

                        <div class="blog-details__share p-4 p-lg-6 mt-10 mt-xl-15 mt-xxl-20">
                            <h3 class="blog-details__share-title mb-0"><?php echo esc_html__('Share :', 'xroof'); ?></h3>
                            <?php xroof_blog_share(); ?>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar sidebar--right">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card d-flex flex-column h-100'); ?>>
        <div class="blog-card__header">
            <?php if (has_post_thumbnail()): ?>
                <div class="blog-card__image-wrap">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <?php the_post_thumbnail(
                            'large',
                            array('class' => 'blog-card__image', 'alt' => esc_attr(get_the_title()))
                        ); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php echo get_template_part('template-parts/blog-part/badge') ?>
        </div>

        <div class="blog-card__body">
            <?php if (get_the_title()): ?>
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <h5 class="blog-card__title mb-2">
                        <?php echo esc_html(wp_html_excerpt(get_the_title(), 80, '...')); ?>
                    </h5>
                </a>
            <?php endif; ?>

            <?php if (get_the_excerpt()): ?>
                <p class="blog-card__text">
                    <?php echo esc_html(wp_html_excerpt(get_the_excerpt(), 100, '...')); ?>
                </p>
            <?php endif; ?>

            <?php echo get_template_part('template-parts/blog-part/button') ?>
        </div>
    </article>
<?php endif; ?>