<?php
/**
 * Team
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Team Class.
 */
class WSKTS_Team {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'wskts_register_post_types', array( __CLASS__, 'register_team_member_post_type' ) );
		add_action( 'wskts_register_taxonomies', array( __CLASS__, 'register_team_member_taxonomy_department' ) );

		add_action( 'acf/init', array( __CLASS__, 'register_team_member_fields' ) );
	}

	/**
	 * Register Team Member post type.
	 */
	public static function register_team_member_post_type() {
		if ( ! post_type_exists( 'team-member' ) ) {
			register_post_type(
				'team-member',
				apply_filters(
					'wskts_register_team_member_post_type',
					array(
						'labels'              => array(
							'name'               => __( 'Team Members', 'wsk-theme-support' ),
							'singular_name'      => __( 'Team Member', 'wsk-theme-support' ),
							'add_new_item'       => __( 'Add New Team Member', 'wsk-theme-support' ),
							'edit_item'          => __( 'Edit Team Member', 'wsk-theme-support' ),
							'new_item'           => __( 'New Team Member', 'wsk-theme-support' ),
							'view_item'          => __( 'View Team Member', 'wsk-theme-support' ),
							'view_items'         => __( 'View Team Members', 'wsk-theme-support' ),
							'search_items'       => __( 'Search Team Members', 'wsk-theme-support' ),
							'not_found'          => __( 'No team members found', 'wsk-theme-support' ),
							'not_found_in_trash' => __( 'No team members found in Trash', 'wsk-theme-support' ),
							'all_items'          => __( 'All Team Members', 'wsk-theme-support' ),
						),
						'description'         => __( 'This is the team member post type', 'wsk-theme-support' ),
						'public'              => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => false,
						'show_ui'             => true,
						'show_in_nav_menus'   => false,
						'show_in_menu'        => true,
						'show_in_admin_bar'   => false,
						'menu_position'       => 7,
						'menu_icon'           => 'dashicons-groups', // Use dashicons for menu icon: https://developer.wordpress.org/resource/dashicons/.
						'capability_type'     => 'post',
						'hierarchical'        => false,
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
	 * Register Team Member Taxonomy : Department.
	 */
	public static function register_team_member_taxonomy_department() {
		register_taxonomy(
			'team_member_department',
			'team-member',
			array(
				'labels'            => array(
					'name'              => _x( 'Departments', 'taxonomy general name', 'wsk-theme-support' ),
					'singular_name'     => _x( 'Department', 'taxonomy singular name', 'wsk-theme-support' ),
					'menu_name'         => __( 'Departments', 'wsk-theme-support' ),
					'all_items'         => __( 'All Departments', 'wsk-theme-support' ),
					'edit_item'         => __( 'Edit Department', 'wsk-theme-support' ),
					'view_item'         => __( 'View Department', 'wsk-theme-support' ),
					'update_item'       => __( 'Update Department', 'wsk-theme-support' ),
					'add_new_item'      => __( 'Add New Department', 'wsk-theme-support' ),
					'new_item_name'     => __( 'New Department Name', 'wsk-theme-support' ),
					'parent_item'       => __( 'Parent Department', 'wsk-theme-support' ),
					'parent_item_colon' => __( 'Parent Department:', 'wsk-theme-support' ),
					'search_items'      => __( 'Search Departments', 'wsk-theme-support' ),
				),
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'hierarchical'      => true,
				'rewrite'           => array( 'slug' => 'department' ),
			)
		);
	}

	/**
	 * Register Team Member fields.
	 */
	public static function register_team_member_fields() {
		acf_add_local_field_group(
			array(
				'key'      => 'group_team_member',
				'title'    => __( 'Details', 'wsk-theme-support' ),
				'fields'   => array(
					array(
						'key'   => 'field_team_member_role',
						'label' => __( 'Role', 'wsk-theme-support' ),
						'name'  => 'team_member_role',
						'type'  => 'text',
					),
					array(
						'key'          => 'field_team_member_bio',
						'label'        => __( 'Bio', 'wsk-theme-support' ),
						'name'         => 'team_member_bio',
						'type'         => 'wysiwyg',
						'media_upload' => 0,
						'delay'        => 1,
					),
					array(
						'key'   => 'field_team_member_email',
						'label' => __( 'Email', 'wsk-theme-support' ),
						'name'  => 'team_member_email',
						'type'  => 'email',
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'team-member',
						),
					),
				),
			)
		);
	}

}

WSKTS_Team::init();
