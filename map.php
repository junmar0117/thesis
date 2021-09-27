<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='civilian')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='barangay'){ 
    header("location:B_profile.php ");//checks if user is barangay account
}
if($_SESSION['type']=='fire'){ 
    header("location:F_profile.php ");//checks if user is fire account
}
if($_SESSION['type']=='police'){ 
    header("location:P_profile.php "); //checks if user is police account
}

$user = $_SESSION['user']; //assigns user value
//$id = $_SESSION['id']; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>R & R | Heatmap</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/heatmap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style type="text/css">
		
		#data, #allReport {
			display: none;
		}
	</style>

  </head>

  <body>
    <nav>
      <?php
          include_once('Userheader.php');
      ?>
  </nav>

    <div id="floating-panel">
      
      <h1><br> Reported Incidents Map</h1>
      <hr>
      <h2><center>Options<i class="fas fa-cog" style="padding-left:5px;"></i></center></h2>

      <table class="hmaptab">
        <tr>
          <td>
          
          <button class="hmbut" onclick="SwitchMap()"> On/Off<i class="fas fa-power-off" style="padding-left:5px;"></i></button>
</td>

</tr>
</table>

      <hr>
    </div>
    <div id="map"></div>
    <?php 
			require 'reportTable.php';
			$report = new report;
			$allReport = $report->getAllReport();
			$allReport = json_encode($allReport, true);
			echo '<div id="allReport">' . $allReport . '</div>';			
		 ?>

<script>
var map;
var geocoder;

function initMap() {
	var center = {lat: 14.591540, lng:121.005699};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: center
    });


    var allReport = JSON.parse(document.getElementById('allReport').innerHTML);
    showAllReport(allReport)
}

function showAllReport(allReport) {
	Array.prototype.forEach.call(allReport,function(data){
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lng),
            map:map
        });
    })
}
function showAllReport(allReport) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allReport, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		
		strong.textContent = data.type;
		content.appendChild(strong);


		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map
	    });

	    marker.addListener('click', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}


    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">
    </script>
    <br>
  </body>
</html>

