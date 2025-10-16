<?php get_header(); ?>

<!-- Starting of the Blog Area Here -->
<section class="blog blog--style-1">
    <div class="blog__container container">
        <div class="row g-4 overflow-hidden pb-2">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <div class="col-12 col-md-6 col-xl-4">
                        <?php get_template_part('template-parts/content', get_post_format()); ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center"><?php _e('No Posts To Display.'); ?></p>
            <?php endif; ?>

            <?php xroof_navigation(); ?>
        </div>
    </div>
</section>
<!-- End of the Blog Area Here -->

<?php get_footer();