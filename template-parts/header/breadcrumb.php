<?php
/**
 * Breadcrumb Theme
 * 
 * 
 * @package Cleana
 */

$the_post_id   = get_the_ID();
$category =  wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );
if($category){
    $category =  wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] )[0];
}
?>
<section class="mx-auto px-4 py-2 pb-4 flex justify-center flex-wrap dark:bg-slate-900 bg-blue-200">
<!-- Breadcrumb -->
    <nav class="flex bg-gray-50 text-gray-700 border border-gray-200 py-3 px-5 rounded-lg dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse" itemscope itemtype="https://schema.org/BreadcrumbList">
            <?php
            if(is_single()){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a itemscope itemtype="https://schema.org/WebPage"
                    itemprop="item" itemid="<?php echo esc_url( get_category_link( $category)); ?>" 
                    href="<?php echo esc_url( get_category_link( $category)); ?>"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-white dark:hover:text-white">
                    <span itemprop="name">
                        <?php echo esc_html( $category->name ); ?>
                    </span>
                </a>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name"><?php esc_html(single_post_title()); ?></span>
                <meta itemprop="position" content="3" />
                </section>
            </li>
            <?php
            }
            elseif ( is_home() && ! is_front_page() ) {
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <?php
            }
            elseif ( ! is_home() && is_front_page() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name"><?php esc_html(single_post_title()); ?></span>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <?php
            }
            elseif ( is_front_page() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <?php
            }
            elseif ( is_search() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name">صفحة البحث</span>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <?php
            }
            elseif ( is_date() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name"><?php echo get_the_date( 'F j, Y' ); ?></span>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <?php
            }
            elseif ( is_author() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name"><?php esc_html( _e("البروفيل","cleana")); ?></span>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <?php
            }
            elseif ( is_archive() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name"><?php esc_html(single_term_title()); ?></span>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <?php
            }
            elseif ( is_404() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name"><?php esc_html( _e("خطأ 404","cleana")); ?></span>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <?php
            }
            elseif ( is_page() ){
            ?>
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem"
                class="inline-flex items-center" >
                <a itemprop="item" href="<?php echo  esc_url(home_url()); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-white dark:hover:text-white" aria-label="الصفحة الرئيسية">
                    <span itemprop="name" class="hidden">
                        الصفحة الرئيسية
                    </span>
                    <svg item.name="الصفحة الرئيسية" class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li aria-current="page" itemprop="itemListElement" itemscope  itemtype="https://schema.org/ListItem">
                <section class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400" itemprop="name"><?php esc_html(single_post_title()); ?></span>
                <meta itemprop="position" content="2" />
                </section>
            </li>
            <?php
            }else{
                echo"صفحة غير معلوم مصدرها ";
            }
            ?>            
        </ol>
    </nav>
</section>
