<?php

/**
 * Extends search form 
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'get_search_form', 'pustaka_extend_searchform' );
function pustaka_extend_searchform( $form ) {
	ob_start();
	?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'pustaka' ); ?>">
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'pustaka' ); ?>">
	</form>
	<?php 
	$form = ob_get_contents();
	ob_get_clean();

	return $form;
}
