<?php
include( "admin/user-controller.php");
$user = new UserController();

if( isset( $_POST[ 'page_num' ] ) ){
    $user->get_user_ajax( $_POST[ 'page_num' ] );
}else{
    echo 'invalid access'; 
    die;
}
?>