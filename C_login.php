<?php
include_once('header.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> Login Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
   

    <div class="login-box">
        <img src="./assets/login.ico" style="float:left" width="80px" height="100px" >
        <h1>Login</h1>
        <form action="C_checklogin.php" method="POST">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" required="required" name="username" placeholder="Enter Username">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" placeholder="Enter Password">
        </div>
        

        <input type="submit" value="Login"><br>
        <a href="C_register.php">No account? Register here!</a>
    </div>
    <section>
    
    </section>

</body>
</html>



