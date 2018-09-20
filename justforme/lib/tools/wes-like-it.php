<?php
class WesLike {
	
	 function __construct(){	
		add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
		add_action('wp_ajax_post_like', array(&$this, 'ajax'));
		add_action('wp_ajax_nopriv_post_like', array(&$this, 'ajax'));
	}
	
	function enqueue_scripts(){
		
		wp_enqueue_script( 'jquery' );
//		wp_enqueue_script( 'wes-like-it', get_template_directory_uri() . '/js/wes-like-it.js', 'jquery', '1.0', TRUE );
		
		wp_localize_script( 'wes-like-it', 'wesLike', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}
	
	function ajax($post_id){		
		//update
		if( isset($_POST['likes_id']) ) {
			$post_id = str_replace('post-like-it-', '', $_POST['likes_id']);
			echo $this->like_post($post_id, 'update');
		} 
		
		//get
		else {
			$post_id = str_replace('post-like-it-', '', $_POST['likes_id']);
			echo $this->like_post($post_id, 'get');
		}
		exit;
	}
	
	function like_post($post_id, $action = 'get'){
		if(!is_numeric($post_id)) return;
	
		switch($action) {
		
			case 'get':
				$like_count = get_post_meta($post_id, 'post-like-it', true);
				if( !$like_count ){
					$like_count = 1;
					add_post_meta($post_id, 'post-like-it', $like_count, true);
				}
				$return_value = $like_count;
//				if($like_count != 1){
//					$return_value .= "<span> " . __(' Likes', 'wes') . "</span>";
//				} else {
//					$return_value .= "<span> " . __(' Like', 'wes') . "</span>";
//				}

				return $return_value;
				break;
				
			case 'update':
				$like_count = get_post_meta($post_id, 'post-like-it', true);
				if( isset($_COOKIE['post-like-it-'. $post_id]) ) return $like_count;
				
				$like_count++;
				update_post_meta($post_id, 'post-like-it', $like_count);
				setcookie('post-like-it-'. $post_id, $post_id, time()*20, '/');
				$return_value = $like_count;
//				if($like_count != 1){
//					$return_value .= "<span> " . __(' Likes', 'wes') . "</span>";
//				} else {
//					$return_value .= "<span> " . __(' Like', 'wes') . "</span>";
//				}

				return $return_value;
				break;
		}
	}

	function add_wes_like_it(){
		global $post;

		$output = $this->like_post($post->ID);
  
  		$class = 'wes-like-it';
  		$title = __('Like this', 'wes');
		if( isset($_COOKIE['post-like-it-'. $post->ID]) ){ 
			$class = 'wes-like-it liked';
			$title = __('You already like this!', 'wes');
		}
		
		return '<a href="#" class="'. $class .'" id="wes-like-it-'. $post->ID .'" title="'. $title .'">'. $output .'</a>';
	}

	function add_wes_like_it_portfolio_list(){
		global $portfolio_project_id;

		$output = $this->like_post($portfolio_project_id);
  
  		$class = 'wes-like-it';
  		$title = __('Like this', 'wes');
		if( isset($_COOKIE['post-like-it-'. $portfolio_project_id]) ){
			$class = 'wes-like-it liked';
			$title = __('You already like this!', 'wes');
		}
		
		return '<a class="'. $class .'" id="wes-like-it-'. $portfolio_project_id .'" title="'. $title .'">'. $output .'</a>';
	}
}

global $wes_like_it;
$wes_like_it = new WesLike();

function wes_like_it() {
	global $wes_like_it;
	echo $wes_like_it->add_wes_like_it(); 
}

function wes_like_it_latest_posts() {
	global $wes_like_it;
	return $wes_like_it->add_wes_like_it(); 
}

function wes_like_it_portfolio_list() {
	global $wes_like_it;
	return $wes_like_it->add_wes_like_it_portfolio_list(); 
}
?>