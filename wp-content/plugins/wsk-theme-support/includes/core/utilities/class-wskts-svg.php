<?php
/**
 * SVG
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * SVG class.
 */
class WSKTS_SVG {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_filter( 'wp_kses_allowed_html', array( __CLASS__, 'add_allowed_svg_tags' ), 10, 2 );
		add_action( 'upload_mimes', array( __CLASS__, 'register_mime_types' ) );
	}

	/**
	 * Add the allowed SVG tags.
	 *
	 * @param string|array $allowed_tags The allowable HTML tags.
	 * @param string|array $context      The context for which to retrieve tags.
	 */
	public static function add_allowed_svg_tags( $allowed_tags, $context ) {
		// Get the allowed HTML elements.
		$allowed_html_tags = self::get_allowed_html_tags();

		// Get the allowed tags for SVG elements.
		$allowed_svg_tags = self::get_allowed_svg_tags();

		// Add a custom context for escaping just SVG's.
		if ( 'svg' === $context ) {
			return $allowed_svg_tags;
		}

		// Add SVG support to the post context.
		if ( 'post' === $context ) {
			return array_merge( $allowed_tags, $allowed_html_tags, $allowed_svg_tags );
		}

		return $allowed_tags;
	}

	/**
	 * Returns an array of additional allowed HTML tags.
	 */
	public static function get_allowed_html_tags() {
		$allowed_html_tags = array();

		// Add support for time.
		$allowed_html_tags['time'] = array(
			'datetime' => true,
		);

		return $allowed_html_tags;
	}

	/**
	 * Returns an array of allowed HTML tags and attributes for SVG's.
	 *
	 * NOTE: Attribute keys MUST be all lower case not camel cased as they appear in an SVG
	 *
	 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg
	 */
	public static function get_allowed_svg_tags() {
		$allowed_svg_tags = array();

		// https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/Core.
		$core_attributes = array(
			'id'       => true,
			'lang'     => true,
			'tabindex' => true,
			'xml:base' => true,
			'xml:lang' => true,
		);

		// https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/Styling.
		$styling_attributes = array(
			'class' => true,
			'style' => true,
		);

		// https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/Presentation.
		$presentation_attributes = array(
			'clip-path'            => true,
			'clip-rule'            => true,
			'color'                => true,
			'color-interpolation'  => true,
			'color-rendering'      => true,
			'cursor'               => true,
			'display'              => true,
			'fill'                 => true,
			'fill-opacity'         => true,
			'fill-rule'            => true,
			'filter'               => true,
			'mask'                 => true,
			'opacity'              => true,
			'pointer-events'       => true,
			'shape-rendering'      => true,
			'stroke'               => true,
			'stroke-dasharray'     => true,
			'stroke-dashoffset'    => true,
			'stroke-linecap'       => true,
			'stroke-linejoin'      => true,
			'stroke-miterlimit'    => true,
			'stroke-opacity'       => true,
			'stroke-width'         => true,
			'transform'            => true,
			'vector-effect'        => true,
			'visibility'           => true,
		);

		/**
		 * Add tags for svg element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg.
		 */
		$allowed_svg_tags['svg'] = array(
			'height'              => true,
			'preserveaspectratio' => true,
			'viewbox'             => true,
			'width'               => true,
			'x'                   => true,
			'xmlns'               => true,
			'y'                   => true,
		);

		/**
		 * Add tags for path element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/path.
		 */
		$allowed_svg_tags['path'] = array(
			'd'          => true,
			'pathlength' => true,
		);

		/**
		 * Add tags for defs element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/defs.
		 */
		$allowed_svg_tags['defs'] = array();

		/**
		 * Add tags for g element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/g.
		 */
		$allowed_svg_tags['g'] = array();

		/**
		 * Add tags for circle element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/circle.
		 */
		$allowed_svg_tags['circle'] = array(
			'cx'         => true,
			'cy'         => true,
			'r'          => true,
			'pathlength' => true,
		);

		/**
		 * Add tags for ellipse element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/ellipse.
		 */
		$allowed_svg_tags['ellipse'] = array(
			'cx'         => true,
			'cy'         => true,
			'rx'         => true,
			'ry'         => true,
			'pathlength' => true,
		);

		/**
		 * Add tags for line element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/line.
		 */
		$allowed_svg_tags['line'] = array(
			'x1'         => true,
			'x2'         => true,
			'y1'         => true,
			'y2'         => true,
			'pathlength' => true,
		);

		/**
		 * Add tags for polygon element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polyline.
		 */
		$allowed_svg_tags['polyline'] = array(
			'points'     => true,
			'pathlength' => true,
		);

		/**
		 * Add tags for polygon element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polygon.
		 */
		$allowed_svg_tags['polygon'] = array(
			'points'     => true,
			'pathlength' => true,
		);

		/**
		 * Add tags for rect element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/rect.
		 */
		$allowed_svg_tags['rect'] = array(
			'x'          => true,
			'y'          => true,
			'width'      => true,
			'height'     => true,
			'rx'         => true,
			'ry'         => true,
			'pathlength' => true,
		);

		/**
		 * Add tags for filter element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/filter.
		 */
		$allowed_svg_tags['filter'] = array(
			'x'              => true,
			'y'              => true,
			'width'          => true,
			'height'         => true,
			'filterres'      => true,
			'filterunits'    => true,
			'primitiveunits' => true,
			'xlink:href'     => true,
		);

		/**
		 * Add tags for feOffset element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/feOffset.
		 */
		$allowed_svg_tags['feoffset'] = array(
			'in' => true,
			'dx' => true,
			'dy' => true,
		);

		/**
		 * Add tags for feGaussianBlur element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/feGaussianBlur.
		 */
		$allowed_svg_tags['fegaussianblur'] = array(
			'in'           => true,
			'stddeviation' => true,
			'edgemode'     => true,
		);

		/**
		 * Add tags for feColorMatrix element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/feColorMatrix.
		 */
		$allowed_svg_tags['fecolormatrix'] = array(
			'in'     => true,
			'type'   => true,
			'values' => true,
		);

		/**
		 * Add tags for feMerge element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/feMerge.
		 */
		$allowed_svg_tags['femerge'] = array();

		/**
		 * Add tags for feMergeNode element
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/feMergeNode.
		 */
		$allowed_svg_tags['femergenode'] = array(
			'in' => true,
		);

		// Merge in common attributes.
		foreach ( $allowed_svg_tags as $allowed_svg_tag_key => $allowed_svg_tag ) {
			$allowed_svg_tags[ $allowed_svg_tag_key ] = array_merge( $allowed_svg_tags[ $allowed_svg_tag_key ], $core_attributes, $styling_attributes, $presentation_attributes );
		}

		return $allowed_svg_tags;
	}

	/**
	 * Register mime types.
	 *
	 * @param array $mimes The supported mime types.
	 */
	public static function register_mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

}

WSKTS_SVG::init();
