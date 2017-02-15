(function(){

  var two = [["tow","30.5"],["gre","40.2"]];
  var three = [["tow","10.5"],["gre","80.2"]];
  var four = [["tow","60.5"],["gre","30.2"]];
  var five = [["tow","38.5"],["gre","12.2"]];
  var six = [["tow","17.5"],["gre","50.2"]];
  var seven = [["tow","16.5"],["gre","22.2"]];

  var firstDataset = [
    ["Alpha", "4.75",two],
    ["Beta", "7.23",three],
    ["Charlie", "9.54",four],
    ["Delta", "4.54",five],
    ["Echo", "3.99",six],
    ["Foxtrot", "1.24",seven]
  ];
  var secondDataset = [
    ["Alpha", "6.75"],
    ["Beta", "50"],
    ["Charlie", "4.54"],
    ["Delta", "5.54"],
    ["Echo", "8.99"],
    ["Foxtrot", "3.24"],
    ["Foxtrot", "3.24"]
  ];

  var whichSet = 1;
function updatePie() {
	var width = 480,
	    height = 480,
	    radius = Math.min(width, height) / 2;

    var color = d3.scale.category10(), svg;

   function graph(_selection) {
       _selection.each(function(_data) {

			var pie = d3.layout.pie()
				.value(function(d) { return d[1]; })
		    	.sort(null);

			var arc = d3.svg.arc()
				.innerRadius(radius - 200)
				.outerRadius(radius - 50);

      var colours =  ["#221","#223","#225","#227","#229","#22b","#22d","#22f"];
      colours.reverse();
			if (!svg){
				svg = d3.select(this).append("svg")
			    	.attr("width", width)
			    	.attr("height", height)
			    	.append("g")
			    	.attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
			}
			var path = svg.selectAll("path").data(pie(_data));

      path.enter().append("path")
			    .attr("fill", function(d, i) { return colours[i]; })
			    .attr("d", arc)
          .each(function(d) {this._current = d;} )

        .on("mouseover",function(){
          d3.select(this)
          .style('cursor','pointer');
        });

        path.on("click",function(){
          var innerData = d3.select(this).data();
          if(innerData[0].data[2] !=null){
            innerData = innerData[0].data[2];
            update(innerData);
          }else{
            update(firstDataset)
          }
        });


          // var text = svg.selectAll("text")
          //              .data(pie(_data))
          //               .enter()
          //               .append("text");
          //
          // var textLabels = text
          //         .attr("x", function(d) { return 100; })
          //        .attr("y", function(d) { return 0; })
          //        .text( function (d) { return "label"; })
          //        .attr("font-family", "sans-serif")
          //        .attr("font-size", "20px")
          //        .attr("fill", "red");

      path.transition()
			      .attrTween("d", arcTween);

      path.exit()
        .attr("fill", function(d, i) { return color(i); })
        .attr("d", arc)
        .each(function(d) {this._current = 0;})
        .remove();

			function arcTween(a) {
			  var i = d3.interpolate(this._current, a);
			  this._current = i(1);
			  return function(t) {
			    return arc(i(t));
			  };
			}
		});

	}
	return graph;
}

var updateFunction = updatePie();
var container = d3.select("#container");

function update(data) {
  var blank = new Array(data.length);
  for(var i=0;i<blank.length;i++){
      blank[i] = new Array(2);
      blank[i][0] = data[i][0];
      blank[i][1] = "0";
  }
    // container.datum(data).call(updateFunction);
    container.datum(blank).call(updateFunction);
    setTimeout(function(){container.datum(data).call(updateFunction);},500);
}


update(firstDataset);

document.getElementById("change").addEventListener("click", reDrawChart);

function reDrawChart() {

  if(whichSet == 1){
      update(secondDataset);
      whichSet = 2;
  }else{
    update(firstDataset);
    whichSet =1;
  }
}

})();
















// // function initChart() {
//                     var data = [
//                       {
//                         "mon":"1",
//                         "usage": "63"
//                       },
//                       {
//                         "mon":"2",
//                         "usage":"25"
//                       },
//                       {
//                         "mon":"3",
//                         "usage": "36"
//                       },
//                       {
//                         "mon":"4",
//                         "usage":"83"
//                       }
//                     ];
//                     var data2 = [
//                       {
//                         "mon":"1",
//                         "usage": "44"
//                       },
//                       {
//                         "mon":"2",
//                         "usage":"67"
//                       },
//                       {
//                         "mon":"3",
//                         "usage": "23"
//                       },
//                       {
//                         "mon":"4",
//                         "usage":"89"
//                       }
//                     ];
//                 //     var vis = d3.select("#visualisation"),
//                 //         WIDTH = 1000,
//                 //         HEIGHT = 500,
//                 //         MARGINS = {
//                 //             top: 20,
//                 //             right: 20,
//                 //             bottom: 20,
//                 //             left: 50
//                 //         },
//                 //         xScale = d3.scale.linear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([1, 4]),
//                 //         yScale = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([10, 100]),
//                 //         xAxis = d3.svg.axis()
//                 //         .scale(xScale),
//                 //         yAxis = d3.svg.axis()
//                 //         .scale(yScale)
//                 //         .orient("left");
//                 //     document.querySelector("#visualisation").width =WIDTH;
//                 //     document.querySelector("#visualisation").height = HEIGHT;
//                 //     vis.append("svg:g")
//                 //         .attr("class", "x axis")
//                 //         .attr("transform", "translate(0," + (HEIGHT - MARGINS.bottom) + ")")
//                 //         .call(xAxis);
//                 //     vis.append("svg:g")
//                 //         .attr("class", "y axis")
//                 //         .attr("transform", "translate(" + (MARGINS.left) + ",0)")
//                 //         .call(yAxis);
//                 //     var lineGen = d3.svg.line()
//                 //         .x(function(d) {
//                 //             return xScale(d.mon);
//                 //         })
//                 //         .y(function(d) {
//                 //             return yScale(d.usage);
//                 //         });
//                 //         var lineInit = d3.svg.line()
//                 //             .x(function(d) {
//                 //                 return xScale(d.mon);
//                 //             })
//                 //             .y(function(d) {
//                 //                 return yScale(10);
//                 //             });
//                 //         // .interpolate("basis");
//                 //         vis.on("click",swapData);
//                 //         var path = svg.selectAll("path").data(lineGen(data2));
//                 //
//                 //         path.enter().append("path")
//                 // 			    .attr("fill", function(d, i) { return color(i); })
//                 // 			    .attr("d", arc)
//                 // 				  .each(function(d) {this._current = d;} );
//                 //         path.transition()
//               	// 		      .attrTween("d", arcTween);
//                 //         path.exit().remove()
//                 //
//                 //     vis.append('svg:path')
//                 //         .attr('stroke', 'green')
//                 //         .attr('stroke-width', 2)
//                 //         .attr('fill', 'none')
//                 //         .attr('d', lineInit(data))
//                 //         .transition().duration(500).delay(500)
//                 //         .attr('d', lineGen(data));
//                 // }
//                 // // window.addEventListener('load',initChart,false);
//                 // initChart();
