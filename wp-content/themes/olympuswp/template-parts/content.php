<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Olympus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-post' ); ?> <?php olympus_do_microdata( 'article' ); ?>>
	<?php
	if ( olympus_blog_thumbnails() ) {
		olympus_post_thumbnail();
		?>
		<div class="entry-wrap">
			<?php olympus_post_heading() ?>

			<?php
			if ( olympus_show_excerpt() ) {
				?>
				<div class="entry-content" <?php olympus_do_microdata( 'text' ); ?>>
					<?php the_excerpt(); ?>
				</div>
				<?php
			} else {
				?>
				<div class="entry-content" <?php olympus_do_microdata( 'text' ); ?>>
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'olympuswp' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		olympus_post_structure();

		if ( olympus_show_excerpt() ) {
			?>
			<div class="entry-content" <?php olympus_do_microdata( 'text' ); ?>>
				<?php the_excerpt(); ?>
			</div>
			<?php
		} else {
			?>
			<div class="entry-content" <?php olympus_do_microdata( 'text' ); ?>>
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'olympuswp' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>
			<?php
		}
	} ?>
</article><!-- #post-<?php the_ID(); ?> -->
