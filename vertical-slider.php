<?php

/**
 * Plugin Name:         Vertical Slider
 * Plugin URI:          https://www.jruano.dev
 * Description:         Custom Vertical Slider Plugin.
 * Version:             1.0
 * Author:              Joseph Ruano
 * Author URI:          http://www.jruano.dev
 * Tested up to:        5.5
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Vertical_Slider {

	private static $_instance = null;
	public $plugin_url = '';
	public $plugin_dir = '';
	public $version;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Initialize properties
	 *
	 * @return null
	 */
	public function __construct() {

		$this->plugin_dir = plugin_dir_path( __FILE__ );
		$this->plugin_url = plugin_dir_url( __FILE__ );
		$this->version    = $this->version;
		$this->define_admin_hooks();

		// Shortcodes.
		require_once $this->plugin_dir . 'includes/shortcodes/shortcode-vertical-slider.php';

	}

	/**
	 * Initialize hook to filters and actions
	 */
	private function define_admin_hooks() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}


	/**
	 * Enqueue CSS and JS files
	 *
	 * @return null
	 */
	public function enqueue_scripts( $hook ) {

		wp_register_script( 'swiper-js', $this->plugin_url . 'assets/public/swiper/swiper-bundle.min.js', null, $this->version, false );
		wp_register_style( 'swiper-style', $this->plugin_url . 'assets/public/swiper/swiper-bundle.min.css', null, $this->version, 'all' );
		wp_register_style( 'vs-style', $this->plugin_url . 'assets/public/style.css', null, time(), 'all' );
		wp_register_script( 'vs-js', $this->plugin_url . 'assets/public/script.js', array( 'jquery', 'swiper-js' ), time(), false );

	}

}

Vertical_Slider::instance();