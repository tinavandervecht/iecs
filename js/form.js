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

  function percentToDecimal(input){
    return parseFloat((parseInt(input.replace("%",""))*0.01).toFixed(2));
  }
  function decimalToPercent(input){
    return (input*100).toFixed(2) + "%";
  }

function autoUpdate(event){
var it = event.currentTarget;
var metric = it.parentNode.querySelector('.M');
var imperial = it.parentNode.querySelector('.I');
var percent = it.parentNode.querySelector('.P');
var decimal = it.parentNode.querySelector('.D');
    if(metric != null){
      if(it===metric){
        //console.log("metric!");
        imperial.value = metricToImperial(metric.value,"ft",4);
      }else if(it===imperial){
        //console.log("imperial!");
        metric.value = imperialToMetric(imperial.value,"m",4);
      }
    }else if(percent != null){
      if(it===decimal){
        percent.value = decimalToPercent(decimal.value);
      }else if(it===percent){
        decimal.value = percentToDecimal(percent.value + "%");
      }
    }
}

function clearField(){
  var it = event.currentTarget;
  it.value="";
}


(function(){
  /* TESTING */


  var num = 12;
  console.log(metricToImperial(num,"ft"));
  var percentimal = "57%"
  console.log(percentimal);
  console.log(percentToDecimal(percentimal));
  var decimalent = 0.687;
  console.log(decimalent);
  console.log(decimalToPercent(decimalent));



/* END TESTING */
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
