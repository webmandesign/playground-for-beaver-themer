<?php defined( 'ABSPATH' ) || exit;
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link  https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                //
                // Post Content here
                //
                the_content();
            } // end while
        } // end if
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();