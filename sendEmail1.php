<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    require_once 'PHPMailer/PHPMailer.php';
    require_once 'PHPMailer/SMTP.php';
    require_once 'PHPMailer/Exception.php';

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'anothersample69420@gmail.com';
    $mail->Password = 'Qwerty12345!';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
     
    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('anothersample69420@gmail.com');
    $mail->Subject = ('$subject');
    $mail->Body = $body; 

    if($mail->send())
    {
        $status = 'Success';
        $response = 'Email Sent!';
    }
    else
    {
        $status = 'Failed';
        $response = 'Error: <br>' . $mail->ErrorInfo;
    }
    exit(json_encode(array('status' => $status, 'response' => $response)));
}
?>
