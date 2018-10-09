<?php
namespace App;
/**
 * Add Menu Admin
 */
add_action('wp_before_admin_bar_render', function () {
	global $wp_admin_bar;
	$args = array(
		'id'     => 'fd_t_1',
		'title'  => __( 'Dynamix Admin', 'text_domain' ),
		'href'   => get_site_url().'/wp-admin/admin.php?page=settings',
		'meta'   => array(
//			'class'    => 'btn',
			'onclick'  => 'dyna_admin_page()',
			'title'    => 'admin link',
		),
	);
    $wp_admin_bar->add_menu( $args );
    });
add_action('admin_menu', function () {
    add_menu_page( __( 'Dynamix' .' Theme Panel' ), __( 'Dynamix Panel' ), 'manage_options', 'settings', function(){
        require_once 'pages/index.php';
        // @include('pages.index');
    });
});
// function my_enqueue($hook) {
//     // Only add to the edit.php admin page.
//     // See WP docs.
//     if ('edit.php' !== $hook) {
//         return;
//     }
//     wp_enqueue_script('my_custom_script', plugin_dir_url(__FILE__) . '/myscript.js');
// }

// add_action('admin_enqueue_scripts', 'my_enqueue');

/**
 * Customizer JS
 */
add_action('admin_enqueue_scripts', function () {
	wp_enqueue_style('sage/admin/main.scss', asset_path('styles/admin.css'), false, null);
    wp_enqueue_script('sage/admin/main.js', asset_path('scripts/admin.js'), [], null, true);
});