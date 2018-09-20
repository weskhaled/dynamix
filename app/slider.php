<?php
#-----------------------------------------------------------------#
# Create slider
#-----------------------------------------------------------------# 
// Register Custom Taxonomy
// Register Custom Taxonomy
function Location() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'weskhaled' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'weskhaled' ),
		'menu_name'                  => __( 'Locations', 'weskhaled' ),
		'all_items'                  => __( 'All Location', 'weskhaled' ),
		'parent_item'                => __( 'Slide', 'weskhaled' ),
		'parent_item_colon'          => __( 'Slider:', 'weskhaled' ),
		'new_item_name'              => __( 'New Location', 'weskhaled' ),
		'add_new_item'               => __( 'Add New Location', 'weskhaled' ),
		'edit_item'                  => __( 'Edit Location', 'weskhaled' ),
		'update_item'                => __( 'Update Location', 'weskhaled' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'weskhaled' ),
		'search_items'               => __( 'Search Location', 'weskhaled' ),
		'add_or_remove_items'        => __( 'Add or remove Location', 'weskhaled' ),
		'choose_from_most_used'      => __( 'Choose from the most used Location', 'weskhaled' ),
		'not_found'                  => __( 'Not Found location', 'weskhaled' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'slide_location', array( 'slider' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'Location', 0 );

// Register Custom Post Type
function Slider() {

	$labels = array(
		'name'                => _x( 'Sliders', 'Post Type General Name', 'weskhaled' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'weskhaled' ),
		'menu_name'           => __( 'Slider', 'weskhaled' ),
		'parent_item_colon'   => __( 'Post:', 'weskhaled' ),
		'all_items'           => __( 'Slides', 'weskhaled' ),
		'view_item'           => __( 'View slide', 'weskhaled' ),
		'add_new_item'        => __( 'Add New slide', 'weskhaled' ),
		'add_new'             => __( 'Add New slide', 'weskhaled' ),
		'edit_item'           => __( 'Edit slide', 'weskhaled' ),
		'update_item'         => __( 'Update slide', 'weskhaled' ),
		'search_items'        => __( 'Search slide', 'weskhaled' ),
		'not_found'           => __( 'Not found', 'weskhaled' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'weskhaled' ),
	);
	$args = array(
		'label'               => __( 'slider', 'weskhaled' ),
		'description'         => __( 'First Design Slider', 'weskhaled' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'taxonomies'          => array( 'slide_location' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider', $args );

}

// Hook into the 'init' action
add_action( 'init', 'Slider', 0 ); 



function slider_columns($columns) {

	$new_columns = array(
		"cb" => "<input type=\"checkbox\" />",  
		'image_slider' => __('Image', 'weskhaled'),
	);
    return array_merge( $new_columns,$columns);
}
add_filter('manage_slider_posts_columns' , 'slider_columns');


// GET FEATURED IMAGE
function get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'slider_img_preview');
        return $post_thumbnail_img[0];
    }
}

// SHOW THE FEATURED IMAGE
function columns_image($column_name, $post_ID) {
    if ($column_name == 'image_slider') {
        $post_featured_image = get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" width="210px" height="120px" />';
        }
        else {

        	echo __( 'Please don\'t forget to insert Featured Image for this slide', 'weskhaled' );
        }
    }
}

add_action('manage_posts_custom_column', 'columns_image', 10, 2);

/*	
	add_filter("manage_edit-slider_columns", "slider_edit_columns");   
	  
	function slider_edit_columns($columns){  
	        $columns = array(  
	            "cb" => "<input type=\"checkbox\" />",  
	            "thumbnail" => "",
	            "title" => __("Title", "weskhaled-framework"),
	            "slide_location" => __("Location", "weskhaled-framework")  
	        );  
	  
	        return $columns;  
	} 

// GET FEATURED IMAGE
function get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}

// SHOW THE FEATURED IMAGE
function columns_image($column_name, $post_ID) {
    if ($column_name == 'thumbnail') {
        $post_featured_image = get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}

add_action('manage_posts_custom_column', 'columns_image', 10, 2);

*/
/*
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'featured-thumbnail' );
    }
}
*/
