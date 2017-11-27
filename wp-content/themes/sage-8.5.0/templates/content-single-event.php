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
    //setPostViews(get_the_ID());

    if (!$image)
        $image = "/media/2014/01/Festivales.jpg";
    // added this to be able to use shortcodes and placeholders for event
    $EM_Event = em_get_event($post->ID, 'post_id');

    ?>
    <article role="article" itemscope itemtype="http://schema.org/Festival">
        <?php if ($videoID) { ?>
        <header class="festival-header video-section">
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
            <div id="progressBar" style="display:none;"></div>
        </div>
        <?php } else { ?>
        <header class="festival-header">
            <img class="header-image" src='<?php echo $image ?>' alt="<?php the_title(); ?>">
            <div class="container">
                <h1 itemprop="name"><?php the_title(); ?></h1>
                <div class="sub-header"><?php get_template_part('templates/entry-meta-event'); ?></div>
            </div>
        </header>
        <?php } ?>

        <div id="festival-info" class="festival-info">
            <div class="container">
                <div class="row festival-social">
                    <div class="col-md-12">
                        <?php echo do_shortcode('[ssba]') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="blockquote-box clearfix">
                            <div class="square pull-left">
                                <span class="glyphicon glyphicon-calendar glyphicon-lg"></span>
                            </div>
                            <h4>Cu&aacute;ndo</h4>
                            <p>
                                <?php echo $EM_Event->output('#_EVENTDATES'); ?>
                            </p>
                        </div>
                        <div class="blockquote-box blockquote-primary clearfix">
                            <div class="square pull-left">
                                <span class="glyphicon glyphicon-music glyphicon-lg"></span>
                            </div>
                            <h4>M&uacute;sica</h4>
                            <p>
                                <?php echo $EM_Event->output('#_CATEGORIES'); ?>
                            </p>
                        </div>
                        <?php if ($EM_Event->output('#_EVENTTAGS') != '') { ?>
                        <div class="blockquote-box blockquote-artists clearfix">
                            <div class="square pull-left">
                                <span class="glyphicon glyphicon-user glyphicon-lg"></span>
                            </div>
                            <h4>Artistas</h4>
                            <div itemscope itemprop="performers" itemtype="http://schema.org/Person">
                                <p>
                                    <?php echo $EM_Event->output('#_EVENTTAGS'); ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if ($weblink) { ?>
                        <div class="blockquote-box blockquote-info clearfix">
                            <div class="square pull-left">
                                <span class="glyphicon glyphicon-cloud glyphicon-lg"></span>
                            </div>
                            <h4>M&aacute;s informaci&oacute;n</h4>
                            <p>
                                <a class="btn btn-weblink" href="http://<?php echo $weblink; ?>" target="_blank" itemprop="url">Sitio Oficial</a>
                            </p>
                        </div>
                        <?php } ?>
                        <?php if ($price) { ?>
                        <div class="blockquote-box blockquote-success clearfix">
                            <div class="square pull-left">
                                <span class="glyphicon glyphicon-euro glyphicon-lg"></span>
                            </div>
                            <h4>Precio</h4>
                            <p>
                                <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <span itemprop="price"><?php echo $price; ?></span> &euro; &nbsp;&nbsp;
                                    <meta itemprop="priceCurrency" content="EUR"/>
                                    <?php if ($ticket) { ?>
                                        <a href="<?php echo $ticket; ?>" class="btn btn-success" target="_blank" itemprop="url">Compra tu entrada</a>
                                    <?php } ?>
                                </span>
                            </p>
                        </div>
                        <?php } ?>
                        <div class="blockquote-box blockquote-warning clearfix">
                            <div class="square pull-left">
                                <span class="glyphicon glyphicon-star glyphicon-lg"></span>
                            </div>
                            <h4>Valoraci&oacute;n</h4>
                            <p>
                            <?php if (function_exists('wp_gdsr_render_article')) {
                                wp_gdsr_render_article();
                            } ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blockquote-box blockquote-danger clearfix">
                            <div class="square pull-left">
                                <span class="glyphicon glyphicon-map-marker glyphicon-lg"></span>
                            </div>
                            <h4>D&oacute;nde</h4>
                            <p>
                                <span itemprop="location" itemscope itemtype="http://schema.org/Place" >
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
                            </p>
                        </div>
                        <div class="hidden-xs"><?php echo $EM_Event->output('#_LOCATIONMAP'); ?></div>
                    </div>
                </div>
                <?php if ($ticketbell) { ?>
                <!--
                <div class="row">
                    <div class="col-md-12">
                    <h3 class="hidden-xs">Transporte Oficial <strong><?php the_title(); ?></strong> en <img class="ticketbell-logo" src="< ?php echo get_template_directory_uri(); ?>/assets/img/thirds/ticketbell.png" alt="Ticketbell"></h3>
                    <h3 class="visible-xs">Transporte <?php the_title(); ?></h3>
                        < ?php echo $ticketbell; ?>
                    </div>
                </div>
                -->
                <?php } ?>
                <div class="row adsense">
                    <div class="col-md-12">
                        <!-- Anuncio en Festival 2 -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-6980635843842377"
                             data-ad-slot="4622627647"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div id="festival-breadcrumbs" class="container">
        <!--
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<p id="breadcrumbs">','</p>');
            } ?>
        -->
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
        <div id="festival-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <span itemprop="description"><?php the_content(); ?></span>
                        <div id="festival-social">
                            <?php echo do_shortcode('[ssba]') ?>
                        </div>
                        <div id="festival-comments">
                            <legend>¿Has estado en el festival? Comenta que tal fue la experiencia!!.</legend>
                            <?php comments_template('/templates/comments.php'); ?>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="ticketmaster">
                        <!--
                        <?if($post->ID == '404' ){?>
                        <script type="text/javascript">
                        var uri = 'http://impes.tradedoubler.com/imp?type(img)g(20094306)a(2512508)' + new String (Math.random()).substring (2, 11);
                        document.write('<a href="http://clk.tradedoubler.com/click?p=123382&a=2512508&g=20094306" target="_BLANK"><img src="'+uri+'" border=0></a>');
                        </script>
                        <? } else{ ?>
                        <script type="text/javascript">
                        var uri = 'http://impes.tradedoubler.com/imp?type(js)g(18631648)a(2512508)' + new String (Math.random()).substring (2, 11);
                        document.write('<sc'+'ript type="text/javascript" src="'+uri+'" charset="ISO-8859-1"></sc'+'ript>');
                        </script>
                        <? } ?>
                        -->
                        </div>
                        <?php if ($poster) { ?>
                        <div id="festival-cartel" style="margin-bottom:20px">
                            <a id="cartel-image" class="cartel-image" href="<?php echo $poster; ?>"><img class="aligncenter size-full" src="<?php echo $poster; ?>" alt="Cartel <?php the_title(); ?>"></a>
                        </div>
                        <?php } ?>
                        <!-- Anuncio en Festival Sidebar -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-6980635843842377"
                             data-ad-slot="8026194843"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        <div id="festival-fbfanbox" style="padding-top:20px">
                            <?php echo do_shortcode('[efb_likebox fanpage_url="https://www.facebook.com/toofestival.es" fb_appid="688752971148573" box_width="300" box_height="" colorscheme="light" show_faces="0" show_header="1" show_stream="1" show_border="1"]'); ?>
                        </div>
                    </div>
                </div>
                <div class="row adsense">
                    <div class="col-md-12">
                        <!-- Anuncio en Festival -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-6980635843842377"
                             data-ad-slot="6437847241"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($gallery) { ?>
        <div id="festival-photos">
            <div class="">
            <?php echo do_shortcode('[nggallery id=' . $gallery . ' wunderslider="true" container_width="100%" ]'); ?>
            </div>
        </div>
        <?php } ?>
    </article>
<?php endwhile; ?>
    <div id="festival-related">
        <div class="">
        <?php related_posts(array('post_type' => array('event'))); ?>
        </div>
        <div id="home-festivales-btn">
            <div class="container text-center">
                <a class="btn btn-primary btn-lg" role="button" href="/festivales/"><i class="fa fa-binoculars"></i> Ver todos los festivales</a>
            </div>
        </div>
    </div>
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
            jQuery.scrollTo(jQuery('#festival-info'), 800);
        });
    });


</script>