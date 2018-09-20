<header class="header banner navbar navbar-default navbar-fixed-top no-scrolling-fixed" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
     
		<!-- SEARCH FORM HEADER -->
		<form action="<?php echo esc_url(home_url('/')); ?>" method="GET" id="header-search" class="header-search">
			<input type="text" name="s" id="s" value="<?php echo get_search_query(); ?>"  placeholder="search for something :)" autocomplete="off" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot; Support &lt;support@demo.com&gt; &quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
		<button class="color-blue header-submit" type="submit" style="">
			<i class="icon-arrow-right" style="
				font-size: 25px;
				padding: 0px;
				margin: 0px;
				line-height: 25px;
			"></i>
		</button>
		</form>	
		<!-- TOGGLE SEARCH FORM -->
		<a id="showHeaderSearch" class=""><i class="fa fa-search"></i></a>
		<!-- MAIN HEADER NAVIGATION -->
     
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav navbar-right'));
        endif;
      ?>
    </nav>
  </div>
</header>
