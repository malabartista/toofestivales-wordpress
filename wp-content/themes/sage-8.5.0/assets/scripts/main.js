/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

jQuery(document).ready(function($) {

    $('#carousel-home').carousel({
        interval: 4000
    });

    $('.em-pagination').wrap("<div class='pagination'></div>");

    $('.ui-icon-circle-triangle-e').removeClass("ui-icon").removeClass("ui-icon-circle-triangle-e").addClass("glyphicon").addClass("glyphicon-chevron-right");

    // grid isotope filter buttons
    $("#all-fests").click(function() {
        $('#posts').isotope({filter: '*'});
    });
    $("#abril-fests").click(function() {
        $('#posts').isotope({
            filter: function(){
                var name = $(this).find('.big-date').text();
                return name.match( /Apr$/ );
            }
        });
    });
    $("#mayo-fests").click(function() {
        $('#posts').isotope({
            filter: function(){
                var name = $(this).find('.big-date').text();
                return name.match( /May$/ );
            }
        });
    });
    $("#junio-fests").click(function() {
        $('#posts').isotope({
            filter: function(){
                var name = $(this).find('.big-date').text();
                return name.match( /Jun$/ );
            }
        });
    });
    $("#julio-fests").click(function() {
        $('#posts').isotope({
            filter: function(){
                var name = $(this).find('.big-date').text();
                return name.match( /Jul$/ );
            }
        });
    });
    $("#agosto-fests").click(function() {
        $('#posts').isotope({
            filter: function(){
                var name = $(this).find('.big-date').text();
                return name.match( /Aug$/ );
            }
        });
    });
    $("#septiembre-fests").click(function() {
        $('#posts').isotope({
            filter: function(){
                var name = $(this).find('.big-date').text();
                return name.match( /Sep$/ );
            }
        });
    });
    $("a.conditions_offer").click(function() {
        if ($(this).hasClass('expanded')) {
            $(this).addClass('collapsed').removeClass('expanded');
            $(this).parent().next().show();
            $(this).parent().parent().prev().height($(this).parent().parent().height() + 10);
        } else {
            var altura = '';
            if ($(this).hasClass('offer')) {
                altura = '77px';
            } else {
                altura = '67px';
            }
            $(this).addClass('expanded').removeClass('collapsed');
            $(this).parent().next().hide();
            $(this).parent().parent().prev().height(altura);
        }
        return false;
    });
    $("[rel='tooltip']").tooltip();
    $('#scroll-to').tooltip();

    /* Menu Scroll */
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 150) {
            $('#header-top-navbar').addClass('navbar-fixed-top');
        } else {
            $('#header-top-navbar').removeClass('navbar-fixed-top');
        }
    });

    /* Maps Control */
    $(document).bind('em_maps_location_hook', function( e, map, infowindow, marker ){
        map.set('scrollwheel', false);
    });
    $(document).bind('em_maps_locations_hook', function( e, map, infowindow, marker ){
        alert("Hola");
        //Set marker image and size
        //var myIcon = new google.maps.MarkerImage("http://toofestival.es/wp-content/themes/toofestival/assets/img/icons/flat/location-pointer.png", null, null, null, new google.maps.Size(40,60));
        //Apply marker to map
        //marker.setOptions({'icon':  myIcon });

        //Set map styles - from Snazzy Maps
        var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]}];
        var stMidnight = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}];
        var stBlueEsence = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}];
        var stShadesOfGrey = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];
        //First, we read in the data describing style.
        var stFestival = [{"featureType": "administrative","stylers": [{ "visibility": "off" }]},{"featureType": "poi","stylers": [{ "visibility": "off" }]},{"featureType": "transit","stylers": [{ "visibility": "off" }]},{"featureType": "road","stylers": [{ "visibility": "off" }]},{"featureType": "landscape","stylers": [{ "color": "#FFE200" }]},{"featureType": "water","stylers": [{ "visibility": "on" },{ "color": "#4f92c6" }]}];
        var stLunarLandscape = [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];
        map.setOptions({styles: stLunarLandscape});

        // Custom Logo
        /*
        var logoControlDiv = document.createElement('div');
        var logoControl = new LogoControl(logoControlDiv, map);
        logoControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(logoControlDiv);
        */
        // Custom Google map marker icon
        //marker.set({'icon': '../img/icons/flat/location-pointer.png'});

        //Custom Load Markers
        loadMapMarkers(map);

        map.set('scrollwheel', false);

        var listener = google.maps.event.addListener(map, "idle", function() {
          var mapOptions = {
            zoom: 5,
            center: new google.maps.LatLng(43.000, 8.000)
          };
          map.setOptions(mapOptions);
          google.maps.event.removeListener(listener);
        });
        $('.gm-style-iw').css("top", "0");
        $('.gm-style-iw').css("left", "0");
    });
    $('.em-location-map-container').css("width", "100%");
    $('.em-location-map-container').removeClass("thumbnail");
    $('#em-location-data .em-location-map-container').css("width", "50%");

    /* Grid Posts Masonry Isotope */
    var $container = $('#posts');
    var gutter = parseInt(jQuery('.post').css('marginBottom'));
    $container.imagesLoaded(function(){
      $container.isotope({
        itemSelector: '.post',
        columnWidth: '.post',
        masonry: {
          gutter: 10
        }
      });
    });

    /* Grid Posts Infinite Scroll */
    $container.infinitescroll({
      navSelector  : '.em-pagination',    // selector for the paged navigation
      nextSelector : '.em-pagination a.next',  // selector for the NEXT link (to page 2)
      itemSelector : '.post',     // selector for all items you'll retrieve
      loading: {
            msgText: 'Cargando más festivales',
            finishedMsg: '<div class="alert alert-info">No hay más festivales por el momento.</div>',
            img: '/assets/img/loaders/preloader.gif',
            loadingImg: '/assets/img/loaders/preloader.gif',
            loadingText: 'Cargando más festivales...',
            donetext: '<div class="alert alert-info">Has llegado al final.</div>',
            selector: '#grid'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          $container.isotope( 'appended', $newElems, true );
        });
      }
    );


    /* Header Image and Video Section */
    var winWidth = jQuery(window).width();
    var winHeight = jQuery(window).height();

    if(isMobile.any()){
        jQuery('.festival-header').css({
            'width': '100%',
            'height': winHeight - 100,
        });
        jQuery('.header-image').css({
            'width': '100%',
            'height': jQuery(window).height() - 100,
        });
        jQuery('.video-section .pattern-overlay').css({
            'width': '100%',
            'height': winHeight - 100,
        });
        /*
        jQuery(window).resize(function(){
            jQuery('.festival-header').css({
            'width': '100%',
            'height': jQuery(window).height() - 100,
            });
            jQuery('.header-image').css({
                'width': '100%',
                'height': jQuery(window).height() - 100,
            });
        }
        */
    }

    if(!isMobile.any()){
        jQuery('.header-bar-control .glyphicon').css({
            'margin-top': winHeight - 160,
        });
        jQuery('.video-section .pattern-overlay').css({
            'width': '100%',
            'height': winHeight - 100,
        });
        jQuery('.festival-header').css({
            'width': '100%',
            'height': winHeight - 100,
        });
        jQuery('.video-section').css({
            'width': '100%',
            'height': winHeight - 100,
        });
        jQuery('.header-image').css({
            'width': '100%',
            'height': jQuery(window).height() - 100,
        });
        jQuery(window).resize(function(){
            jQuery('.video-section .pattern-overlay').css({
                'width': '100%',
                'height': jQuery(window).height() - 100,
            });
            jQuery('.video-section').css({
                'width': '100%',
                'height': jQuery(window).height() - 100,
            });
            jQuery('.festival-header').css({
                'width': '100%',
                'height': jQuery(window).height() - 100,
            });
            jQuery('.header-bar-control .glyphicon').css({
                'margin-top': jQuery(window).height() - 160,
            });
            jQuery('.header-image').css({
                'width': '100%',
                'height': jQuery(window).height() - 100,
            });
        });
    }

    function showInfo(info){
        $("#video-info").stop().delay(500).html(info).stop().fadeIn().delay(5000).fadeOut();
    }
    jQuery(document).ready(function() {

        jQuery('#scroll-to').click(function() {
            jQuery.scrollTo(jQuery('#festival-info'), 800);
        });
        jQuery("#bgndVideo").on("YTPStart", function() {
            jQuery("#yt-volume").css("display", "");
            jQuery("#yt-play").css("display", "");
            jQuery(".header-image").addClass("hiddenimg");
        });
        jQuery("#bgndVideo").on("YTPBuffering", function() {
        });
        jQuery("#bgndVideo").on("YTPData", function (e) {
            showInfo(e.prop.title + "<br><br>@" + e.prop.channelTitle);
        });

        //edit, if you want to use this variable outside of this closure, or later use this:
        if(!isMobile.any()){
            var player = jQuery(".player").YTPlayer({
                onReady: function() {
                    jQuery("#yt-volume").css("display", "");
                    jQuery("#yt-play").css("display", "");
                    jQuery("#progressBar").css("display", "");
                },
                onStateChange: function(event){

                }
            });

            function onPlayerStateChange(event) {
                console.log(event.data);
                if (event.data === YT.PlayerState.PLAYING) {

                  jQuery('#progressBar').show();
                  var playerTotalTime = player.getDuration();

                  mytimer = setInterval(function() {
                    var playerCurrentTime = player.getCurrentTime();

                    var playerTimeDifference = (playerCurrentTime / playerTotalTime) * 100;


                    progress(playerTimeDifference, jQuery('#progressBar'));
                  }, 1000);
                } else {

                  clearTimeout(mytimer);
                  jQuery('#progressBar').hide();
                }
            }

            function progress(percent, $element) {
              var progressBarWidth = percent * $element.width() / 100;

            // $element.find('div').animate({ width: progressBarWidth }, 500).html(percent + "%&nbsp;");

              $element.find('div').animate({ width: progressBarWidth });
            }
        }

        jQuery("a.cartel-image").fancybox();

        /*
        var showFBBox = true;
        if(getCookie('showFBBox')){
            showFBBox = !(getCookie('showFBBox') === 'false');
        }

        jQuery(window).scroll(function(e){
            if((jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 100) && showFBBox) {
                showFBBox = false;
                //document.cookie="showFBBox=false;expires=date";
                setCookie('showFBBox','false',1);
                //jQuery.cookie('showFBBox', showFBBox, { expires: date });
                jQuery("#efb_likebox").fancybox().trigger('click');
            }
        });
        */

    });

    if(!isMobile.any()){
        // global vars
        // carousel-home all window
        jQuery('.header-bar-control .glyphicon').css({
            'margin-top': winHeight - 160,
        });
        jQuery('#carousel-home .item').css({
            'width': '100%',
            'height': winHeight - 100,
        });
        jQuery('#carousel-home').css({
            'width': '100%',
            'height': winHeight - 100,
        });

        jQuery(window).resize(function(){
            jQuery('#carousel-home .item').css({
                'width': '100%',
                'height': jQuery(window).height() - 100,
            });
            jQuery('#carousel-home').css({
                'width': '100%',
                'height': jQuery(window).height() - 100,
            });
            jQuery('.header-bar-control .glyphicon').css({
                'margin-top': jQuery(window).height() - 160,
            });
        });
    }
});

