
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> Login Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/C_register_login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav>
        <?php
            include_once('header.html');
        ?>
    </nav>

    <div class="login-box">
        <h1>Civilian Login</h1>
        <h2>Input username and password</h2>
        <form action="C_checklogin.php" method="POST">

        <div class="login-box2">
            <input type="text" required="required" name="username" placeholder="">
            <label>Username</label>
        </div>

        <div class="login-box2">
            <input type="password" required="required" name="password" placeholder="">
            <label>Password</label>
        </div>
        
        <input type="submit" value="Login" class="C_loginbtn">
        <a href="C_register.php" id="signupinstead">Sign up instead</a>
    </div>
    <section>
    
    </section>

</body>
</html>



