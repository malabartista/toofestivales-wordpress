<?php /*
  YARPP Template: Thumbnails
  Description: Requires a theme which supports post thumbnails
  Author: mitcho (Michael Yoshitaka Erlewine)
 */ ?>
<!--<h2 class="thin">Festivales relacionados</h2>-->
<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php
            $EM_Event = em_get_event($post->ID, 'post_id');
        ?>
        <?php if (has_post_thumbnail()): ?>
            <div class="col-sm-4">
                <div class="listing-container">
                    <a class="listing-container-big-button" href="<?php the_permalink() ?>"></a>
                    <div class="listing-container-block">
                        <div class="listing-container-block-body">
                            <div class="listing-block-title">
                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                <span class="listing-container-event-place">
                                    <span>
                                        <span class="fa fa-map-marker"></span>
                                        <span><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span>,
                                    </span>
                                    <?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?>
                                </span>
                                <div class="listing-container-categories">
                                    <i class="fa fa-music"></i><?php echo $EM_Event->output('#_EVENTCATEGORIES'); ?>
                                </div>
                            </div>
                            <div class="listing-container-dates">
                                <i class="fa fa-calendar"></i>
                                <span><?php echo $EM_Event->output('#_EVENTDATES');?></span>
                            </div>
                            <div class="listing-container-views">
                                <i class="fa fa-eye"></i>
                                <span><?php echo getPostViews($post->ID);?></span>
                            </div>
                            <div class="listing-container-bookmarks">
                                <i class="fa fa-heart"></i>
                                <span><?php echo getPostBookmarks($post->ID);?></span>
                            </div>
                        </div>
                    </div>
                    <div class="listing-container-black-shadow"></div>
                    <div class="listing-container-image-bg" style="background: #fff url(<?php echo $EM_Event->output('#_EVENTIMAGEURL'); ?>) no-repeat center center;"></div>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php else: ?>
    <div class="alert alet-info">No hay festivales relacionados.</div>
<?php endif; ?>
