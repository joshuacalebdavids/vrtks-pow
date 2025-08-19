<?php

/**
 * Layout - Intro Text
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_intro_text($attrs = array())
{
	$default_attrs = array(
		'title'         => '',
		'featured_post' => array(),
		'image_left'    => '',
		'image_right'   => '',
		'colour_scheme' => '',
	);

	$args = wp_parse_args($attrs, $default_attrs);

	get_template_part(
		'core/layout-builder/intro-text/layout-template-intro-text',
		null,
		$args
	);
}
