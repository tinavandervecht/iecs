(function(){
  //LET'S TRY THIS AGAIN
var dataset = 0;
var barPad = 10;
var height = 300;
var width = 600;
var lineWidth = 20;
var max = 0;
var labels = [];
var numLines = 0;

var margins = {
  top:10,
  left:40,
  right:10,
  bottom:30
}

var graph = d3.select('.lineGraph');
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
    .attr("transform", "translate(" + margins.left  + ","+ (height-margins.bottom)+")");
  update(datasets[dataset]);
}
var colors = ["213D02","#589021",];

function update(data){
  lineWidth = labels.length/(width-margins.right);
  max = calcMax();
  var yScale = d3.scaleLinear()
  .rangeRound([height-margins.bottom-margins.top,0])
  .domain([0,max]);

  var xScale = d3.scaleBand()
  .range([lineWidth+barPad,width-margins.left-margins.right-lineWidth])
  .domain(labels)
  .paddingInner(1);

  var yAxis = d3.axisLeft(yScale);
  var xAxis = d3.axisBottom(xScale);
  d3.select('.yAxis').transition().duration(750).call(yAxis.ticks(4));
  d3.select('.xAxis').transition().duration(750).call(xAxis);

  max = calcMax();
  var selection = graph.selectAll('.line').data(data);
  selection.exit().remove();

  lineWidth = (width-margins.right)/data.length;
  var selectionEnter = selection.enter().append('path');
  console.log(max);
  var lineGen = d3.line()
                          .x(function(d,i){return margins.left + margins.right + i*lineWidth;})
                          .y(function(d){return (height-margins.bottom) - (d.value/max)*(height - margins.top - margins.bottom);});

  // selection.enter().append('path')
  selectionEnter.attr('class', 'line')
        .attr('d', lineGen(data))
        .attr('stroke', function(d,i){ var g = numLines+1%colors.length; numLines++; return colors[g];})
        .attr('stroke-width',2)
        .attr('fill', "none");

  selectionEnter.merge(selection)
        .transition()
        .duration(750)
        .attr('d', lineGen(data));

    selection.exit().remove();
    graph.on('click', function(d){
      dataset = (dataset+1)%datasets.length;
      update(datasets[dataset]);
  });
}
load();
})();
