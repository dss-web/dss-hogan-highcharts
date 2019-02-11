<?php
/**
 * DSS Hogan Module: Highcharts
 *
 * @package     hogan
 * @author      Per Soderlind
 * @copyright   2018 Per Soderlind
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: DSS Hogan Module: Highcharts
 * Plugin URI: https://github.com/soderlind/dss-hogan-highcharts
 * GitHub Plugin URI: https://github.com/soderlind/dss-hogan-highcharts
 * Description: DSS highcharts Module for Hogan.
 * Version:     0.0.3
 * Author:      Per Soderlind
 * Author URI:  https://soderlind.no
 * Text Domain: dss-hogan-highcharts
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

declare( strict_types = 1 );

namespace Dekode\DSS\Hogan\highcharts;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\hogan_load_textdomain' );
add_action( 'hogan/include_modules', __NAMESPACE__ . '\\hogan_register_module' );

/**
 * Register module text domain
 */
function hogan_load_textdomain() {
	\load_plugin_textdomain( 'dss-hogan-highcharts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Register module in Hogan
 *
 * @param \Dekode\Hogan\Core $core Hogan Core instance.
 * @return void
 */
function hogan_register_module( \Dekode\Hogan\Core $core ) {
	require_once 'class-dss-highcharts.php';
	$core->register_module( new \Dekode\Hogan\DSS_Highcharts() );
}


// check if class already exists
if ( ! class_exists( 'acf_plugin_color_scheme' ) ) :

	/**
	 * @link https://wordpress.org/plugins/color-scheme-field-for-advanced-custom-fields-pro/
	 */
	class acf_plugin_color_scheme {

		// vars
		var $settings;

		/*
		*  __construct
		*
		*  This function will setup the class functionality
		*
		*  @type	function
		*  @date	17/02/2016
		*  @since	1.0.0
		*
		*  @param	void
		*  @return	void
		*/

		function __construct() {

			// settings
			// - these will be passed into the field class.
			$this->settings = array(
				'version' => '1.0.0',
				'url'     => plugin_dir_url( __FILE__ ),
				'path'    => plugin_dir_path( __FILE__ ),
			);

			// include field
			add_action( 'acf/include_field_types', array( $this, 'include_field' ) ); // v5
			add_action( 'acf/register_fields', array( $this, 'include_field' ) ); // v4

		}


		/*
		*  include_field
		*
		*  This function will include the field type class
		*
		*  @type	function
		*  @date	17/02/2016
		*  @since	1.0.0
		*
		*  @param	$version (int) major ACF version. Defaults to false
		*  @return	void
		*/

		function include_field( $version = false ) {

			// support empty $version
			if ( ! $version ) {
				$version = 4;
			}

			// load textdomain
			load_plugin_textdomain( 'TEXTDOMAIN', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );

			// include
			include_once('class-acf-field-color_scheme-v' . $version . '.php');
		}



	}

	// initialize
	new acf_plugin_color_scheme();
	// adds css to admin panel.
	function acfcs_css() {
		wp_register_style( 'acfcs_css', plugins_url( '/assets/css/style.css', __FILE__ ) );
		wp_enqueue_style( 'acfcs_css' );
	}
	add_action( 'admin_init', __NAMESPACE__ . '\acfcs_css' );
endif;
