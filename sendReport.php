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
date_default_timezone_set('Asia/Manila');
$fullName=$name;
$date = strftime("%B %d, %Y");//date
$time = strftime("%r");//time
$period = strftime("%p");//time
$place = ($_POST['place']);
$description = ($_POST['description']);
$type = ($_POST['type']);
$incident = "Barangay";
 
$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileError = $file['error'];
$fileSize = $file['size'];
$fileExt = explode('.',$fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png','mp4');

if (in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 10000000){
            $fileNameNew = uniqid('', true).".". $fileActualExt;

            $fileDestination = 'reports/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            mysqli_query($con, "INSERT INTO reports (username,name, date, place, description, file, type, incident, time) VALUES ('$user','$fullName','$date','$place','$description','$fileNameNew','$type','$incident','$time')"); //SQL query
            Print '<script>alert("Report sucessfully sent!");</script>'; //Prompts the user
            Print '<script>window.location.assign("C_reportIncident.php");</script>'; // redirects to login.php
            //header("location:allreports.php ");

        }else{
            echo "Your file is too big!";
        }

    } else {
        echo "An error occured!";
    }

}else{
    echo "You cannot upload file of this type! The following formats are allowed: .jpg, .jpeg, .png, .mp4";
}

}
?>


<?php
require 'connection.php';
if(isset($_POST['f_upload']))
{    
$query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
while($row = mysqli_fetch_array($query))
    {
        $name= $row['name'];
    }
date_default_timezone_set('Asia/Manila');
$fullName=$name;
$date = strftime("%B %d, %Y");//date
$time = strftime("%r");//time
$period = strftime("%p");//time
$place = ($_POST['place']);
$description = ($_POST['description']);
$type = ($_POST['type']);
$incident = "Fire";
 
$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileError = $file['error'];
$fileSize = $file['size'];
$fileExt = explode('.',$fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png','mp4');

if (in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 10000000){
            $fileNameNew = uniqid('', true).".". $fileActualExt;

            $fileDestination = 'reports/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            mysqli_query($con, "INSERT INTO reports (username,name, date, place, description, file, type, incident, time) VALUES ('$user','$fullName','$date','$place','$description','$fileNameNew','$type','$incident','$time')"); //SQL query
            Print '<script>alert("Report sucessfully sent!");</script>'; //Prompts the user
            Print '<script>window.location.assign("C_reportIncident.php");</script>'; // redirects to login.php
            //header("location:allreports.php ");


        }else{
            echo "Your file is too big!";
        }

    } else {
        echo "An error occured!";
    }

}else{
    echo "You cannot upload file of this type! The following formats are allowed: .jpg, .jpeg, .png, .mp4";
}

}
?>

<?php
require 'connection.php';
if(isset($_POST['p_upload']))
{    
$query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
while($row = mysqli_fetch_array($query))
    {
        $name= $row['name'];
    }
date_default_timezone_set('Asia/Manila');
$fullName=$name;
$date = strftime("%B %d, %Y");//date
$time = strftime("%r");//time
$period = strftime("%p");//time
$place = ($_POST['place']);
$description = ($_POST['description']);
$type = ($_POST['type']);
$incident = "Police";
 
$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileError = $file['error'];
$fileSize = $file['size'];
$fileExt = explode('.',$fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png','mp4');

if (in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 10000000){
            $fileNameNew = uniqid('', true).".". $fileActualExt;

            $fileDestination = 'reportFiles/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            mysqli_query($con, "INSERT INTO reports (username,name, date, place, description, file, type, incident, time) VALUES ('$user','$fullName','$date','$place','$description','$fileNameNew','$type','$incident','$time')"); //SQL query
            Print '<script>alert("Report sucessfully sent!");</script>'; //Prompts the user
            Print '<script>window.location.assign("C_reportIncident.php");</script>'; // redirects to login.php
            //header("location:allreports.php ");

        }else{
            echo "Your file is too big!";
        }

    } else {
        echo "An error occured!";
    }

}else{
    echo "You cannot upload file of this type! The following formats are allowed: .jpg, .jpeg, .png, .mp4";
}

}
?>

