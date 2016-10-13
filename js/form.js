/* CONVERSION FORMULAS FROM www.disabled-world.com/artman/publish/metric-imperial.shtml
  * m to ft : m*3.28
  * % to decimal : %*0.01
  *
  *
*/

  function toImperial(input, inchesOrFeet){
    var output = null;
    if(inchesOrFeet != "in"){
      output = input*3.28;
    }else if(inchesOrFeet === "in"){
      output = input*3.28/12;
    }else{
      console.log("parameter passed is invalid. please leave blank or 'in'. ");
    }
    return output;
  }

(function(){
num = 12;
console.log(toImperial(num));
console.log(toImperial(num,"in"));
})();
