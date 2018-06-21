<?php 
	$get_default_layout 	= get_theme_mod( 'pustaka_product_default_layout', 'grid' );
	$get_default_perpage 	= get_theme_mod( 'pustaka_product_per_page' , '9' ) + 1;

	$product_layout 	= isset( $_GET['layout'] ) ? $_GET['layout'] : $get_default_layout;
	$args = array(
		'post_type'				=> 'product',
		'posts_per_page'		=> -1,
		'ignore_sticky_posts'  	=> 1,
		'no_found_rows'        	=> 1,
		'orderby'				=> 'date',
		'order'					=> 'DESC'
	);

	$the_products = new WP_Query( $args );

	if ( $the_products->have_posts() ) : ?>

		<?php while ( $the_products->have_posts() ) : $the_products->the_post();
			
			// REGULAR PRODUCTS
			$get_product_type 	= get_post_meta( get_the_ID(), 'wcbs_product_type', true );
			$get_default_type 	= get_theme_mod( 'pustaka_product_default_type', 'regular' );
			$product_type 		= ! empty( $get_product_type ) ? $get_product_type : $get_default_type;

			ob_start();
				if ( 'book' == $get_product_type ) {
					if ( 'list' == $product_layout ) {
						wc_get_template_part( 'content', 'product-list' );
					} else {
						wc_get_template_part( 'content', 'product' );
					}
					$book_products[] = ob_get_contents();
				}
				if ( 'movie' == $get_product_type ) {
					if ( 'list' == $product_layout ) {
						wc_get_template_part( 'content', 'product-list' );
					} else {
						wc_get_template_part( 'content', 'product' );
					}
					$movie_products[] = ob_get_contents();
				}
				if ( 'audio' == $get_product_type ) {
					if ( 'list' == $product_layout ) {
						wc_get_template_part( 'content', 'product-list' );
					} else {
						wc_get_template_part( 'content', 'product' );
					}
					$audio_products[] = ob_get_contents();
				}
				if ( 'game' == $get_product_type ) {
					if ( 'list' == $product_layout ) {
						wc_get_template_part( 'content', 'product-list' );
					} else {
						wc_get_template_part( 'content', 'product' );
					}
					$game_products[] = ob_get_contents();
				}
				if ( ! isset( $get_product_type ) || empty( $get_product_type ) || 'regular' == $get_product_type ) {
					if ( 'list' == $product_layout ) {
						wc_get_template_part( 'content', 'product-list' );
					} else {
						wc_get_template_part( 'content', 'product' );
					}
					$regular_products[] = ob_get_contents();
				}	
			ob_end_clean();

		endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

<!-- DISPLAY -->
<?php $shop_page_id = get_option( 'woocommerce_shop_page_id' ); ?>
<?php if ( ! empty( $regular_products ) ) : ?>
	<header class="section-header">
		<h2 class="section-title"><?php echo esc_html__( 'Regular', 'pustaka' ); ?></h2>
	</header>
	<?php woocommerce_product_loop_start(); ?>
		<?php $reg = 1; ?>
		<?php foreach ( $regular_products as $regular ) : ?>
			<?php if ( $get_default_perpage > $reg ) : ?>
				<?php echo ''.$regular; ?>
			<?php endif; ?>
		<?php $reg++; endforeach; ?>
	<?php woocommerce_product_loop_end(); ?>

	<div class="view-all">
		<a class="button button--primary" href="<?php echo esc_url( add_query_arg( 'product_type', 'regular', get_permalink( wc_get_page_id( 'shop' ) ) ) ); ?>"><?php esc_html_e( 'View All', 'pustaka' ); ?></a>
	</div>
<?php endif; ?>

<?php if ( ! empty( $book_products ) ) : ?>
	<header class="section-header">
		<h2 class="section-title"><?php echo esc_html__( 'Books', 'pustaka' ); ?></h2>
	</header>
	<?php woocommerce_product_loop_start(); ?>
		<?php $book = 1; ?>
		<?php foreach ( $book_products as $buku ) : ?>
			<?php if ( $get_default_perpage > $book ) : ?>
				<?php echo ''.$buku; ?>
			<?php endif; ?>
		<?php $book++; endforeach; ?>
	<?php woocommerce_product_loop_end(); ?>

	<div class="view-all">
		<a class="button button--primary" href="<?php echo esc_url( add_query_arg( 'product_type', 'book', get_permalink( wc_get_page_id( 'shop' ) ) ) ); ?>"><?php esc_html_e( 'View All', 'pustaka' ); ?></a>
	</div>
<?php endif; ?>

<?php if ( ! empty( $movie_products ) ) : ?>
	<header class="section-header">
		<h2 class="section-title"><?php echo esc_html__( 'Movie', 'pustaka' ); ?></h2>
	</header>
	<?php woocommerce_product_loop_start(); ?>
		<?php $mov = 1; ?>
		<?php foreach ( $movie_products as $movies ) : ?>
			<?php if ( $get_default_perpage > $mov ) : ?>
				<?php echo ''.$movies; ?>
			<?php endif; ?>
		<?php $mov++; endforeach; ?>
	<?php woocommerce_product_loop_end(); ?>

	<div class="view-all">
		<a class="button button--primary" href="<?php echo esc_url( add_query_arg( 'product_type', 'movie', get_permalink( wc_get_page_id( 'shop' ) ) ) ); ?>"><?php esc_html_e( 'View All', 'pustaka' ); ?></a>
	</div>
<?php endif; ?>

<?php if ( ! empty( $audio_products ) ) : ?>
	<header class="section-header">
		<h2 class="section-title"><?php echo esc_html__( 'Music', 'pustaka' ); ?></h2>
	</header>
	<?php woocommerce_product_loop_start(); ?>
		<?php $mus = 1; ?>
		<?php foreach ( $audio_products as $musics ) : ?>
			<?php if ( $get_default_perpage > $mus ) : ?>
				<?php echo ''.$musics; ?>
			<?php endif; ?>
		<?php $mus++; endforeach; ?>
	<?php woocommerce_product_loop_end(); ?>

	<div class="view-all">
		<a class="button button--primary" href="<?php echo esc_url( add_query_arg( 'product_type', 'music', get_permalink( wc_get_page_id( 'shop' ) ) ) ); ?>"><?php esc_html_e( 'View All', 'pustaka' ); ?></a>
	</div>
<?php endif; ?>

<?php if ( ! empty( $game_products ) ) : ?>
	<header class="section-header">
		<h2 class="section-title"><?php echo esc_html__( 'Games', 'pustaka' ); ?></h2>
	</header>
	<?php woocommerce_product_loop_start(); ?>
		<?php $game = 1; ?>
		<?php foreach ( $game_products as $games ) : ?>
			<?php if ( $get_default_perpage > $game ): ?>
				<?php echo ''.$games; ?>
			<?php endif; ?>
		<?php $game++; endforeach; ?>
	<?php woocommerce_product_loop_end(); ?>

	<div class="view-all">
		<a class="button button--primary" href="<?php echo esc_url( add_query_arg( 'product_type', 'game', get_permalink( wc_get_page_id( 'shop' ) ) ) ); ?>"><?php esc_html_e( 'View All', 'pustaka' ); ?></a>
	</div>
<?php endif; ?>

