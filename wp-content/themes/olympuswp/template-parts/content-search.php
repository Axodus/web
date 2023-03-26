<?php
/**
 * Template part for displaying results in search pages
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

			<div class="entry-content" <?php olympus_do_microdata( 'text' ); ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div>
		<?php
	} else {
		olympus_post_structure();
		?>
		<div class="entry-content" <?php olympus_do_microdata( 'text' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
		<?php
	} ?>
</article><!-- #post-<?php the_ID(); ?> -->
