<?php
/**
 * Favicons
 *
 * @package WSK_Theme_Support/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Favicons class.
 */
class WSKTS_Favicons {

	/**
	 * Initialise.
	 */
	public static function init() {
		add_action( 'wp_head', array( __CLASS__, 'add_favicons' ) );
	}

	/**
	 * Adds the Favicons.
	 */
	public static function add_favicons() {
		?>
		<link rel="shortcut icon" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/favicon.ico" />

		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/apple-touch-icon-152x152.png" />

		<link rel="icon" type="image/png" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/favicon-128.png" sizes="128x128" />

		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
		<meta name="msapplication-tooltip" content="<?php bloginfo( 'description' ); ?>">
		<meta name="msapplication-TileColor" content="#FFFFFF" />
		<meta name="msapplication-TileImage" content="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="<?php echo esc_url( WSKTS_PLUGIN_URL ); ?>/dist/img/mstile-310x310.png" />
		<?php
	}

}

WSKTS_Favicons::init();
