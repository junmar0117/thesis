<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require "connection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$query = mysqli_query($con,"SELECT * from civilians where id='$id'"); // select query
$row = mysqli_fetch_array($query); // fetch data

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    require "connection.php";
    $password = ($_POST['password']);
    $password = md5($password);
    mysqli_query($con,"UPDATE civilians SET username='$password' where id='$id");
    header("location: C_profile.php");
}
?>

<head>
    <meta charset = "utf-8">
    <title> Change Password | R & R</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/changePW.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="changePWContainer">
<h3>CHANGE PASSWORD</h3>

<form method="POST">
  <input type="text" name="password" value="<?php echo $row['password'] ?>" placeholder="Enter New Password" Required></input>
  <br>
  <input type="submit" name="submit" value="Update"></input>
</form>

</div>
</body>
</html>