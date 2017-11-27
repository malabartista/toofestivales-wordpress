<?php /*
  YARPP Template: Thumbnails
  Description: Requires a theme which supports post thumbnails
  Author: mitcho (Michael Yoshitaka Erlewine)
 */ ?>
<h2 class="thin">Festivales relacionados</h2>
<?php if (have_posts()): ?>
    <div class="container">
        <div id="grid" class="grid">
            <div id="posts" class="posts">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                        $EM_Event = em_get_event($post->ID, 'post_id');
                    ?>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post">
                            <a href="<?php the_permalink() ?>" class="img-zoom">
                                <?php echo $EM_Event->output('#_CUSTOMEVENTIMAGEYARPP'); ?>
                            </a>
                            <div class="caption" style="border-top: 2px soliD <?php echo $EM_Event->output('#_CATEGORYCOLOR'); ?>">
                                <div class="caption-text">    
                                    <div class="row"><a href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a></div>
                                    <div class="row"><i class="fa fa-music"></i><?php echo $EM_Event->output('#_EVENTCATEGORIES'); ?></div>
                                    <div class="row location">
                                        <span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;<?php echo $EM_Event->output('#_LOCATIONTOWN'); ?><span >, <?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?></span>
                                    </div>
                                </div>
                            </div>
                             <div class="caption-data">
                                <div class="eventdates">
                                    <i class="fa fa-calendar-o"></i>&nbsp;&nbsp;<?php echo $EM_Event->output('#_EVENTDATES'); ?>
                                </div>
                                <div class="eventviewed">
                                    <i class="fa fa-eye"></i>&nbsp;&nbsp;<?php echo getPostViews($post->ID);?>
                                </div>
                                <div class="eventratings">
                                    <?php echo $EM_Event->output('#_CUSTOMEVENTRATINGYARPP'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert alet-info">No hay festivales relacionados.</div>
<?php endif; ?>
