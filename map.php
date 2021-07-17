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
  </head>

  <body>
    <nav>
      <?php
          include_once('Userheader.html');
      ?>
  </nav>
    <div id="floating-panel">
      <ul>
      <li><button onclick="SwitchMap()">Switch Heatmap/Marker</button></li><br>
        <li><button onclick="changeGradient()">Change Gradient</button></li><br>
        <li><button onclick="changeRadius()">Change Radius</button></li><br>
        <li><button onclick="changeOpacity()">Change Opacity</button></li>
      </ul>
    </div>
    <div id="map"></div>
    <script>

var map, heatmap, options;

function initMap() {
  //Map Options
  options = {
    zoom: 14,
    center: { lat: 14.591540,lng: 121.005699}
  }
  
  //Map
  map = new google.maps.Map(document.getElementById('map'),options); 
  
  //Heatmap
  heatmap = new google.maps.visualization.HeatmapLayer({
    data: getPoints(),
    //position:{lat: 14.591540,lng: 121.005699},
    map: map
  });



}

function SwitchMap() {
  if(heatmap.setMap(null)){
    heatmap.setMap(map);
    map.data.setMap(null);
  }else{
    heatmap.setMap(null);
    map.data.setMap(map);
  }
}



// Heatmap data: Barangay Halls
function getPoints() {
  return [
    new google.maps.LatLng(14.595320894829557, 121.00361595826206),
  
    new google.maps.LatLng(14.593172782622228, 121.00357235471445),
    new google.maps.LatLng(14.591769498095898, 121.00978043343358),
    new google.maps.LatLng(14.594498679792771, 121.01046473917921),
    new google.maps.LatLng(14.592097157364577, 121.01182523291021),
    new google.maps.LatLng(14.59112904514116, 121.00960165368039),
    new google.maps.LatLng(14.590607885452343, 121.01221809915572),
    new google.maps.LatLng(14.594010017007239, 121.00370380157368),
    new google.maps.LatLng(14.586256133871608, 121.000483671711),
    new google.maps.LatLng(14.58587032308394, 121.00122140423397),
    new google.maps.LatLng(14.587542313072616, 120.9993282477477),
    new google.maps.LatLng(14.587827944261067, 121.00061817122591),
    new google.maps.LatLng(14.58821935271138, 121.00161085845761),
    new google.maps.LatLng(14.58894163029031, 121.00263187026694),
    new google.maps.LatLng(14.590604309265425, 121.00336595946708),
    new google.maps.LatLng(14.592343150958309, 121.00464782754003),
    new google.maps.LatLng(14.584541419606051, 121.00021918328426),
    new google.maps.LatLng(14.585709983621381, 121.00099049506362),
    new google.maps.LatLng(14.584643919560657, 121.0019200739137),
    new google.maps.LatLng(14.583553005735114, 121.00176806494117),
    new google.maps.LatLng(14.583205531170377, 121.00105004202885),
    new google.maps.LatLng(14.585480540127952, 121.00292592374025),
    new google.maps.LatLng(14.585327827476597, 121.00279598676774),
    new google.maps.LatLng(14.586657981358437, 121.00360994239121),
    new google.maps.LatLng(14.587882588936294, 121.00314787859249),
    new google.maps.LatLng(14.586147784141078, 121.00420718900884),
    new google.maps.LatLng(14.589709608218582, 121.00734915017024),
    new google.maps.LatLng(14.59069575971828, 121.00580235861585),
    new google.maps.LatLng(14.588020234261812, 121.0052514401927),
    new google.maps.LatLng(14.590415756625786, 121.00494161348466),
    new google.maps.LatLng(14.587128108014284, 121.00462771027377),
    new google.maps.LatLng(14.588355942127668, 121.0078816469752),
    new google.maps.LatLng(14.581106990521537, 121.00639809068213),
    new google.maps.LatLng(14.583643692668359, 121.00524081516615),
    new google.maps.LatLng(14.583630877577756, 121.0044204087756),
    new google.maps.LatLng(14.580332778602685, 121.00466132893033),
    new google.maps.LatLng(14.58258305206248, 121.00543854000952),
    new google.maps.LatLng(14.58305890773742, 121.00420828395613),
    new google.maps.LatLng(14.58281043215783, 121.0030443572631),
   

    



  ];
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">
    </script>
  </body>
</html>

