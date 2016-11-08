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
})();
