jQuery(function($) {

    jQuery(document).ready(function($) {
        jQuery(document).on('click','#show-map-button', function(e) {
            e.preventDefault();
            jQuery('#map-canvas-holder').css('display', 'block');
            jQuery('#map-canvas-holder').removeClass('hide-map');
            jQuery('#map-canvas-holder').css('opacity', '1');
            jQuery('#map-canvas-holder').css('margin-bottom', '30');
            jQuery('#map-canvas-holder').css('height', '660');
            jQuery('#cat-listing-holder').css('display', 'none');
            jQuery('#cat-listing-list-holder').css('display', 'none');
        });
        jQuery(document).on('click','#show-grid-button', function(e) {
            e.preventDefault();
            jQuery('#map-canvas-holder').css('display', 'none');
            jQuery('#map-canvas-holder').addClass('hide-map');
            jQuery('#map-canvas-holder').css('opacity', '0');
            jQuery('#map-canvas-holder').css('height', '0');
            jQuery('#map-canvas-holder').css('margin-bottom', '0');
            jQuery('#cat-listing-holder').css('display', 'block');
            jQuery('#cat-listing-list-holder').css('display', 'none');
        });

        jQuery(document).on('click','#show-list-button', function(e) {
            e.preventDefault();
            jQuery('#map-canvas-holder').css('display', 'none');
            jQuery('#map-canvas-holder').addClass('hide-map');
            jQuery('#map-canvas-holder').css('opacity', '0');
            jQuery('#map-canvas-holder').css('height', '0');
            jQuery('#map-canvas-holder').css('margin-bottom', '0');
            jQuery('#cat-listing-holder').css('display', 'none');
            jQuery('#cat-listing-list-holder').css('display', 'inline-block');
        });
    });

    jQuery(document).on('click','#reset-filter', function(e) {
        e.preventDefault();
        jQuery('#my_listings_current_page').val('1');
        jQuery('#search').val('');
        if(jQuery(this).hasClass("reset-country")){
            jQuery('#country').val('');
        }
        if(jQuery(this).hasClass("reset-category")){
            jQuery('#category').val('0');
        }
        if(jQuery(this).hasClass("reset-scope")){
            jQuery('#scope').val('future');
        }

        $.fn.tdSubmitFilterMap();
        $.fn.tdSubmitFilter();
        $.fn.tdSubmitFilterList();
        $.fn.tdTotalFounds();
    });

    jQuery(document).on('click','#submit-filter', function(e) {
        e.preventDefault();
        jQuery('#my_listings_current_page').val('1');
        $.fn.tdSubmitFilterMap();
        $.fn.tdSubmitFilter();
        $.fn.tdSubmitFilterList();
        $.fn.tdTotalFounds();
    });

    jQuery(document).on('click','#submit-filter-map', function(e) {
        e.preventDefault();
        $.fn.tdSubmitFilterMap();
        $.fn.tdTotalFounds();
    });

    jQuery(document).on("click",".em-pagination a.page-numbers",function(e){
        e.preventDefault();
        var hrefprim = jQuery(this).attr('title');
        var href = hrefprim.replace("#", "");

        jQuery('#my_listings_current_page').val(href);

        jQuery.scrollTo(jQuery('#events-result'), 800);

        //$.fn.tdSubmitFilterMap();
        $.fn.tdSubmitFilter();
        $.fn.tdSubmitFilterList();
        return false;
    });

    $.fn.tdSubmitFilter = function() {
        jQuery('#content_type').val('grid-sidebar');
        jQuery('#action').val('em_filter_grid');
        jQuery('#td-filter-listings').ajaxSubmit({
            type: "GET",
            data: jQuery('#td-filter-listings').serialize(),
            url: events_manager_filters.ajax_url,
            beforeSend: function() {
                jQuery("#cat-listing-holder").css("opacity", "0");
                jQuery(".listing-loading").fadeIn(200);
            },
            success: function(response) {
                jQuery("#cat-listing-holder").html(response);
                jQuery("#cat-listing-holder").css("opacity", "1");
                jQuery(".listing-loading").css("display", "none");
            },
            error: function(response) {
                jQuery("#cat-listing-holder").html(response);
            }
        });
    }

    $.fn.tdSubmitFilterList = function() {
        jQuery('#content_type').val('list-sidebar');
        jQuery('#action').val('em_filter_list');
        jQuery('#td-filter-listings').ajaxSubmit({
            type: "GET",
            data: jQuery('#td-filter-listings').serialize(),
            url: events_manager_filters.ajax_url,
            beforeSend: function() {
                jQuery("#cat-listing-list-holder").css("opacity", "0");
                jQuery(".listing-loading").fadeIn(200);
            },
            success: function(response) {
                jQuery("#cat-listing-list-holder").html(response);
                jQuery("#cat-listing-list-holder").css("opacity", "1");
                jQuery(".listing-loading").css("display", "none");
            }
        });
    }

    $.fn.tdSubmitFilterMap = function() {
        //$.fn.tdClearMap();
        jQuery('#content_type').val('map');
        jQuery('#action').val('em_filter_map');
        jQuery('#td-filter-listings').ajaxSubmit({
            type: "GET",
            data: jQuery('#td-filter-listings').serialize(),
            url: events_manager_filters.ajax_url,
            beforeSend: function() {
                //jQuery(".map-script-holder").html("");
                jQuery("#map-canvas-shadow").css("display","inline-block");
            },
            success: function(response) {
                jQuery("#map-script-holder").html(response);
                jQuery('.em-locations-map').each( function(index, el){ em_maps_load_locations(el); } );
            }
        });
    }

    $.fn.tdTotalFounds = function() {
        //$.fn.tdClearMap();
        jQuery('#action').val('em_filter_total');
        jQuery('#td-filter-listings').ajaxSubmit({
            type: "GET",
            data: jQuery('#td-filter-listings').serialize(),
            url: "http://toofestival.es/wp-json/eventsmanager/v1/eventstotal/",
            beforeSend: function() {
                jQuery(".pins-load").removeClass("hide");
                jQuery(".pins-total").html("");
            },
            success: function(response) {
                jQuery(".pins-load").addClass("hide");
                jQuery(".pins-total").html(response);
            }
        });
    }
});

/*
jQuery(function($) {
    jQuery(document).on('click','#reset-filter', function(e) {
        jQuery('#search').val('');
        jQuery('#scope').val('future');
        jQuery('#country').val('');
        jQuery('#category').val('0');
        jQuery('.tag-filter').removeClass('active');
        jQuery('#filter-tags-holder input').remove();
        $.fn.tdSubmitFilterMap();
        e.preventDefault();
    });
    jQuery(document).on('click','#submit-filter', function(e) {
        $.fn.tdSubmitFilterMap();
        e.preventDefault();
    });
    $.fn.tdSubmitFilterMap = function() {
        //debugger;
        //$.fn.tdClearMap();
        //jQuery('#content_type').val('map');
        jQuery('#td-filter-listings').ajaxSubmit({
            type: "GET",
            data: jQuery('#td-filter-listings').serialize(),
            url: ajax_map.ajax_url,
            beforeSend: function() {
                //jQuery("#map-script-holder").html("");
                jQuery("#map-canvas-shadow").css("display","inline-block");
            },
            success: function(response) {
                jQuery("#map-script-holder").html(response);
                jQuery('.em-locations-map').each( function(index, el){ em_maps_load_locations(el); } );
            }
        });
    }
});
*/