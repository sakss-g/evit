function validateLogInEmail(mail){
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
    return true;
  }else{
    return false;
  }
}

jQuery( document ).ready( function(){
  jQuery( document ).on( 'submit', 'form.loginform',function(e){
    var email = jQuery( this ).find( 'input[name=email]' ).val();
    var password = jQuery( this ).find( 'input[name=password]' ).val();
    var message = "";
      
    if (email == "" && password == "") {
      message = "All fields are empty.";
    }else if (email == ""){
      message = "Email is empty.";
    }else{
      if(password.length < 6){
        message = "Password must be atleast 6 characters.";
      }
 
      if(email != ""){
        var validate = validateLogInEmail(email);
        if( !validate ){
          message += ' Email format not correct.';
        }
      }
    }
  
    if( '' != message ){
      jQuery( '.validation-message' ).text( message );
      jQuery('.validation-message').addClass("show");
      
      setTimeout( function(){
        jQuery('.validation-message').removeClass("show");
      }, 3000 )
      return false;
    }
  });
});