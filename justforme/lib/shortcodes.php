<?php
/*
	Plugin Name: First Design Shortcodes
	Plugin URI: http://first_design.com
	Description: An awesome plugin for displaying shortcodes.
	Version: 1.0
	Author: wes khaled
	Author URI: http://www.weskhaled.com
	License: Free

	Copyright 2014 Weskhaled (email: weskhaled@gmail.com)

*/

/***********************************************************************************************/
/* alt  fill Button Shortcode */
/***********************************************************************************************/

add_shortcode( 'btn_fill_alt', 'btn_fill_alt_shortcode' );
function btn_fill_alt_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
			'text' => 'button',
			'icon' => 'fa-arrow-right',
			'to' => '',
		), $atts )
	);

	// Code
return '<a href="'.$to.'" class="btn btn-fill-alt '.$class.'">'.$content.'  <i class="fa '.$icon.' right"></i></a>' ;
}
/***********************************************************************************************/
/*  Button Shortcode */
/***********************************************************************************************/

add_shortcode( 'button', 'button_shortcode' );
function button_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
			'icon_left' => '',
			'icon_right' => '',
			'to' => '',
		), $atts )
	);

	// Code
$return ='<a href="'.$to.'" id="'.$id.'" class="btn '.$class.'">' ;
	if($icon_left!=''){ $return .='<i class="'.$icon_left.' left"></i>';}
	$return .= $content;
	if($icon_right!=''){ $return .='<i class="'.$icon_right.' right"></i>';}
$return .='</a>' ;
	return $return ;
}


/***********************************************************************************************/
/* Small Button Shortcode */
/***********************************************************************************************/
add_shortcode('small_button', 'small_button');

function small_button($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => 'blue',
		'to' => ''
	), $atts));
	
	return '<a href="'. $to .'" class="small-button '. $color .'">'. $content .'</a>';
}

/***********************************************************************************************/
/* Video Embed Shortcode */
/***********************************************************************************************/
add_shortcode('video_embed', 'video_embed');

function video_embed($atts) {
	extract(shortcode_atts(array(
		'src' => ''
	), $atts));
	
	return '<div class="video-container">'. $src .'</div>';
}


/***********************************************************************************************/
/*  polygon_service Shortcode */
/***********************************************************************************************/

add_shortcode( 'polygon_service', 'polygon_service_shortcode' );
function polygon_service_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
			'title' => '',
			'icon' => '',
			'to' => '',
		), $atts )
	);
	
	// Code
	$return ='<div class="'.$class.'" id="'.$id.'">';
	$return .='<span class="polygon-services">';
	$return .='<span class="polygon-svg">';
	$return .='<svg class="services-svg" viewBox="0 0 80 80">';
	$return .='<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#polygon-path"></use>';
	$return .='</svg>';
	$return .='</span>';
	$return .='<span class="polygon-icon"><i class="'.$icon.'"></i></span>';
	$return .='</span>';
	$return .='<div class="text-center">';
	$return .='<h3><a href="'.$to.'">'.$title.'</a></h3>';
	$return .='<p>'.$content.'</p>';
	$return .='</div>';
	$return .='</div>';
	return $return ;
}
/***********************************************************************************************/
/*  PreSection  Shortcode */
/***********************************************************************************************/

add_shortcode( 'pre_section', 'pre_section_shortcode' );
function pre_section_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
		), $atts )
	);
   $return='<!-- PRESECTION -->';
   $return.= '<div id="'.$id.'" class="pre-section text-center '.$class.'">';
   $return.=	'<p class="light color-white">'.$content.'</p>';
   $return.='</div>';
   return $return ;	 
}
/***********************************************************************************************/
/*  Prallax Section  Shortcode */
/***********************************************************************************************/

add_shortcode( 'parallax_section', 'parallax_section_shortcode' );
function parallax_section_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
			'pattern_class' => 'pattern-1',
			'img_url' => '',
			'patern' => '',
		), $atts )
	);
	if($patern==''){$class.=' cover-img' ;}
		$return ='<!-- BEGIN SECTION PARALLAX -->';
		$return .='<section id="'.$id.'" class="fullwidth no-space '.$class.'" style="background-image: url('.$img_url.');background-attachment: fixed !important;">';
	if($patern==''){	$return .='<div class="'.$pattern_class.'"></div><div class="overlay-35-g"></div>'; }
		$return .=     do_shortcode($content); 
		$return .='</section> '; 
		$return .='<!-- END SECTION PARALLAX -->';
		return $return ;		
    }

