<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function roots_get_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function roots_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'roots_body_class');

/**
 * Add global variable to javascript in head
 */
add_action ( 'wp_head', 'my_js_variables' );
function my_js_variables(){ ?>
  <script type="text/javascript">
    var ajaxurl = <?php echo json_encode( admin_url( "admin-ajax.php" ) ); ?>;      
    var ajaxnonce = <?php echo json_encode( wp_create_nonce( "itr_ajax_nonce" ) ); ?>;
    var myarray = <?php echo json_encode( array( 
         'foo' => 'bar',
         'available' => TRUE,
         'ship' => array( 1, 2, 3, ),
       ) ); ?>
  </script><?php
}