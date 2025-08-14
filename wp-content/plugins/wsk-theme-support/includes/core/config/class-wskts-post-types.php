<?php
/**
 * Post Types
 *
 * Registers post types.
 *
 * @package WSK_Theme_Support/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Post Types Class.
 */
class WSKTS_Post_Types {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_post_types' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ) );

		add_action( 'wskts_after_register_post_types', array( __CLASS__, 'flush_rewrite_rules' ) );
		add_action( 'wskts_after_register_taxonomies', array( __CLASS__, 'flush_rewrite_rules' ) );
	}

	/**
	 * Register post types.
	 */
	public static function register_post_types() {
		if ( ! is_blog_installed() ) {
			return;
		}

		do_action( 'wskts_before_register_post_types' );

		do_action( 'wskts_register_post_types' );

		do_action( 'wskts_after_register_post_types' );
	}

	/**
	 * Register taxonomies.
	 */
	public static function register_taxonomies() {
		if ( ! is_blog_installed() ) {
			return;
		}

		do_action( 'wskts_before_register_taxonomies' );

		do_action( 'wskts_register_taxonomies' );

		do_action( 'wskts_after_register_taxonomies' );
	}

	/**
	 * Flush rewrite rules.
	 */
	public static function flush_rewrite_rules() {
		flush_rewrite_rules();
	}

}

WSKTS_Post_Types::init();
