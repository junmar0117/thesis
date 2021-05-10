<?php
session_start();
if($_SESSION['user']){ //checks if user is logged in
}else{
  header("location:index.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
?>

<?php
require 'connection.php';
if(isset($_POST['b_upload']))
{    
$query = mysqli_query($con, "SELECT * from civilians where username = '$user'"); // SQL Query
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
$barangay = ($_POST['barangay']);
$description = ($_POST['description']);
$type = ($_POST['type']);
$incident = "Barangay";
$status = "Needs Attention";
 
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
            mysqli_query($con, "INSERT INTO reports (username,name, date, place, barangay, description, file, type, incident, time,status) VALUES ('$user','$fullName','$date','$place','$barangay','$description','$fileNameNew','$type','$incident','$time', '$status')"); //SQL query
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
$barangay = ($_POST['barangay']);
$description = ($_POST['description']);
$type = ($_POST['type']);
$incident = "Fire";
$status = "Needs Attention";
 
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
            mysqli_query($con, "INSERT INTO reports (username,name, date, place, barangay, description, file, type, incident, time,status) VALUES ('$user','$fullName','$date','$place','$barangay','$description','$fileNameNew','$type','$incident','$time', '$status')"); //SQL query
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
$barangay = ($_POST['barangay']);
$description = ($_POST['description']);
$type = ($_POST['type']);
$incident = "Police";
$status = "Needs Attention";
 
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
            mysqli_query($con, "INSERT INTO reports (username,name, date, place, barangay, description, file, type, incident, time,status) VALUES ('$user','$fullName','$date','$place','$barangay','$description','$fileNameNew','$type','$incident','$time', '$status')"); //SQL query
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

