<?php
#-----------------------------------------------------------------#
# Create admin quote section
#-----------------------------------------------------------------# 
function quote_register() {  
    	 
	 $quote_labels = array(
	 	'name' => __( 'Quote', 'taxonomy general name', ''),
		'singular_name' => __( 'Quote Item', ''),
		'search_items' =>  __( 'Search Quote Items', ''),
		'all_items' => __( 'Quote', ''),
		'parent_item' => __( 'Parent Quote Item', ''),
		'edit_item' => __( 'Edit Quote Item', ''),
		'update_item' => __( 'Update Quote Item', ''),
		'add_new_item' => __( 'Add New Quote Item', '')
	 );
	 
//	 $options = get_option('salient'); 
     $custom_slug = null;		
	 
	 if(!empty($options['quote_rewrite_slug'])) $custom_slug = $options['quote_rewrite_slug'];
	
	 $args = array(
			'labels' => $quote_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Project', ''),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 9,
			'menu_icon' => 'dashicons-format-quote',
			'supports' => array('title', 'editor', 'thumbnail', 'comments')  
       );  
  
    register_post_type( 'quote' , $args );  
}  
add_action('init', 'quote_register');

$attributes_labels = array(
	'name' => __( 'Quote Attributes', ''),
	'singular_name' => __( 'Quote Attribute', ''),
	'search_items' =>  __( 'Search Quote Attributes', ''),
	'all_items' => __( 'All Quote Attributes', ''),
	'parent_item' => __( 'Parent Quote Attribute', ''),
	'edit_item' => __( 'Edit Quote Attribute', ''),
	'update_item' => __( 'Update Quote Attribute', ''),
	'add_new_item' => __( 'Add New Quote Attribute', ''),
	'new_item_name' => __( 'New Quote Attribute', ''),
    'menu_name' => __( 'Quote Attributes', '')
); 	

register_taxonomy('quote-attributes',
	array('quote'),
	array('hierarchical' => true,
    'labels' => $attributes_labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'quote-attributes' )
));