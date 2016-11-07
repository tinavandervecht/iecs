$(document).foundation();
(function(){
  var quotes = document.querySelectorAll('#quotes .quote');


function toggleState(event){
  var it = event.currentTarget;
  it.classList.toggle('closed');
}


  for(var i=0;i<quotes.length;i++){
    quotes[i].addEventListener('click', toggleState, false);
  }
})();
