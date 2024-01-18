<?php
/*
* Header Theme
*
* @package Cleana
*/
?>
<!DOCTYPE html>
<html lang=<?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"content="<?php bloginfo('description') ?>">
    <?php wp_head();?>
</head>
<body dir="rtl" <?php body_class();?>>
    <?php wp_body_open()?>
    <!--Start Header Section-->
    <header class="h-srceen sticky top-0 z-40 flex-none mx-auto w-full border-gray-50/0 transition-[opacity] ease-in-out scroll" data-aw-sticky-header>
        <!--Start NavBar-->
        <?php get_template_part('template-parts/header/nav');?>
        <!--End NavBar-->
    </header>
    <!--End Header Section-->
    <!--Start Breadcrumb-->
    <?php get_template_part('template-parts/header/breadcrumb');?>
    <!--End Breadcrumb-->