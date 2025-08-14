<?php
/**
 * Social Networks
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Social Networks class.
 */
class WSKTS_Social_Networks {
	/**
	 * Array of available Social Networks.
	 *
	 * @var array
	 */
	public static $social_networks = array(
		array(
			'key'  => 'twitter-x',
			'name' => 'X',
		),
		array(
			'key'  => 'linkedin',
			'name' => 'LinkedIn',
		),
		array(
			'key'  => 'facebook',
			'name' => 'Facebook',
		),
		array(
			'key'  => 'instagram',
			'name' => 'Instagram',
		),
		array(
			'key'  => 'youtube',
			'name' => 'YouTube',
		),
	);

	/**
	 * Array of Supported Social Network Keys.
	 *
	 * TODO: Replace with a filter in the theme.
	 *
	 * @var array
	 */
	public static $supported_social_networks = array(
		'facebook',
		'instagram',
		'linkedin',
		'twitter-x',
		'youtube',
	);

	/**
	 * Initialise.
	 */
	public static function init() {
		add_filter( 'wskts_company_details_fields', array( __CLASS__, 'add_social_networks_fields' ) );
	}

	/**
	 * Adds the Social Networks fields.
	 *
	 * @param array $fields Array of fields.
	 */
	public static function add_social_networks_fields( $fields ) {
		$social_networks_fields = array(
			array(
				'key'   => 'tab_social_networks',
				'label' => __( 'Social Networks', 'wsk-theme-support' ),
				'name'  => '',
				'type'  => 'tab',
			),
		);

		foreach ( self::$social_networks as $social_network ) {
			if ( in_array( $social_network['key'], self::$supported_social_networks, true ) ) {
				$social_networks_fields[] = array(
					'key'   => 'field_social_networks_' . $social_network['key'] . '_url',
					'label' => $social_network['name'] . ' ' . __( 'URL', 'wsk-theme-support' ),
					'name'  => 'social_networks_' . $social_network['key'] . '_url',
					'type'  => 'url',
				);
			}
		}

		return array_merge( $fields, $social_networks_fields );
	}

	/**
	 * Return the Social Networks data.
	 */
	public static function get_social_networks() {
		$social_networks = array();

		foreach ( self::$social_networks as $social_network ) {
			if ( in_array( $social_network['key'], self::$supported_social_networks, true ) ) {
				$social_networks[] = array(
					'key'  => $social_network['key'],
					'name' => $social_network['name'],
					'url'  => get_field( 'social_networks_' . $social_network['key'] . '_url', 'option' ),
				);
			}
		}

		return $social_networks;
	}

}

WSKTS_Social_Networks::init();
