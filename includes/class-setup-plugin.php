<?php
/**
 * Beaver Themer plugin setup class.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class PfBT_Setup_Plugin {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.0.2
	 *
	 * @return  void
	 */
	public static function init() {

		// Actions

			add_action( 'pfbt_content', __CLASS__ . '::content' );

		// Filters

			add_filter( 'fl_theme_builder_part_hooks', __CLASS__ . '::parts' );

			add_filter( 'fl_builder_upgrade_url', __CLASS__ . '::url' );

	} // /init

	/**
	 * Is builder active or enabled?
	 *
	 * @since    1.0.1
	 * @version  1.0.2
	 *
	 * @return  bool
	 */
	public static function is_builder(): bool {

		if (
			! is_callable( 'FLBuilderModel::is_builder_active' )
			|| ! is_callable( 'FLBuilderModel::is_builder_enabled' )
		) {

			return false;
		}

		return
			have_posts()
			&& (
				FLBuilderModel::is_builder_active()
				|| FLBuilderModel::is_builder_enabled()
			);

	} // /is_builder

	/**
	 * Content.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  void
	 */
	public static function content() {

		if ( ! class_exists( 'FLThemeBuilder' ) ) {

			// Beaver Themer not active? Display notice.
			get_template_part( 'templates/parts/content/content', 'beaver-themer' );

		} elseif ( self::is_builder() ) {

			// Display Beaver Builder page builder layout if it exists.
			get_template_part( 'templates/parts/content/content', get_post_type() );

		} else {

			// Looks like we have no Themer Layouts: display notice.
			get_template_part( 'templates/parts/content/content', 'themer-layouts' );
		}

	} // /content

	/**
	 * Registers hooks for theme parts.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function parts(): array {

		return [

			[
				'label' => esc_html__( 'HTML page', 'playground-for-beaver-themer' ),
				'hooks' => [

					'pfbt_body_top' =>
						'pfbt_body_top - '
						. esc_html__( 'Located just after opening `<body>` tag.', 'playground-for-beaver-themer' ),

					'pfbt_body_bottom' =>
						'pfbt_body_bottom - '
						. esc_html__( 'Located before closing `<body>` tag, before `wp_footer()`.', 'playground-for-beaver-themer' ),
				],
			],

			[
				'label' => esc_html__( 'Header area', 'playground-for-beaver-themer' ),
				'hooks' => [

					'pfbt_header_before' =>
						'pfbt_header_before - '
						. esc_html__( 'Located before Beaver Themer header template.', 'playground-for-beaver-themer' ),

					'pfbt_header_after' =>
						'pfbt_header_after - '
						. esc_html__( 'Located after Beaver Themer header template.', 'playground-for-beaver-themer' ),
				],
			],

			[
				'label' => esc_html__( 'Footer area', 'playground-for-beaver-themer' ),
				'hooks' => [

					'pfbt_footer_before' =>
						'pfbt_footer_before - '
						. esc_html__( 'Located before Beaver Themer footer template.', 'playground-for-beaver-themer' ),

					'pfbt_footer_after' =>
						'pfbt_footer_after - '
						. esc_html__( 'Located after Beaver Themer footer template.', 'playground-for-beaver-themer' ),
				],
			],
		];

	} // /parts

	/**
	 * Upgrade link URL.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  string $url
	 *
	 * @return  string
	 */
	public static function url( string $url = '' ): string {

		if ( empty( $url ) ) {
			$url = FL_BUILDER_STORE_URL;
		}

		return trailingslashit( $url ) . 'fla/67/';

	} // /url

}

PfBT_Setup_Plugin::init();
