(function(){
var submittoIECS = document.querySelector("#saveit");
var yeahSave = document.querySelector(".box #yes");
var noSave = document.querySelector(".box #no");
var blocks = document.querySelectorAll(".block:not(.disabled)");
var selected = null; //container for currently selected
var selectedblock = document.querySelector("#selectedblock");
function changeLeftBox(blockbox){
  selectedblock.dataset.blockId = blockbox.querySelector('.blocktype p').innerHTML;
  selectedblock.querySelector('.blockname').innerHTML = blockbox.querySelector('.blocktype').innerHTML;
  selectedblock.querySelector('img').src = blockbox.querySelector('.blockdiagram').src;
}
function openClose(event){
  event.preventDefault();
  var it = event.currentTarget;
  if(selected!=null && it!=selected){
    TweenLite.to(selected, 0.5,{height:"6em"});
    if(selected!=null){
      selected.classList.remove('selected');
    }
  }
  if(it!=selected){
    TweenLite.to(it, 0.5,{height:"18em"});
    it.classList.add('selected');
    selected = it;
  }else{
    TweenLite.to(it, 0.5,{height:"6em"});
    selected.classList.remove('selected');
    selected = null;
  }
  changeLeftBox(it);
}

for(var i=0;i<blocks.length;i++){
  if(blocks[i].classList.contains('highlight')){
    TweenLite.to(blocks[i], 0.5,{height:"18em"});
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

submittoIECS.addEventListener('click',tog,false);
yeahSave.addEventListener('click',tog,false);
noSave.addEventListener('click',tog,false);
})();
