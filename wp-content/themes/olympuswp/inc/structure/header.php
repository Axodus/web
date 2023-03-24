<?php
/**
 * Header
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'olympus_get_header' ) ) {
	/**
	 * Build the header.
	 *
	 * @since 1.0.0
	 */
	function olympus_get_header() {
		?>
		<header <?php echo implode( ' ', olympus_header_attribute() ); ?> <?php olympus_do_microdata( 'header' ); ?>>
			<?php
			/**
			 * olympus_before_header_inner hook.
			 *
			 * @since 1.1.1
			 */
			do_action( 'olympus_before_header_inner' );
			?>
			<div class="<?php echo esc_attr( implode( ' ', olympus_header_inner_classes() ) ); ?>">
				<?php
				/**
				 * olympus_before_header_content hook.
				 *
				 * @since 1.0.0
				 *
				 * @hooked olympus_add_logo - 5
				 */
				do_action( 'olympus_before_header_content' );

				/**
				 * olympus_after_header_content hook.
				 *
				 * @since 1.0.0
				 *
				 * @hooked olympus_add_navigation - 5
				 */
				do_action( 'olympus_after_header_content' );
				?>
			</div>
			<?php
			/**
			 * olympus_after_header_inner hook.
			 *
			 * @since 1.1.1
			 */
			do_action( 'olympus_after_header_inner' );
			?>
		</header><!-- #masthead -->
		<?php
	}
	add_action( 'olympus_header', 'olympus_get_header' );
}

if ( ! function_exists( 'olympus_header_attribute' ) ) {
	/**
	 * Get any necessary microdata.
	 *
	 * @return string Our final attributes to add to the element.
	 *
	 * @since 1.1.0
	 */
	function olympus_header_attribute() {
		$att = array();

		$att[] = 'id="masthead"';
		$att[] = 'class="' . esc_attr( implode( ' ', olympus_header_classes() ) ) .'"';

		if ( olympus_get_option( 'add_sticky' )
		&& 'none' !== olympus_get_option( 'sticky_breakpoint' ) ) {
			$att[] = 'data-destroy-sticky="' . olympus_get_option( 'sticky_breakpoint' ) . '"';
		}

		return apply_filters( "olympus_header_attribute", $att );
	}
}

if ( ! function_exists( 'olympus_header_classes' ) ) {
	/**
	 * Header classes.
	 *
	 * @since 1.1.0
	 */
	function olympus_header_classes() {
		$classes = array();
		$sticky_classes = array();

		$classes[] = 'site-header';

		// If sticky
		if ( olympus_get_option( 'add_sticky' ) ) {
			$sticky_classes[] = 'oly-has-sticky';

			// Sticky style
			if ( 'hide-scroll' === olympus_get_option( 'sticky_style' ) ) {
				$sticky_classes[] = 'oly-hide-scroll';
			}

			// If sticky logo
			if ( olympus_get_option( 'sticky_logo' ) ) {
				$sticky_classes[] = 'oly-has-sticky-logo';
			}

			// If sticky shadow
			if ( olympus_get_option( 'add_sticky_shadow' ) ) {
				$sticky_classes[] = 'oly-has-shadow';
			}
		}

		if ( apply_filters( 'olympus_sticky_classes', true ) ) {
			$classes = array_merge( $classes, $sticky_classes );
		}

		return apply_filters( 'olympus_header_classes', $classes );
	}
}

if ( ! function_exists( 'olympus_header_inner_classes' ) ) {
	/**
	 * Header inner classes.
	 *
	 * @since 1.1.0
	 */
	function olympus_header_inner_classes() {
		$classes = array();

		$classes[] = 'site-header-inner';

		// Add class for megamenu width
		$classes[] = 'oly-container';

		// If container
		if ( ! olympus_get_option( 'remove_container' ) ) {
			$classes[] = 'container';
		}

		return apply_filters( 'olympus_header_inner_classes', $classes );
	}
}

