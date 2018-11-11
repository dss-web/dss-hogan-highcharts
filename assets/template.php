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
?>

<ul class="list-items card-type-large">
	<?php

	$counter = 0;
	foreach ( $this->highcharts as $graf ) :
		?>
			<?php
			$title     = $graf['title'];
			$file_name = $graf['file']['url'];
			printf(
				'<li class="list-item">
						<div  class="column">
							<div id="container-%s" class="graph">
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
						},
						data: {
							csv: csvFile
						},

						//colors: ['#7E287D', '#655E27', '#E0D020', '#FF71AB','#801c7d'],
						colors: ['#7E287D', '#E0D020','#655E27', '#FF71AB','#801c7d'],
						title: {
							text: '%s'
						},
						yAxis: {
							title: {
								text: ''
							},
						},
						responsive: {
							rules: [{
								condition: {
									maxWidth: 400
								},
								chartOptions: {
									chart: {
										className: 'small-chart'
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
