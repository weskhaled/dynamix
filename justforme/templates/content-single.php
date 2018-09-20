<?php if ( has_post_thumbnail()) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); } ?>
<section id="parallax" class="fullwidth no-space  cover-img grad-back"<?php if( isset($large_image_url) ) { ?> style="background-image: url(<?php echo $large_image_url[0]; ?>);background-attachment: fixed;background-position: center;" <?php } ?></sectio>
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
	<div class="container container-inner">
		<div class="row">
		<?php if (roots_display_sidebar()) { ?>
			<div class="col-md-9 col-sm-12 col-xs-12 clearfix">
			<div class="left-article-container">
			 	<?php while (have_posts()) : the_post(); ?>
				  <article <?php post_class(); ?>>
					<div class="entry-content">
					  <?php the_content(); ?>
					</div>
					<footer class="clearfix">
				      <?php get_template_part('templates/entry-meta-footer'); ?>
					</footer>
					<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
					</article>
				<?php endwhile; ?>
			 </div>
			  <?php comments_template('/templates/comments.php'); ?>
		   </div>
			<aside class="col-md-3 col-sm-12 col-xs-12 right-sidebar" role="complementary">
			  <?php include roots_sidebar_path(); ?>
			</aside><!-- /.sidebar -->
		<?php } else { ?>
			<div class="col-md-12 col-sm-12 col-xs-12 article-container clearfix">
			 	<?php while (have_posts()) : the_post(); ?>
				  <article <?php post_class(); ?>>
					<header>
					  <h1 class="entry-title"><?php the_title(); ?></h1>
					  <?php get_template_part('templates/entry-meta'); ?>
					</header>
					<div class="entry-content">
					  <?php the_content(); ?>
					</div>
					<footer class="clearfix">
				      <?php get_template_part('templates/entry-meta-footer'); ?>
					</footer>
					<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
					<?php comments_template('/templates/comments.php'); ?>
				  </article>
				<?php endwhile; ?>
			</div>
		<?php } ?>
		</div>
</div>

