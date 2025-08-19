 <?php

	/**
	 * ACF Layout - Intro Text
	 *
	 * @package WSK_Theme/Core
	 */

	defined('ABSPATH') || exit;

	/**
	 * Add layout and fields to layout builder.
	 *
	 * @param array $layouts Layouts.
	 */
	function wskt_add_acf_layout_intro_text($layouts)
	{
		$layouts['layout_intro_text'] = array(
			'key'        => 'layout_intro_text',
			'label'      => __('Intro Text', 'wsk-theme'),
			'name'       => 'intro_text',
			'sub_fields' => array(
				array(
					'key'   => 'field_layout_intro_text_title',
					'label' => __('Title', 'wsk-theme'),
					'name'  => 'title',
					'type'  => 'text',
				),
				array(
					'key'          => 'field_layout_intro_text_featured_post',
					'label'        => __('Featured Post', 'wsk-theme'),
					'name'         => 'featured_post',
					'type'         => 'post_object',
					'post_type'    => array('post'),
					'return_format' => 'object',
					'ui'           => 1,
					'multiple'     => 0,
					'allow_null'   => 0,
				),
				array(
					'key'          => 'field_layout_intro_text_image_left',
					'label'        => __('Image Left', 'wsk-theme'),
					'name'         => 'image_left',
					'type'         => 'image',
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library'      => 'all',
				),

				array(
					'key'          => 'field_layout_intro_text_image_right',
					'label'        => __('Image Right', 'wsk-theme'),
					'name'         => 'image_right',
					'type'         => 'image',
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library'      => 'all',
				),
				array(
					'key'     => 'field_layout_intro_text_colour_scheme',
					'label'   => __('Colour Scheme', 'wsk-theme'),
					'name'    => 'colour_scheme',
					'type'    => 'clone',
					'clone'   => array(
						0 => 'field_colour_scheme',
					),
					'display' => 'seamless',
				),
			),
		);

		return $layouts;
	}
	add_action('wskt_layout_builder_layouts', 'wskt_add_acf_layout_intro_text');

	/**
	 * Hook template into layout builder.
	 */
	function wskt_acf_layout_intro_text()
	{
		$attrs = array();

		$attrs['title']         = get_sub_field('title');
		$attrs['featured_post'] = get_sub_field('featured_post');
		$attrs['image_left'] 	= get_sub_field('image_left');
		$attrs['image_right']   = get_sub_field('image_right');
		$attrs['colour_scheme'] = get_sub_field('colour_scheme');

		wskt_layout_intro_text($attrs);
	}
	add_action('wskt_layout_builder_layout_intro_text', 'wskt_acf_layout_intro_text');
