<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/indexHeaderStyles.css">

</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class= "logactive">AidPack | Guest</a>
  <div class="FRC">
    <a href="C_register.php" class="signuphovercolor">Sign up</a>

  
  <div class="FRC">
  <div class="dropdown">
    <button href="#" onclick="myFunction()" class="dropbtn">Sign in<i class="fas fa-caret-down" style="padding-left: 5px;"></i></button>
    <div id="myDropdown" class="dropdown-content">
      <a href="C_login.php">Civilian</a>
      <a href="B_login.php">Barangay</a>
      <a href="F_login.php">Firefighter</a>
      <a href="P_login.php">Police</a>
    </div>
  </div>
  </div>
</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>
</body>
</html>