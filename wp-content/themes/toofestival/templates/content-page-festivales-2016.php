<div class="container">
    <?php echo do_shortcode('[ssba]'); ?>
</div>
<div id="home-searchform">
    <?php echo do_shortcode('[event_search_form]'); ?>
</div>
<div id="festivales-page">
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
    <?php endwhile; ?>
</div>