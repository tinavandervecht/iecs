$(document).foundation();

(function() {
    var graphID = '#user-graph-svg';
    var graphElement = $('#user-graph-svg');

    var data = [{
        "chart_title": "Users Gained"
    }];

    data[0][graphElement.data('prev-month-name')] = graphElement.data('prev-month-count');
    data[0][graphElement.data('current-month-name')] = graphElement.data('current-month-count');

    var WIDTH = 250;

    var COLOR = '#497F1F';

    var Y_DATA_FORMAT = d3.format("");

    var margin = {top: 70, right: 20, bottom: 30, left: 60},
        width = WIDTH - margin.left - margin.right,
        height = 50;

    var groups = [];

    var makeBar = function(width, height, bar_data) {
      var x = d3.scale.ordinal()
        .rangeRoundBands([0, width], 0.1);

      var y = d3.scale.linear()
          .range([height, 0]);

      var xAxis = d3.svg.axis()
          .scale(x)
          .orient("bottom");

      var yAxis = d3.svg.axis()
          .scale(y)
          .orient("left")
          .tickFormat(Y_DATA_FORMAT);

      var value_data = groups.map(function(d) {
            return {x_axis: d, y_axis: bar_data[d]};
      });

      x.domain(value_data.map(function(d) { return d.x_axis; }));
      y.domain([0, d3.max(value_data, function(d) { return d.y_axis; })]);

      var svg = d3.select("#user-graph-svg").append("svg")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
          .append("g")
          .attr("transform", "translate(0," + margin.top + ")");

      var detailBox = svg.append("svg:text")
          .attr("dx", "20px")
          .attr("dy", "-5px")
          .attr("text-anchor", "right")
          .style("fill", "#1D5096")
          .style("font-weight", "bold");

      var title = svg.append("text")
          .attr("x", 0)
          .attr("y", -50)
          .attr("class","chart-title")
          .text(bar_data.chart_title);

      svg.append("g")
          .attr("class", "x axis")
          .attr("transform", "translate(0," + height + ")")
          .call(xAxis)

          svg.selectAll(".bar")
              .data(value_data)
              .enter()
              .append("rect")
              .style("fill", "#EBEEF1")
              .attr("x", function(d) { return x(d.x_axis); })
              .attr("width", x.rangeBand())
              .attr("y", 0)
              .attr("height", height)

      svg.selectAll(".bar")
          .data(value_data)
          .enter()
          .append("rect")
          .style("fill", COLOR)
          .attr("x", function(d) { return x(d.x_axis); })
          .attr("width", x.rangeBand())
          .attr("y", function(d) { return y(d.y_axis); })
          .attr("height", function(d) { return height - y(d.y_axis); })
    };

    var keys = Object.keys(data[0]);
    for (var i = 0; i < keys.length; i++) {
      if (keys[i] !== "chart_title") {
        groups.push(keys[i]);
      }
    }

    for (i = 0; i < data.length; i++) {
      makeBar(width, height, data[i]);
    }
})();
