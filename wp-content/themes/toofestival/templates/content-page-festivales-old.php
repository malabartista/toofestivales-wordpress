<div class="container">
	<div class="col-md-6">
    <?php echo do_shortcode('[ssba]'); ?>
    </div>
    <div class="col-md-6">
    <?php if (function_exists('wp_gdsr_render_article')) {
        wp_gdsr_render_article();
    } ?>
    </div>
</div>
<div id="festivales-page">
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
    <?php endwhile; ?>
</div>
