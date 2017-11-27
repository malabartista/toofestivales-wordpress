<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
<div class="container">
  <div class="row">
    <div class="col-sm-8"><?php echo do_shortcode('[contact-form-7 id="732" title="Contacta con nosotros"]');?></div>
    <div class="col-sm-4">
      <div class="map-container-contact">
        <h4>Estamos por aquí</h4>
        <i class="fa fa-envelope"></i> toofestival.es@gmail.com
        <div id="map-contact"></div>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
          function initialize() {
            var mapCanvas = document.getElementById('map-contact');
            var mapOptions = {
              center: new google.maps.LatLng(40.623533, -3.700795),
              zoom: 5,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);
            loadMapMarkersContact(map);
          }
            function loadMapMarkersContact (theMap){
                var markerPositionGlastonbury = new google.maps.LatLng(39.488347, 3.022838);
                var markerIconGlastonbury = {
                  url: '../wp-content/themes/toofestival/assets/img/maps/furgovw.png',
                  size: new google.maps.Size(225, 120),
                  origin: new google.maps.Point(0, 0),
                  anchor: new google.maps.Point(189, 116)
                };
                var markerShapeGlastonbury = {
                      coord: [12,4,216,22,212,74,157,70,184,111,125,67,6,56],
                      type: 'poly'
                };
                //Creating the Glastonbury map marker.
                markerGlastonbury = new google.maps.Marker({
                      position: markerPositionGlastonbury,
                      map: theMap,
                      title: 'Estamos aqui',
                      icon: markerIconGlastonbury,
                      shape: markerShapeGlastonbury,
                      zIndex:102
                });
            }
          google.maps.event.addDomListener(window, 'load', initialize);
        </script>
      </div>
    </div>
  </div>
</div>