
<div class="post event-#_EVENTPOSTID" itemscope itemtype="http://schema.org/Festival">
    <a href="<?php get_post_permalink(); ?>" itemprop="url" class="img-zoom" title="#_EVENTNAME">
       <?php the_post_thumbnail(); ?>
    </a>
    <div class="caption">
        <div class="caption-text">    
            <div class="row"><a href="<?php get_post_permalink(); ?>" title="<?php the_title(); ?>"><h4 itemprop="name"><?php the_title(); ?></h4></a></div>
			<div class="row "><span itemprop="description" ><?php the_excerpt(); ?> </span></div>
        </div>
    </div>
    <div class="caption-data">
        <div class="eventdates">
            <i class="fa fa-calendar-o"></i>    <?php get_template_part('templates/entry-meta'); ?>
        </div>
    </div>
</div>