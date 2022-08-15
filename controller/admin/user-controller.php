<?php
require_once '../model/database.php';
class UserController extends Database{

    public function user_insert( $name, $email, $password ){
        if(!empty($name) && !empty($email) && !empty($password) ){
            $data = array(
                'name' => $name,
                'password' => $password,
                'email' => $email
            );
            $insert = $this->insert( 'user', $data );
            if( $insert ){
               header( 'Location: ../index.php' );
            }else{
                echo 'user not added';
            }
        }else{
            echo "Empty fields found";
        }
    }

    public function user_select( $email, $password ){
        $error = "";
        if( !empty( $email ) && !empty( $password ) ){
            $data = array(
                'email' => $email,
                'password' => $password
            );
            $select = $this->select( 'user',$data );
            if(count( $select ) == 1 ){
                $get_data = $select[0];
                header( 'Location: ../view/dashboard.php' );
            }else{
                $_SESSION['error'] = 'User not found' ;
                header( 'Location: ../index.php' );
            }
        }else{
            echo "Empty fields found";
        }
    }

}