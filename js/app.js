$(document).foundation();



(function(){
var user = document.querySelector('#username');
var pass = document.querySelector('#password');
var signUser = document.querySelector('#signUpUsername');
var signPass = document.querySelector('#signUpPassword');
var signPassConfirm = document.querySelector('#signUpPassConfirm');
var noAccountForm = document.querySelector("#onNoAccountShouldYou");

function clearField(event){
  var it = event.currentTarget;
  it.value ="";
  it.removeEventListener('focus',clearField,false);
}

function setPass(event){
  var it=event.currentTarget;
it.type="password";
it.removeEventListener('focus',setPass,false);
}


function signUpOrIn(event){
var it = event.currentTarget;
if(it.innerHTML === "Sign up"){
  it.innerHTML = "Sign in";
  it.parentNode.innerHTML.replace("Don't","");
}else if(it.innerHTML=== "Sign in"){
  it.innerHTML = "Sign up";
}
var forms = it.parentNode.parentNode.querySelectorAll('form');
for(i=0;i<forms.length;i++){
  forms[i].classList.toggle('hide');
  var shown;
  if(forms[i].classList.contains('hide')){
    shown = 0;
  }else{
    shown = 1;
  }
  TweenLite.to(forms[i], 1, {opacity:shown});
}
}

function checkPass(event){
var it = event.currentTarget;
if(it.value === it.parentNode.querySelector("#signUpPassword").value){
    it.style.color="inherit";
}else{
  it.style.color="#e11";
}
}

pass.type="text";
signPass.type="text";
signPassConfirm.type="text";

noAccountForm.querySelector('#signUp').addEventListener('click',signUpOrIn,false);
user.addEventListener('focus', clearField, false);
pass.addEventListener('focus', clearField, false);
pass.addEventListener('focus',setPass,false);
signUser.addEventListener('focus', clearField, false);
signPass.addEventListener('focus', clearField, false);
signPass.addEventListener('focus',setPass,false);
signPassConfirm.addEventListener('focus', clearField, false);
signPassConfirm.addEventListener('focus',setPass,false);
signPassConfirm.addEventListener('input', checkPass, false);
})();
