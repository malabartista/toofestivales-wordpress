<?php
    $category = $_GET["category"];
    $country = $_GET["country"];
    $scope = $_GET["scope"];
    $search = $_GET["search"];
    if (empty($scope)){
        $scope = "future";
    }
    $queried_object = get_queried_object();
    $category_id = $queried_object->term_id;
    $path = $_SERVER['REQUEST_URI'];
    $country_path = explode("/", $path);
    $country = strtoupper(explode("-", $country_path[3])[0]);
?>
<div id="page-title">
    <!-- The Map -->
    <div id="map-canvas-holder">
        <div id="map-script-holder" class="map-canvas">
            <?php echo do_shortcode('[locations_map category="' . $category . '" country="' . $country . '" scope="' . $scope . '" search="' . $search . '" limit=500]'); ?>
        </div>
        <div id="map-canvas-shadow"><i class="fa fa-spinner fa-spin"></i></div>
        <div id="show-map-button-holder">
            <div class="container box">
                <section class="row">
                    <div class="col-sm-12">
                        <span id="show-map-category-button" class="td-buttom">Mostar Mapa</span>
                        <span id="hide-map-category-button" class="td-buttom">Ocultar Mapa</span>
                        <script type="text/javascript">
                            jQuery(document).ready(function($) {
                                jQuery(document).on('click','#show-map-category-button', function(e) {
                                    e.preventDefault();
                                    jQuery('#show-map-category-button').css('display', 'none');
                                    jQuery('#hide-map-category-button').css('display', 'inline-block');
                                    jQuery('#map-canvas-holder').css('height', '560px');
                                    jQuery('#map-canvas-shadow').fadeOut(200);
                                });
                            });
                            jQuery(document).ready(function($) {
                                jQuery(document).on('click','#hide-map-category-button', function(e) {
                                    e.preventDefault();
                                    jQuery('#hide-map-category-button').css('display', 'none');
                                    jQuery('#show-map-category-button').css('display', 'inline-block');
                                    jQuery('#map-canvas-holder').css('height', '160px');
                                    jQuery('#map-canvas-shadow').fadeIn(200);
                                });
                            });
                        </script>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<form id="td-filter-listings" type="get" action="http://toofestival.es/mapa-festivales/">
    <div id="">
        <div class="content page-title-container">
            <div class="container box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="item-block-title">
                            <i class="fa fa-music"></i><h4><?php roots_title(); ?></h4>
                            <span class="page-title-aright">
                                <span class="pins-load hide"><i class="fa fa-spinner fa-spin"></i></span>
                                <span class="pins-total"><?php echo EM_Events::count(array("scope" => $scope, "category" => $category, "country" => $country, "search" => $search));?></span> Festivales encontrados
                            </span>
                        </div>
                        <div class="item-block-content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="search" id="search" value="<?php echo $search ?>" class="input-textarea" placeholder="Festival,...">
                                </div>
                                <div class="col-sm-4">
                                    <select id="scope" name="scope">
                                        <option value="future">Cuándo</option>
                                        <option value="today" <?php if ($scope == 'today' ) echo 'selected' ; ?>>Hoy</option>
                                        <option value="tomorrow" <?php if ($scope == 'tomorrow' ) echo 'selected' ; ?>>Mañana</option>
                                        <option value="month" <?php if ($scope == 'month' ) echo 'selected' ; ?>>Este mes</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
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
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="filter-by-tag-holder">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            </div>
                                            <div class="col-sm-6" style="float: right;">
                                                <button class="td-buttom" id="submit-filter" name="submit" type="submit"><i class="fa fa-check"></i>Actualizar</button>
                                                <button class="td-buttom reset-category reset-scope" id="reset-filter" name="submit" type="submit" style="margin-bottom: 0!important"><i class="fa fa-times"></i>Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container box">
        <div id="events-result">
            <div class="col-sm-12"><div class="listing-loading"><h3><i class="fa fa-spinner fa-spin"></i></h3></div></div>
            <div id="cat-listing-holder">
                <?php echo do_shortcode('[events_list category="' . $category . '" country="' . $country . '" scope="' . $scope . '" search="' . $search . '" page="' . $_GET["my_listings_current_page"] . '" pagination=1 ]'); ?>
            </div>
        </div>
    </div>
    <input type="hidden" id="country" name="country" value="<?php echo $country ?>">
    <input type="hidden" id="my_listings_current_page" name="my_listings_current_page" value="<?php echo $_GET["my_listings_current_page"] ?>">
    <input type="hidden" id="content_type" name="content_type" value="">
    <input type="hidden" id="action" name="action" value="em_filter_grid">
</form>