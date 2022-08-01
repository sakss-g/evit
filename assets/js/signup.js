 function myFunction() {
     var x = document.getElementById("passwordInput");
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

function validateSignUp() {
  var fname = document.forms["signUp"]["fullname"].value;
  var email = document.forms["signUp"]["email"].value;
  var password = document.forms["signUp"]["password"].value;
  
  if (fname == "") {
    alert("Name must be filled out");
    return false;
  }else{
    setSuccess(fullname);
  }

  if (email == "") {
    alert("Email must be filled out");
    return false;
  }else{
    validateSignUpEmail(email)
  }

  if (password == "") {
    alert("Password must be filled out");
    return false;
  }
 }

 function validateLogIn(){
  var email = document.forms["logIn"]["email"].value;
  var password = document.forms["logIn"]["password"].value;

  if (email == "") {
    alert("Email must be filled out");
    return false;
  }else{
    validateLogInEmail(email)
  }

  if (password == "") {
    alert("Password must be filled out");
    return false;
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