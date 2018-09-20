<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?> id="base-page-about">

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
</body>
</html>
