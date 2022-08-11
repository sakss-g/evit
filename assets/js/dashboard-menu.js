jQuery( document ).ready( function(){
    jQuery(document).on('click', '#bars', function(){    
        //e.preventDefault();
        jQuery( 'body' ).toggleClass('show-sidebar');
    });

    jQuery(document).on('click', '.close', function(){    
        //e.preventDefault();
        jQuery( 'body' ).removeClass('show-sidebar');
     });
} );