<?php
session_start();
if($_SESSION['user'] == "p_admin"){ //checks if user is logged in
}else{
  header("location:P_profile.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = ($_POST['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Assigned</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFPreportstyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">></script>
</head>
<body>

<nav>
    <?php
        include_once('P_Userheader.php');
    ?>
</nav>
<div class="CreportHeader">
    <h1>Police Incident Report</h1>
    <h2>Select a staff to assign</h2>
    <hr>
    </div>
    <br>
    <div class="CreportInci">
        
        <form action="P_assignedAction.php" method="POST">
        <h2>PNP Admins</h2><hr>
        <table class="bemerxy">
    <tr>
    <td>
        
        <?php
        require 'connection.php';  
        $queryID = mysqli_query($con, "SELECT * from p_admin where username != 'p_admin'");
        while($row = mysqli_fetch_array($queryID))
        {
        ?>
        <div class="bassh">
                <input type="radio" name="p_id" id="type" value="<?php echo $row['id'];?>"><?php echo " "; echo $row['id']; echo " / "; echo $row['p_name']; echo " / "; echo $row['position'];?></input>
                <input type="hidden" name="id" value="<?php echo $id;?>">
        </div>
        <?php
        }
        ?>
        </td>
        </tr>
        </table>
        <hr>
        <input type="submit" value="Submit"><br>
        </div>

        
        </form>
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
