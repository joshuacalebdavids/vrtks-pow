<?php
/**
 * Contact Details
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Contact Details class.
 */
class WSKTS_Contact_Details {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_filter( 'wskts_company_details_fields', array( __CLASS__, 'add_contact_details_fields' ) );
	}

	/**
	 * Adds the Contact Details fields.
	 *
	 * @param array $fields Array of fields.
	 */
	public static function add_contact_details_fields( $fields ) {
		$contact_details_fields = array(
			array(
				'key'   => 'tab_contact_details',
				'label' => __( 'Contact Details', 'wsk-theme-support' ),
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_contact_details_address',
				'label' => __( 'Address', 'wsk-theme-support' ),
				'name'  => 'contact_details_address',
				'type'  => 'textarea',
			),
			array(
				'key'   => 'field_contact_details_phone_number',
				'label' => __( 'Phone Number', 'wsk-theme-support' ),
				'name'  => 'contact_details_phone_number',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_contact_details_email',
				'label' => __( 'Email', 'wsk-theme-support' ),
				'name'  => 'contact_details_email',
				'type'  => 'email',
			),
		);

		return array_merge( $fields, $contact_details_fields );
	}

}

WSKTS_Contact_Details::init();
