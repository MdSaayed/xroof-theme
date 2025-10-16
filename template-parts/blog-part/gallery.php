<?php
    $post_format_gallery = function_exists('get_field') ? get_field('post_format_gallery') : null;
?>

<div class="blog-card__gallery">
    <?php if (!empty($post_format_gallery) && is_array($post_format_gallery)): ?>
        <?php foreach ($post_format_gallery as $image): ?>
            <div class="blog-card__slide h-100">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="blog-details__details-thumb">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>