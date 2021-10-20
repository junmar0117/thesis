<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/indexHeaderStyles.css">

</head>
<body>

<div class="topnav" id="myTopnav">
      <?php
      require 'connection.php';    
      if(isset($_SESSION['b_user']))
      {
            $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$_SESSION['b_user']."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {           
                $fname = $row['b_fname'];
                $lname = $row['b_lname'];
            }
      ?>
  <a href="index.php" class= "logactive">AidPack | <?php echo mb_strimwidth($lname, 0, 10, "...");?></a>
  <div class="FRC">
      <div class="dropdown">
          <button href="#" onclick="myFunction()" class="dropbtn">Menu<i class="fas fa-caret-down" style="padding-left: 5px;"></i></button>
          <div id="myDropdown" class="dropdown-content">
          <a href="index.php">Home</a>
          <a href="B_profile.php">Profile</a>
          <a href="B_addAnnouncements.php">Broadcast</a>
          <a href="announcements.php">Announcements</a>
          <a href="B_monitor.php">Monitor</a>
          <a href="viewBarangays.php">Barangays</a>
          <a href="B_reportsAssigned.php">Assigned</a>
          <a href="B_pendingVerification.php">Verification</a>
          <a href="logout.php">Sign Out</a>
          </div>
      </div>
          </div>
      <?php
      }
      else if(isset($_SESSION['f_user']))
      {
      $queryID = mysqli_query($con, "SELECT * from f_admin WHERE f_admin.username = '".$_SESSION['f_user']."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {           
              $fname = $row['f_fname'];
              $lname = $row['f_lname'];
            }
      ?>
      <a href="index.php" class= "logactive">AidPack | <?php echo mb_strimwidth($name, 0, 10, "...");?></a>
      <div class="FRC">
      <div class="dropdown">
          <button href="#" onclick="myFunction()" class="dropbtn">Menu<i class="fas fa-caret-down" style="padding-left: 5px;"></i></button>
          <div id="myDropdown" class="dropdown-content">
          <a href="index.php">Home</a>
          <a href="F_profile.php">Profile</a>
          <a href="announcements.php">Announcements</a>
          <a href="F_monitor.php">Monitor</a>
          <a href="viewBarangays.php">Barangays</a>
          <a href="F_reportsAssigned.php">Assigned</a>
          <a href="logout.php">Sign Out</a>
          </div>
      </div>
      </div>
      <?php
      }
      else if(isset($_SESSION['p_user']))
      {
      $queryID = mysqli_query($con, "SELECT * from p_admin WHERE p_admin.username = '".$_SESSION['p_user']."' LIMIT 1");
      while($row = mysqli_fetch_array($queryID))
      {           
        $fname = $row['p_fname'];
        $lname = $row['p_lname'];
      }
      ?>
      <a href="index.php" class= "logactive">AidPack | <?php echo mb_strimwidth($name, 0, 10, "...");?></a>
      <div class="FRC">
      <div class="dropdown">
          <button href="#" onclick="myFunction()" class="dropbtn">Menu<i class="fas fa-caret-down" style="padding-left: 5px;"></i></button>
          <div id="myDropdown" class="dropdown-content">
          <a href="index.php">Home</a>
          <a href="P_profile.php">Profile</a>
          <a href="announcements.php">Announcements</a>
          <a href="P_monitor.php">Monitor</a>
          <a href="viewBarangays.php">Barangays</a>
          <a href="P_reportsAssigned.php">Assigned</a>
          <a href="logout.php">Sign Out</a>
          </div>
      </div>
      </div>
      <?php
      }
      else if(isset($_SESSION['c_user']))
      {
      $queryID = mysqli_query($con, "SELECT * from civilians WHERE civilians.username = '".$_SESSION['c_user']."' LIMIT 1");
      while($row = mysqli_fetch_array($queryID))
      {           
          $fname = $row['fname'];
          $lname = $row['lname'];
      }
      ?>
      <a href="index.php" class= "logactive">AidPack | <?php echo mb_strimwidth($lname, 0, 10, "...");?></a>
      <div class="FRC">
      <div class="dropdown">
          <button href="#" onclick="myFunction()" class="dropbtn">Menu<i class="fas fa-caret-down" style="padding-left: 5px;"></i></button>
          <div id="myDropdown" class="dropdown-content">
          <a href="index.php">Home</a>
          <a href="C_profile.php">Profile</a>
          <a href="announcements.php">Announcements</a>
          <a href="C_safe.php">Status Update</a>
          <a href="viewBarangays.php">Barangays</a>
          <a href="map.php">Map</a>
          <a href="logout.php">Sign Out</a>
          </div>
      </div>
    </div>
      <?php
      }
      else
      {
      ?>
      <a href="index.php" class= "logactive">AidPack | Guest</a>
      
      <div class="FRC">
      <a href="C_register.php" class="signuphovercolor">Sign up</a>
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
      <?php 
      }
      ?>

  
  
  
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
