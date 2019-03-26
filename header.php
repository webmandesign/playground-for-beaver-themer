<?php defined( 'ABSPATH' ) || exit;
/**
 * The header for our theme.
 *
 * @link  https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.0
 */

/**
 * Located before opening `<html>` tag.
 *
 * Doctype is hooked here.
 * Not included in Beaver Themer part hooks, no need to.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_html_before' );

?>

<html <?php language_attributes(); ?>>

<head>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php

/**
 * Located just after opening `<body>` tag.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_body_top' );

?>

<div id="page" class="site">

<?php

/**
 * Located before Beaver Themer header template.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_header_before' );

if (
	is_callable( 'FLThemeBuilderLayoutData::get_current_page_header_ids' )
	&& ! empty( FLThemeBuilderLayoutData::get_current_page_header_ids() )
	&& is_callable( 'FLThemeBuilderLayoutRenderer::render_header' )
) {
	FLThemeBuilderLayoutRenderer::render_header();
}

/**
 * Located after Beaver Themer header template.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_header_after' );

/**
 * Located before page content.
 *
 * Content area wrapper opening tags are hooked here.
 * Not included in Beaver Themer part hooks, no need to.
 *
 * @since  1.0.0
 */
do_action( 'pfbt_content_before' );
