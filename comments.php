<?php

/**
 * The Template for comments
 *
 * @author 		tokoo
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'pustaka_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function pustaka_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'pustaka' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'pustaka' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>

		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size'] ); } ?>
					<?php printf( esc_html__( '%s', 'pustaka' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s', '1: date', 'pustaka' ), get_comment_date() ); ?>
						</time>
					</a>

					<?php edit_comment_link( esc_html__( 'Edit', 'pustaka' ), '<span class="edit-link">', '</span>' ); ?>

				</div><!-- .comment-metadata -->
			</footer>

			<div class="comment-content">
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'pustaka' ); ?></p>
				<?php endif; ?>

				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'pustaka' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->

		</div>

	<?php
	endif;
}
endif; // ends check for aio_comment()

/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() )
	/* if on WooCommerce pages, return. */
	|| ( class_exists( 'woocommerce' ) && ( pustaka_is_woocommerce_pages() ) ) )
	return;
?>
	<div class="post__comment">
		<div id="comments" class="comments-area">

			<?php if ( have_comments() ) : ?>
				
				<div class="section-header">
					<h2 class="section-title comments-title"><?php printf( _nx( 'One Thought on %2$s', '%1$s Thoughts on %2$s', get_comments_number(), 'comments title', 'pustaka' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></h2>
					
				</div>

				<?php if ( get_option( 'page_comments' ) ) : ?>
					<div class="comments-nav">
						<span class="page-numbers"><?php printf( esc_html__( 'Page %1$s of %2$s', 'pustaka' ), ( get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1 ), get_comment_pages_count() ); ?></span>
						<nav class="navigation comment-navigation" role="navigation">
							<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'pustaka' ); ?></h1>
							<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'pustaka' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'pustaka' ) ); ?></div>
						</nav><!-- .comment-navigation -->
					</div><!-- .comments-nav -->
				<?php endif; ?>

				<?php do_action( 'pustaka_comment_list_before' ); ?>

					<ol class="comment-list">
						<?php wp_list_comments( array( 'callback' => 'pustaka_comment', 'avatar_size' => 60 ) ); ?>
					</ol><!-- .comment-list -->

				<?php do_action( 'pustaka_comment_list_after' ); ?>

			<?php endif; ?>

			<?php if ( pings_open() && ! comments_open() ) : ?>

				<p class="comments-closed pings-open">
					<?php printf( wp_kses( __( 'Comments are closed, but <a href="%s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 'pustaka' ), array( 'a' => array( 'href' => array(), 'title' => array() ), ) ), esc_url( get_trackback_url() ) ); ?>
				</p><!-- .comments-closed .pings-open -->

			<?php elseif ( ! comments_open() && ( pustaka_option( 'pustaka_comment_form', 1 ) == 0 ) ) : ?>

				<p class="comments-closed">
					<?php esc_html_e( 'Comments are closed.', 'pustaka' ); ?>
				</p><!-- .comments-closed -->

			<?php endif; ?>

			<?php
				$commenter 	= wp_get_current_commenter();
				$req 		= get_option( 'require_name_email' );
				$aria_req 	= ( $req ? " aria-required='true'" : '' );

				$fields =  array(
					'author' 	=> '<p class="comment-form-author"><input id="author" class="input-text" name="author" type="text" placeholder="'.esc_html__( 'Your Name *', 'pustaka' ).'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
					'email' 	=> '<p class="comment-form-email"><input id="email" class="input-text" name="email" type="text" placeholder="'.esc_html__( 'Your Email Address *', 'pustaka' ).'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
					'url' 		=> '<p class="comment-form-url"><input id="url" class="input-text" name="url" type="text" placeholder="'.esc_html__( 'Your Website (optional)', 'pustaka' ).'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
				);

				$args = array(
					'title_reply_before'	=> '<div class="section-header"><h2 class="section-title comment-reply-title">',
					'title_reply_after'		=> '</h2></div>',
					'comment_field' 		=> '<p class="comment-form-comment"><textarea class="input-text" id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__( 'Your Comment *', 'pustaka' ).'" aria-required="true"></textarea></p>',
					'fields' 				=> apply_filters( 'pustaka_comment_form_default_fields', $fields ),
				);

				comment_form( $args ); // Loads the comment form. ?>

		</div><!-- #comments -->
	</div>
