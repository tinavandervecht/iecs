(function(){
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
function openClose(event){
  try{
    event.preventDefault();
    var it = event.currentTarget;
  }
  catch(e){
    console.log(e);
  }
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
  changeLeftBox(it);
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
function tog(event){
  event.preventDefault();
  toggleSubmit();
}
function toggleSubmit(){
  if(!shwn){
    subpopup.classList.add('shown');
    TweenLite.to(subpopup,0.2,{opacity:1,onComplete:function(){TweenLite.to(subpopup.querySelector('.box'),0.1,{opacity:1});}});
  }else{
    TweenLite.to(subpopup,0.2,{opacity:0,onComplete:function(){subpopup.classList.remove('shown');}});
  }
  shwn = !shwn;
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

function calculations(data){
  if(data){/*IF DATA IS NOT NULL*/
    console.log(data);
  }else{
    alert("An error has occurred! Please try again later.")
}
}


function quoteJax(){
  var url = base_url+"/quotes/ajaxSummary?id=" + id;
  console.log(base_url);
  var httpReq = new XMLHttpRequest();
  if(httpReq===null){
		alert("Whoa there! Your browser is not updated enough to use this site. Maybe it's time for and <a href='http://browsehappy.com'>upgrade</a>?");
		return;
	}
	httpReq.onreadystatechange = assignData();
		httpReq.open("get", url);
		httpReq.send();
  }

  function assignData(){
    if(httpReq.readyState===4 || httpReq.readyState==="complete"){
      // console.log(httpReq.responseText);
      if (!(httpReq.responseText)){
        return;
      }
      else{
        jsonData = JSON.parse(httpReq.responseText);
        calculations(jsonData);
        return;
      }
    }
  }
  quoteJax();
})();
