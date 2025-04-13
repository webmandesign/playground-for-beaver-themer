<?php
/**
 * Theme customization class.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class PfBT_Customize {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Actions

			add_action( 'customize_register', __CLASS__ . '::theme_options' );

	} // /init

	/**
	 * Theme customizer options.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 *
	 * @return  void
	 */
	public static function theme_options( WP_Customize_Manager $wp_customize ) {

		$priority  = 10;

		// Panel.
		$wp_customize->add_panel(
			'theme_options',
			[
				'title'    => esc_html__( 'Theme Options', 'playground-for-beaver-themer' ),
				'priority' => 1,
			]
		);

			// Section: Layout.
			$wp_customize->add_section(
				'layout',
				[
					'title' => esc_html__( 'Layout', 'playground-for-beaver-themer' ),
					'panel' => 'theme_options',
				]
			);

				// Option: layout/content_width.
				$wp_customize->add_setting(
					'content_width',
					[
						'default'           => PFBT_CONTENT_WIDTH,
						'transport'         => 'refresh',
						'sanitize_callback' => 'absint',
					]
				);
				$wp_customize->add_control(
					'content_width',
					[
						'label'       => esc_html__( 'Content width', 'playground-for-beaver-themer' ),
						'description' => esc_html__( 'WordPress content width variable defines the maximum allowed width for images, videos, and oEmbeds displayed within a theme.', 'playground-for-beaver-themer' ),
						'section'     => 'layout',
						'type'        => 'number',
						'priority'    => $priority++,
						'input_attrs' => [
							'min'  => 120,
							'max'  => 1920,
							'step' => 1,
						],
					]
				);

	} // /theme_options

}

PfBT_Customize::init();
