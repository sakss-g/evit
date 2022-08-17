jQuery( document ).ready( function(){
    jQuery( document ).on('click', '#bars', function(){    
        jQuery( 'body' ).toggleClass('show-sidebar');
    });

    jQuery( document ).on('click', '.close', function(){    
        jQuery( 'body' ).removeClass('show-sidebar');
    });

    jQuery( document ).on('click', '#delete-btn', function(){
        return confirm('Are you sure you want to delete?');
    });
    
} );
