<?php
/**
 * class-wunderslider-shortcodes.php
 *
 * Copyright (c) "kento" Karim Rahimpur www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author Karim Rahimpur
 * @package wunderslider
 * @since wunderslider 1.0.0
 */
class WunderSlider_Shortcodes {

	/**
	 * Adds shortcodes.
	 */
	public static function init() {
		add_filter( 'the_content', array( __CLASS__, 'the_content' ), 0 );
		add_shortcode( 'wunderslider_block', array( __CLASS__, 'wunderslider_block' ) );
		add_filter( 'the_posts', array( __CLASS__, 'the_posts' ) );
	}

	public static function the_posts( $posts ) {
		global $wunderslider_content_blocks, $wunderslider_count;
		foreach( $posts as $post ) {
			if ( strpos( $post->post_content, '[wunderslider]' ) !== false ) { 
				wp_enqueue_script( 'wunderslider', trailingslashit( WS_PLUGIN_URL ) . 'js/wunderslider-min.js', array( 'jquery') );
				break;
			}
		}
		return $posts;
	}

	public static function the_content( $content ) {
		global $shortcode_tags;
		$tags = $shortcode_tags;
		remove_all_shortcodes();
		add_shortcode( 'wunderslider', array( __CLASS__, 'wunderslider' ) );
		$content = do_shortcode( $content );
		$shortcode_tags = $tags;
		return $content;
	}

	public static function wunderslider_block( $atts, $content = null ) {
		global $wunderslider_content_blocks, $wunderslider_count;
		$output = "";
		$options = shortcode_atts( array( "index" => null ), $atts );
		if ( $options['index'] !== null ) {
			$index = intval( $options['index'] );
			if ( isset( $wunderslider_content_blocks[$index] ) ) {
				if ( $wunderslider_content_blocks[$index]['error'] === null ) {
					// @todo could improve this to only print the stylesheet links when not already done before
					$output .= $wunderslider_content_blocks[$index]['links'];
					$output .= $wunderslider_content_blocks[$index]['container'];
					$output .= $wunderslider_content_blocks[$index]['javascript'];
				} else {
					$output .= $wunderslider_content_blocks[$index]['error'];
				}
			}
		}
		return $output;
	}

	/**
	 * Shortcode renderer.
	 *
	 * @param array $atts attributes
	 * @param string $content WunderSlider XML
	 */
	public static function wunderslider( $atts, $content = null ) {
		global $wunderslider_content_blocks, $wunderslider_count;
		if ( !isset( $wunderslider_count ) ) {
			$wunderslider_count = 0;
		} else {
			$wunderslider_count++;
		}
		$output = "";
		$options = shortcode_atts( array( "render" => 'code' ), $atts );
		$render = $options['render'];
		if ( $content !== null ) {
			require_once( 'class-wunderslider-xml-parser.php' );
			$p = new WunderSlider_XML_Parser( $content );
			$p->jquery = false;
			$p->basepath = trailingslashit( WS_PLUGIN_URL );
			$p->container_id = "wunderslider-$wunderslider_count";
			$wunderslider_content_blocks[$wunderslider_count] = array(
				'code'       => $p->code,
				'scripts'    => $p->scripts,
				'links'      => $p->links,
				'javascript' => $p->javascript,
				'container'  => $p->container,
				'error'      => $p->error
			);
			$output = '[wunderslider_block index="'.$wunderslider_count.'" /]';
		}
		return $output;
	}
}
WunderSlider_Shortcodes::init();
