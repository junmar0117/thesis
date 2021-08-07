<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'connection.php';
require 'PHPMailer1/src/Exception.php';
require 'PHPMailer1/src/PHPMailer.php';
require 'PHPMailer1/src/SMTP.php';

if(isset($_POST["email"]))
{

    $emailTo = $_POST["email"];
    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO reset_password (code, email) VALUES ('$code', '$emailTo')");
    if(!$query)
    {
        exit("Error");
    }


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try 
    {
        //Server settings                   //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'exampleonlyy1@gmail.com';                     //SMTP username
        $mail->Password   = 'qzwxecrv12345';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('exampleonlyy1@gmail.com', 'Example Only');
        $mail->addAddress($emailTo);     //Add a recipient             //Name is optional
        $mail->addReplyTo('no-reply@example.com', 'No Reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/P_resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link';
        $mail->Body    = "<h1>This is the HTML message body</h1><b>in bold!</b> <a href='$url'>link</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) 
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Police Request Reset Password</title>
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
            <label>Enter Email</label>
            <input type="email" required="required" name="email" placeholder=""  autocomplete="off">
        </div>
        <br>
        <input type="submit" value="Login" class="C_loginbtn">
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



