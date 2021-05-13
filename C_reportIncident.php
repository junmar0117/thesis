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
        <h1>Concerned Organization</h1>
        <h2>Please select the organization you're reporting to.</h2>
        <button class="RPbutton" onclick="location.href='B_reports.php';" style="vertical-align:middle"><span>Local Barangay</span></button><br>
        <button class="RPbutton" onclick="location.href='F_reports.php';" style="vertical-align:middle"><span>Bureau of Fire Protection</span></button><br>
        <button class="RPbutton" onclick="location.href='P_reports.php';" style="vertical-align:middle"><span>Philippine National Police</span></button><br>

    </div>   
</body>
</html>


