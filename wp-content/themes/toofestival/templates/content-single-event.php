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
    <article role="article" itemscope itemtype="http://schema.org/Festival">
        <?php if ($videoID) { ?>
        <header id="page-title"  class="festival-header video-section event-page-title">
            <img class="header-image" src='<?php echo $image ?>' alt="<?php the_title(); ?>" itemprop="image">
            <div class="pattern-overlay">
                <a id="bgndVideo" class="player hidden-xs" data-property="{videoURL:'https://www.youtube.com/watch?v=<?php echo $videoID ?>',containment:'.video-section', quality:'large', autoPlay:true, mute:true,showControls:false, opacity:1}">bg</a>
                <div class="container">
                    <h1 itemprop="name"><?php the_title(); ?></h1>
                    <div class="sub-header"><?php get_template_part('templates/entry-meta-event'); ?></div>
                </div>
            </div>
        </header>
        <div class="header-bar-control">
            <div id="video-info"></div>
            <a id="yt-play" style="display:none;"><span id="icon-play" class="glyphicon glyphicon-videobg glyphicon-pause"></span></a>
            <a id="yt-volume" style="display:none;"><span id="icon-volume" class="glyphicon glyphicon-videobg glyphicon-volume-off"></span></a>
            <a href="#festival-info" id="scroll-to"><span id="icon-scroll" class="glyphicon glyphicon-videobg glyphicon-chevron-down"></span></a>
            <div id="progressBar"></div>
        </div>
        <!--
        <div id="page-title" class="event-page-title">
            <div class="content page-title-container">
                <div class="container box">
                    <div class="row item-title-flex">
                        <div class="col-sm-4 item-title-metadata">
                            <div class="event-header-container">
                                <div class="event-header-block skrollable skrollable-between" data-0="margin-bottom:-217px;" data-140="margin-bottom:0px" style="margin-bottom: -217px;">
                                    <h1 class="event-page-title"><?php the_title(); ?></h1>
                                    <span class="event-page-subtitle"><i class="fa fa-map-marker"></i><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?>, <?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?></span>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <span class="event-page-subtitle-alt">Comienza:</span>
                                            <span class="event-page-subtitle-alt-o"><i class="fa fa-calendar-o" style="margin-right: 0;"></i></span>
                                            <span class="event-page-subtitle-alt"><?php echo $EM_Event->output('#_{d/m/Y}'); ?></span>
                                            <span class="event-page-subtitle-alt-o"><i class="fa fa-clock-o" style="margin-right: 0;"></i></span>
                                            <span class="event-page-subtitle-alt"><?php echo $EM_Event->output('#_{H:m}'); ?></span>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <span class="event-page-subtitle-alt">Finaliza:</span>
                                            <span class="event-page-subtitle-alt-o"><i class="fa fa-calendar-o" style="margin-right: 0;"></i></span>
                                            <span class="event-page-subtitle-alt"><?php echo $EM_Event->output('#@_{d/m/Y}'); ?></span>
                                            <span class="event-page-subtitle-alt-o"><i class="fa fa-clock-o" style="margin-right: 0;"></i></span>
                                            <span class="event-page-subtitle-alt"><?php echo $EM_Event->output('#@_{H:m}'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pattern-overlay">
                <a id="bgndVideo" class="player hidden-xs" data-property="{videoURL:'https://www.youtube.com/watch?v=<?php echo $videoID ?>',containment:'.video-section', quality:'large', autoPlay:true, mute:true,showControls:false, opacity:1}">bg</a>
                <div class="container">
                    <h1 itemprop="name"><?php the_title(); ?></h1>
                    <div class="sub-header"><?php get_template_part('templates/entry-meta-event'); ?></div>
                </div>
            </div>
            <div class="page-title-bg" style="background-image: url(<?php echo $image ?>); background-position: 50% 50%;"></div>
        </div>
        -->
        <?php } else { ?>
        <header class="festival-header">
            <img class="header-image" src='<?php echo $image ?>' alt="<?php the_title(); ?>">
            <div class="container">
                <h1 itemprop="name"><?php the_title(); ?></h1>
                <div class="sub-header"><?php get_template_part('templates/entry-meta-event'); ?></div>
            </div>
        </header>
        <?php } ?>
        <div id="festival-information" class="single-event-page">
            <div class="container box">
                <section class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6 alignright hidden-xs">
                                        <div class="event-counter">
                                        <?php echo do_shortcode('[ujicountdown id="Default" expire="' . $EM_Event->output('#_{Y/m/d H:m}') . '" hide="true" url="" subscr="" recurring="" rectype="second" repeats=""]') ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <span class="item-title-metadata-add-favorites">
                                                <span id="like-listing-container" class="like-listing-container">
                                                    <?php echo do_shortcode('[favorite_button]') ?>
                                                    <i class="fa fa-spinner fa-spin"></i>
                                                </span>
                                                <span class="like-listing-count"><span id="count-bookmarks"><?php echo do_shortcode('[favorite_count]') ?></span> Favoritos</span>
                                                </span>
                                            </div>
                                            <div class="col-sm-6 col-xs-6 single-event-header-block">
                                                <div class="listing-container-rating">
                                                    <?php echo do_shortcode('[starrater tpl=54]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6">
                                        <span class="event-views"><i class="fa fa-eye"></i><?php echo $EM_Event->output('#_EVENTVIEWS'); ?> Vistas</span>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <span class="item-title-metadata-share-content upcoming-event-share">
                                            <button tabindex="0" class="" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true" data-content=""><i class="fa fa-share-alt"></i>Compartir</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="item-block-title">
                            <i class="fa fa-bookmark"></i><h4><?php the_title(); ?></h4>
                        </div>
                        <div class="item-block-content">
                            <div class="row">
                                <div class="summery-block">
                                    <div id="summery-container">
                                        <div class="event-summery-icon-container">
                                            <div class="event-summery-icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div>
                                        <div class="event-summery-information">
                                            <div class="event-summery-main">
                                                <a href="<?php echo $EM_Event->output('#_LOCATIONURL'); ?>"><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></a>
                                            </div>
                                            <div class="event-summery-secondary">
                                                <?php echo $EM_Event->output('#_LOCATIONTOWN'); ?>, <?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?>
                                                <span itemprop="location" itemscope itemtype="http://schema.org/Place" class="hidden">
                                                    <span itemprop="name"><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></span><br>
                                                    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                                        <span itemprop="streetAddress"><?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?></span>,
                                                        <span itemprop="addressLocality"><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span>,
                                                        <span itemprop="addressRegion" class="hidden"><?php echo $EM_Event->output('#_LOCATIONSTATE'); ?></span>
                                                        <span itemprop="addressCountry"><?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?></span>.
                                                    </span>
                                                    <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                                                        <meta itemprop="latitude" content="<?php echo $EM_Event->output('#_LOCATIONLATITUDE'); ?>" />
                                                        <meta itemprop="longitude" content="<?php echo $EM_Event->output('#_LOCATIONLONGITUDE'); ?>" />
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="summery-container">
                                        <div class="event-summery-icon-container">
                                            <div class="event-summery-icon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                        <div class="event-summery-information">
                                            <div class="event-summery-main">
                                                <?php echo $EM_Event->output('#_EVENTDATES'); ?>
                                            </div>
                                            <div class="event-summery-secondary">
                                                <?php echo $EM_Event->output('#_{Y}'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="summery-container">
                                        <div class="event-summery-icon-container">
                                            <div class="event-summery-icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </div>
                                        <div class="event-summery-information">
                                            <div class="event-summery-main">
                                                <a class="td-buttom" href="<?php echo $weblink; ?>" target="_blank" itemprop="url">Sitio Oficial</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="summery-container">
                                        <div class="event-summery-icon-container">
                                            <div class="event-summery-icon">
                                                <i class="fa fa-music"></i>
                                            </div>
                                        </div>
                                        <div class="event-summery-information">
                                            <div class="event-summery-main">
                                                <?php echo $EM_Event->output('#_CATEGORIES'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="item-block-title" style="text-align: left;">
                            <i class="fa fa-file-text-o"></i><h4>Info, Cartel &amp; Entradas</h4>
                            <!-- AddThisEvent -->
                            <div title="Add to Calendar" class="addeventatc" style="float: right;margin-top: 3px;">
                                Añadir al Calendario
                                <span class="start"><?php echo $EM_Event->output('#_{d/m/Y}'); ?></span>
                                <span class="end"><?php echo $EM_Event->output('#@_{d/m/Y}'); ?></span>
                                <span class="timezone">Europe/Madrid</span>
                                <span class="title"><?php echo $EM_Event->output('#_EVENTNAME'); ?></span>
                                <span class="description"><?php echo $EM_Event->output('#_EVENTEXCERPT'); ?></span>
                                <span class="location"><?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?>, <?php echo $EM_Event->output('#_LOCATIONTOWN'); ?>, <?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?></span>
                                <span class="all_day_event">true</span>
                                <span class="date_format">DD/MM/YYYY</span>
                                <span class="client">amgXlxLpKzDItqBlYmTO28491</span>
                            </div>
                            <?php if ($price) { ?>
                            <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="hidden"><?php echo $price; ?></span> &nbsp;&nbsp;
                                <meta itemprop="priceCurrency" content="EUR"/>
                                <?php if ($ticket) { ?>
                                    <a href="<?php echo $ticket; ?>" class="btn btn-default" target="_blank" itemprop="url" style="float: right;margin-top: 3px;margin-right: 10px;" ><i class="fa fa-ticket"></i>Entradas</a>
                                <?php } ?>
                            </span>
                            <!--
                            <div class="blockquote-box blockquote-success clearfix">
                                <div class="square pull-left">
                                    <span class="glyphicon glyphicon-euro glyphicon-lg"></span>
                                </div>
                                <h4>Precio</h4>
                                <p>
                                    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <span itemprop="price"><?php echo $price; ?></span> &nbsp;&nbsp;
                                        <meta itemprop="priceCurrency" content="EUR"/>
                                        <?php if ($ticket) { ?>
                                            <a href="<?php echo $ticket; ?>" class="btn btn-success" target="_blank" itemprop="url">Compra tu entrada</a>
                                        <?php } ?>
                                    </span>
                                </p>
                            </div>
                            -->
                            <?php } ?>
                        </div>
                        <div class="item-block-content">
                            <div class="row">
                                <div id="festival-breadcrumbs" class="col-sm-12">
                                    <?php
                                        //check if breadcrumbs and events manager functions exist
                                        if (function_exists('yoast_breadcrumb') && !is_front_page()) : ?>
                                        <div id="breadcrumb_wrapper" class="clearfix">
                                          <?php
                                              // set your before and after tags for breadcrumbs
                                              $bc_start = '<nav id="breadcrumbs"><div><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb">';
                                              $bc_end   = '</span></span></div></nav>';

                                              // if is one of your pages that have events manager
                                              if ( function_exists( 'em_init' ) ) {
                                                  // get yoast options from database which can be set in yoast internal links settings page
                                                  $opt = get_option("wpseo_internallinks");
                                                  $bc_sep = $opt['breadcrumbs-sep'];
                                                  $bc_home = $opt['breadcrumbs-home'];

                                                  if ( em_is_event_page() ) { // single event conditional
                                                    $this_page = '<a href="'.site_url().'" rel="v:url" property="v:title">'.$bc_home.'</a> '.$bc_sep.'<span rel="v:child" typeof="v:Breadcrumb"><a href="http://toofestival.es/festivales" rel="v:url" property="v:title">Festivales</a></span>'.$bc_sep.' &nbsp;&nbsp;&nbsp;<strong>'.$EM_Event->output('#_NAME').'</strong>';
                                                    echo $bc_start.$this_page.$bc_end;
                                                  } else {  // multi events list conditional
                                                      echo $bc_start.'<a href="'.site_url().'">'.$bc_home.'</a> '.$bc_sep.' <strong>'.get_the_title().'</a></strong>'.$bc_end;
                                                  }
                                              } else { // do yoast bc function
                                                  yoast_breadcrumb( $bc_start, $bc_end );
                                              }
                                          ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-8">
                                    <div class="full" itemprop="description">
                                        <?php the_content(); ?>
                                    </div>
                                    <span class="item-address-block">
                                        <i class="fa fa-map-marker" style="margin-top: 14px;"></i>
                                        <span class="item-address">
                                            <h5><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></h5>
                                            <p>
                                                <?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?><br>
                                                <?php echo $EM_Event->output('#_LOCATIONTOWN'); ?>,  <?php echo $EM_Event->output('#_LOCATIONSTATE'); ?><br>
                                                <?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?><br>
                                            </p>
                                        </span>
                                    </span>
                                    <!--
                                    <?php if($EM_Event->output('#_EVENTPHONE')){ ?>
                                    <span class="item-address-block">
                                        <i class="fa fa-phone"></i>
                                        <span class="item-address">
                                            <p><?php echo $EM_Event->output('#_EVENTPHONE'); ?></p>
                                        </span>
                                    </span>
                                    <?php } ?>
                                    -->
                                    <?php echo do_shortcode('[ssba]') ?>
                                    <!--
                                    <div id="festival-fbfanbox" style="padding-top:20px">
                                        < ?php echo do_shortcode('[efb_likebox fanpage_url="https://www.facebook.com/toofestival.es" fb_appid="688752971148573" box_width="1280" box_height="" colorscheme="light" show_faces="1" show_header="1" show_stream="0" show_border="1"]'); ?>
                                    </div>
                                    -->
                                    <!--<span id="contact-owner" class="td-buttom"><i class="fa fa-paper-plane"></i>Contacta</span>-->
                                </div>
                                <div class="col-sm-4">
                                    <?php if ($poster) { ?>
                                    <div id="festival-cartel" style="margin-bottom:20px">
                                        <a id="cartel-image" class="cartel-image" href="<?php echo $poster; ?>"><img class="aligncenter" src="<?php echo $poster; ?>" alt="Cartel <?php the_title(); ?>" title="Cartel <?php the_title(); ?>"></a>
                                    </div>
                                    <?php } ?>
                                    <div style="padding:20px;">
                                    <a href="https://www.ticketea.com/?a_aid=AFFPAP-toofestival&amp;a_bid=02fa7b08" target="_top"><img src="//affiliate.ticketea.com/accounts/default1/banners/02fa7b08.gif" alt="ticketea.com" title="ticketea.com" width="298" height="450" /></a><img style="border:0" src="http://ticketea.postaffiliatepro.com/scripts/igg7n8o8vzy?a_aid=AFFPAP-toofestival&amp;a_bid=02fa7b08" width="1" height="1" alt="" />
                                    </div>
                                    <ins class="adsbygoogle"
                                         style="display:block"
                                         data-ad-client="ca-pub-6980635843842377"
                                         data-ad-slot="8026194843"
                                         data-ad-format="auto"></ins>
                                    <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>
                                    <!--
                                    <div id="festival-fbfanbox" style="padding-top:20px">
                                        < ?php echo do_shortcode('[efb_likebox fanpage_url="https://www.facebook.com/toofestival.es" fb_appid="688752971148573" box_width="300" box_height="" colorscheme="light" show_faces="0" show_header="1" show_stream="1" show_border="1"]'); ?>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="item-block-content nopadding">
                            <!--
                            <div class="col-sm-4">
                                < ?php echo do_shortcode('[awesome-weather location="' . $EM_Event->output('#_LOCATIONTOWN') . ', ' . $EM_Event->output('#_LOCATIONCOUNTRY') .'" units="C" size="tall" override_title="' . $EM_Event->output('#_LOCATIONTOWN') . '" forecast_days="3" hide_stats="1" custom_bg_color="#cccccc" inline_style="width: 100%; margin-top: 20px;" background_by_weather="1" text_color="#000" locale="es"]') ?>
                            </div>
                            -->
                            <div class="">
                                <div id="maps-holder">
                                    <!--
                                    <iframe id="stay22-widget" width="100%" height="360" src="https://www.stay22.com/embed/gm?lat=<?php echo $EM_Event->output('#_LOCATIONLATITUDE'); ?>&lng=<?php echo $EM_Event->output('#_LOCATIONLONGITUDE'); ?>&title=<?php echo $EM_Event->output('#_LOCATIONNAME'); ?>&checkin=<?php echo date("m/d/Y", strtotime($EM_Event->event_start_date)); ?>&checkout=<?php echo date("m/d/Y", strtotime($EM_Event->event_end_date)); ?>" frameborder="0"></iframe>
                                    -->
                                    <div class="maps-buttons">
                                        <span class="map-switcher" data-rel="tooltip" rel="tooltip" title="Map"><i class="fa fa-map-marker"></i></span>
                                        <script type="text/javascript">
                                            jQuery(function($) {
                                                jQuery(document).on("click",".map-switcher",function(e){
                                                    jQuery("#item-small-map-streetview").css('z-index', '9');
                                                    jQuery("#item-small-map").css('z-index', '99');
                                                    e.preventDefault();
                                                    return false;
                                                });
                                                jQuery(document).on("click",".streetview-switcher",function(e){
                                                    jQuery("#item-small-map-streetview").css('z-index', '99');
                                                    jQuery("#item-small-map").css('z-index', '9');
                                                    e.preventDefault();
                                                    return false;
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div id="item-small-map" style="height: 400px;overflow: hidden;z-index: 99;">
                                        <?php echo $EM_Event->output('#_LOCATIONMAP'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($videoID){ ?>
                    <div class="col-sm-12">
                        <div class="item-block-title">
                            <i class="fa fa-file-video-o"></i><h4>Aftermovie</h4>
                        </div>
                        <div class="item-block-content video-content" style="opacity: 1;">
                            <div class="fluid-width-video-wrapper embed-responsive embed-responsive-16by9">
                                <?php echo wp_oembed_get( 'http://www.youtube.com/watch?v=' . $videoID ); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($gallery){ ?>
                    <div id="festival-photos" class="col-sm-12">
                        <div class="item-block-title">
                            <i class="fa fa-file-photo-o"></i><h4>Galería</h4>
                        </div>
                        <div class="item-block-content">
                            <!--< ?php echo do_shortcode('[nggallery id=' . $gallery . ' wunderslider="true" container_width="100%" ]'); ?>-->
                            <?php echo do_shortcode('[ngg_images gallery_ids="' . $gallery . '" display_type="photocrati-nextgen_pro_sidescroll" gallery_height="300"]'); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($EM_Event->output('#_EVENTTAGS')){ ?>
                    <div class="col-sm-12">
                        <div class="item-block-title">
                            <i class="fa fa-microphone"></i><h4>Artistas</h4>
                        </div>
                        <div class="item-block-content">
                            <div class="row">
                                <?php echo $EM_Event->output('#_EVENTTAGS'); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-sm-12">
                        <div class="item-block-title">
                            <i class="fa fa-comments"></i><h4>Comentarios</h4>
                        </div>
                        <div class="item-block-content">
                            <?php comments_template('/templates/comments.php'); ?>
                        </div>
                    </div>
                    <!--
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="item-block-title widget-container widget_search">
                                    <h4>Festivales Relacionados</h4>
                                </div>
                                <div class="row">
                                    < ?php related_posts(array('post_type' => array('event'))); ?>
                                    <div id="home-festivales-btn" class="col-sm-12">
                                        <div class="container text-center">
                                            <a class="btn btn-primary btn-lg" role="button" href="/festivales/"><i class="fa fa-binoculars"></i> Ver todos los festivales</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                </section>
            </div>
        </div>
    </article>
<?php endwhile; ?>
    <div id="festival-sidebar">
        <div class="container">
        <?php get_template_part('templates/sidebar-event'); ?>
        </div>
    </div>
<!-- Warming Up -->
<script>

    //jQuery('.festival-header').css("background-image", "url(<?php echo $image ?>)");
    //jQuery('.festival-header').css("background-size", "cover");
    //jQuery('.festival-header').append("<img src='<?php echo $image ?>' width='100%' height='100%'>");


    jQuery(document).ready(function() {
        jQuery('#scroll-to').click(function() {
            jQuery.scrollTo(jQuery('#festival-information'), 800);
        });
    });

</script>