<?php while (have_posts()) : the_post(); ?>
<?php 
    $videoID = get_field('video');
    $poster = get_field('poster');
    $gallery = get_field('gallery');
?>
    <div id="post-festival-header" >
        <div class="container">
            <header>
                <!--<?php the_post_thumbnail(); ?>-->
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
        </div>
    </div>
    <div id="post-festival-content">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; ?>