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

//BLOCK SPECIFIC FACTORS;
//to be pulled from the server with AJAX :D
var specs = {
  "CCG2": 1.15,
  "CC35": 1.65,
  "CC45": 2.2,
  "CC70": 2.8,
  "CC90": 3.45
}

// Custom Variables to store math
var angleBedSlope;
var angleBedSlopeTan;
var angleBedSlopeSin;
var angleBedSlopeCos;

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

var sideSlope;
var sideSlopeTan;

var bedSlope;
var bedSlopeTan;

var flowSectionArea;

var bedWidthY;

var mannings;

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

// Block Variables (WILL be set dynamically through AJAX later)
var blockSize = 393.7;
var blockTop = 292.1;
var blockTopBase = 135.7;
var blockWeight = 371.8;
var blockSubmergedWeight = 209.6;

// CONSTANTS
var waterDensity = 1000;
var shearStressBedC = 1;
var shearStressSideC = 0.76;
var shearDragWhereForce = Math.pow((16 * 25.4 / 1000), 2);
var liftForceWhere = Math.pow((15.5 * 25.4 / 1000), 2);
var liftForceFup = 0.37;

/*THE BELOW IS AN OBJECT CALLED Calculations WHICH CONTAINS METHODS
CONCERNING EACH CALCULATION THAT NEEDS TO BE PERFORMED.

THIS SHOULD BE WHERE YOU INSERT YOUR NEW CALCULATIONS, WITH THE FOLLOWING FORMAT:

this.calcName = function(){
return (a*b*c)/d + e -f; //RANDOM CALC
}

*/
function Calculations(data){
  var numSides = 3;
  setBedSlopeAngleVariables(data.estimate_bedSlope);
  setSideSlopeAngleVariables(data.estimate_sideSlope);
  setFrictionAngleVariables(data.estimate_friction);
  setBlockVariables();
  setSlopeVariables(data.estimate_sideSlope, data.estimate_bedSlope);

  flowSectionArea = Number(data.estimate_expectedFlow / data.estimate_expectedVelocity).toFixed(3);
  bedWidthY = (Math.pow((Math.pow(data.estimate_bedWidth, 2)+4*(1/data.estimate_sideSlope)*flowSectionArea), 0.5)-data.estimate_bedWidth)/(2/data.estimate_sideSlope);

  setShearStressVariables();
  setShearDragForceVariables();
  setLiftForceVariables();

  setOffsetVariables(data.estimate_expectedVelocity, data.estimate_offset);
  setNetVariables();

  this.slopeValue = function(){
    return parseFloat(data.estimate_channelDepth)*parseFloat(data.estimate_bedSlope)*0.001;
  }
  this.topWidth = function(){
    return parseFloat(data.estimate_bedWidth) + (this.slopeValue() * numSides);
  }
  this.curvatureValue = function(){
    return parseFloat(data.estimate_crestRadius)/this.topWidth();
  }


  //GENERIC OVERTURNING AND SLIDING CALCULATIONS
  this.overturningBed= function(){
    return 1/parseFloat(data.estimate_crestRadius);
  }
  this.overturningSide = function(){
    return 1/parseFloat(data.estimate_channelLength)*3.4;
  }
  this.slidingBed = function(){
    return this.curvatureValue()*1.4;
  }
  this.slidingSide = function(){
    return this.slopeValue()*20;
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
        bed: (this.overturningBed() * specs[block]).toFixed(PRECISION),
        side: (this.overturningSide() * specs[block]).toFixed(PRECISION)
      },
      s: { //sliding
        bed: (this.slidingBed() * specs[block]).toFixed(PRECISION),
        side: (this.slidingSide() * specs[block]).toFixed(PRECISION)
      }
      };
  }
}

