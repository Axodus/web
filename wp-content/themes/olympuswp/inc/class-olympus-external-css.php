<?php
/**
 * This file builds an external CSS file for the customizer options
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Olympus_External_CSS {

	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 */
	private static $instance;

	/**
	 * Initiator.
	 *
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_dynamic_css' ), 20 );
		add_action( 'wp', array( $this, 'init' ), 9 );
		add_action( 'customize_save_after', array( $this, 'delete_saved_time' ) );

		if ( ! empty( $_POST ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing -- Just checking, false positive.
			add_action( 'wp_ajax_olympus_regenerate_css_file', array( $this, 'regenerate_css_file' ) );
		}
	}

	/**
	 * Determine the method.
	 */
	public function method() {
		$method = olympus_get_css_method();

		if ( true === $method && $this->needs_update() ) {
			$data = get_option( 'olympus_dynamic_css_data', array() );

			if ( ! isset( $data['updated_time'] ) ) {
				// No time set, so set the current time minus 5 seconds so the file is still generated.
				$data['updated_time'] = time() - 5;
				update_option( 'olympus_dynamic_css_data', $data );
			}

			// Only allow processing 1 file every 5 seconds.
			$current_time = (int) time();
			$last_time    = (int) $data['updated_time'];

			if ( 5 <= ( $current_time - $last_time ) ) {

				// Attempt to write to the file.
				$method = ( $this->can_write() && $this->make_css() ) ? true : false;

				// Does again if the file exists.
				if ( true === $method ) {
					$method = ( file_exists( $this->file( 'path' ) ) ) ? true : false;
				}
			}
		}

		return $method;
	}

	/**
	 * Set things up.
	 */
	public function init() {
		if ( true === $this->method() ) {
			add_filter( 'olympus_css_external_file', '__return_true' );
			add_filter( 'olympus_dynamic_css_skip_cache', '__return_true', 20 );
		}
	}

	/**
	 * Enqueue the dynamic CSS.
	 */
	public function enqueue_dynamic_css() {
		if ( true === $this->method() ) {
			wp_enqueue_style( 'olympus-dynamic', esc_url( $this->file( 'uri' ) ), array( 'olympus-style' ), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		}
	}

	/**
	 * Make our CSS.
	 */
	public function make_css() {
		$content = '';

		if ( function_exists( 'olympus_get_dynamic_css' ) ) {
			$content = olympus_get_dynamic_css();
		} elseif ( function_exists( 'olympus_base_css' ) && function_exists( 'olympus_font_css' ) ) {
			$content = olympus_base_css() . olympus_font_css();
		}

		$content = apply_filters( 'olympus_external_dynamic_css_output', $content );

		if ( ! $content ) {
			return false;
		}

		global $wp_filesystem;

		// Initialize the WordPress filesystem.
		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		// Take care of domain mapping.
		if ( defined( 'DOMAIN_MAPPING' ) && DOMAIN_MAPPING ) {
			if ( function_exists( 'domain_mapping_siteurl' ) && function_exists( 'get_original_url' ) ) {
				$mapped_domain = domain_mapping_siteurl( false );
				$original_domain = get_original_url( 'siteurl' );

				$content = str_replace( $original_domain, $mapped_domain, $content );
			}
		}

		if ( is_writable( $this->file( 'path' ) ) || ( ! file_exists( $this->file( 'path' ) ) && is_writable( dirname( $this->file( 'path' ) ) ) ) ) {
			$chmod_file = 0644;

			if ( defined( 'FS_CHMOD_FILE' ) ) {
				$chmod_file = FS_CHMOD_FILE;
			}

			if ( ! $wp_filesystem->put_contents( $this->file( 'path' ), wp_strip_all_tags( $content ), $chmod_file ) ) {

				// Fail!
				return false;

			} else {

				$this->update_saved_time();

				// Success!
				return true;

			}
		}
	}

	/**
	 * Determines if the CSS file is writable.
	 */
	public function can_write() {
		global $blog_id;

		// Get the upload directory for this site.
		$upload_dir = wp_get_upload_dir();

		// If this is a multisite installation, append the blogid to the filename.
		$css_blog_id = ( is_multisite() && $blog_id > 1 ) ? '_blog-' . $blog_id : null;

		$file_name   = '/style' . $css_blog_id . '.min.css';
		$folder_path = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'olympus';

		// Does the folder exist?
		if ( file_exists( $folder_path ) ) {
			// Folder exists, but is the folder writable?
			if ( ! is_writable( $folder_path ) ) {
				// Folder is not writable.
				// Does the file exist?
				if ( ! file_exists( $folder_path . $file_name ) ) {
					// File does not exist, therefore it can't be created
					// since the parent folder is not writable.
					return false;
				} else {
					// File exists, but is it writable?
					if ( ! is_writable( $folder_path . $file_name ) ) {
						// Nope, it's not writable.
						return false;
					}
				}
			} else {
				// The folder is writable.
				// Does the file exist?
				if ( file_exists( $folder_path . $file_name ) ) {
					// File exists.
					// Is it writable?
					if ( ! is_writable( $folder_path . $file_name ) ) {
						// Nope, it's not writable.
						return false;
					}
				}
			}
		} else {
			// Can we create the folder?
			// returns true if yes and false if not.
			return wp_mkdir_p( $folder_path );
		}

		// all is well!
		return true;
	}

	/**
	 * Gets the css path or url to the stylesheet
	 *
	 * @param string $target path/url.
	 */
	public function file( $target = 'path' ) {
		global $blog_id;

		// Get the upload directory for this site.
		$upload_dir = wp_get_upload_dir();

		// If this is a multisite installation, append the blogid to the filename.
		$css_blog_id = ( is_multisite() && $blog_id > 1 ) ? '_blog-' . $blog_id : null;

		$file_name   = 'style' . $css_blog_id . '.min.css';
		$folder_path = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'olympus';

		// The complete path to the file.
		$file_path = $folder_path . DIRECTORY_SEPARATOR . $file_name;

		// Get the URL directory of the stylesheet.
		$css_uri_folder = $upload_dir['baseurl'];

		$css_uri = trailingslashit( $css_uri_folder ) . 'olympus/' . $file_name;

		// Take care of domain mapping.
		if ( defined( 'DOMAIN_MAPPING' ) && DOMAIN_MAPPING ) {
			if ( function_exists( 'domain_mapping_siteurl' ) && function_exists( 'get_original_url' ) ) {
				$mapped_domain   = domain_mapping_siteurl( false );
				$original_domain = get_original_url( 'siteurl' );
				$css_uri         = str_replace( $original_domain, $mapped_domain, $css_uri );
			}
		}

		$css_uri = set_url_scheme( $css_uri );

		if ( 'path' === $target ) {
			return $file_path;
		} elseif ( 'url' === $target || 'uri' === $target ) {
			$timestamp = ( file_exists( $file_path ) ) ? '?ver=' . filemtime( $file_path ) : '';
			return $css_uri . $timestamp;
		}
	}

	/**
	 * Update the file time.
	 */
	public function update_saved_time() {
		$data = get_option( 'olympus_dynamic_css_data', array() );
		$data['updated_time'] = time();

		update_option( 'olympus_dynamic_css_data', $data );
	}

	/**
	 * Delete the saved time.
	 */
	public function delete_saved_time() {
		$data = get_option( 'olympus_dynamic_css_data', array() );

		if ( isset( $data['updated_time'] ) ) {
			unset( $data['updated_time'] );
		}

		update_option( 'olympus_dynamic_css_data', $data );
	}

	/**
	 * Update our plugin/theme versions.
	 */
	public function update_versions() {
		$data = get_option( 'olympus_dynamic_css_data', array() );

		$data['theme_version'] = OLY_VERSION;

		if ( defined( 'OLY_PRO_VERSION' ) ) {
			$data['plugin_version'] = OLY_PRO_VERSION;
		}

		update_option( 'olympus_dynamic_css_data', $data );
	}

	/**
	 * Do we need to update the CSS file?
	 */
	public function needs_update() {
		$data = get_option( 'olympus_dynamic_css_data', array() );
		$update = false;

		// If there's no updated time, needs update.
		// The time is set in mode().
		if ( ! isset( $data['updated_time'] ) ) {
			$update = true;
		}

		// If we haven't set our versions, do so now.
		if ( ! isset( $data['theme_version'] ) && ! isset( $data['plugin_version'] ) ) {
			$update = true;
			$this->update_versions();

			// Bail early so we don't check undefined versions below.
			return $update;
		}

		// Version numbers have changed, needs update.
		if ( (string) OLY_VERSION !== (string) $data['theme_version'] ) {
			$update = true;
			$this->update_versions();
		}

		if ( defined( 'OLY_PRO_VERSION' ) ) {
			if ( (string) OLY_PRO_VERSION !== (string) $data['plugin_version'] ) {
				$update = true;
				$this->update_versions();
			}
		}

		return $update;
	}

	/**
	 * Regenerate the CSS file.
	 */
	public function regenerate_css_file() {
		check_ajax_referer( 'olympus-regenerate-external-css', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'Security check failed.', 'olympuswp' ) );
		}

		$this->delete_saved_time();

		wp_send_json_success();
	}
}

Olympus_External_CSS::get_instance();
