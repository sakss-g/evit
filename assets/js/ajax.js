jQuery( document ).ready( function(){
    jQuery('.id-input').keyup(function (e) { 
        e.preventDefault();
        var input = jQuery(this).val();

        if(input != ''){
            $.ajax({
                type: 'POST',
                url: 'http://localhost/evit/controller/ajax.php',
                data:  {input:input},
                
                beforeSend: function(){
                    jQuery( '.search-result' ).addClass( 'circle' );
                    jQuery('.search-result').empty();

                },
                complete: function(){
                    jQuery( '.search-result' ).removeClass( 'circle' );
                },
                success: function ( data ) {
                    jQuery('.search-result').append(data); 
                }
            });
            
        }else{
            jQuery('.details').css('dispaly', 'none');
        }
    });
});