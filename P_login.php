
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | PNP Login</title>
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
        <h1>Police User Login</h1>
        <h2>Input username and password</h2>
        <form action="adminCheckLogin.php" method="POST">

        <div class="login-box2">
            <input type="text" required="required" name="username" placeholder="">
            <label>Username</label>
        </div>

        <div class="login-box2">
            <input type="password" required="required" name="password" placeholder="">
            <label>Password</label>
        </div>
        
        <input type="submit" name="p_login" value="Login" class="C_loginbtn">
        <a href="F_login.php" id="signupinstead">Firefighter Account Sign in</a>
        <a href="B_login.php" id="signupinstead">Barangay Account Sign in</a>
    </div>
    <section>
    
    </section>

</body>
</html>