/***********************************************************************************************/
/*  flip Wrapper Cart  Shortcode */
/***********************************************************************************************/

add_shortcode( 'flipedcard', 'flipedcard_shortcode' );
function flipedcard_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
			'name' => '',
			'title' => '',
			'img_url' => '',
			'email' => '',
			'facebook' => '',
			'twitter' => '',
		), $atts )
	);
			$return  ='<div class="flipWrapper '.$class.'" id="'.$id.'">';
			$return .='<div class="card">';
			$return .='<div class="face front">';
			$return .='<figure>';
			$return .='<img src="'.$img_url.'" class="img-responsive" alt="'.$name.'">';
			$return .='<figcaption>';
			$return .='<h3>'.$name.'</h3>';
			$return .='<p class="subtitle">'.$title.'</p>';
			$return .='<ul class="social">';
if($facebook!=''){	$return .='<li><a href="'.$facebook.'"><i class="fa fa-facebook"></i></a></li>';}
if($twitter!='') {	$return .='<li><a href="'.$twitter.'"><i class="fa fa-twitter"></i></a></li>';}
			$return .='</ul>';
			$return .='</figcaption>';
			$return .='<a href="javascript:void(0)" class="flip-read-more"><i class="feathericon feathericon-plus"></i></a> ';
			$return .='</figure>';
			$return .='</div>';
			$return .='<div class="face back">';
			$return .='<div class="team-plus">';
			$return .='<h3 class="text-center">'.$name.'</h3>';
			$return .='<h4>'.$title.'</h4>';
			$return .='<div class="text-left">';
			$return .='<p>'.$content.'</p>';
if($email!=''){ $return .='<div class="contact"><b>Email: </b>'.$email.'</div>'; }
			$return .='</div>';
			$return .='<a href="javascript:void(0)" class="flip-read-more"><i class="feathericon feathericon-minus"></i></a>';
			$return .='</div>';
			$return .='</div>'; 
			$return .='</div>';
			$return .='</div>';	
    return $return ;		
    }






/***********************************************************************************************/
/*  flip Wrapper Cart  Shortcode */
/***********************************************************************************************/

add_shortcode( 'polygon_170', 'polygon_170_shortcode' );
function polygon_170_shortcode( $atts) {
		// Attributes
		extract( shortcode_atts(
			array(
				'id' => '',
				'class' => '',
				'text' => '',
				'subtext' => '',
			), $atts )
		);
			            $return ='<span class="polygon count '.$class.'" id="'.$id.'">';
			            $return .='<span class="polygon-svg">';
			            $return .='<svg class="counting-svg" viewBox="0 0 80 80">';
			            $return .='<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#polygon-path"></use>';
			            $return .='</svg>';
			            $return .='</span>';
			            $return .='<div class="polygon-text counter">'.$text.'</div>';
	 if($subtext!=''){	$return .='<div class="polygon-subtext">'.$subtext.'</div>';}
			            $return .='</span>';
                 return $return ;	
	
   }

/***********************************************************************************************/
/*  flip Wrapper Cart  Shortcode */
/***********************************************************************************************/

add_shortcode( 'progress_skill', 'progress_skill_shortcode' );
function progress_skill_shortcode( $atts) {
		// Attributes
		extract( shortcode_atts(
			array(
				'id' => '',
				'class' => '',
				'skill' => '',
				'percent' => '',
			), $atts )
		);

				$return  ='<div class="progress skills-trigger '.$class.'" id="'.$id.'">';
				$return .='<span class="pro-skill pull-left">'.$skill.'</span>';
	
		switch ($percent) {
			case $percent>90:
				 $level='Pro';
				break;
			case $percent>80:
				 $level='Very good';
				break;
			case $percent>60:
				 $level='Good';
				break;
			default:
			   $level='Average';
			}
				$return .='<span class="pro-level pull-right">'.$level.'</span>';
				$return .='<div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'" data-percentage="'.$percent.'" aria-valuemin="0" aria-valuemax="100">';
				$return .='</div>';
				$return .='</div>';
         return $return ;	
}



?>