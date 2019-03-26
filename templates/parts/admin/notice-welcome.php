<?php defined( 'ABSPATH' ) || exit;
/**
 * Admin notice: Welcome.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.0
 */

?>

<div class="updated notice is-dismissible theme-welcome-notice">
	<h2>
		<?php

		printf(
			/* Translators: %s: Theme name. */
			esc_html__( 'Thank you for using %s theme!', 'playground-for-beaver-themer' ),
			'<strong>' . wp_get_theme( get_template() )->display( 'Name' ) . '</strong>'
		);

		?>
	</h2>
	<p>
		<?php esc_html_e( 'This is a blank theme for Beaver Themer plugin.', 'playground-for-beaver-themer' ); ?>
		<a href="<?php echo esc_url( get_theme_file_uri( 'readme.html' ) ); ?>" target="_blank"><?php
			esc_html_e( '(Check theme readme file for more info.)', 'playground-for-beaver-themer' );
		?></a>
		<br>
		<?php esc_html_e( 'Please make sure you have Beaver Themer and Beaver Builder plugins activated to build your website!', 'playground-for-beaver-themer' ); ?>
	</p>
	<?php if ( ! class_exists( 'FLThemeBuilder' ) ) : ?>
	<p class="call-to-action">
		<a href="https://www.wpbeaverbuilder.com/beaver-themer/?fla=67" class="button button-primary button-hero">
			<strong><?php esc_html_e( 'Get Beaver Themer plugin &rarr;', 'playground-for-beaver-themer' ); ?></strong>
		</a>
	</p>
	<?php else : ?>
	<p class="call-to-action">
		<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=fl-theme-layout' ) ); ?>" class="button button-primary button-hero">
			<strong><?php esc_html_e( 'Start creating theme layouts &rarr;', 'playground-for-beaver-themer' ); ?></strong>
		</a>
	</p>
	<?php endif; ?>
</div>

<style type="text/css" media="screen">

	.notice.theme-welcome-notice {
		padding: 2.618em;
		font-size: 1.382em;
		text-align: center;
		border: 0;
	}

	.theme-welcome-notice p,
	.theme-welcome-notice h2 {
		margin: 0 0 1em;
		font-size: inherit;
	}

	.theme-welcome-notice p:last-child {
		margin-bottom: 0;
	}

	.theme-welcome-notice h2 {
		font-size: 1.618em;
		font-weight: 400;
	}

	.theme-welcome-notice strong {
		font-weight: bolder;
	}

	.theme-welcome-notice .call-to-action {
		margin-top: 1.618em;
	}

</style>
