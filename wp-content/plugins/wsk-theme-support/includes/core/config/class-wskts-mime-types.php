<?php
/**
 * Mime Types
 *
 * Registers mime types.
 *
 * @package WSK_Theme_Support/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Mime Types Class.
 */
class WSKTS_Mime_Types {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'upload_mimes', array( __CLASS__, 'register_mime_types' ) );
	}

	/**
	 * Register mime types.
	 *
	 * @param array $mimes The supported mime types.
	 */
	public static function register_mime_types( $mimes ) {
		$mimes['json'] = 'text/plain';

		return $mimes;
	}

}

WSKTS_Mime_Types::init();
