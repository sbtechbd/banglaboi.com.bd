<?php 

/**
 * 20 demo list for Frontend Product
 *
 * @return void
 * @author Kreativenesia
 **/
add_filter( 'tokoo_importer_configs', 'tokoo_config_import_files' );
function tokoo_config_import_files( $configs ) {

	$configs[] = array(
		'import_file_name'              => 'Books - Dummy Images',
		'import_file_url'               => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo1/content.xml',
		'import_widget_file_url'        => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo1/widgets.json',
		'import_customizer_file_url'    => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo1/customizer.dat',
		'import_preview_image_url'      => 'https://bytebucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo1/screenshot.png',
		'import_notice'                 => '',
		'import_demo_url'               => 'http://demo.tokomoo.com/pustaka/demo',
		'import_home_page'              => 'Homepage v2',
		'import_blog_page'              => 'Blog',
		'import_available_menus'        => array(
			'pustaka-primary'   		=> 'Primary Menus', // Menu Location and Title
		)
	);

	$configs[] = array(
		'import_file_name'              => 'Books - Real Images',
		'import_file_url'               => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo2/content.xml',
		'import_widget_file_url'        => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo2/widgets.json',
		'import_customizer_file_url'    => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo2/customizer.dat',
		'import_preview_image_url'      => 'https://bytebucket.org/tokomoo/tokoo-demo-content/raw/6d8975f63e19e833b59e3929f87bbc7b1b48aba1/pustaka/demo2/screenshot.png',
		'import_notice'                 => '',
		'import_demo_url'               => 'http://demo.tokomoo.com/pustaka/buku',
		'import_home_page'              => 'Homepage v2',
		'import_blog_page'              => 'Blog',
		'import_available_menus'        => array(
			'pustaka-primary'   		=> 'Primary Menus', // Menu Location and Title
		)
	);

		
	return $configs;
}
