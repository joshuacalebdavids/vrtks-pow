<?php
/**
 * Company Details
 *
 * Handles registering a generic "Company Details" area in the admin area. Other features can then
 * hook into this to register any fields and settings that are required.
 *
 * @package WSK_Theme_Support/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Company Details class.
 */
class WSKTS_Company_Details {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'acf/init', array( __CLASS__, 'add_company_details' ) );
	}

	/**
	 * Adds the Company Details.
	 *
	 * By default there are no Company Details fields. A filter is provided so that features can
	 * programmatically register any fields and settings that are required.
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf_add_options_sub_page/
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 */
	public static function add_company_details() {
		$company_details_fields = apply_filters( 'wskts_company_details_fields', array() );

		// Only add the options page and field group if we have fields to populate it with.
		if ( empty( $company_details_fields ) ) {
			return;
		}

		acf_add_options_page(
			array(
				'page_title' => __( 'Company Details', 'wsk-theme-support' ),
				'menu_title' => __( 'Company Details', 'wsk-theme-support' ),
				'menu_slug'  => 'company-details',
			)
		);

		acf_add_local_field_group(
			array(
				'key'      => 'group_company_details',
				'title'    => __( 'Company Details', 'wsk-theme-support' ),
				'fields'   => $company_details_fields,
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'company-details',
						),
					),
				),
			)
		);
	}

}

WSKTS_Company_Details::init();
