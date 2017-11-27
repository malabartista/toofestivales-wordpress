<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
<div class="container">
 <?php echo do_shortcode('[ssba]'); ?>
</div>
<div class="">
 <?php echo do_shortcode('[event_search_form]'); ?>
</div>
<section id="home-festivals">
    <div id="home-nextevents-title">
        <div class="container">
            <h2 class="text-center">Pr&oacute;ximos festivales</h2>
            <!--
            <div class="btn-group" data-toggle="buttons"><label class="btn btn-success active" id="all-fests"><input type="radio" checked> Todos</label><label class="btn btn-success" id="septiembre-fests"><input type="radio"> Septiembre</label></div>
            -->
        </div>
    </div>
    <?php
        if (class_exists('EM_Events')) {
            echo EM_Events::output(array('limit' => 12, 'orderby' => 'event_start_date'));
        }
    ?>
    <div id="home-festivales-btn">
        <div class="container text-center">
            <a class="btn btn-primary btn-lg" role="button" href="/festivales/"><i class="fa fa-binoculars"></i> Ver todos los festivales</a>
        </div>
    </div>
</section>
<div class="container">
 <?php echo do_shortcode('[ssba]'); ?>
</div>