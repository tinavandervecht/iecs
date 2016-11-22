(function(){
var blocks = document.querySelectorAll(".block");
var selected = null; //container for currently selected
function openClose(event){
  event.preventDefault();
  var it = event.currentTarget;
  if(selected!=null && it!=selected){
    TweenLite.to(selected, 1,{height:"6em"});
  }
  if(it!=selected){
    TweenLite.to(it, 1,{height:"18em"});
    // it.classList.toggle('selected');
    selected = it;
  }else{
    TweenLite.to(it, 1,{height:"6em"});
    selected = null;
  }
}

for(var i=0;i<blocks.length;i++){
  blocks[i].addEventListener("click",openClose,false);
}
})();
