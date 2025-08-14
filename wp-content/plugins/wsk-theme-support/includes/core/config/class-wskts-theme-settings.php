<?php
/**
 * Theme Settings
 *
 * Handles registering a generic "Theme Settings" area in the admin area. Other features can then
 * hook into this to register any fields and settings that are required.
 *
 * @package WSK_Theme_Support/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme Settings class.
 */
class WSKTS_Theme_Settings {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'acf/init', array( __CLASS__, 'add_theme_settings' ) );
	}

	/**
	 * Adds the Theme Settings.
	 *
	 * By default there are no theme settings fields. A filter is provided so that features can
	 * programmatically register any fields and settings that are required.
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf_add_options_sub_page/
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 */
	public static function add_theme_settings() {
		$theme_settings_fields = apply_filters( 'wskts_theme_settings_fields', array() );

		// Only add the options page  and field group if we have fields to populate it with.
		if ( empty( $theme_settings_fields ) ) {
			return;
		}

		acf_add_options_sub_page(
			array(
				'page_title'  => __( 'Theme Settings', 'wsk-theme-support' ),
				'menu_title'  => __( 'Theme Settings', 'wsk-theme-support' ),
				'menu_slug'   => 'theme-settings',
				'parent_slug' => 'options-general.php',
			)
		);

		acf_add_local_field_group(
			array(
				'key'      => 'group_theme_settings',
				'title'    => __( 'Theme Settings', 'wsk-theme-support' ),
				'fields'   => $theme_settings_fields,
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'theme-settings',
						),
					),
				),
			)
		);
	}

}

WSKTS_Theme_Settings::init();
