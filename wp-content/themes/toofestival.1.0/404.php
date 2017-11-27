<?php get_template_part('templates/page', 'header'); ?>
<div class="not-found-error">
     <div class="container">
        <h3><?php _e('Lo sentimos la pagina que está buscando no se ha encontrado', 'roots'); ?></h3>
        <h4><?php _e('Encuentra un festival, por nombre, estilo de música o lugar. en nuestro buscador', 'roots'); ?></h4>
        <div id="festival-searchform">
            <?php echo do_shortcode('[event_search_form]'); ?>
        </div>
    </div>
</div>
