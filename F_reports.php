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
    <link rel="stylesheet" href="./css/BFPreportstyle.css">
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

        <div class="tab">
        <button class="tablinks" onclick="openTabForm(event, 'what')">WHAT?</button>
        <button class="tablinks" onclick="openTabForm(event, 'where')">WHERE?</button>
        </div>

        <div id="what" class="CreportInputBox">
            <br>
            <label for="typeOfInci">Type of Incident: / WHAT?</label>
            <br>
            <select name="type" id="type" required>
                <option value="House Fire">House Fire</option>
                <option value="Establishment Fire">Establishment Fire</option>
                <option value="Others">Others</option>
            </select>
        
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
        <br>
            <label for="descOfInci">Description of Incident / WHAT?</label>
            <br>
            <input type="text" id="descOfIncident" name="description" placeholder="Description of Incident" required>
        <br>
            <label for="file">Proof of Incident</label>
            <br>
            <input type="file" name="file" id="fileAttachment" required>
        </div>
        
        <script>
function openTabForm(evt, tabFormName) {
  var i, CreportInputBox, tablinks;
  CreportInputBox = document.getElementsByClassName("CreportInputBox");
  for (i = 0; i < CreportInputBox.length; i++) {
    CreportInputBox[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabFormName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

        <div id="where" class="CreportInputBox">
            <br>
            <label for="placeOfInci">Place or Landmark of Incident / WHERE?</label>
            <br>
            <input type="text" id="placeOfIncident" name="place" placeholder="Place of Incident" required>

        <br>
            <label for="typeOfInci">Barangay: / WHERE?</label>
            <br>
            <select name="barangay" id="barangay" required>
                <option value="833">833</option>
                <option value="834">834</option>
                <option value="835">835</option>
                <option value="836">836</option>
                <option value="837">837</option>
                <option value="838">838</option>
                <option value="839">839</option>
                <option value="840">840</option>
                <option value="841">841</option>
                <option value="842">842</option>
                <option value="843">843</option>
                <option value="844">844</option>
                <option value="845">845</option>
                <option value="846">846</option>
                <option value="847">847</option>
                <option value="848">848</option>
                <option value="849">849</option>
                <option value="850">850</option>
                <option value="851">851</option>
                <option value="852">852</option>
                <option value="853">853</option>
                <option value="855">855</option>
                <option value="856">856</option>
                <option value="857">857</option>
                <option value="858">858</option>
                <option value="859">859</option>
                <option value="860">860</option>
                <option value="861">861</option>
                <option value="862">862</option>
                <option value="863">863</option>
                <option value="864">864</option>
                <option value="865">865</option>
                <option value="866">866</option>
                <option value="867">867</option>
                <option value="868">868</option>
                <option value="869">869</option>
                <option value="870">870</option>
                <option value="871">871</option>
                <option value="872">872</option>
            </select>
        </div>

        

        <div class="progress">          
            <label>Status</label>
            <ul>
                <li>
                    <img src="./assets/status/fillup.png"><br>
                    <i class="fa fa-circle"></i>
                    <p>Fill Up Report Form</p>
                </li>

                <li>
                    <img src="./assets/status/reportsubmitted.png"><br>
                    <i class="fa fa-circle"></i>
                    <p>Report Submitted</p>
                </li>

                <li>
                    <img src="./assets/status/processed.png"><br>
                    <i class="fa fa-circle"></i>
                    <p>Report Processed</p>
                </li>

                <li>
                    <img src="./assets/status/otw.png"><br>
                    <i class="fa fa-circle"></i>
                    <p>Response On The Way</p>
                </li>

                <li>
                    <img src="./assets/status/finished.png"><br>
                    <i class="fa fa-circle"></i>
                    <p>Finished</p>
                </li>
            </ul>
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
