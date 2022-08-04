<?php
session_start();

    include("connections.php");


    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];    
        $password = $_POST['password']; 
        $error = ""; 
        
        if(!empty($email) && !empty($password))
        {
            $query = "select * from user where email = '$email';";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['id'] = $user_data['id'];
                        header("Location: login.php");
                        die;
                    }
                }    
            }
            echo "Email or password invalid";
            header("Refresh:3; url=login.php");
        }
    }
?>