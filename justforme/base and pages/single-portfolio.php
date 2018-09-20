<style>
.triangle-down {
position: absolute;
display: block;
width: 80px;
height: 80px;
background: #fff;
top: -70px;
left: 50%;
-o-transform: translate(-50%, 0) rotate(-45deg);
-ms-transform: translate(-50%, 0) rotate(-45deg);
-moz-transform: translate(-50%, 0) rotate(-45deg);
-webkit-transform: translate(-50%, 0) rotate(-45deg);
transform: translate(-50%, 0) rotate(-45deg);
-webkit-transition: all 225ms ease;
-moz-transition: all 225ms ease;
transition: all 225ms ease;
}

.cbp-rfgrid {
	margin: 35px 0 0 0;
	padding: 0;
	list-style: none;
	position: relative;
	width: 100%;
}

.cbp-rfgrid li {
	position: relative;
	float: left;
	overflow: hidden;
	width: 16.6666667%; /* Fallback */
	width: -webkit-calc(100% / 6);
	width: calc(100% / 6);
}

.cbp-rfgrid li a,
.cbp-rfgrid li a img {
	display: block;
	width: 100%;
	cursor: pointer;
}

.cbp-rfgrid li a img {
	/*max-width: 100%;*/
}

/* Flexbox is used for centering the heading */
.cbp-rfgrid li a div {
	position: absolute;
	left: 20px;
	top: 20px;
	right: 20px;
	bottom: 20px;
	background: rgba(71,163,218,0.2);
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: flex;
	-webkit-align-items: center;
	-moz-align-items: center;
	-ms-align-items: center;
    align-items: center;
    text-align: center;
    opacity: 0;
}

.cbp-rfgrid li a:hover div {
	opacity: 1;
}

.cbp-rfgrid li a div h3 {
	width: 100%;
	color: #fff;
	text-transform: uppercase;
	font-size: 1.4em;
	letter-spacing: 2px;
	padding: 0 10px;
}

/* Example for media query: change number of items per row */

@media screen and (max-width: 1190px) {
	.cbp-rfgrid li {
		width: 20%; /* Fallback */
		width: -webkit-calc(100% / 5);
		width: calc(100% / 5);
	}
}

@media screen and (max-width: 945px) {
	.cbp-rfgrid li {
		width: 25%; /* Fallback */
		width: -webkit-calc(100% / 4);
		width: calc(100% / 4);
	}
}

@media screen and (max-width: 660px) {
	.cbp-rfgrid li {
		width: 33.3333333%; /* Fallback */
		width: -webkit-calc(100% / 3);
		width: calc(100% / 3);
	}
}

@media screen and (max-width: 660px) {
	.cbp-rfgrid li {
		width: 33.3333333%; /* Fallback */
		width: -webkit-calc(100% / 3);
		width: calc(100% / 3);
	}
}

@media screen and (max-width: 400px) {
	.cbp-rfgrid li {
		width: 50%; /* Fallback */
		width: -webkit-calc(100% / 2);
		width: calc(100% / 2);
	}
}

@media screen and (max-width: 300px) {
	.cbp-rfgrid li {
		width: 100%;
	}
}
	
