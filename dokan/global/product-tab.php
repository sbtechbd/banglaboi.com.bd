<?php
/**
 * Dokan Seller Single product tab Template
 *
 * @since 2.4
 *
 * @package dokan
 */
?>

<ul class="vendor-details">

    <?php if ( !empty( $store_info['store_name'] ) ) { ?>
        <li class="store-name">
            <span class="label"><?php esc_html_e( 'Store Name', 'pustaka' ); ?></span>
            <span class="details">
                <?php echo esc_html( $store_info['store_name'] ); ?>
            </span>
        </li>
    <?php } ?>

    <li class="seller-name">
        <span class="label"><?php esc_html_e( 'Vendor', 'pustaka' ); ?></span>

        <span class="details">
            <?php printf( '<a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $author->display_name ); ?>
        </span>
    </li>
    <?php if ( !empty( $store_info['address'] ) ) { ?>
        <li class="store-address">
            <span class="label"><?php esc_html_e( 'Address', 'pustaka' ); ?></span>
            <span class="details">
                <?php echo dokan_get_seller_address( $author->ID ) ?>
            </span>
        </li>
    <?php } ?>

    <li class="clearfix">
        <span class="label"><?php esc_html_e( 'Rating', 'pustaka' ); ?></span>
        <span class="details">
            <?php dokan_get_readable_seller_rating( $author->ID ); ?>
        </span>
    </li>
</ul>
