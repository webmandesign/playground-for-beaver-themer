<?php
/**
 * Loading theme functionality.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define( 'PFBT_PATH_INCLUDES', trailingslashit( get_template_directory() ) . 'includes/' );

if ( ! defined( 'PFBT_CONTENT_WIDTH' ) ) {
	define( 'PFBT_CONTENT_WIDTH', 640 );
}

require_once PFBT_PATH_INCLUDES . 'class-setup.php';
require_once PFBT_PATH_INCLUDES . 'class-customize.php';
require_once PFBT_PATH_INCLUDES . 'class-setup-plugin.php';
