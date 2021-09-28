<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
    <title>AidPack | Forms</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/FormsTabs.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<nav>
        <?php
            include_once('header.html');
        ?>
    </nav>
    <br>
    <br>
    <br>
    <br>
<div class="formstabscontainer">
<h2>Forms Tabs</h2>
<p>Click on the buttons inside the tabbed menu:</p>

<div class="tab">
  <button class="tablinks" onclick="openTabForm(event, 'London')">London</button>
  <button class="tablinks" onclick="openTabForm(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openTabForm(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openTabForm(event, 'Pasig')">Pasig</button>
  <button class="tablinks" onclick="openTabForm(event, 'Madagascar')">Madagascar</button>
</div>

<div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="Pasig" class="tabcontent">
  <h3>Pasig</h3>
  <p>Pasig river gg</p>
</div>

<div id="Madagascar" class="tabcontent">
  <h3>Madagascar</h3>
  <p>Yung movie</p>
</div>
</div>
<script>
function openTabForm(evt, tabFormName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabFormName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 
