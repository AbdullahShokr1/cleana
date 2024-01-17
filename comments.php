<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Cleana
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php
function my_custom_comment_callback( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  ?>
  <div class="flex">
    <div class="flex-shrink-0 mr-3">
      <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="<?php echo get_avatar_url( $comment, 80 ); ?>" alt="">
    </div>
    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
      <strong><?php comment_author(); ?></strong><br>
	  <span class="text-xs text-gray-400"><?php comment_date(); ?></span>
      <p class="text-sm"><?php comment_text(); ?></p>
      <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
      <?php endif; ?>
    </div>
  </div>
  <?php
}

if ( have_comments() ) :
?>
<div class="antialiased mx-auto max-w-screen-sm">
  <h3 class="mb-4 text-lg font-semibold text-gray-900"><?php echo _e('التعليقات',"cleana")." ("; echo number_format_i18n( get_comments_number()).")";?></h3>
  <div class="space-y-4">
    <?php
    wp_list_comments( array(
      'style'      => 'div',
      'callback'   => 'my_custom_comment_callback',
      'avatar_size' => 80,
    ) );
    ?>
  </div>
</div>
<?php
endif;

?>
<?php comment_form(); ?>

















