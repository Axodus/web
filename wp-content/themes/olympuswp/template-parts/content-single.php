<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Olympus
 */

/**
 * olympus_before_single_post hook.
 *
 * @since 1.1.1
 */
do_action( 'olympus_before_single_post' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php olympus_do_microdata( 'article' ); ?>>
	<?php
	/**
	 * olympus_before_single_post_entry hook.
	 *
	 * @since 1.1.1
	 */
	do_action( 'olympus_before_single_post_entry' ); ?>

	<?php olympus_single_post_structure(); ?>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'olympuswp' ),
				'after'  => '</div>',
			)
		);

		$term_separator = apply_filters( 'olympus_term_separator', _x( ', ', 'Used between list items, there is a space after the comma.', 'olympuswp' ), 'tags' );
		$tags_list = get_the_tag_list( '', $term_separator );

		if ( $tags_list ) {
			echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'olympus_tag_list_output',
				sprintf(
					'<span class="tags-links">%3$s<span class="screen-reader-text">%1$s </span>%2$s</span> ',
					esc_html_x( 'Tags', 'Used before tag names.', 'olympuswp' ),
					$tags_list,
					olympus_get_svg_icon( 'tags' )
				)
			);
		}
		?>
	</div><!-- .entry-content -->

	<?php
	/**
	 * olympus_after_single_post_entry hook.
	 *
	 * @since 1.1.1
	 */
	do_action( 'olympus_after_single_post_entry' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * olympus_after_single_post hook.
 *
 * @since 1.1.1
 */
do_action( 'olympus_after_single_post' );

olympus_single_post_nav();

/**
 * olympus_after_single_post_nav hook.
 *
 * @since 1.1.1
 */
do_action( 'olympus_after_single_post_nav' ); ?>
