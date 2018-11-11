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

			$this->label    = __( 'highcharts', 'dss-hogan-highcharts' );
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
					'type'         => 'repeater',
					'key'          => $this->field_key . '_highcharts',
					'label'        => __( 'highcharts', 'dss-hogan-highcharts' ),
					'name'         => 'highcharts',
					'instructions' => __( 'Create a list of graphs', 'dss-hogan-highcharts' ),
					'collapsed'    => '',
					'min'          => 1,
					'max'          => 0,
					'layout'       => 'table',
					'button_label' => __( 'Add Graph', 'dss-hogan-highcharts' ),
					'sub_fields'   => [
						[
							'type'         => 'text',
							'key'          => $this->field_key . '_title',
							'label'        => __( 'Title', 'dss-hogan-highcharts' ),
							'name'         => 'title',
							'instructions' => apply_filters( 'dss/hogan/module/highcharts/title/instructions', esc_html_x( 'Optional', 'ACF Instruction', 'dss-hogan-highcharts' ) ),

							'wrapper' => [
								'width' => '50',
							],
						],
						[
							'type'          => 'file',
							'key'           => $this->field_key . '_file',
							'label'         => __( 'File', 'dss-hogan-highcharts' ),
							'name'          => 'file',
							'instructions' => apply_filters( 'dss/hogan/module/highcharts/title/instructions', esc_html_x( 'Allowed file types', 'ACF Instruction', 'dss-hogan-highcharts' ) ) . ': ' . apply_filters( 'dss/hogan/module/highcharts/mime_types', '.csv' ),
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
					],
				],
			];

			return $fields;
		}

		/**
		 * Map raw fields from acf to object variable.
		 *
		 * @param array $raw_content Content values.
		 * @param int $counter Module location in page layout.
		 *
		 * @return void
		 */
		public function load_args_from_layout_content( array $raw_content, int $counter = 0 ) {

			$this->highcharts = $raw_content['highcharts'];

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
