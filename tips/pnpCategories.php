<?php
session_start();
?>
<?php
$url = "";
$url != 'pnpCategories.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: ../C_profile.php'); //redirect to some other page
  exit();
}
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
<body style="background-color: #ffffff;">

    <nav>
        <?php
            include_once('Userheader.php');
        ?>
    </nav>
    <br>
    <br>
    <div class="hpFirstSection">
        <div class="hpFirst">
            <div class="hfprb">
            <div class="hpFirstleftborder">
                <br>
                <br>
                <p id="tipsB">Tips and Contacts</p>
                <hr>
                <p id="tipsB">PNP</p>
                <p id="tipsC">Dial 1-1-7 or Call the Nearest Police Station for Life-Threatening Police Emergency Assistance or On-going crime or illegal activities Only.
                </p>
                <p id="tipsC">If you are a victim of crime, please report to your nearest police station or office in your area or dial ‘117’ in case of emergency.
                </p>
            </div>
</div>
        </div>
    </div>
    
   <hr>
</body>

</html>



