  //LOAD.JS
  function Graph(data,type){
    this.data = data;
    this.type = type;
    this.load = function(){
      if(type == null || data == null){
        console.log("no type specified.");
      }else if(type === "bar"){
        console.log("REQUESTED CHART: " + type);
      }else if(type === "line"){
        console.log("REQUESTED CHART: " + type);
      }else{
        console.log("That type of chart, " + type + ", is not defined for loading in this codebase.");
      }
    }
    this.setData = function(data){
      this.data = data;
      return;
    }
    this.setType = function(type){
      this.type = type;
      return;
    }
  }
  // function rand(min,max){
  //   return Math.floor(Math.random()*(max-min+1)+min);
  // }
  //   function randColor(){
  //       return "#" + rand(77,99) + "" + rand(99,33) + "" + rand(99,22);
  //   }
  //   var first = randColor();
  //   var second = randColor();
  //   var data1 = [10,20,30,40,50,60,70];
  //   d3.selectAll('div.rand')
  //   .data(data1)
  //   .style("background", function(d,i){
  //     return i%2 ? first : second;
  //   }).style("height", function(d){
  //     return d + "px";
  //   })
  //   .style("bottom", function(d){
  //     return d + "px";
  //   }).style("position","relative");
    // var cc = "#" + Math.floor(Math.random()*10) + "cccc";
    // console.log(cc);
