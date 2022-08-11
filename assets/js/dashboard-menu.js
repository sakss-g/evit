jQuery(document).on('click', '.search-wrapper span.fa-bars', function()
{
    jQuery( this ).parent().toggleClass( 'visible' );

    if( jQuery( this ).parent().hasClass( 'visible' ) )
    {
        $('#bars').removeClass('.sidebar').addClass('.sidebar-dash');
        //$("sidebar.sidebar-menu").toggleClass("menu_show");
    }

});



// $( document ).ready(function() {

//     $( ".cross" ).hide();
//     $( ".menu" ).hide();
//     $( ".hamburger" ).click(function() {
//         $( ".menu" ).slideToggle( "slow", function() {
//             $( ".hamburger" ).hide();
//             $( ".cross" ).show();
//         });
//     });
    
//     $( ".cross" ).click(function() {
//         $( ".menu" ).slideToggle( "slow", function() {
//             $( ".cross" ).hide();
//             $( ".hamburger" ).show();
//         });
//     });
    
// });