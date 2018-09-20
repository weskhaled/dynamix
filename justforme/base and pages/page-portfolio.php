 <?php 
/*template name: page-portfolio */

?>

  <?php get_template_part('templates/page', 'header'); ?>
	<!-- BEGIN SECTION PORTFOLIO -->
<section id="portfolio" class="back-white">
   	  <div class="container-inner-1">
		  <ul id="filters" class="nav nav-tabs nav-justified">
		   <li class="active"><a href="#" data-filter="*">All</a></li>
			<?php 
			 wp_list_categories(array('title_li' => '', 'taxonomy' => 'project-type', 'show_option_none'   => '', 'walker' => new Walker_Portfolio_Filter())) ;  
			?>
		   </ul>	 
      <div class="grid">
    
<!--<ul id="tp-grid" class="tp-grid clearfix" data-current="*">  -->
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
				  
				?>
<!--
				
	<li class="item red" data-pile="<?php echo $project_cats; ?>">
		<a href="<?php echo get_permalink(); ?>">
		<span class="tp-info">
		  <span>
 		   <?php the_title(); ?>
 		  </span>
 		</span>
 		  <?php
			 if ( has_post_thumbnail() ) {
				the_post_thumbnail( array(500,500,false), array('title' => ''));	
				 // echo get_the_post_thumbnail($post->ID, 'portfolio-thumb', array('title' => '')); 
								} 
								//no image added
								else {
									 echo '<img src="'.get_template_directory_uri().'/assets/img/logo.png" alt="no image added yet." />';
								 }   
				  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
							?>
 		</a>
 	</li>
-->
                  <figure class="effect-zoe <?php echo $project_cats ?>" data-project-cat="<?php echo $project_cats ?>">
					   <?php 
						 if ( has_post_thumbnail()) {
						   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
						   echo '<img src="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" width="100%" height="100%" >';
						 }
						 ?>
						
						<figcaption>
							<h2><?php the_title(); ?> <span>(<?php echo $project_cats_display; ?>)</span></h2>
<!--
						    <ul class="pull-right">
								<li><a href="#"><i class="icon-heart"></i></a></li>
								<li><a href="<?php echo get_permalink(); ?>"><i class="icon-eye"></i></a></li>
								<li><a href="#"><i class="icon-link"></i></a></li>
							</ul>
-->
							<ul class="nav nav-pills pull-right">
							  <li class="post-like-it">
							   <a href="javascript:;" id="post-like-it-<?php echo $post->ID; ?>" class="<?php if( isset($_COOKIE['post-like-it-'. $post->ID]) ) echo "liked" ; ?> like-it">
							    <i class="icon-heart"></i>
							    <span class="count-like">
							    <?php
								   if(get_post_meta($post->ID, 'post-like-it', true)!=null){
									echo get_post_meta($post->ID, 'post-like-it', true) ;
								   }
									else{
									 //echo __('No Like', 'fd');
									}	 
									 ?>
							    </span>
							    </a>
							   </li>
							  <li><a href="<?php echo get_permalink(); ?>" class=""><i class="icon-eye"></i></a></li>
							</ul>
							<?php preg_match('/\[gallery ids=[^\]]+\]/', get_the_content(), $matches); ?>
							<p class="description"><?php echo the_excerpt(); ?></p>
						</figcaption>
<!--						<a href="<?php echo get_permalink(); ?>">View more</a>			-->
					</figure>
     
      <!-- end-portfolio-item-->
                 		
			<?php  endwhile; endif; ?>
<!--					</ul>-->
		      </div>
			 </div>
	</section>