(function(){
//THIS FILE IS WHERE THE CALCULATIONS TAKE PLACE.

      //CALCULATIONS

      //is responsible for some form of page animation, feature, pop up etc.

      //almost everything after CALCULATIONS is where the formulas should go.

//CONSTANTS
var PRECISION = 2; //number of displayed decimals on block output.
var MINIMUM = 1; //absolute minimum safe safety factor for a block
var UPSELL = 1.5; //minimum safety factor to upsell to, anything below this but above MINIMUM is still acceptable, want to upsell to this

var submittoIECS = document.querySelector("#saveit");
var yeahSave = document.querySelector(".box #yes");
var noSave = document.querySelector(".box #no");
var blocks = document.querySelectorAll(".block:not(.disabled)");
var selected = null; //container for currently selected
var TIME = 1; //seconds for expansion of dropdown/collapse
var BOXHEIGHT = "auto";
var BLOCKSMALL = "7.9em";
var selectedblock = document.querySelector("#selectedblock");
function openClose(event,block){
  var it;
  try{
    event.preventDefault();
    it = event.currentTarget;
  }
  catch(e){
      toastr.error(e);
  }
  if(!(it.classList.contains('disabled'))){
  toggleBlockOpen(it);
}
}

if (yeahSave) {
    yeahSave.addEventListener('click',showRegionSelection,false);
}
if (document.querySelector('#cancel')) {
    document.querySelector('#cancel').addEventListener('click', resetSaveModal, false);
}

function showRegionSelection() {
    document.querySelector('#regionSelection').classList.remove('hidden');
    document.querySelector('#initialSelection').classList.add('hidden');
}

function resetSaveModal() {
    var subpopup = document.querySelector('#subforreview');

    TweenLite.to(subpopup,0.2,{opacity:0,onComplete:function(){subpopup.classList.remove('shown');}});

    document.querySelector('#regionSelection').classList.add('hidden');
    document.querySelector('#initialSelection').classList.remove('hidden');
}


function toggleBlockOpen(block){
  var it = block;
  if(selected!=null && it!=selected){
    TweenLite.to(selected, TIME,{height:BLOCKSMALL});
    if(selected!=null){
      selected.classList.remove('selected');
    }
  }
  if(it!=selected){
    // TweenLite.to(it, TIME,{height:BOXHEIGHT});
    TweenLite.to(it, TIME,{height:"auto"});
    TweenLite.from(it, TIME,{height:BLOCKSMALL});
    it.classList.add('selected');
    selected = it;
  }else{
    TweenLite.to(it, TIME,{height:BLOCKSMALL});
    selected.classList.remove('selected');
    selected = null;
  }
}

for(var i=0;i<blocks.length;i++){
  if(blocks[i].classList.contains('highlight')){
    // TweenLite.to(blocks[i], TIME,{height:BOXHEIGHT});
    TweenLite.to(blocks[i], TIME,{height:"auto"});
    TweenLite.from(blocks[i], TIME,{height:BLOCKSMALL});
    selected = blocks[i];
  }
  blocks[i].addEventListener("click",openClose,false);
}
var subpopup = document.querySelector('#subforreview');
var shwn = false;



function closeEl(el){
  TweenLite.to(el,0.5,{opacity:0,onComplete:function(){
      el.style.display = "none";
      if(el.classList.contains('shown')){
        el.classList.remove('shown');
      }
    }
  });
}

function toggleSubmit(button){
  if(button.classList.contains('email')){
    var modal = document.querySelector('#myModal');
    modal.style.display = "block";
    TweenLite.to(modal,0.5,{opacity:1.0});
    modal.querySelector(".close").addEventListener('click',function(){
      closeEl(modal);
    },false);
    window.addEventListener('click',function(){
      if (event.target == modal){
        closeEl(modal);
      }
    },false);
  }else if(button.classList.contains('save')){
    if(!shwn){
      subpopup.classList.add('shown');
      TweenLite.to(subpopup,0.2,{opacity:1,onComplete:function(){TweenLite.to(subpopup.querySelector('.box'),0.1,{opacity:1});}});
    }else{
      TweenLite.to(subpopup,0.2,{opacity:0,onComplete:function(){subpopup.classList.remove('shown');}});
    }
    shwn = !shwn;
  }else if(button.id === "no"){
    closeEl(subpopup);
  }
}
function tog(event){
  event.preventDefault();
  var it = event.currentTarget;
  toggleSubmit(it);
}

try{
  submittoIECS.addEventListener('click',tog,false);
  if (noSave) {
      noSave.addEventListener('click',tog,false);
  }

  if (document.querySelector('#myModal')) {
      document.querySelector('#myModal').querySelector(".close").addEventListener('click',function(){
        closeEl(document.querySelector('#myModal'));
      });

      window.addEventListener('click',function(){
        if (event.target == document.querySelector('#myModal')){
          closeEl(document.querySelector('#myModal'));
        }
      });
    }
} catch(e){
    toastr.error(e);
}


// CALCULATIONS

var jsonData;
var blockData;

// Custom Variables to store math
var angleBedSlope;
var angleBedSlopeTan;
var angleBedSlopeSin;
var angleBedSlopeCos;

var channelSideSlope;
var channelSideSlopeZn;

var angleSideSlope;
var angleSideSlopeTan;
var angleSideSlopeSin;
var angleSideSlopeCos;

var angleFriction;
var angleFrictionTan;

var blockDesignParamL1;
var blockDesignParamL2;
var blockDesignParamL3;
var blockDesignParamL4;
var blockDesignParamLT;

var blockNormalForceBed;
var blockNormalForceSide;

var section;

var bedWidthDN;
var doubleCheckAn;
var doubleCheck;

var flowSectionArea;

var bedWidthY;

var mannings;
var manningsCos;

var shearStressBed;
var shearStressBedKg;

var shearStressSide;

var shearDragBedForce;
var shearDragSideForce;

var liftForceBed;
var liftForceSide;

var offsetN;
var offsetWhere;
var offsetWhere2;
var offsetNormalVelocity;

var netBedDrag;
var netSideDrag;
var netBedLift;
var netSideLift;
var netBedNormalForces;
var netSideNormalForces;

var shearStressBedC = 1.00;
var manningsC = 1.000;

var showSendSuggestion = true;
/*THE BELOW IS AN OBJECT CALLED Calculations WHICH CONTAINS METHODS
CONCERNING EACH CALCULATION THAT NEEDS TO BE PERFORMED.

THIS SHOULD BE WHERE YOU INSERT YOUR NEW CALCULATIONS, WITH THE FOLLOWING FORMAT:

this.calcName = function(){
return (a*b*c)/d + e -f; //RANDOM CALC
}

*/
function Calculations(data, blockData){
  setBedSlopeAngleVariables(data.estimate_bedSlope);
  setChannelSideSlopeVariables(data.estimate_sideSlope);
  setSideSlopeAngleVariables();
  setFrictionAngleVariables(data.estimate_friction);
  setBlockVariables(blockData.product_b, blockData.product_hB, blockData.product_Ws);
  setSectionVariable(data.estimate_expectedFlow, data.estimate_expectedVelocity);
  mannings = blockData.product_manningsN;
  setBedWidthVariables(data.estimate_bedWidth, data.estimate_bedSlope, data.estimate_expectedFlow);
  setManningsVariables();

  flowSectionArea = Number(data.estimate_expectedFlow / data.estimate_expectedVelocity).toFixed(3);
  bedWidthY = (Math.pow((Math.pow(data.estimate_bedWidth, 2)+4*(1/data.estimate_sideSlope)*flowSectionArea), 0.5)-data.estimate_bedWidth)/(2/data.estimate_sideSlope);

  if(Boolean(Number(data.estimate_alignment))) {
      setShearStressBedC(data.estimate_crestRadius, data.estimate_topWidth);
  }

  setShearStressVariables();
  setShearDragForceVariables();
  setLiftForceVariables();

  setOffsetVariables(data.estimate_expectedVelocity, data.estimate_offset, blockData.product_bT);
  setNetVariables(blockData.product_bT, data.estimate_offset);

  //GENERIC OVERTURNING AND SLIDING CALCULATIONS
  this.overturningBed= function(){
      return ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netBedDrag) + (blockDesignParamL4 * netBedLift)) == 0
        ? 0
        : blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos / ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netBedDrag) + (blockDesignParamL4 * netBedLift));
  }
  this.overturningSide = function(){
      var side1Check = ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netSideDrag)+(blockDesignParamL4 * netSideLift)) == 0
        ? 0
        : Number((blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netSideDrag)+(blockDesignParamL4 * netSideLift))).toFixed(2);
      var side2Check = Number((blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / (blockDesignParamL2 * netSideLift + blockDesignParamL1 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeSin)).toFixed(2);
      var side3Check = Number((blockDesignParamLT * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / Math.pow((Math.pow(((blockDesignParamL3 * netSideDrag)+(blockDesignParamL4 * netSideLift)), 2) + Math.pow((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeSin), 2)), 0.5)).toFixed(2);

      return Math.min(side1Check, side2Check, side3Check);
  }
  this.slidingBed = function(){
      return (Number(netBedDrag) + blockData.product_Ws * angleBedSlopeSin) == 0
        ? 0
        : (netBedNormalForces * angleFrictionTan) / (Number(netBedDrag) + blockData.product_Ws * angleBedSlopeSin);
  }
  this.slidingSide = function(){
      var side1Check = Number(netSideNormalForces * angleFrictionTan / (Number(netSideDrag) + blockData.product_Ws * angleBedSlopeSin)).toFixed(2);
      var side2Check = Number(netSideNormalForces * angleFrictionTan / (blockData.product_Ws * angleSideSlopeSin * angleBedSlopeCos)).toFixed(2);
      var side3Check = netSideNormalForces * angleFrictionTan / (Math.pow((Math.pow((Number(netSideDrag)+blockData.product_Ws*angleBedSlopeSin),2) + Math.pow((blockData.product_Ws*angleSideSlopeSin*angleBedSlopeCos),2)),0.5));

      return Math.min(side1Check, side2Check, side3Check);
  }

  // INPUT BLOCK-SPEC VALUES, RETURNS JSON OF THE SAFETY FACTORS

/*THIS IS A METHOD THAT RETURNS A JS OBJECT OF THE SAFTEY FACTORS, WHICH LOOKS LIKE THIS:
{o:{bed:1.2,side:2.3},s:{bed:2.4,side:1.4}}

WHERE

o.bed = the bed overturning safety factor;
o.side = the side overturning safety factor;
s.bed = the bed sliding safety factor;
s.side = the side sliding safety factor;
*/
  this.blockSon = function(block){
    return {
      o : { //overturning
        bed: isNaN(this.overturningBed()) ? 0 : Number(this.overturningBed()).toFixed(PRECISION),
        side: isNaN(this.overturningSide()) ? 0 : Number(this.overturningSide()).toFixed(PRECISION)
      },
      s: { //sliding
        bed: isNaN(this.slidingBed()) ? 0 : Number(this.slidingBed()).toFixed(PRECISION),
        side: isNaN(this.slidingSide()) ? 0 : Number(this.slidingSide()).toFixed(PRECISION)
      }
      };
  }
}

