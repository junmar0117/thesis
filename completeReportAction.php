<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $report_timesent = $_POST['time'];
    $place = $_POST['place'];
    $incident = $_POST['incident'];
    $description = $_POST['description'];
    $file = $_POST['file'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $barangay = $_POST['barangay'];
    $type = $_POST['type'];
    $status = "Completed/Finished";
    $emergency = $_POST['emergency'];
    $crime = $_POST['crime'];
    $involve = $_POST['who'];
    $why = $_POST['why'];
    $how = $_POST['how'];
    $when = $_POST['when'];
    $bool = true;

    if($bool)
    {
        mysqli_query($con, "INSERT INTO complete_reports (username, reports_id, name, involve, why, how, incident_time_date, place, barangay, description, file, type, incident, report_timesent, status, emergency, crime, latitude, longitude) VALUES ('$username','$id','$name','$involve','$why','$how', '$when', '$place', '$barangay', '$description', '$file', '$type', '$incident', '$report_timesent', '$status', '$emergency', '$crime', '$latitude', '$longitude')"); //Inserts the value to table users
        $query = "UPDATE `reports` SET `status`= 'Completed' WHERE `report_id` = $id";
	    $results = mysqli_query($con, $query); //Query the users table
        print '<script>alert("Report Successfully Filled!"); </script>'; // Prompts the user
        print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
    }
}
?>