<?php
/**
 * PA Skin Init.
 *
 * @package PA
 */

namespace PremiumAddons\Modules\Woocommerce\TemplateBlocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Class Skin_Init
 */
class Skin_Init {

	/**
	 * Member Variable
	 *
	 * @var instance
	 */
	private static $skin_instance;

	/**
	 * Initiator
	 *
	 * @param string $style Skin.
	 */
	public static function get_instance( $style ) {

		$style_arr = explode( '-', $style );

		$style = implode( '_', array_map( 'ucfirst', $style_arr ) );

		$skin_class = 'PremiumAddons\\Modules\\Woocommerce\\TemplateBlocks\\Skin_' . ucfirst( $style );

		if ( class_exists( $skin_class ) ) {

			self::$skin_instance[ $style ] = new $skin_class( $style );
		}

		return self::$skin_instance[ $style ];
	}
}
