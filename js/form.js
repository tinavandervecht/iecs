/* CONVERSION FORMULAS FROM www.disabled-world.com/artman/publish/metric-imperial.shtml
  * m to ft : m*3.28
  * % to decimal : %*0.01
  *
  *
*/

  function metricToImperial(input,units){
    var output = null;
    var factor = 3.28084;
    if(units === "ft"){
      output = input*factor;
    }else if(units === "in"){
      output = input*factor*12;
    }else if(units=== "yd"){
      output = input*factor/3;
    }else{
      console.log("parameter passed is invalid. please leave blank or 'in'. ");
    }
    return output;
  }
  function percentToDecimal(){

  }

(function(){
num = 12;
console.log(metricToImperial(num,"in"));
console.log(metricToImperial(num,"ft"));
console.log(metricToImperial(num,"yd"));
})();
