<?php
/*session_start();

    include("connections.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['fullname'];   
        $email = $_POST['email'];    
        $password = $_POST['password'];  
        
        if(!empty($name) && !empty($email) && !empty($password) && !is_numeric($name))
        {
            $query = "insert into user (name, email, password) values ('$name', '$email', '$password');";
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else
        {
            echo "Please enter some valid information!";
        }
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Sign Up</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    
    <script src="assets/js/signup.js"></script>

</head>
<body class ="form">
    <div class="all-container">
        <div class="left-container">
            <img src="assets/images/logo.png" alt="name" class="logo">
            <div class="overlay">
                <h3 class="overlay-heading">Welcome to eagle visionit</h3>
                <p class="overlay-account">Don't have an account? <a href="login.php">Login Now.</a></p>
            </div>
        </div>

        <div id="error"></div>

        <div class="right-container right-signup">
            <div class="header">
                <h2 class="line-heading">Share Your awesomeness</h2>
                <h3 class="account-heading">Sign Up</h3>
                <p class="signup-heading-login">Already have an account?<a href="login.php">Log In</a></p>
            </div>

            <form name="signUp" class="signup innerform" action="" method="post" id = "form">
                <div class="inputs">
                    <label>Full Name</label>
                    <input type="text" name="fullname" id="fullname">
                    <!-- <i class="fa fa-check-circle" aria-hidden = "true"><span>Error msg</span></i> -->
                    <!-- <i class="fa fa-exclamation-circle" aria-hidden = "true"></i> -->
                    
                </div>
                
                <div class="inputs">
                    <label>Email</label>
                    <input name="email" id="email"/> 
                </div>
                
                <div class="inputs">
                    <label>Password</label>
                    <div class="icon_container">
                        <input type="password" placeholder="Must be atleast 6 characters" id="password" name="password">
                        <span class="icon"><i class="fa fa-eye" aria-hidden="true" onclick="myFunction()" id="togglePassword"></i></span>
                    </div>
                </div>

                <div class="updates-container">
                    <input type="checkbox" name="item" class="checkbox" unchecked/>
                    <span class="text-checkbox">Sign up for email updates</span>
                </div>

                <button class="button-signup" type="submit" onclick="validateSignUp()">Sign up</button>

                <p class = "endsentence">By continuing, you agree to accept our Privacy Policy and Terms of Service.</p>

            </form>

            <div class="footer">
                <p>copyright <span>&copy; </span> 2022   |  <a href="#">eaglevisionit.com</a>  |  <a href="#">Terms and Conditions</a> | <a href="#">Privacy Policy</a></p>
            </div>
        </div>
    </div>

    <div class="arrow-signup">
        <a href="login.php">
            <img src="assets/images/arrow.png" alt="">
        </a>
    </div>

</body>
</html>