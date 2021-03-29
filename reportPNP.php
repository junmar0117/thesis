<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> Home Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">R&R</label>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
        </ul>
    </nav>
    <section>
        <div class="container">
            <div class="title">
                <form action="/action_page.php">
                    <div class="user-details">
                        <div class="input-box">
                            <label for="nameOfInci">Name of Incident</label>
                            <input type="text" id="nameOfIncident" name="labelNameInci" placeholder="Name of Incident" required>
                        </div>
                        <div class="input-box">
                            <label for="dateOfInci">Date of Incident</label>
                            <input type="date" id="dateOfInci" name="dateOfIncident" required>
                        </div>
                        <div class="input-box">
                            <label for="placeOfInci">Place of Incident</label>
                            <input type="text" id="placeOfIncident" name="labelPlaceInci" placeholder="Place of Incident" required>
                        </div>
                        <div class="input-box">
                            <label for="file">Attach Image or Video for Proof of Incident</label>
                            <input type="file" id="fileAttachment" required>
                        </div>
                        <div class="input-box">   
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    

    <div class="footer">
            <div class="footer-section-about" id="first">
                <p style="font-family: Courier; font-size: 35px; font-weight: bold;">ABOUT US</p>
            </div>
            <div class="footer-section-links" id="second">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">HOME</a></li>
                <li><a href="#">HOME</a></li>
                <li><a href="#">HOME</a></li>
                <li><a href="#">HOME</a></li>
            </ul>
            </div>
        <div class="footer-bottom">
            &copy; Copyright © R&R 2021 Digital All Rights Reserved
        </div>
    </div>
</body>
</html>



