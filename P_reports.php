<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | PNP Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BCFPreportstyles.css">
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
        
        <form action="" method="POST">
        <div class="CreportInputBox">
            <label for="nameOfInci">Name of Incident</label>
            <br>
            <input type="text" id="nameOfIncident" name="labelNameInci" placeholder="Name of Incident" required>
        </div>

        <div class="CreportInputBox">
            <label for="dateOfInci">Date of Incident</label>
            <br>
            <input type="datetime-local" id="dateOfInci" name="dateOfIncident" required>
        </div>
        
        <div class="CreportInputBox">
            <label for="placeOfInci">Place of Incident</label>
            <br>
            <input type="text" id="placeOfIncident" name="labelPlaceInci" placeholder="Place of Incident" required>
        </div>

        <div class="CreportInputBox">
            <label for="descOfInci">Description of Incident</label>
            <br>
            <input type="text" id="descOfIncident" name="labelDescInci" placeholder="Description of Incident" required>
        </div>

        <div class="CreportInputBox">
            <label for="file">Proof of Incident</label>
            <br>
            <input type="file" id="fileAttachment" required>
        </div>

        <div class="CreportInputBox">
            <label for="typeOfInci">Type of Incident:</label>
            <br>
            <select name="typeOfInci" id="type" required>
                <option value="none">-</option>
                <option value="childabuse">Child Abuse</option>
                <option value="saab">Neighborhood Conflict</option>
                <option value="opel">Fight</option>
                <option value="audi">Quarantine Violators</option>
            </select>
        </div>

        <input type="submit" value="S U B M I T"><br>
        </form>
    </div>
    
</body>
</html>



