<?php
/**
 * The main template file.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

	/**
	 * Displays the content.
	 *
	 * This usually gets overridden by Beaver Themer layout.
	 * If the appropriate Beaver Themer layout does not exist,
	 * the content hooked onto `pfbt_content` action is being
	 * displayed instead.
	 *
	 * `PfBT_Setup_Plugin::content()` is hooked here.
	 * Not included in Beaver Themer part hooks, no need to.
	 *
	 * @since  1.0.0
	 */
	do_action( 'pfbt_content' );

get_footer();
