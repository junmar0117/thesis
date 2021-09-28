<?php
require 'connection.php';

if(!isset($_GET["code"]))
{
    exit("Cant Find Page");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($con, "SELECT email FROM reset_password WHERE code ='$code'");
if(mysqli_num_rows($getEmailQuery) == 0)
{
    exit("Cant Find Page");
}

if(isset($_POST["password"]))
{
    $pw = $_POST["password"];
    $cpw = $_POST["cpassword"];

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    if($pw === $cpw)
    {
        $pw = password_hash($pw, PASSWORD_DEFAULT);
        $query = mysqli_query($con, "UPDATE p_admin SET password='$pw' WHERE email = '$email'");
        if($query)
        {
            $query = mysqli_query($con, "DELETE FROM reset_password WHERE code = '$code'");
            exit("Password Updated");
        }
        else
        {
            exit("Something Went Wrong");
        }
    }
    else
    {
        print '<script>alert("Password does not match! Try Again!"); </script>'; // Prompts the user
        print '<script>window.location.assign("http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/P_resetPassword.php?code=$code".php");</script>'; // redirects to register.php
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>AidPack | PNP Change Password</title>
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
            include_once('header.html');
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
        <h2  class="rlch1">Forgot Password</h2>
        <br>
        <form method="POST">

        <div class="login-box2">
            <label>New Password</label>
            <input type="password" required="required" name="password" placeholder="New Password"  autocomplete="off">
        </div>

        <div class="login-box2">
            <label>Confirm Password</label>
            <input type="password" required="required" name="cpassword" placeholder="New Password"  autocomplete="off">
        </div>

        <br>
        <input type="submit" value="Login" class="C_loginbtn">
        <br>

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



