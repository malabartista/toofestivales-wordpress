<?php
/* @var $EM_Event EM_Event */
$tags = get_the_terms($EM_Event->post_id, EM_TAXONOMY_TAG);
if( is_array($tags) && count($tags) > 0 ){
	$tags_list = array();
	foreach($tags as $tag){ 
		$link = get_term_link($tag->slug, EM_TAXONOMY_TAG);
		if ( is_wp_error($link) ) $link = '';
		$tags_list[] = '<div class="col-sm-6 amenities-item tag-filter-item" itemprop="performer" itemscope="" itemtype="http://schema.org/MusicGroup"><i class="fa fa-microphone"></i><a href="'. $link .'"><span itemprop="name">'. $tag->name .'</span></a></div>';
	}
	echo implode(' ', $tags_list);
}