<?php
    include( "admin/user-controller.php");
    $db = new Database();
    $data ="";
    if( isset( $_POST['input'] ) ){
        $input = $_POST[ 'input' ];
        $inputs = array(
            'id'=> $input 
        );
        $data = $db -> select( 'user', array( '*' ), $inputs);
    }

    if( $data ){ 
        $d = $data[0];?>
        <ul class="details">
            <li>
                <?php echo $d[ 'name' ];?>
            </li>
            <li>
                <?php echo $d[ 'email' ];?>
            </li>
            <li>
                <?php 
                    $date = strtotime( $d['date'] );
                    echo date( 'Y/m/d', $date );
                ?>
            </li>
            <li>
                <?php echo $d[ 'role' ];?>
            </li>
        </ul>    
    <?php 
    }else{
        echo 'data not found';
        die;
    }
?>