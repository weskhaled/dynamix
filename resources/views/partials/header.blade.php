<header class="default-header">
    <div class="subnav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <div class="subnavinfo row justify-content-end">
                            <div class="col">
                                <span class=""><i class="fa fa-phone"></i> +216 24 838 161 </span>
                                <span class=""><i class="fa fa-envelope"></i> contact@dynamix-it.be</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="img/logo.png" width="150" height="35" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                @if (has_nav_menu('primary_navigation'))
                {!! 
                    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto nav'])
                !!}
                @endif
            </div>
        </div>
    </nav>
</header>