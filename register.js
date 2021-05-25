var pass = document.getElementById("password");
pass.addEventListener('keyup',function() {
  checkPassword(pass.value)
})
function checkPassword(password){
  var strengthBar = document.getElementById("strength");
  var strength = 0;
  if(password.length==0){
    strength=0;
  }
  if(password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
    strength+=1;
  }
  if(password.match(/[~<>?]+/)){
    strength +=1;
  }
  if(password.match(/[!@#$%^&*()]+/)){
    strength+=1;
  }
  if(password.length>5){
    strength+=1;
  }
  switch (strength){
    case 0:
      strengthBar.value=0;
      break;
    case 1:
      strengthBar.value=20;
      break;
    case 2:
      strengthBar.value=40;
      break;
    case 3:
      strengthBar.value=60;
      break;
    case 4:
      strengthBar.value=80;
      break;
    case 5:
      strengthBar.value=100;
      break;
  }
}
function checkpass(){
  var pass = document.getElementById("password");
  var passvalue = pass.value;
  var strength=0;
  
  if(passvalue.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
    strength+=1;
  }
  if(passvalue.match(/[~<>?]+/)){
    strength +=1;
  }
  if(passvalue.match(/[!@#$%^&*()]+/)){
    strength+=1;
  }
  if(passvalue.length>5){
    strength+=1;
  }
  if(strength>=3){
  }else{
    alert("Your Password is very weak, Try Again!");
    return false;
  }

}

function showPass() {
  var p = document.getElementById("password");
  if (p.type === "password") {
    p.type = "text";
  } else {
    p.type = "password";
  }
}

