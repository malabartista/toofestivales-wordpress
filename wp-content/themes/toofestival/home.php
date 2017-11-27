<!-- Video Section -->
<header class="festival-header video-section">
    <img class="header-image" src='http://toofestival.es/media/ngg_featured/Love-RiccardoM-12-07-2009.jpg' alt="Rototom Sunsplash" itemprop="image">
    <div class="pattern-overlay">
        <a id="bgndVideo" class="player hidden-xs" data-property="{videoURL:'https://www.youtube.com/watch?v=AtdnWYqbMwc',containment:'.video-section', quality:'large', autoPlay:true, mute:true,showControls:false, opacity:1}">bg</a>
        <div class="container">
            <h1 itemprop="name">Toofestival.es</h1>
            <div class="sub-header">Guía de Festivales</div>
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
<!-- carousel -->
<!--
<section id="home-carousel">
    <div id="carousel-home" class="carousel slide">
        <div class="header-bar-control">
        <a href="#" id="scroll-to"><span id="icon-scroll" class="glyphicon glyphicon-videobg glyphicon-chevron-down"></span></a>
        </div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-home" data-slide-to="1" class=""></li>
        </ol>
        <div class="carousel-header">
            <h1>TooFestival.es</h1>
            <h2>Gu&iacute;a de Festivales</h2>
        </div>
        <div class="carousel-inner">
            <div class="item active">
                <img src="http://toofestival.es/media/ngg_featured/Love-RiccardoM-12-07-2009.jpg" alt="Rototom Sunsplash" title="Rototom Sunsplash">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Rototom Sunsplash</h3>
                        <p><a class="btn btn-large btn-primary" href="festivales/rototom-sunsplash/" title="Rototom Sunsplash"><i class="fa fa-binoculars"></i> Ver Festival</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="http://toofestival.es/media/2013/10/DCODE.jpg" alt="DCODE" title="DCODE">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>DCODE</h3>
                        <p><a class="btn btn-large btn-primary" href="festivales/dcode-festival/" title="DCODE"><i class="fa fa-binoculars"></i> Ver Festival</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-home" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-home" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</section>
-->
<div id="home-adsense">
    <div class="container">
        <!-- Anuncio -->
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
<section id="home-festivals">
    <div id="home-social" class="container">
        <?php echo do_shortcode('[ssba]'); ?>
    </div>
    <div id="home-nextevents-title">
        <div class="container section-header">
            <h2 class="text-center">Pr&oacute;ximos festivales</h2>
        </div>
    </div>
    <div class="container">
    <?php
        if (class_exists('EM_Events')) {
            echo EM_Events::output(array('limit' => 24, 'orderby' => 'event_start_date'));
        }
    ?>
    </div>
    <div id="home-festivales-btn">
        <div class="container text-center">
            <a class="btn btn-primary btn-lg" role="button" href="/festivales/"><i class="fa fa-binoculars"></i> Ver todos los festivales</i></a>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function () {
        jQuery('#scroll-to').click(function () {
            jQuery.scrollTo(jQuery('#home-festivals'), 800);
        });
    });
</script>