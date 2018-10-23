<?php

namespace App;

// use Roots\Sage\Customizer;
// add_theme_support(lib\dynacustom)
require_once 'lib/customizer-custom-controls/inc/custom-controls.php';
require_once 'lib/dynacustom.php';
// require_once 'lib/customizer.php';
require_once 'lib/admin/dynamix.php';


$data = array( 'some' );

// Create the response object
$response = new \WP_REST_Response( $data );

// Add a custom status code
$response->set_status( 201 );

// Add a custom header
// $response->header( 'Location', 'http://localhost:3000/' );

add_action( 'rest_api_init', function () {
	register_rest_route( 'dynamix/v1', '/mods', array(
		'methods' => 'GET',
		'callback' => __NAMESPACE__ . '\\get_mods',
		'args' => array(
			'id' => array(
				'validate_callback' => function($param, $request, $key) {
					return is_numeric( $param );
				}
			),
		),
	) );
} );

function get_mods( $data ) {
	return get_theme_mods();
}
add_action( 'rest_api_init', function () {
	register_rest_route( 'dynamix/v1', '/logo', array(
		'methods' => 'POST',
		'callback' => __NAMESPACE__ . '\\post_logo',
		'args' => array(
			'id' => array(
				'validate_callback' => function($param, $request, $key) {
					return is_numeric( $param );
				}
			),
		),
	) );
} );

function post_logo( \WP_REST_Request $request ) {
	// return $request;
	// return $request->get_file_params();

      // Prepare array for output
      $output = array();

      // Request the data send
      $sendData = $request->get_params();

      // Identify user
      $user = wp_get_current_user();

      // Which user is logged in?
      $userID = $user->ID;

      // Get the upload files
      $files = $request->get_file_params();

      // These files need to be included as dependencies when on the front end.
    	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    	require_once( ABSPATH . 'wp-admin/includes/file.php' );
    	require_once( ABSPATH . 'wp-admin/includes/media.php' );

      // Process images
      if (!empty($files)) {
        $upload_overrides = array( 'test_form' => false );
        foreach ($files as $key => $file) {
          $attachment_id = media_handle_upload( $key, $challengeID );
          if ( is_wp_error( $attachment_id ) ) {
            $output['status'] = 'error';
        		$output['message'] = '- The image could not be uploaded.';
            return $output;
        	} else {
            // Success
            $output['status'] = 'success';
            $output['message'] = 'File '.$attachment_id.' uploaded.';
            $output['image'] = wp_get_attachment_url($attachment_id);
        	}
        }
      }
      
      return $output;
}