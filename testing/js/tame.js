(function(){
  var visualization = document.querySelector("#vis");
   function initChart() {
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
                        "usage":"183"
                      }
                    ];
                    var data2 = [
                      {
                        "mon":"1",
                        "usage": "44"
                      },
                      {
                        "mon":"2",
                        "usage":"67"
                      },
                      {
                        "mon":"3",
                        "usage": "23"
                      },
                      {
                        "mon":"4",
                        "usage":"220"
                      }
                    ];
                    var currentData = data;
                    var newData = data2;

                    var maxArr = d3.entries(data);
                    // .sort(function(a, b) { return d3.descending(a.value.usage, b.value.usage); })[0];
                    var max = 100;
                    for(var i=0;i<maxArr.length;i++){
                      if(maxArr[i].value.usage>max)
                      max = maxArr[i].value.usage;
                      }


                    var vis = d3.select("#vis"),
                        visWidth = visualization.width.baseVal.value,
                        visHeight = visualization.height.baseVal.value;
                        console.log(visWidth + " X " + visHeight);
                    var visMargins = {
                            top: 20,
                            right: 20,
                            bottom: 20,
                            left: 50
                        },
                        xScale = d3.scale.linear().range([visMargins.left, visWidth - visMargins.right]).domain([1, 4]),
                        yScale = d3.scale.linear().range([visHeight - visMargins.top, visMargins.bottom]).domain([0, max]),
                        xAxis = d3.svg.axis()
                        .scale(xScale),
                        yAxis = d3.svg.axis()
                        .scale(yScale)
                        .orient("left");
                    visualization.width =visWidth;
                    visualization.height = visHeight;
                    vis.append("svg:g")
                        .attr("class", "x axis")
                        .attr("transform", "translate(0," + (visHeight - visMargins.bottom) + ")")
                        .call(xAxis);
                    vis.append("svg:g")
                        .attr("class", "y axis")
                        .attr("transform", "translate(" + (visMargins.left) + ",0)")
                        .call(yAxis);
                    var lineGen = d3.svg.line()
                        .x(function(d) {
                            return xScale(d.mon);
                        })
                        .y(function(d) {
                            return yScale(d.usage);
                        });
                        var lineInit = d3.svg.line()
                            .x(function(d) {
                                return xScale(d.mon);
                            })
                            .y(function(d) {
                                return yScale(0);
                            });
                        // .interpolate("basis");
                        vis.on("click",function(){
                          vis.selectAll("path.line")
                            .transition().duration(500)
                            .attr('d',lineInit(currentData))
                            .transition().duration(500).delay(500)
                            .attr('d', lineGen(newData));
                          // vis.append('svg:path')
                          //     .attr('stroke', '#ABFF24')
                          //     .attr('stroke-width', 2)
                          //     .attr('fill', 'none')
                          //     .attr('d', lineInit(data2))
                          //     .transition().duration(500).delay(500)
                          //     .attr('d', lineGen(data2));
                          var temp = currentData;
                          currentData = newData;
                          newData = temp;
                        });
                        // var path = vis.selectAll("path").data(lineGen(currentData));

                    vis.append('svg:path')
                        .attr('stroke', '#ABFF24')
                        .attr('class', 'line')
                        .attr('stroke-width', 2)
                        .attr('fill', 'none')
                        // .attr('fill', '#ABFF24')
                        .attr('d', lineInit(currentData))
                        .transition().duration(500).delay(500)
                        .attr('d', lineGen(currentData));
                        function resize() {
                          /* Find the new window dimensions */
                          var width = parseInt(d3.select("#vis").style("width")),
                          height = parseInt(d3.select("#vis").style("height"));

                          /* Update the range of the scale with new width/height */
                          xScale = d3.scale.linear().range([visMargins.left, visWidth - visMargins.right]).domain([1, 4]),
                          yScale = d3.scale.linear().range([visHeight - visMargins.top, visMargins.bottom]).domain([0, max]);

                          /* Update the axis with the new scale */
                          vis.select('.x.axis')
                            .attr("transform", "translate(0," + height + ")")
                            .call(xAxis);

                          vis.select('.y.axis')
                            .call(yAxis);

                          /* Force D3 to recalculate and update the line */
                          vis.selectAll('.line')
                            .attr("d", lineGen(currentData));
                          }

                        d3.select(window).on('resize', resize);
                }

                // window.addEventListener('load',initChart,false);

                initChart();

})();
