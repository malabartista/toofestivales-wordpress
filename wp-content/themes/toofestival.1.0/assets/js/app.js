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
 
function mostrarMes() {
    var e = document.getElementById("select-meses").value;
    if (0 == e) for (i = 1; i <= 13; i++) document.getElementById("festivales-" + i).style.display = "inline"; else for (document.getElementById("festivales-" + e).style.display = "inline", 
    i = 1; i <= 13; i++) i != e && (document.getElementById("festivales-" + i).style.display = "none");
}


jQuery(document).ready(function($) {
    $('#carousel-home').carousel({
        interval: 4000
    });

    $('.em-pagination').wrap("<div class='pagination'></div>");

    $('.ui-icon-circle-triangle-e').removeClass("ui-icon").removeClass("ui-icon-circle-triangle-e").addClass("glyphicon").addClass("glyphicon-chevron-right");
    
    // grid isotope filter buttons
    $("#all-fests").click(function() {
        $('#posts').isotope({filter: '*'})
    });
    $("#abril-fests").click(function() {
        $('#posts').isotope({
            filter: function(){    
                var name = $(this).find('.big-date').text();    
                return name.match( /Apr$/ );
            }
        })
    });
    $("#mayo-fests").click(function() {
        $('#posts').isotope({
            filter: function(){    
                var name = $(this).find('.big-date').text();    
                return name.match( /May$/ );
            }
        })
    });
    $("#junio-fests").click(function() {
        $('#posts').isotope({
            filter: function(){    
                var name = $(this).find('.big-date').text();    
                return name.match( /Jun$/ );
            }
        })
    });
    $("#julio-fests").click(function() {
        $('#posts').isotope({
            filter: function(){    
                var name = $(this).find('.big-date').text();    
                return name.match( /Jul$/ );
            }
        })
    });
    $("#agosto-fests").click(function() {
        $('#posts').isotope({
            filter: function(){    
                var name = $(this).find('.big-date').text();    
                return name.match( /Aug$/ );
            }
        })
    });
    $("#septiembre-fests").click(function() {
        $('#posts').isotope({
            filter: function(){    
                var name = $(this).find('.big-date').text();    
                return name.match( /Sep$/ );
            }
        })
    });
    $("a.conditions_offer").click(function() {
        if ($(this).hasClass('expanded')) {
            $(this).addClass('collapsed').removeClass('expanded');
            $(this).parent().next().show()
            $(this).parent().parent().prev().height($(this).parent().parent().height() + 10)
        } else {
            var altura = '';
            if ($(this).hasClass('offer')) {
                altura = '77px';
            } else {
                altura = '67px';
            }
            $(this).addClass('expanded').removeClass('collapsed');
            $(this).parent().next().hide();
            $(this).parent().parent().prev().height(altura)
        }
        return false
    });
    $("[rel='tooltip']").tooltip();    
    $('#scroll-to').tooltip();
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 150) {
            $('#header-top-navbar').addClass('navbar-fixed-top');
        } else {
            $('#header-top-navbar').removeClass('navbar-fixed-top');
        }
    });
    
    $(document).bind('em_maps_location_hook', function( e, map, infowindow, marker ){
        map.set('scrollwheel', false);
    });
    $(document).bind('em_maps_locations_hook', function( e, map, infowindow, marker ){
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
         
        //map.setCenter(new google.maps.LatLng(28.70, -127.50));
    });
    $('.em-location-map-container').css("width", "100%");
    $('.em-location-map-container').removeClass("thumbnail");
    $('#em-location-data .em-location-map-container').css("width", "50%");




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

    
    if(!isMobile.any()){
        // global vars
        // carousel-home all window
        var winWidth = jQuery(window).width();
        var winHeight = jQuery(window).height();
        jQuery('.header-bar-control .glyphicon').css({
            'margin-top': winHeight - 120,
        });
        jQuery('#carousel-home .item').css({
            'width': '100%',
            'height': winHeight - 60,
        });
        jQuery('#carousel-home').css({
            'width': '100%',
            'height': winHeight - 60,
        });

        jQuery(window).resize(function(){
            jQuery('#carousel-home .item').css({
                'width': '100%',
                'height': jQuery(window).height() - 60,
            });
            jQuery('#carousel-home').css({
                'width': '100%',
                'height': jQuery(window).height() - 60,
            });
            jQuery('.header-bar-control .glyphicon').css({
                'margin-top': jQuery(window).height() - 120,
            });
        }); 
    }
});


/*
jQuery(window).load(function () {
    // Takes the gutter width from the bottom margin of .post
    var gutter = parseInt(jQuery('.post').css('marginBottom'));
    var container = jQuery('#posts');
 
    // Creates an instance of Masonry on #posts
    container.masonry({
        gutter: gutter,
        itemSelector: '.post',
        columnWidth: '.post'
    });
    
    // This code fires every time a user resizes the screen and only affects .post elements
    // whose parent class isn't .container. Triggers resize first so nothing looks weird.
    jQuery(window).bind('resize', function () {
        if (!jQuery('#posts').parent().hasClass('container')) {
            // Resets all widths to 'auto' to sterilize calculations
            post_width = jQuery('.post').width() + gutter;
            jQuery('#posts, body > #grid').css('width', 'auto');
            
            // Calculates how many .post elements will actually fit per row. Could this code be cleaner?
            posts_per_row = jQuery('#posts').innerWidth() / post_width;
            floor_posts_width = (Math.floor(posts_per_row) * post_width) - gutter;
            ceil_posts_width = (Math.ceil(posts_per_row) * post_width) - gutter;
            posts_width = (ceil_posts_width > jQuery('#posts').innerWidth()) ? floor_posts_width : ceil_posts_width;
            if (posts_width == jQuery('.post').width()) {
                posts_width = '100%';
            }
            
            // Ensures that all top-level elements have equal width and stay centered
            jQuery('#posts, #grid').css('width', posts_width);
            jQuery('#grid').css({'margin': '0 auto'});
        
        }
    }).trigger('resize');

});
*/


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


    // Other type of Custom
    /*
    var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
    var marker = new google.maps.Marker({
        position: myLatlng,
        icon: 'http://toofestival.es/wp-content/themes/toofestival/assets/img/brand/TooFestival.png',
        title:"Hello World!"
    });
    marker.setMap(map);
    */
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
    map.setCenter(centerPos)
    map.setZoom(zoomLevel)
  });
 
}

