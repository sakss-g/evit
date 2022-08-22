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

    jQuery( document ).on('click', '.page-no a', function(e){
        e.preventDefault();

        var page = jQuery( this ).attr( 'id' );

        if(page){
            var previousid = page - 1;
            if( previousid <= 0 ){
                jQuery( '.previous' ).attr( 'id', 0 );
                jQuery( '.previous' ).addClass( 'disable' );

            }else{
                jQuery( '.previous' ).attr( 'id', previousid );
                jQuery( '.previous' ).removeClass( 'disable' );
            }
        }

        var nextid = parseInt( page ) + 1;      
        var max = jQuery( this ).parent().data( 'max-page' ); 

        if( nextid > max ){
            jQuery( '.next' ).attr( 'id', 3 );
            jQuery( '.next' ).addClass( 'disable' );
        }else{
            jQuery( '.next' ).attr( 'id', nextid );
            jQuery( '.next' ).removeClass( 'disable' );
        }



        if( jQuery( this ).hasClass( 'previous' ) ){
            var active = jQuery( this ).siblings( '.active' );
            jQuery( active ).removeClass( 'active' );
            jQuery( active ).prev().addClass( 'active' );
        }else if( jQuery( this ).hasClass( 'next' ) ){
            var active = jQuery( this ).siblings( '.active' );
            jQuery( active ).removeClass( 'active' );
            jQuery( active ).next().addClass( 'active' );
        }else{
            jQuery( this ).siblings().removeClass( 'active' );
            jQuery( this ).addClass( 'active' ); 
        }
        
        

        $.ajax({
            type: 'POST',
            url: 'http://localhost/evit/controller/ajaxcontrol.php',
            data: {
                page_num : page
            },
            beforeSend: function(){
                jQuery( '#user-table' ).addClass( 'loading' );
                jQuery( '.load' ).addClass( 'circle' );
            },
            complete: function(){
                jQuery( '#user-table' ).removeClass( 'loading' );
                jQuery( '.load' ).removeClass( 'circle' );
            },
            success: function( res ){
                if( res ){
                    jQuery( '#user-table tbody' ).replaceWith( res );
                }
            }
        })
    });

} );
