<?php
/**
 * The template for displaying site footer.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Located after page content.
 *
 * Content area wrapper closing tags are hooked here.
 * Not included in Beaver Themer part hooks, no need to.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_content_after' );

/**
 * Located before Beaver Themer footer template.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_footer_before' );

if (
	is_callable( 'FLThemeBuilderLayoutData::get_current_page_footer_ids' )
	&& ! empty( FLThemeBuilderLayoutData::get_current_page_footer_ids() )
	&& is_callable( 'FLThemeBuilderLayoutRenderer::render_footer' )
) {
	FLThemeBuilderLayoutRenderer::render_footer();
}

/**
 * Located after Beaver Themer footer template.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_footer_after' );

?>

</div>

<?php

/**
 * Located before closing `<body>` tag, before `wp_footer()`.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_body_bottom' );

wp_footer();

?>

</body>


</html>
