<?php

/**
 * Custom functions
 */

function yoast_change_opengraph_type( $type ) {
    if ( is_singular() )
        return 'event';
}
add_filter( 'wpseo_opengraph_type', 'yoast_change_opengraph_type', 10, 1 );

/** Create custom #_CUSTOM_PLACEHOLDERS for Events Manager */
add_filter('em_event_output_placeholder', 'my_em_customs_placeholders', 1, 3);
function my_em_customs_placeholders($replace, $EM_Event, $result) {
    global $wp_query, $wp_rewrite;
    setlocale(LC_ALL,"es_ES");
    // Whether or not to strip HTML, if not be careful with the $length as you can cut off in the middle of tags
    $strip_HTML = true;

    // Max length of the excerpt (characters)
    $length = 120;

    // String to append to excerpt, if it is longer than the max length
    //$after = "... <a href='" + $EM_Event->output("#_EVENTLINK") + "'>Leer m&aacute;s</a>";
    $after = "...";

    switch ($result) {
        case '#_CUSTOMEXCERPT': // name of the placeholder
            // Get standard excerpt output
            $replace = $EM_Event->output("#_EVENTEXCERPT");

            // Strip all HTML
            /*
            if ($strip_HTML) {
                $replace = strip_tags($replace);
            }
            if (strlen($replace) > $length) {
                $replace = substr($replace, 0, $length);

                $replace .= $after;
            }

            $replace = force_balance_tags($replace);
             *
             */

            $excerpt_length =40;
            $excerpt_more = apply_filters('em_excerpt_more', '... <a href="'. $EM_Event->output("#_EVENTURL") .'" class="btn btn-info btn-xs more-info"><span class="glyphicon glyphicon-plus"></span> Info</a>');

            $replace = strip_shortcodes( $replace );
            $replace = str_replace(']]>', ']]&gt;', $replace);

            $replace = wp_trim_words( $replace, $excerpt_length, $excerpt_more );

            break; // end the case
        case '#_EVENTCUSTOMDATE':
            $replace = '<div class="box-date"><meta itemprop="startDate" content="' . $EM_Event->event_start_date . '"><meta itemprop="endDate" content="' . $EM_Event->event_end_date . '"><p>' . date("d", strtotime($EM_Event->event_start_date)) . '<span>' . date("M", strtotime($EM_Event->event_start_date)) . '</span></p></div>';
            break;
        case '#_EVENTCUSTOMDATEYARPP':
            $replace = '<div class="box-date"><p>' . date("d", strtotime($EM_Event->event_start_date)) . '<span>' . date("M", strtotime($EM_Event->event_start_date)) . '</span></p></div>';
            break;
        case '#_CUSTOMEVENTRATING':
            //$replace = '<div class="ratingevent">' . wp_gdsr_show_article_rating($EM_Event->post_id) . '</div>';
            $replace = '<div class="ratingeventthumb">' . do_shortcode('[starrater tpl=56 size="16" post='.$EM_Event->post_id.'] ') . '</div>';
            $replace = strip_shortcodes( $replace );
            break;
        case '#_CUSTOMEVENTRATINGYARPP':
            //$replace = '<div class="ratingevent">' . wp_gdsr_show_article_rating($EM_Event->post_id) . '</div>';
            $replace = '<div class="ratingeventthumb">' . do_shortcode('[starrater tpl=58 size="16" post='.$EM_Event->post_id.'] ') . '</div>';
            $replace = strip_shortcodes( $replace );
            break;
        case '#_EVENTVIEWS':
            $replace = getPostViews($EM_Event->post_id);
            break;
        case '#_EVENTBOOKMARKS':
            $replace = getPostBookmarks($EM_Event->post_id);
            break;
        case '#_EVENTDATES':
            $sd = $EM_Event->start;
            $ed = $EM_Event->end;
            if (!empty ($ed) && $sd != $ed ) {
              //Event has an end date and end date is different than start date
              if (date('Y', $sd) == date('Y', $ed)) {
                // Start and end are in same year
                if (date('n', $sd) == date('n', $ed)) { 
                  //Start and end are in the same month
                  $replace = date_i18n('j', $sd).'-'.date_i18n('j F', $ed);
                    if (date('j', $sd) == date('j', $ed)) {
                      //Start and end are on the same day
                      $replace = date_i18n('j F', $sd);
                    }
                } else {
                  //Start and end are in different months
                  $replace = date_i18n('j F', $sd).' - '.date_i18n('j F', $ed);
                }
              } else {
                //Start and end are in different years
                $replace = date_i18n('j F', $sd).' - '. date_i18n('j F', $ed);
              }
            } else {
              // No end date, or start and end date are the same
              $replace = date_i18n('j F', $sd);
            }
            break;
    }

    return $replace; //output the placeholder
}
add_filter('em_event_output_placeholder', 'events_manager_custom_thumbnails', 1, 3);
/**
* get event image as regular WordPress thumbnail
* (or any registered WordPress image size)
* @param string $result
* @param EM_Event $EM_Event
* @param string $placeholder
* @return string
*/
function events_manager_custom_thumbnails($result, $EM_Event, $placeholder) {
    // check a custom image placeholder, pick up size
    switch ($placeholder) {
        case '#_CUSTOMEVENTIMAGETHUMB':
            $size = 'thumbnail';
            $imageID = get_post_thumbnail_id($EM_Event->post_id);
            if ($imageID) {
                $a=array("itemprop"=>"image");
                $result = wp_get_attachment_image($imageID, $size, $icon = false, $a);
            }
            break;
        case '#_EVENTIMAGETHUMBURL':
            $size = 'thumbnail';
            $imageID = get_post_thumbnail_id($EM_Event->post_id);
            if ($imageID) {
                $result = wp_get_attachment_image_url($imageID, $size);
            }
            break;
        case '#_CUSTOMEVENTIMAGEMEDIUM':
            $size = 'medium';
            $imageID = get_post_thumbnail_id($EM_Event->post_id);
            if ($imageID) {
                $a=array("itemprop"=>"image");
                $result = wp_get_attachment_image($imageID, $size, $icon = false, $a);
            }
            break;
        case '#_CUSTOMEVENTIMAGEYARPP':
            $size = 'medium';
            $imageID = get_post_thumbnail_id($EM_Event->post_id);
            if ($imageID) {
                $result = wp_get_attachment_image($imageID, $size, $icon = false);
            }
            break;
        default:
            $size = false;
    }

    return $result;
}
add_filter('em_category_output_placeholder', 'events_manager_custom_category', 1, 3);
/**
* get event image as regular WordPress thumbnail
* (or any registered WordPress image size)
* @param string $result
* @param EM_Event $EM_Event
* @param string $placeholder
* @return string
*/
function events_manager_custom_category($replace, $EM_Category, $placeholder) {
    switch ($placeholder) {
        case '#_CATEGORYCOUNT':
            $term = get_term( $EM_Category->term_id, 'event-categories' );
            $count = $term->count;
            $replace = $count;
            break;
    }
    return $replace;
}

