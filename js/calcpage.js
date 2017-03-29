(function(){
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
      alert("Your Email has NOT been sent!");
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
    alert("Your Email has NOT been sent!");
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
  yeahSave.addEventListener('click',tog,false);
  noSave.addEventListener('click',tog,false);
}
catch(e){
  console.log(e);
}


// CALCULATIONS



var jsonData;

/*VARIABLE DECLARATIONS*/
var name;
var city;
var engineer;
var startDate;
var address;
/*FLOW AND VELOCITY*/
var maxFlow; //Cubic meters per second
var maxVelocity; //Meters per seconds

/*SLOPES*/
var bedSlope; //Percent
var sideSlope; //Ratio
var frictionAngle; //Degrees,  note: Defaults to 30 degrees

/*TYPES OF FLOW*/
var flowType; //0 : normal, 1 : overtopping, 2 : sub-critical, 3 : hydraulic, 4 : jump, 5 : impinging, 6 : bridge/culvert, 7 : undulating trans critical
var concreteDensity; //Defaults to 2.4 gravity, cannot be changed by user

/*BED WIDTH AND ALIGNMENT*/
var bedWidth; //Meters
var alignment; //Defaults to Straight, opens more options if !straight
var radiusAtCrest; //Meters, ONLY AVAILABLE IF alignment != straight

/*CHANNEL SPECIFICATIONS*/
var chuteLength; // Meters, ONLY AVAILABLE IF alignment != straight
var channelDepth;// Meters, ONLY AVAILABLE IF alignment != straight
var topWidth; // Meters, ONLY AVAILABLE IF alignment != straight

/*ENVIRONMENT*/
var outletSource; //River, manhole, etc.
var soilType; //Soil type and related conditions


function Calculations(data){
  var numSides = 3;
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
  this.blockSon = function(block){
    //BLOCK SPECIFIC FACTORS; probably shouldn't be stored in JS, should be stored serverside and pulled down with AJAX
    var specs = {
      "CCG2": 1.15,
      "CC35": 1.65,
      "CC45": 2.2,
      "CC70": 2.8,
      "CC90": 3.45
    }
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
    for(block of blocks){
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
    alert("An error has occurred! Please try again later.")
}
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
