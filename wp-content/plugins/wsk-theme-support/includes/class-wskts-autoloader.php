<?php
/**
 * WSK Theme Support - Autoloader.
 *
 * @package WSK_Theme_Support
 */

defined( 'ABSPATH' ) || exit;

/**
 * Autoloader class.
 */
class WSKTS_Autoloader {

	/**
	 * Path to the includes directory.
	 *
	 * @var string
	 */
	private $include_path = '';

	/**
	 * Constructor.
	 */
	public function __construct() {
		if ( function_exists( '__autoload' ) ) {
			spl_autoload_register( '__autoload' );
		}

		spl_autoload_register( array( $this, 'autoload' ) );

		$this->include_path = untrailingslashit( plugin_dir_path( WSKTS_PLUGIN_FILE ) ) . '/includes/';
	}

	/**
	 * Take a class name and turn it into a file name.
	 *
	 * @param  string $class_name The class name.
	 * @return string
	 */
	private function get_file_name_from_class( $class_name ) {
		return 'class-' . str_replace( '_', '-', $class_name ) . '.php';
	}

	/**
	 * Include a class file.
	 *
	 * @param  string $path File path.
	 * @return bool Successful or not.
	 */
	private function load_file( $path ) {
		if ( $path && is_readable( $path ) ) {
			include_once $path;
			return true;
		}

		return false;
	}

	/**
	 * Auto-load WSKTS classes on demand to reduce memory consumption.
	 *
	 * @param string $class_name The class name.
	 */
	public function autoload( $class_name ) {
		$class_name = strtolower( $class_name );

		if ( strpos( $class_name, 'wskts_' ) !== 0 ) {
			return;
		}

		$file = $this->get_file_name_from_class( $class_name );
		$path = '';

		if ( empty( $path ) || ! $this->load_file( $path . $file ) ) {
			$this->load_file( $this->include_path . $file );
		}
	}

}

new WSKTS_Autoloader();
