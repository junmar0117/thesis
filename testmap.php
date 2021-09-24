<!DOCTYPE html>
<html>
<head>
	<title>Access Google Maps API in PHP</title>
	<link rel="stylesheet" href="./css/heatmap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<style type="text/css">
		.container {
			height: 450px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
		#data, #allReport {
			display: none;
		}
	</style>
</head>
<body>
<script>
var map;
var geocoder;

function initMap() {
	var center = {lat: 14.591540, lng:121.005699};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: center
    });

    var marker = new google.maps.Marker({
      position: center,
      map: map
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


    </script>
	<div class="container">
		<center><h1>Access Google Maps API in PHP</h1></center>
		<?php 
			require 'reportTable.php';
			$report = new report;
			$allReport = $report->getAllReport();
			$allReport = json_encode($allReport, true);
			echo '<div id="allReport">' . $allReport . '</div>';			
		 ?>
		<div id="map"></div>
	</div>
</body>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">
</script>
</html>