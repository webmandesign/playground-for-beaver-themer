<?php defined( 'ABSPATH' ) || exit;
/**
 * No Themer Layouts notice.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.0
 */

?>

<section class="notice-beaver-themer">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'No Themer Layout for this content', 'playground-for-beaver-themer' ); ?></h1>
	</header>

	<div class="page-content">
		<p>
			<?php esc_html_e( 'It looks like there is no Themer Layout for this content.', 'playground-for-beaver-themer' ); ?>
			<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=fl-theme-layout' ) ); ?>">
				<?php echo esc_html_x( 'Create it now &rarr;', 'Themer Layout', 'playground-for-beaver-themer' ); ?>
			</a>
		</p>
	</div>

</section>

<style>
	.notice-beaver-themer {
		max-width: 48em;
		padding: 2.618em;
		margin: 2.618em auto;
		box-shadow: 0 .382em 2.618em rgba(0,0,0,.2);
	}
</style>
