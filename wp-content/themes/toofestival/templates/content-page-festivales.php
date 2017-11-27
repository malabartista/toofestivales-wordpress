<?php
    $category = $_GET["category"];
    $country = $_GET["country"];
    $scope = $_GET["scope"];
    $search = $_GET["search"];
    if (empty($scope)){
        $scope = "future";
    }
?>
<div class="container box">
    <section class="row">
        <div class="col-sm-12">
            <div class="item-block-title-events">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="full">
                            <h4>Todos los festivales</h4>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="full">
                            <span id="show-map-button" data-rel="tooltip" rel="tooltip" title="Show Map"><i class="fa fa-map-marker"></i></span>
                            <span id="show-list-button" data-rel="tooltip" rel="tooltip" title="List View"><i class="fa fa-th-list"></i></span>
                            <span id="show-grid-button" data-rel="tooltip" rel="tooltip" title="Grid View"><i class="fa fa-th-large"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="widget-container widget_search">
                <form id="td-filter-listings" type="post" action="http://toofestival.es/festivales/">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="page-title-aright query-results-count">
                                <span class="pins-load hide"><i class="fa fa-spinner fa-spin"></i></span>
                                <span class="pins-total"><?php echo EM_Events::count(array("scope" => $scope, "category" => $category, "country" => $country, "search" => $search));?></span> Festivales encontrados
                            </span>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="search" id="search" value="" class="input-textarea" placeholder="Festival,...">
                        </div>
                        <div class="col-sm-12">
                            <select id="scope" name="scope">
                                <option value="future">Cuándo</option>
                                <option value="today" <?php if ($scope == 'today' ) echo 'selected' ; ?>>Hoy</option>
                                <option value="tomorrow" <?php if ($scope == 'tomorrow' ) echo 'selected' ; ?>>Mañana</option>
                                <option value="month" <?php if ($scope == 'month' ) echo 'selected' ; ?>>Este mes</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <?php
                                    EM_Object::ms_global_switch(); //in case in global tables mode of MultiSite, grabs main site categories, if not using MS Global, nothing happens
                                    wp_dropdown_categories(array(
                                        'hide_empty' => 0,
                                        'orderby' =>'name',
                                        'name' => 'category',
                                        'hierarchical' => true,
                                        'taxonomy' => EM_TAXONOMY_CATEGORY,
                                        'selected' => $category,
                                        'show_option_none' => 'Música',
                                        'option_none_value'=> 0,
                                        'class'=>'em-events-search-category'
                                    ));
                                    EM_Object::ms_global_switch_back(); //if switched above, switch back
                                ?>
                        </div>
                        <div class="col-sm-12">
                            <select id="country" name="country" class="em-search-country em-events-search-country">
                                <option value="">Dónde</option>
                                <?php
                                //get the counties from locations table
                                global $wpdb;
                                $countries = em_get_countries();
                                $em_countries = $wpdb->get_results("SELECT DISTINCT location_country FROM ".EM_LOCATIONS_TABLE." WHERE location_country IS NOT NULL AND location_country != '' AND location_status=1 ORDER BY location_country ASC", ARRAY_N);
                                $ddm_countries = array();
                                //filter out location countries so they're valid records (hence no sanitization)
                                foreach($em_countries as $em_country){
                                    $ddm_countries[$em_country[0]] = $countries[$em_country[0]];
                                }
                                asort($ddm_countries);
                                foreach( $ddm_countries as $country_code => $country_name ):
                                //we're not using esc_ functions here because values are hard-coded within em_get_countries() 
                                ?>
                                <option value="<?php echo $country_code; ?>"<?php echo (!empty($country) && $country == $country_code) ? ' selected="selected"':''; ?>><?php echo $country_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="full-width-buttons col-sm-12">
                            <button class="td-buttom" id="submit-filter" name="submit" type="submit"><i class="fa fa-check"></i>Actualizar</button>
                            <button class="td-buttom reset-country reset-category reset-scope" id="reset-filter" name="submit" type="submit" style="margin-bottom: 0!important"><i class="fa fa-times"></i>Reset</button>
                        </div>
                    </div>
                    <input type="hidden" id="my_listings_current_page" name="my_listings_current_page" value="1">
                    <input type="hidden" id="content_type" name="content_type" value="">
                    <input type="hidden" id="action" name="action" value="">
                </form>

            </div>
            <div class="clearfix widget-container" style="padding: 30px;">
                <!-- Anuncio en Festival Sidebar -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-6980635843842377"
                     data-ad-slot="8026194843"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div class="col-sm-8">
            <div id="map-canvas-holder" style="height: 0;opacity: 0;">
                <div id="map-script-holder">
                    <?php echo do_shortcode('[locations_map category="' . $category . '" country="' . $country . '" scope="' . $scope . '" search="' . $search . '" limit=500]'); ?>
                </div>
                <div id="map-canvas-shadow"><i class="fa fa-spinner fa-spin"></i></div>
            </div>
            <div id="events-result">
                <div class="col-sm-12"><div class="listing-loading"><h3><i class="fa fa-spinner fa-spin"></i></h3></div></div>
                <div id="cat-listing-list-holder" style="display: none; opacity: 1;">
                    <div class="row">
                    <?php echo do_shortcode('[events_list category="' . $category . '" country="' . $country . '" scope="' . $scope . '" search="' . $search . '" page="' . $_GET["my_listings_current_page"] . '" pagination=1]
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
                    [/events_list]'); ?>
                    </div>
                </div>
                <div id="cat-listing-holder">
                    <?php echo do_shortcode('[events_list category="' . $category . '" country="' . $country . '" scope="' . $scope . '" search="' . $search . '" page="' . $_GET["my_listings_current_page"] . '" pagination=1 ]'); ?>
                </div>
            </div>
        </div>
    </section>
</div>