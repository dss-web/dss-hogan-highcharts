<?php
/**
 * Template for dss highcharts module
 *
 * $this is an instance of the DSS_Downloads object.
 *
 * Available properties:
 * $this->highcharts (array) Array containing all download items.
 *
 * @package Hogan
 */
declare( strict_types = 1 );
namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) || ! ( $this instanceof DSS_Highcharts ) ) {
	return; // Exit if accessed directly.
}

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


?>

<ul class="list-items card-type-large">
	<?php

	$counter = 0;
	foreach ( $this->highcharts as $graf ) :
		?>
			<?php
			write_log( $graf );
			$title     = $graf['title'];
			$file_name = $graf['file']['url'];
			// $attachment_file_size           = filesize( get_attached_file( $graf['file']['id'] ) );
			// $attachment_file_size_formatted = size_format( $attachment_file_size );
			// $max_chars                      = 50;
			// if ( strlen( $file_name ) > $max_chars ) {
			// 	$mime_type_array   = explode( '/', $graf['file']['mime_type'] );
			// 	$mime_type         = $mime_type_array[ count( $mime_type_array ) - 1 ];
			// 	$file_name_chopped = substr( $file_name, 0, ( $max_chars - 3 ) ) . '...' . $mime_type;
			// } else {
			// 	$file_name_chopped = $file_name;
			// }
			$float = '';
			// printf('<div id="container-%s" class="graph %s">graf</div>',$counter, $float);
			printf(
				'<li class="list-item">
						<div  class="column">
							<div id="container-%s" class="featured-image graph">
								<span >graf</span>
							</div>
						</div>
				</li>',
				$counter
			);


			printf( '<script>' );
			printf(
				"jQuery.get('%s', function(csvFile) {
			jQuery('#container-%s').highcharts({
				chart: {
					type: 'column',
					backgroundColor: '#f1f1f1',
					style: {
							fontFamily: 'Open Sans',
							fontSize: '12px'
					},
					width: 500,
					height: 500
				},
				data: {
					csv: csvFile
				},

				//colors: ['#7E287D', '#655E27', '#E0D020', '#FF71AB','#801c7d'],
				colors: ['#7E287D', '#E0D020','#655E27', '#FF71AB','#801c7d'],
				title: {
					text: '%s'
				},
				// legend: {
				// 	align: 'right',
				// 	verticalAlign: 'middle',
				// 	layout: 'vertical'
				// },
				yAxis: {
					title: {
						text: ''
					},
				},
				responsive: {
					rules: [{
						condition: {
							maxWidth: 500,
							maxHeight: 500
						},
						chartOptions: {
							// legend: {
							// 	align: 'center',
							// 	verticalAlign: 'bottom',
							// 	layout: 'horizontal'
							// },
							yAxis: {
								labels: {
									align: 'left',
									x: 0,
									y: -5
								},
								title: {
									text: null
								}
							},
							subtitle: {
								text: null
							},
							credits: {
								enabled: false
							}
						}
					}]
				}
			});
		});",
				$file_name,
				$counter,
				$title
			);
			printf( '</script>' );
			$counter = $counter + 1;

			?>
	<?php endforeach; ?>
</ul>
