<?php
/**
 * Case Study
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Case Study Class.
 */
class WSKTS_Case_Study {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'wskts_register_post_types', array( __CLASS__, 'register_case_study_post_type' ) );

		add_action( 'acf/init', array( __CLASS__, 'register_case_study_fields' ) );
	}

	/**
	 * Register Case Study post type.
	 */
	public static function register_case_study_post_type() {
		if ( ! post_type_exists( 'case-study' ) ) {
			register_post_type(
				'case-study',
				apply_filters(
					'wskts_register_case_study_post_type',
					array(
						'labels'              => array(
							'name'               => __( 'Case Studies', 'wsk-theme-support' ),
							'singular_name'      => __( 'Case Study', 'wsk-theme-support' ),
							'add_new_item'       => __( 'Add New Case Study', 'wsk-theme-support' ),
							'edit_item'          => __( 'Edit Case Study', 'wsk-theme-support' ),
							'new_item'           => __( 'New Case Study', 'wsk-theme-support' ),
							'view_item'          => __( 'View Case Study', 'wsk-theme-support' ),
							'view_items'         => __( 'View Case Studies', 'wsk-theme-support' ),
							'search_items'       => __( 'Search Case Studies', 'wsk-theme-support' ),
							'not_found'          => __( 'No case studies found', 'wsk-theme-support' ),
							'not_found_in_trash' => __( 'No case studies found in Trash', 'wsk-theme-support' ),
							'all_items'          => __( 'All Case Studies', 'wsk-theme-support' ),
						),
						'description'         => __( 'This is the case study post type', 'wsk-theme-support' ),
						'public'              => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => true,
						'show_ui'             => true,
						'show_in_nav_menus'   => false,
						'show_in_menu'        => true,
						'show_in_admin_bar'   => false,
						'menu_position'       => 5,
						'menu_icon'           => 'dashicons-admin-post', // Use dashicons for menu icon: https://developer.wordpress.org/resource/dashicons/.
						'capability_type'     => 'post',
						'hierarchical'        => false,
						'supports'            => array(
							'title',
							'editor',
							'thumbnail',
							'page-attributes',
						),
						'has_archive'         => true,
					)
				)
			);
		}
	}

	/**
	 * Register Case Study fields.
	 */
	public static function register_case_study_fields() {
		acf_add_local_field_group(
			array(
				'key'      => 'group_case_study',
				'title'    => __( 'Details', 'wsk-theme-support' ),
				'fields'   => array(
					array(
						'key'          => 'field_case_study_media',
						'label'        => __( 'Case Study', 'wsk-theme-support' ),
						'name'         => 'media',
						'type'         => 'clone',
						'clone'        => array(
							0 => 'field_media',
						),
						'display'      => 'seamless',
						'prefix_name'  => true,
						'prefix_label' => true,
					),
					array(
						'key'   => 'field_case_study_intro',
						'label' => __( 'Intro', 'wsk-theme-support' ),
						'name'  => 'intro',
						'type'  => 'textarea',
					),
					array(
						'key'   => 'field_case_study_excerpt',
						'label' => __( 'Excerpt', 'wsk-theme-support' ),
						'name'  => 'excerpt',
						'type'  => 'textarea',
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'case-study',
						),
					),
				),
			)
		);
	}

}

WSKTS_Case_Study::init();
