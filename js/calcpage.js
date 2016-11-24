(function(){
var blocks = document.querySelectorAll(".block:not(.disabled)");
var selected = null; //container for currently selected
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
}

for(var i=0;i<blocks.length;i++){
  blocks[i].addEventListener("click",openClose,false);
}
})();
