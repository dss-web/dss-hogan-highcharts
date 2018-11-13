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
	$graph_data = [];
	foreach ( $this->highcharts as $graph ) :
		$graph_data[] = [
			'id'        => $graph['file']['ID'],
			'title'     => $graph['title'],
			'file_url' => $graph['file']['url'],
		];
		printf( '<li>
						<div class="column">
							<div id="container-%s" class="graph">
								<span>graf</span>
							</div>
						</div>
				</li>', $graph['file']['ID'] );
	endforeach;
	printf( '<script>' );
	$count = 0;
	foreach ( $graph_data as $data ) :
		print( "jQuery('#container-".$data['id']."').highcharts({
						chart: {
							type: 'column',
							backgroundColor: '#f1f1f1',
							style: {
									fontFamily: 'Open Sans',
									fontSize: '12px'
							},
						},
						data: {
							csv: '".$data['file_url']."'
						},
						colors: ['#7E287D', '#E0D020','#655E27', '#FF71AB','#801c7d'],
						title: {
							text: '".$data['title']."'
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
					});\n" );
		$count ++;
	endforeach;
	printf( '</script>' );
	?>
</ul>
