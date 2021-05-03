<html>
<?php

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

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="password" value="<?php echo $row['password'] ?>" placeholder="Enter New Password" Required>
  <input type="submit" name="submit" value="Change Password">
</form>
</html>