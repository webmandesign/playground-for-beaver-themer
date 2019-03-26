<?php defined( 'ABSPATH' ) || exit;
/**
 * Loading theme functionality.
 *
 * @link  https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! defined( 'PFBT_CONTENT_WIDTH' ) ) {
	define( 'PFBT_CONTENT_WIDTH', 640 );
}

require trailingslashit( get_template_directory() ) . 'includes/class-setup.php';
require trailingslashit( get_template_directory() ) . 'includes/class-customize.php';
require trailingslashit( get_template_directory() ) . 'includes/class-setup-plugin.php';
