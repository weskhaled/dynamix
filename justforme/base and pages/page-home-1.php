 <?php 
/*template name: Page Home 1 */

?>
<!-- BEGIN FullScreen SLIDER -->
    <section id="fullscreen-slider" class="swiper-container">
				<nav class="nav-slit">
					<a class="prev" href="javascript:void(0)">
						<span class="icon-wrap"><i class="icon fa fa-angle-left"></i></span>
						<div>
							<h3 id="title-prev">Title prev</h3>
							<img id="thumb-prev" src="http://placehold.it/200x140" alt="Previous thumb">
						</div>
					</a>
					<a class="next" href="javascript:void(0)">
						<span class="icon-wrap"><i class="icon fa fa-angle-right"></i></span>
						<div>
							<h3 id="title-next">Title next</h3>
							<img id="thumb-next" src="http://placehold.it/200x140" alt="Next thumb">
						</div>
					</a>
				</nav>
				<div class="swiper-pagination"></div>
              <div class="swiper-wrapper no-space">
				<?php 
						
						$slides_args = array(
							'posts_per_page' => -1,
							'post_type' => 'slider',
							'tax_query' => array(
								array(
									'taxonomy' => 'slide_location',
									'field' => 'slug',
									'terms' => 'home'
								)
							)
						);
						
						$wp_query = new WP_Query($slides_args);
						$slidercounter=0;
						if(have_posts()) : while(have_posts()) : the_post(); 
						 if ( has_post_thumbnail()) {
						  	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider_img_large');
						  	$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider_nav_thumb');
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
				  
				  <div class="container container-inner">
				   <?php  the_content(); ?>
				  </div>
				 </header>	
				</article>
				<?php endwhile; endif;
                      // wp_reset_postdata();
		               // Reset Query
		                wp_reset_query();
				 ?>
				
	 </div> 
  </section>
  <?php the_content(); ?>
  <section>
  					<?php 
						
						$portfolio_args = array(
							'posts_per_page' => -1,
							'post_type' => 'portfolio',
						);
						
						$wp_query = new WP_Query($portfolio_args);
				?>
           <div id="project-crousel" class="swiper-container">
				<nav>
					<a href="javascript:void(0)" class="nav-left">
						<i class="fa fa-angle-left"></i>
					</a>
				    <a href="javascript:void(0)" class="nav-right">
				    	<i class="fa fa-angle-right"></i>
				    </a>
				</nav>
				<div class="swiper-wrapper">
				<?php 
				
					if(have_posts()) : while(have_posts()) : the_post(); 
		 				   $terms = get_the_terms($post->id,"project-type");
						   $project_cats_display = NULL;
						   
						   if ( !empty($terms) ){
						     foreach ( $terms as $term ) { 
							   if($project_cats_display!=NULL) {$project_cats_display .=',';}
						       $project_cats_display .= strtolower($term->slug);
						     }
						   }
					 if ( has_post_thumbnail()) {
					  	$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'prt-square');
					 } else {
					  	$thumb_image_url = ['http://placehold.it/330x250'];
					 }

				?>	
				<!--project-post-->
				<div class="swiper-slide">
					<figure class="project-post">
						<img src="<?php echo $thumb_image_url[0]; ?>" class="img-responsive">
						<figcaption>
							<h2 class="text-uppercase"><?php the_title(); ?></h2>
							<p>(<?php echo $project_cats_display; ?>)</p>
							<button class="overlay-open" data-postid="<?php echo $post->ID ; ?>"><i class="feathericon feathericon-plus"></i></button>
						</figcaption>
					</figure>
				</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>				 
		</div>
	</section>	