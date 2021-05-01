<?php
session_start();
if($_SESSION['user']){ //checks if user is logged in
}else{
  header("location:index.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Philippine National Police Incident Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFPreportstyles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<nav>
    <?php
        include_once('Userheader.html');
    ?>
</nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 id="CreportHeader">Philippine National Police Incident Report</h1>
    <div class="CreportInci">
        
        <form action="sendReport.php" enctype="multipart/form-data" method="POST">
        <div class="CreportInputBox">
            <label for="typeOfInci">Type of Incident:</label>
            <br>
            <select name="type" id="type" required>
                <option value="Drugs">Drugs</option>
                <option value="Theft and Robbery">Theft and Robbery</option>
                <option value="Murder">Murder</option>
                <option value="Physical Violence">Physical Violence</option>
                <option value="Illegal Gambling">Illegal Gambling</option>
                <option value="Missing and Found Persons ">Missing and Found Persons </option>
                <option value="Quarantine Violators">Quarantine Violators</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <?php

        ?>
        
        <div class="CreportInputBox">
            <label for="placeOfInci">Place of Incident</label>
            <br>
            <input type="text" id="placeOfIncident" name="place" placeholder="Place of Incident" required>
        </div>

        <div class="CreportInputBox">
            <label for="descOfInci">Description of Incident</label>
            <br>
            <input type="text" id="descOfIncident" name="description" placeholder="Description of Incident" required>
        </div>

        <div class="CreportInputBox">
            <label for="file">Proof of Incident</label>
            <br>
            <input type="file" name="file" id="fileAttachment" required>
        </div>

        <input type="submit" name="p_upload" value="S U B M I T"><br>
        </form>
    </div>
    
</body>
</html>



