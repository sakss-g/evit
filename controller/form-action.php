<?php    session_start();
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

    $user->user_select( $email, $password );
}