<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php wp_head(); ?>
    <title><?= the_title() ;?></title>
</head>

<body>
    <header class="site-header">
        <?=  do_shortcode('[dynamic_main_menu]');?>
    </header>