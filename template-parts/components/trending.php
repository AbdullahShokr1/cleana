<?php
/**
 * Posts Trending
 *
 * @package Cleana
 */
$args = [
	'posts_per_page'         => 20,
	'post_type'              => 'post',
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
];
$categories = get_categories(array('orderby' => 'name','order' => 'ASC','hide_empty' => false,));

$post_query = new \WP_Query( $args );

?>
 <!--Start Trending Section-->
 <section dir="ltr" class="Trending_main__M7KMl bg-blue-50 dark:bg-gray-800">
  <section class="Trending_wrapper__98Gw2">
      <h3 class="title text-center font-bold text-lg">
          <span class="gradient">خدماتنا </span> التي نقدمها
      </h3> 
      <section class="Trending_container__mJg5C">
        <section style="--direction: normal;">
            <section class="Trending_inner__ZIzqf">
              <?php
              if ( $post_query->have_posts() ) :
                while ( $post_query->have_posts() ) :
                  $post_query->the_post();
                  ?>
                  <a href="<?php echo esc_url( get_the_permalink() ); ?>" previewlistener="true" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                    <h3><?php echo wp_kses_post( get_the_title()); ?></h3>
                  </a>
                <?php
                endwhile;
              endif;
              ?>
            </section>
        </section>
        <section style="--direction: reverse;">
            <section class="Trending_inner__ZIzqf">
              <?php
                if ( $categories ) :
                  foreach( $categories as $category ) {
                    ?>
                    <h3>
                      <a href="<?php echo get_category_link( $category->term_id ) ?>" previewlistener="true" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                        <?php echo $category->name ?>
                      </a>
                    </h3>
                    <?php
                  }
                  foreach( $categories as $category ) {
                    ?>
                    <h3>
                      <a href="<?php echo get_category_link( $category->term_id ) ?>" previewlistener="true" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                        <?php echo $category->name ?>
                      </a>
                    </h3>
                    <?php
                  }
                endif;
              ?>
            </section>
        </section>
        <section style="--direction: normal;">
            <section class="Trending_inner__ZIzqf">
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("جدة","cleana");?></h3>
              </a>
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("مكة","cleana");?></h3>
              </a>
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("الطائف","cleana");?></h3>
              </a>
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("أبها","cleana");?></h3>
              </a>
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("جازان","cleana");?></h3>
              </a>
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("المدينة المنورة","cleana");?></h3>
              </a>
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("ينبع","cleana");?></h3>
              </a>
              <a href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("ضبا","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("تبوك","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("حائل","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("بريدة","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("عرعر","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("سكاكا","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("هفوف","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("الرياض","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("الدمام","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("الجبيل","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("الخرج","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("رابغ","cleana");?></h3>
              </a>
              <a  href="#" class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("خليص","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("الاحساء","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("عسير","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("خميس مشيط","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("بيشة","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("القصيم","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("الباحة","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("نجران","cleana");?></h3>
              </a>
              <a  href="#"  class="text-white border hover:border-x-black hover:text-black dark:hover:border-sky-600 dark:hover:text-sky-600 dark:bg-neutral-900 bg-teal-600">
                <h3><?php echo _e("النماص","cleana");?></h3>
              </a>
            </section>
        </section>
        <section class="Trending_fade__g12Zk">
        </section>
      </section>
  </section>
</section>
<!--End Trending Section-->