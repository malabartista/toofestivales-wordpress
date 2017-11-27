<?php

// 1. The class name must match the filename (i.e., "foo.php" for JSON_API_Foo_Controller)
// 2. Save this in your themes folder
// 3. Activate your controller under Settings > JSON API

class JSON_API_Events_Controller {

  //Events by Category
  public function get_events() {
    global $json_api;

    $today = date( 'Y-m-d' );

    $query = array(
      'ignore_sticky_posts' => true,
      'numberposts' => -1,
      'post_type' => 'event',
      'orderby' => 'date',
      'order' => 'DESC'
    );
    return array(
      'posts' => $json_api->introspector->get_posts($query)
    );
  }

  public function get_category_events() {
    global $json_api;

    $today = getdate();
    $query = array();

    $catID  = $json_api->query->get('catid');
    if ( $catID ) {
         $query = array(
            'ignore_sticky_posts' => true,
            'numberposts' => -1,
            'post_type' => 'event',
            'orderby' => 'date',
            'order' => 'asc',
            'tax_query' => array(
                array(
                  'taxonomy' => 'event-categories',
                  'field'    => 'tag_ID',
                  'terms'    => $catID,
                ),
              )
          );
          return array(
            'posts' => $json_api->introspector->get_posts($query)
          );
    } else {
        $json_api->error("Include 'catid' var in your request.");
    }
    return array(
      'posts' => $json_api->introspector->get_posts($query)
    );
  }

  //
  public function get_locations() {
    global $json_api;

    $query = array(
      'ignore_sticky_posts' => true,
      'numberposts' => -1,
      'post_type' => 'location'
    );
    return array(
      'posts' => $json_api->introspector->get_posts($query)
    );
  }
}

?>