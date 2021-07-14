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
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $crime = $_POST['crime'];
}
?>
<?php
$url = "";
$url != 'P_emergencyornot.php';

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
    <title> R & R | Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reportmainstyles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
<?php
include_once('Userheader.html');
?>
</nav>
<br>
<br>
<br>
    <div class="reportmainwrapper">
        <h1>Philippine National Police</h1>
        <h2>Is the Incident Emergency or Not?</h2>
        <form action="P_emergency.php" method="POST">
        <input type="hidden" name="crime" value="<?php echo $crime?>"></input>
        <input type="hidden" name="emergency" value="Yes"></input>
        <button class="RPbutton" style="vertical-align:middle"><span>Yes</span></button><br>
        </form>
        <form action="P_reports.php" method="POST">
        <input type="hidden" name="crime" value="<?php echo $crime?>"></input>
        <input type="hidden" name="emergency" value="No"></input>
        <button class="RPbutton" style="vertical-align:middle"><span>No</span></button><br>
        </form>
    </div>   
</body>
</html>


