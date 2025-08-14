<?php
/**
 * Career
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Career Class.
 */
class WSKTS_Career {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'wskts_register_post_types', array( __CLASS__, 'register_career_post_type' ) );

		add_action( 'acf/init', array( __CLASS__, 'register_career_fields' ) );
	}

	/**
	 * Register Career post type.
	 */
	public static function register_career_post_type() {
		if ( ! post_type_exists( 'career' ) ) {
			register_post_type(
				'career',
				apply_filters(
					'wskts_register_career_post_type',
					array(
						'labels'              => array(
							'name'               => __( 'Careers', 'wsk-theme-support' ),
							'singular_name'      => __( 'Career', 'wsk-theme-support' ),
							'add_new_item'       => __( 'Add New Career', 'wsk-theme-support' ),
							'edit_item'          => __( 'Edit Career', 'wsk-theme-support' ),
							'new_item'           => __( 'New Career', 'wsk-theme-support' ),
							'view_item'          => __( 'View Career', 'wsk-theme-support' ),
							'view_items'         => __( 'View Careers', 'wsk-theme-support' ),
							'search_items'       => __( 'Search Careers', 'wsk-theme-support' ),
							'not_found'          => __( 'No careers found', 'wsk-theme-support' ),
							'not_found_in_trash' => __( 'No careers found in Trash', 'wsk-theme-support' ),
							'all_items'          => __( 'All Careers', 'wsk-theme-support' ),
						),
						'description'         => __( 'This is the career post type', 'wsk-theme-support' ),
						'public'              => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => false,
						'show_ui'             => true,
						'show_in_nav_menus'   => false,
						'show_in_menu'        => true,
						'show_in_admin_bar'   => false,
						'menu_position'       => 7,
						'menu_icon'           => 'dashicons-id-alt', // Use dashicons for menu icon: https://developer.wordpress.org/resource/dashicons/.
						'capability_type'     => 'post',
						'hierarchical'        => false,
						'supports'            => array(
							'title',
							'page-attributes',
						),
						'has_archive'         => false,
					)
				)
			);
		}
	}

	/**
	 * Register Career fields.
	 */
	public static function register_career_fields() {
		acf_add_local_field_group(
			array(
				'key'      => 'group_career',
				'title'    => __( 'Details', 'wsk-theme-support' ),
				'fields'   => array(
					array(
						'key'   => 'field_career_excerpt',
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
							'value'    => 'career',
						),
					),
				),
			)
		);
	}

}

WSKTS_Career::init();
