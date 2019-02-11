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

<ul>
	<?php
	$script = '';
	$num    = 0;
	foreach ( $this->highcharts as $graph ) :
		printf(
			'<li>
						<div class="column">
							<div id="container-%s" class="graph">
								<span>graph</span>
							</div>
						</div>
				</li>',
			$graph['file']['ID'] . '-' . $num
		);
		$script .= sprintf(
			"jQuery.get('%s', function(csvFile) {
					jQuery('#container-%s').highcharts({
						chart: { // documented at https://api.highcharts.com/highcharts/plotOptions
							type: '%s',
							// type: 'area',
							// type: 'areaspline',
							// type: 'bar',
							// type: 'column',
							// type: 'line',
							// type: 'pie',
							// type: 'scatter',
							// type: 'spline',
							// backgroundColor: '#f1f1f1',
							style: {
									fontFamily: 'Open Sans',
									fontSize: '12px'
							},
						},
						data: {
							csv: csvFile
						},
						// colors: '#7cb5ec #434348 #90ed7d #f7a35c #8085e9 #f15c80 #e4d354 #2b908f #f45b5b #91e8e1'.split(' '),
						colors: '%s'.split(' '),
						// colors: ['#7E287D', '#E0D020','#655E27', '#FF71AB','#801c7d'],
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
				});\n",
			$graph['file']['url'] . '?=' . rand(),
			$graph['file']['ID'] . '-' . $num,
			$graph['graph'],
			$graph['color_scheme'],
			$graph['title']
		);
		$num++;
	endforeach;

	write_log( $this->highcharts );

	printf( '<script>' . $script . '</script>' );
	?>
</ul>
