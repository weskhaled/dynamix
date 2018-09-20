<?php get_template_part('templates/head'); ?>
    
<body <?php body_class('not-ready'); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

<!--BEGIN PAGE CONTENT-->
<div class="page-content" >
  <?php
    do_action('get_header');
    get_template_part('templates/header');
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