if ( ! function_exists( 'olympus_add_logo' ) ) {
	/**
	 * Build the logo
	 *
	 * @since 1.0.0
	 */
	function olympus_add_logo() {
		/**
		 * olympus_before_logo hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'olympus_before_logo' );
		?>

		<div class="site-branding">
			<?php
			if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
				the_custom_logo();
				olympus_sticky_logo();
			} else {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title site-logo-text" <?php olympus_do_microdata( 'headline' ); ?>><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				<?php
			}

			echo olympus_site_info();
			?>
		</div>

		<?php
		/**
		 * olympus_after_logo hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'olympus_after_logo' );
	}
	add_action( 'olympus_before_header_content', 'olympus_add_logo', 5 );
}

if ( ! function_exists( 'olympus_site_info' ) ) {
	/**
	 * Get site info.
	 */
	function olympus_site_info() {
		$settings = wp_parse_args(
			get_option( 'olympus_settings', array() ),
			olympus_get_defaults()
		);

		// Get the title and tagline.
		$title = get_bloginfo( 'title' );
		$tagline = get_bloginfo( 'description' );

		$show_title = ( true === $settings['show_site_title'] || empty( $title ) ) ? true : false;
		$show_tagline = ( true === $settings['show_tagline'] || empty( $tagline ) ) ? true : false;

		if ( true === $show_title || true === $show_tagline ) {
			?>
			<div class="site-header-info">
				<?php
				if ( true === $show_title ) {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title site-logo-text" <?php olympus_do_microdata( 'headline' ); ?>><?php echo esc_html( $title ); ?></a>
					<?php
				}
				if ( true === $show_tagline ) {
					?>
					<p class="site-description" <?php olympus_do_microdata( 'description' ); ?>><?php echo esc_html( $tagline ); ?></p>
					<?php
				}
				?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'olympus_replace_logo_attr' ) ) {
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function olympus_replace_logo_attr( $attr, $attachment, $size ) {
		if ( ! isset( $attachment ) ) {
			return $attr;
		}

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$add_retina_logo = olympus_get_option( 'add_retina_logo' );
		$is_logo_attachment = ( $custom_logo_id == $attachment->ID ) ? true : false;

		// If retina logo.
		if ( apply_filters( 'olympus_is_retina_logo_attachment', $is_logo_attachment, $attachment ) ) {
			if ( true == $add_retina_logo ) {
				$retina_logo = olympus_get_option( 'retina_logo' );
				$attr['srcset'] = '';

				if ( apply_filters( 'olympus_retina_logo', true ) && $retina_logo ) {
					$cutom_logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
					$attr['srcset'] = $cutom_logo[0] . ' 1x, ' . $retina_logo . ' 2x';
				}
			}
		}

		return apply_filters( 'olympus_replace_logo_attr', $attr );
	}
	add_filter( 'wp_get_attachment_image_attributes', 'olympus_replace_logo_attr', 10, 3 );
}

if ( ! function_exists( 'olympus_get_sticky_logo' ) ) {
	/**
	 * Get the sticky logo
	 *
	 * @since 1.1.0
	 */
	function olympus_get_sticky_logo() {
		$sticky_logo = olympus_get_option( 'sticky_logo' );
		$logo_id = attachment_url_to_postid( $sticky_logo );
		$retina_logo = olympus_get_option( 'sticky_retina_logo' );

		if ( ! $sticky_logo ) {
			return;
		}

		$attr = array(
			'class' => 'sticky-logo',
			'loading' => false,
		);

		// If retina logo.
		if ( $retina_logo ) {
			$original_logo = wp_get_attachment_image_src( $logo_id, 'full' );
			$attr['srcset'] = $original_logo[0] . ' 1x, ' . $retina_logo . ' 2x';
		}

		/*
		* If the logo alt attribute is empty, get the site title and explicitly pass it
		* to the attributes used by wp_get_attachment_image().
		*/
		$image_alt = get_post_meta( $sticky_logo, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		/**
		 * Filters the list of custom logo image attributes.
		 *
		 * @param array $logo_attr   Custom logo image attributes.
		 * @param int   $sticky_logo Custom logo attachment ID.
		 */
		$attr = apply_filters( 'olympus_sticky_logo_attributes', $attr, $sticky_logo );

		/*
		* If the alt attribute is not empty, there's no need to explicitly pass it
		* because wp_get_attachment_image() already adds the alt attribute.
		*/
		$image = wp_get_attachment_image( $logo_id, 'full', false, $attr );

		$html = sprintf(
			'<a href="%1$s" class="sticky-logo-link" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			$image
		);

		return apply_filters( 'olympus_sticky_logo', $html );
	}
}

if ( ! function_exists( 'olympus_sticky_logo' ) ) {
	/**
	 * The sticky logo
	 *
	 * @since 1.1.0
	 */
	function olympus_sticky_logo() {
		echo olympus_get_sticky_logo();
	}
}

if ( ! function_exists( 'olympus_add_search_icon' ) ) {
	/**
	 * Add search icon
	 *
	 * @since 1.1.0
	 */
	function olympus_add_search_icon() {
		// Return if none.
		if ( 'none' === olympus_get_option( 'search_style' ) ) {
			return;
		}

		// Wrapper classes.
		$classes = array( 'olympus-search-icon' );

		// Search style.
		$classes[] = 'search-' . olympus_get_option( 'search_style' );
		?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<?php
			if ( 'slide' === olympus_get_option( 'search_style' ) ) {
				?>
				<div class="olympus-search-wrapper">
					<?php
					get_search_form(
						array(
							'input_value' => get_search_query(),
							'show_input_submit' => false,
							'search_source' => olympus_get_option( 'search_source' ),
						)
					);
					?>
					<span class="olympus-search-close">
						<?php echo olympus_get_svg_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function. ?>
					</span>
				</div>
				<?php
			}
			?>
			<a href="#" class="olympus-search-icon-link" aria-label="<?php esc_attr_e( 'Search Website', 'olympuswp' ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Search Website', 'olympuswp' ); ?></span>
				<?php echo olympus_get_svg_icon( 'search-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function. ?>
			</a>
			<?php
			if ( 'dropdown' === olympus_get_option( 'search_style' ) ) {
				?>
				<div class="olympus-search-wrapper">
					<?php
					get_search_form(
						array(
							'input_value' => get_search_query(),
							'show_input_submit' => false,
							'search_source' => olympus_get_option( 'search_source' ),
						)
					);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	add_action( 'olympus_after_navigation', 'olympus_add_search_icon', 10 );
}

if ( ! function_exists( 'olympus_search_full_screen' ) ) {
	/**
	 * Search full screen
	 *
	 * @since 1.1.5
	 */
	function olympus_search_full_screen() {
		// Return if not full screen.
		if ( 'full-screen' !== olympus_get_option( 'search_style' ) ) {
			return;
		}

		$classes = array( 'search-text' );

		$text = olympus_get_option( 'search_fullscreen_heading' );
		$text = ( $text ) ? $text : esc_html__( 'Start typing and press enter to search', 'olympuswp' );

		// Class for customizer preview.
		if ( is_customize_preview() ) {
			if ( ! empty( $text ) ) {
				$classes[] = 'show-fs-search-text';
			} else {
				$classes[] = 'hide-fs-search-text';
			}
		}
		?>
		<div class="olympus-search-full-screen">
			<span class="olympus-search-close">
				<?php echo olympus_get_svg_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function. ?>
			</span>
			<div class="olympus-search-wrapper">
				<div class="search-container">
					<?php
					if ( ! empty( $text ) ) {
						?>
						<h3 class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"><?php echo esc_html( $text ); ?></h3>
						<?php
					}

					get_search_form(
						array(
							'input_value' => get_search_query(),
							'show_input_submit' => false,
							'search_source' => olympus_get_option( 'search_source' ),
						)
					);
					?>
				</div>
			</div>
		</div>
		<?php
	}
	add_action( 'wp_footer', 'olympus_search_full_screen' );
}

/**
 * Add skip to content link before the header.
 *
 * @since 1.0.0
 */
function olympus_do_skip_to_content_link() {
	printf(
		'<a class="screen-reader-text skip-link" href="#content" title="%1$s">%2$s</a>',
		esc_attr__( 'Skip to content', 'olympuswp' ),
		esc_html__( 'Skip to content', 'olympuswp' )
	);
}
add_action( 'olympus_before_header', 'olympus_do_skip_to_content_link', 2 );
