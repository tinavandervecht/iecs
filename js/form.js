$(document).foundation();
/* CONVERSION FORMULAS FROM www.disabled-world.com/artman/publish/metric-imperial.shtml
  * m to ft : m*3.28
  * % to decimal : %*0.01
  *
  *
*/

(function(){
  var picker = new Pikaday({
        field: document.getElementById('d'),
        format: 'YYYY-MM-DD'
    })

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
//for the ONLY degrees in the form:

var frAngle = document.querySelector('#frAngle');
frAngle.addEventListener('change',function(){
  var numb = parseInt(frAngle.value);
  frAngle.value = numb;
},false);

//PAGE SWAP
function swapPage(page){
    function change(){
        currentPage = page;
    }
    currentPage.classList.remove('current');
    page.classList.add('current');
    TweenLite.to(page, 0.2, {opacity:1.0,onComplete:change});
}//END swapPage

//PAGNATION FUNCTIONALITY
function goingBack(event){
  pageNo.classList.remove('current');
  event.preventDefault();
  var it = event.currentTarget;
  if($(it).data('pag') != null){
      pageNumber = parseInt($(it).data('pag'))-1;
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
}//END goingBack

function pagnation(event){
    event.preventDefault();
    var it = event.currentTarget;
    var disabled = it.hasAttribute('disabled');
    if (!disabled) {
        updateReviewData();
        var pageNumber;
        if(it.classList.contains('pageNo')){
            if(calc){
                contButton.classList.remove('hidden');
                document.querySelector('#calc').classList.add('hidden');
                calc = false;
            }
            it.classList.add('current');
            pageNo.classList.remove('current');
            pageNo = it;
            pageNumber = pageNo.innerHTML;
            if(parseInt(pageNumber)==4){
                contButton.classList.add('hidden');
                document.querySelector('#calc').classList.remove('hidden');
                calc = true;
            }

            var newPage = setNextStep(pageNumber);
            moveToNextStep(currentPage, newPage);
            scrollBackToTop();
        }else if(pageNo.nextElementSibling!=null && parseInt(pageNumber)!=3){
            var currentStep = document.getElementsByClassName('pagnation-page current');
            var inputs = currentStep[0].getElementsByClassName('required');
            var inputList = Array.prototype.slice.call(inputs);

            var errors = currentStep[0].getElementsByClassName('error');
            var errorList = Array.prototype.slice.call(errors);
            errorList.forEach(function(error) {
                error.parentNode.removeChild(error);
            })

            var hasError = false;
            inputList.forEach(function(input) {
                if (input.value == '') {
                    $(input).after('<div><p class="error">This field is required.</p></div>');
                    hasError = true;
                    return;
                }
            })
            if (! hasError) {
                pageNo.classList.remove('current');
                pageNo.nextElementSibling.classList.add('current');
                pageNo = pageNo.nextElementSibling;
                pageNumber = pageNo.innerHTML;
                var newPage = setNextStep(pageNumber);
                moveToNextStep(currentPage, newPage);
                scrollBackToTop();
            }
        }else{
            pageNumber = pageNo.innerHTML;

            var newPage = setNextStep(pageNumber);
            moveToNextStep(currentPage, newPage);
            scrollBackToTop();
        }

        if(parseInt(pageNumber) == 4){
            contButton.classList.add('hidden');
            document.querySelector('#calc').classList.remove('hidden');
            calc = true;
        }else{
            if(contButton.classList.contains('hidden')){
                contButton.classList.remove('hidden');
                document.querySelector('#calc').classList.add('hidden');
                calc = false;
            }
        }
    }
}

function setNextStep(pageNumber) {
    for(var i=0;i<pages.length;i++){
        if(parseInt(pages[i].id) == parseInt(pageNumber)){
            return pages[i];
        }
    }
}

function moveToNextStep(currentPage, newPage) {
    TweenLite.to(currentPage, 0.2, {opacity:0.0, onComplete:swapPage, onCompleteParams:[newPage]});
}

function scrollBackToTop() {
    $(document).scrollTop(0);
}


//CONVERT METRIC TO IMPERIAL
function metricToImperial(input,units,precision){
    if (input!=""){
        var output = null;
        var factor = 3.28084;
        input = parseFloat(input);
        if(units === "ft"){
            output = input*factor;
        }else if(units === "in"){
            output = input / 25.4;
        }else if(units=== "yd"){
            output = input*factor/3;
        }else{
            //console.log("parameter passed is invalid. ERROR");
        }
        if(output.toString()!="NaN"){
            return parseFloat(output.toFixed(2));
        }else{
            return "Unexpected Input.";
        }
    }else{
        return "";
    }
}

//CONVERT INPERIAL TO METRIC
function imperialToMetric(input,units,precision){
    var output = null;
    var factor = 3.28084;
    input = parseFloat(input);
    if(units === "m"){
        output = input/factor;
    }else if(units === "mm"){
        output = input * 25.4;
    }else{
        //console.log("parameter passed is invalid. ERROR");
    }
    if(output.toString()!="NaN"){
        return parseFloat(output.toFixed(2));
    }else if(output.toString()!=""){
        return "Unexpected Input.";
    }
}

//CONVERT PERCENT TO DECIMAL
function percentToDecimal(input){
    var output = parseFloat((parseFloat(input)*0.01).toFixed(6));
    if(output.toString()!="NaN"){
        return output.toFixed(2);
    }else if(output.toString()!=""){
        return "Unexpected Input.";
    }
}

//CONVERT DECIMAL TO PERCENT
function decimalToPercent(input){
    var output = (input*100).toFixed(2);
    if(output.toString()!="NaN"){
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
          if (it.classList.contains('convert_to_in')) {
              imperial.value = metricToImperial(metric.value,"in",4);
          } else {
              imperial.value = metricToImperial(metric.value,"ft",4);
          }
      }else if(it===imperial){
          if (it.classList.contains('convert_to_mm')) {
              metric.value = imperialToMetric(imperial.value,"mm",4);
          } else {
            metric.value = imperialToMetric(imperial.value,"m",4);
        }
      }
    }else if(percent != null){
      if(it===decimal){
        percent.value = decimalToPercent(decimal.value);
      }else if(it===percent){
        decimal.value = percentToDecimal(percent.value);
      }
    }
}

//CLEAR THE FIELD THIS IS EFFECTED ON
function clearField(){
    var it = event.currentTarget;

    if (it.value == 'Not Specified') {
        it.value="";
    }
}

var showM;
var showI;
//TOGGLE THE DISPLAY OF METRIC OR IMPERIAL UNITS - ALSO ENSURES ONE UNIT IS ALWAYS SHOWN
function toggleUnits(){
showM = false;
    showI = false;
    if (showMetricBox.checked) {
        showM = true;
        lastChecked = showMetricBox;
    }
    if (showImperialBox.checked) {
        showI = true;
        lastChecked = showImperialBox;
    }
    if (!showMetricBox.checked&&!showImperialBox.checked) {
        showM=false;
        showI=false;
        setTimeout(function(){
            lastChecked.checked=true;
            toastr.error('A measurement must be selected');
            toggleUnits();
        }, 100);
    }

    for(var i=0;i<fields.length;i++){
        if (showI && fields[i].classList.contains('imperial')) {
            fields[i].classList.add('shown');
            fields[i].previousElementSibling.classList.remove('hidden');
        }
        if (!showI && fields[i].classList.contains('imperial')) {
            fields[i].classList.remove('shown');
            fields[i].previousElementSibling.classList.add('hidden');
        }
        if (showM && fields[i].classList.contains('metric')) {
            fields[i].classList.add('shown');
            fields[i].previousElementSibling.classList.remove('hidden');
        }
        if (!showM && fields[i].classList.contains('metric')) {
            fields[i].classList.remove('shown');
            fields[i].previousElementSibling.classList.add('hidden');
        }
    }
}

var align = calcSubmit.querySelector('#alignType');
function checkAlign(){
    if(align.value == 0){
        calcSubmit.querySelector('#crestRadius').classList.add('hidden');
        calcSubmit.querySelector('#channelSpecs').classList.add('hidden');
        var crestInputs = calcSubmit.querySelector('#crestRadius').getElementsByTagName('input');
        var crestInputList = Array.prototype.slice.call(crestInputs);
        var channelSpecInputs = calcSubmit.querySelector('#channelSpecs').getElementsByTagName('input');
        var channelSpecInputList = Array.prototype.slice.call(channelSpecInputs);
        var inputs = crestInputList.concat(channelSpecInputList);
        inputs.forEach(function(input) {
            input.classList.remove("required");
        });
    }else{
        calcSubmit.querySelector('#crestRadius').classList.remove('hidden');
        calcSubmit.querySelector('#channelSpecs').classList.remove('hidden');
        var crestInputs = calcSubmit.querySelector('#crestRadius').getElementsByTagName('input');
        var crestInputList = Array.prototype.slice.call(crestInputs);
        var channelSpecInputs = calcSubmit.querySelector('#channelSpecs').getElementsByTagName('input');
        var channelSpecInputList = Array.prototype.slice.call(channelSpecInputs);
        var inputs = crestInputList.concat(channelSpecInputList);
        var inputList = Array.prototype.slice.call(inputs);
        inputs.forEach(function(input) {
            input.classList.add("required");
        });
    }
}
align.addEventListener('input',checkAlign,false);

//FILL CONTAINERS WITH RESPECTIVE INPUT'S VALUES
function getInputs(){
  //Grabs values in metric, to convert to imperial if needed.
  function flw(num){
      switch (parseInt(num)) {
        case 0:
          return "Normal";
          break;
        case 1:
          return "Overtopping";
          break;
        case 2:
          return "Sub-Critical";
          break;
        case 3:
          return "Hydraulic";
          break;
        case 4:
          return "Jump";
          break;
        case 5:
          return "Impinging";
          break;
        case 6:
          return "Bridge/Culvert";
          break;
        case 7:
          return "Undulating Trans Critical";
          break;
        default:
          return "Normal";
        }
    }
    function outlet(num){
      switch (parseInt(num)) {
        case 0:
          return "River";
          break;
        case 1:
          return "Manhole";
          break;
        case 2:
          return "Pond";
          break;
        case 3:
          return "Weir";
          break;
        case 4:
          return "Other";
          break;
        default:
          return "River";
      }
    }
    function soil(num){
      switch (parseInt(num)) {
        case 0:
          return "Topsoil";
          break;
        case 1:
          return "Clay";
          break;
        case 2:
          return "Sand";
          break;
        case 3:
          return "Silt";
          break;
        case 4:
          return "Other";
          break;
        default:
          return "Topsoil";
      }
    }

  return/*s  a js object containing all the values, formatted with title and value, for outputting via object iterator*/ {
    //I need to remove the iterator; I don't think iterators are spec in IE. works fine in edge tho
    sum_details : {
      projName : {title : "Project Name", value : calcSubmit.querySelector('#name').value},
      projDate : {title : "Project Date", value : calcSubmit.querySelector('#d').value},
      cityProv : {title : "City and Province", value : calcSubmit.querySelector('#cityProv').value},
      addr : {title : "Address", value : calcSubmit.querySelector('#addr').value},
      engineerName : {title : "Engineer Name", value : calcSubmit.querySelector('#engineerName').value}
    },
    sum_flow : {
      flowMeters : {title : "Flow", value : calcSubmit.querySelector('#flowMeters').value},
      velocityMeters : {title : "Velocity", value : calcSubmit.querySelector('#velocityMeters').value}
    },
    sum_slopes : {
      bedSlope : {title : "Bed Slope", value : calcSubmit.querySelector('#bedSlopeDecimal').value},
      sideSlope : {title : "Side Slope", value : calcSubmit.querySelector('#sideSlopeDecimal').value}
    },
    sum_type : {
      flowType : {title : "Flow Type", value : flw(calcSubmit.querySelector('#flowType').value)}
    },
    sum_block : {
      blockType : {title : "Use block On", value : (parseInt(calcSubmit.querySelector('#blockUse').value) == 0 ? "Both Bed and Side" : ( parseInt(calcSubmit.querySelector('#flowType').value) == 1 ? "Only on Bed" : "Only on Side") ) }
    },
    sum_bed : {
      bedWidth : {title : "Bed Width", value : calcSubmit.querySelector('#bedMeters').value},
      alignment : {title : "Alignment", value : (parseInt(calcSubmit.querySelector('#alignType').value) == 0 ? "Straight" : "Not Straight")},
      crest : {title : "Radius at the Crest", value : calcSubmit.querySelector('#crestMeters').value},
    },
    sum_channel : {
      length : {title : "Channel Length", value : calcSubmit.querySelector('#channelMeters').value},
      depth : {title : "Depth", value : calcSubmit.querySelector('#depthMeters').value},
      topWidth : {title : "Top Width", value : calcSubmit.querySelector('#topMeters').value},
    },
    sum_environment : {
      source : {title : "Outlet Source", value : outlet(calcSubmit.querySelector('#sourceType').value)},
      soil : {title : "Soil Type", value : calcSubmit.querySelector('#soilType').value},
    },
    sum_comments : {
    comments : {title : "Comments", value : calcSubmit.querySelector('#commentsBox').value}
    }
  };
}

//POPULATE THE SUMMARY PAGE WITH DATA
function summarize(){
  function stringify(json){
    var s = "";
    for(i = 0; i <= Object.keys(json); i++){
      s += json[i].title + ": " + json[i].value + " " + "<br>";
    }
   return s;
  }
  var inputs = getInputs();
  var summaryEntries = document.querySelectorAll('.summaryEntry');
  var i=0;
  // for(json of Object.keys(inputs)){
  //   stringify(inputs[json]);
  // }
  // for(box = 0; box <= summaryEntries; box++){
  summerEntries.forEach(function(box)  {
      box.querySelector('.text').innerHTML =  stringify(inputs[box.id]);
  })
}

function updateReviewData() {
        // Step 1 Inputs
        setDetailsReview();
        setFlowVelocityReview();
        // Step 2 Inputs
        setSlopesReview();
        setFlowTypeReview();
        setBedTypeAndAlignmentReview();
        // Step 3 Inputs
        setChannelReview();
        setEnvironmentReview();
        setCommentReview();
}

function setDetailsReview() {
    document.querySelector('#sum_details').querySelector('.details').innerHTML = '';
    var projectInformationInputs = calcSubmit.querySelector('#project_information_inputs').getElementsByClassName('input');
    var projectInformationInputList = Array.prototype.slice.call(projectInformationInputs);
    var projectInformationHTML = getAreaInputValues(projectInformationInputList, 'input');
    document.querySelector('#sum_details').querySelector('.details').innerHTML = projectInformationHTML;
}

function setFlowVelocityReview() {
    document.querySelector('#sum_flow').querySelector('.details').innerHTML = '';
    var sumFlowInputs = calcSubmit.querySelector('#flow_velocity_inputs').getElementsByClassName('input');
    var sumFlowInputList = Array.prototype.slice.call(sumFlowInputs);
    var sumFlowHTML = getAreaInputValues(sumFlowInputList, 'input');

    var sumFlowMultiInputs = calcSubmit.querySelector('#flow_velocity_inputs').getElementsByClassName('multi_input');
    var sumFlowMultiInputList = Array.prototype.slice.call(sumFlowMultiInputs);
    var sumFlowMultiHTML = getAreaMultiInputValues(sumFlowMultiInputList);
    document.querySelector('#sum_flow').querySelector('.details').innerHTML = sumFlowHTML + sumFlowMultiHTML;
}

function setSlopesReview() {
    document.querySelector('#sum_slopes').querySelector('.details').innerHTML = '';
    var slopeInputs = calcSubmit.querySelector('#slope_inputs').getElementsByClassName('input');
    var slopeInputList = Array.prototype.slice.call(slopeInputs);
    var slopeHTML = getAreaInputValues(slopeInputList, 'input');

    var slopeMultiInputs = calcSubmit.querySelector('#slope_inputs').getElementsByClassName('multi_input');
    var slopeMultiInputList = Array.prototype.slice.call(slopeMultiInputs);
    var slopeMultiHTML = getAreaMultiInputValues(slopeMultiInputList);
    document.querySelector('#sum_slopes').querySelector('.details').innerHTML = slopeHTML + slopeMultiHTML;
}

function setFlowTypeReview() {
    document.querySelector('#sum_type').querySelector('.details').innerHTML = '';
    var flowTypeInputs = calcSubmit.querySelector('#flow_type_inputs').getElementsByClassName('input');
    var flowTypeInputList = Array.prototype.slice.call(flowTypeInputs);
    var flowTypeHTML = getAreaSelectValues(flowTypeInputList);
    document.querySelector('#sum_type').querySelector('.details').innerHTML = flowTypeHTML;
}

function setBedTypeAndAlignmentReview() {
    document.querySelector('#sum_bed').querySelector('.details').innerHTML = '';
    var bedTypeAlignmentInputs = calcSubmit.querySelector('#bed_type_alignment_inputs').getElementsByClassName('input');
    var bedTypeAlignmentInputList = Array.prototype.slice.call(bedTypeAlignmentInputs);
    var bedTypeAlignmentHTML = getAreaSelectValues(bedTypeAlignmentInputList);

    var bedTypeAlignmentMultiInputs = calcSubmit.querySelector('#bed_type_alignment_inputs').getElementsByClassName('multi_input');
    var bedTypeAlignmentMultiInputList = Array.prototype.slice.call(bedTypeAlignmentMultiInputs);
    var bedTypeAlignmentMultiHTML = getAreaMultiInputValues(bedTypeAlignmentMultiInputList);
    document.querySelector('#sum_bed').querySelector('.details').innerHTML = bedTypeAlignmentHTML + bedTypeAlignmentMultiHTML;
}

function setChannelReview() {
    document.querySelector('#sum_channel').querySelector('.details').innerHTML = '';
    var channelInputs = calcSubmit.querySelector('#channel_inputs').getElementsByClassName('input');
    var channelInputList = Array.prototype.slice.call(channelInputs);
    var channelHTML = getAreaInputValues(channelInputList, 'input');

    var channelMultiInputs = calcSubmit.querySelector('#channel_inputs').getElementsByClassName('multi_input');
    var channelMultiInputList = Array.prototype.slice.call(channelMultiInputs);
    var channelMultiHTML = getAreaMultiInputValues(channelMultiInputList);
    document.querySelector('#sum_channel').querySelector('.details').innerHTML = channelHTML + channelMultiHTML;
}

function setEnvironmentReview() {
    document.querySelector('#sum_environment').querySelector('.details').innerHTML = '';
    var environmentInputs = calcSubmit.querySelector('#environment_inputs').getElementsByClassName('input');
    var environmentInputList = Array.prototype.slice.call(environmentInputs);
    var environmentHTML = getAreaSelectValues(environmentInputList);
    document.querySelector('#sum_environment').querySelector('.details').innerHTML = environmentHTML;
}

function setCommentReview() {
    document.querySelector('#sum_comments').querySelector('.details').innerHTML = '';
    var commentInputs = calcSubmit.querySelector('#comment_inputs').getElementsByClassName('input');
    var commentInputList = Array.prototype.slice.call(commentInputs);
    var commentHTML = getAreaInputValues(commentInputList, 'textarea');
    document.querySelector('#sum_comments').querySelector('.details').innerHTML = commentHTML;
}

function getAreaInputValues(array, inputType) {
    var string = '';
    array.forEach(function(input) {
        var label = input.querySelector('.title').textContent;
        var value = input.querySelector(inputType).value && input.querySelector(inputType).value.replace(/\s/g,'') != '' ? input.querySelector(inputType).value : 'N/A';
        string += '<p><strong>' + label + ':</strong> ' + value + '</p>';
    });

    return string;
}

function getAreaSelectValues(array) {
    var string = '';
    array.forEach(function(input) {
        var label = input.querySelector('.title').textContent;
        var value = input.querySelector('select').options[input.querySelector('select').selectedIndex].text;
        string += '<p><strong>' + label + ':</strong> ' + value + '</p>';
    });

    return string;
}

function getAreaMultiInputValues(array) {
    var string = '';
    array.forEach(function(input) {
        var mainLabel = input.querySelector('.title').textContent;
        string += '<p><strong>' + mainLabel + ':</strong><br/>';

        var inputs = input.getElementsByTagName('input');
        var inputList = Array.prototype.slice.call(inputs);

        inputList.forEach(function(subInput) {
            var label = document.querySelector("label[for=" + subInput.id + "]").querySelector('.unit').textContent;
            var value = subInput.value ? subInput.value : 'N/A';
            string += '(' + label + ') - ' + value + '<br/>';
        })

        string += '</p>';
    });

    return string;
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
checkAlign(); //initalize the hiding of the alignment conditional
contButton.addEventListener('click', pagnation,false);
showMetricBox.addEventListener('click', toggleUnits, false);
showImperialBox.addEventListener('click', toggleUnits, false);
// calcSubmit.addEventListener('submit',calculate,false);



function updateSvg(parent,val,elToFill){
  if(val == "NaN"){
    val = "";
  }
  if (parent.querySelector(elToFill).innerHTML) {
      parent.querySelector(elToFill).innerHTML = parent.querySelector(elToFill).innerHTML.replace(/\d/g,'').replace('.','') + val;
  }
}


var svg = true;
//CHANGING THE SVG VALUES
if(svg){
    var svg1 = document.querySelector("#svg1 svg");
    //BED SLOPE
    var bedD = document.querySelector("#bedSlopeDecimal");
    bedD.addEventListener('input',function(){
      val = bedD.value;
      val = parseFloat(val).toFixed(4);
      updateSvg(svg1,val,'#bedSlope text');
    },false);

    //SIDE SLOPE
    var sideD = document.querySelector("#sideSlopeDecimal");
    sideD.addEventListener('input',function(){
      val = sideD.value;
      val = parseFloat(val).toFixed(4);
      updateSvg(svg1,val,'#sideSlope text');
    },false);

    //TYPE OF FLOW
    var flow = document.querySelector("#flowType");
    var flows = new Array();
    var opts = flow.querySelectorAll('option');
    for(var i=0;i<opts.length;i++){
      flows.push(opts[i].innerHTML);
    }
    flow.addEventListener('change',function(){
      val = flows[parseInt(flow.value)].toUpperCase();
      svg1.querySelector('#flowwy text').innerHTML = "FLOW TYPE: " + val;
    },false);
}



//THIS UPDATES THE FIELDS WHEN THEY LOAD
window.addEventListener('load', function(){
  for(var i=0;i<convertFields.length;i++){
    var met = convertFields[i].parentNode.querySelector('.metric');
    var imp = convertFields[i].parentNode.querySelector('.imperial');
    if(met!==null){
        if (met.classList.contains('convert_to_in')) {
            imp.value = metricToImperial(met.value,"in",4);
        } else {
            imp.value = metricToImperial(met.value,"ft",4);
        }
    }
  }


//FOR svg1
function loadSvg(){
  var svg1 = document.querySelector("#svg1 svg");

  //BED SLOPE
  var bedD = document.querySelector("#bedSlopeDecimal");

    val = bedD.value;
    val = parseFloat(val).toFixed(4);
    updateSvg(svg1,val,'#bedSlope text');

  //SIDE SLOPE
  var sideD = document.querySelector("#sideSlopeDecimal");

    val = sideD.value;
    val = parseFloat(val).toFixed(4);
    updateSvg(svg1,val,'#sideSlope text');

  var flow = document.querySelector("#flowType");
  var flows = new Array();
  var inputs = flow.querySelectorAll('option');
  var inputList = Array.prototype.slice.call(inputs);
  inputList.forEach(function(opt) {
      flows.push(opt.innerHTML);
  })
  val = flows[parseInt(flow.value)].toUpperCase();
  svg1.querySelector('#flowwy text').innerHTML = "FLOW TYPE: " + val;
}

loadSvg();
}, false);
})();
