<?php
/**
 * class-wunderslider-xml-parser.php
 *
 * Copyright (c) "kento" Karim Rahimpur www.itthinx.com
 *
 * This code is provided subject to the license granted.
 * Unauthorized use and distribution is prohibited.
 * See COPYRIGHT.txt and LICENSE.txt
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This header and all notices must be kept intact.
 *
 * @author Karim Rahimpur
 * @package wunderslider
 * @since wunderslider 1.3.0
 */

/**
 * Parser-Generator class
 */
class WunderSlider_XML_Parser {

	private $elements;
	private $wunderslider = null;
	private $scripts = null;
	private $links = null;
	private $javascript = null;
	private $code = null;
	private $container = null;
	private $jquery = true;
	private $basepath = '';
	private $rebuild = false;
	private $container_id = null;
	
	private $link_urls = null;
	private $script_urls = null;
	
	private $appendTo = null;
	
	private $error = null;
	
	const FRAGMENT = 20;

	/**
	 * Create an instance.
	 * 
	 * @param string $xml XML or filename
	 */
	public function __construct( $xml ) {
		if ( file_exists( $xml ) ) {
			$xml = file_get_contents( $xml );
		}
		$p = xml_parser_create();
		xml_parser_set_option( $p, XML_OPTION_CASE_FOLDING, 0); // no upper-casing
		xml_parser_set_option( $p, XML_OPTION_SKIP_WHITE, 1 ); // e.g. no CDATA created for line breaks
		$success = xml_parse_into_struct( $p, $xml, $this->elements, $index );
		if ( !$success ) {
			$error_code = xml_get_error_code( $p );
			$error_line = xml_get_current_line_number( $p );
			$error_column = xml_get_current_column_number( $p );
			$error_string = xml_error_string( $error_code );
			$fragments = preg_split( "/\r\n?|\n/", $xml, $error_line + 1 );
			$fragment = '';
			if ( $fragment = array_pop( $fragments ) ) {
				if ( $line = array_pop( $fragments ) ) {
					$fragment = $line;
				}
				$fragment = htmlentities( $fragment );
			}
			
			$this->error = sprintf( "XML Parser error %s on line %d : %s", $error_string, $error_line - 1, $fragment );
		} else {
			$this->error = null;
		}
		xml_parser_free( $p );
		$this->wunderslider = self::analyze( $this->elements );
		$this->build();
	}

	public function __get( $name ) {
		$result = null;
		if ( $this->rebuild ) {
			$this->build();
		}
		switch( $name ) {
			case 'wunderslider' :
				$result = $this->wunderslider;
				break;
			case 'scripts' :
				$result = $this->scripts;
				break;
			case 'script_urls' :
				$result = $this->script_urls;
				break;
			case 'links' :
				$result = $this->links;
				break;
			case 'link_urls' :
				$result = $this->link_urls;
				break;
			case 'javascript' :
				$result = $this->javascript;
				break;
			case 'code' :
				$result = $this->code;
				break;
			case 'container' :
				$result = $this->container;
				break;
			case 'error' :
				$result = $this->error;
				break;
		}	
		return $result;
	}
	
	public function __set( $name, $value ) {
		switch( $name ) {
			case 'jquery' :
			case 'jQuery' :
				$this->jquery = self::boolean( $value );
				$this->rebuild = true;
				break;
			case 'basepath' :
				if ( strrpos( $value, "/" ) !== ( strlen( $value ) - 1 ) ) {
					$value .= "/";
				}
				$this->basepath = $value;
				$this->wunderslider['args']['basepath'] = $value;
				$this->rebuild = true;
				break;
			case 'container_id' :
				$this->container_id = $value;
				$this->rebuild = true;
				break;
		}
	}

	/**
	 * Build code.
	 */
	private function build() {
		if ( $this->container_id !== null ) {
			$this->wunderslider['container_id'] = $this->container_id;
		}
		$this->build_links();
		$this->build_scripts();
		$this->build_container();
		$this->build_javascript();
		$this->code = $this->links . $this->container . $this->scripts . $this->javascript;
		$this->rebuild = false;
	}

