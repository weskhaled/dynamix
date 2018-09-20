<?php
  add_filter('roots/wrap_base', 'roots_wrap_base_cpts'); // Add our function to the roots_wrap_base filter

  function roots_wrap_base_cpts($templates) {
    $cpt = get_post_type(); // Get the current post type
    if ($cpt) {
       array_unshift($templates, 'base-' . $cpt . '.php'); // Shift the template to the front of the array
    }
    return $templates; // Return our modified array with base-$cpt.php at the front of the queue
  }





/**
 * Fix wp_nav_menu's active item highlighting with custom post types
 */
function roots_cpt_active_menu($menu) {
  $post_type = get_post_type();

  switch($post_type) {
    case 'gallery':
      $menu = str_replace('active', '', $menu);
      break;
    case 'theme':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-themes', 'menu-themes active', $menu);
      break;
    case 'portfolio':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-portfolio', 'menu-portfolio active', $menu);
      break;
    case 'screencast':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-screencasts', 'menu-screencasts active', $menu);
      break;
    case 'plugin':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-plugins', 'menu-plugins active', $menu);
      break;
  }

  if (is_author()) {
    $menu = str_replace('active', '', $menu);
  }

  return $menu;
}
add_filter('nav_menu_css_class', 'roots_cpt_active_menu', 400);
?>