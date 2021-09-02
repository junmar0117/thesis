<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Incident Reporting</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body style="background-color: #ffffff;">

    <nav>
        <?php
            include_once('../Userheader.php');
        ?>
    </nav>
    <br>
    <br>
    <div class="hpFirstSection">
        <div class="hpFirst">
            <div class="hfprb">
            <a class="hpFirstHeader">Arm ourselves with knowledge to take action,</a><br>
            <a class="hpFirstHeader" style="color:#000;">Report & Respond.</a>
            <br>
            <br>
            <div class="hpFirstleftborder">
                <br>
                <br>
                <p style="font-weight:bold;">PNP</p>
                <p style="font-size: 16px;">Dial 1-1-7 or Call the Nearest Police Station for Life-Threatening Police Emergency Assistance or On-going crime or illegal activities Only.
                </p>
                <p style="font-size: 16px;">If you are a victim of crime, please report to your nearest police station or office in your area or dial ‘117’ in case of emergency.
                </p>
            </div>
</div>
        </div>
    </div>
    
    <div class="indexContent2">
        <table class="indexAbout">
            <tr>
                <th class="hpSecHeader2">R И R</th> 
            </tr>   
            <tr>
                <td>
                    <a class="hpAboutHeader">ABOUT</a>
                        <br><br>
                    <a class="AboutSubhead">Report to Respond</a>
                        <br><br>
                    <p style="font-size: 18px;">R & R assists with incident reporting to connect response organizations with civilians.</p>
                </td>
                <td>
                    <a class="hpAboutHeader">+ US</a>
                        <br><br>
                    <a class="AboutSubhead">In Development</a>
                        <br><br>
                    <p style="font-size: 18px;">R & R is currently in its development phase to test the intended features for the public before release.</p>
                </td>
            </tr>
        </table>
    </div>
</body>
<footer>
        <?php
            include_once('footer.html');
        ?>
</footer>
</html>



