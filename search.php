<?php
/**
 * Search result page.
 */

get_header();
global $wp_query;

?>
	<div id="primary">
		<main id="main" class="site-main mt-5" role="main">
            <section class=" mx-auto p-5 sm:p-10 md:p-16 bg-blue-50 dark:bg-slate-800">
                
                <section class="relative md:block">
                    <?php get_search_form( ); ?>
                </section> 
				<section class="mx-auto max-w-2xl lg:text-center">
                    <h1 class="text-center dark:text-white font-bold"><?php _e( 'نتيجة البحث عن ', 'locale' ); ?>: <?php the_search_query(); ?></h1>
                    <p class="mt-2 text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl text-center">
                        <button type="button" class=" text-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <?php echo $wp_query->found_posts; ?>
                        </button>
                    </p>
                   
                </section>
                
                <?php if ( have_posts() ) { ?>
					<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

						<?php while ( have_posts() ) {
							the_post();
                            ?>
							<!-- CARD -->
                            <section class="rounded overflow-hidden shadow-lg flex flex-col ">
                                <a href="<?php echo esc_url( get_permalink() ); ?>"></a>
                                <section class="relative">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                                        <?php
                                            the_post_custom_thumbnail(
                                                get_the_ID(),
                                                'featured-thumbnail',
                                                [
                                                    'sizes' => '(max-width: 100%) 437px,(max-height: 232px) 232px 233px',
                                                    'class' => 'featured-thumbnail-image',
                                                    'alt'=> wp_kses_post( get_the_title() )
                                                ]
                                            );
                                        ?>
                                        <section class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></section>
                                    </a>
                                    <section class="text-xs absolute top-0 left-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                        <?php 
                                        $post_type_object = get_post_type_object(get_post_type());
                                        if ( $post_type_object ) {
                                            echo esc_html( $post_type_object->labels->singular_name );
                                        }
                                        
                                        ?>
                                    </section>
                                </section>
                                <section class="px-6 py-4 mb-auto bg-slate-50 ">
                                    <?php
                                    // Title
                                    if ( is_single() || is_page() ) {
                                        printf(
                                            '<h1 class="page-title font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2 %1$s">%2$s</h1>',
                                            esc_attr( $heading_class ),
                                            wp_kses_post( get_the_title() )
                                        );
                                    } else {
                                        printf(
                                            '<h3 class="entry-title post-card-title mb-3"><a class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2" href="%1$s">%2$s</a></h3>',
                                            esc_url( get_the_permalink() ),
                                            wp_kses_post( get_the_title() )
                                        );
                                    }
                                    ?>
                                    <p class="text-gray-500 text-sm">
                                        <?php cleana_the_excerpt( 200 ); ?>
                                    </p>
                                </section>
                            </section>
						<?php } ?>

					</section>

					<?php cleana_pagination(); ?>

				<?php } else {
					?>
                    <p class="mt-2 text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl text-center dark:text-white">
                        <?php echo __("لا توجد نتائج بحث","cleana");?>
                    </p>
                    <?php
				}?>

			</section>
            <section class=" mx-auto px-4 py-2 pb-4 flex justify-center flex-wrap dark:bg-slate-900 bg-blue-200">
                <!-- Pagination -->
                <?php the_posts_pagination();?>
            </section>
		</main>
	</div>
<?php get_footer(); ?>





