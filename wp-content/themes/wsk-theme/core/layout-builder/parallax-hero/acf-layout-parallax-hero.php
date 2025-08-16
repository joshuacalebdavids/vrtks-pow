<?php

/**
 * ACF Layout - Parallax Hero
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_parallax_hero($layouts)
{
	$layouts['layout_parallax_hero'] = array(
		'key'        => 'layout_parallax_hero',
		'label'      => __('Parallax Hero', 'wsk-theme'),
		'name'       => 'parallax_hero',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_parallax_hero_title',
				'label' => __('Title', 'wsk-theme'),
				'name'  => 'title',
				'type'  => 'text',
				'instructions' => __('This will be output inside an H1 tag.', 'wsk-theme'),
			),
			array(
				'key'   => 'field_layout_parallax_hero_content',
				'label' => __('Content', 'wsk-theme'),
				'name'  => 'content',
				'type'  => 'text',
				'instructions' => __('This will be output inside an p tag.', 'wsk-theme'),
			),
			array(
				'key'   => 'field_layout_parallax_hero_client_logos',
				'label' => __('Client Logos', 'wsk-theme'),
				'name'  => 'logos',
				'type'  => 'gallery',
				'instructions' => __('Add client logos here. These will be displayed in the logos section.', 'wsk-theme'),
				'required' => 0,
				'return_format' => 'array',
				'preview_size' => 'full',
				'insert' => 'append',
			),

		),
	);

	return $layouts;
}
add_action('wskt_layout_builder_layouts', 'wskt_add_acf_layout_parallax_hero');

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_parallax_hero()
{
	$attrs = array();

	$attrs['title']    = get_sub_field('title');
	$attrs['content']    = get_sub_field('content');
	$attrs['logos']    = get_sub_field('logos');

	wskt_layout_parallax_hero($attrs);
}
add_action('wskt_layout_builder_layout_parallax_hero', 'wskt_acf_layout_parallax_hero');
