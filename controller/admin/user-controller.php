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

            if( $select ){
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

    public function user_delete( $id ){
        $id = array(
            'id' => $id
        );

        $delete = $this->delete( 'user', $id );
    }

    public function user_update( $id, $name, $email, $password ){
        $d_pass = md5($password);
        $fields = array(
            'name' => $name,
            'email' => $email,
            'password' => $d_pass,
        );
        $result = $this -> update('user', $fields, $id);
        
        if($result){
            header('Location: ../view/dashboard.php');
        }
    }

    public function get_user_ajax( $page_id ){
        if( $page_id ){
            $formula = ( $page_id - 1 ) * 3;
            $select = $this->db_get_user_ajax( 'user', $formula ,3 );

            if( $select ){
                echo '<tbody>';
                foreach( $select as $s ){?>
                    <tr>
                        <td><?php echo $s['id'];?></td>
                        <td class="img-name"><img src="../assets/images/t.jpg"><?php echo $s['name']; ?></td>
                        <td>
                            <?php 
                                $date = strtotime( $s['date'] );
                                echo date( 'Y/m/d', $date );
                            ?>
                        </td>
                        <td><?php echo $s['role'];?></td>
                        <td>
                            <a href="../signup.php?id=<?php echo $s['id'];?>" id="edit-btn" name="edit"><span class="fa-solid fa-gear" id="action"></span></a>
                            <a href="../controller/form-action.php?id=<?php echo $s['id'];?>&&action=delete" id="delete-btn"><span class="fa-solid fa-circle-xmark"></span></a>
                        </td>
                    </tr>
                <?php }
                echo '</tbody>';
            }else{ ?>
                <tr><td>No data found</td></tr>
            <?php }
            
        }
    }
}
