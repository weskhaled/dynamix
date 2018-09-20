<?php get_template_part('templates/head'); ?>
<body <?php body_class('not-ready'); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->	

<!-- SVG POLYGON SOURCE -->
<!--?xml version="1.0" encoding="UTF-8" ?-->
<svg height="0" width="0" style="position:absolute;margin-left: -100%;">
 <path id="polygon-blog-date" d="M70 75.1c0 2.7-1.9 6-4.2 7.3L39.2 98c-2.3 1.3-6 1.3-8.3 0L4.2 82.4C1.9 81.1 0 77.8 0 75.1l0-50.2c0-2.7 1.9-6 4.2-7.3L30.8 2c2.3-1.3 6-1.3 8.3 0l26.7 15.6c2.3 1.3 4.2 4.6 4.2 7.3V75.1z"/>       
</svg>
<svg height="0" width="0" style="position:absolute;margin-left: -100%;">
	<path id="polygon-path" d="M73.1,54.8c0,2.6-1.8,5.8-4,7.1l-25.8,15c-2.2,1.3-5.9,1.3-8.1,0l-25.8-15c-2.2-1.3-4-4.5-4-7.1l0-30.1
	c0-2.6,1.8-5.8,4-7.1l25.8-15c2.2-1.3,5.9-1.3,8.1,0l25.8,15c2.2,1.3,4,4.5,4,7.1V54.8z"/>       
</svg>
<!-- SVG SOURCE END-->
 
<!-- BEGIN PAGELOADER -->
 <div id="pageloader"> 
   <div class="loader-item">
	 <span class="polygon">
	   <span class="polygon-svg">
		<svg class="pageloader-svg" viewBox="0 0 80 80">
		  <use xlink:href="#polygon-path"></use>
		</svg>
	   </span>
	   <span class="polygon-text"><span id="pageloader-txt">0%</span></span>
	 </span>
	</div> 
 </div>
<!-- END PAGELOADER -->
<!--BEGIN OVERLAY DIV-->
<div class="overlay">
 <a href="javascript:;" class="overlay-close"><i style="" class="icon-logout"></i></a>
 <!--OVERLAY CONTENT-->
 <div class="overlay-content">
<!--  <iframe src="http://tympanus.net/Tutorials/TiltedContentSlideshow/"></iframe> -->
<!-- <iframe src="TiltedContentSlideshow/index.html"></iframe>-->

 </div>
</div>
<!--END OVERLAY DIV-->
<!--BEGIN PAGE CONTENT-->
<div class="page-content" >
  <?php
    do_action('get_header');
    get_template_part('templates/header-fixed-top');
  ?>
  <div class="page-container">
      <?php include roots_template_path(); ?>
      
   <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>
  </div>
</div>
<!--<script src="http://isotope.metafizzy.co/isotope.pkgd.min.js"></script>-->
<!--<script src="http://tympanus.net/Development/Stapel/js/jquery.stapel.js"></script>-->

</body>
</html>
