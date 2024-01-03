<?php
/*
* Footer Theme
*
* @package Cleana
*/
?>
    <!--Start Footer-->
    <?php get_template_part('template-parts/footer/footer')?>
    <!--End Footer-->
    <?php wp_footer();?>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</body>
</html>