</style>
<!-- BEGIN FullScreen SLIDER -->
    <section id="fullscreen-portfolios" class="swiper-container">
				<nav class="nav-slit">
					<a class="prev" href="javascript:void(0)">
						<span class="icon-wrap"><i class="icon fa fa-angle-left"></i></span>
						<div>
							<h3 id="title-prev">City Lights</h3>
							<img id="thumb-prev" src="http://placehold.it/200x140" alt="Previous thumb">
						</div>
					</a>
					<a class="next" href="javascript:void(0)">
						<span class="icon-wrap"><i class="icon fa fa-angle-right"></i></span>
						<div>
							<h3 id="title-next">Street Hills</h3>
							<img id="thumb-next" src="http://placehold.it/200x140" alt="Next thumb">
						</div>
					</a>
				</nav>
				<div class="swiper-pagination">
				</div>
              <div class="swiper-wrapper no-space">
				<?php 
						$posts_per_page = '-1';
						$project_categories = null;

						//incase only all was selected
						if($project_categories == 'all') {
							$project_categories = null;
						}
						
						$portfolio = array(
							'posts_per_page' => $posts_per_page,
							'post_type' => 'portfolio',
							'project-type'=> $project_categories,
							'paged'=> $paged
						);
						
						$wp_query = new WP_Query($portfolio);
						$slidercounter=0;
						if(have_posts()) : while(have_posts()) : the_post(); 
								
							   $terms = get_the_terms($post->id,"project-type");
							   $project_cats = NULL;
							   $project_cats_display = NULL;
							   
							   if ( !empty($terms) ){
							     foreach ( $terms as $term ) { 
								   if($project_cats!=NULL) {$project_cats .=' ';}
								   if($project_cats_display!=NULL) {$project_cats_display .=',';}
							       $project_cats .= strtolower($term->slug);
							       $project_cats_display .= strtolower($term->slug);
							     }
							   } 
				 if ( has_post_thumbnail()) {
				  	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'prt-slider-img');
				  	$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'prt-nav-thumb');
				} else {
                    $large_image_url = ['http://placehold.it/960x640'];
				  	$thumb_image_url = ['http://placehold.it/200x140'];
				}
				?>
				<article class="swiper-slide" data-title="<?php the_title(); ?>" data-thumb-url="<?php echo $thumb_image_url[0] ; ?>"> 				
				 <header>
				  <div class="pattern pattern-1"></div>
				  <div class="pattern overlay-35-g"></div>
				  <div class="header-image" style="background-image: url(<?php echo $large_image_url[0] ; ?>);"></div>	
				  <div class="title-portfolio">
				   <h2><?php the_title(); ?></h2>
				  </div>
				  <div class="container container-inner">
				   <?php  the_content(); ?>
				  </div>
				  <a href="javascript:void(0)" class="toggel-screen">
					 <span class="icon-size-actual"></span>
				  </a>
				 </header>
				 <div class="article-content">
				  <span class="triangle-down"></span>
				  <div class="container">	
				  <?php preg_match('/\[gallery ids=[^\]]+\]/', get_the_content(), $matches);
				   if(!empty($matches)){
				   	echo do_shortcode($matches[0]);


				   }
				   else { ?>	   
             <ul class="cbp-rfgrid">
				<li><?php the_post_thumbnail(  array(400, 250) ); ?></li>
				<li><?php the_post_thumbnail(  array(400, 250) ); ?></li>
				<li><?php the_post_thumbnail(  array(400, 250) ); ?></li>
				<li><?php the_post_thumbnail(  array(400, 250) ); ?></li>
				<li><?php the_post_thumbnail(  array(400, 250) ); ?></li>
				<li><?php the_post_thumbnail(  array(400, 250) ); ?></li>
				<li><?php the_post_thumbnail(  array(400, 250) ); ?></li>
			</ul>

				 <?php  }
				   ?>
				   <div class="row">
				   	 <?php  get_comments( array('post_id' => $post->ID, 'status' => 'approve') );
					  echo '<ol class="commentlist">';
					  //Gather comments for a specific page/post 
					  $comments = get_comments(array(
					    'post_id' => $post->ID,
					     'status' => 'approve'
					  ));
					  wp_list_comments(array(
					    'per_page' => 10, // Allow comment pagination
					     'reverse_top_level' => false //Show the latest comments at the top of the list
					   ), $comments);
					  echo '</ol>';



						$terms = get_terms( 'slide_location', array( 'fields' => 'id=>slug' , 'orderby'=>'slug') );
						var_dump($terms);
						//echo count($terms);
						echo $post->post_name;
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						if (in_array($post->post_name, $terms))
						  {
						  echo "Match found";
						  }
						  else { echo "Match not found";}
						}
                       // $terms = get_terms( 'slide_location' ) );
						 // if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						 //     echo '<div class="">';
						 //     echo '<ul>';
						 //     foreach ( $terms as $term ) {
						 //       echo '<li>' . $term->name . '</li>';
						        
						 //     }
						 //     echo '</ul>';
						 //     echo '</div>';
						 // }

				   	 ?>
				 <div class="space30"></div>  	 
   				<ul>
				<?php
				$args = array(
					'post_type' => 'slider',
					'tax_query' => array(
						array(
							'taxonomy' => 'slide_location',
							'field' => 'slug',
							'terms' => $post->post_name
						)
					)
				);
				$postslist = get_posts( $args );
				var_dump($postslist);
				if( $postslist ){
				    foreach ( $postslist as $post_slider ){
				       //setup_postdata( $post_slider );
				        echo '<li>' . get_the_title( $post_slider->ID ) . '</li>';
				        echo get_the_post_thumbnail( $post_slider->ID, array(400, 250));
				    }
				} ?>
				        </ul> 

				   	 <div class="space30"></div>
				   	 <div class="space30"></div>
				   </div>
				  </div>
				</div>	
				</article>
				<?php 
				$slidercounter++;

			   
			 endwhile; endif; ?>
			  </div> 
    </div>	
  </section>

