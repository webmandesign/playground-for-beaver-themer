<?php defined( 'ABSPATH' ) || exit;
/**
 * Page builder content.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.1
 * @version  1.0.1
 */

while ( have_posts() ) :
	the_post();

	the_content();

endwhile;
