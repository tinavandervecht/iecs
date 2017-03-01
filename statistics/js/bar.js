(function(){
  //LET'S TRY THIS AGAIN
  // READY
  // SET
  console.log("Go!");
var data = [
  {"label":"MAR","value":34},
  {"label":"APR","value":14},
  {"label":"MAY","value":66},
  {"label":"JUN","value":14},
  {"label":"JUL","value":107},
  {"label":"AUG","value":83},
  {"label":"SEP","value":85},
  {"label":"OCT","value":16},
  {"label":"NOV","value":6},
  {"label":"DEC","value":42},
  {"label":"JAN","value":20},
  {"label":"FEB","value":22},
];

var data2 = [
  {"label":"MAR","value":14},
  {"label":"APR","value":44},
  {"label":"MAY","value":56},
  {"label":"JUN","value":25},
  {"label":"JUL","value":197},
  {"label":"AUG","value":84},
  {"label":"SEP","value":25},
  {"label":"OCT","value":38},
  {"label":"NOV","value":56},
  {"label":"DEC","value":12},
  {"label":"JAN","value":18},
  {"label":"FEB","value":67},
];
// var svg = d3.select('.barGraph').selectAll('.bar').data(data);
var dataset = 2;
var barPad = 10;
var height = 300;
var width = 600;
var barWidth = 20;
var max = 0;
var labels = [];
for(var key in data){
 var num = data[key].value;
 labels.push(data[key].label);
 if(num>max){
   max = num;
 }
}
var margins = {
  top:10,
  left:40,
  right:10,
  bottom:30
}

function load(){
  var yScale = d3.scaleLinear()
  .rangeRound([height-margins.bottom-margins.top,0])
  .domain([0,max]);

  var xScale = d3.scaleBand()
  .range([barWidth+barPad,width-margins.left-margins.right-barWidth])
  .domain(labels)
  .paddingInner(1);

  var yAxis = d3.axisLeft(yScale);
  var xAxis = d3.axisBottom(xScale);
  var svg = d3.select('.barGraph')
  .append("g")
    .attr("transform", "translate(" + margins.left*7/8 + ","+ margins.top+")")
    .call(yAxis.ticks(4));
    svg.append("g")
        .attr("transform", "translate(" + 0 + ","+ (height-margins.bottom)+")")
        .call(xAxis);
  update();
}
function update(){
  var dedata = data;
  switch (dataset) {
    case 1:
          dedata = data;
      break;
      case 2:
            dedata = data2;
        break;
    default:
    dedata = data;
  }
  var graph = d3.select('.barGraph');
  var selection = graph.selectAll('.bar').data(dedata);
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
    selection.exit().remove();
graph.on('click', function(e, i){
  if(dataset==1){
    dataset = 2;
  }else{
    dataset = 1;
  }
    update();
  });
}
load();
})();
