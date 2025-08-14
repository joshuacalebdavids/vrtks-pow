<?php
/**
 * SVG Functions
 *
 * Functions for working with SVG's.
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return SVG file contents.
 *
 * @param string $path  The path to the SVG file.
 * @param array  $attrs Array of SVG attributes.
 */
function wskts_get_inline_svg( $path, $attrs = array() ) {
	if ( ! file_exists( $path ) || ! is_readable( $path ) ) {
		return false;
	}

	$default_attrs = array(
		'height' => 16,
		'width'  => 16,
		'class'  => '',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	$content = file_get_contents( $path );

	// Instantiate DOMDocument Object with file content.
	$doc = new DOMDocument();
	$doc->loadXML( $content );

	// Set/change the SVG attributes.
	foreach ( $attrs as $attr => $value ) {
		if ( ! empty( $value ) ) {
			// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$doc->documentElement->setAttribute( $attr, $value );
		}
	}

	// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
	return $doc->saveXML( $doc->documentElement );
}

/**
 * Output SVG file contents.
 *
 * @see wskts_get_inline_svg() for description of the arguments.
 *
 * @param mixed ...$args Array of SVG attributes.
 */
function wskts_inline_svg( ...$args ) {
	echo wp_kses( wskts_get_inline_svg( ...$args ), 'svg' );
}