add_filter("gdsr_widget_image_url_prepare", "gdsr_filter_widget_image_url", 10, 3);

function gdsr_filter_widget_image_url($url, $widget, $EM_Event) {
 $imageID = get_post_thumbnail_id($EM_Event->post_id);
 if ($imageID) {
    $result = wp_get_attachment_image($imageID, 'thumbnail');
 }
return $result;
}
function countEventsByCountry($country){
    $locations = EM_Locations::get(array('scope'=>'future', 'country'=>$country));
    $count = count($locations);
    return $count;
}
function getPostBookmarks($postID){
    return do_shortcode('[favorite_count post_id="' . $postID . '"]');
}
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function cmpPostViews($a,$b)
{
    if($a['post_views']==$b['post_views']) return 0;
    return $a['post_views'] < $b['post_views']?1:-1;
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


/* WP REST API */

add_action( 'init', 'wpsd_add_event_args', 30 );
function wpsd_add_event_args() {
    global $wp_post_types;
    $wp_post_types['event']->show_in_rest = true;
    $wp_post_types['event']->rest_base = 'events';
    $wp_post_types['event']->rest_controller_class = 'WP_REST_Posts_Controller';
    $wp_post_types['location']->show_in_rest = true;
    $wp_post_types['location']->rest_base = 'locations';
    $wp_post_types['location']->rest_controller_class = 'WP_REST_Posts_Controller';
}

add_action( 'init', 'event_categories_rest_support', 25 );
function event_categories_rest_support() {
    global $wp_taxonomies;

    //be sure to set this to the name of your taxonomy!
    $taxonomy_name = 'event-categories';

    if ( isset( $wp_taxonomies[ $taxonomy_name ] ) ) {
        $wp_taxonomies[ $taxonomy_name ]->show_in_rest = true;
        $wp_taxonomies[ $taxonomy_name ]->rest_base = $taxonomy_name;
        $wp_taxonomies[ $taxonomy_name ]->rest_controller_class = 'WP_REST_Terms_Controller';
    }
}
add_filter( 'rest_query_vars', 'test_query_vars' );
function test_query_vars ( $vars ) {
    $vars[] = 'meta_query';
    //$vars = array_merge( $vars, array('meta_key', 'meta_value', 'meta_compare') );
    return $vars;
}
function slug_get_event_meta( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
add_action( 'rest_api_init', 'slug_register_event' );
function slug_register_event() {
    register_rest_field( 'event',
        '_event_start_date',
        array(
            'get_callback'    => 'slug_get_event_meta',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'event',
        '_event_end_date',
        array(
            'get_callback'    => 'slug_get_event_meta',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'event',
        '_location_id',
        array(
            'get_callback'    => 'slug_get_event_meta',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'event',
        'video',
        array(
            'get_callback'    => 'slug_get_event_meta',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'event',
        'poster',
        array(
            'get_callback'    => 'slug_get_event_meta',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function event_route( $data ) {
    global $wpdb;
    $events_table = $wpdb->prefix . "em_events";
    $locations_table = $wpdb->prefix . "em_locations";
    $pictures_table = $wpdb->prefix . "tf_ngg_pictures";
    $qry = "SELECT ". $events_table . ".event_id, " . $events_table . ".post_id, " . $events_table . ".event_name, " . $events_table . ".event_start_date, " . $events_table . ".event_end_date, " . $events_table . ".event_slug, "
            . $locations_table . ".location_name, " . $locations_table . ".location_town, "  . $locations_table . ".location_country, " . $locations_table . ".location_latitude, " . $locations_table . ".location_longitude
            FROM ". $events_table . "
            INNER JOIN " . $locations_table . " ON " . $events_table . ".location_id=" . $locations_table . ".location_id
            WHERE 1=1 ";
            if($data['id']){
                $qry  .= " AND ". $events_table . ".event_id = " . $data['id'];
            }

            $qry .= " ORDER BY ". $events_table . ".event_start_date ASC";
    $events = $wpdb->get_results( $qry );

    if ( empty( $events ) ) {
        return null;
    }

    for ($i=0; $i < count($events) ; $i++) {
        # code...
        $event = $events[$i];
        // Custom Attributes for Event
        $postID = $event->post_id;
        $eventsm = EM_Events::get(array("event" => $event->event_id, "scope" => 'all' ));
        foreach($eventsm as $EM_Event){
            $video = $EM_Event->event_attributes['video'];
            $poster = $EM_Event->event_attributes['poster'];
            $weblink = $EM_Event->event_attributes['weblink'];
            $ticket = $EM_Event->event_attributes['ticket'];
            $gallery = $EM_Event->event_attributes['gallery'];
            $image = wp_get_attachment_url(get_post_thumbnail_id($EM_Event->post_id));
            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $EM_Event->post_id ), "thumbnail" );
            //echo var_dump($EM_Event);
        }
        // Get Event Categories
        $post_categories = wp_get_object_terms($event->post_id, 'event-categories', $args);
        $cats = array();
        foreach($post_categories as $c){
            $cat = get_category( $c );
            $cats[] = array( 'id' => $cat->term_id, 'name' => $cat->name, 'slug' => $cat->slug );
        }
        // Get Event Gallery and Posters
        $post_gallery = $wpdb->get_results( 'SELECT * FROM tf_ngg_gallery WHERE gid = ' . $gallery);
        foreach($post_gallery as $pgallery){
            $gallery_path = $pgallery->path;
        }
        $post_posters = $wpdb->get_results( 'SELECT * FROM tf_ngg_pictures WHERE galleryid = ' . $gallery . ' AND exclude = 0 ORDER BY sortorder');
        $posters = array();
        foreach($post_posters as $cartel){
            $posters[] = array('filename'=> $cartel->filename);
        }
        $event = get_object_vars($event);
        $event["video"] = $video;
        $event["poster"] = $poster;
        $event["image"] = $image;
        $event["weblink"] = $weblink;
        $event["ticket"] = $ticket;
        $event["thumbnail"] = $thumbnail;
        $event["categories"] = $cats;
        $event["gallery"] = $gallery;
        $event["gallery_path"] = $gallery_path;
        $event["posters"] = $posters;
        $event["post_views"] = getPostViews($postID);
        $events[$i]=$event;
    }
    return $events;
}
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function events_route(  WP_REST_Request $request ) {
    global $wpdb;
    // You can access parameters via direct array access on the object:
    if($request['scope']){
        $scope = $request['scope'];
    }else{
        $scope = null;
    }
    if($request['date']){
        $date = $request['date'];
    }else{
        $date = null;
    }
    if($request['category']){
        $category = $request['category'];
    }else{
        $category = null;
    }
    if($request['country']){
        $country = explode(',',$request['country']);
    }else{
        $country = null;
    }
    if($request['search']){
        $search = $request['search'];
    }else{
        $search = null;
    }
    if($request['per_page']){
        $per_page = $request['per_page'];
    }else{
        $per_page = null;
    }
    if($request['page']){
        $offset = ($request['page'] - 1)  * $per_page;
    }else{
        $offset = null;
    }
    if($request['orderby']){
        $orderby = $request['orderby'];
    }else{
        $orderby = 'date';
    }


    $events_table = $wpdb->prefix . "em_events";
    $locations_table = $wpdb->prefix . "em_locations";

    $qry = "SELECT ". $events_table . ".event_id, " . $events_table . ".post_id, " . $events_table . ".event_name, " . $events_table . ".event_start_date, " . $events_table . ".event_end_date, " . $events_table . ".event_slug, "
            . $locations_table . ".location_name, " . $locations_table . ".location_town, "  . $locations_table . ".location_country, " . $locations_table . ".location_latitude, " . $locations_table . ".location_longitude, post_views_count.meta_value as post_views, simplefavorites_count.meta_value as simplefavorites 
            FROM ". $events_table . "
            INNER JOIN " . $locations_table . " ON " . $events_table . ".location_id=" . $locations_table . ".location_id 
            LEFT JOIN " . $wpdb->postmeta . " AS post_views_count ON (tf_em_events.post_id = post_views_count.post_id AND post_views_count.meta_key='post_views_count')
            LEFT JOIN " . $wpdb->postmeta . " AS simplefavorites_count ON (tf_em_events.post_id = simplefavorites_count.post_id AND simplefavorites_count.meta_key='simplefavorites_count')";

            if(!is_null($category)){
                $qry .= " LEFT JOIN tf_posts ON (tf_em_events.post_id = tf_posts.ID)
                          LEFT JOIN tf_term_relationships ON (tf_posts.ID = tf_term_relationships.object_id)
                          LEFT JOIN tf_term_taxonomy ON (tf_term_relationships.term_taxonomy_id = tf_term_taxonomy.term_taxonomy_id)
                          LEFT JOIN tf_terms ON (tf_term_taxonomy.term_id = tf_terms.term_id) ";
            }
            $qry .= " WHERE 1=1 ";
            if(!is_null($scope)){
                if ($scope=='future'){
                    $qry .= " AND (" . $events_table . ".event_start_date >= '" . date("Y/m/d") . "'";
                    $qry .= " OR " . $events_table . ".event_end_date >= '" . date("Y/m/d") . "')";
                } else if($scope=='today'){
                    $qry .= " AND '" .  date("Y/m/d") . "' BETWEEN " . $events_table . ".event_start_date AND " . $events_table . ".event_end_date";
                } else if($scope=='tomorrow'){
                    $qry .= " AND '" .  date("Y/m/d", strtotime('tomorrow')) . "' BETWEEN " . $events_table . ".event_start_date AND " . $events_table . ".event_end_date";
                } else if($scope=='week'){
                    $qry .= " AND '" .  date("Y/m/d", strtotime('tomorrow')) . "' BETWEEN " . $events_table . ".event_start_date AND " . $events_table . ".event_end_date";
                } else if($scope=='month'){
                    $qry .= " AND '" .  date("Y/m/d", strtotime('tomorrow')) . "' BETWEEN " . $events_table . ".event_start_date AND " . $events_table . ".event_end_date";
                }
            }
            if(!is_null($date)){
                $qry .= " AND '" . date("Y/m/d", strtotime($date)) . "' BETWEEN " . $events_table . ".event_start_date AND " . $events_table . ".event_end_date";
            }
            if(!is_null($search)){
                $qry .= " AND ". $events_table . ".event_name like '%" . $search. "%'";
            }
            if(!is_null($country)){
                $qry .= " AND ( ";
                for($i=0; $i < count($country) ; $i++){
                    $qry .= $locations_table . ".location_country = '" . $country[$i] . "'";
                    if(($i+1)<count($country)){
                        $qry .= " OR " ;
                    }
                }
                $qry .= " ) " ;
            }
            if(!is_null($category)){
                $qry .= " AND tf_terms.term_id IN (" . $category . ")";
                $qry .= " AND tf_term_taxonomy.taxonomy = 'event-categories' ";
            }
            if($orderby=='date'){
                $qry .= " ORDER BY ". $events_table . ".event_start_date ASC ";
            } else if($orderby=='popularity'){
                $qry .= " ORDER BY cast(post_views_count.meta_value as unsigned) DESC ";
            }

            if(!is_null($per_page)){
                $qry .= " LIMIT " . $per_page;
            }
            if(!is_null($offset)){
                $qry .= " OFFSET " . $offset;
            }

    //echo $qry . "\n";
    $events = $wpdb->get_results( $qry );

    if ( empty( $events ) ) {
        return null;
    }

    for ($i=0; $i < count($events) ; $i++) {
        # code...
        $event = $events[$i];
        $postID = $event->post_id;
        // Custom Attributes for Event
        $eventsm = EM_Events::get(array("event" => $event->event_id, "scope" => 'all'));
        foreach($eventsm as $EM_Event){
            $video = $EM_Event->event_attributes['video'];
            $poster = $EM_Event->event_attributes['poster'];
            $weblink = $EM_Event->event_attributes['weblink'];
            $ticket = $EM_Event->event_attributes['ticket'];
            $gallery = $EM_Event->event_attributes['gallery'];
            $image = wp_get_attachment_url(get_post_thumbnail_id($EM_Event->post_id));
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id( $EM_Event->post_id ), "thumbnail" );
            //echo var_dump($EM_Event);
        }
        // Get Event Categories
        $post_categories = wp_get_object_terms($event->post_id, 'event-categories', $args);
        $cats = array();
        foreach($post_categories as $c){
            $cat = get_category( $c );
            $cats[] = array( 'id' => $cat->term_id, 'name' => $cat->name, 'slug' => $cat->slug );
        }
        // Get Event Gallery and Posters
        $post_gallery = $wpdb->get_results( 'SELECT * FROM tf_ngg_gallery WHERE gid = ' . $gallery);
        foreach($post_gallery as $pgallery){
            $gallery_path = $pgallery->path;
        }
        $post_posters = $wpdb->get_results( 'SELECT * FROM tf_ngg_pictures WHERE galleryid = ' . $gallery);
        $posters = array();
        foreach($post_posters as $cartel){
            $posters[] = array('filename'=> $cartel->filename);
        }
        $event = get_object_vars($event);
        $event["video"] = $video;
        $event["poster"] = $poster;
        $event["weblink"] = $weblink;
        $event["ticket"] = $ticket;
        $event["image"] = $image;
        $event["thumbnail"] = $thumbnail;
        $event["categories"] = $cats;
        $event["gallery"] = $gallery;
        $event["gallery_path"] = $gallery_path;
        $event["posters"] = $posters;
        $event["post_views"] = getPostViews($postID);
        $events[$i]=$event;
    }
    /*
    if($orderby=='popularity')
        usort($events, 'cmpPostViews');
    */
    return $events;
}
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function events_count_route(  WP_REST_Request $request ) {
    global $wpdb;
    // You can access parameters via direct array access on the object:
    if($request['scope']){
        $scope = $request['scope'];
    }else{
        $scope = null;
    }
    if($request['category']){
        $category = explode(',',$request['category']);
    }else{
        $category = null;
    }
    if($request['country']){
        $country = explode(',',$request['country']);
    }else{
        $country = null;
    }
    if($request['region']){
        $region = ucfirst($request['region']);
    }else{
        $region = null;
    }
    if($request['search']){
        $search = $request['search'];
    }else{
        $search = null;
    }
    $events = EM_Events::count(array("scope" => $scope, "category" => $category, "country" => $country, "region" => $region, "search" => $search));
    // Create the response object
    $response = new WP_REST_Response( $events );
    // Add a custom status code
    $response->set_status( 201 );
    // Add a custom header
    $response->header( 'X-WP-Total', $events );
    return $events;
}
function categories_route( $data ) {
    /*
    if (class_exists('EM_Categories')){
        $categories = EM_Categories::get(array('orderby'=>'name', 'order' => 'ASC', 'hide_empty'=>0));
    }
    */
    $results = get_terms(EM_TAXONOMY_CATEGORY, $term_args);
    //Make returned results EM_Category objects
    $results = (is_array($results)) ? $results:array();
    $categories = array();
    foreach ( $results as $category ){
        $em_category = new EM_Category($category);
        if( empty($em_category->image_url) ){
            global $wpdb;
            $image_url = $wpdb->get_var("SELECT meta_value FROM " . EM_META_TABLE . " WHERE object_id='" . $em_category->term_id. "' AND meta_key='category-image' LIMIT 1");
            $em_category->image_url = ($image_url != '') ? $image_url:'';
        }
        $categories[$category->term_id] = $em_category;
    }

    return $categories;
}
function locations_route( $data ) {
   if (class_exists('EM_Locations')){
        $locations = EM_Locations::get( array('orderby'=>'name', 'order' => 'ASC') );
    }
    return $locations;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'eventsmanager/v1', '/events', array(
        'methods' => 'GET',
        'callback' => 'events_route',
    ) );
    register_rest_route( 'eventsmanager/v1', '/eventstotal', array(
        'methods' => 'GET',
        'callback' => 'events_count_route',
    ) );
    register_rest_route( 'eventsmanager/v1', '/events/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'event_route',
    ) );
    register_rest_route( 'eventsmanager/v1', '/categories', array(
        'methods' => 'GET',
        'callback' => 'categories_route',
    ) );
    register_rest_route( 'eventsmanager/v1', '/locations', array(
        'methods' => 'GET',
        'callback' => 'locations_route',
    ) );
} );

/* JSON API */
function add_taxonomy_controller($controllers) {
  $controllers[] = 'Taxonomy';
  return $controllers;
}
add_filter('json_api_controllers', 'add_taxonomy_controller');

function set_taxonomy_controller_path() {
  return get_stylesheet_directory() . '/lib/json-api-taxonomy-index.php';
}
add_filter('json_api_taxonomy_controller_path', 'set_taxonomy_controller_path');

function add_events_controller($controllers) {
  $controllers[] = 'Events';
  return $controllers;
}
add_filter('json_api_controllers', 'add_events_controller');

function set_events_controller_path() {
  return get_stylesheet_directory() . "/lib/JSON_API_Events_Controller.php";
}
add_filter('json_api_events_controller_path', 'set_events_controller_path');