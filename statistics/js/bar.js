(function(){
  //LET'S TRY THIS AGAIN
var dataset = 0;
var barPad = 10;
var height = 300;
var width = 600;
var barWidth = 20;
var max = 0;
var labels = [];
var numLines = 0;

var margins = {
  top:10,
  left:40,
  right:10,
  bottom:30
}

var graph = d3.select('.barGraph');
function calcMax(){
  labels = [];
  max = 0;
  for(var key in datasets[dataset]){
   var num = datasets[dataset][key].value;
   labels.push(datasets[dataset][key].label);
   if(num>max){
     max = num;
   }
  }
  return max;
}

function load(){
  graph.append("g")
  .attr('class', 'yAxis')
  .attr("transform", "translate(" + margins.left*7/8 + ","+ margins.top+")");
  graph.append("g")
    .attr('class', 'xAxis')
    .attr("transform", "translate(" + margins.left*10/8  + ","+ (height-margins.bottom)+")");
  update(datasets[dataset]);
}
var colors = ["213D02","#589021",];

function update(data){
  barWidth = labels.length/(width-margins.right);
  max = calcMax();

  var yScale = d3.scaleLinear()
  .rangeRound([height-margins.bottom-margins.top,0])
  .domain([0,max]);

  var xScale = d3.scaleBand()
  .range([barWidth+barPad,width-margins.left-margins.right*4-barWidth])
  .domain(labels)
  .paddingInner(1);

  var yAxis = d3.axisLeft(yScale);
  var xAxis = d3.axisBottom(xScale);
  d3.select('.yAxis').transition().duration(750).call(yAxis.ticks(4));
  d3.select('.xAxis').transition().duration(750).call(xAxis);

  max = calcMax();
  var selection = graph.selectAll('.bar').data(data);
  selection.exit().remove();
  var selectionEnter = selection.enter().append('path');
  barWidth = (width-margins.right-margins.left)/data.length;
  var selectionEnter = selection.enter().append('g').attr('class', 'bar');

      selectionEnter.append('rect')
        .attr('height', function(d){return (d.value/ max)*(height - margins.top - margins.bottom);})
        .attr('x', function(d,i){return margins.left + i*barWidth+barPad/2;})
        .attr('y' , function(d){return (height-margins.bottom) - (d.value/ max)*(height - margins.top - margins.bottom);})
        .attr('width', barWidth-barPad)
        .attr('fill', function(d,i){return i%2 ? "#213D02" : "#589021"});

  selectionEnter.append('text')
  .attr('x', function(d,i){return margins.left + i*barWidth+barPad/2;})
  .attr('y' , function(d){
    var ratio = (d.value/ max);
    if(ratio < 1 ){
      return (height-margins.bottom) - ratio*(height - margins.top - margins.bottom);
    }else{
      return 10;
    }
  })
  .text(function(d){return d.value;})
  .attr('text-anchor', 'middle')
  .attr('dx', function(d){
    return barWidth/3;
    })
  .attr('dy', function(d){return d.value/max < 0.1 ? -10 : 22;})
  .attr('fill', function(d){return d.value/max < 0.1 ? "#222" : "#eee";});

  selectionEnter.merge(selection)
        .select('rect')
        .transition()
        .duration(750)
        .attr('y' , function(d){return (height-margins.bottom) - (((d.value/ max)*(height - margins.top - margins.bottom)));})
        .attr('width', barWidth-barPad)
        .attr('x', function(d,i){
          return margins.left + i*barWidth+barPad/2;})
        .attr('height', function(d){return ((d.value/ max)*(height - margins.top - margins.bottom))-barPad/2;});

  selectionEnter.merge(selection)
              .select('text')
              .transition()
              .duration(750)
              .attr('x', function(d,i){return margins.left + i*barWidth+barPad/2;})
              .attr('y' , function(d){
                var ratio = (d.value/max);
                if(ratio < 1 ){
                  return ((height-margins.bottom) - ratio*(height - margins.top - margins.bottom));
                }else{
                  return 10;
                }
              })
              .text(function(d){return d.value;})
              .attr('dx', function(d){
                return barWidth/3;
                })
              .attr('dy', function(d){return d.value/max < 0.1 ? -10 : 22;})
              .attr('fill', function(d){return d.value/max < 0.1 ? "#222" : "#eee";});
    selection.exit().remove();
    graph.on('click', function(d){
      dataset = (dataset+1)%datasets.length;
      update(datasets[dataset]);
  });
}
load();
})();



/*
barWidth = (width-margins.right-margins.left)/data.length;
var selectionEnter = selection.enter().append('g').attr('class', 'bar');

    selectionEnter.append('rect')
      .attr('height', function(d){return (d.value/ max)*(height - margins.top - margins.bottom);})
      .attr('x', function(d,i){return margins.left + i*barWidth+barPad/2;})
      // .attr('y', function(d){return height-(d.value)-margins.bottom;})
      .attr('y' , function(d){return (height-margins.bottom) - (d.value/ max)*(height - margins.top - margins.bottom);})
      .attr('width', barWidth-barPad)
      .attr('fill', function(d,i){return i%2 ? "#213D02" : "#589021"});

selectionEnter.append('text')
.attr('x', function(d,i){return margins.left + i*barWidth+barPad/2;})
.attr('y' , function(d){
  var ratio = (d.value/ max)
  if(ratio < 1 ){
    return (height-margins.bottom) - ratio*(height - margins.top - margins.bottom);
  }else{
    return 0;
  }
})
.text(function(d){return d.value;})
.attr('text-anchor', 'start')
.attr('dx', function(d){
  return (barWidth-this.getBBox().width+barPad)/4;
  })
.attr('dy', function(d){return d.value/max < 0.1 ? -10 : 22;})
.attr('fill', function(d){return d.value/max < 0.1 ? "#222" : "#eee";});

*/
