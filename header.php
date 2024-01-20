<?php
/*
* Header Theme
*
* @package Cleana
*/
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"content="<?php bloginfo('description') ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="ar">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "image": "http://manzilak.live/wp-content/uploads/2024/01/Manzilak.png",
      "url": "https://manzilak.live/",
      "sameAs": ["https://manzilak.live/author/abdullahshokr/"],
      "logo": "http://manzilak.live/wp-content/uploads/2024/01/Manzilak.png",
      "name": "منصة منزلك",
      "description": "منصة منزلك للخدمات المنزلية تخدم جميع الخدمات المنزلية في المملكة العربية السعودية مثل خدمات نقل العفش وتنظيف المنازل و مكافحة الحشرات وتسليك المجاري وتنظيف الخزانات وتنظيف السجاد والكنب و الموكيت بالبخار",
      "email": "contact@manzilak.live/",
      "telephone": "+201127251057",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "جدة",
        "addressLocality": "جدة",
        "addressCountry": "SA",
        "addressRegion": "جدة",
        "postalCode": "23531"
      },
      "vatID": "FR12345678901",
      "iso6523Code": "0199:724500PMK2A2M1SQQ228"
    }
    </script>
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