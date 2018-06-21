<?php

return array(

    /**
     * Edit this file in order to configure the additional
     * image sizes your application need.
     * @link http://codex.wordpress.org/Function_Reference/add_image_size
     *
     * @key string The size name.
     * @param int $width The image width.
     * @param int $height The image height.
     * @param bool|array $crop Crop option. Since 3.9, define a crop position with an array.
     * @param bool $media Add to media selection dropdown. Make it also available to media custom field.
     */
    'pustaka_small'                 => array( 80, 80, true ),
    'pustaka_blog_masonry'          => array( 345, 9999, false ),
    'pustaka_shop_catalog_square'   => array( 400, 400, true ),
);