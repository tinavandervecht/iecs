$(document).foundation();
(function(){
var current = document.querySelector('#mainNav .current');
var mainNavLinks = document.querySelectorAll('#mainNav ul li a');


function mainNavFunc(event){
//  event.preventDefault();
  var it = event.currentTarget;
  current.classList.remove('current');
  it.classList.add('current');
  current = it;
}


for(var i=0;i<mainNavLinks.length;i++){
    mainNavLinks[i].addEventListener('click', mainNavFunc, false);
}

try {
  var deletes = document.querySelectorAll(".rightButton a");
  for(var i=0;i<deletes.length;i++){
    deletes[i].addEventListener('click',function(){
      var it = event.currentTarget;
      event.preventDefault();
      var r = confirm("Are you sure you want to delete?");
      if(r){
        //code for confirm (delete) here
        window.location.href = it.href;
      }else{
        //code for cancel (not delete) here
      }
    },false);
  }
}
catch(err){
  console.log(err +" error happened!");
}
})();
