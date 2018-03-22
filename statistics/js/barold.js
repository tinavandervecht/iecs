(function(){
  //BAR.JS
  var graphEl = document.querySelector('.barGraph');
  var INITIAL_WIDTH = graphEl.getAttribute('width');
  var dataBar = [
    {"label": "Jan","num" : 147},
    {"label": "Feb","num" : 76},
    {"label": "Mar","num" : 409},
    {"label": "Apr","num" : 81},
    {"label": "May","num" : 57},
    {"label": "Jun","num" : 94},
    {"label": "Jul","num" : 45}
  ];
    function maxVal(arr){
  var m = 0;
  for(var i=0;i<arr.length;i++){
     if(arr[i].num>m){
        m = arr[i].num;
        console.log(m);
      }
    }
    console.log(m + " Is max");
    return m;
  }
  var months = [];
  for(var i=0; i< dataBar.length;i++){
    months.push(dataBar[i].label);
  }
  var charts = d3.select('.barGraph');
  var chartPad = {"top":20,"left":20,"right":20,"bottom":20};
  var xScale = (parseInt(d3.select('.barGraph').style('width'))-chartPad.right) / dataBar.length;
  console.log(months);
  var xScale = d3.scale.Ordinal()
          .domain([months])
          .rangePoints([0,12]);
  var h = parseInt(d3.select('.barGraph').style('height'));
  var yScale = h / maxVal(dataBar);
  var padding = xScale/6;
        var bar = charts.selectAll('.bar')
          .data(dataBar)
          .enter().append('g')
          .attr('class', '.bar');

          bar.append('rect')
          .attr('x',function(d,i){
            return i * xScale + padding*2;
          })
          .attr('y', function(d){
            return parseInt(d3.select('.barGraph').style('height')) - d.num*yScale + 0;
          })
          .attr('width',xScale-padding)
          .attr('fill',function(d,i){return i%2 ? "#213D02" : "#589021";})
          .attr('height', function(d){return d.num*yScale;});

          bar.append('text')
          .attr('x',function(d,i){
            return i * xScale + padding*2;
          })
          .attr('y', function(d){
            return parseInt(d3.select('.barGraph').style('height')) - d.num*yScale + 0;
          })
          .attr('text-anchor','middle')
          .attr('dx', function(d){return padding*2.5;})
          .attr('dy', function(d){
            console.log(d.num*yScale/h);
            if((d.num*yScale/h) < 0.2){
              return -20;
            }else{
              return 40;
            }
          })
          // .attr('dy', function(d,i){return h-20;})
          // .attr('dx', function(d,i){return i * xScale + padding*4})
          // .attr('dx', function(d,i){ return -i * xScale - (padding * 4);})
          // .attr('transform','rotate(90)')
          // .attr('fill',"#eee")
          .attr('fill', function(d,i){
            if((d.num*yScale/h) < 0.2){
              return "#222";
            }else{
              return "#eee";
            }
            })
          .attr('stroke-width', 0.8)
          .text(function(d){ return d.num});

          charts.append("g")
            .attr("transform", "translate(0," + h + ")")
            .call(d3.axisBottom(xScale));


      // charts.enter()
      //   .append('rect')
      //   .attr('x',function(d,i){
      //     return i * xScale + padding*2;
      //   })
      //   .attr('y', function(d){
      //
      //     return = parseInt(d3.select('.barGraph').style('height')) - d*yScale + 0;
      //   })
      //   .attr('width',xScale-padding)
      //   .attr('fill',function(d,i){return i%2 ? "#213D02" : "#589021";})
      //   .attr('height', function(d){return d*yScale;});
        // window.addEventListener('resize',function(){
        //   var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        //   if(w>INITIAL_WIDTH){
        //     scaleGraph(INITIAL_WIDTH);
        //     // graphEl.setAttribute('width',INITIAL_WIDTH);
        //   }else{
        //     scaleGraph(w);
        //     // graphEl.setAttribute('width',w);
        //   }
        // },false);
})();
