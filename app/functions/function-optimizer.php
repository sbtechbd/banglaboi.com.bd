<?php 


if ( ! is_admin() ) {
	/**
	 * Remove Query String
	 *
	 * @return void
	 * @author tokoo
	 **/
	add_filter( 'script_loader_src', 'pustaka_remove_query_strings_1', 15, 1 );
	add_filter( 'style_loader_src', 'pustaka_remove_query_strings_1', 15, 1 );
	function pustaka_remove_query_strings_1( $src ) {	
		$rqs = explode( '?ver', $src );
		return $rqs[0];
	}

	/**
	 * Remove Query String
	 *
	 * @return void
	 * @author tokoo
	 **/
	add_filter( 'script_loader_src', 'pustaka_remove_query_strings_2', 15, 1 );
	add_filter( 'style_loader_src', 'pustaka_remove_query_strings_2', 15, 1 );
	function pustaka_remove_query_strings_2( $src ) {
		$rqs = explode( '&ver', $src );
			return $rqs[0];
	}
}