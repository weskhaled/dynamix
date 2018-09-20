<?php
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
    });
});