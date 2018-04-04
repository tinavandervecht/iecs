(function(){
var inputs = document.querySelectorAll("input.value");
var fields = document.querySelectorAll("a.value");
var isForm = false;
var lastClick;

function enableEdit(event){
    event.preventDefault();
    var it = event.currentTarget;
    if(!isForm){
        document.querySelector("#saveProfile").classList.remove('hidden');
    }
    it.classList.toggle('hidden');
    it.parentNode.querySelector('input.value').classList.toggle('hidden');
    it.parentNode.querySelector('input.value').focus();
}

function removeEdit(event){
    event.preventDefault();
    var it = event.currentTarget;
    it.parentNode.querySelector('input.value').classList.add('hidden');
    it.parentNode.querySelector('a.value').classList.remove('hidden');
}

function updateLinkText(event){
    event.preventDefault();
    var it = event.currentTarget;
    it.parentNode.querySelector('input.value').classList.add('hidden');
    it.parentNode.querySelector('a.value').querySelector('.text').textContent = it.value;
}

/*
 * foreach link on page, set event LISTENERS
 * to hide link when clicked, and show next input
 */
for(var i=0;i<fields.length;i++){
    fields[i].addEventListener('click', enableEdit, false);
}

/*
 * foreach input on page, set event LISTENERS
 * to hide input when user focusses off input
 * and to update link text as user updates input text
 */
for(var i=0;i<inputs.length;i++){
    inputs[i].addEventListener('change', updateLinkText, false);
    inputs[i].addEventListener('blur', removeEdit, false);
}
})();
