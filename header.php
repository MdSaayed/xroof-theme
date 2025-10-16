<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body class="<?php body_class(); ?>">
    <?php echo get_template_part('template-parts/header/header-1') ?>

    <main class="main">

        <?php do_action('xroof_header_before'); ?>