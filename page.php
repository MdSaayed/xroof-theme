<?php get_header(); ?>

<!-- Starting of the Blog Area Here -->
<section class="page">
    <div class="page__container container">
        <div class="page__wrap">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <?php get_template_part('template-parts/content', 'page'); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center"><?php _e('No Page Content To Display.','xroof'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End of the Blog Area Here -->

<?php get_footer();


