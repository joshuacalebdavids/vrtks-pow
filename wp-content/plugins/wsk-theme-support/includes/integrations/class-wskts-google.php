<?php
/**
 * Google
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Google class.
 */
class WSKTS_Google {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_filter( 'wskts_theme_settings_fields', array( __CLASS__, 'add_google_fields' ) );
		add_filter( 'acf/settings/google_api_key', array( __CLASS__, 'add_acf_google_api_key_setting' ) );
	}

	/**
	 * Adds the Google fields.
	 *
	 * @param array $fields Array of fields.
	 */
	public static function add_google_fields( $fields ) {
		$google_fields = array(
			array(
				'key'   => 'tab_google',
				'label' => __( 'Google', 'wsk-theme-support' ),
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_google_api_key',
				'label' => __( 'Google API Key', 'wsk-theme-support' ),
				'name'  => 'google_api_key',
				'type'  => 'text',
			),
		);

		return array_merge( $fields, $google_fields );
	}

	/**
	 * Get the "Google API Key".
	 */
	public static function get_google_api_key() {
		return get_field( 'google_api_key', 'option' );
	}

	/**
	 * Register Google API key with ACF.
	 */
	public static function add_acf_google_api_key_setting() {
		return self::get_google_api_key();
	}

}

WSKTS_Google::init();
