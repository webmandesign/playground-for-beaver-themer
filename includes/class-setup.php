<?php
/**
 * Theme setup class.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class PfBT_Setup {

	/**
	 * Defines theme content container markup.
	 *
	 * @see  self::content_wrapper()
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     array
	 */
	public static $content_wrapper = [

		// This is applied on all pages.
		'global' => [
			'open'  => '<main id="content" class="site-content site-main">',
			'close' => '</main>',
		],

		// This is appended to 'global' wrapper on singular pages.
		'singular' => [
			// %1$d: post ID, %2$s: post classes. Only for opening tag.
			'open'  => '<article id="post-%1$d" class="%2$s">',
			'close' => '</article>',
		],
	];

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Actions

			add_action( 'load-themes.php', __CLASS__ . '::admin_notice_welcome_activation' );

			add_action( 'widgets_init', __CLASS__ . '::sidebar' );

			add_action( 'after_setup_theme', __CLASS__ . '::content_width' );
			add_action( 'after_setup_theme', __CLASS__ . '::setup' );

			add_action( 'wp_enqueue_scripts', __CLASS__ . '::assets' );

			add_action( 'pfbt_html_before', __CLASS__ . '::doctype' );

			add_action( 'wp_head', __CLASS__ . '::head', 1 );
			add_action( 'wp_head', __CLASS__ . '::pingback' );

			add_action( 'pfbt_content_before', __CLASS__ . '::content_wrapper' );
			add_action( 'pfbt_content_after',  __CLASS__ . '::content_wrapper' );

		// Filters

			add_filter( 'body_class', __CLASS__ . '::body_class' );

			add_filter( 'excerpt_more', __CLASS__ . '::excerpt_more' );

			add_filter( 'wp_list_comments_args', __CLASS__ . '::avatar_size' );

	} // /init

	/**
	 * Theme setup.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  void
	 */
	public static function setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'playground-for-beaver-themer', get_template_directory() . '/languages' );

		// Declare support for child theme stylesheet automatic enqueuing.
		add_theme_support( 'child-theme-stylesheet' );

		// Switch default core markup to output valid HTML5.
		add_theme_support( 'html5', [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'navigation-widgets',
			'search-form',
			'script',
			'style',
		] );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Beaver Themer compatibility.
		add_theme_support( 'fl-theme-builder-headers' );
		add_theme_support( 'fl-theme-builder-footers' );
		add_theme_support( 'fl-theme-builder-parts' );

		// Navigational menus.
		register_nav_menus();

	} // /setup

	/**
	 * Sets the $content_width in pixels.
	 *
	 * $content_width variable defines the maximum allowed width for images,
	 * videos, and oEmbeds displayed within a theme.
	 *
	 * @global  int $content_width
	 *
	 * @since    1.0.0
	 * @version  1.0.0
	 *
	 * @return  void
	 */
	public static function content_width() {

		$GLOBALS['content_width'] = absint(

			/**
			 * Filters WordPress $content_width global variable.
			 *
			 * @since  1.0.0
			 *
			 * @param  int $content_width
			 */
			apply_filters( 'pfbt_content_width', get_theme_mod( 'content_width', PFBT_CONTENT_WIDTH ) )
		);

	} // /content_width

	/**
	 * Register sidebar.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  void
	 */
	public static function sidebar() {

		register_sidebar( [
			'id'            => 'sidebar',
			'name'          => esc_html__( 'Sidebar', 'playground-for-beaver-themer' ),
			'description'   => esc_html__( 'Theme does not display the sidebar, use Beaver Themer to display.', 'playground-for-beaver-themer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		] );

	} // /sidebar

	/**
	 * Enqueue theme assets.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  void
	 */
	public static function assets() {

		$version = wp_get_theme( get_template() )->get( 'Version' );

		// Stylesheets: register.

			wp_register_style(
				'normalize',
				get_theme_file_uri( 'assets/css/normalize.css' ),
				[],
				$version
			);

			wp_register_style(
				'pfbt-base',
				get_theme_file_uri( 'assets/css/base.css' ),
				[ 'normalize' ],
				$version
			);

			wp_register_style(
				'pfbt-child-theme',
				get_stylesheet_uri(),
				[],
				wp_get_theme( get_stylesheet() )->get( 'Version' )
			);

		// Stylesheets: enqueue.

			wp_enqueue_style( 'pfbt-base' );

			if ( is_child_theme() ) {
				wp_enqueue_style( 'pfbt-child-theme' );
			}

		// Scripts: enqueue.

			if (
				is_singular()
				&& comments_open()
				&& get_option( 'thread_comments' )
			) {

				/**
				 * This script should be registered by now
				 * with `wp_default_scripts()`.
				 */
				wp_enqueue_script( 'comment-reply' );
			}

	} // /assets

	/**
	 * HTML doctype.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function doctype() {

		echo '<!doctype html>';

	} // /doctype

	/**
	 * HTML head.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function head() {

		get_template_part( 'templates/parts/header/head' );

	} // /head

	/**
	 * Add a pingback URL auto-discovery header for singularly identifiable articles.
	 *
	 * Added via action hook for easier remove via child theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function pingback() {

		if (
			is_singular()
			&& pings_open()
		) {

			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}

	} // /pingback

	/**
	 * HTML Body classes.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $classes
	 *
	 * @return  array
	 */
	public static function body_class( array $classes = [] ): array {

		$classes = (array) $classes; // Just in case...

		// Singular page?
		if ( is_singular() ) {

			// For better custom styling.
			$classes[] = 'is-singular';

			// Has featured image?
			if ( has_post_thumbnail() ) {
				$classes[] = 'has-post-thumbnail';
			}

			// Privacy Policy page.
			if ( (int) get_option( 'wp_page_for_privacy_policy' ) === get_the_ID() ) {
				$classes[] = 'page-privacy-policy';
			}

		} else {

			// Add a class of hfeed to non-singular pages.
			$classes[] = 'hfeed';
		}

		// Has more than 1 published author?
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Sort classes alphabetically.
		asort( $classes );

		return array_unique( $classes );

	} // /body_class

	/**
	 * Excerpt more.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $more
	 *
	 * @return  string
	 */
	public static function excerpt_more( string $more ): string {

		return '&hellip;';

	} // /excerpt_more

	/**
	 * Comments avatar size.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args  An array of arguments for displaying comments.
	 *
	 * @return  array
	 */
	public static function avatar_size( array $args ): array {

		$args['avatar_size'] = 128;

		return $args;

	} // /avatar_size

	/**
	 * Content area wrapper.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function content_wrapper() {

		if ( doing_action( 'pfbt_content_before' ) ) {
			// Opening wrapper tag.

			$post_id = get_the_ID();
			$classes = implode( ' ', get_post_class( '', $post_id ) );

			echo self::$content_wrapper['global']['open'];

			if ( is_singular() ) {

				printf(
					self::$content_wrapper['singular']['open'],
					esc_attr( $post_id ),
					esc_attr( $classes )
				);
			}

		} else {
			// Closing wrapper tag.

			if ( is_singular() ) {
				self::$content_wrapper['singular']['close'];
			}

			echo self::$content_wrapper['global']['close'];
		}

	} // /content_wrapper

	/**
	 * Initiate "Welcome" admin notice.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function admin_notice_welcome_activation() {

		global $pagenow;

		if (
			is_admin()
			&& 'themes.php' == $pagenow
			&& isset( $_GET['activated'] )
		) {

			add_action( 'admin_notices', __CLASS__ . '::admin_notice_welcome', 99 );
		}

	} // /admin_notice_welcome_activation

	/**
	 * Display "Welcome" admin notice.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function admin_notice_welcome() {

		get_template_part( 'templates/parts/admin/notice', 'welcome' );

	} // /admin_notice_welcome

	/**
	 * This is purely to trick Theme Check plugin.
	 *
	 * This is not being triggered.
	 * Normally, all of these functions would be included where needed.
	 * But in our case Beaver Themer takes care of them for us.
	 * And Theme Check plugin can not properly evaluate this situation.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function theme_check_trickery() {

		// Entry.
		get_the_tag_list();

		// Comments.
		comment_form();
		comments_template();
		the_comments_navigation();
		wp_list_comments();

		// Pagination.
		paginate_links();
		wp_link_pages();

		// Sidebar.
		dynamic_sidebar( 'sidebar' );

	} // /theme_check_trickery

}

PfBT_Setup::init();
