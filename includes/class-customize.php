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
	 * Theme option default values.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     array
	 */
	public static $default = [
		'content_width'           => PFBT_CONTENT_WIDTH,
		'color_button_background' => '#dc5d33',
		'color_button_text'       => '#ffffff',
	];

	/**
	 * Customizer option IDs.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     array
	 */
	public static $id = [

		'panel' => 'theme_options',

		'section' => [
			'colors' => 'colors',
			'layout' => 'layout',
		],

		'option' => [
			'content_width'           => 'content_width',
			'color_button_background' => 'color_button_background',
			'color_button_text'       => 'color_button_text',
		],
	];

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Actions

			add_action( 'customize_register', __CLASS__ . '::panel' );
			add_action( 'customize_register', __CLASS__ . '::section_colors' );
			add_action( 'customize_register', __CLASS__ . '::section_layout' );

			add_action( 'wp_enqueue_scripts', __CLASS__ . '::styles', 20 );

	} // /init

	/**
	 * Theme options panel.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 *
	 * @return  void
	 */
	public static function panel( WP_Customize_Manager $wp_customize ) {

		$wp_customize->add_panel(
			self::$id['panel'],
			[
				'title'    => esc_html__( 'Theme Options', 'playground-for-beaver-themer' ),
				'priority' => 1,
			]
		);

	} // /panel

	/**
	 * Theme options: Colors.
	 *
	 * @since  1.1.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 *
	 * @return  void
	 */
	public static function section_colors( WP_Customize_Manager $wp_customize ) {

		$priority = 10;

		$wp_customize->add_section(
			self::$id['section']['colors'],
			[
				'title' => esc_html__( 'Colors', 'playground-for-beaver-themer' ),
				'panel' => self::$id['panel'],
			]
		);

			$wp_customize->add_setting(
				self::$id['option']['color_button_background'],
				[
					'default'           => maybe_hash_hex_color( self::$default['color_button_background'] ),
					'transport'         => 'refresh',
					'sanitize_callback' => 'sanitize_hex_color',
				]
			);
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize,
				self::$id['option']['color_button_background'],
				[
					'label'    => esc_html__( 'Button background color', 'playground-for-beaver-themer' ),
					'section'  => self::$id['section']['colors'],
					'priority' => $priority++,
				]
			) );

			$wp_customize->add_setting(
				self::$id['option']['color_button_text'],
				[
					'default'           => maybe_hash_hex_color( self::$default['color_button_text'] ),
					'transport'         => 'refresh',
					'sanitize_callback' => 'sanitize_hex_color',
				]
			);
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize,
				self::$id['option']['color_button_text'],
				[
					'label'    => esc_html__( 'Button text color', 'playground-for-beaver-themer' ),
					'section'  => self::$id['section']['colors'],
					'priority' => $priority++,
				]
			) );

	} // /section_colors

	/**
	 * Theme options: Layout.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 *
	 * @return  void
	 */
	public static function section_layout( WP_Customize_Manager $wp_customize ) {

		$priority = 10;

		$wp_customize->add_section(
			self::$id['section']['layout'],
			[
				'title' => esc_html__( 'Layout', 'playground-for-beaver-themer' ),
				'panel' => self::$id['panel'],
			]
		);

			$wp_customize->add_setting(
				self::$id['option']['content_width'],
				[
					'default'           => absint( self::$default['content_width'] ),
					'transport'         => 'refresh',
					'sanitize_callback' => 'absint',
				]
			);
			$wp_customize->add_control(
				self::$id['option']['content_width'],
				[
					'label'       => esc_html__( 'Content width', 'playground-for-beaver-themer' ),
					'description' => esc_html__( 'WordPress content width variable defines the maximum allowed width for images, videos, and oEmbeds displayed within a theme.', 'playground-for-beaver-themer' ),
					'section'     => self::$id['section']['layout'],
					'type'        => 'number',
					'priority'    => $priority++,
					'input_attrs' => [
						'min'  => 120,
						'max'  => 1920,
						'step' => 1,
					],
				]
			);

	} // /section_layout

	/**
	 * Enqueue inline styles.
	 *
	 * @since  1.1.0
	 *
	 * @return  void
	 */
	public static function styles() {

		wp_add_inline_style(
			'pfbt-base',
			':root {'
			. '--customize--color--button-background: ' . get_theme_mod(
				self::$id['option']['color_button_background'],
				maybe_hash_hex_color( self::$default['color_button_background'] )
			) . ';'
			. '--customize--color--button-text: ' . get_theme_mod(
				self::$id['option']['color_button_text'],
				maybe_hash_hex_color( self::$default['color_button_text'] )
			) . ';'
			. '}'
		);

	} // /styles

}

PfBT_Customize::init();
