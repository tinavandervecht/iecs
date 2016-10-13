/* CONVERSION FORMULAS FROM www.disabled-world.com/artman/publish/metric-imperial.shtml
  * m to ft : m*3.28
  * % to decimal : %*0.01
  *
  *
*/

  function metricToImperial(input,units){
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
      return output;
      console.log("returned.");
    }else{
      return "That's not a number...";
    }
  }


  function imperialToMetric(input,units){
    var output = null;
    var factor = 3.28084;
    input = parseFloat(input);
    if(units === "m"){
      output = input/factor;
    }else{
      console.log("parameter passed is invalid. ERROR");
    }
    if(output.toString()!="NaN"){
      return output;
      console.log("returned.");
    }else{
      return "That's not a number...";
    }
  }

  function percentToDecimal(){
  }

function autoUpdate(event){
var it = event.currentTarget;
var metric = it.parentNode.querySelector('.convertM');
var imperial = it.parentNode.querySelector('.convertI');
console.log(metric);
console.log(imperial);
if(it===metric){
  //console.log("metric!");
  imperial.value = metricToImperial(metric.value,"ft");
}else if(it===imperial){
  //console.log("imperial!");
  metric.value = imperialToMetric(imperial.value,"m");
}
}


(function(){
num = 12;
console.log(metricToImperial(num,"ft"));

var fields = document.querySelectorAll("#calculator input");
var i=0;
while(i<fields.length){
  //console.log(fields[i]);
  fields[i].addEventListener('input', autoUpdate, false);
i++;
}

})();
