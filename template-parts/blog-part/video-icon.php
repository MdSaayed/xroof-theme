<?php
$post_format_url = function_exists('get_field') ? get_field('post_format_url') : null;
?>

<?php if (!empty($post_format_url)): ?>
    <a href="<?php echo esc_url($post_format_url); ?>" class="blog-card__video-icon glightbox">
        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 18L33 25L20 32V18Z" fill="black" />
        </svg>
    </a>
<?php endif; ?>