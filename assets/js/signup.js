 function myFunction() {
     var x = document.getElementById("myInput");
     if (x.type === "password") {
       x.type = "text";
       $("#togglePassword").attr("src", "../assets/images/hide-password.png")
     } else {
       x.type = "password";
       $("#togglePassword").attr("src", "../assets/images/view-password.png")

     }
 }

 function validateSignUp() {
  var fname = document.forms["signUp"]["fullname"].value;
  var email = document.forms["signUp"]["email"].value;
  var password = document.forms["signUp"]["password"].value;
  
  if (fname == "") {
    alert("Name must be filled out");
    return false;
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