<?php
/**
 * Hero Section
 *
 * @package Cleana
 */
$title = $args[0]['title'];
$paragraph = $args[0]['paragraph'];
$image = $args[0]['image'];
$title2 = $args[1]['title'];
$paragraph2 = $args[1]['paragraph'];
$image2 = $args[1]['image'];
?>
<section class="bg-blue-50 dark:bg-gray-800">
  <section class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
      <section class="mr-auto place-self-center lg:col-span-7">
          <h2 class="page-title text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white"><?php echo $title ?></h2>
          <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400"><?php echo $paragraph ?></p>
      </section>
      <section class="hidden lg:mt-0 lg:col-span-5 lg:flex">
          <img src="<?php echo $image ?>" alt="<?php echo $title ?>">
      </section>                
  </section>
</section>
<section class="bg-blue-200 dark:bg-gray-900" >
  <section class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
    <section class="hidden lg:mt-0 lg:col-span-5 lg:flex">
      <img src="<?php echo $image2 ?>" alt="<?php echo $title2 ?>">
    </section>  
    <section class="mr-auto place-self-center lg:col-span-7">
          <h2 class="page-title text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white"><?php echo $title2 ?></h2>
          <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400"><?php echo $paragraph2 ?></p>
    </section>              
  </section>
</section>