
function validateSignUpEmail(mail){
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
    return true;
  }else{
    return false;
  }
 }

jQuery( document ).ready( function(){
  jQuery( document ).on( 'submit', 'form.signupform',function(e){
    var fname = jQuery( this ).find( 'input[name=fullname]' ).val();
    var email = jQuery( this ).find( 'input[name=email]' ).val();
    var password = jQuery( this ).find( 'input[name=password]' ).val();
    var message = '';
    
    if (fname == "" && email == "" && password == "") {
      message = "all fields are empty";
    }
    else if (fname == "" && email == ""){
      message = "name and email are empty";
    }
    else if(email == "" && password == ""){
      message = "email and password are empty";
    }
    else if(fname == "" && password == ""){
      message = "name and password are empty";
    }
    else if(fname == ""){
      message = "name is empty";
    }
    else if (email == ""){
      message = "email is empty";
    }
    else{
      if(password.length < 6){
        message = "password must be atleast 6 characters";
      }
      
      if(email != ""){
        var validate = validateSignUpEmail(email);
        if( !validate ){
          message += ' Email format not correct';
        }
      }
    }

    if( '' != message ){
      jQuery( '.validation-message' ).text( message );
      jQuery('.validation-message').removeClass("hide");
      return false;
    }
  });
});