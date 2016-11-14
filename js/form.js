/* CONVERSION FORMULAS FROM www.disabled-world.com/artman/publish/metric-imperial.shtml
  * m to ft : m*3.28
  * % to decimal : %*0.01
  *
  *
*/

(function(){
var pagnationPageTrackerPages = document.querySelectorAll(".pagnation-page-tracker .pageNo");
var pageNo = document.querySelector('.pagnation-page-tracker .current');
var pages =   document.querySelectorAll('.pagnation-page');
var currentPage = document.querySelector('.pagnation-page.current');
var contButton = document.querySelector('.continueButton');
for(var i=0; i< pagnationPageTrackerPages.length;i++){
  pagnationPageTrackerPages[i].addEventListener('click', pagnation, false);
}
var tooltips = document.querySelectorAll('.tip');
for(i=0;i<tooltips.length;i++){
  tooltips[i].addEventListener('click', function(event){event.preventDefault();}, false);
}

  var calcSubmit = document.querySelector('#calculator');
  var tips = document.querySelectorAll('tip');
  for(var i=0;i<tips.length;i++){
    tips[i].addEventListener('mouseover',tipShow,false);
  }

var calc = false;
function pagnation(event){
  event.preventDefault();
  var it = event.currentTarget;
  var pageNumber;

  function swapPage(){
    function change(){
      currentPage = newPage;
    }
    console.log(currentPage);
  currentPage.classList.remove('current');
  newPage.classList.add('current');
  TweenLite.to(newPage, 0.2, {opacity:1.0,onComplete:change});
  }

  if(it.classList.contains('pageNo')){
    console.log("pag");
    if(calc){
      console.log("calc is shown");
      contButton.classList.remove('hidden');
      document.querySelector('#calc').classList.add('hidden');
      calc = false;
    }

  it.classList.add('current');
  pageNo.classList.remove('current');
  pageNo = it;
  pageNumber = pageNo.innerHTML;
  }else if(pageNo.nextElementSibling!=null){
    console.log("advance");
    pageNo.classList.remove('current');
    pageNo.nextElementSibling.classList.add('current');
    pageNo = pageNo.nextElementSibling;
    pageNumber = pageNo.innerHTML;
  }else{
    pageNo.classList.remove('current');
    pageNumber =  4;
    contButton.classList.add('hidden');
    document.querySelector('#calc').classList.remove('hidden');
    calc = true;
    console.log(calc);
  }
  for(var i=0;i<pages.length;i++){
    if(parseInt(pages[i].id) == pageNumber || pages[i].id === pageNumber){
      var newPage = pages[i];
    }
    }
  TweenLite.to(currentPage, 0.2, {opacity:0.0, onComplete:swapPage});
}



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
    var output = parseFloat((parseFloat(input.replace("%",""))*0.01).toFixed(6));
    if(output.toString()!="NaN"){
      return output;
    }else if(output.toString()!=""){
      return "Unexpected Input.";
    }
  }

  function decimalToPercent(input){
    var output = (input*100).toFixed(2) + "%";
    if(output.toString()!="NaN%"){
      return output;
    }else if(output.toString()!=""){
      return "Unexpected Input.";
    }
  }

function autoUpdate(event){
var it = event.currentTarget;
var metric = it.parentNode.querySelector('.metric');
var imperial = it.parentNode.querySelector('.imperial');
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
var convertFields = document.querySelectorAll("#calculator input.convert");
var fields = document.querySelectorAll("#calculator input:not([disabled]):not([type='submit']):not([type='date'])");
var showMetricBox = document.querySelector("#hideMetric");
var showImperialBox = document.querySelector("#hideImperial");
var lastChecked;

function toggleUnits(){
var showM;
var showI;
  if(showMetricBox.checked){
    console.log("metric's checked!");
    showM = true;
    lastChecked = showMetricBox;
  }
  if(showImperialBox.checked){
    console.log("imperial's checked!");
    showI = true;
    lastChecked = showImperialBox;
  }
  if(!showMetricBox.checked&&!showImperialBox.checked){
    console.log("nothing's checked!");
    showM=false;
    showI=false;
    setTimeout(function(){
      lastChecked.checked=true;
      alert("Can't show no inputs!")
      toggleUnits();
    },100);
  }
  for(var i=0;i<fields.length;i++){
    if(showI && fields[i].classList.contains('imperial')){
        fields[i].classList.add('shown');
        fields[i].previousElementSibling.classList.remove('hidden');
      }
      if(!showI && fields[i].classList.contains('imperial')){
          fields[i].classList.remove('shown');
          fields[i].previousElementSibling.classList.add('hidden');
        }
      if(showM && fields[i].classList.contains('metric')){
          fields[i].classList.add('shown');
          fields[i].previousElementSibling.classList.remove('hidden');
        }
        if(!showM && fields[i].classList.contains('metric')){
            fields[i].classList.remove('shown');
            fields[i].previousElementSibling.classList.add('hidden');
          }
        }
}



function calculate(event){
  event.preventDefault();
  var it = event.currentTarget;
  //Runs calculation in  METRIC, converts to imperial afterward if wanted
  var date = it.parentNode.querySelector('#d').value;
  var location = it.parentNode.querySelector('#projectLocation').value;
  var engineer = it.parentNode.querySelector('#engineerName').value;

  var flow = it.parentNode.querySelector('#flowMeters').value;
  var velocity = it.parentNode.querySelector('#velocityMeters').value;
  var bedSlope = it.parentNode.querySelector('#bedSlopeDecimal').value;
  var sideSlope = it.parentNode.querySelector('#sideSlopeDecimal').value;
  var flowType = it.parentNode.querySelector('#flowType').value;
  var bedWidth = it.parentNode.querySelector('#bedMeters').value;
  var alignment = it.parentNode.querySelector('#alignType').value;
  var crest = it.parentNode.querySelector('#crestMeters').value;
  var length = it.parentNode.querySelector('#channelMeters').value;
  var depth = it.parentNode.querySelector('#depthMeters').value;
  var topWidth = it.parentNode.querySelector('#topMeters').value;
  var source = it.parentNode.querySelector('#sourceType').value;
  var soil = it.parentNode.querySelector('#soilType').value;

  var comments = it.parentNode.querySelector('#commentsBox').value;

  console.log(date);
  console.log(location);
  console.log(engineer +"\n");
  console.log(flow);
  console.log(velocity);
  console.log(bedSlope);
  console.log(sideSlope);
  console.log(flowType);
  console.log(bedWidth);
  console.log(alignment);
  console.log(crest);
  console.log(length);
  console.log(depth);
  console.log(topWidth);
  console.log(source);
  console.log(soil);
  console.log(comments);
}

for(var i=0;i<convertFields.length;i++){
  convertFields[i].addEventListener('input', autoUpdate, false);
}

for(var i=0;i<fields.length;i++){
  fields[i].addEventListener('click', clearField, false);
}

toggleUnits();
contButton.addEventListener('click', pagnation,false);
calcSubmit.addEventListener('submit',calculate,false);
showMetricBox.addEventListener('click', toggleUnits, false);
showImperialBox.addEventListener('click', toggleUnits, false);
})();
