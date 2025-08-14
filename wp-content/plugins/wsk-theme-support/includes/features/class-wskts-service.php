<?php
/**
 * Service
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Service Class.
 */
class WSKTS_Service {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'wskts_register_post_types', array( __CLASS__, 'register_service_post_type' ) );

		add_action( 'acf/init', array( __CLASS__, 'register_service_fields' ) );
	}

	/**
	 * Register Service post type.
	 */
	public static function register_service_post_type() {
		if ( ! post_type_exists( 'service' ) ) {
			register_post_type(
				'service',
				apply_filters(
					'wskts_register_service_post_type',
					array(
						'labels'              => array(
							'name'               => __( 'Services', 'wsk-theme-support' ),
							'singular_name'      => __( 'Service', 'wsk-theme-support' ),
							'add_new_item'       => __( 'Add New Service', 'wsk-theme-support' ),
							'edit_item'          => __( 'Edit Service', 'wsk-theme-support' ),
							'new_item'           => __( 'New Service', 'wsk-theme-support' ),
							'view_item'          => __( 'View Service', 'wsk-theme-support' ),
							'view_items'         => __( 'View Services', 'wsk-theme-support' ),
							'search_items'       => __( 'Search Services', 'wsk-theme-support' ),
							'not_found'          => __( 'No services found', 'wsk-theme-support' ),
							'not_found_in_trash' => __( 'No services found in Trash', 'wsk-theme-support' ),
							'all_items'          => __( 'All Services', 'wsk-theme-support' ),
						),
						'description'         => __( 'This is the service post type', 'wsk-theme-support' ),
						'public'              => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => true,
						'show_ui'             => true,
						'show_in_nav_menus'   => true,
						'show_in_menu'        => true,
						'show_in_admin_bar'   => false,
						'menu_position'       => 7,
						'menu_icon'           => 'dashicons-analytics', // Use dashicons for menu icon: https://developer.wordpress.org/resource/dashicons/.
						'capability_type'     => 'post',
						'hierarchical'        => true,
						'supports'            => array(
							'title',
							'thumbnail',
							'page-attributes',
						),
						'has_archive'         => false,
					)
				)
			);
		}
	}

	/**
	 * Register Service fields.
	 */
	public static function register_service_fields() {
		$fields = array(
			array(
				'key'   => 'field_service_excerpt',
				'label' => __( 'Excerpt', 'wsk-theme-support' ),
				'name'  => 'excerpt',
				'type'  => 'textarea',
			),
		);

		acf_add_local_field_group(
			array(
				'key'      => 'group_service',
				'title'    => __( 'Details', 'wsk-theme-support' ),
				'fields'   => $fields,
				'location' => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'service',
						),
					),
				),
			)
		);
	}

}

WSKTS_Service::init();
