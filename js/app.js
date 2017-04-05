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
//THIS TRY{}CATCH{} IS MY LAZY ATTEMPT TO ASSSIGN THE DELETE FUNCTION TO ANY AND ALL ELEMENTS ON THE PAGE WITH A CLASS OF .rightButton a
// THIS CODE ALLOWS THE DELETE FUNCTIONALITY TO WORK THE SAME WAY FOR MULTIPLE PAGES, USING THE SAME FILE AND THE SAME CODE
})();
