<?php
#-----------------------------------------------------------------#
# Create admin portfolio section
#-----------------------------------------------------------------# 
function portfolio_register() {  
    	 
	 $portfolio_labels = array(
	 	'name' => __( 'Portfolio', 'taxonomy general name', ''),
		'singular_name' => __( 'Portfolio Item', ''),
		'search_items' =>  __( 'Search Portfolio Items', ''),
		'all_items' => __( 'Portfolio', ''),
		'parent_item' => __( 'Parent Portfolio Item', ''),
		'edit_item' => __( 'Edit Portfolio Item', ''),
		'update_item' => __( 'Update Portfolio Item', ''),
		'add_new_item' => __( 'Add New Portfolio Item', '')
	 );
	 
//	 $options = get_option('salient'); 
     $custom_slug = null;		
	 
	 if(!empty($options['portfolio_rewrite_slug'])) $custom_slug = $options['portfolio_rewrite_slug'];
	
	 $args = array(
			'labels' => $portfolio_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Project', ''),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 9,
			'menu_icon' => get_template_directory_uri(). '/assets/img/icons/portfolio.png',
			'supports' => array('title', 'editor', 'thumbnail', 'comments')  
       );  
  
    register_post_type( 'portfolio' , $args );  
}  
add_action('init', 'portfolio_register');


#-----------------------------------------------------------------#
# Add taxonomys attached to portfolio 
#-----------------------------------------------------------------# 

$category_labels = array(
	'name' => __( 'Project Categories', ''),
	'singular_name' => __( 'Project Category', ''),
	'search_items' =>  __( 'Search Project Categories', ''),
	'all_items' => __( 'All Project Categories', ''),
	'parent_item' => __( 'Parent Project Category', ''),
	'edit_item' => __( 'Edit Project Category', ''),
	'update_item' => __( 'Update Project Category', ''),
	'add_new_item' => __( 'Add New Project Category', ''),
    'menu_name' => __( 'Project Categories', '')
); 	

register_taxonomy("project-type", 
		array("portfolio"), 
		array("hierarchical" => true, 
				'labels' => $category_labels,
				'show_ui' => true,
    			'query_var' => true,
				'rewrite' => array( 'slug' => 'project-type' )
));

$attributes_labels = array(
	'name' => __( 'Project Attributes', ''),
	'singular_name' => __( 'Project Attribute', ''),
	'search_items' =>  __( 'Search Project Attributes', ''),
	'all_items' => __( 'All Project Attributes', ''),
	'parent_item' => __( 'Parent Project Attribute', ''),
	'edit_item' => __( 'Edit Project Attribute', ''),
	'update_item' => __( 'Update Project Attribute', ''),
	'add_new_item' => __( 'Add New Project Attribute', ''),
	'new_item_name' => __( 'New Project Attribute', ''),
    'menu_name' => __( 'Project Attributes', '')
); 	

register_taxonomy('project-attributes',
	array('portfolio'),
	array('hierarchical' => true,
    'labels' => $attributes_labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project-attributes' )
));

		
#-----------------------------------------------------------------#
# New category walker for portfolio filter
#-----------------------------------------------------------------# 

class Walker_Portfolio_Filter extends Walker_Category {
	
   function start_el(&$output, $category, $depth = 0, $args = array(), $current_object_id = 0) {

      extract($args);
      $cat_slug = esc_attr( $category->slug );
      $cat_slug = apply_filters( 'list_cats', $cat_slug, $category );
	  
      $link = '<li><a href="#" data-filter=".'.strtolower(preg_replace('/\s+/', '-', $cat_slug)).'">';
	  
	  $cat_name = esc_attr( $category->name );
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
	  	
      $link .= $cat_name;
	  
/*
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
*/
	  
      $link .= '</a>';
     
      $output .= $link;
       
   }
}
