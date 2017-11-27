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
?>

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
	                                            <button class="td-buttom" id="submit-filter" name="submit" type="submit"><i class="fa fa-check"></i>Actualizar</button>
	                                            <button class="td-buttom reset-country reset-scope" id="reset-filter" name="submit" type="submit" style="margin-bottom: 0!important"><i class="fa fa-times"></i>Reset</button>
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
                <?php echo do_shortcode('[events_list category="' . $category_id . '" country="' . $country . '" scope="' . $scope . '" search="' . $search . '" page="' . $_GET["my_listings_current_page"] . '" pagination=1 ]'); ?>
            </div>
        </div>
	</div>
	<input type="hidden" id="category" name="category" value="<?php echo $category_id ?>">
    <input type="hidden" id="my_listings_current_page" name="my_listings_current_page" value="<?php echo $_GET["my_listings_current_page"] ?>">
    <input type="hidden" id="content_type" name="content_type" value="">
    <input type="hidden" id="action" name="action" value="em_filter_grid">
</form>