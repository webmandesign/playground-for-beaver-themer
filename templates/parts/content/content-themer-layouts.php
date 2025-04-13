<?php
/**
 * No Themer Layouts notice.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<section class="notice-beaver-themer">

	<h1><?php esc_html_e( 'No Themer Layout for this content', 'playground-for-beaver-themer' ); ?></h1>

	<p>
		<?php esc_html_e( 'It looks like there is no Themer Layout for this content.', 'playground-for-beaver-themer' ); ?>
		<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=fl-theme-layout' ) ); ?>">
			<?php echo esc_html_x( 'Create it now &rarr;', 'Themer Layout', 'playground-for-beaver-themer' ); ?>
		</a>
	</p>

</section>

<?php

get_template_part( 'templates/parts/style/style', 'notice' );
