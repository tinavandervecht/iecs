/* CONVERSION FORMULAS FROM www.disabled-world.com/artman/publish/metric-imperial.shtml
  * m to ft : m*3.28
  * % to decimal : %*0.01
  *
  *
*/

(function(){

  //SELECTING THE FORM
  var calcSubmit = document.querySelector('#calculator');


// for pagnation pages.
  var pagnationPageTrackerPages = document.querySelectorAll(".pagnation-page-tracker .pageNo");
  var pageNo = document.querySelector('.pagnation-page-tracker .current');
  var pages =   document.querySelectorAll('.pagnation-page');
  var currentPage = document.querySelector('.pagnation-page.current');
  var pageNumber;
  var contButton = document.querySelector('.continueButton');
  var goBack = document.querySelector("#goBack");
  var edits = document.querySelectorAll('.summaryEntry .edit');

//SELECTING FIELDS AND TOGGLEABLE FIELDS
  var convertFields = document.querySelectorAll("#calculator input.convert");
  var fields = document.querySelectorAll("#calculator input:not([disabled]):not([type='submit']):not([type='date'])");
  var showMetricBox = document.querySelector("#hideMetric");
  var showImperialBox = document.querySelector("#hideImperial");
  var lastChecked; //describes last checked display unit

//TOOLTIPS on form fields
  var tooltips = document.querySelectorAll('.tip');

  var calc = false;//for pagnation

//CONTAINERS FOR FORM INPUT VALUES
  var projName;
  var projDate;
  var cityProv;
  var addr;
  var engineer;
  var flow;
  var velocity;
  var bedSlope;
  var sideSlope;
  var flowType;
  var bedWidth;
  var alignment;
  var crest;
  var length;
  var depth;
  var topWidth;
  var source;
  var soil;
  var comments;

//PAGE SWAP
function swapPage(page){
  function change(){
    currentPage = page;

  }
currentPage.classList.remove('current');
page.classList.add('current');
TweenLite.to(page, 0.2, {opacity:1.0,onComplete:change});
}

//PAGNATION FUNCTIONALITY
function goingBack(event){
  event.preventDefault();
  var it = event.currentTarget;
  if(it.dataset.pag !=null){
  pageNumber = parseInt(it.dataset.pag)-1;
  var newPage = pages[pageNumber];
  for(var i=0;i<pagnationPageTrackerPages.length;i++){
    if(pagnationPageTrackerPages[i].id == pageNumber+1){
      pagnationPageTrackerPages[i].classList.add('current');
      pageNo = pagnationPageTrackerPages[i];
    }
  }

  if(calc){
    contButton.classList.remove('hidden');
    document.querySelector('#calc').classList.add('hidden');
    calc = false;
  }
  TweenLite.to(currentPage, 0.2, {opacity:0.0, onComplete:swapPage, onCompleteParams:[newPage]});
  }
}

function pagnation(event){
  event.preventDefault();
  var it = event.currentTarget;
  var pageNumber;



  if(it.classList.contains('pageNo')){
    // console.log("pag");
    if(calc){
      contButton.classList.remove('hidden');
      document.querySelector('#calc').classList.add('hidden');
      calc = false;
    }

  it.classList.add('current');
  pageNo.classList.remove('current');
  pageNo = it;
  pageNumber = pageNo.innerHTML;
  }else if(pageNo.nextElementSibling!=null){
    pageNo.classList.remove('current');
    pageNo.nextElementSibling.classList.add('current');
    pageNo = pageNo.nextElementSibling;
    pageNumber = pageNo.innerHTML;
  }else{
    pageNo.classList.remove('current');
    pageNumber =  4;
    summarize();
    contButton.classList.add('hidden');
    document.querySelector('#calc').classList.remove('hidden');
    calc = true;
  }
  for(var i=0;i<pages.length;i++){
    if(parseInt(pages[i].id) == pageNumber || pages[i].id === pageNumber){
      var newPage = pages[i];
    }
    }
  TweenLite.to(currentPage, 0.2, {opacity:0.0, onComplete:swapPage, onCompleteParams:[newPage]});
}


//CONVERT METRIC TO IMPERIAL
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
    }else{
      return "Unexpected Input.";
    }
  }

//CONVERT INPERIAL TO METRIC
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

//CONVERT PERCENT TO DECIMAL
  function percentToDecimal(input){
    var output = parseFloat((parseFloat(input.replace("%",""))*0.01).toFixed(6));
    if(output.toString()!="NaN"){
      return output;
    }else if(output.toString()!=""){
      return "Unexpected Input.";
    }
  }

//CONVERT DECIMAL TO PERCENT
  function decimalToPercent(input){
    var output = (input*100).toFixed(2) + "%";
    if(output.toString()!="NaN%"){
      return output;
    }else if(output.toString()!=""){
      return "Unexpected Input.";
    }
  }

//UPDATE FIELDS
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

//CLEAR THE FIELD THIS IS EFFECTED ON
function clearField(){
  var it = event.currentTarget;
  it.value="";
}

