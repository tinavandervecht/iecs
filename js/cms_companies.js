(function(){
var sorty = document.querySelector("#sort_input");


function clearIt(event){
  var it = event.currentTarget;
  it.value ="";
}

sorty.addEventListener('click', clearIt, false);
sorty.addEventListener('focus', clearIt, false);
})();
