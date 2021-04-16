
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Home</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body style="background-color: #f1f1f1;">

    <nav>
        <?php
            include_once('header.html');
        ?>
    </nav>
    <br>
    <br>
    <br>
    <br>

    <div class="hpFirstSection">
        <div class="hpFirst">
            <a class="hpFirstHeader">Take Action,</a><br>
            <a class="hpFirstHeader" style="color:#ff0049;">Report & Respond.</a>
            <br>
            <br>
            <div class="hpFirstleftborder">
                <p style="font-weight:bold;">We support</p>
                <p style="font-weight:bold;">We support</p>
                <p style="font-weight:bold;">We support</p>
                <p>We support</p>
                <p>We support</p>
                <br>
                <button class="hpLoginbtn" href ="C_login.php" style="vertical-align:middle"><span>REGISTER NOW </span></button>
            </div>
            
        </div>
    </div>

    <div class="indexContent1">
        <div class="indexGuide">
            <a class="hpSecHeader">G u i d e</a>

            <table class="iGp">
                <tr>
                    <th><i class='far fa-hand-pointer' style="color:#EC7063;"></i></th>
                    <td><a class="SelConH">Select Organization</a><br><br>
                        <a class="guideSubhead">Select concerned organization among the following:</a><br>
                        <ul class="guideSubhead2">
                            <li>Philippine National Police</li>
                            <li>Bureau of Fire Protection</li>
                            <li>Local Barangay</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th><i class='far fa-edit' style="color:#F4D03F;"></i></th>
                    <td><a class="inputInfoH" >Input Information</a><br><br>
                        <a class="guideSubhead2">Input the information required for the incident report.</a><br>
                        <a class="guideSubhead">Necessary information includes name, age, address, email.</a>
                    </td>
                </tr>
                <tr>
                    <th><i class='far fa-check-circle' style="color:#58D68D;"></i></th>
                    <td><a class="subInciH">Submit Incident Report</a><br><br>
                        <a class="guideSubhead">Click the submit button to submit the incident report.</a>
                    </td>
                </tr>

            </table>
        </div>
    </div>

    <div class="indexContent2">
        <table class="indexAbout">
            <tr>
                <th class="hpSecHeader2">R & R</th>
                <td style="border-left: 1px solid black; float:left;">
                <a class="hpAboutHeader">ABOUT</a>
                <br>
                <br>
                <a class="AboutSubhead">Report to Respond</a>
                <br>
                <br>
                <p style="font-weight:lighter;">R & R assists with incident reporting to connect response organizations with civilians.</p></td>
                <td style="border-left: 1px solid black; float:left;">
                <a class="hpAboutHeader">+ US</a>
                <br>
                <br>
                <a class="AboutSubhead">The developers</a>
                <br>
                <br>
                <p style="font-weight:lighter;">R & R assists with incident reporting to connect response organizations with civilians.</p></td>
                <td style="border-left: 1px solid black; float:left;">
                <a class="hpAboutHeader">MISSION</a>
                <br>
                <br>
                <a class="AboutSubhead">Assistance via Internet</a>
                <br>
                <br>
                <p style="font-weight:lighter;">R & R assists with incident reporting to connect response organizations with civilians.</p></td>
                <td style="border-left: 1px solid black; float:left;">
                <a class="hpAboutHeader">VISION</a>
                <br>
                <br>
                <a class="AboutSubhead">Variety of Response</a>
                <br>
                <br>
                <p style="font-weight:lighter;">R & R assists with incident reporting to connect response organizations with civilians.</p></td>
            </tr>
        </table>
    </div>

    <div class="indexContent3">
        <div class="indexPBB">
            <a class="hpSecHeader3">SUPPORT</a>

                <table class="indexPBBTable">
                    <tr>
                        <th><img src="./assets/pnpfinallogo.jpg" width="100%" height="300px" ></th>
                        <th><img src="./assets/bfpfinallogo.jpg"  width="100%" height="300px" ></th>
                        <th><img src="./assets/barangay2.jpg" width="100%" height="300px" ></th>
                    </tr>

                    <tr>
                        <td class="ipbbthead" style="border-top:1px solid #252525;">Philippine National Police</td>
                        <td class="ipbbthead" style="border-top:1px solid #252525;"style="border-top:1px solid #252525;">Bureau of Fire Protection</td>
                        <td class="ipbbthead" style="border-top:1px solid #252525;">Local Barangay</td>
                    </tr>

                    <tr>
                        <td class="ipbbthead" style="padding-bottom: 10%;"></td>
                        <td class="ipbbthead" style="padding-bottom: 10%;"></td>
                        <td class="ipbbthead" style="padding-bottom: 10%;"></td>
                    </tr>

                    <tr>
                        <td><button class="PBBvstbtn" href ="C_login.php" style="vertical-align:middle"><span>Visit Site</span></button></td>
                        <td><button class="PBBvstbtn" href ="C_login.php" style="vertical-align:middle"><span>Visit Site</span></button></td>
                        <td><button class="PBBvstbtn" href ="C_login.php" style="vertical-align:middle"><span>Visit Site</span></button></td>
                    </tr>
                </table>
        </div>
    </div>

    

</body>
<footer>
        <?php
            include_once('footer.html');
        ?>
</footer>
</html>



