(function(){
  var msie = document.documentMode;
if (msie < 9) {
    // code for IE < 9
    console.log("IE9");
    alert('Please consider <a href="browsehappy.com">updating</a> your browser for the best possible experience.</a>');
}else{
  console.log("not IE9");
}
})();
