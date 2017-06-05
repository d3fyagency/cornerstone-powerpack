<div id="chart"></div>
<script type="text/javascript">
(function(d3) {
  'use strict';

  // Data loading
  var dataSet = [
    <?php echo $content; ?>
  ];

  // Common settings
  var width = <?php echo $width; ?>;
  var height = <?php echo $height; ?>;
  var color = d3.scaleOrdinal(d3.schemeCategory20b)

  <?php if ($chart_style === 'donut' || $chart_style === 'pie'): ?>
    var radius = Math.min(width, height) / 2;
    var donutWidth = radius / 2;

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
        .innerRadius(0)
      <?php endif; ?>
      .outerRadius(radius);

    var pie = d3.pie()
      .value(function(d) {
        return d.value;
      })
      .sort(null);

    var g = svg.selectAll('path')
      .data(pie(dataSet))
      .enter()
        .append('g');
    var path = g.append('path')
        .attr('d', arc)
        .attr('fill', function(d, i) {
          return color(i);
        });
    g.append('text')
      .attr('transform', function(d) {
        var _d = arc.centroid(d);
        return 'translate(' + _d + ')';
      })
      .style('text-anchor', 'middle')
      .text(function(d) {
        return d.value + '%';
      });
    g.append('text')

  <?php elseif ($chart_style === 'bar'): ?>
    var margin = {
      top: 20,
      right: 20,
      bottom: 30,
      left: 40
    }
    var innerHeight = height - margin.top - margin.bottom;
    var innerWidth = width - margin.left - margin.right;
    var svg = d3.select("#chart")
      .append('svg')
      .attr("width", width)
      .attr("height", height)
      .append('g')
      .attr(
        'transform',
        'translate(' + margin.left + ',' + margin.top + ')'
      );

    var x = d3.scaleBand()
      .domain(dataSet.map(function(d) {
        return d.label;
      }))
      .rangeRound([0, innerWidth])
      .padding([0.05]);
    var y = d3.scaleLinear()
      .domain([
        0,
        d3.max(dataSet, function(d) {
          return d.value;
        })
      ])
      .range([
        innerHeight,
        0
      ]);
    var bar = svg.selectAll('g')
      .data(dataSet)
      .enter()
        .append('g')
        .attr('transform', function(d) {
          return 'translate(' + x(d.label) + ',0)'
        });
    bar.append('rect')
      .attr('y', function(d) {
        return y(d.value);
      })
      .attr('height', function(d) {
        return innerHeight - y(d.value);
      })
      .attr('width', x.bandwidth())
      .attr('fill', function(d, i) {
        return color(i);
      })
    
    bar.append('text')
      .attr('x', x.bandwidth() / 2)
      .attr('y', function(d) {
        return y(d.value) + 3;
      })
      .attr('dy', '.75em')
      .style('text-anchor', 'middle')
      .text(function(d) {
        return d.value;
      })
    svg.append('g')
      .attr('transform', 'translate(0, ' + innerHeight + ')')
      .call(d3.axisBottom(x));
    svg.append('g')
      .call(d3.axisLeft(y));
  <?php endif; ?>
})(window.d3);
</script>
