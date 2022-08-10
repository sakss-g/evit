<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Log In</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>    
    <script src="assets/js/login.js"></script>
    <script src="assets/js/password.js"></script>

</head>
<body class = "form">
    
    
    <div class="validation-message hide"></div> 
    <div class="all-container">
        <div class="left-container">
            <img src="assets/images/logo.png" alt="name" class="logo">
            <div class="overlay">
                <h3 class="overlay-heading">Welcome to eagle visionit</h3>
                <p class="overlay-account">Don't have an account? <a href="signup.php">Create Yours Now.</a></p>
            </div>
        </div>

        <div class="right-container right-login">
            <div class="header">
                <h2 class="line-heading">Share Your awesomeness</h2>
                <h3 class="account-heading">Log In</h3>
            </div>
            
            <form name="logIn" class="loginform innerform" action="controller/form-action.php" method="post" id="login-form">
                <div class="inputs">
                    <label>Email</label>
                    <input name="email" id="email"/> 
                </div>    

                <div class="inputs">
                    <label>Password</label>
                    <div class="icon_container">
                        <input type="password" placeholder="Must be atleast 6 characters" name="password" id="password">
                        <span class="icon"><i class="fa fa-eye" aria-hidden="true" onclick="myFunction()" id="togglePassword"></i></span>                        
                    </div>
                </div>

                <button class="button-login" type="submit" name="login">Log In</button>
            </form>

            <div class="footer">
                <p>copyright <span>&copy; </span> 2022   |  <a href="#">eaglevisionit.com</a>  |  <a href="#">Terms and Conditions</a> | <a href="#">Privacy Policy</a></p>
            </div>
		</div>
	</div>

    <div class="arrow-login">
        <a href="signup.php">
            <img src="assets/images/arrow.png" alt="">
        </a>
    </div>

    <div class = "error">
        <?php 
            if(isset($_SESSION["error"])){
                echo $_SESSION["error"]; 
                unset($_SESSION["error"]);
            }; 
        ?>
    </div>

</body>
</html>