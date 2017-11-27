<header role="banner">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
                <div id="header-top-navbar-mobile" class="banner navbar navbar-default navbar-static-top navbar-inverse " >
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="quicksearch">
                <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
            </div>
            <div class="social-links">
                <ul>
                    <li>
                        <a href="http://facebook.com/toofestival.es" class="lien-ext link-fb">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                <path id="facebook-1" d="M9,8H6v4h3v12h5V12h3.642L18,8h-4c0,0,0-0.872,0-1.667C14,5.378,14.192,5,15.115,5C15.859,5,18,5,18,5V0c0,0-3.219,0-3.808,0C10.596,0,9,1.583,9,4.615C9,7.256,9,8,9,8z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="http://twitter.com/toofestivales" class="lien-ext link-tw">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                <path id="twitter-1" d="M24,4.557c-0.883,0.392-1.832,0.656-2.828,0.775c1.017-0.609,1.798-1.574,2.165-2.724c-0.951,0.564-2.005,0.974-3.127,1.195c-0.897-0.957-2.178-1.555-3.594-1.555c-3.179,0-5.515,2.966-4.797,6.045C7.728,8.088,4.1,6.128,1.671,3.149c-1.29,2.213-0.669,5.108,1.523,6.574C2.388,9.697,1.628,9.476,0.965,9.107c-0.054,2.281,1.581,4.415,3.949,4.89c-0.693,0.188-1.452,0.231-2.224,0.084c0.626,1.956,2.444,3.38,4.6,3.42C5.22,19.123,2.612,19.848,0,19.54c2.179,1.396,4.768,2.212,7.548,2.212c9.142,0,14.307-7.721,13.995-14.646C22.505,6.411,23.34,5.544,24,4.557z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="header-top-navbar" class="banner navbar navbar-default navbar-static-top navbar-inverse " >
        <div class="container">
            <nav class="collapse navbar-collapse" role="navigation">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                endif;
                ?>
            </nav>
        </div>
    </div>
</header>

<!--
<header class="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
-->