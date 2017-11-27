<?php
/**
 * JSON API custom taxonomy index
 **/

/**
 * Custom Taxonomy Controller for JSON API plugin
 *
 * This custom taxonomy controller enables json api to list all terms in specified taxonomy. 
 **/
class JSON_API_Taxonomy_Controller {

    public function get_taxonomy_index() {
        $terms = $this->get_terms();
        return array(
            'count' => count( $terms ),
            'terms' => $terms
        );
    }

    public function get_terms() {
        global $json_api;
        $taxonomy = $this->get_current_taxonomy();
        if (!$taxonomy) {
            $json_api->error("Not found.");
        }

        $wp_terms = get_terms( $taxonomy );
        $terms = array();
        foreach ( $wp_terms as $wp_term ) {
            if ( $wp_term->term_id == 1 && $wp_term->slug == 'uncategorized' ) {
                continue;
            }
            $terms[] = new JSON_API_Term( $wp_term );
        }
        return $terms;
    }

    protected function get_current_taxonomy() {
        global $json_api;
        $taxonomy  = $json_api->query->get('taxonomy');
        if ( $taxonomy ) {
            return $taxonomy;
        } else {
            $json_api->error("Include 'taxonomy' var in your request.");
        }
        return null;
    }
}

// Generic rewrite of JSON_API_Tag class to represent any term of any type of taxonomy in WP
class JSON_API_Term {

  var $id;          // Integer
  var $slug;        // String
  var $title;       // String
  var $description; // String

  function JSON_API_Term($term = null) {
    if ($term) {
      $this->import_wp_object($term);
    }
  }

  function import_wp_object($term) {
    $this->id = (int) $term->term_id;
    $this->slug = $term->slug;
    $this->title = $term->name;
    $this->description = $term->description;
    $this->post_count = (int) $term->count;
  }

}

?>