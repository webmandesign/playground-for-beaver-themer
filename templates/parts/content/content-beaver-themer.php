<?php
/**
 * Beaver Themer inactive notice.
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

	<h1><?php esc_html_e( 'Beaver Themer is required', 'playground-for-beaver-themer' ); ?></h1>

	<p>
		<?php esc_html_e( 'It seems the Beaver Themer plugin is not activate on your website.', 'playground-for-beaver-themer' ); ?>
		<?php esc_html_e( 'Please note that this theme requires Beaver Themer and Beaver Builder plugin to work properly so you can build your site layouts.', 'playground-for-beaver-themer' ); ?>
	</p>

	<p>
		<?php esc_html_e( 'You can obtain these plugins following the links below:', 'playground-for-beaver-themer' ); ?>
	</p>

	<ol style="margin-top:.618em;">
		<li>
			<a href="<?php echo esc_url( PfBT_Setup_Plugin::url( 'https://www.wpbeaverbuilder.com/pricing/' ) ); ?>">
				<?php

				printf(
					/* Translators: %s: plugin name. */
					esc_html__( 'Get %s plugin &rarr;', 'playground-for-beaver-themer' ),
					'<strong>Beaver Builder</strong>'
				);

				?>
			</a>
			<small style="display:block;margin-top:.382em;line-height:1.382;"><?php esc_html_e( 'Please purchase a premium version of the plugin as Beaver Themer plugin is not compatible with free, lite version of Beaver Builder.', 'playground-for-beaver-themer' ); ?></small>
		</li>
		<li style="margin-top:.618em;">
			<a href="<?php echo esc_url( PfBT_Setup_Plugin::url( 'https://www.wpbeaverbuilder.com/beaver-themer/' ) ); ?>">
				<?php

				printf(
					/* Translators: %s: plugin name. */
					esc_html__( 'Get %s plugin &rarr;', 'playground-for-beaver-themer' ),
					'<strong>Beaver Themer</strong>'
				);

				?>
			</a>
		</li>
	</ol>

</section>

<?php

get_template_part( 'templates/parts/style/style', 'notice' );
