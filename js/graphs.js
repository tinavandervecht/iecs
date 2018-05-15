$(document).foundation();

(function() {
    if ($('#user-graph-svg').length) {
        generateMonthlyUserGraph();
    }

    if ($('#year-user-graph-svg').length && yearUserGraphData) {
        generateYearlyUserGraph();
        window.addEventListener('resize', generateYearlyUserGraph);
    }
})();

function generateMonthlyUserGraph() {
    var graphID = '#user-graph-svg',
        graphElement = $('#user-graph-svg'),
        data = {
            "chart_title": "Users Gained"
        },
        margin = {top: 70, right: 20, bottom: 30, left: 60},
        width = 250 - margin.left - margin.right,
        height = 50,
        groups = [];

    data[graphElement.data('prev-month-name')] = graphElement.data('prev-month-count');
    data[graphElement.data('current-month-name')] = graphElement.data('current-month-count');

    var keys = Object.keys(data);
    for (var i = 0; i < keys.length; i++) {
        if (keys[i] !== "chart_title") {
            groups.push(keys[i]);
        }
    }

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
        .tickFormat(d3.format(""));

    var value_data = groups.map(function(d) {
        return {x_axis: d, y_axis: data[d]};
    });

    x.domain(value_data.map(function(d) { return d.x_axis; }));
    y.domain([0, d3.max(value_data, function(d) { return d.y_axis; })]);

    var svg = d3.select("#user-graph-svg").append("svg")
        .attr("width", width)
        .attr("height", height + margin.top)
        .append("g")
        .attr("transform", "translate(0,40)");

    var detailBox = svg.append("svg:text")
        .attr("dx", "20px")
        .attr("dy", "-5px")
        .attr("text-anchor", "right")
        .style("fill", "#1D5096")
        .style("font-weight", "bold");

    var title = svg.append("text")
        .attr("x", 0)
        .attr("y", -20)
        .attr("class","chart-title")
        .text(data.chart_title);

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
        .style("fill", '#497F1F')
        .attr("x", function(d) { return x(d.x_axis); })
        .attr("width", x.rangeBand())
        .attr("y", function(d) { return y(d.y_axis); })
        .attr("height", function(d) { return height - y(d.y_axis); })
}

function generateYearlyUserGraph() {
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        lineData = Object.keys(yearUserGraphData).map(function (key) {
            return yearUserGraphData[key];
        }),
        element = d3.select('#year-user-graph-svg'),
        WIDTH = $('.year-user-graph-wrapper').outerWidth(),
        HEIGHT = 150,
        MARGINS = {
            top: 20,
            right: 20,
            bottom: 20,
            left: 50
        };

    element.selectAll("*").remove();

    var xRange = d3.scale.linear()
        .range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineData, function(d) {
            return d.x;
        }), d3.max(lineData, function(d) {
            return d.x;
        })]);

    var yRange = d3.scale.linear()
        .range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineData, function(d) {
            return d.y;
        }), d3.max(lineData, function(d) {
            return d.y;
        })]);

    var xAxis = d3.svg.axis()
        .scale(xRange)
        .tickSize(0);

    var yAxis = d3.svg.axis()
        .scale(yRange)
        .tickSize(0)
        .tickFormat(d3.format("d"))
        .orient('left');

    element.append('svg:rect')
        .style("fill", '#EBEEF1')
        .attr("x", MARGINS.left)
        .attr("width", WIDTH - MARGINS.left - MARGINS.right)
        .attr("y", MARGINS.top - 10)
        .attr("height", 30);

    element.append('svg:rect')
        .style("fill", '#EBEEF1')
        .attr("x", MARGINS.left)
        .attr("width", WIDTH - MARGINS.left - MARGINS.right)
        .attr("y", (MARGINS.top - 10) + 60)
        .attr("height", 30);

    element.append('svg:g')
        .attr('class', 'x axis')
        .attr('transform', 'translate(0,' + (HEIGHT - (MARGINS.bottom / 1.5)) + ')')
        .call(xAxis);

    element.append('svg:g')
        .attr('class', 'y axis')
        .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
        .call(yAxis);

    var lineFunc = d3.svg.line()
        .x(function(d) {
            return xRange(d.x);
        })
        .y(function(d) {
            return yRange(d.y);
        })
        .interpolate('linear');

      element.append('svg:path')
        .attr('d', lineFunc(lineData))
        .attr('stroke', '#497F1F')
        .attr('stroke-width', 5)
        .attr('fill', 'none');

    $('.x.axis g').each(function() {
        var monthNum = $('text', this).text();
        $('text', this).text(months[monthNum - 1]);
    })
}