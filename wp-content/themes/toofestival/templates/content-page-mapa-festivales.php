<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
<?php
    $category = $_GET["category"];
    $country = $_GET["country"];
    $scope = $_GET["scope"];
    $search = $_GET["search"];
    if (empty($scope)){
        $scope = "future";
    }
?>
<div id="festivales-map">
    <!-- The Map -->
    <div class="map-container">
        <div id="map-script-holder" class="map-canvas">
            <?php echo do_shortcode('[locations_map category="' . $category . '" country="' . $country . '" scope="' . $scope . '" search="' . $search . '" limit=500]'); ?>
        </div>
        <div id="map-canvas-shadow"><i class="fa fa-spinner fa-spin"></i></div>
    </div>
    <!-- The Map Filter Form -->
    <div class="container box">
        <section class="row">
            <div class="col-sm-12" style="margin-top: -88px;z-index: 999;">
                <div class="item-block-title">
                    <i class="fa fa-child"></i><h4>Explora la diversión</h4>
                    <span class="page-title-aright">
                        <span class="pins-load hide"><i class="fa fa-spinner fa-spin"></i></span>
                        <span class="pins-total"><?php echo EM_Events::count(array("scope" => $scope, "category" => $category, "country" => $country, "search" => $search));?></span> Festivales encontrados
                    </span>
                </div>
                <div class="item-block-content">
                    <form id="td-filter-listings" type="get" action="http://toofestival.es/mapa-festivales/">
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="text" name="search" id="search" value="<?php echo $search ?>" class="input-textarea" placeholder="Lugar,...">
                            </div>
                            <div class="col-sm-3">
                                <select id="scope" name="scope">
                                    <option value="future">Cuándo</option>
                                    <option value="today" <?php if ($scope == 'today' ) echo 'selected' ; ?>>Hoy</option>
                                    <option value="tomorrow" <?php if ($scope == 'tomorrow' ) echo 'selected' ; ?>>Mañana</option>
                                    <option value="month" <?php if ($scope == 'month' ) echo 'selected' ; ?>>Este mes</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
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
                            <div class="col-sm-3">
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
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="filter-by-tag-holder">
                                    <div class="row">
                                        <div class="col-sm-6">
                                        </div>
                                        <div class="col-sm-6" style="float: right;">
                                            <button class="td-buttom" id="submit-filter-map" name="submit" type="submit"><i class="fa fa-check"></i>Actualizar</button>
                                            <button class="td-buttom reset-country reset-category reset-scope" id="reset-filter" name="submit" type="submit" style="margin-bottom: 0!important"><i class="fa fa-times"></i>Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="em_filter_map">
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="container">
 <?php echo do_shortcode('[ssba]'); ?>
</div>
<section id="home-festivals">
    <div id="home-nextevents-title" class="section-header">
        <div class="container">
            <h2 class="text-center">Pr&oacute;ximos festivales</h2>
            <!--
            <div class="btn-group" data-toggle="buttons"><label class="btn btn-success active" id="all-fests"><input type="radio" checked> Todos</label><label class="btn btn-success" id="septiembre-fests"><input type="radio"> Septiembre</label></div>
            -->
        </div>
    </div>
    <div class="container">
    <?php
        if (class_exists('EM_Events')) {
            echo EM_Events::output(array('limit' => 12, 'orderby' => 'event_start_date'));
        }
    ?>
    </div>
    <div id="home-festivales-btn">
        <div class="container text-center">
            <a class="btn btn-primary btn-lg" role="button" href="/festivales/"><i class="fa fa-binoculars"></i> Ver todos los festivales</a>
        </div>
    </div>
</section>
<div class="container">
 <?php echo do_shortcode('[ssba]'); ?>
</div>