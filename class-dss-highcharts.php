<?php
/**
 * DSS highcharts module class
 *
 * @package Hogan
 */

declare( strict_types = 1 );

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( '\\Dekode\\Hogan\\DSS_Highcharts' ) && class_exists( '\\Dekode\\Hogan\\Module' ) ) {

	/**
	 * Simple Posts module class (WYSIWYG).
	 *
	 * @extends Modules base class.
	 */
	class DSS_Highcharts extends Module {

		/**
		 * List of highcharts.
		 *
		 * @var $highcharts
		 */
		public $highcharts;

		/**
		 * Module constructor.
		 */
		public function __construct() {

			$this->label    = __( 'Highcharts', 'dss-hogan-highcharts' );
			$this->template = __DIR__ . '/assets/template.php';

			parent::__construct();
		}

		/**
		 * Field definitions for module.
		 *
		 * @return array $fields Fields for this module
		 */
		public function get_fields() : array {
			$fields = [
				[
					'type'         => 'tab',
					'key'          => $this->field_key . '_data_tab',
					'label'        => __( 'Data', 'dss-hogan-highcharts' ),
					'name'         => 'data_tab',
					'instructions' => '',
					'placement'    => 'top',
					'endpoint'     => 0,
				],
				[
					'type'         => 'repeater',
					'key'          => $this->field_key . '_highcharts',
					'label'        => __( 'highcharts', 'dss-hogan-highcharts' ),
					'name'         => 'highcharts',
					'instructions' => __( 'Create a list of graphs', 'dss-hogan-highcharts' ),
					'collapsed'    => '',
					'min'          => 1,
					'max'          => 0,
					'layout'       => 'block',
					'button_label' => __( 'Add Graph', 'dss-hogan-highcharts' ),
					'sub_fields'   => [
						[
							'type'         => 'text',
							'key'          => $this->field_key . '_title',
							'label'        => __( 'Title', 'dss-hogan-highcharts' ),
							'name'         => 'title',
							'instructions' => apply_filters( 'dss/hogan/module/highcharts/title/instructions', esc_html_x( 'Optional graph title', 'ACF Instruction', 'dss-hogan-highcharts' ) ),

							'wrapper'      => [
								'width' => '50',
							],
						],
						[
							'type'          => 'file',
							'key'           => $this->field_key . '_file',
							'label'         => __( 'File', 'dss-hogan-highcharts' ),
							'name'          => 'file',
							'instructions'  => apply_filters( 'dss/hogan/module/highcharts/file/instructions', esc_html_x( 'Allowed file types', 'ACF Instruction', 'dss-hogan-highcharts' ) ) . ': ' . apply_filters( 'dss/hogan/module/highcharts/mime_types', '.csv' ),
							'required'      => 1,
							'wrapper'       => [
								'width' => '50',
							],
							'return_format' => 'array', //'url',
							'library'       => 'all',
							'min_size'      => '',
							'max_size'      => '',
							'mime_types'    => apply_filters( 'dss/hogan/module/highcharts/mime_types', '.csv' ),
						],
						[
							'type'          => 'button_group',
							'key'           => $this->field_key . '_graph_type',
							'label'         => __( 'Graph Type', 'dss-hogan-highcharts' ),
							'name'          => 'graph',
							'instructions'  => apply_filters( 'dss/hogan/module/highcharts/graph/instructions', esc_html_x( 'Select a graph type', 'ACF Instruction', 'dss-hogan-highcharts' ) ),
							'choices'       => [
								'area'       => __( 'Area', 'dss-hogan-highcharts' ),
								'areaspline' => __( 'Area spline', 'dss-hogan-highcharts' ),
								'bar'        => __( 'Bar', 'dss-hogan-highcharts' ),
								'column'     => __( 'Column', 'dss-hogan-highcharts' ),
								'line'       => __( 'Line', 'dss-hogan-highcharts' ),
								'pie'        => __( 'Pie', 'dss-hogan-highcharts' ),
								'scatter'    => __( 'Scatter', 'dss-hogan-highcharts' ),
								'spline'     => __( 'Spline', 'dss-hogan-highcharts' ),
							],
							'wrapper'       => [
								'width' => '100',
							],
							'allow_null'    => 0,
							'default_value' => 'column',
							'layout'        => 'horizontal',
							'return_format' => 'value',
						],
					],
				],
				[
					'type'         => 'tab',
					'key'          => $this->field_key . '_settings_tab',
					'label'        => __( 'Settings', 'dss-hogan-highcharts' ),
					'name'         => 'settings_tab',
					'instructions' => '',
					'placement'    => 'top',
					'endpoint'     => 0,
				],
				[
					'type'          => 'color_scheme',
					'key'           => $this->field_key . '_graph_color_scheme',
					'label'         => __( 'Color Schemes', 'dss-hogan-highcharts' ),
					'name'          => 'graph_color_scheme',
					'instructions'  => __( 'Choose a color scheme for your graphs', 'dss-hogan-highcharts' ),
					'choices'       => apply_filters(
						'hogan/module/highcharts/color_scheme',
						[
							'default'        => '#7cb5ec, #434348, #90ed7d, #f7a35c, #8085e9, #f15c80, #e4d354, #2b908f, #f45b5b, #91e8e1',
							// 'avocado'     => '#F3E796, #95C471, #35729E, #251735',
							// 'dark blue'   => '#DDDF0D, #55BF3B, #DF5353, #7798BF, #aaeeee, #ff0066, #eeaaee, #55BF3B, #DF5353, #7798BF, #aaeeee',
							// 'dark green'  => '#DDDF0D, #55BF3B, #DF5353, #7798BF, #aaeeee, #ff0066, #eeaaee, #55BF3B, #DF5353, #7798BF, #aaeeee',
							'dark unica'     => '#2b908f, #90ee7e, #f45b5b, #7798BF, #aaeeee, #ff0066, #eeaaee, #55BF3B, #DF5353, #7798BF, #aaeeee',
							'skies'          => '#514F78, #42A07B, #9B5E4A, #72727F, #1F949A, #82914E, #86777F, #42A07B',
							'highcharts 3.x' => '#2f7ed8, #0d233a, #8bbc21, #910000, #1aadce, #492970, #f28f43, #77a1e5, #c42525, #a6c96a',
							'Sammen om'      => '#7E287D, #E0D020, #655E27, #FF71AB, #801c7d',

						]
					),
					'allow_null'    => 0,
					'default_value' => 'default',
					'return_format' => 'array',
				],
			];

			return $fields;
		}

		/**
		 * Enqueue module assets
		 */
		public function enqueue_assets() {
			$_version = defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ? time() : false;
			if ( true === apply_filters( 'hogan/module/expandable_list/load_styles', true ) ) {
				wp_enqueue_style( 'dss-hogan-highcharts-styles', plugins_url( '/assets/styles.css', __FILE__ ), [], $_version );
			}

			wp_enqueue_script( 'highcharts', 'https://code.highcharts.com/highcharts.js', [ 'jquery' ], $_version );
			wp_enqueue_script( 'highcharts-data', 'https://code.highcharts.com/modules/data.js', [ 'highcharts' ], $_version );
			wp_enqueue_script( 'highcharts-exporting', 'https://code.highcharts.com/modules/exporting.js', [ 'highcharts-data' ], $_version );
		}

		/**
		 * Map raw fields from acf to object variable.
		 *
		 * @param array $raw_content Content values.
		 * @param int   $counter Module location in page layout.
		 *
		 * @return void
		 */
		public function load_args_from_layout_content( array $raw_content, int $counter = 0 ) {

			$this->highcharts = $raw_content['highcharts'];

			foreach ( $this->highcharts as $key => $highchart ) {
				$this->highcharts[ $key ]['color_scheme'] = str_replace( ',', '', $raw_content['graph_color_scheme']['label'] );
			}

			parent::load_args_from_layout_content( $raw_content, $counter );
		}

		/**
		 * Validate module content before template is loaded.
		 *
		 * @return bool Whether validation of the module is successful / filled with content.
		 */
		public function validate_args() : bool {
			return ! empty( $this->highcharts );
		}


	}
} // End if().


if ( ! function_exists( 'write_log' ) ) {
	/**
	* Utility function for logging arbitrary variables to the error log.
	*
	* Set the constant WP_DEBUG to true and the constant WP_DEBUG_LOG to true to log to wp-content/debug.log.
	* You can view the log in realtime in your terminal by executing `tail -f debug.log` and Ctrl+C to stop.
	*
	* @param mixed $log Whatever to log.
	*/
	function write_log( $log ) {
		if ( true === WP_DEBUG ) {
			if ( is_scalar( $log ) ) {
				error_log( $log );
			} else {
				error_log( print_r( $log, true ) );
			}
		}
	}
}
