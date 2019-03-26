<?php defined( 'ABSPATH' ) || exit;
/**
 * Theme customization class.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.0
 */
class PfBT_Customize {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.0.0
	 */
	public static function init() {
		add_action( 'customize_register', __CLASS__ . '::theme_options' );
	}

	/**
	 * Theme customizer options.
	 *
	 * @since    1.0.0
	 * @version  1.0.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 */
	public static function theme_options( $wp_customize ) {
		$priority  = 10;

		// Panel.
		$wp_customize->add_panel(
			'theme_options',
			array(
				'title'    => esc_html__( 'Theme Options', 'playground-for-beaver-themer' ),
				'priority' => 1,
			)
		);

			// Section: Layout.
			$wp_customize->add_section(
				'layout',
				array(
					'title' => esc_html__( 'Layout', 'playground-for-beaver-themer' ),
					'panel' => 'theme_options',
				)
			);

				// Option: layout/content_width.
				$wp_customize->add_setting(
					'content_width',
					array(
						'default'           => PFBT_CONTENT_WIDTH,
						'transport'         => 'refresh',
						'sanitize_callback' => 'absint',
					)
				);
				$wp_customize->add_control(
					'content_width',
					array(
						'label'       => esc_html__( 'Content width', 'playground-for-beaver-themer' ),
						'description' => esc_html__( 'WordPress content width variable defines the maximum allowed width for images, videos, and oEmbeds displayed within a theme.', 'playground-for-beaver-themer' ),
						'section'     => 'layout',
						'type'        => 'number',
						'priority'    => $priority++,
						'input_attrs' => array(
							'min'  => 120,
							'max'  => 1920,
							'step' => 1,
						),
					)
				);
	}

}

PfBT_Customize::init();
