<?php while (have_posts()) : the_post(); ?>
    <?php
    $videoID = get_field('video');
    $poster = get_field('poster');
    $gallery = get_field('gallery');
    $price = get_field('price');
    $ticket = get_field('ticket');
    $ticketbell = get_field('ticketbell');
    $weblink = get_field('weblink');
    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    setPostViews(get_the_ID());

    if (!$image)
        $image = "/media/2014/01/Festivales.jpg";
    // added this to be able to use shortcodes and placeholders for event
    $EM_Event = em_get_event($post->ID, 'post_id');

    ?>
    <main class="page-content hb">
        <div class="limiter">
            <div class="main-content agenda-detail">
                <section class="content">
                    <div class="event event-full" itemtype="http://schema.org/MusicEvent" itemscope="">
                        <div class="event-header-wrapper">
                            <div class="event-header">
                                <figure class="event-image" itemtype="http://schema.org/ImageObject" itemprop="image" itemscope="">
                                    <img class="header-image" src='<?php echo $image ?>' alt="<?php the_title(); ?>" itemprop="image">
                                </figure>
                                <div class="event-header-infos">
                                    <div class="event-header-infos-date">
                                        <meta itemprop="startDate" content="2016-08-27T00:00:00">
                                        <meta itemprop="endDate" content="2016-08-28T00:00:00">
                                        <time datetime="2016-08-27T00:00:00">27/08</time>
                                        <span> — </span>
                                        <time datetime="2016-08-28T00:00:00">28/08</time>                                    
                                        <span class="lieu" itemprop="location" itemscope itemtype="http://schema.org/Place" >
                                        <span> | </span>
                                        <span itemprop="name"><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></span><br>
                                        <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                            <span itemprop="streetAddress"><?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?></span>,
                                            <span itemprop="addressLocality"><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span>,
                                            <span itemprop="addressRegion"><?php echo $EM_Event->output('#_LOCATIONSTATE'); ?></span>.
                                        </span>
                                        <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                                            <meta itemprop="latitude" content="<?php echo $EM_Event->output('#_LOCATIONLATITUDE'); ?>" />
                                            <meta itemprop="longitude" content="<?php echo $EM_Event->output('#_LOCATIONLONGITUDE'); ?>" />
                                        </span>
                                    </span>
                                    </span>
                                    </div>

                                    <h1 class="event-title" itemprop="name"><?php the_title(); ?></h1>
                                    <div class="event-espace event-sub-info">En extérieur</div>
                                    <div class="event-camping event-sub-info">Pas de camping sur place</div>
                                    
                                    <ul class="event-links event-sub-info">
                                        <li><a href="<?php echo $weblink ?>" class="lien-ext">Site</a></li>
                                        <li> | <a href="https://www.facebook.com/festival.woodstower" class="lien-ext">Facebook</a></li>
                                        <li> | <a href="https://twitter.com/woodstower" class="lien-ext">Twitter</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gmaps-wrapper">
                                <div id="gmaps">
                                    <?php echo $EM_Event->output('#_LOCATIONMAP'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="event-content-wrapper">
                            <div class="event-body-wrapper">
                                <div class="event-body-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <aside class="sidebar-event">
                                <?php get_template_part('templates/sidebar-event');?>
                            </aside>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <section class="content-footer">
            <div class="content-footer-agenda">
                <div class="limiter">
                    <div class="main-content">
                        <div class="page-title">L'agenda<span class="orange">.</span></div>
                        <div class="big-title">L'agenda</div>
                        <div class="content-footer-wrapper">
                            <?php get_template_part('templates/sidebar');?>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    </main>
<?php endwhile; ?>