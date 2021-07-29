<?php
session_start();
if($_SESSION['user']){ //checks if user is logged in
}else{
  header("location:index.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $crime = $_POST['crime'];
    $emergency = "Yes";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Local Barangay Incident Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFPreportstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">></script>
    <style> html, body, #map_canvas {
    margin: 0;
    padding: 0;
    height: 100%}
</style>
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
    <h1 id="CreportHeader">Local Barangay Incident Report</h1>
    <div class="CreportInci">
        
        <form action="sendReportEmergency.php" enctype="multipart/form-data" method="POST" id="myEmail">
        <input type="hidden" name="crime" value="<?php echo $crime;?>">
        <input type="hidden" name="emergency" value="<?php echo $emergency;?>">

        <div class="tab">
            <button class="tablinks" onclick="openTabForm(event, 'what')">WHAT?</button>
            <button class="tablinks" onclick="openTabForm(event, 'where')">WHERE?</button>
        </div>

        <div id="where" class="CreportInputBox">
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
            <br>
            <label for="placeOfInci">Place or Landmark of Incident / WHERE?</label>
            <br>
            <input type="text" id="placeOfIncident" name="place" placeholder="Place of Incident" required>
            <label for="placeOfInci">Latitude / WHERE?</label>
            <br>
            <input id="lat" name="lat" />
            <br>
            <label for="placeOfInci">Langtitude / WHERE?</label>
            <br>
            <input id="long" name="long" />
            <br>
            <label for="placeOfInci">Marker on Google Maps / WHERE?</label><br>
            <label for="placeOfInci" style="color:red;font-size:15px">Instructions: Drag the Marker to where the incident happened.</label>
            <div id="map_canvas" style="width: 500px; height: 500px;"></div>
        </div>

        <div id="what" class="CreportInputBox">
            <br>
            <label for="typeOfInci">Type of Incident: / WHAT?</label>
            <br>
            <select name="type" id="type" required>
                <option value="Child Abuse">Child Abuse</option>
                <option value="Violence Against Women">Violence Against Women</option>
                <option value="Sexual Harrassment">Sexual Harrassment</option>
                <option value="Neighborhood Conflict">Neighborhood Conflict</option>
                <option value="Fight">Fight</option>
                <option value="Fight">Community Conflict</option>
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

            <div class="progress">          
            <label class="statuslabel"><center>Status</center></label>
            <ul>
                <li>
                    <img src="./assets/status/fillup.png"><br>
                    <p>Fill Up Report Form</p>
                </li>
            </ul>
            </div>

        <input type="hidden" id="name" value="<?php echo $name?>">
        <input type="hidden" id="email" value="<?php echo $email?>">
        <input type="hidden" id="subject" value="Reports from R | R!">
        <input type="hidden" id="body" value="<?php echo $name?> sent a report concerning the Local Barangay! ">
        <input type="submit" name="b_upload" value="S U B M I T" onclick="sendEmail()"><br>
        </form>
    </div>
    <script>
var map;

function initialize() {
var myLatlng = new google.maps.LatLng(14.591540,121.005699);

var myOptions = {
    zoom: 15,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };

map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

var marker = new google.maps.Marker({
    draggable: true,
    position: myLatlng,
    map: map,
    title: "Your location"
    });

    google.maps.event.addListener(marker, 'click', function (event) {
    document.getElementById("latbox").value = event.latLng.lat();
    document.getElementById("lngbox").value = event.latLng.lng();
    });
    google.maps.event.addListener(marker, 'dragend', function (event) {
        document.getElementById("lat").value = event.latLng.lat();
        document.getElementById("long").value = event.latLng.lng();
    });
}
google.maps.event.addDomListener(window, "load", initialize());
</script>
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



