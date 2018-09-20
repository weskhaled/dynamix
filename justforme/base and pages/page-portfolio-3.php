 <?php 
/*template name: page-portfolio */
			
			$portfolio = array(
				'posts_per_page' => -1,
				'post_type' => 'portfolio',
				'project-type'=> null,
				'paged'=> null
			);
			
			$wp_query = new WP_Query($portfolio);
      if(have_posts()) : while(have_posts()) : the_post(); 
	   $terms = get_the_terms($post->id,"project-type");
	   $project_cats = NULL;

	   if ( !empty($terms) ){
		 foreach ( $terms as $term ) {
		   $project_cats .= strtolower($term->slug) . ' ';
		 }
	   }
       echo 'cats= '.$project_cats;
           the_title();
if ( has_post_thumbnail() ) {
					// echo get_the_post_thumbnail($post->ID, 'portfolio-thumb', array('title' => '')); 
	           the_post_thumbnail( array(300,300) );
								} 
								//no image added
								else {
									 echo '<img src="'.get_template_directory_uri().'/assets/img/logo.png" alt="no image added yet." />';
								 }   
				  //$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); 
					
//echo $featured_image[0] ;	
      // echo '"'. get_permalink() .'"'; 
      endwhile; endif;

?>
<!-- BEGIN SECTION GALLERY -->
<section id="gallery" class="back-white">
			 <div class="container container-inner">
		        <div class="col-gallery">
			        <div class="section-title">
	                 <h2 class="color-blue">this is our gallery</h2>
	                 <div class="space20"></div>
	              	 <h4 class="subtitle">
	              		 This is our dedicated team who work day-in and day-out together to bring our clients the most amazing projects for a digitally connected world.
	              	 </h4>
	              	 <div class="seperator"><span></span></div>
	              	</div>
			        <div class="row">
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/1.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/2.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/3.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/1.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/2.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/3.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/1.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/2.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/3.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/4.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/5.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/6.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/3.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/2.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/1.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/6.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/5.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/4.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			        </div> 
			        <div class="row">
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/1.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/3.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/2.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/4.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/6.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/5.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/1.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/5.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/3.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			         <div class="col-sm-3">
			          <a href="#" class="stack-randomrot">
			          <figure class="">
						<img src="http://tympanus.net/Development/StackEffects/img/2.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/5.png" alt="img01">
						<img src="http://tympanus.net/Development/StackEffects/img/6.png" alt="img01">
					  </figure>
					  <div class="info text-center back-light">
					  	 <h4>First Design :</h4>
					  	 <span class="tag">tag 1</span>
					  	 <span class="tag">tag 2</span>
					  </div>
					  </a>
			         </div>
			        </div> 
				</div>
			 </div>
			</section>
	<!-- END SECTION GALLERY -->		