//TOGGLE THE DISPLAY OF METRIC OR IMPERIAL UNITS - ALSO ENSURES ONE UNIT IS ALWAYS SHOWN
function toggleUnits(){
  var showM;
  var showI;
  if(showMetricBox.checked){
    showM = true;
    lastChecked = showMetricBox;
  }
  if(showImperialBox.checked){
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

//FILL CONTAINERS WITH RESPECTIVE INPUT'S VALUES
function getInputs(){
  //Grabs values in metric, to convert to imperial if needed.
  projName = calcSubmit.querySelector('#name').value;
  projDate = calcSubmit.querySelector('#d').value;
  console.log(calcSubmit.querySelector('#cityProv'));
  console.log(calcSubmit.querySelector('#cityProv').value);
  cityProv = calcSubmit.querySelector('#cityProv').value;
  addr = calcSubmit.querySelector('#addr').value;
  engineer = calcSubmit.querySelector('#engineerName').value;
  //
   flow = calcSubmit.querySelector('#flowMeters').value;
   velocity = calcSubmit.querySelector('#velocityMeters').value;
  //
   bedSlope = calcSubmit.querySelector('#bedSlopeDecimal').value;
   sideSlope = calcSubmit.querySelector('#sideSlopeDecimal').value;
   flowType = calcSubmit.querySelector('#flowType').value;
   bedWidth = calcSubmit.querySelector('#bedMeters').value;
   alignment = calcSubmit.querySelector('#alignType').value;
   crest = calcSubmit.querySelector('#crestMeters').value;
   length = calcSubmit.querySelector('#channelMeters').value;
   depth = calcSubmit.querySelector('#depthMeters').value;
   topWidth = calcSubmit.querySelector('#topMeters').value;
   source = calcSubmit.querySelector('#sourceType').value;
   soil = calcSubmit.querySelector('#soilType').value;
  //
 comments = calcSubmit.querySelector('#commentsBox').value;
 console.log("got inputs;");
}

//POPULATE THE SUMMARY PAGE WITH DATA
function summarize(){
  // event.preventDefault();
  var summary;
  getInputs();

  //
  summary = document.querySelector('#sum_details .text');
  summary.innerHTML = "Project Name: " + projName + " <br>";
  summary.innerHTML += "Date: " + projDate + " <br>";
  summary.innerHTML+="City and Province: " + cityProv + " <br>";
  summary.innerHTML+="Address: " + addr + " <br>";
  summary.innerHTML+="Engineer:" + engineer;
  console.log(projDate);
  console.log(cityProv);
  console.log(engineer +" <br>");

  //
  summary = document.querySelector("#sum_flow .text");
  summary.innerHTML = "Flow: " + flow +" <br>";
  summary.innerHTML+= "Veloctity:" + velocity;
  console.log(flow);
  console.log(velocity);

  //
  summary = document.querySelector('#sum_slopes .text');
  summary.innerHTML = "Bed Slope: " + bedSlope+" <br>";
  summary.innerHTML += "Side Slope: " + sideSlope;
  console.log(bedSlope);
  console.log(sideSlope);

  //
  summary = document.querySelector("#sum_type .text");
  summary.innerHTML = "Type of Flow:" + flowType;
  console.log(flowType);

  //
  summary = document.querySelector("#sum_bed .text");
  summary.innerHTML = "Bed Width: " + bedWidth + " <br>";
  summary.innerHTML += "Alignment: " + alignment + " <br>";
  summary.innerHTML += "Radius at Crest: " + crest;
  console.log(bedWidth);
  console.log(alignment);
  console.log(crest);

  //
  summary = document.querySelector("#sum_channel .text");
  summary.innerHTML = "Channel Length: " + length + " <br>";
  summary.innerHTML += "Channel Depth: " + depth + " <br>";
  summary.innerHTML += "Channel Top Width: " + topWidth;
  console.log(length);
  console.log(depth);
  console.log(topWidth);

  //
  summary = document.querySelector("#sum_environment .text");
  summary.innerHTML = "Outlet Source: " + source + " <br>";
  summary.innerHTML +="Soil Type: " + soil;
  console.log(source);
  console.log(soil);

  //
  summary = document.querySelector("#sum_comments .text");
  summary.innerHTML = "Comments: " + comments;
  console.log(comments);
}


//EVENT LISTENERS
////PAGNATION
for(var i=0; i< pagnationPageTrackerPages.length;i++){
  pagnationPageTrackerPages[i].addEventListener('click', pagnation, false);
}
goBack.addEventListener("click",goingBack,false);
for(var i=0;i<edits.length;i++){
  edits[i].addEventListener("click",goingBack,false);
}
////TOOLTIPS
for(i=0;i<tooltips.length;i++){
  tooltips[i].addEventListener('click', function(event){event.preventDefault();}, false);
}

////UPDATING FIELDS
for(var i=0;i<convertFields.length;i++){
  convertFields[i].addEventListener('input', autoUpdate, false);
}

////CLEARING FIELDS ONCLICK
for(var i=0;i<fields.length;i++){
  fields[i].addEventListener('click', clearField, false);
}

toggleUnits(); //initial activation of unit toggle functionality.

contButton.addEventListener('click', pagnation,false);
showMetricBox.addEventListener('click', toggleUnits, false);
showImperialBox.addEventListener('click', toggleUnits, false);
// calcSubmit.addEventListener('submit',calculate,false);
})();
