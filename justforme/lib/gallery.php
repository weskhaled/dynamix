<?php
/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 * The number of columns must be a factor of 12.
 *
 * @link http://getbootstrap.com/components/#thumbnails
 */
function roots_gallery($attr) {
  $post = get_post();

  static $instance = 0;
  $instance++;

  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }

  extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => '',
    'icontag'    => '',
    'captiontag' => '',
//    'size'       => '',
    'include'    => '',
    'exclude'    => '',
    'link'       => ''
  ), $attr));

  $id = intval($id);

  if ($order === 'RAND') {
    $orderby = 'none';
  }

  if (!empty($include)) {
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif (!empty($exclude)) {
    $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  } else {
    $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  }

  if (empty($attachments)) {
    return '';
  }

  if (is_feed()) {
    $output = "\n";
    foreach ($attachments as $att_id => $attachment) {
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    }
    return $output;
  }

  $unique = (get_query_var('page')) ? $instance . '-p' . get_query_var('page'): $instance;
  $output = '<div class="gallery-' . $id . '-' . $unique . '">';

  $i = 0;
  foreach ($attachments as $id => $attachment) {
	 $attach_full_url= wp_get_attachment_image_src( $id, 'full' )[0];
	 $attach_full_width= wp_get_attachment_image_src( $id, 'full' )[1];
	 $attach_full_height= wp_get_attachment_image_src( $id, 'full' )[2];
	 $attach_square_url= wp_get_attachment_image_src( $id, 'gall-square' )[0];
	 $attach_link= get_attachment_link($id);
//    switch($link) {
//      case 'file':
//        $image = wp_get_attachment_link($id, $size, false, false);
//        break;
//      case 'none':
//        $image = wp_get_attachment_image($id, $size, false, array('class' => 'thumbnail img-thumbnail','data-fullurl' => $attach_full_url));
//        break;
//      default:
//        $image = wp_get_attachment_link($id, $size, true, false);
//        break;
//    }
//	$image = wp_get_attachment_image($id, $size, false, array('class' => 'thumbnail img-thumbnail','data-fullurl' => $attach_full_url));  
    //$output .=  $image;
   // $output .=  $attach_full_url;
				$output .='<figure>';
				$output .='<a href="javascript:void(0)" data-height="'.$attach_full_height.'" data-width="'.$attach_full_width.'" data-fullurl="'.$attach_full_url.'" class="photostack-img full-view"><img src="'.$attach_square_url.'" class="img-responsive"></a>';
				$output .='<figcaption>';
				$output .='<h2 class="photostack-title">'.  get_the_title($id) .'</h2>';
				$output .='<div class="photostack-back">';
				$output .='<p>'. $attachment->post_excerpt .'</p>';
				$output .='</div>';
				$output .='</figcaption>';
				$output .='</figure>';
//    if (trim($attachment->post_excerpt)) {
//      $output .= '<div class="caption">' . wptexturize($attachment->post_excerpt) . '</div>';
//    }

  
  }

  $output .= '</div>';

  return $output;
}
if (current_theme_supports('bootstrap-gallery')) {
  remove_shortcode('gallery');
  add_shortcode('gallery', 'roots_gallery');
  add_filter('use_default_gallery_style', '__return_null');
}

/**
 * Add class="thumbnail img-thumbnail" to attachment items
 */
//function roots_attachment_link_class($html) {
//  $html = str_replace('<a', '<a class="thumbnail img-thumbnail"', $html);
//  return $html;
//}
//add_filter('wp_get_attachment_link', 'roots_attachment_link_class', 10, 1);


