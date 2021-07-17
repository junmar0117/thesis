<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Incident Reporting</title>
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
    <div class="hpFirstSection">
        <div class="hpFirst">
            <a class="hpFirstHeader">Take Action,</a><br>
            <a class="hpFirstHeader" style="color:#ff0049;">Report & Respond.</a>
            <br>
            <br>
            <div class="hpFirstleftborder">
                <p style="font-weight:bold;">Assistance to incident reporting with the support from</p>
                <p style="font-weight:bold;">Major response organizations from your local barangay to the</p>
                <p style="font-weight:bold;">Philippine National Police, and Bureau of Fire Protection.</p><br>
                <p>R & R seeks to provide a variety of response to</p>
                <p>Pandacan, Manila</p>
                <br>
                <button class="hpLoginbtn" onclick="location.href='C_register.php';" style="vertical-align:middle"><span>REGISTER NOW </span></button>
            </div>
            
        </div>
    </div>

    <div class="indexContent1">
        <div class="indexGuide">
            <a class="hpSecHeader">G u i d e</a>

            <table class="iGp">
                <tr>
                    <th><i class='far fa-hand-pointer' style="color:#EC7063;"></i></th>
                    <td><a class="SelConH">Select Organization</a><br>
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
                    <td><a class="inputInfoH" >Input Information</a><br>
                        <a class="guideSubhead2">Input the information required for the incident report.</a><br>
                        <a class="guideSubhead">Necessary information includes name, age, address, email.</a>
                    </td>
                </tr>
                <tr>
                    <th><i class='far fa-check-circle' style="color:#58D68D;"></i></th>
                    <td><a class="subInciH">Submit Incident Report</a><br>
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
                    <br><br>
                    <a class="AboutSubhead">Report to Respond</a>
                    <br><br>
                    <p style="font-weight:lighter;">R & R assists with incident reporting to connect response organizations with civilians.</p></td>
                <td style="border-left: 1px solid black; float:left;">
                    <a class="hpAboutHeader">+ US</a>
                    <br><br>
                    <a class="AboutSubhead">In Development</a>
                    <br><br>
                    <p style="font-weight:lighter;">R & R is currently in its development phase to test the intended features for the public before release.</p></td>
            </tr>
        </table>
    </div>

    <div class="indexContent3">
        <div class="indexPBB">
            <div class="hpSecHeader3">Featured <a id="reportsColor">Reports</a></div>
            <br>
            <br>

                <table class="indexPBBTable">
                    <tr>
                        <th><img src="./assets/pnpfinallogo.jpg" width="100%" height="300px" ></th>
                        <th><img src="./assets/bfpfinallogo.jpg"  width="100%" height="300px" ></th>
                        <th><img src="./assets/barangay2.jpg" width="100%" height="300px" ></th>
                    </tr>

                    <tr>
                        <td class="ipbbthead" style="border-top:1px solid #252525;">Report 1</td>
                        <td class="ipbbthead" style="border-top:1px solid #252525;">Report 2</td>
                        <td class="ipbbthead" style="border-top:1px solid #252525;">Report 3</td>
                    </tr>

                    <tr>
                        <td class="ipbbthead2" style="padding-bottom: 10%;">asd</td>
                        <td class="ipbbthead2" style="padding-bottom: 10%;">asd</td>
                        <td class="ipbbthead2" style="padding-bottom: 10%;">asd</td>
                    </tr>

                    <tr>
                        <td class="ipbbthead3">Posted on:</td>
                        <td class="ipbbthead3">Posted on:</td>
                        <td class="ipbbthead3">Posted on:</td>
                    </tr>

                    <tr>
                        <td><button class="PBBvstbtn" style="vertical-align:middle"><span>View More</span></button></td>
                        <td><button class="PBBvstbtn" style="vertical-align:middle"><span>View More</span></button></td>
                        <td><button class="PBBvstbtn" style="vertical-align:middle"><span>View More</span></button></td>
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



