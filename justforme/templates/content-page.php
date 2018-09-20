<?php if((is_page_template( 'template-full-width.php' )) and (is_page())){  ?>
			 <?php the_content(); ?>
<?php } else { ?>
<section>
	<div class="container container-inner">
		<div class="row">
		<?php if (roots_display_sidebar()) { ?>
			<div class="col-md-9 col-sm-12 col-xs-12 left-article-container clearfix">
			 <?php the_content(); ?>
			</div>
			<aside class="col-md-3 col-sm-12 col-xs-12 right-sidebar" role="complementary">
			  <?php include roots_sidebar_path(); ?>
			</aside><!-- /.sidebar -->
			<?php } else { ?>
			<div class="col-md-12 col-sm-12 col-xs-12 article-container clearfix">
			 <?php the_content(); ?>
			</div>
			<?php } ?>
		</div>
		
	</div>
</section>
<?php } ?>


<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>