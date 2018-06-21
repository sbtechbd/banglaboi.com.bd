<?php

/**
 * The Template for displaying content of post format standard
 *
 * @author 		tokoo
 * @version     2.0
 */ 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'type-page' ); ?>>
	<?php pustaka_single_post_featured_image( '_blog_thumbnail' ); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="article-paging">' . '<strong>' . esc_html__( 'Pages:', 'pustaka' ) . '</strong>', 'after' => '</div>' ) ); ?>

	<?php if ( pustaka_get_option( 'comment_form', 1 ) && comments_open() ) comments_template(); // Loads the comments.php template. ?>

</article><!-- .hentry -->

