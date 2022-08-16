<?php    
session_start();
include( "admin/user-controller.php");
$user = new UserController();

if( isset( $_POST[ 'signup' ] ) ){
    $name = $_POST['fullname'];   
    $email = $_POST['email'];    
    $password = $_POST['password'];  
    $encryptpw = md5($password);
   
    $user->user_insert( $name, $email, $encryptpw );
}

if( isset( $_POST[ 'login' ] ) ){
    $email = $_POST[ 'email' ];
    $password = md5($_POST[ 'password' ]);

    $user->login( $email, $password );
}

if( isset( $_GET[ 'id' ] )&& isset( $_GET[ 'action' ])){
    $id = $_GET[ 'id' ];

    $user->user_delete( $id );
}


// if( isset( $_POST[ 'update' ] )){
//     $name = $_POST[ 'name' ];
//     $email = $_POST[ 'email' ];
//     $password = $_POST['password'];  

//     $suer->update( $name, $email, $password );
// }