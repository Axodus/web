<?php
/**
 * The Action Button Customizer control.
 *
 * @package Olympus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Olympus_Action_Button_Control' ) ) {
	/**
	 * Control class.
	 */
	class Olympus_Action_Button_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'olympus-action-button';

		/**
		 * Additional arguments passed to JS.
		 *
		 * @var array
		 */
		public $content;

		/**
		 * Additional arguments passed to JS.
		 *
		 * @var array
		 */
		public $button;

		/**
		 * Custom control class.
		 *
		 * @access public
		 * @var string
		 */
		public $custom_class = '';
	
		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @since 3.4.0
		 * @uses WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['content'] = $this->content;
			$this->json['button'] = $this->button;
			$this->json['custom_class'] = $this->custom_class;
		}
	}
}
