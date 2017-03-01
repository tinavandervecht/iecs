(function(){
  var visualization = document.querySelector("#vis");
   function initChart() {
                    var data = [
                      {
                        "mon":"jan",
                        "usage":"20"
                      },
                      {
                        "mon":"feb",
                        "usage":"15"
                      },
                      {
                        "mon":"mar",
                        "usage": "36"
                      },
                      {
                        "mon":"apr",
                        "usage":"13"
                      }
                    ];
                    var data2 = [
                      {
                        "mon":"may",
                        "usage": "44"
                      },
                      {
                        "mon":"june",
                        "usage": "44"
                      },
                      {
                        "mon":"july",
                        "usage":"67"
                      },
                      {
                        "mon":"aug",
                        "usage": "23"
                      }
                    ];
                    var currentData = data;
                    var newData = data2;

                    var maxArr = d3.entries(data);
                        var max = 0;
                    for(var i=0;i<maxArr.length;i++){
                      if(maxArr[i].value.usage>max){
                      max = maxArr[i].value.usage;
                      }
                    }

                      var now = new Date().getMonth()+1;
                      var twelve = now + 11;
                      var months = [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec"
                      ];
                      console.log(now);
                      console.log(twelve);
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
                      
                        xScale = d3.scale.ordinal()
                        .range([visMargins.left, visWidth -  visMargins.right])
                        .domain(data.map(function(d){ return d.mon; }))
                        .rangePoints([0.5,1.5,2.5,3.5])
                        .rangeBands([visMargins.left, visWidth -  visMargins.right]),
                      
                      
                        yScale = d3.scale.linear().range([visHeight - visMargins.top, visMargins.bottom]).domain([0, max]),
                        xAxis = d3.svg.axis()
                        .scale(xScale)
                        .orient("bottom"),
                        
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
                            return xScale(d.mon) + 60;
                        })
                        .y(function(d) {
                            return yScale(d.usage);
                        });
                        var lineInit = d3.svg.line()
                            .x(function(d) {
                                return xScale(d.mon) +60;
                            })
                            .y(function(d) {
                                return yScale(0);
                            });

                      
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

                    
                }

                

                initChart();

})();
