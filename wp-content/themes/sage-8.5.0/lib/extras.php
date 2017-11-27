<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
* Custom functions
*/

function yoast_change_opengraph_type( $type ) {
if ( is_singular() )
return 'event';
}
add_filter( 'wpseo_opengraph_type', __NAMESPACE__ . '\\yoast_change_opengraph_type' );


/** Create custom #_CUSTOM_PLACEHOLDERS for Events Manager */
add_filter('em_event_output_placeholder', __NAMESPACE__ . '\\my_em_customs_placeholders', 1, 3);
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
            $replace = '<i class="fa fa-eye"></i>&nbsp;&nbsp;' . getPostViews($EM_Event->post_id);
            break;
    }

    return $replace; //output the placeholder
}

add_filter('em_event_output_placeholder', __NAMESPACE__ . '\\events_manager_custom_thumbnails',1,3);
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

add_filter("gdsr_widget_image_url_prepare",__NAMESPACE__ . '\\gdsr_filter_widget_image_url',10,3);

function gdsr_filter_widget_image_url($url, $widget, $EM_Event) {
 $imageID = get_post_thumbnail_id($EM_Event->post_id);
 if ($imageID) {
    $result = wp_get_attachment_image($imageID, 'thumbnail');
 }
return $result;
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
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', __NAMESPACE__ . '\\adjacent_posts_rel_link_wp_head',10,0);