<?php
/**
 * Regenerate CSS on update.
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Olympus_Theme_Update {
	/**
	 * Class instance.
	 *
	 * @access private
	 * @var $instance Class instance.
	 */
	private static $instance;

	/**
	 * Initiator
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 *  Constructor
	 */
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'admin_init', __CLASS__ . '::init', 5 );
		} else {
			add_action( 'wp', __CLASS__ . '::init', 5 );
		}
	}

	/**
	 * Implement theme update logic. Only run updates on existing sites.
	 */
	public static function init() {
		if ( is_customize_preview() ) {
			return;
		}

		// Delete our CSS cache.
		delete_option( 'olympus_dynamic_css_output' );
		delete_option( 'olympus_dynamic_css_cached_version' );

		// Reset our dynamic CSS file updated time so it regenerates.
		$dynamic_css_data = get_option( 'olympus_dynamic_css_data', array() );

		if ( ! empty( $dynamic_css_data ) ) {
			if ( isset( $dynamic_css_data['updated_time'] ) ) {
				unset( $dynamic_css_data['updated_time'] );
			}

			update_option( 'olympus_dynamic_css_data', $dynamic_css_data );
		}
	}
}

Olympus_Theme_Update::get_instance();