	/**
	 * Builds link elements.
	 */
	private function build_links() {
		$skin = isset( $this->wunderslider['skin'] ) ? $this->wunderslider['skin'] : 'default' ;
		$this->link_urls[$skin] = $this->basepath . 'css/' . $skin . '/wunderslider-min.css';
		$this->links = '<link rel="stylesheet" type="text/css" href="' . $this->basepath . 'css/' . $skin . '/wunderslider-min.css" />';
	}

	/**
	 * Builds script elements.
	 */
	private function build_scripts() {
		$this->scripts = '';
		if ( $this->jquery && ( $this->wunderslider['jQuery'] !== false ) ) {
			// use own jQuery?
			if ( $this->wunderslider['jQuery'] === null ) {
				if ( is_dir( $this->basepath . 'js' ) ) {
					$files = scandir( $this->basepath . 'js' );
					foreach ( $files as $file ) {
						//if ( preg_match( '/jquery\-\d+\.\d+\.\d+\.min\.js/', $file ) ) {
						if ( preg_match( '/jquery\-(\d+\.)+min\.js/', $file ) ) {
							$this->wunderslider['jQuery'] = $this->basepath . 'js/' . $file;
							break;
						}
					}
				}
			}
			if ( !empty( $this->wunderslider['jQuery'] )) {
				$this->script_urls['jquery'] = $this->wunderslider['jQuery'];
				$this->scripts .=
'<script type="text/javascript" src="' . $this->wunderslider['jQuery'] . '"></script>
';
			}
		}
		$this->script_urls['wunderslider'] = $this->basepath . 'js/wunderslider-min.js';
		$this->scripts .=
'<script type="text/javascript" src="' . $this->basepath . 'js/wunderslider-min.js"></script>
';
	}

	/**
	 * Builds the container element.
	 */
	private function build_container() {
		$container_id = isset( $this->wunderslider['container_id'] ) ? $this->wunderslider['container_id'] : 'wunderslider';
		$class = '';
		if ( isset( $this->wunderslider['container-class'] ) && ( $this->wunderslider['container-class'] !== null ) ) {
			$class .= ' class="' . $this->wunderslider['container-class'] . '" ';
		}
		$style = '';
		if ( isset( $this->wunderslider['container-width'] ) && ( $this->wunderslider['container-width'] !== null ) ) {
			$style .= 'width:' . $this->wunderslider['container-width'] . ';';
		}
		if ( isset( $this->wunderslider['container-height'] ) && ( $this->wunderslider['container-height'] !== null ) ) {
			$style .= 'height:' . $this->wunderslider['container-height'] . ';';
		}
		if ( isset( $this->wunderslider['container-style'] ) && ( $this->wunderslider['container-style'] !== null ) ) {
			$style .= ';' . $this->wunderslider['container-style'] . ';';
		}
		if ( strlen( $style ) > 0 ) {
			$style = ' style="' . $style . '" ';
		}
		$this->container = '<div id="' . $container_id . '" ' . $style . ' ' . $class . '></div>';
	}

	/**
	 * Builds the WunderSlider js.
	 */
	private function build_javascript() {
		$js =
			'<script type="text/javascript">' .
			'(function($) {' .
			'$(window).load(function(){';

		$container_id = $this->wunderslider['container_id'];
		$images = isset( $this->wunderslider['images'] ) ? json_encode( $this->wunderslider['images'] ) : '[]';
		$args = isset( $this->wunderslider['args'] ) ? json_encode( $this->wunderslider['args'] ) : '[]';
		$js .=
			'var parent = document.getElementById("' . $container_id . '");' .
			( isset( $this->wunderslider['appendTo'] ) && $this->wunderslider['appendTo'] !== null ? '$(parent).detach(); $("' . $this->wunderslider['appendTo'] . '").append(parent);' : '' ) .
			'var wunderSlider = new itthinx.WunderSlider(' .
			'parent,' .
			$images. ',' .
			$args .
			');';
		$js .= '});' .
		'})(jQuery);' .
		'</script>
';
		$this->javascript = $js;
	}

