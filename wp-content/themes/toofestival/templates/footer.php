<div class="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">La agenda<span class="orange">.</span></div>
                <div class="big-title">La agenda</div>
            </div>
            <div class="footer-widgets-wrapper">
                <?php dynamic_sidebar('sidebar-footer'); ?>
            </div>
        </div>
    </div>
</div>
<!--
<div class="marketing">
    <div class="container">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-2 col-sm-2">
            <a href="/festivales/">
                <img alt="Gu&iacute;a Festivales 2015" class="img-search" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/flat/search.png">
                <h3>Festivales 2015</h3>
                <p class="hidden-xs">Toda la información sobre los festivales.</p>
            </a>
        </div>
        <div class="col-md-2 col-sm-2">
            <a href="/mejores-festivales/">
                <img alt="Mejores Festivales" class="img-star" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/flat/star.png">
                <h3>Los Mejores</h3>
                <p class="hidden-xs">Mira la clasificación de los mejores festivales<br>Y pon tu valoración.</p>
            </a>
        </div>
        <div class="col-md-2 col-sm-2">
            <a href="/calendario-festivales/">
                <img alt="Calendario Festivales" class="img-calendar" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/flat/calendar.png">
                <h3>Calendario</h3>
                <p class="hidden-xs">Consulta nuestro calendario con los festivales.</p>
            </a>
        </div>
        <div class="col-md-2 col-sm-2">
            <a href="/mapa-festivales/">
                <img alt="Mapa de Festivales" class="img-location-pointer" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/flat/location-pointer.png">
                <h3>Mapa</h3>
                <p class="hidden-xs">Localiza los festivales en nuestro gran mapa.</p>
            </a>
        </div>
        <div class="col-md-2 col-sm-2">
            <a href="/carteles-de-festivales/">
                <img alt="Carteles de Festivales" class="img-camera" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/flat/camera.png">
                <h3>Carteles</h3>
                <p class="hidden-xs">Mira los carteles de los festivales.</p>
            </a>
        </div>
        <div class="col-md-1 col-sm-1"></div>
    </div>
</div>
<div class="footer-third-parties hidden-xs">
    <div class="container">
        <h3>Gracias a:</h3>
        <div>
            <a href="https://wordpress.org/" target="_blank" title="Gracias a WordPress"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/thirds/wordpress.png" alt="Gracias a WordPress"></a>
            <a href="https://roots.io/" target="_blank" title="Gracias a Roots - HTML5 WordPress Starter Theme"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/thirds/roots.svg" class="roots-logo" alt="Gracias a Roots - HTML5 WordPress Starter Theme"></a>
            <a href="http://wp-events-plugin.com/" target="_blank" title="Gracias a Events Manager for WordPress"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/thirds/eventsmanager.png" alt="Gracias a Events Manager for WordPress"></a>
            <a href="http://www.nextgen-gallery.com/" target="_blank" class="nextgen-title" title="Gracias a NextGen Gallery">NextGEN Gallery</a>
            <a href="http://www.ticketmaster.es/" target="_blank" title="Gracias a Ticketmaster"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/thirds/ticketmaster.png" alt="Gracias a Ticketmaster" class="ticketmaster-logo"></a>
            <!--
            <a href="http://www.wunderslider.com/" target="_blank" title="Gracias a WunderSlider"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/thirds/wunderslider.png" alt="Gracias a WunderSlider"></a>
            <a href="https://es.ticketbell.com/" target="_blank" title="Gracias a Ticketbell"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/thirds/ticketbell.png" alt="Gracias a Ticketbell" class="ticketbell-logo"></a>
        </div>
    </div>
</div>
-->
<footer id="footer" class="content-info" role="contentinfo">
    <div class="newsletter-subscription">
        <div class="newsletter-subscription-wrapper">
            <div class="stay-tuned">Mantente al tanto<span class="orange">.</span></div>
            <div class="newsletter-subscription-baseline">No te pierdas nada. Suscríbete a nuestra newsletter</div>
            <div class="newsletter-subscription-form">
                <?php echo do_shortcode('[contact-form-7 id="3018" title="Newsletter Subscriber"]');?>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="logo">
                <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
            </div>
            <div id="footer-top-navbar" class="banner navbar navbar-default navbar-static-top navbar-inverse " >
                <nav class="collapse navbar-collapse" role="navigation">
                    <?php
                    if (has_nav_menu('footer')) :
                        wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'nav navbar-nav'));
                    endif;
                    ?>
                </nav>
            </div>
            <span class="back-to-top">
                <i class="fa fa-angle-up first-angle"></i>
                <i class="fa fa-angle-up second-angle"></i>
            </span>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="social-links pull-left">
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
                    <li>
                        <a href="https://www.instagram.com/toofestival.es/" class="lien-ext link-ins">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                <path id="instagram-6" class="st0" d="M21.231,0H2.769C1.24,0,0,1.24,0,2.769v18.46C0,22.76,1.24,24,2.769,24h18.463C22.761,24,24,22.76,24,21.229V2.769C24,1.24,22.761,0,21.231,0z M12,7.385c2.549,0,4.616,2.065,4.616,4.615c0,2.548-2.067,4.616-4.616,4.616S7.385,14.548,7.385,12C7.385,9.45,9.451,7.385,12,7.385z M21,20.078C21,20.587,20.587,21,20.076,21H3.924C3.413,21,3,20.587,3,20.078V10h1.897c-0.088,0.315-0.153,0.64-0.2,0.971C4.647,11.308,4.616,11.65,4.616,12c0,4.079,3.306,7.385,7.384,7.385s7.384-3.307,7.384-7.385c0-0.35-0.031-0.692-0.081-1.028c-0.047-0.331-0.112-0.656-0.2-0.971H21V20.078z M21,6.098c0,0.509-0.413,0.923-0.924,0.923h-2.174c-0.511,0-0.923-0.414-0.923-0.923V3.923c0-0.51,0.412-0.923,0.923-0.923h2.174C20.587,3,21,3.413,21,3.923V6.098z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="text-muted credit pull-right">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>&nbsp;&nbsp;
                <a href="/contacto/">Contacto</a>&nbsp;&nbsp;
                <a href="/aviso-legal/">Aviso legal</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>