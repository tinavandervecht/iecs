(function(){
//THIS FILE IS WHERE THE CALCULATIONS TAKE PLACE.

      //CALCULATIONS

      //is responsible for some form of page animation, feature, pop up etc.

      //almost everything after CALCULATIONS is where the formulas should go.

//CONSTANTS
var PRECISION = 2; //number of displayed decimals on block output.
var MINIMUM = 1.5; //absolute minimum safe safety factor for a block
var UPSELL = 2; //minimum safety factor to upsell to, anything below this but above MINIMUM is still acceptable, want to upsell to this

var submittoIECS = document.querySelector("#saveit");
var yeahSave = document.querySelector(".box #yes");
var noSave = document.querySelector(".box #no");
var blocks = document.querySelectorAll(".block:not(.disabled)");
var selected = null; //container for currently selected
var TIME = 1; //seconds for expansion of dropdown/collapse
var BOXHEIGHT = "auto";
var BLOCKSMALL = "7.9em";
var selectedblock = document.querySelector("#selectedblock");
function changeLeftBox(blockbox){
  // selectedblock.dataset.blockId = blockbox.querySelector('.blocktype p').innerHTML;
  // selectedblock.querySelector('.blockname').innerHTML = blockbox.querySelector('.blocktype').innerHTML;
  // selectedblock.querySelector('img').src = blockbox.querySelector('.blockdiagram').src;
}
function openClose(event,block){
  var it;
  try{
    event.preventDefault();
    it = event.currentTarget;
  }
  catch(e){
    console.log(e);
  }
  if(!(it.classList.contains('disabled'))){
  toggleBlockOpen(it);
}
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
  // changeLeftBox(it);
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
    modal.querySelector("#sendit").addEventListener('click',function(e){
      e.preventDefault();
      // SEND EMAIL TO CLIENT HERE
      toastr.error('Your email has NOT been sent.');
      closeEl(modal);
    },false);
    window.addEventListener('click',function(){
      if (event.target == modal){
        closeEl(modal);
      }
    },false);
  }else if(button.classList.contains('save')){
    console.log("save");
    if(!shwn){
      subpopup.classList.add('shown');
      TweenLite.to(subpopup,0.2,{opacity:1,onComplete:function(){TweenLite.to(subpopup.querySelector('.box'),0.1,{opacity:1});}});
    }else{
      TweenLite.to(subpopup,0.2,{opacity:0,onComplete:function(){subpopup.classList.remove('shown');}});
    }
    shwn = !shwn;
  }else if(button.id === "yes"){
    //EMAIL RESULTS TO IECS HERE
    toastr.error('Your Email has NOT been sent.');
    closeEl(subpopup);
  }else if(button.id === "no"){
    closeEl(subpopup);
  }else{
    console.log("NOPE");
  }
}
function tog(event){
  event.preventDefault();
  var it = event.currentTarget;
  toggleSubmit(it);
}
changeLeftBox(document.querySelector('.block.highlight'));

try{
  submittoIECS.addEventListener('click',tog,false);
  if (yeahSave) {
      yeahSave.addEventListener('click',tog,false);
  }

  if (noSave) {
      noSave.addEventListener('click',tog,false);
  }
}
catch(e){
  console.log(e);
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

var bedWidth;
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

/*THE BELOW IS AN OBJECT CALLED Calculations WHICH CONTAINS METHODS
CONCERNING EACH CALCULATION THAT NEEDS TO BE PERFORMED.

THIS SHOULD BE WHERE YOU INSERT YOUR NEW CALCULATIONS, WITH THE FOLLOWING FORMAT:

this.calcName = function(){
return (a*b*c)/d + e -f; //RANDOM CALC
}

*/
function Calculations(data, blockData){
  var numSides = 3;
  setBedSlopeAngleVariables(data.estimate_bedSlope);
  setChannelSideSlopeVariables(data.estimate_sideSlope);
  setSideSlopeAngleVariables();
  setFrictionAngleVariables(data.estimate_friction);
  setBlockVariables(blockData.product_b, blockData.product_hB, blockData.product_Ws);
  setSectionVariable(data.estimate_expectedFlow, data.estimate_expectedVelocity);
  setBedWidthVariables(data.estimate_bedWidth);
  setManningsVariables(data.estimate_expectedFlow, data.estimate_bedSlope);

  flowSectionArea = Number(data.estimate_expectedFlow / data.estimate_expectedVelocity).toFixed(3);
  bedWidthY = (Math.pow((Math.pow(data.estimate_bedWidth, 2)+4*(1/data.estimate_sideSlope)*flowSectionArea), 0.5)-data.estimate_bedWidth)/(2/data.estimate_sideSlope);

  setShearStressVariables();
  setShearDragForceVariables();
  setLiftForceVariables();

  setOffsetVariables(data.estimate_expectedVelocity, data.estimate_offset, blockData.product_bT);
  setNetVariables();

  //GENERIC OVERTURNING AND SLIDING CALCULATIONS
  this.overturningBed= function(){
      return blockDesignParamL3 * blockData.product_Ws * angleBedSlopeCos / ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netBedDrag) + (blockDesignParamL4 * netBedLift));
  }
  this.overturningSide = function(){
      var side1Check = (blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / ((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeSin) + (blockDesignParamL3 * netSideDrag)+(blockDesignParamL4 * netSideLift));
      var side2Check = (blockDesignParamL2 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / (blockDesignParamL2 * netSideLift + blockDesignParamL1 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeSin);
      var side3Check = (blockDesignParamL4 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeCos) / Math.pow((Math.pow(((blockDesignParamL3 * netSideDrag)+(blockDesignParamL4 * netSideLift)), 2) + Math.pow((blockDesignParamL1 * blockData.product_Ws * angleBedSlopeCos * angleSideSlopeSin), 2)), 0.5);
      return Math.min(side1Check, side2Check, side3Check);
  }
  this.slidingBed = function(){
      return (netBedNormalForces * angleFrictionTan) / (Number(netBedDrag) + blockData.product_Ws * angleBedSlopeSin);
  }
  this.slidingSide = function(){
      var side1Check = netSideNormalForces * angleFrictionTan / (Number(netSideDrag) + blockData.product_Ws * angleBedSlopeSin);
      var side2Check = netSideNormalForces * angleFrictionTan / (blockData.product_Ws * angleSideSlopeSin * angleBedSlopeCos);
      var side3Check = netSideNormalForces * angleFrictionTan / Math.pow((Math.pow((Number(netSideDrag) + blockData.product_Ws * angleBedSlopeSin), 2) + Math.pow((blockData.product_Ws * angleBedSlopeSin * angleBedSlopeCos), 2)), 0.5);

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

            blockElement.querySelector('#netBedDrag .num').innerHTML = netBedDrag;
            blockElement.querySelector('#netSideDrag .num').innerHTML = netSideDrag;
            blockElement.querySelector('#netBedLift .num').innerHTML = netBedLift;
            blockElement.querySelector('#netSideLift .num').innerHTML = netSideLift;
            blockElement.querySelector('#bedSlope .num').innerHTML = angleBedSlope;
            blockElement.querySelector('#sideSlope .num').innerHTML = angleSideSlope;
            blockElement.querySelector('#manningsN .num').innerHTML = Number(mannings).toFixed(3);
            blockElement.querySelector('#shearStressBed .num').innerHTML = Number(shearStressBed).toFixed(2);
            blockElement.querySelector('#shearStressSide .num').innerHTML = Number(shearStressSide).toFixed(2);
            blockElement.querySelector('#shearDragBedForce .num').innerHTML = shearDragBedForce;
            blockElement.querySelector('#shearDragSideForce .num').innerHTML = shearDragSideForce;
            blockElement.querySelector('#bedWidth .num').innerHTML = Number(bedWidth).toFixed(2);
            blockElement.querySelector('#blockNormalForceBed .num').innerHTML = Number(blockNormalForceBed).toFixed(2);
            blockElement.querySelector('#blockNormalForceSide .num').innerHTML = Number(blockNormalForceSide).toFixed(2);
            blockElement.querySelector('#liftForceBed .num').innerHTML = Number(liftForceBed).toFixed(2);
            blockElement.querySelector('#liftForceSide .num').innerHTML = Number(liftForceSide).toFixed(2);
            blockElement.querySelector('#offsetN .num').innerHTML = Number(offsetN).toFixed(2);
            blockElement.querySelector('#offsetWhere .num').innerHTML = Number(offsetWhere).toFixed(2);
            blockElement.querySelector('#offsetWhere2 .num').innerHTML = Number(offsetWhere2).toFixed(2);
            blockElement.querySelector('#offsetNormalVelocity .num').innerHTML = Number(offsetNormalVelocity).toFixed(2);
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
    bedWidth = (Math.pow((Math.pow(estimateBedWidth, 2) + 4 * channelSideSlope * section), 0.5) - estimateBedWidth) / (2 * channelSideSlope);
    doubleCheckAn = Number(bedWidth) * (Number(bedWidth) * Number(channelSideSlope) + Number(estimateBedWidth));
    doubleCheck = doubleCheckAn / (2 * Number(bedWidth) * Math.pow((1 + Math.pow(Number(channelSideSlope), 2)), 0.5) + Number(estimateBedWidth));
}

function setManningsVariables(estimateFlow, estimateBedSlope) {
    mannings = (doubleCheckAn * Math.pow((doubleCheck), (2/3)) * Math.pow(estimateBedSlope, (1/2))) / estimateFlow;
    manningsCos = bedWidth / angleBedSlopeCos;
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
    offsetNormalVelocity = Number(bedWidthY * Math.cos(angleFriction)).toFixed(2);
    offsetWhere = Number(offsetWhere2 * Math.pow((estimateOffset / 1000 / offsetNormalVelocity), (1 / 7))).toFixed(2);
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
