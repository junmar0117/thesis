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
<?php
$url = "";
$url != 'C_reportIncident.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: C_profile.php'); //redirect to some other page
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reportmainstyles.css">
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
    <table class="reportmainwrapper">
        <tr>
        <th class="reportmainwrapper2">
        <h1>Want to report?</h1>
        <h2>Please select the organization you're reporting to.</h2>
        </th>
        <td class="reportmainwrapper3">
        <h1>Select Concerned Organization</h1>
        <hr>
        <button class="RPbutton" onclick="location.href='B_crimeornot.php';">Local Barangay</button><hr>
        <button class="RPbutton" onclick="location.href='F_reports.php';">Bureau of Fire Protection</button><hr>
        <button class="RPbutton" onclick="location.href='P_crimeornot.php';">Philippine National Police</button>
</td>
</tr>
</table>
<div class="footer2">
          </div> 


<div class="CreportdashbCon">
<h1>Reports Today</h1>
          <table class="Creportdashb">
<tr>
              <td id="numberOfsR1">Local Barangay</td>
              <td id="numberOfsR1">Bureau of Fire Protection</td>
              <td id="numberOfsR1">Philippine National Police</td>
</tr>

            <?php
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Fire' "); // SQL Query
            $fireCount = mysqli_num_rows($query);

            $query1 = mysqli_query($con, "SELECT * from reports where incident = 'Police' "); // SQL Query
            $policeCount= mysqli_num_rows($query1);

            $query2 = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' "); // SQL Query
            $barangayCount= mysqli_num_rows($query2);
            ?>

<tr>
              <td id="numberOfsR2"><?php echo $barangayCount;?></td>
              <td id="numberOfsR2"><?php echo $fireCount;?></td>
              <td id="numberOfsR2"><?php echo $policeCount;?></td>
</tr>

<tr>
              <td id="numberOfsR3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
              <td id="numberOfsR3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
              <td id="numberOfsR3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
</tr>
</table>
<hr>
</div>
</body>
</html>


