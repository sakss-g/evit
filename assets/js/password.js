jQuery(document).on('click', '.icon_container span.icon', function(){
    jQuery( this ).parent().toggleClass( 'visible' );
    if( jQuery( this ).parent().hasClass( 'visible' ) ){
      $('#password').attr('type', 'text');
      $('#togglePassword').removeClass('fa-eye').addClass('fa-eye-slash');
    }else{
      $('#password').attr('type', 'password');
      $('#togglePassword').removeClass('fa-eye-slash').addClass('fa-eye');
    }
});