jQuery('#yt-volume').on("click", function() {
        if (jQuery('#icon-volume').hasClass("glyphicon-volume-up")) {
            jQuery('#bgndVideo').muteYTPVolume();
            jQuery('#icon-volume').removeClass("glyphicon-volume-up");
            jQuery('#icon-volume').addClass("glyphicon-volume-off");
        } else {
            jQuery('#bgndVideo').unmuteYTPVolume();
            jQuery('#icon-volume').removeClass("glyphicon-volume-off");
            jQuery('#icon-volume').addClass("glyphicon-volume-up");
        }
    });
    jQuery('#yt-play').on("click", function() {
        if (jQuery('#icon-play').hasClass("glyphicon-play")) {
            jQuery('#bgndVideo').playYTP();
            jQuery('#icon-play').removeClass("glyphicon-play");
            jQuery('#icon-play').addClass("glyphicon-pause");
        } else {
            jQuery('#bgndVideo').pauseYTP();
            jQuery('#icon-play').removeClass("glyphicon-pause");
            jQuery('#icon-play').addClass("glyphicon-play");
        }
    });


//Function that loads the map markers.
function loadMapMarkers (theMap){

    //Example: GLASTONBURY -----------------
    //Setting the position of the Glastonbury map marker.
    var markerPositionGlastonbury = new google.maps.LatLng(43.358050, -2.192961);

    //Setting the icon to be used with the Glastonbury map marker.
    var markerIconGlastonbury = {
      url: 'http://toofestival.es/wp-content/themes/toofestival/assets/img/brand/TooFestival.png',
      //The size image file.
      size: new google.maps.Size(225, 120),
      //The point on the image to measure the anchor from. 0, 0 is the top left.
      origin: new google.maps.Point(0, 0),
      //The x y coordinates of the anchor point on the marker. e.g. If your map marker was a drawing pin then the anchor would be the tip of the pin.
      anchor: new google.maps.Point(189, 116)
    };

    //Setting the shape to be used with the Glastonbury map marker.
    var markerShapeGlastonbury = {
          coord: [12,4,216,22,212,74,157,70,184,111,125,67,6,56],
          type: 'poly'
    };

    //Creating the Glastonbury map marker.
    markerGlastonbury = new google.maps.Marker({
          //uses the position set above.
          position: markerPositionGlastonbury,
          //adds the marker to the map.
          map: theMap,
          title: 'Glastonbury Festival',
          //assigns the icon image set above to the marker.
          icon: markerIconGlastonbury,
          //assigns the icon shape set above to the marker.
          shape: markerShapeGlastonbury,
          //sets the z-index of the map marker.
          zIndex:102
    });

}


