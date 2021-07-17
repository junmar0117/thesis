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
	require 'connection.php';    
	$queryID = mysqli_query($con, "SELECT * from civilians WHERE civilians.username = '".$_SESSION['user']."' LIMIT 1");
	while($row = mysqli_fetch_array($queryID))
	{
        $id = $row['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/getVerif.css">
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
    <div class="getVerifwrapper">
        <h1>User Verification</h1>
        <h2>Please send a copy of your valid ID.</h2>
        <h2>Accepted Valid IDs: </h2>
        <form action="getVerifiedAction.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <select name="validID" id="validID">
                <option value="Drivers License">Driver's License</option>
                <option value="School ID">School ID</option>
                <option value="National ID">National ID</option>
            </select>
            <br>
            <input type="file" name="file" id="file">
            <br>
            <input type="submit" name="submit"></input>
        </form>
    </div>   
</body>
</html>


