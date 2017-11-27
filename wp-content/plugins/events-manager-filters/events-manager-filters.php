<?php
/**
 * Plugin Name: Events Manager Filters
 * Plugin URI: http://toofestival.es
 * Description: This is a plugin that allows us to filter EM's events by ajax
 * Version: 1.0.0
 * Author: Luis Rodriguez
 * Author URI: http://toofestival.es
 * License: GPL2
 */

add_action( 'wp_enqueue_scripts', 'ajax_map_enqueue_scripts' );
function ajax_map_enqueue_scripts() {
	wp_enqueue_script( 'events-manager-filters', plugins_url( '/js/events-manager-filters.js', __FILE__ ), array('jquery'), '1.5', true );
	wp_localize_script( 'events-manager-filters', 'events_manager_filters', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}

add_action( 'wp_ajax_nopriv_em_filter_map', 'em_filter_map' );
add_action( 'wp_ajax_em_filter_map', 'em_filter_map' );

function em_filter_map() {
	echo do_shortcode('[locations_map category="' . $_GET["category"] . '" country="' . $_GET["country"] . '" region="' . $_GET["region"] . '" scope="' . $_GET["scope"] . '" search="' . $_GET["search"] . '" limit=500]');
	die();
}

add_action( 'wp_ajax_nopriv_em_filter_grid', 'em_filter_grid' );
add_action( 'wp_ajax_em_filter_grid', 'em_filter_grid' );

function em_filter_grid() {
	echo do_shortcode('[events_list category="' . $_GET["category"] . '" country="' . $_GET["country"] . '" region="' . $_GET["region"] . '" scope="' . $_GET["scope"] . '" search="' . $_GET["search"] . '" page="' . $_GET["my_listings_current_page"] . '" pagination=1]');
	die();
}

add_action( 'wp_ajax_nopriv_em_filter_list', 'em_filter_list' );
add_action( 'wp_ajax_em_filter_list', 'em_filter_list' );

function em_filter_list() {
	echo do_shortcode('[events_list category="' . $_GET["category"] . '" country="' . $_GET["country"] . '" region="' . $_GET["region"] . '" scope="' . $_GET["scope"] . '" search="' . $_GET["search"] . '" page="' . $_GET["my_listings_current_page"] . '" pagination=1 ]
			<div class="col-sm-12">
                <div class="listing-list-container">
                    <div class="list-view-image" style="background-image: url(\'#_EVENTIMAGEURL\');"></div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8" style="background-color: #fff;">
                            <div class="listing-list-content-block">
                                <h4><a href="#_EVENTURL">#_EVENTNAME</a></h4>
                                <span class="listing-container-tagline">
                                    <i class="fa fa-map-marker"></i>
                                    #_LOCATIONNAME -
                                    #_LOCATIONADDRESS,
                                    #_LOCATIONTOWN,
                                    #_LOCATIONSTATE
                                    #_LOCATIONPOSTCODE,
                                    #_LOCATIONCOUNTRY
                                </span>
                                <div class="listing-container-block-body">
                                    <div class="listing-container-dates">
                                        <i class="fa fa-calendar"></i>
                                        <span>#_EVENTDATES</span>
                                    </div>
                                    <div class="listing-container-views">
                                        <i class="fa fa-eye"></i>
                                        <span>#_EVENTVIEWS</span>
                                    </div>
                                    <div class="listing-container-bookmarks">
                                        <i class="fa fa-heart"></i>
                                        <span>#_EVENTBOOKMARKS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        [/events_list]');
	die();
}