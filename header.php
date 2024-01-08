<?php
/*
* Header Theme
*
* @package Cleana
*/
?>
<!DOCTYPE html>
<html lang="<?php language_attributes() ?>">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"content="<?php bloginfo('description') ?>">
    <?php wp_head();?>
</head>
<body dir="rtl" <?php body_class();?>>
    <?php wp_body_open()?>
    <!--Start Header Section-->
    <header class="bg-white dark:bg-gray-900 dark:border-gray-700">
        <!--Start NavBar-->
        <?php get_template_part('template-parts/header/nav');?>
        <!--End NavBar-->
    </header>
    <!--End Header Section-->
    <!--Start Breadcrumb-->
    <?php get_template_part('template-parts/header/breadcrumb');?>
    <!--End Breadcrumb-->