function performCalcs(data){
  if(data){/*IF DATA IS NOT NULL*/
    console.log(data);
    var calc = new Calculations(data);
    // console.log(calc.curvatureValue());
    var blocks = document.querySelectorAll(".block");
    var firstHighlight = false; //value displaying if one of the blocks has been highlighted
    // for(block of blocks){ // <---------------------------  ITERATORS DO NOT WORK IN IE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    for(var f=0;f<blocks.length;f++){
      var block = blocks[f]; // LAZY WAY TO POLYFILL MY MISTAKE USING ITERATORS
      //NUMBERS FOR DROPDOWN BASED OFF ESTIMATE ID AND BLOCK FACTORS
      var numbers = block.querySelectorAll('.more .num');
      for(var i =0; i< numbers.length;i++){
        var n = parseInt(data.estimate_channelDepth) * ( i%4 + 1.1) * specs[block.id];
        numbers[i].innerHTML = n.toFixed(2);
      }
      var blockDisable = 0; //count the number of BAD safety factors
      var blockOkay = 0; //count the number of OKAY safety factors
      // console.log(block.id);
      var useBlock = parseInt(data.estimate_blockUse); // 0:both, 1:bed, 2:side
      var numSafety = (useBlock == 0)  ? 4 : 2;

      var blocky = calc.blockSon(block.id);

      if(useBlock == 0 || useBlock == 1){
      block.querySelector('.overturning .bed').innerHTML = blocky.o.bed;
      if(blocky.o.bed < UPSELL){
        if(blocky.o.bed < MINIMUM){
          block.querySelector('.overturning .bed').parentNode.classList.add('bignono');
          blockDisable++;
          // blockOkay++;
        }else{
          block.querySelector('.overturning .bed').parentNode.classList.add('nono');
          blockOkay++;
        }
      }
      block.querySelector('.sliding .bed').innerHTML = blocky.s.bed;
      if(blocky.s.bed < UPSELL){
        if(blocky.s.bed < MINIMUM){
          block.querySelector('.sliding .bed').parentNode.classList.add('bignono');
          blockDisable++;
          // blockOkay++;
        }else{
          block.querySelector('.sliding .bed').parentNode.classList.add('nono');
          blockOkay++;
        }
      }
    }else{
      block.querySelector('.sliding .bed').parentNode.classList.add('hidden');
      block.querySelector('.overturning .bed').parentNode.classList.add('hidden');
      block.querySelector('.factor').classList.add('one');
    }
    if(useBlock == 0 || useBlock == 2){
      block.querySelector('.overturning .side').innerHTML = blocky.o.side;
      if(blocky.o.side < UPSELL){
        if(blocky.o.side < MINIMUM){
          block.querySelector('.overturning .side').parentNode.classList.add('bignono');
          blockDisable++;
          // blockOkay++;
        }else{
          block.querySelector('.overturning .side').parentNode.classList.add('nono');
          blockOkay++;
        }
      }

      block.querySelector('.sliding .side').innerHTML = blocky.s.side;
      if(blocky.s.side < UPSELL){
        if(blocky.s.side < MINIMUM){
          block.querySelector('.sliding .side').parentNode.classList.add('bignono');
          blockDisable++;
          // blockOkay++;
        }else{
          block.querySelector('.sliding .side').parentNode.classList.add('nono');
          blockOkay++;
        }
      }
    }else{
      block.querySelector('.sliding .side').parentNode.classList.add('hidden');
      block.querySelector('.overturning .side').parentNode.classList.add('hidden');
      if(!block.querySelector('.factor').classList.contains('one')){
        block.querySelector('.factor').classList.add('one');
      }
    }
      if(blockDisable >= (numSafety/2)){
          block.classList.add('disabled');
      }
    if(blockOkay==0 && !block.classList.contains('disabled') && !firstHighlight){
      // console.log("highlighter");
      block.classList.add('highlight');
      firstHighlight = !firstHighlight;
      toggleBlockOpen(block)
    }
    }
  }else{
      toastr.error('An error has occurred! Please try again later.');
}
}

function setBedSlopeAngleVariables(estimateBedSlope) {
    angleBedSlopeTan = Math.atan(estimateBedSlope).toFixed(3);
    angleBedSlope = Number(angleBedSlopeTan * (180 / Math.PI)).toFixed(2);
    angleBedSlopeSin = Math.sin(angleBedSlopeTan).toFixed(3);
    angleBedSlopeCos = Math.cos(angleBedSlopeTan).toFixed(3);
}

function setSideSlopeAngleVariables(estimateSideSlope) {
    angleSideSlopeTan = Math.atan(estimateSideSlope).toFixed(3);
    angleSideSlope = Number(angleSideSlopeTan * (180 / Math.PI)).toFixed(2);
    angleSideSlopeSin = Math.sin(angleSideSlopeTan).toFixed(3);
    angleSideSlopeCos = Math.cos(angleSideSlopeTan).toFixed(3);
}

