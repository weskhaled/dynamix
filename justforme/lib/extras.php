<?php
/**
 * Clean up the_excerpt()
 */
function new_excerpt_more( $more ) {
	return ' ... <br/><a class="btn btn-primary read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'weskhaled') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// filter to replace class on reply link

//           class name             function name

function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='btn-sm btn-primary comment-reply-link", $class); 
    return $class;
}
add_filter('comment_reply_link', 'replace_reply_link_class');

//Clean up the shortcut
function remove_shortcode_from_portfolio( $content ) {
  //if ( is_page_template('portfolio.php') ) {
   // $content = strip_shortcodes( $content );
  //}
global $post;

  if($post->post_type == 'portfolio'){
      //  remove_shortcode('gallery', $content);
	  $content = strip_shortcodes( $content );
	 
  }
    return $content;
}
add_filter( 'the_content', 'remove_shortcode_from_portfolio' );

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
////get_the_content_with_formatting
//function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
//	$content = get_the_content($more_link_text, $stripteaser, $more_file);
//	$content = apply_filters('the_content', $content);
//	$content = str_replace(']]>', ']]&gt;', $content);
//	return $content;
//}
/***********************************************************************************************/
/* Custom Function for Displaying Comments */
/***********************************************************************************************/
function first_design_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>
	
		<li class="pingback" id="comment-<?php comment_ID(); ?>">

			<article <?php comment_class('clearfix'); ?>>
			
				<header>
				
					<h4><?php _e('Pingback:', 'weskhaled-framework'); ?></h4>
					<p><?php edit_comment_link(); ?></p>
					
				</header>
	
				<?php comment_author_link(); ?>
								
			</article>
		
	<?php endif; ?>
	
	<?php if (get_comment_type() == 'comment') : ?>
		<li id="comment-<?php comment_ID(); ?>">
	
			<article <?php comment_class('clearfix'); ?>>
			
				<header> 
				
					<h4><span><?php _e('AUTHOR', 'weskhaled-framework'); ?></span><?php comment_author_link(); ?></h4>
					<p><span><?php comment_date(); ?> at <?php comment_time(); ?> </span> <?php edit_comment_link(); ?></p>
					<div class="actions">
					 <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					</div>

				</header>
	
				<figure class="comment-avatar">
					<?php 
						$avatar_size = 80;
						if ($comment->comment_parent != 0) {
							$avatar_size = 48;
						}
						
						echo get_avatar($comment, $avatar_size);
					?>
				</figure>
				
				<?php if ($comment->comment_approved == '0') : ?>
				
					<p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'adaptive-framework'); ?></p>
					
				<?php endif; ?>
				<div class="content"> 
				 <?php comment_text(); ?>
				</div>
								
			</article>
			
	<?php endif;	
}

/*
 * Change the comment reply link to use 'Reply to &lt;Author First Name>'
 */
function add_comment_author_to_reply_link($link, $args, $comment){

    $comment = get_comment( $comment );

    // If no comment author is blank, use 'Anonymous'
    if ( empty($comment->comment_author) ) {
        if (!empty($comment->user_id)){
            $user=get_userdata($comment->user_id);
            $author=$user->user_login;
        } else {
            $author = __('Anonymous');
        }
    } else {
        $author = $comment->comment_author;
    }

    // If the user provided more than a first name, use only first name
    if(strpos($author, ' ')){
        $author = substr($author, 0, strpos($author, ' '));
    }

    // Replace Reply Link with "Reply to &lt;Author First Name>"
    $reply_link_text = $args['reply_text'];
    $link = str_replace($reply_link_text, 'Reply to ' . $author, $link);

    return $link;
}
add_filter('comment_reply_link', 'add_comment_author_to_reply_link', 10, 3);

// Filter the title with a custom function
add_filter('genesis_seo_title', 'wap_site_title' );

// Add additional custom style to site header
function wap_site_title( $title ) {

    	// Change $custom_title text as you wish
	$custom_title = '<span class="light-text">First</span>Design';

	// Don't change the rest of this on down

	// If we're on the front page or home page, use `h1` heading, otherwise us a `p` tag
	$tag = ( is_home() || is_front_page() ) ? 'h1' : 'p';

	// Compose link with title
	$inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $custom_title );

	// Wrap link and title in semantic markup
	$title = sprintf ( '<%s class="site-title" itemprop="headline">%s</%s>', $tag, $inside, $tag );
	return $title;

}

/***********************************************************************************************/
/* Custom gallery function */
/***********************************************************************************************/

