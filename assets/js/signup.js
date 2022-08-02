 function myFunction() {
     var x = document.getElementById("password");
     if (x.type === "password") {
       x.type = "text";
       document.getElementById("togglePassword").classList.add("fa-eye-slash");
			 document.getElementById("togglePassword").classList.remove("fa-eye");
     } else {
       x.type = "password";
       document.getElementById("togglePassword").classList.add("fa-eye");
			 document.getElementById("togglePassword").classList.remove("fa-eye-slash");
     }
 }

 /*$(function(){
  var $signupForm = $("#signup-form");
    if($signupForm.lenght){
      $signupForm.validate({
        rules:{
          fullname:{
            required: true
          }
        },
        messages:{
          fullname:{
            required: 'Name must be filled'
          }
        }
      })
    }
 })*/

  function validateSignUp() {

    var fname = document.forms["signUp"]["fullname"].value;
    var email = document.forms["signUp"]["email"].value;
    var password = document.forms["signUp"]["password"].value;
    
    if (fname == "" && email == "" && password == "") {
      alert("all fields are empty");
    }
    else if (fname == "" && email == ""){
      alert("name and email are empty");
    }
    else if(email == "" && password == ""){
      alert("email and password are empty");
    }
    else if(fname == "" && password == ""){
      alert("name and password are empty");
    }
    else if(fname == ""){
      alert("name is empty");
    }
    else if (email == ""){
      alert("email is empty");
    }
    else{
      if(password.length < 6){
        alert("password must be atleast 6 characters");
      }
      
      if(email != ""){
        validateSignUpEmail(email);
      }
    }
 }

 function validateLogIn(){
  var email = document.forms["logIn"]["email"].value;
  var password = document.forms["logIn"]["password"].value;

  if (email == "" && password == "") {
    alert("name and email are empty");
  }
  else if (email == ""){
    alert("email is empty");
  }
  else{
    if(password.length < 6){
      alert("password must be atleast 6 characters");
    }
    
    if(email != ""){
      validateLogInEmail(email);
    }
  }
 }

 function validateSignUpEmail(mail) 
 {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(signUp.email.value))
   {
     return (true)
   }
     alert("You have entered an invalid email address!")
     return (false)
 }

 function validateLogInEmail(mail) 
 {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(logIn.email.value))
   {
     return (true)
   }
     alert("You have entered an invalid email address!")
     return (false)
 }