function setFrictionAngleVariables(estimateFriction) {
      angleFriction = Number(estimateFriction * Math.PI / 180).toFixed(3);
      angleFrictionTan = Number(Math.tan(angleFriction) * 0.9).toFixed(3);
}

function setBlockVariables() {
    blockDesignParamL1 = Number(blockTopBase / 2).toFixed(1);
    blockDesignParamL2 = Number(blockSize / 2).toFixed(1);
    blockDesignParamL3 = Number(blockTopBase * 0.85).toFixed(1);
    blockDesignParamL4 = blockDesignParamL2;
    blockDesignParamLT =  Number(blockDesignParamL2 * Math.sqrt(2)).toFixed(1);

    blockNormalForceBed = Number(blockSubmergedWeight * angleBedSlopeCos).toFixed(2);
    blockNormalForceSide = Number(blockSubmergedWeight * angleSideSlopeCos).toFixed(2);
}

function setSlopeVariables(estimateSideSlope, estimateBedSlope) {
    sideSlopeTan = Number(Math.tan(estimateSideSlope)).toFixed(3);
    sideSlope = Number(sideSlopeTan * 180 / Math.PI).toFixed(2);

    bedSlopeTan = Number(Math.tan(estimateBedSlope)).toFixed(3);
    bedSlope = Number(bedSlopeTan * 180 / Math.PI).toFixed(2);
}

function setShearStressVariables() {
    shearStressBedKg = waterDensity * 9.81;
    shearStressBed = Number(shearStressBedC * shearStressBedKg * bedWidthY * Math.sin(bedSlopeTan)).toFixed(2);
    shearStressSide = Number(shearStressSideC * shearStressBedKg * bedWidthY * Math.sin(bedSlopeTan)).toFixed(2);
}

function setShearDragForceVariables() {
    shearDragBedForce = Number(shearStressBed * shearDragWhereForce).toFixed(2);
    shearDragSideForce = Number(shearStressSide * shearDragWhereForce).toFixed(2);
}

function setLiftForceVariables() {
    liftForceBed = Number(liftForceFup * shearStressBed * liftForceWhere).toFixed(2);
    liftForceSide = Number(liftForceFup * shearStressSide * liftForceWhere).toFixed(2);
}

function setOffsetVariables(estimateVelocity, estimateOffset) {
    offsetWhere2 = Number(7 / 6 * estimateVelocity).toFixed(2);
    offsetNormalVelocity = Number(bedWidthY * Math.cos(angleFriction)).toFixed(2);
    offsetWhere = Number(offsetWhere2 * Math.pow((estimateOffset / 1000 / offsetNormalVelocity), (1 / 7))).toFixed(2);
    offsetN = Number(0.5 * waterDensity * Math.pow(offsetWhere, 2) * (blockTop / 1000) * (estimateOffset / 1000)).toFixed(2);
}

function setNetVariables() {
    netBedDrag =  Number(Number(shearDragBedForce) + Number(offsetN)).toFixed(2);
    netSideDrag = Number(Number(shearDragSideForce) + Number(offsetN)).toFixed(2);
    netBedLift = Number(Number(liftForceBed) + Number(offsetN)).toFixed(2);
    netSideLift = Number(Number(liftForceSide) + Number(offsetN)).toFixed(2);
    netBedNormalForces = Number(Number(blockNormalForceBed) - Number(netBedLift)).toFixed(2);
    netSideNormalForces = Number(Number(blockNormalForceSide) - Number(netSideLift)).toFixed(2);
}

function quoteJax(){
  var url = base_url+"/quotes/ajaxSummary?id=" + id;
  // console.log(base_url);
  var httpReq = new XMLHttpRequest();
  if(httpReq===null){
		alert("Whoa there! Your browser is not updated enough to use this site. Maybe it's time for and <a href='http://browsehappy.com'>upgrade</a>?");
		return;
	}
	  httpReq.onreadystatechange = function(){
      if(httpReq.readyState===4 || httpReq.readyState==="complete"){
        if (!(httpReq.responseText)){
          console.log(httpReq.responseText);
          return;
        }else{
          jsonData = JSON.parse(httpReq.responseText);
          performCalcs(jsonData);
          return;
        }
      }
    }
		httpReq.open("get", url);
		httpReq.send();
}
  quoteJax();
})();