if ( ! function_exists( 'serene_gallery_images' ) ) :
function serene_gallery_images() {
	$output = $images_ids = '';
	$gallery_count=0;
	if ( function_exists( 'get_post_galleries' ) ) {
		$galleries = get_post_galleries( get_the_ID(), false );

		if ( empty( $galleries ) ) return false;

		if ( isset( $galleries[0]['ids'] ) ) {
			foreach ( $galleries as $gallery ) {
				// Grabs all attachments ids from one or multiple galleries in the post
				$images_ids .= ( '' !== $images_ids ? ',' : '' ) . $gallery['ids'];
			}

			$attachments_ids = explode( ',', $images_ids );
			// Removes duplicate attachments ids
			$attachments_ids = array_unique( $attachments_ids );
		} else {
			$attachments_ids = get_posts( array(
				'fields'         => 'ids',
				'numberposts'    => 999,
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_mime_type' => 'image',
				'post_parent'    => get_the_ID(),
				'post_type'      => 'attachment',
			) );
		}
	} else {
		$pattern = get_shortcode_regex();
		preg_match( "/$pattern/s", get_the_content(), $match );
		$atts = shortcode_parse_atts( $match[3] );

		if ( isset( $atts['ids'] ) )
			$attachments_ids = explode( ',', $atts['ids'] );
			
		else
			return false;
	}
	
	$nav = '<nav><a href="javascript:void(0)" class="nav-left"><i class="fa fa-angle-left"></i>';
	$nav.= '</a><a href="javascript:void(0)" class="nav-right"><i class="fa fa-angle-right"></i>';
	$nav.= '</a></nav>';
	echo   $nav;
	echo '<div class="swiper-pagination"></div>';
	echo '<div class="swiper-wrapper">';
	foreach ( $attachments_ids as $attachment_id ) {
//		printf( '<div style="background-image: url(%s); background-position: 50%;" class="swiper-slide">weskhaled</div>',
//			//wp_get_attachment_image( $attachment_id, 'serene-featured-image' )
//			  wp_get_attachment_url( $attachment_id )
//		);
		
	 $slider_image_url = wp_get_attachment_image_src( $attachment_id, 'blog-post-gallery');
		echo '<div style="background-image: url('.$slider_image_url[0].'); background-position: 50%;" class="swiper-slide"><div class="overlay-35 pattern-1"></div>'.get_post_field('post_content', $attachment_id).'</div>' ;
//		echo '<div style="background-image: url('.wp_get_attachment_url( $attachment_id ).'); background-position: 50%;" class="swiper-slide"><div class="overlay-35 pattern-1"></div>'.get_post_field('post_content', $attachment_id).'</div>' ;
		
	   echo '<!-- '. wp_get_attachment_url( $attachment_id ) .' -->';
	}
	echo '</div> <!-- .et-gallery-slider -->';
	
	 
		 
	return $output;
}
endif;


/* GET VIDEO MEDIA
================================================== */ 
if (!function_exists('serene_video_post')) {
	function serene_video_post($postUrl, $media_width, $video_height) {

		$video = $media_video = "";

//		if ($use_thumb_content) {
//		$media_video = $postUrl;
//		} else {
		$media_video = $postUrl;
//		}

		$video = sf_video_embed($media_video, $media_width, $video_height);

		return $video;
	}
}
	
	/* VIDEO EMBED FUNCTIONS
	================================================== */
	if (!function_exists('sf_video_embed')) {
		function sf_video_embed($url, $width = 640, $height = 480) {
			if (strpos($url,'youtube') || strpos($url,'youtu.be')){
				return sf_video_youtube($url, $width, $height);
			} 
			else if(strpos($url,'vimeo')) {
				return sf_video_vimeo($url, $width, $height);
			}
			else return '';
		}
	}
	
	if (!function_exists('sf_video_youtube')) {
		function sf_video_youtube($url, $width = 640, $height = 480) {
			preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $video_id);
			//echo $video_id[1];
			return '<iframe itemprop="video" src="http://www.youtube.com/embed/'. $video_id[1] .'?wmode=transparent" width="'. $width .'" height="'. $height .'" allowfullscreen></iframe>';
		}
	}
	
	if (!function_exists('sf_video_vimeo')) {
		function sf_video_vimeo($url, $width = 640, $height = 480) {
			preg_match('/vimeo.com\/(\d+)/', $url, $video_id);	
			//preg_match('/http:\/\/vimeo.com\/(\d+)$/', $url, $video_id);	
			//return var_export ($video_id);
			return '<iframe itemprop="video" src="http://player.vimeo.com/video/'. $video_id[1] .'?title=0&amp;byline=0&amp;portrait=0?wmode=transparent" width="'. $width .'" height="'. $height .'"></iframe>';
		}
	}

/* GET AUDIO MEDIA
================================================== */ 
if (!function_exists('serene_audio_post')) {
	function serene_audio_post($postUrl) {

		$audio = $media_audio = "";

		$media_audio = $postUrl;
		$audio = fd_audio_embed($media_audio);

		return $audio;
	}
}
	
	/* AUDIO EMBED FUNCTIONS
	================================================== */
	if (!function_exists('fd_audio_embed')) {
		function fd_audio_embed($url) {
			if (strpos($url,'soundcloud')){
				return fd_audio_soundcloud($url);
			}
			else {
				return fd_audio_local($url);
			} 
		}
	}
	
	if (!function_exists('fd_audio_soundcloud')) {
		function fd_audio_soundcloud($url) {
			//Get the SoundCloud URL
			$urlsc=trim($url);
			//echo $urlsc;
			//Get the JSON data of song details with embed code from SoundCloud oEmbed
			$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$urlsc.'&iframe=true');
			//Clean the Json to decode
			$decodeiFrame=substr($getValues, 1, -2);
			//json decode to convert it as an array
			$jsonObj = json_decode($decodeiFrame);

			 return $jsonObj->html;
			}
	}
	if (!function_exists('fd_audio_local')) {
		function fd_audio_local($url) {
			//Get the Sound URL
			$urlsc=trim($url);
			//echo $urlsc;
			return	'<audio class="blog_audio" src="'.$urlsc.'" controls="controls"> _e("Your browser don\'t support audio player","weskhaled");</audio>' ;
			
			}
	}
	
	
		


// Add Quicktags for editor
function custom_quicktags() {

	if ( wp_script_is( 'quicktags' ) ) {
	?>
	<script type="text/javascript">
	QTags.addButton( 'special_quote', 'quote', '<blockquote class="special-quote">', '</blockquote>', 'b', 'Special Quote', 1 );
	</script>
	<?php
	}

}

// Hook into the 'admin_print_footer_scripts' action
add_action( 'admin_print_footer_scripts', 'custom_quicktags' );


//the page_breadcrumb
function the_breadcrumb() {
    global $post;
   // echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> ');
            if (is_single()) {
                echo '</li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    //echo '</ul>';
}

