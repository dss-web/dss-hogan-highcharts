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
 * Version:     0.0.2
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
