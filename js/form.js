/* CONVERSION FORMULAS FROM www.disabled-world.com/artman/publish/metric-imperial.shtml
  * m to ft : m*3.28
  * % to decimal : %*0.01
  *
  *
*/

  function metricToImperial(input,units,precision){
    var output = null;
    var factor = 3.28084;
    input = parseFloat(input);
    if(units === "ft"){
      output = input*factor;
    }else if(units === "in"){
      output = input*factor*12;
    }else if(units=== "yd"){
      output = input*factor/3;
    }else{
      console.log("parameter passed is invalid. ERROR");
    }
    if(output.toString()!="NaN"){
      return parseFloat(output.toFixed(precision));
      console.log("returned.");
    }else{
      return "Unexpected Input.";
    }
  }


  function imperialToMetric(input,units,precision){
    var output = null;
    var factor = 3.28084;
    input = parseFloat(input);
    if(units === "m"){
      output = input/factor;
    }else{
      console.log("parameter passed is invalid. ERROR");
    }
    if(output.toString()!="NaN"){
      return parseFloat(output.toFixed(precision));
      //console.log("returned.");
    }else if(output.toString()!=""){
      return "Unexpected Input.";
    }
  }

  function percentToDecimal(){
  }

function autoUpdate(event){
var it = event.currentTarget;
var metric = it.parentNode.querySelector('.M');
var imperial = it.parentNode.querySelector('.I');
console.log(metric);
console.log(imperial);
if(it===metric){
  //console.log("metric!");
  imperial.value = metricToImperial(metric.value,"ft",4);
}else if(it===imperial){
  //console.log("imperial!");
  metric.value = imperialToMetric(imperial.value,"m",4);
}
}

function clearField(){
  var it = event.currentTarget;
  it.value="";
}


(function(){
num = 12;
console.log(metricToImperial(num,"ft"));

var convertFields = document.querySelectorAll("#calculator input.convert");
var i=0;
while(i<convertFields.length){
  //console.log(fields[i]);
  convertFields[i].addEventListener('input', autoUpdate, false);
  i++;
}

var fields = document.querySelectorAll("#calculator input");
var j=1;
while(j<fields.length){
fields[j].addEventListener('click', clearField, false);
j++;
}

})();
