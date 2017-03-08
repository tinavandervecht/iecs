(function(){
var fields = document.querySelectorAll("a.value");
var isForm = false;
function toggleEdit(event){
  event.preventDefault();
  var it = event.currentTarget;
  if(!isForm){
    document.querySelector("#saveProfile").classList.remove('hidden');
  }
  it.classList.toggle('hidden');
  it.parentNode.querySelector('input.value').classList.toggle('hidden');
  it.parentNode.querySelector('input.value').autofocus = true;
}
for(var i=0;i<fields.length;i++){
  fields[i].addEventListener('click', toggleEdit,false);
}
})();
