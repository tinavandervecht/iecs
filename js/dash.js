$(document).foundation();
(function(){
  var quotes = document.querySelectorAll('#quotes .quote');


function toggleState(event){
  var it = event.currentTarget;
  it.classList.toggle('closed');
  TweenLite.fromTo(it.querySelector('.buttons .left'),1,{opacity:0},{opacity:1});
  TweenLite.fromTo(it.querySelector('.buttons .right'),1,{opacity:0},{opacity:1});

}


  for(var i=0;i<quotes.length;i++){
    quotes[i].addEventListener('click', toggleState, false);
  }
})();
