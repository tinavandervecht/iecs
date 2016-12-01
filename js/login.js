$(document).foundation();
(function(){
var background = document.querySelector('#background .other');
var backface = document.querySelector('.backface #two');
var shown = false;
var time = 10;
var fadeTime = 0.8;

function fadeBackgrounds(){
  if(shown){
    TweenLite.to(background,fadeTime,{opacity:0.0});
    TweenLite.to(backface,fadeTime,{opacity:0.0});
  }
  if(!shown){
    TweenLite.to(background,fadeTime,{opacity:1.0});
    TweenLite.to(backface,fadeTime,{opacity:1.0});
  }
  shown = !shown;
  setTimeout(fadeBackgrounds,time*1000);
}


window.addEventListener('load', function(){document.querySelector('#background').style.display="block";},false);
//setTimeout(fadeBackgrounds,time*1000);
})();
