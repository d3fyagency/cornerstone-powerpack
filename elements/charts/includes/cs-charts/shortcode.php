<div id="chart"></div>
<script type="text/javascript">
(function(d3) {
	'use strict';

	var dataSet = [
		<?php echo $content; ?>
	];

	<?php if ($chart_style === 'donut' || $chart_style === 'pie'): ?>
	var donutWidth = 75;
	var width = 360;
	var height = 360;
	var radius = Math.min(width, height) / 2;
	var color = d3.scaleOrdinal(d3.schemeCategory20b);

	var svg = d3.select('#chart')
		.append('svg')
		.attr('width', width)
		.attr('height', height)
		.append('g')
		.attr('transform', 'translate(' + (width / 2) + ',' + (height / 2) + ')');

	var arc = d3.arc()
		<?php if ($chart_style === 'donut'): ?>
			.innerRadius(radius - donutWidth)
		<?php else: ?>
			.innerRadius(0) // pie
		<?php endif; ?>
		.outerRadius(radius);

	var pie = d3.pie()
		.value(function(d) { return d.value; })
		.sort(null);

	var path = svg.selectAll('path')
		.data(pie(dataSet))
		.enter()
			.append('path')
			.attr('d', arc)
			.attr('fill', function(d) {
				return color(d.data.label);
			});
			
	<?php elseif ($chart_style === 'bar'): ?>
		var vis = d3.select('#chart'),
				WIDTH = 1000,
				HEIGHT = 500,
				MARGINS = {
						top: 20,
						right: 20,
						bottom: 20,
						left: 50
				},
				xRange = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right])
				.domain([d3.min(dataSet, function(d) {
						return d.value;
					}),
					d3.max(dataSet, function (d) {
						return d.value;
					})
				]),

				yRange = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom])
					.domain([d3.min(dataSet, function(d) {
						return d.label;
					}),
					d3.max(dataSet, function (d) {
						return d.label;
					})
				]),

				xAxis = d3.axisBottom()
						.scale(xRange)
						.tickSize(5)
						.tickSubdivide(true),

				yAxis = d3.axisLeft()
						.scale(yRange)
						.tickSize(5)
						.orient("left")
						.tickSubdivide(true);

		vis.append('svg:g')
				.attr('class', 'x axis')
				.attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
				.call(xAxis);

		vis.append('svg:g')
				.attr('class', 'y axis')
				.attr('transform', 'translate(' + (MARGINS.left) + ',0)')
				.call(yAxis);
	<?php endif; ?>
})(window.d3);
</script>
