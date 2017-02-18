(function(){
  //BAR.JS
  var dataBar = [147,30,100,200,34,66,234,198,240,50,120];
function maxVal(arr){
  var m = 0;
  for(var i=0;i<arr.length;i++){
     if(arr[i]>m){
        m = arr[i];
        console.log(m);
      }
    }
    console.log(m + " Is max");
    return m;
  }
  var charts = d3.select('.barGraph')
        .selectAll('rect')
        .data(dataBar)
        .attr('width',"10px")
        .attr('height', function(d){return d+"px";});
        var chartPad = {"top":20,"left":20,"right":20,"bottom":20};
        var xScale = (parseInt(d3.select('.barGraph').style('width'))-chartPad.right) / dataBar.length;
        var yScale = parseInt(d3.select('.barGraph').style('height')) / maxVal(dataBar);
        console.log(yScale);
        console.log(100*yScale);
        console.log(xScale);
        var padding = xScale/6;
      charts.enter()
        .append('rect')
        .attr('x',function(d,i){
          return i * xScale + padding*2;
        })
        .attr('y', function(d){
          var top = 0;
          // var top = chartPad.top/2;
            // top = chartPad.top;
          var pos = parseInt(d3.select('.barGraph').style('height')) - d*yScale + top;
          return pos;
        })
        .attr('width',xScale-padding)
        .attr('fill',function(d,i){return i%2 ? "#622" : "#677";})
        .attr('height', function(d){return d*yScale;});
})();
