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
    <title> R & R | Bureau of Fire Protection Incident Report </title>
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
    <h1 id="CreportHeader">Bureau of Fire Protection Incident Report</h1>
    <div class="CreportInci">
        
        <form action="sendReport.php" enctype="multipart/form-data" method="POST" id="myEmail">
        <div class="CreportInputBox">
            <label for="typeOfInci">Type of Incident:</label>
            <br>
            <select name="type" id="type" required>
                <option value="House Fire">House Fire</option>
                <option value="Establishment Fire">Establishment Fire</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <?php
        require 'connection.php';  
        $queryID = mysqli_query($con, "SELECT * from civilians WHERE civilians.username = '".$_SESSION['user']."' LIMIT 1");
        while($row = mysqli_fetch_array($queryID))
          {
            $id = $row['id'];
          }
        $query = mysqli_query($con, "SELECT * from civilians WHERE civilians.id = $id LIMIT 1"); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
          $name = $row['name'];
          $email = $row['email'];
        }
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

        <input type="hidden" id="name" value="<?php echo $name?>">
        <input type="hidden" id="email" value="<?php echo $email?>">
        <input type="hidden" id="subject" value="Reports from R | R!">
        <input type="hidden" id="body" value="<?php echo $name?> sent a report concerning the Bureau of Fire Protection! ">
        <input type="submit" name="p_upload" value="S U B M I T" onclick="sendEmail()"><br>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
    function sendEmail()
    {
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body))
        {
            $.ajax({
                url: 'sendEmail.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val(),
                }, success: function(response){
                    $('#myEmail')[0].reset();
                    $('.sent-notification').text("Message Sent!");
                }
            });
        }
    }
    function isNotEmpty(caller){
        if(caller.val() == ""){
            caller.css('border', '1px solid red');
            return false;
        }else{
            caller.css('border', '');
            return true;
        }
    }
    </script>
</body>
</html>



