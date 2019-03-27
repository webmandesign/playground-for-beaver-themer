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
		<a href="https://webmandesign.github.io/playground-for-beaver-themer/" target="_blank"><?php
			esc_html_e( '(Check the theme information page.)', 'playground-for-beaver-themer' );
		?></a>
		<br>
		<?php esc_html_e( 'Please make sure you have Beaver Themer and Beaver Builder plugins activated to build your website!', 'playground-for-beaver-themer' ); ?>
	</p>
	<p>
		<span class="dashicons dashicons-heart" style="margin-top: -4px; color: red; vertical-align: middle;"></span>
		<?php esc_html_e( 'Do you like this theme?', 'playground-for-beaver-themer' ); ?>
		<a href="https://www.webmandesign.eu/contact/?utm_source=pfbt" target="_blank"><?php esc_html_e( 'Please consider a donation.', 'playground-for-beaver-themer' ); ?></a>
		<?php esc_html_e( 'Thank you!', 'playground-for-beaver-themer' ); ?>
		<span class="dashicons dashicons-smiley"></span>
	</p>
	<?php if ( ! class_exists( 'FLThemeBuilder' ) ) : ?>
	<p class="call-to-action">
		<a href="<?php echo esc_url( PfBT_Setup_Plugin::url( 'https://www.wpbeaverbuilder.com/beaver-themer/' ) ); ?>" class="button button-primary button-hero">
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
	<p class="footer">
		<?php

		printf(
			esc_html_x( 'For more Beaver Themer compatible and for accessibility ready themes please visit %s.', '%s: Website link.', 'playground-for-beaver-themer' ),
			'<a href="https://www.webmandesign.eu/?utm_source=pfbt" target="_blank">WebManDesign.eu</a>'
		);

		?>
	</p>
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

	.theme-welcome-notice .footer {
		padding-top: 1.618em;
		margin-top: 1.618em;
		font-size: .81em;
		font-style: italic;
		border-top: 1px solid rgba(0,0,0,.2);
		opacity: .75;
	}

		.theme-welcome-notice .footer:hover {
			opacity: 1;
		}

</style>