	/**
	 * Analyze parsed WunderSlider.
	 * @param array $elements
	 * @return array
	 */
	private static function analyze( $elements ) {
		$wunderslider = null;
		$image = null;
		foreach ( $elements as $element ) {
			$tag  = $element['tag'];
			$type = $element['type'];
			switch ( $tag ) {
				case 'wunderslider' :
					switch ( $type ) {
						case 'open' :
							$wunderslider = self::wunderslider_tag( $element );
							break;
						case 'close' :
							break;
					}
					break;
				case 'image' :
					if ( $wunderslider !== null ) {
						switch ( $type ) {
							case 'open' :
								$image = self::image_tag( $element );
								break;
							case 'complete' :
								$image = self::image_tag( $element );
								if ( $image !== null ) {
									$wunderslider['images'][] = $image;
									$image = null;
								}
								break;
							case 'close' :
								if ( $image !== null ) {
									$wunderslider['images'][] = $image;
									$image = null;
								}
								break;
						}
					}
					break;
				case 'caption' :
					switch( $type ) {
						case 'complete' :
							$caption = self::caption_tag( $element );
							if ( count( $caption ) > 0 ) {
								if ( $image !== null ) {
									$image['caption'] = $caption;
								} else if ( $wunderslider !== null ) {
									$wunderslider['args']['caption'] = $caption;
								}
							}
							break;
					}
					break;
			}
		}
		return $wunderslider;
	}

	/**
	 * Treat the wunderslider tag.
	 * @param array $element
	 * @return array
	 */
	private static function wunderslider_tag( $element ) {
		$ws = array(
			'appendTo'         => null,
			'silent'           => false,
			'hideLogo'         => false,
			'basepath'         => '',
			'container_id'     => 'wunderslider',
			'container-class'  => 'wunderslider-container',
			'container-width'  => null,
			'container-height' => null,
			'container-style'  => null,
			'skin'             => 'default',
			'jQuery'           => null, // initialized below when still null and not false
			'images'           => array(),
			'args'             => null
		);
		$args = array();
		$attributes = isset( $element['attributes'] ) ? $element['attributes'] : array();
		foreach ( $attributes as $attribute => $value ) {
			$value = trim( $value );
			// very minimal checks
			switch( $attribute ) {
				
				case 'appendTo' :
					$ws['appendTo'] = $value;
					break;
				case 'silent' :
					$args['silent'] = $value;
					break;
				case 'hideLogo' :
					$args['hideLogo'] = $value;
					break;
				
				case 'basepath' :
					if ( strrpos( $value, "/" ) !== ( strlen( $value ) - 1 ) ) {
						$value .= "/";
					}
					$ws['basepath'] = $value;
					$args['basepath'] = $value;
					break;
				
				case 'container_id' :
				case 'container-id' :
					$ws['container_id'] = $value;
					break;
					
				case 'container_class' :
				case 'container-class' :
					$ws['container-class'] = $value;
					break;
					
				case 'container_style' :
				case 'container-style' :
					$ws['container-style'] = $value;
					break;

				case 'container_width' :
				case 'container-width' :
					$ws['container-width'] = $value;
					break;
					
				case 'container_height' :
				case 'container-height' :
					$ws['container-height'] = $value;
					break;
					
				case 'skin' :
					$ws['skin'] = $value;
					break;
					
				case 'jQuery' :
					if ( $value !== 'false' ) {
						$ws['jQuery'] = $value;
					} else {
						$ws['jQuery'] = false;
					}
					break;

				// string
				case 'mode' :
				case 'display' :
				case 'morph' :
				case 'overlay' :
					$args[$attribute] = $value;
					break;

				// boolean
				case 'autoAdjust' :
				case 'useCaption' :
				case 'useSelectors' :
				case 'useNav' :
				case 'useThrobber' :
				case 'useFlick' :
				case 'clickable' :
				case 'mouseOverPause' :
				case 'randomize' :
				case 'useShadow' :
				case 'buttonEffects' :
					$args[$attribute] = self::boolean( $value );
					break;

				// integer
				case 'width' :
				case 'height' :
				case 'animateInterval' :
				case 'hzones' :
				case 'vzones' :
				case 'preloadImages' :
				case 'zIndex' :
				case 'period' :
				case 'duration' :
				case 'fps' :
					$args[$attribute] = self::integer( $value );
					break;

				// decimal
				case 'flickDistanceFactor' :
				case 'overlayOpacity' :
					$args[$attribute] = self::float( $value );
					break;

				case 'captionContentElement' :
					switch ( $value ) {
						case 'div' :
						case 'span' :
							$args[$attribute] = $value;
							break;
					}
					break;

				case 'effect' :
					$args['effects'] = array( $value );
					break;
				case 'effects' :
					$effects = explode( ',', $value );
					foreach( $effects as $effect ) {
						$effect = trim( $effect );
						$args['effects'][] = $effect;
					}
					break;
			}
		}

		$ws['args'] = $args;
		return $ws;
	}

