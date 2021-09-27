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
                <p style="font-weight:bold;">Tips when a Fire starts</p>
                <br>
                <ul>
                    <li>Know how to safely operate a fire extinguisher
                    </li>
                    <li>Remember to GET OUT, STAY OUT and CALL 9-1-1 or your local emergency phone number.
                    </li>
                    <li>Yell "Fire!" several times and go outside right away. If you live in a building with elevators, use the stairs. Leave all your things where they are and save yourself.
                    </li>
                    <li>If closed doors or handles are warm or smoke blocks your primary escape route, use your second way out. Never open doors that are warm to the touch.
                    </li>
                    <li>If you must escape through smoke, get low and go under the smoke to your exit. Close doors behind you.
                    </li>
                    <li>If smoke, heat or flames block your exit routes, stay in the room with doors closed. Place a wet towel under the door and call the fire department or 9-1-1. Open a window and wave a brightly colored cloth or flashlight to signal for help.
                    </li>
                    <li>Once you are outside, go to your meeting place and then send one person to call the fire department. If you cannot get to your meeting place, follow your family emergency communication plan.
                    </li>
                    <li><b>Be respectful.</b> Talk directly with the neighbor involved about a problem situation. Don’t gossip; that damages relationships and creates trouble.
                    </li>
                </ul>
                <p style="font-weight:bold;">Tips if your clothes catch on fire</p>
                <ul>
                    <li><b>Stop</b> what you’re doing.
                    </li>
                    <li><b>Drop</b> to the ground and cover your face if you can.
                    </li>
                    <li><b>Roll</b> over and over or back and forth until the flames go out. Running will only make the fire burn faster.
                    </li>
                    <li>Once the flames are out, cool the burned skin with water for three to five minutes. Call for medical attention.
                    </li>
                </ul>
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



