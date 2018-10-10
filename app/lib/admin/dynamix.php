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
        require_once 'Controllers/Ajax/index.php';
        require_once 'pages/index.php';
    });
});
/**
 * Customize JS
 */

add_action('admin_enqueue_scripts', function () {
	//replace with your page "id"
	if($_GET["page"] == "settings")
	{
		wp_enqueue_style('sage/admin/main.scss', asset_path('styles/admin.css'), false, null);
		wp_enqueue_script('sage/admin/main.js', asset_path('scripts/admin.js'), [], null, true);
	}
});