function LogoControl(controlDiv, map) {

  controlDiv.style.padding = '5px';

  var controlUI = document.createElement('div');
  controlUI.style.backgroundImage = 'url(http://toofestival.es/wp-content/themes/toofestival/assets/img/brand/TooFestival.png)';
  controlUI.style.width = '600px';
  controlUI.style.height = '116px';
  controlUI.style.cursor = 'pointer';
  controlUI.title = 'Click to set the map to Home';
  controlDiv.appendChild(controlUI);

  google.maps.event.addDomListener(controlUI, 'click', function() {
    map.setCenter(centerPos);
    map.setZoom(zoomLevel);
  });

}

/*
function em_maps_load_locations(el){
    var el = jQuery(el);
    var map_id = el.attr('id').replace('em-locations-map-','');
    var em_data = jQuery.parseJSON( el.nextAll('.em-locations-map-coords').first().text() );
    if( em_data == null ){
        var em_data = jQuery.parseJSON( jQuery('#em-locations-map-coords-'+map_id).text() );
    }
    maps_markers[map_id] = [];
    var marker_options = {};
    jQuery.getJSON(document.URL, em_data , function(data){
        if(data.length > 0){
            //define default options and allow option for extension via event triggers
              for (var i = 0; i < data.length; i++) {
                  if( !(data[i].location_latitude == 0 && data[i].location_longitude == 0) ){
                    var latitude = parseFloat( data[i].location_latitude );
                    var longitude = parseFloat( data[i].location_longitude );
                    var location = new google.maps.LatLng( latitude, longitude );
                    maps[map_id] = jQuery('.em-locations-map')
                      .gmap3({
                        center: [46.578498,2.457275],
                        zoom: 5,
                        scrollwheel: false,
                        });
                    //extend the default marker options
                    jQuery.extend(marker_options, {
                        position: location,
                        map: maps[map_id]
                    })
                    var marker = new google.maps.Marker(marker_options);
                    maps_markers[map_id].push(marker);
                    marker.setTitle(data[i].location_name);
                    var myContent = '<div class="em-map-balloon"><div id="em-map-balloon-'+map_id+'" class="em-map-balloon-content">'+ data[i].location_balloon +'</div></div>';
                    em_map_infobox(marker, myContent, maps[map_id]);
                  }
              }
              maps[map_id]
              .styledmaptype(
                "style1",
                [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]}],
                {name: "Style 1"}
              )
              .cluster({
                  size: 200,
                  markers: maps_markers[map_id],
                  cb: function (markers) {
                    if (markers.length > 1) {
                      if (markers.length < 20) {
                        return {
                          content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
                          x: -26,
                          y: -26
                        };
                      }
                      if (markers.length < 50) {
                        return {
                          content: "<div class='cluster cluster-2'>" + markers.length + "</div>",
                          x: -26,
                          y: -26
                        };
                      }
                      return {
                        content: "<div class='cluster cluster-3'>" + markers.length + "</div>",
                        x: -33,
                        y: -33
                      };
                    }
                  }
              })
            ;
        }
    });
}

function em_map_infobox(marker, message, map) {
  var iw = new google.maps.InfoWindow({ content: message });
  google.maps.event.addListener(marker, 'click', function() {
    if( infowindow ) infowindow.close();
    infowindow = iw;
    iw.open(map,marker);
  });
}
*/