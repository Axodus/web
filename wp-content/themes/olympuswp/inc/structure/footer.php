<?php
/**
 * Footer
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'olympus_get_footer' ) ) {
	/**
	 * Build our footer.
	 *
	 * @since 1.0.0
	 */
	function olympus_get_footer() { ?>
		<footer id="colophon" class="site-footer" <?php olympus_do_microdata( 'footer' ); ?>>
			<div class="site-info">
				<?php
				/**
				 * olympus_footer_widgets hook.
				 *
				 * @since 1.1.1
				 *
				 * @hooked olympus_get_footer_widgets
				 * @hooked olympus_get_copyright
				 */
				do_action( 'olympus_footer_widgets' );
				?>
			</div>
		</footer>
		<?php
	}
	add_action( 'olympus_footer', 'olympus_get_footer' );
}

if ( ! function_exists( 'olympus_get_footer_widgets' ) ) {
	/**
	 * Build our footer widgets.
	 *
	 * @since 1.0.0
	 */
	function olympus_get_footer_widgets() {
		$widgets = olympus_get_option( 'footer_columns' );

		if ( ! empty( $widgets ) && 0 !== $widgets ) :

			$footer_1 = is_active_sidebar( 'olympus-footer-1' );
			$footer_2 = is_active_sidebar( 'olympus-footer-2' );
			$footer_3 = is_active_sidebar( 'olympus-footer-3' );
			$footer_4 = is_active_sidebar( 'olympus-footer-4' );
			$footer_5 = is_active_sidebar( 'olympus-footer-5' );
			$footer_6 = is_active_sidebar( 'olympus-footer-6' );

			// If no footer widgets exist, we don't need to continue.
			if ( ! $footer_1 && ! $footer_2 && ! $footer_3 && ! $footer_4 && ! $footer_5 && ! $footer_6 ) {
				return;
			}
			?>
			<div id="footer-widgets">
				<div class="container">
					<div class="footer-widgets footer-col-<?php echo esc_attr( $widgets ); ?>">
						<?php
						if ( $widgets >= 1 && $footer_1 ) {
							?>
							<div class="footer-1 footer-col">
								<?php dynamic_sidebar( 'olympus-footer-1' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 2 && $footer_2 ) {
							?>
							<div class="footer-2 footer-col">
								<?php dynamic_sidebar( 'olympus-footer-2' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 3 && $footer_3 ) {
							?>
							<div class="footer-3 footer-col">
								<?php dynamic_sidebar( 'olympus-footer-3' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 4 && $footer_4 ) {
							?>
							<div class="footer-4 footer-col">
								<?php dynamic_sidebar( 'olympus-footer-4' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 5 && $footer_5 ) {
							?>
							<div class="footer-5 footer-col">
								<?php dynamic_sidebar( 'olympus-footer-5' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 6 && $footer_6 ) {
							?>
							<div class="footer-6 footer-col">
								<?php dynamic_sidebar( 'olympus-footer-6' ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php
		endif;
		/**
		 * olympus_after_footer_widgets hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'olympus_after_footer_widgets' );
	}
	add_action( 'olympus_footer_widgets', 'olympus_get_footer_widgets' );
}

if ( ! function_exists( 'olympus_get_copyright' ) ) {
	/**
	 * Get the copyright to the footer
	 *
	 * @since 1.1.5
	 */
	function olympus_get_copyright() {
		?>
		<div class="copyright-bar">
			<div class="container">
				<?php
				/**
				 * olympus_copyright hook.
				 *
				 * @since 1.0.0
				 *
				 * @hooked olympus_add_copyright
				 */
				do_action( 'olympus_copyright' );
				?>
			</div>
		</div>
		<?php
	}
	add_action( 'olympus_footer_widgets', 'olympus_get_copyright' );
}

if ( ! function_exists( 'olympus_add_copyright' ) ) {
	/**
	 * Add the copyright to the footer
	 *
	 * @since 1.0.0
	 */
	function olympus_add_copyright() {
		$content = olympus_get_option( 'copyright' );
		if ( $content || is_customize_preview() ) {
			echo '<div class="olympus-copyright">';
				$content = str_replace( '[copyright]', '&copy;', $content );
				$content = str_replace( '[current_year]', gmdate( 'Y' ), $content );
				$content = str_replace( '[site_title]', get_bloginfo( 'name' ), $content );
				$content = str_replace( '[theme]', '<a href="//wordpress.org/themes/olympuswp/" rel="nofollow noopener" target="_blank">Built with OlympusWP</a>', $content );
				echo do_shortcode( wpautop( $content ) );
			echo '</div>';
		}
	}
	add_action( 'olympus_copyright', 'olympus_add_copyright' );
}

if ( ! function_exists( 'olympus_scroll_up' ) ) {
	/**
	 * Build the back to top button
	 *
	 * @since 1.0.0
	 */
	function olympus_scroll_up() {
		echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'olympus_scroll_up_output',
			sprintf(
				'<a href="#" class="oly-scroll-up" aria-label="%1$s" rel="nofollow">
					%2$s
				</a>',
				esc_attr__( 'Scroll Up', 'olympuswp' ),
				olympus_get_svg_icon( 'scroll-up' )
			)
		);
	}
	add_action( 'olympus_after_footer', 'olympus_scroll_up' );
}
