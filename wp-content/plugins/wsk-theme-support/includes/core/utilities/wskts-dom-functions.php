<?php
/**
 * DOM Functions
 *
 * Functions for working with the dom.
 *
 * @package WSK_Theme_Support/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Adds class to all elements with matching tag name in a DOMDocument
 *
 * @param DOMDocument $dom The DOMDocument.
 * @param string      $tag_name The element tag name.
 * @param string      $additional_class The class to add to the element.
 */
function wskts_dom_add_class_to_elements( &$dom, $tag_name, $additional_class ) {
	$tags = $dom->getElementsByTagName( $tag_name );

	foreach ( $tags as $tag ) {
		wskts_dom_append_attr_to_element( $tag, 'class', $additional_class );
	}
}

/**
 * Adds an attribute to a DOMNode.
 *
 * @param DOMNode $element The DOMNode to add the attribute to.
 * @param string  $attr The attribute to add.
 * @param string  $value The value of the attribute to add.
 */
function wskts_dom_append_attr_to_element( &$element, $attr, $value ) {
	if ( $element->hasAttribute( $attr ) ) {
		$attrs = explode( ' ', $element->getAttribute( $attr ) );

		if ( ! in_array( $value, $attrs, true ) ) {
			$attrs[] = $value;
		}

		$attrs = array_map( 'trim', array_filter( $attrs ) );

		$element->setAttribute( $attr, implode( ' ', $attrs ) );
	} else {
		$element->setAttribute( $attr, $value );
	}
}

/**
 * Get all elements with matching class in a DOMDocument
 *
 * @param DOMDocument $dom The DOMDocument.
 * @param string      $tag_name The element tag name.
 * @param string      $matching_class The class to match the tag for.
 */
function wskts_dom_get_elements_by_class( &$dom, $tag_name, $matching_class ) {
	$nodes = array();

	$child_node_list = $dom->getElementsByTagName( $tag_name );
	for ( $i = 0; $i < $child_node_list->length; $i++ ) {
		$temp = $child_node_list->item( $i );

		if ( stripos( $temp->getAttribute( 'class' ), $matching_class ) !== false ) {
			$nodes[] = $temp;
		}
	}

	return $nodes;
}
