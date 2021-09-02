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
                <p style="font-weight:bold;">POLICE/INVESTIGATION ASSISTANCE</p>
                <p style="font-size: 16px;">PNP Hotline: 177</p>
                <p style="font-size: 16px;">Aleng Pulis Hotline: 0919 777 7377</p>
                <p style="font-size: 16px;">PNP Women and Children Protection Center</p>
                <p style="font-size: 16px;">24/7 AVAWCD Office: (02) 8532-6690</p>
                <p style="font-size: 16px;">Email address: wcpc_pnp@yahoo.com / wcpc_vawcd@yahoo.com / avawcd.wcpc@pnp.gov.ph</p>
                <p style="font-weight:bold;">LEGAL ASSISTANCE</p>
                <p style="font-size: 16px;">Public Attorney’s Office (PAO)</p>
                <p style="font-size: 16px;">Hotline: (02) 8929-9436 local 106, 107, or 159 (local “0” for operator)</p>
                <p style="font-size: 16px;">(+62) 9393233665</p>
                <p style="font-size: 16px;">Email address: pao_executive@yahoo.com</p>
                <p style="font-weight:bold;">REFERRAL SERVICES</p>
                <p style="font-size: 16px;">Inter-Agency Council on Violence Against Women and their Children</p>
                <p style="font-size: 16px;">Mobile numbers: 09178671907 | 09178748961</p>
                <p style="font-size: 16px;">Email address: iacvawc@pcw.gov.ph</p>
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



