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

    public function login( $email, $password ){
        $error = "";
  
        if( !empty( $email ) && !empty( $password ) ){
            $data = array(
                'email' => $email,
                'password' => $password
            );
            $select = $this->select( 'user',array( '*' ), $data );
            if(count( $select ) == 1 ){
                $cookie_data = array(
                    'id' => $select[0]['id'],
                    'name' => $select[0]['name'],
                    'email' => $select[0]['email']
                );
                
                header( 'Location: ../view/dashboard.php' );
                setcookie("evit_loggedin_user", json_encode($cookie_data), time() + (86400 * 30), "/");
            }else{
                $_SESSION['error'] = 'User not found' ;
                header( 'Location: ../index.php' );
            }
        }else{
            echo "Empty fields found";
        }
    }

}