function performCalcs() {
    if (jsonData && blockData) {
        var pdfContentForm = document.getElementById('pdf-data');

        for (var i = 0; i < blockData.length; i++) {
            var blockElement = document.getElementById(i + '-' + blockData[i]['product_name']);
            var calc = new Calculations(jsonData, blockData[i]);

            blockElement.querySelector('.overturning .bed').innerHTML = calc.blockSon().o.bed;
            if(calc.blockSon().o.bed < UPSELL){
                if (calc.blockSon().o.bed < MINIMUM) {
                    blockElement.querySelector('.overturning .bed').parentNode.classList.add('bignono');
                } else {
                    blockElement.querySelector('.overturning .bed').parentNode.classList.add('nono');
                }
            } else {
                showSendSuggestion = false;
            }

            blockElement.querySelector('.sliding .bed').innerHTML = calc.blockSon().s.bed;
            if(calc.blockSon().s.bed < UPSELL){
                if(calc.blockSon().s.bed < MINIMUM){
                    blockElement.querySelector('.sliding .bed').parentNode.classList.add('bignono');
                }else{
                    blockElement.querySelector('.sliding .bed').parentNode.classList.add('nono');
                }
            } else {
                showSendSuggestion = false;
            }

            blockElement.querySelector('.overturning .side').innerHTML = calc.blockSon().o.side;
            if(calc.blockSon().o.side < UPSELL){
                if(calc.blockSon().o.side < MINIMUM){
                    blockElement.querySelector('.overturning .side').parentNode.classList.add('bignono');
                }else{
                    blockElement.querySelector('.overturning .side').parentNode.classList.add('nono');
                }
            } else {
                showSendSuggestion = false;
            }

            blockElement.querySelector('.sliding .side').innerHTML = calc.blockSon().s.side;
            if(calc.blockSon().s.side < UPSELL){
                if(calc.blockSon().s.side < MINIMUM){
                    blockElement.querySelector('.sliding .side').parentNode.classList.add('bignono');
                }else{
                    blockElement.querySelector('.sliding .side').parentNode.classList.add('nono');
                }
            } else {
                showSendSuggestion = false;
            }

            /*-- Storing User information in PDF form --*/
            var input = document.createElement("input");
                input.type = "hidden";
                input.name =  "project_information[name]";
                input.value = jsonData['estimate_name'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name =  "project_information[location]";
                input.value = jsonData['estimate_location'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name =  "project_information[engineer]";
                input.value = jsonData['estimate_engineer'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name =  "project_information[date]";
                input.value = jsonData['estimate_projectedDate'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name =  "project_information[address]";
                input.value = jsonData['estimate_address'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name =  "project_information[comments]";
                input.value = jsonData['estimate_comments'];
                pdfContentForm.appendChild(input);

            /*-- Storing Global Responses for each block in PDF form --*/
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[o][b]";
                input.value = calc.blockSon().o.bed;
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[s][b]";
                input.value = calc.blockSon().s.bed;
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[o][s]";
                input.value = calc.blockSon().o.side;
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[s][s]";
                input.value = calc.blockSon().s.side;
                pdfContentForm.appendChild(input);

            /*-- Storing Necessary Block Data in PDF Form --*/
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[product_b]";
                input.value = blockData[i]['product_b'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[product_bT]";
                input.value = blockData[i]['product_bT'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[product_hB]";
                input.value = blockData[i]['product_hB'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[product_W]";
                input.value = blockData[i]['product_W'];
                pdfContentForm.appendChild(input);

            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[product_Ws]";
                input.value = blockData[i]['product_Ws'];
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#netBedDrag .num').innerHTML = netBedDrag;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[netBedDrag]";
                input.value = netBedDrag;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#netSideDrag .num').innerHTML = netSideDrag;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[netSideDrag]";
                input.value = netSideDrag;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#netBedLift .num').innerHTML = netBedLift;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[netBedLift]";
                input.value = netBedLift;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#netSideLift .num').innerHTML = netSideLift;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[netSideLift]";
                input.value = netSideLift;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#bedSlope .num').innerHTML = angleBedSlope;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[angleBedSlope]";
                input.value = angleBedSlope;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#sideSlope .num').innerHTML = angleSideSlope;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[angleSideSlope]";
                input.value = angleSideSlope;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#manningsN .num').innerHTML = Number(mannings).toFixed(4);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[manningsN]";
                input.value = Number(mannings).toFixed(3);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#bedWidth .num').innerHTML = Number(jsonData.estimate_bedWidth).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[bedWidth]";
                input.value = Number(jsonData.estimate_bedWidth).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#bedWidthDN .num').innerHTML = Number(bedWidthDN);
            /*--*/
            blockElement.querySelector('#verticalOffset .num').innerHTML = Number(jsonData.estimate_offset).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[verticalOffset]";
                input.value = Number(jsonData.estimate_offset).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
        }

        if (showSendSuggestion) {
            if (document.getElementById('sendSuggestion')) {
                document.getElementById('sendSuggestion').classList.remove('hidden');
            }
            if (document.getElementById('sendSuggestionModal')) {
                document.getElementById('sendSuggestionModal').classList.remove('hidden');
            }
            if (document.getElementById('optionalSendSuggestionModal')) {
                document.getElementById('optionalSendSuggestionModal').classList.add('hidden');
            }
        }
    } else {
        toastr.error('An error has occurred! Please try again later.');
    }
}

function setBedSlopeAngleVariables(estimateBedSlope) {
    angleBedSlopeTan = Math.atan(estimateBedSlope).toFixed(3);
    angleBedSlope = Number(angleBedSlopeTan * (180 / Math.PI)).toFixed(2);
    angleBedSlopeSin = Math.sin(angleBedSlopeTan).toFixed(3);
    angleBedSlopeCos = Math.cos(angleBedSlopeTan).toFixed(3);
}

function setChannelSideSlopeVariables(estimateSideSlope) {
    channelSideSlope = estimateSideSlope / angleBedSlopeCos;
    channelSideSlopeZn = 1 / channelSideSlope;
}

function setSideSlopeAngleVariables() {
    angleSideSlopeTan = Number(Math.atan(channelSideSlopeZn)).toFixed(3);
    angleSideSlope = Number(angleSideSlopeTan * (180 / Math.PI)).toFixed(2);
    angleSideSlopeSin = Math.sin(angleSideSlopeTan).toFixed(3);
    angleSideSlopeCos = Math.cos(angleSideSlopeTan).toFixed(3);
}

function setFrictionAngleVariables(estimateFriction) {
      angleFriction = Number(estimateFriction * Math.PI / 180).toFixed(3);
      angleFrictionTan = Number(Math.tan(angleFriction) * 0.9).toFixed(3);
}

function setBlockVariables(blockSizeBB, blockSizeHB, blockSubmergedWeight) {
    blockDesignParamL1 = Number(blockSizeHB / 2).toFixed(1);
    blockDesignParamL2 = Number(blockSizeBB / 2).toFixed(1);
    blockDesignParamL3 = Number(blockSizeHB * 0.85).toFixed(1);
    blockDesignParamL4 = blockDesignParamL2;
    blockDesignParamLT =  Number(blockDesignParamL2 * Math.sqrt(2)).toFixed(1);

    blockNormalForceBed = Number(blockSubmergedWeight * angleBedSlopeCos).toFixed(2);
    blockNormalForceSide = Number(blockSubmergedWeight * angleSideSlopeCos).toFixed(2);
}

function setSectionVariable(estimateFlow, estimateVelocity) {
    section = estimateFlow / estimateVelocity;
}

function setBedWidthVariables(estimateBedWidth, estimateBedSlope, estimateFlow) {
    var M50 = (manningsC * Math.pow(estimateBedSlope, 0.5)) == 0 ? 0 : estimateFlow * mannings / (manningsC * Math.pow(estimateBedSlope, 0.5));
    var N50 = M50 / estimateBedWidth;
    var O50 = Math.pow(N50 / estimateBedWidth, (3/8));
    var P50 = O50 == 0 ? 0 : estimateBedWidth / O50;
    var Q50 = Math.pow(P50 + channelSideSlope, (5/3)) / Math.pow(P50 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));
    var R50 = Math.pow(M50 / Q50, (3/8));

    var M51 = M50 * Math.pow(Math.max(1 ,R50 == 0 ? 0 : 0.2 / R50), (1/6));
    var N51 = N50 * Math.pow(Math.max(1 , R50 == 0 ? 0 : 0.15 / R50), (1/6));
    var P51 = R50 == 0 ? 0 : estimateBedWidth / R50;
    var Q51 = Math.pow(P51 + channelSideSlope, (5/3)) / Math.pow(P51 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));
    var R51 = Math.pow(M50 / Q51, (3/8));

    var M52 = M50 * Math.pow(Math.max(1 ,R51 == 0 ? 0 : 0.2 / R51), (1/6));
    var N52 = N51 * Math.pow(Math.max(1 , R51 == 0 ? 0 : 0.15 / R51), (1/6));
    var P52 = R51 == 0 ? 0 : estimateBedWidth / R51;
    var Q52 = Math.pow(P52 + channelSideSlope, (5/3)) / Math.pow(P52 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));
    var R52 = Math.pow(M51 / Q52, (3/8));

    var M53 = M50 * Math.pow(Math.max(1 , R52 == 0 ? 0 : 0.2 / R52), (1/6));
    var N53 = N52 * Math.pow(Math.max(1 , R52 == 0 ? 0 : 0.15 / R52), (1/6));
    var P53 = R52 == 0 ? 0 : estimateBedWidth / R52;
    var Q53 = Math.pow(P53 + channelSideSlope, (5/3)) / Math.pow(P53 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));
    var R53 = Math.pow(M52 / Q53, (3/8));

    var M54 = M50 * Math.pow(Math.max(1 , R53 == 0 ? 0 : 0.2 / R53), (1/6));
    var N54 = N53 * Math.pow(Math.max(1 , R53 == 0 ? 0 : 0.15 / R53), (1/6));
    var P54 = R53 == 0 ? 0 : estimateBedWidth / R53;
    var Q54 = Math.pow(P54 + channelSideSlope, (5/3)) / Math.pow(P54 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));
    var R54 = Math.pow(M53 / Q54, (3/8));

    var M55 = M50 * Math.pow(Math.max(1 , R54 == 0 ? 0 : 0.2 / R54), (1/6));
    var N55 = N54 * Math.pow(Math.max(1 , R54 == 0 ? 0 : 0.15 / R54), (1/6));
    var P55 = R54 == 0 ? 0 : estimateBedWidth / R54;
    var Q55 = Math.pow(P55 + channelSideSlope, (5/3)) / Math.pow(P55 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));
    var R55 = Math.pow(M54 / Q55, (3/8));

    var M56 = M50 * Math.pow(Math.max(1 , R55 == 0 ? 0 : 0.2 / R55), (1/6));
    var N56 = N55 * Math.pow(Math.max(1 , R55 == 0 ? 0 : 0.15 / R55), (1/6));
    var P56 = R55 == 0 ? 0 : estimateBedWidth / R55;
    var Q56 = Math.pow(P56 + channelSideSlope, (5/3)) / Math.pow(P56 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));
    var R56 = Math.pow(M55 / Q56, (3/8));

    var M57 = M50 * Math.pow(Math.max(1 , R56 == 0 ? 0 : 0.2 / R56), (1/6));
    var N57 = N56 * Math.pow(Math.max(1 , R56 == 0 ? 0 : 0.15 / R56), (1/6));
    var P57 = R56 == 0 ? 0 : estimateBedWidth / R56;
    var Q57 = Math.pow(P57 + channelSideSlope, (5/3)) / Math.pow(P57 + 2 * Math.sqrt(Math.pow(1 + channelSideSlope, 2)), (2/3));

    bedWidthDN = Math.pow(M56 / Q57, (3/8)).toFixed(3);
    doubleCheckAn = Number(bedWidthDN) * (Number(bedWidthDN) * Number(channelSideSlope) + Number(estimateBedWidth));
    doubleCheck = doubleCheckAn / (2 * Number(bedWidthDN) * Math.pow((1 + Math.pow(Number(channelSideSlope), 2)), 0.5) + Number(estimateBedWidth));
}

function setManningsVariables() {
    manningsCos = bedWidthDN / angleBedSlopeCos;
}

function setShearStressBedC(estimateCrestRadius, estimateTopWidth) {
    var rcur = Number(Number(estimateCrestRadius) + (Number(estimateTopWidth) / 2)).toFixed(2);
    var argument = Number(rcur / estimateTopWidth).toFixed(2);

    if (argument >= 10) {
        shearStressBedC = 1.05;
    } else if (argument > 2) {
        shearStressBedC = 2.38 - 0.206 * (argument) + 0.0073 * Math.pow(argument, 2);
    } else {
        shearStressBedC = 2;
    }
}

function setShearStressVariables() {
    shearStressBedKg = waterDensity * 9.81;
    shearStressBed = shearStressBedC * shearStressBedKg * manningsCos * angleBedSlopeSin;
    shearStressSide = shearStressSideC * shearStressBedKg * manningsCos * angleBedSlopeSin;
}

function setShearDragForceVariables() {
    shearDragBedForce = Number(shearStressBed * shearDragWhereForce).toFixed(2);
    shearDragSideForce = Number(shearStressSide * shearDragWhereForce).toFixed(2);
}

function setLiftForceVariables() {
    liftForceBed = Number(liftForceFup * shearStressBed * liftForceWhere).toFixed(2);
    liftForceSide = Number(liftForceFup * shearStressSide * liftForceWhere).toFixed(2);
}

function setOffsetVariables(estimateVelocity, estimateOffset, blockSizeBT) {
    offsetWhere2 = Number(7 / 6 * estimateVelocity).toFixed(2);
    offsetNormalVelocity = estimateVelocity;
    offsetWhere = Number(offsetWhere2 * Math.pow((estimateOffset / 1000 / bedWidthDN), (1 / 7))).toFixed(2);
    offsetN = Number(0.5 * waterDensity * Math.pow(offsetWhere, 2) * (blockSizeBT / 1000) * (estimateOffset / 1000)).toFixed(2);
}

function setNetVariables(blockSizeBT, estimateOffset) {
    var H83 = ((0.97 * 1) * (waterDensity * 9.81) * bedWidthDN * angleBedSlopeSin) * Math.pow(16 * 25.4 / 1000, 2);
    var H99 = (7 / 6 * (doubleCheckAn == 0 ? 0 : 1.000 / doubleCheckAn)) * Math.pow(bedWidthDN == 0 ? 0 : estimateOffset/1000/bedWidthDN, (1 / 7));
    var H97 = 0.5 * waterDensity * Math.pow(H99, 2) * (blockSizeBT / 1000) * (estimateOffset / 1000);
    netBedDrag =  Number(Number(H83) + Number(H97)).toFixed(2);
    netSideDrag = Number(((0.76 * 1)*(waterDensity * 9.81)* bedWidthDN * angleBedSlopeSin) * (Math.pow(16 * 25.4 / 1000, 2)) + (0.5 * waterDensity * Math.pow(H99, 2) * (blockSizeBT / 1000) * (estimateOffset / 1000))).toFixed(2);
    netBedLift = Number(0.37 * ((0.97 * 1) * (waterDensity * 9.81) * bedWidthDN * angleBedSlopeSin) * (Math.pow(15.5*25.4/1000, 2)) + H97).toFixed(2);
    netSideLift = Number((0.37 * ((0.76 * 1.00) * (waterDensity * 9.81) * bedWidthDN * angleBedSlopeSin) * Math.pow(15.5*25.4/1000, 2)) + H97).toFixed(2);
    netBedNormalForces = Number(Number(blockNormalForceBed) - Number(netBedLift)).toFixed(2);
    netSideNormalForces = Number(Number(blockNormalForceSide) - Number(netSideLift)).toFixed(2);
}

function getBlockData() {
  var url = base_url+"/blocks/get";
  var httpReq = new XMLHttpRequest();
  if(httpReq===null){
		alert("Whoa there! Your browser is not updated enough to use this site. Maybe it's time for and <a href='http://browsehappy.com'>upgrade</a>?");
		return;
	}
	  httpReq.onreadystatechange = function(){
      if(httpReq.readyState===4 || httpReq.readyState==="complete"){
        if (!(httpReq.responseText)){
            toastr.error(httpReq.responseText);
          return;
        }else{
          blockData = JSON.parse(httpReq.responseText);
          performCalcs();
          return;
        }
      }
    }
		httpReq.open("get", url);
		httpReq.send();
}

function quoteJax(){
  var url = base_url+"/quotes/ajaxSummary?id=" + id;
  var httpReq = new XMLHttpRequest();
  if(httpReq===null){
		alert("Whoa there! Your browser is not updated enough to use this site. Maybe it's time for and <a href='http://browsehappy.com'>upgrade</a>?");
		return;
	}
	  httpReq.onreadystatechange = function(){
      if(httpReq.readyState===4 || httpReq.readyState==="complete"){
        if (!(httpReq.responseText)){
            toastr.error(httpReq.responseText);
          return;
        }else{
          jsonData = JSON.parse(httpReq.responseText);
          getBlockData();
          return;
        }
      }
    }
		httpReq.open("get", url);
		httpReq.send();
}
  quoteJax();
})();
