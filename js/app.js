$(document).foundation();
(function(){
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
