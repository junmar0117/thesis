<?php
require 'connection.php';
if(isset($_POST['b_upload']))
{    

$name = ($_POST['name']);
$name = ($_POST['name']);
$name = ($_POST['name']);
$name = ($_POST['name']);
$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$folder="uploads/";
 
move_uploaded_file($file_loc,$folder.$file);
$sql="INSERT INTO reports(name,date_occured,place,description,file,type,incident) VALUES('$name', '$date_occured', '$place', '$description','$file','$type','$incident')";
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