	/**
	 * Treat the image tag.
	 * @param array $element
	 * @return array
	 */
	private static function image_tag( $element ) {
		$image = array();
		$attributes = $element['attributes'];
		foreach ( $attributes as $attribute => $value ) {
			switch( $attribute ) {
				case 'url' :
				case 'title' :
				case 'description' :
				case 'linkUrl' :
					$image[$attribute] = trim( $value );
					break;
			}
		}
		return $image;
	}

	/**
	 * Treat the caption tag.
	 * @param array $element
	 * @return array
	 */
	private static function caption_tag( $element ) {
		$caption = array();
		$attributes = $element['attributes'];
		foreach ( $attributes as $attribute => $value ) {
			switch( $attribute ) {
				case 'left' :
				case 'right' :
				case 'top' :
				case 'bottom' :
				case 'width' :
				case 'height' :
					$caption[$attribute] = trim( $value );
					break;
			}
		}
		return $caption;
	}

	/**
	 * Interpret a boolean. 
	 * @param mixed $value
	 * @return boolean true for anything considered true, otherwise false
	 */
	private static function boolean( $value ) {
		$value = (string) $value;
		$value = strtolower( $value );
		switch( $value ) {
			case 'true' :
			case 'on' :
			case 'yes' :
				$value = true;
				break;
			default :
				$value = false;
		}
		return $value;
	}

	/**
	 * Interpret an int.
	 * @param mixed $value
	 * @param int $min
	 * @param int $max
	 * @return int
	 */
	private static function integer( $value, $min = null, $max = null ) {
		$value = intval( $value );
		if ( $min !== null ) {
			if ( $value < $min ) {
				$value = $min;
			}
		}
		if ( $max !== null ) {
			if ( $value > $max ) {
				$value = $max;
			}
		}
		return $value;
	}

	/**
	 * Interpret an int or 'random'.
	 * @param mixed $value
	 * @param int $min
	 * @param int $max
	 * @return int or 'random'
	 */
	private static function integer_or_random( $value, $min = null, $max = null ) {
		if ( $value === 'random' ) {
			return 'random';
		} else {
			return integer( $value, $min, $max );
		}
	}

	/**
	 * Interpret a float.
	 * @param mixed $value
	 * @param float $min
	 * @param float $max
	 * @return float
	 */
	private static function float( $value, $min = null, $max = null) {
		$value = floatval( $value );
		if ( $min !== null ) {
			if ( $value < $min ) {
				$value = $min;
			}
		}
		if ( $max !== null ) {
			if ( $value > $max ) {
				$value = $max;
			}
		}
		return $value;
	}
}
