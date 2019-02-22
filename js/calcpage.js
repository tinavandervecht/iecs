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
  setBedWidthVariables(data.estimate_bedWidth);
  setManningsVariables(blockData.product_manningsN);

  flowSectionArea = Number(data.estimate_expectedFlow / data.estimate_expectedVelocity).toFixed(3);
  bedWidthY = (Math.pow((Math.pow(data.estimate_bedWidth, 2)+4*(1/data.estimate_sideSlope)*flowSectionArea), 0.5)-data.estimate_bedWidth)/(2/data.estimate_sideSlope);

  if(Boolean(Number(data.estimate_alignment))) {
      setShearStressBedC(data.estimate_crestRadius, data.estimate_topWidth);
  }

  setShearStressVariables();
  setShearDragForceVariables();
  setLiftForceVariables();

  setOffsetVariables(data.estimate_expectedVelocity, data.estimate_offset, blockData.product_bT);
  setNetVariables();

  //GENERIC OVERTURNING AND SLIDING CALCULATIONS
  this.overturningBed= function(){
      return blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos / ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netBedDrag) + (blockDesignParamL4 * netBedLift));
  }
  this.overturningSide = function(){
      var side1Check = Number((blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netSideDrag)+(blockDesignParamL4 * netSideLift))).toFixed(2);
      var side2Check = Number((blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / (blockDesignParamL2 * netSideLift + blockDesignParamL1 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeSin)).toFixed(2);
      var side3Check = Number((blockDesignParamLT * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / Math.pow((Math.pow(((blockDesignParamL3 * netSideDrag)+(blockDesignParamL4 * netSideLift)), 2) + Math.pow((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeSin), 2)), 0.5)).toFixed(2);

      return Math.min(side1Check, side2Check, side3Check);
  }
  this.slidingBed = function(){
      return (netBedNormalForces * angleFrictionTan) / (Number(netBedDrag) + blockData.product_Ws * angleBedSlopeSin);
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
            }

            blockElement.querySelector('.sliding .bed').innerHTML = calc.blockSon().s.bed;
            if(calc.blockSon().s.bed < UPSELL){
                if(calc.blockSon().s.bed < MINIMUM){
                    blockElement.querySelector('.sliding .bed').parentNode.classList.add('bignono');
                }else{
                    blockElement.querySelector('.sliding .bed').parentNode.classList.add('nono');
                }
            }

            blockElement.querySelector('.overturning .side').innerHTML = calc.blockSon().o.side;
            if(calc.blockSon().o.side < UPSELL){
                if(calc.blockSon().o.side < MINIMUM){
                    blockElement.querySelector('.overturning .side').parentNode.classList.add('bignono');
                }else{
                    blockElement.querySelector('.overturning .side').parentNode.classList.add('nono');
                }
            }

            blockElement.querySelector('.sliding .side').innerHTML = calc.blockSon().s.side;
            if(calc.blockSon().s.side < UPSELL){
                if(calc.blockSon().s.side < MINIMUM){
                    blockElement.querySelector('.sliding .side').parentNode.classList.add('bignono');
                }else{
                    blockElement.querySelector('.sliding .side').parentNode.classList.add('nono');
                }
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
            blockElement.querySelector('#blockNormalForceBed .num').innerHTML = Number(blockNormalForceBed).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[blockNormalForceBed]";
                input.value = Number(blockNormalForceBed).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#blockNormalForceSide .num').innerHTML = Number(blockNormalForceSide).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[blockNormalForceSide]";
                input.value = Number(blockNormalForceSide).toFixed(2);
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
            blockElement.querySelector('#manningsCos .num').innerHTML = Number(manningsCos).toFixed(3);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[manningsCos]";
                input.value = Number(manningsCos).toFixed(3);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#shearStressBed .num').innerHTML = Number(shearStressBed).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[shearStressBed]";
                input.value = Number(shearStressBed).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#shearStressBedC .num').innerHTML = Number(shearStressBedC).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[shearStressBedC]";
                input.value = Number(shearStressBedC).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#shearStressSide .num').innerHTML = Number(shearStressSide).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[shearStressSide]";
                input.value = Number(shearStressSide).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#shearDragBedForce .num').innerHTML = shearDragBedForce;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[shearDragBedForce]";
                input.value = shearDragBedForce;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#shearDragSideForce .num').innerHTML = shearDragSideForce;
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[shearDragSideForce]";
                input.value = shearDragSideForce;
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#bedWidth .num').innerHTML = Number(jsonData.estimate_bedWidth).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[bedWidth]";
                input.value = Number(jsonData.estimate_bedWidth).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#liftForceBed .num').innerHTML = Number(liftForceBed).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[liftForceBed]";
                input.value = Number(liftForceBed).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#liftForceSide .num').innerHTML = Number(liftForceSide).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[liftForceSide]";
                input.value = Number(liftForceSide).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#offsetN .num').innerHTML = Number(offsetN).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[offsetN]";
                input.value = Number(offsetN).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#offsetWhere .num').innerHTML = Number(offsetWhere).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[offsetWhere]";
                input.value = Number(offsetWhere).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#offsetWhere2 .num').innerHTML = Number(offsetWhere2).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[offsetWhere2]";
                input.value = Number(offsetWhere2).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#offsetNormalVelocity .num').innerHTML = Number(offsetNormalVelocity).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[offsetNormalVelocity]";
                input.value = Number(offsetNormalVelocity).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#netBedNormalForces .num').innerHTML = Number(netBedNormalForces).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[netBedNormalForces]";
                input.value = Number(netBedNormalForces).toFixed(2);
                pdfContentForm.appendChild(input);
            /*--*/
            blockElement.querySelector('#netSideNormalForces .num').innerHTML = Number(netSideNormalForces).toFixed(2);
            var input = document.createElement("input");
                input.type = "hidden";
                input.name = i + '-' + blockData[i]['product_name'] + "[netSideNormalForces]";
                input.value = Number(netSideNormalForces).toFixed(2);
                pdfContentForm.appendChild(input);
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

function setBedWidthVariables(estimateBedWidth) {
    bedWidthDN = (Math.pow((Math.pow(estimateBedWidth, 2) + 4 * channelSideSlope * section), 0.5) - estimateBedWidth) / (2 * channelSideSlope);
    doubleCheckAn = Number(bedWidthDN) * (Number(bedWidthDN) * Number(channelSideSlope) + Number(estimateBedWidth));
    doubleCheck = doubleCheckAn / (2 * Number(bedWidthDN) * Math.pow((1 + Math.pow(Number(channelSideSlope), 2)), 0.5) + Number(estimateBedWidth));
}

function setManningsVariables(manningsN) {
    mannings = manningsN;
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

function setNetVariables() {
    netBedDrag =  Number(Number(shearDragBedForce) + Number(offsetN)).toFixed(2);
    netSideDrag = Number(Number(shearDragSideForce) + Number(offsetN)).toFixed(2);
    netBedLift = Number(Number(liftForceBed) + Number(offsetN)).toFixed(2);
    netSideLift = Number(Number(liftForceSide) + Number(offsetN)).toFixed(2);
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
