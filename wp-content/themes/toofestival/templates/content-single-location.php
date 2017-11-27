<?php
    while (have_posts()) : the_post();
    $EM_Location = em_get_location($post->ID, 'post_id');
?>
<div class="container box">
    <section class="row">
        <div class="col-sm-12">
            <div class="item-block-title-events">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="full title-pl">
                            <h4><i class="fa fa-calendar-check-o"></i><?php the_title(); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="listing-loading">
                <h3><i class="fa fa-spinner fa-spin"></i></h3>
            </div>
        </div>
        <div id="cat-listing-holder" class="col-sm-12">
            <div class="row">
            <?php
                $count = 1;
                $events = EM_Events::get(array('scope'=>'future', 'location'=>$EM_Location->output('#_LOCATIONID'))); 
                foreach( $events as $EM_Event ){?>
                <div class="col-sm-12 event-block">
                    <div class="upcoming-events-v2">
                        <a class="upcoming-events-big-button" href="<?php echo $EM_Event->output("#_EVENTURL")?>"></a>
                        <div class="row">
                            <div class="col-sm-2 upcoming-events-number">
                                <h2><?php echo $count?></h2>
                            </div>
                            <div class="col-sm-7 upcoming-events-title">
                                <div class="upcoming-events-avatar">
                                    <?php echo $EM_Event->output("#_CUSTOMEVENTIMAGEMEDIUM")?>
                                </div>
                                <div class="upcoming-events-title-cont">
                                    <h6><a href="#_EVENTURL"><?php echo $EM_Event->output("#_EVENTNAME")?></a></h6>
                                    <div class="full">
                                        <span><?php echo $EM_Event->output("#_CUSTOMEXCERPT")?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 upcoming-events-details hidden-xs">
                                <div class="full">
                                    <i class="fa fa-calendar"></i>
                                    <span><?php echo $EM_Event->output("#_EVENTDATES")?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $count++; } ?>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="map-container">
                <div id="map-script-holder" class="map-canvas">
                    <?php echo do_shortcode('[locations_map location="'.$EM_Location->output('#_LOCATIONID').'" limit=500]'); ?>
                </div>
                <div id="map-canvas-shadow"><i class="fa fa-spinner fa-spin"></i></div>
            </div>
        </div>
    </section>
</div>
<?php endwhile; ?>