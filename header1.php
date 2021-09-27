<!DOCTYPE html>
<?php
	require 'connection.php';    
    if(isset($_SESSION['b_user']))
    {
        $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$_SESSION['b_user']."' LIMIT 1");
        while($row = mysqli_fetch_array($queryID))
        {           
            $patient_lastName = $row['patient_lastName'];
        }
    }
    else if(isset($_SESSION['doctor_username']))
    {
        $queryID = mysqli_query($con, "SELECT * from doctor WHERE doctor.doctor_username = '".$_SESSION['doctor_username']."' LIMIT 1");
        while($row = mysqli_fetch_array($queryID))
        {
            $doctor_lastName = $row['doctor_lastName'];
        }
    }
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/indexHeaderStyles.css">

</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class= "logactive">RИR</a>
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


<ul>
						<li><a href="index.php" title="Home">Home</a></li>
						<li><a href="doctor.php" title="Doctors">Doctors</a></li>
						<li>
						<?php 
                            if(isset($_SESSION['patient_username']))
                            {
                            echo '<a href="bookmark.php">Bookmark</a>';
                            }
                            else
                            {

                            }
                            ?>
						</li>
						<li><a href="aboutus.php" title="About Us">About Us</a></li>
						<li><a href="blogspage.php" title="Blogs">Blogs</a></li>
						<li><?php 
                            if(isset($_SESSION['patient_username']) || isset($_SESSION['doctor_username']) )
                            {
                               
                            }
                            else
                            {
								echo '<a href="signin.php" title="Sign in or Register">Sign in or Register</a>';
                            }
                            ?></li>
						<li><?php 
                        if(isset($_SESSION['patient_username']))
                        {
                        	echo "Welcome,"." ".$patient_lastName;							
                        }
                        else if(isset($_SESSION['doctor_username']))
                        {
							echo "Welcome, Dr."." ".$doctor_lastName;
                        }
                        ?></li>
						<li>
						<?php 
                            if(isset($_SESSION['doctor_username']))
                            {
                            echo '<a href="subscription.php" class="btn-subscribe">Services</a>';
                            }
                            else
                            {

                            }
                            ?>
						</li>
					</ul>
