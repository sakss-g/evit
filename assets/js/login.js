jQuery( document ).ready( function(){
  jQuery( document ).on( 'submit', 'form.loginform',function(e){
    var email = jQuery( this ).find( 'input[name=email]' ).val();
    var password = jQuery( this ).find( 'input[name=password]' ).val();
    var message = '';
      
    if (email == "" && password == "") {
      message = "all fields are empty";
    }else if (email == ""){
      message = "email is empty";
    }else{
      if(password.length < 6){
        message = "password must be atleast 6 characters";
      }
 
      if(email != ""){
        validateLogInEmail(email);
      }
    }
  
    if( '' != message ){
      $( '.validation-message' ).text( message );
      return false;
    }
  });
});

// function validateLogIn(){
//     var email = document.forms["logIn"]["email"].value;
//     var password = document.forms["logIn"]["password"].value;
  
//     if (email == "" && password == "") {
//       document.getElementById("error").innerHTML = "email and password are empty";
//     }
//     else if (email == ""){
//       document.getElementById("error").innerHTML = "email is empty";
//     }else{
//       if(password.length < 6){
//         document.getElementById("error").innerHTML = "password must be atleast 6 characters";
//       }
      
//       if(email != ""){
//         validateLogInEmail(email);
//       }
//     }
//    }
  
   
  
function validateLogInEmail(mail){
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(logIn.email.value)){
    return (true)
  }
  message = "You have entered an invalid email address!";
  return (false)
}