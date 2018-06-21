<div class="dokan-seller-listing">

<?php
	global $post;
	$pagination_base = str_replace( $post->ID, '%#%', esc_url( get_pagenum_link( $post->ID ) ) );

	if ( $search == 'yes' ) {
		$search_query = isset( $_GET['dokan_seller_search'] ) ? sanitize_text_field( $_GET['dokan_seller_search'] ) : '';

	} else {
		$search_query = null;
	}
	$template_args = array(
		'sellers'         => $sellers,
		'limit'           => $limit,
		'offset'          => $offset,
		'paged'           => $paged,
		'search_query'    => $search_query,
		'pagination_base' => $pagination_base,
		'per_row'         => $per_row,
		'search_enabled'  => $search,
		'image_size'      => $image_size,
	);

	echo dokan_get_template_part( 'store-lists-loop', false, $template_args );
	?>
</div>

<script>
	(function($){
		$(document).ready(function(){
			var form = $('.dokan-seller-search-form');
			var xhr;
			var timer = null;

			form.on('keyup', '#search', function() {
				var self = $(this),
					data = {
						search_term: self.val(),
						pagination_base: form.find('#pagination_base').val(),
						per_row: '<?php echo ''.$per_row; ?>',
						action: 'dokan_seller_listing_search',
						_wpnonce: form.find('#nonce').val()
					};

				if (timer) {
					clearTimeout(timer);
				}

				if ( xhr ) {
					xhr.abort();
				}

				timer = setTimeout(function() {
					form.find('.dokan-overlay').show();

					xhr = $.post(dokan.ajaxurl, data, function(response) {
						if (response.success) {
							form.find('.dokan-overlay').hide();

							var data = response.data;
							$('#dokan-seller-listing-wrap').html( $(data).find( '.seller-listing-content' ) );
						}
					});
				}, 500);
			} );
		});
	})(jQuery);
</script>