//D3 Responsive Chart
(function(){
var DEFAULT_CONTAINER = document.body;

var dataset = [
  {"name":"1","usage":"50"},
  {"name":"2","usage":"54"},
  {"name":"3","usage":"86"},
  {"name":"4","usage":"57"},
  {"name":"5","usage":"48"},
];
var svgWidth = 800;
var svgHeight = 400;
function insertChart(container){
  if(container==null){
    container = DEFAULT_CONTAINER;
  }
  var chartCont = document.createElement('div');
  var svg = document.createElement('svg');
  svg.setAttribute('width',svgWidth);
  svg.style.width = svgWidth;
  svg.setAttribute('height',svgHeight);
  svg.style.height = svgHeight;
  chartCont.id = "chartCont";
  svg.id = "chart";
  chartCont.appendChild(svg);
  container.appendChild(chartCont,container.lastChild);
}
function initChart(){
  var chart = d3.select("#chart");
  xScale = d3.scale.linear().range([0,svgWidth]).domain([1, 4]),
  yScale = d3.scale.linear().range([0,svgHeight]).domain([0, 100]),
  xAxis = d3.svg.axis().scale(xScale);
  yAxis = d3.svg.axis().scale(yScale).orient("left");
  chart.append('svg:g').call(xAxis);
  chart.append('svg:g').call(yAxis);
  var lineGen = d3.svg.line()
  .x(function(d){
    return xScale(d.name);
  })
  .y(function(d){
    return yScale(d.usage);
  });
  var path = chart.selectAll('path').data(lineGen(dataset));
  chart.append('svg:path')
  .attr('stroke', '#ABFF24')
  .attr('stroke-width', 2)
  .attr('d',lineGen(dataset));
}
insertChart();
initChart();
})();
