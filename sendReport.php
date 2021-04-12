<?php
session_start();
if($_SESSION['user']){ //checks if user is logged in
}else{
  header("location:index.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
//$id = $_SESSION['id']; 
?>

<?php
require 'connection.php';
if(isset($_POST['b_upload']))
{    
$query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
while($row = mysqli_fetch_array($query))
    {
        $name= $row['name'];
    }

$date= ($_POST['date']);
$place = ($_POST['place']);
$description = ($_POST['description']);
$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$folder="uploads/";
$type = ($_POST['type']);
$incident = "Barangay";
 
move_uploaded_file($file_loc,$folder.$file);
$sql="INSERT INTO reports(name,date_occured,place,description,file,type,incident) VALUES('$name', '$date', '$place', '$description','$file','$type','$incident')";
mysql_query($sql); 
}
?>

<?php
require 'connection.php';

if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
 mysql_query($sql); 
}
?>

<?php
require 'connection.php';

if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
 mysql_query($sql); 
}
?>