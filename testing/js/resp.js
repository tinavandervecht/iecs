var data = [
  {
    "mon":"1",
    "usage": "4"
  },
  {
    "mon":"2",
    "usage":"25"
  },
  {
    "mon":"3",
    "usage": "36"
  },
  {
    "mon":"4",
    "usage":"20"
  }
];
var margin = 40,
    width = 960 - margin*2,
    height = 500 - margin*2;
var xScale = d3.scale.linear()
    .range([0,width]).nice();
    // .range([0, width])
    // .nice(d3.time.year);
var yScale = d3.scale.linear()
    .range([0, height])
    .nice();
var xAxis = d3.svg.axis()
    .scale(xScale)
    .orient("bottom");
var yAxis = d3.svg.axis()
    .scale(yScale)
    .orient("left");
var line = d3.svg.line()
    .x(function(d) { return xScale(d.mon); })
    .y(function(d) { return yScale(d.usage); });

var graph = d3.select("#graph")
    .attr("width", width + margin*2)
    .attr("height", height + margin*2)
  .append("g")
    .attr("transform", "translate(" + margin + "," + margin + ")");
  xScale.domain(d3.extent(data, function(d) { return d.mon; }));
  yScale.domain(d3.extent(data, function(d) { return d.usage; }));
  graph.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);
  graph.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      // .attr("dy", ".71 \em")
      .style("text-anchor", "end")
      .text("Price ($)");
      var lineGen = d3.svg.line()
          .x(function(d) {
              return xScale(d.mon);
          })
          .y(function(d) {
              return yScale(d.usage);
          });
        graph.append('svg:path')
            .attr('stroke', '#ABFF24')
            .attr('class', 'line')
            .attr('stroke-width', 2)
            .attr('fill', 'none')
            .attr('d', lineGen(data));
  // graph.append("path")
  //     .datum(data)
  //     .attr("class", "line")
  //     .attr("d", lineGen(data));
// });
