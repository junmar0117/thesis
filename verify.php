<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>AidPack | Tips</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tips.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>

    
    <br><br>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        require 'connection.php';
        $vkey = $_GET['vkey'];

        $query = mysqli_query($con, "SELECT email_verified, vkey FROM civilians where email_verified = 0 and vkey = '$vkey' LIMIT 1");

        if(mysqli_num_rows($query) == 1)
        {
            $update = mysqli_query($con, "UPDATE civilians SET email_verified = 1 WHERE vkey = '$vkey' LIMIT 1");
            if($update)
            {
                echo "<center>Account Verified!</center>";
            }
            else
            {
                echo "<center>Error!</center>";
            }
        }
        else
        {
            echo "<center>Account is invalid or account has already been verified!</center>";
        }
    }
    else
    {
        die("Something went wrong!");
    }
    ?> 
</body>
</html>



