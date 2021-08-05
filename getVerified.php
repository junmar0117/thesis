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
<br>
<br>
<br>
<table class="getVerifwrapper">
        <tr>
            <th class="rlinfo">
                <h1 class="rlch1">Get Verified!</h1>
                <h2 class="rlch2">To get verified, please submit a valid ID.</h2>
            </th>

        <td class="getVerifwrapper2">

        <h1>Civilian User Verification</h1>
        <h2>Verified accounts can report incidents through R&R</h2>
        <hr>
        <h3>Accepted Valid IDs: </h3>
        <form action="getVerifiedAction.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <select name="validID" id="validID">
                <option value="Drivers License">Driver's License</option>
                <option value="School ID">School ID</option>
                <option value="National ID">National ID</option>
            </select>
            <br>
            <hr>
            <h3>Select a copy of your valid ID<i class="fas fa-caret-down" style="padding-left: 5px;"></i></h3>
            <input type="file" name="file" id="file">
            <hr>
            <input type="submit" name="submit"></input>
        </form>

</td>

</tr>

</table>

    <div class="footer2">
              <br>
          </div>  
</body>
</html>


