<div class="footer-widgets">
    <div class="container">
        <?php dynamic_sidebar('sidebar-footer'); ?>
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
    <div class="container">
        <div class="text-muted credit pull-left">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>&nbsp;&nbsp;
            <a href="/contacto/">Contacto</a>&nbsp;&nbsp;
            <a href="/aviso-legal/">Aviso legal</a>
        </div>
        <div class="pull-right">
            <a class="fsocial-lnk" href="https://www.facebook.com/toofestival.es" target="_blank">
                <img class="fsocial-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/circle/48x48/fb.png" alt="toofestival.es Facebook">
            </a>
            <a class="fsocial-lnk" href="https://twitter.com/toofestivales" target="_blank">
                <img class="fsocial-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/circle/48x48/twitter.png" alt="toofestival.es Twitter">
            </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>