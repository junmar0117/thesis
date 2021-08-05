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
	require 'connection.php';    
	$queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$_SESSION['user']."' LIMIT 1");
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
include_once('B_Userheader.html');
?>
</nav>
<br>
<br>
<br>
    <table class="getVerifwrapper">
        <tr>
            <td class="baddtd">
        <h1>Broadcast now?</h1>
        <h2>Input info for announcements</h2>
</td>
<td class="baddtd2">
        <form action="addAnnouncementsAction.php" method="POST" enctype="multipart/form-data">
        <h1>Announcement</h1>
        <hr>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            
            <label for="typeOfInci">Title </label>
            
            <input type="text" name="title" placeholder="" required>

            
            <label for="placeOfInci">Content</label>
            
            <textarea required></textarea>

            
            <label for="placeOfInci">Date</label>
            
            <input type="datetime-local" name="time" placeholder="" required>

            
            <label for="image">Select Image </label>
            <input type="file" name="file">
            <hr>
            <input type="submit" value="Submit" class="subAddAnn"></input>
        </form>
</td>
    </tr>
</table> 
    <div class="footer2">
              <br>
          </div>    
</body>
</html>


