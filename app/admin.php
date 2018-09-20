<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

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
        ?>
           <div><h1>Dynamix Admin Page</h1></div>
        <?php
    });
});