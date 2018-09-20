<?php 
/*---------------------------------------------------
register settings
----------------------------------------------------*/
function theme_settings_init(){
	
function my_custom_enqueue($hook) {
	global $pagenow;
	global $hook_v;
	$hook_v=$hook;
//    if ( (is_admin()) && ($_GET['page'] == 'settings') ) {
//    if ( $pagenow == 'admin.php' && $_GET['page'] == 'settings' ) {
    if ( 'toplevel_page_settings' != $hook ) return;
        
    
	
  wp_enqueue_script('jquery');
  wp_enqueue_script("panel_bs_script", 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js', false, "1.0");
  wp_enqueue_style("reset_bs_style", get_template_directory_uri()."/assets/css/admin_bs_style.css", false, "1.0", "all");
 // wp_enqueue_style("reset_bs_style", get_template_directory_uri()."/assets/css/main.css", false, "1.0", "all");
  wp_enqueue_style("panel_style", get_template_directory_uri()."/assets/css/fd_admin_style.css", false, "1.0", "all");
  wp_enqueue_script("panel_script", get_template_directory_uri()."/assets/js/fd_admin_script.js", array('jquery'));
 
}
add_action( 'admin_enqueue_scripts', 'my_custom_enqueue' );
	
register_setting( 'theme_settings', 'theme_settings' );
//wp_enqueue_script('jquery');	
////wp_enqueue_style("panel_bs_style",'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css', false, "1.0", "all");
////wp_enqueue_style("panel_bs_style",'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css', false, "1.0", "all");
////wp_enqueue_script("jquery_ui", get_template_directory_uri() . '/assets/vendor/jquery/dist/jquery.min.js?1.11.1', false, "1.0");
//wp_enqueue_script("panel_bs_script", 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js', false, "1.0");
////wp_enqueue_script("panel_bs_script", 'http://code.jquery.com/ui/1.11.2/jquery-ui.js', false, "1.0");
//wp_enqueue_style("reset_bs_style", get_template_directory_uri()."/assets/css/reset_bs_style.css", false, "1.0", "all");
//wp_enqueue_style("panel_style", get_template_directory_uri()."/assets/css/fd_panel_style.css", false, "1.0", "all");
////wp_enqueue_script("panel_script", get_template_directory_uri()."/assets/js/fd_panel_script.js", array('jquery'));
}
 
/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/
function add_settings_page() {
add_menu_page( __( 'First Design' .' Theme Panel' ), __( 'First Design Panel' ), 'manage_options', 'settings', 'theme_settings_page');
}
 
/*---------------------------------------------------
add actions
----------------------------------------------------*/
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' ); 
/*---------------------------------------------------
add data base
----------------------------------------------------*/
global $first_design_db_version;
$first_design_db_version = '1.0';

function first_design_install() {
	global $wpdb;
	global $first_design_db_version;

	$table_name = $wpdb->prefix . 'first_design_dt';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		text text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	$wpdb->query( $sql );
//	dbDelta( $sql );

	add_option( 'first_design_db_version', $first_design_db_version );
}

function first_design_install_data() {
	global $wpdb;
	
	$welcome_name = 'Mr. WordPres';
	$welcome_text = 'Congratulations, you just completed the installation!';
	
	$table_name = $wpdb->prefix . 'liveshoutbox';
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'time' => current_time( 'mysql' ), 
			'name' => $welcome_name, 
			'text' => $welcome_text, 
		) 
	);
}
 register_activation_hook( null, 'first_design_install' );
 register_activation_hook( null, 'first_design_install_data' );
/*---------------------------------------------------
Theme Panel Output
----------------------------------------------------*/
include('frameworks.php');


// Add Toolbar Menus
function f_d_toolbar() {
	global $wp_admin_bar;

	$args = array(
		'id'     => 'fd_t_1',
		'title'  => __( 'First Design Admin', 'text_domain' ),
		'href'   => get_site_url().'/wp-admin/admin.php?page=settings',
		'meta'   => array(
//			'class'    => 'btn',
			'onclick'  => 'df_admin_page()',
			'title'    => 'first design admin link',
		),
	);
	$wp_admin_bar->add_menu( $args );

}

// Hook into the 'wp_before_admin_bar_render' action
add_action( 'wp_before_admin_bar_render', 'f_d_toolbar', 999 );


/*
* Create stats Table
*/
global $first_design_version;
$first_design_version = "1.0";
function first_design_table() {
global $wpdb;
global $first_design_version;
// table for ads
$table_name = $wpdb->prefix . "first_design";
 
if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
 
$sql = "CREATE TABLE " . $table_name . "  (
`ID` INT NOT NULL AUTO_INCREMENT ,
`ip` VARCHAR(255) NULL ,
`filename` VARCHAR(255) NULL ,
`referer` VARCHAR(255) NULL ,
`browser` TEXT NULL ,
`method` VARCHAR(45) NULL ,
`timestamp` DATETIME NOT NULL ,
`number` VARCHAR(45) NULL ,
PRIMARY KEY (`ID`) )
CHARACTER SET utf8 COLLATE utf8_general_ci;";
 
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
 
add_option("first_design_version", $first_design_version);
 
}
}
add_action('init', 'first_design_table');
?>