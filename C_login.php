
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>AidPack | Civilian Login</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/C_register_login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

    <nav>
        <?php
            include_once('header.php');
        ?>
    </nav>

    <table class="rlcontain">
        <tr>
            <th class="rlinfo">
                <h1 class="rlch1">Welcome Back!</h1>
                <h2 class="rlch2">To keep connected, please login with your personal info.</h2>
            </th>
                <td class="login-box">

    <div>
        <h2  class="rlch1">Civilian Login</h2>
        <br>
        <form action="C_checklogin.php" method="POST">

        <div class="login-box2">
            <label>Username</label>
            <input type="text" required="required" name="username" placeholder="">
        </div>

        <div class="login-box2">
            <label>Password</label>
            <input type="password" required="required" name="password" placeholder="">
            
        </div>
        <br>
        <input type="submit" value="Login" class="C_loginbtn">
        <a href="C_requestReset.php" id="signupinstead">Forgot Password<i class="far fa-question-circle" style="padding-left: 5px;"></i></a>
        <br>

        <table class="supitab">
            <tr>
                <td>
                <a href="C_register.php" id="signupinstead">Sign up instead</a>
                </td>
            </tr>
        </table>
        
</form>
    </div>
    </td>
</tr>
</table>
    <div class="footer2">
              <br>
          </div>

</body>
</html>



