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
    <div class="reportInci">
        <h1>REPORT INCIDENT PNP</h1>
        <form action="" method="POST">
        <div class="textbox1">
            <label for="nameOfInci">Name of Incident</label>
            <input type="text" id="nameOfIncident" name="labelNameInci" placeholder="Name of Incident" required>
        </div>

        <div class="textbox1">
            <label for="dateOfInci">Date of Incident</label>
            <input type="datetime-local" id="dateOfInci" name="dateOfIncident" required>
        </div>
        
        <div class="textbox1">
            <label for="placeOfInci">Place of Incident</label>
            <input type="text" id="placeOfIncident" name="labelPlaceInci" placeholder="Place of Incident" required>
        </div>

        <div class="textbox1">
            <label for="descOfInci">Description of Incident</label>
            <input type="text" id="descOfIncident" name="labelDescInci" placeholder="Description of Incident" required>
        </div>

        <div class="textbox1">
            <label for="file">Attach an Image or Video for Proof of Incident</label>
            <input type="file" id="fileAttachment" required>
        </div>

        <div class="textbox1">
            <label for="typeOfInci">Type of Incident:</label>
            <select name="typeOfInci" id="type" required>
                <option value="none">Choose an option: </option>
                <option value="childabuse">Child Abuse</option>
                <option value="saab">Neighborhood Conflict</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
            </select>
        </div>

        <input type="submit" value="SUBMIT"><br>
        </form>
    </div>
    </section>

    

    <div class="footer1">
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



