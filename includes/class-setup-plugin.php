<?php defined( 'ABSPATH' ) || exit;
/**
 * Beaver Themer plugin setup class.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.1
 */
class PfBT_Setup_Plugin {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.0.1
	 */
	public static function init() {
		add_action( 'pfbt_content', __CLASS__ . '::notice' );
		add_action( 'pfbt_content', __CLASS__ . '::content' );

		add_filter( 'fl_theme_builder_part_hooks', __CLASS__ . '::parts' );
		add_filter( 'fl_builder_upgrade_url', __CLASS__ . '::url' );
	}

	/**
	 * Is builder active or enabled?
	 *
	 * @since    1.0.1
	 * @version  1.0.1
	 */
	public static function is_builder() {
		if (
			! is_callable( 'FLBuilderModel::is_builder_active' )
			|| ! is_callable( 'FLBuilderModel::is_builder_enabled' )
		) {
			return false;
		}

		return FLBuilderModel::is_builder_active() || FLBuilderModel::is_builder_enabled();
	}

	/**
	 * Front-end notice.
	 *
	 * This is displayed only when WordPress found posts
	 * but there is no Beaver Themer layout to display.
	 *
	 * @since    1.0.0
	 * @version  1.0.1
	 */
	public static function notice() {
		if ( ! class_exists( 'FLThemeBuilder' ) ) {
			// Beaver Themer not active?
			get_template_part( 'templates/parts/content/content', 'beaver-themer' );
		} else if ( ! self::is_builder() ) {
			// Looks like we have no Themer Layouts...
			get_template_part( 'templates/parts/content/content', 'themer-layouts' );
		}
	}

	/**
	 * Display page builder layout if it exists.
	 *
	 * Allows displaying custom page builder layout if it exists,
	 * such as pages built with Beaver Builder. This will bypass
	 * the Beaver Themer layout.
	 *
	 * @since    1.0.1
	 * @version  1.0.1
	 */
	public static function content() {
		if ( self::is_builder() ) {
			get_template_part( 'templates/parts/content/content', get_post_type() );
		}
	}

	/**
	 * Registers hooks for theme parts.
	 *
	 * @since    1.0.0
	 * @version  1.0.0
	 */
	public static function parts() {
		return array(

			array(
				'label' => esc_html__( 'HTML page', 'playground-for-beaver-themer' ),
				'hooks' => array(
					'pfbt_body_top'    => 'pfbt_body_top - ' . esc_html__( 'Located just after opening `<body>` tag.', 'playground-for-beaver-themer' ),
					'pfbt_body_bottom' => 'pfbt_body_bottom - ' . esc_html__( 'Located before closing `<body>` tag, before `wp_footer()`.', 'playground-for-beaver-themer' ),
				),
			),

			array(
				'label' => esc_html__( 'Header area', 'playground-for-beaver-themer' ),
				'hooks' => array(
					'pfbt_header_before' => 'pfbt_header_before - ' . esc_html__( 'Located before Beaver Themer header template.', 'playground-for-beaver-themer' ),
					'pfbt_header_after'  => 'pfbt_header_after - ' . esc_html__( 'Located after Beaver Themer header template.', 'playground-for-beaver-themer' ),
				),
			),

			array(
				'label' => esc_html__( 'Footer area', 'playground-for-beaver-themer' ),
				'hooks' => array(
					'pfbt_footer_before' => 'pfbt_footer_before - ' . esc_html__( 'Located before Beaver Themer footer template.', 'playground-for-beaver-themer' ),
					'pfbt_footer_after'  => 'pfbt_footer_after - ' . esc_html__( 'Located after Beaver Themer footer template.', 'playground-for-beaver-themer' ),
				),
			),

		);
	}

	/**
	 * Upgrade link URL.
	 *
	 * @since    1.0.0
	 * @version  1.0.0
	 *
	 * @param  string $url
	 */
	public static function url( $url ) {
		return esc_url( add_query_arg( 'fla', '67', $url ) );
	}

}

PfBT_Setup_Plugin::init();
