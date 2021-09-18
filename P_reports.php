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
    $emergency = $_POST['emergency'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Philippine National Police Incident Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFPreportstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">></script>

</head>
<body>

<nav>
    <?php
        include_once('Userheader.php');
    ?>
</nav>
<div class="CreportHeader">
    <h1>Philippine National Police Incident Report</h1>
    <h2>Input all necessary information</h2>
    <hr>
    <h3>Status: lorem</h3>
    </div>
    <br>
    <div class="CreportInci">
        
        <form action="sendReport.php" enctype="multipart/form-data" method="POST" id="myEmail">
        <input type="hidden" name="crime" value="<?php echo $crime;?>">
        <input type="hidden" name="emergency" value="<?php echo $emergency;?>">

        <div class="tab">
        <button class="tablinks" onclick="openTabForm(event, 'what')">What?</button>
        <button class="tablinks" onclick="openTabForm(event, 'where')">Where?</button>  
        </div>

        <div id="where" class="CreportInputBox">
        <h2>Location Details</h2><hr>
        <table class="bemerxy">
    <tr>
    <td>
            <label for="typeOfInci">Barangay</label>
            
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
            </td>
    <td>
    <label for="placeOfInci">Latitude (use map)</label>
            <input id="lat" name="lat" placeholder="Latitude" />
            </td>
    </tr>
    <tr>
        <td>
            <label for="placeOfInci">Place or Landmark of Incident</label>
            
            <input type="text" id="placeOfIncident" name="place" placeholder="Place of Incident" required>
            </td>
    <td>
           
            <label for="placeOfInci">Longitude (use map)</label>
            <input id="long" name="long" placeholder="Longitude"/>
            </td>
    </tr>
    </table>
            <hr>
            <label for="placeOfInci">Marker on Google Maps</label><br>
            <label for="placeOfInci" style="color:red;font-size:14px">Instructions: Drag the Marker to where the incident happened.</label>
            <div id="map_canvas" style="width: 100%; height: 400px;"></div>
        </div>

        <div id="what" class="CreportInputBox">
        <h2>Incident Details</h2><hr>
        <table class="bemerxy">
    <tr>
    <td>
            <label for="typeOfInci">Type of Incident</label>
            
            <select name="type" id="type" required>
                <option value="Drugs">Drugs</option>
                <option value="Theft and Robbery">Theft and Robbery</option>
                <option value="Physical Injury">Physical Injury</option>
                <option value="Children at risk">Children at risk</option>
            </select>
            </td>
    <td>
    <label for="description">Description of Incident</label>
        <input type="text" name="description" required>
            </td>
    </tr>
    <tr>
    <td>
        <label for="file">Proof of Incident</label>
        <input type="file" name="file" id="fileAttachment" required>
    </td>
    </tr>
    </table>
    <hr>
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

    <hr>

        <input type="hidden" id="name" value="<?php echo $name?>">
        <input type="hidden" id="email" value="<?php echo $email?>">
        <input type="hidden" id="subject" value="Reports from R | R!">
        <input type="hidden" id="body" value="<?php echo $name?> sent a report concerning the police! ">
        <input type="submit" name="p_upload" value="Submit" onclick="sendEmail()"><br>
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



