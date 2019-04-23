<?php defined( 'ABSPATH' ) || exit;
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link  https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.1
 */

get_header();

	if ( have_posts() ) {
		/**
		 * Displays an `index.php` template content if we `have_posts()`.
		 *
		 * This usually gets overridden by Beaver Themer layouts.
		 * If the appropriate Beaver Themer layout does not exist,
		 * this content is being displayed instead.
		 *
		 * `PfBT_Setup_Plugin::notice()` is hooked here.
		 * `PfBT_Setup_Plugin::content()` is hooked here.
		 * Not included in Beaver Themer part hooks, no need to.
		 *
		 * @since  1.0.0
		 */
		do_action( 'pfbt_content' );
	}

get_footer();
