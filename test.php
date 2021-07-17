<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">></script>

<body>Lat:
  <input id="lat" name="lat" val="40.713956" />Long:
  <input id="long" name="long" val="74.006653" />
  <br />
  <br />
  <div id="map_canvas" style="width: 500px; height: 250px;"></div>
</body>
<script>
    var map;

function initialize() {
    var myLatlng = new google.maps.LatLng(40.713956, -74.006653);

    var myOptions = {
        zoom: 8,
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

    google.maps.event.addListener(marker, 'dragend', function (event) {


        document.getElementById("lat").value = event.latLng.lat();
        document.getElementById("long").value = event.latLng.lng();
    });
}
google.maps.event.addDomListener(window, "load", initialize());
</script>