<?php if ( has_post_thumbnail()) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); } ?>
<section id="parallax" class="fullwidth no-space  cover-img grad-back"<?php if( isset($large_image_url) ) { ?> style="background-image: url(<?php echo $large_image_url[0]; ?>);background-attachment: fixed;background-position: center;" <?php } ?> >
  <div class="pattern-1"></div>
  <div class="overlay-35-g"></div>
  <div class="container text-center">
   <div class="row">
     <div class="col-md-12">
<!--      <div class="space30"></div>-->
      <h1 class="title-color text-center color-white light f-size-75"><?php the_title(); ?></h1>
      <h3 class="color-white"><span class="dd"><?php echo get_the_date('j'); ?></span> - <span class="mm"><?php echo get_the_date('F'); ?></span> - <span class="yy"><?php echo get_the_date('Y'); ?></span></h3>
     </div>
   </div>
  </div>
</section>
<section id="photostack" class="no-space photostack">
	<!-- 	<div> 	  
			
<?php 
//echo get_the_ID();
$images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

       // $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) ); 
/* $images is now a object that contains all images (related to post id 1) and their information ordered like the gallery interface. */
        if ( $images ) { 

                //looping through the images
                foreach ( $images as $attachment_id => $attachment ) {
                ?>
					<figure>
						<a href="javascript:void(0)" data-fullurl="<?php echo wp_get_attachment_image_src( $attachment_id, 'full' )[0]; ?>" class="photostack-img overlay-open"><img src="<?php echo wp_get_attachment_image_src( $attachment_id, 'gall-square' )[0]; ?>" class="img-responsive" alt="img05"></a>
						<figcaption>
							<h2 class="photostack-title"><?php echo get_the_title($attachment_id); ?></h2>
							<div class="photostack-back">
								<p><?php echo $attachment->post_excerpt; ?></p>
							</div>
						</figcaption>
					</figure>

                <?php
                }
        }
        

			?> 
</div>
		-->
		<?php while (have_posts()) : the_post(); ?>
	     <?php the_content(); ?>
	    <?php endwhile; ?> 
				
			</section>
<section>
<?php if (comments_open()){ ?>
	<div class="container container-inner">
		<div class="row">
			<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
			<?php comments_template('/templates/comments.php'); ?>
		</div>
	</div>
<?php } ?>
</section>
					
				  