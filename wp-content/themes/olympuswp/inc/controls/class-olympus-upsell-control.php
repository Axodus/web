<?php
/**
 * The Up Sell Customizer control.
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'Olympus_UpSell_Control' ) ) {
	/**
	 * Control class.
	 */
	class Olympus_UpSell_Control extends WP_Customize_Section {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'olympus-upsell';

		/**
		 * Additional arguments passed to JS.
		 *
		 * @var array
		 */
		public $id;

		/**
		 * Additional arguments passed to JS.
		 *
		 * @var array
		 */
		public $pro_url;

		/**
		 * Additional arguments passed to JS.
		 *
		 * @var array
		 */
		public $pro_text;
	
		/**
		 * Send variables to json
		 */
		public function json() {
			$json = parent::json();
			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );
			$json['id'] = $this->id;
			return $json;
		}

		/**
		 * Render content.
		 */
		protected function render_template() {
			?>
			<li id="accordion-section-{{ data.id }}" class="oly-upsell-section control-section-{{ data.type }} cannot-expand accordion-section">
				<h3><a href="{{{ data.pro_url }}}" target="_blank">{{ data.pro_text }}</a></h3>
			</li>
			<?php
		}
	}
}

if ( ! function_exists( 'olympus_upsell_controls_scripts' ) ) {
	/**
	 * Add scripts for our control
	 */
	function olympus_upsell_controls_scripts() {
		wp_enqueue_script(
			'olympus-customizer-upsell-control',
			OLY_THEME_URI . '/inc/controls/js/upsell-control.js',
			array( 'customize-controls' ),
			OLY_VERSION,
			true
		);

		wp_enqueue_style(
			'olympus-customizer-upsell-control',
			OLY_THEME_URI . '/inc/controls/css/upsell-control.css',
			array( 'wp-components' ),
			OLY_VERSION
		);
	}
	add_action( 'customize_controls_enqueue_scripts', 'olympus_upsell_controls_scripts' );
}
