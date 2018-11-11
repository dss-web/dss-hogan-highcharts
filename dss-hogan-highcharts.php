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
 * Version:     0.0.1
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
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts' );
add_filter( 'hogan/module/outer_wrapper_classes', __NAMESPACE__ . '\\on_hogan_outer_wrapper_classes', 10, 2 );
add_filter( 'hogan/module/inner_wrapper_classes', __NAMESPACE__ . '\\on_hogan_inner_wrapper_classes', 10, 2 );
add_filter( 'hogan/module/sites/heading/enabled', '__return_true' );
/**
 * Register module text domain
 */
function hogan_load_textdomain() {
	\load_plugin_textdomain( 'dss-hogan-highcharts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

function scripts() {

	wp_enqueue_script(
		'highcharts',
		'https://code.highcharts.com/highcharts.js',
		array( 'jquery' ),
		rand()
	);
	wp_enqueue_script(
		'highcharts-data',
		'https://code.highcharts.com/modules/data.js',
		array( 'highcharts' ),
		rand()
	);
	wp_enqueue_script(
		'highcharts-exporting',
		'https://code.highcharts.com/modules/exporting.js',
		array( 'highcharts-data' ),
		rand()
	);
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


function on_hogan_outer_wrapper_classes( $classes, $module ) {

	if ( 'dss_highcharts' == $module->name ) {
		array_push( $classes, 'module-bg', 'container-full-width', 'hogan-module-highcharts' );
	}
	return $classes;
}

function on_hogan_inner_wrapper_classes( $classes, $module ) {

	if ( 'dss_highcharts' == $module->name ) {
		array_push( $classes, 'container' );
	}
	return $classes;
}

