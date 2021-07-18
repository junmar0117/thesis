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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
    <div class="getVerifwrapper">
        <h1>Add Announcements</h1>
        <form action="addAnnouncementsAction.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <br>
            <label for="typeOfInci">Title: </label>
            <br>
            <input type="text" name="title" placeholder="Title" required>

            <br>
            <label for="placeOfInci">Content: </label>
            <br>
            <input type="text" name="content" placeholder="Content" required>

            <br>
            <label for="placeOfInci">Time of Post: </label>
            <br>
            <input name="time" placeholder="Time" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" required>

            <br>
            <label for="image">Insert Image </label>
            <br>
            <input type="file" name="file">
            <input type="submit" name="submit"></input>
        </form>
    </div>   
</body>
</html>


