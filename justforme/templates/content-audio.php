<?php
/***********************************************************************************************/
/* Template for the quote post format */
/***********************************************************************************************/
?>
	<article <?php post_class(); ?>>
		<div class="post-meta-info">
			<div class="post-date">
			<?php get_template_part('templates/entry-meta-date'); ?>
			</div>
			<svg class="blog-date-svg" viewBox="0 0 70 100">
			 <use xlink:href="#polygon-blog-date"></use>
		    </svg>
			<div class="post-like-it">
				<a href="javascript:;" class="<?php if( isset($_COOKIE['post-like-it-'. $post->ID]) ) echo "liked" ; ?>" id="post-like-it-<?php echo $post->ID; ?>"><i class="fa fa-heart"></i>
				 <div class="count-like">
				  <?php
				   if(get_post_meta($post->ID, 'post-like-it', true)!=null){
					echo get_post_meta($post->ID, 'post-like-it', true);
				   }
					else{
					 echo '0' ;
					}	 
					 ?>
				 </div>
				</a>
			</div>
		</div>
	  <div class="post-content">
		  <header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		  </header>
		  <div class="iframe-content">
		  <?php 
//				$first_line_content = explode("\n", get_the_content());
				//echo $first_line_content[0];
//				echo serene_audio_post($first_line_content[0]);
              echo serene_audio_post(get_post_meta($post->ID, 'audio_url', true));
		  ?>
          </div>
		  <div class="entry-summary">
			   <?php the_excerpt(); ?>
		  </div>
			<footer class="clearfix">
			<?php get_template_part('templates/entry-meta-footer'); ?>
			</footer>
	   </div>
	</article>