<?php 

/**
 * Remove double metabox
 *
 * @return void
 * @author tokoo
 **/
add_action( 'do_meta_boxes' , 'pustaka_remove_custom_metabox', 20 );
function pustaka_remove_custom_metabox() {
	remove_meta_box( '_testimonials_details' , 'tokoo-testimonials' , 'normal' ); 
}
