<?php
	require 'connection.php';    
    if(isset($_SESSION['user']))
    {
        $queryID = mysqli_query($con, "SELECT * from p_admin WHERE p_admin.username = '".$_SESSION['user']."' LIMIT 1");
        while($row = mysqli_fetch_array($queryID))
        {           
          $fname = $row['p_fname'];
          $lname = $row['p_lname'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/CBFP_headerstyles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="P_profile.php" class= "logactive">AidPack | <?php echo mb_strimwidth($lname, 0, 10, "...");?></a>
  <div class="FRC">
    <div class="dropdown">
    <?php
      require 'connection.php';    
      if(isset($_SESSION['p_user']))
      {
            $queryID = mysqli_query($con, "SELECT * from p_admin WHERE p_admin.username = '".$_SESSION['p_user']."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {           
              $fname = $row['p_fname'];
              $lname = $row['p_lname'];
              $p_id = $row['id'];
            }

            $query = mysqli_query($con, "SELECT * from p_assigned where p_id = $p_id"); // SQL Query
            $assignedCount = mysqli_num_rows($query);
      }
      ?>
      <button href="#" onclick="myFunction()" class="dropbtn">Menu<p id="notifbar"><?php if($fname != "Administrator"){echo $assignedCount; }?></p><i class="fas fa-caret-down" style="padding-left: 5px;"></i></button>
      <div id="myDropdown" class="dropdown-content">
      <a href="index.php">Home</a>
  <a href="P_profile.php">Profile</a>
  <a href="announcements.php">Announcements</a>
  <a href="P_monitor.php">Monitor</a>
  <a href="P_completedReports.php">Completed</a>
  <a href="viewBarangays.php">Barangays</a>
  <?php        
  if($fname != "Administrator")
  {
  ?>
  <a href="P_reportsAssigned.php">Assigned<p id="notifbar"><?php echo $assignedCount; ?></p></a>
  <?php
  }
  ?>
  <a href="logout.php">Sign Out</a>
  
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
