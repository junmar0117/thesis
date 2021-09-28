<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='barangay')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='civilian'){ 
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
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $victim = $_POST['victim'];
    $id = $_POST['id'];
}
?>
<?php
$url = "";
$url != 'B_victimchildornot.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: index.php'); //redirect to some other page
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Report </title>
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
include_once('B_Userheader.php');
?>
</nav>

<table class="reportmainwrapper">
        <tr>
        <th class="reportmainwrapper2">
        <h1>Is it a crime?</h1>
        <h2>lorem ipsum</h2>
        </th>
        <td class="reportmainwrapper3">
        <h1>Is the victim child?</h1>
        <hr>
        <form action="B_suspectchildornot.php" method="POST">
        <input type="hidden" id="yes" name="victim" value="Yes">
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
        <button class="RPbutton" >Yes</button><hr>
        </form>
        <form action="B_suspectchildornot.php" method="POST">
        <input type="hidden" id="no" name="victim" value="No">
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
        <button class="RPbutton" >No</button>
        </form>
        </td>
</tr>
</table>
<div class="footer2">
          </div> 
          
          <div class="CreportdashbCon">
<h1>Reports Today</h1>
          <table class="Creportdashb">
<tr>
              <td id="numberOfsR1">Index Crimes</td>
              <td id="numberOfsR1">Non-Index Crimes</td>
              <td id="numberOfsR1"></td>
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
              <td id="numberOfsR3"></td>
</tr>
</table>
<hr>
</div>
</body>
</html>


