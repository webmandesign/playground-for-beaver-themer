<?php
/**
 * The template for displaying comments.
 *
 * This is required for Beaver Builder plugin.
 *
 * @package    Playground for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}

if ( have_comments() ) :
	?>

	<h2 class="comments-title">
		<?php

		$comment_count = get_comments_number();

		if ( '1' === $comment_count ) {

			printf(
				/* translators: 1: title. */
				esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'playground-for-beaver-themer' ),
				'<span>' . get_the_title() . '</span>'
			);

		} else {

			printf(
				/* translators: 1: comment count number, 2: title. */
				esc_html( _nx(
					'%1$d thought on &ldquo;%2$s&rdquo;',
					'%1$d thoughts on &ldquo;%2$s&rdquo;',
					$comment_count,
					'Comments list title.',
					'playground-for-beaver-themer'
				) ),
				number_format_i18n( $comment_count ),
				'<span>' . get_the_title() . '</span>'
			);
		}

		?>
	</h2>

	<?php the_comments_navigation(); ?>

	<ol class="comment-list">
		<?php

		wp_list_comments( array(
			'avatar_size' => 128,
			'style'       => 'ol',
			'short_ping'  => true,
		) );

		?>
	</ol>

	<?php

	the_comments_navigation();

endif;

if ( ! comments_open() ) :
	?>
	<p class="comments-closed no-comments"><?php esc_html_e( 'Comments are closed.', 'playground-for-beaver-themer' ); ?></p>
	<?php
endif;

comment_form();
