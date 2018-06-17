
<html>
	<head>
		
	</head>
	<body>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/series-label.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>

		<div id="container"></div>
		<script>
			
			Highcharts.chart('container', {

				title: {
					text: 'Solar Employment Growth by Sector, 2010-2016'
				},

				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle'
				},

				

				series: <?=$chart;?>,

				responsive: {
					rules: [{
						condition: {
							maxWidth: 500
						}
					}]
				}

			});
		</script>
	</body>
</html>