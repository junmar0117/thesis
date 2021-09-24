<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';

    $assigned_id = $_POST['assigned_id'];
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
    $when = $_POST['when'];

    $firstResponders = $_POST['firstResponders'];
    $timeResponder = $_POST['timeResponder'];
    $weather = $_POST['weather'];
    $victims = $_POST['victims'];
    $foundAtCS = $_POST['foundAtCS'];
    $suspect = $_POST['suspect'];
    $nearCS = $_POST['nearCS'];
    $interviewedPerson = $_POST['interviewedPerson'];
    $enteredCS = $_POST['enteredCS'];
    $evidence = $_POST['evidence'];
    $initialSearch = $_POST['initialSearch'];
    $oscp = $_POST['oscp'];
    $arrivalInvestigator = $_POST['arrivalInvestigator'];
    $csReceivedDutyInvestigator = $_POST['csReceivedDutyInvestigator'];
    $timeOrDate = $_POST['timeOrDate'];
    $witnessedBy = $_POST['witnessedBy'];
    $preparedBy = $_POST['preparedBy'];

    $bool = true;

    if($bool)
    {
        mysqli_query($con, "INSERT INTO complete_reports (username, reports_id, name, incident_time_date, place, barangay, description, file, type, incident, report_timesent, status, emergency, crime, latitude, longitude) VALUES ('$username','$id','$name','$involve','$why','$how', '$when', '$place', '$barangay', '$description', '$file', '$type', '$incident', '$report_timesent', '$status', '$emergency', '$crime', '$latitude', '$longitude')"); //Inserts the value to table users

        mysqli_query($con, "INSERT INTO complete_report_injury (username, reports_id, name, incident_time_date, place, barangay, description, file, type, incident, report_timesent, status, emergency, crime, latitude, longitude, firstResponders, timeResponder, weather, victims, foundAtCS, suspect, nearCS, interviewedPerson, enteredCS, evidence, initialSearch, oscp, arrivalInvestigator, csReceivedDutyInvestigator, timeOrDate, witnessedBy, preparedBy) VALUES ('$username','$id','$name','$when', '$place', '$barangay', '$description', '$file', '$type', '$incident', '$report_timesent', '$status', '$emergency', '$crime', '$latitude', '$longitude', '$firstResponders' , '$timeResponder', '$weather', '$victims', '$foundAtCS', '$suspect', '$nearCS', '$interviewedPerson', '$enteredCS', '$evidence', '$initialSearch', '$oscp', '$arrivalInvestigator', '$csReceivedDutyInvestigator', '$timeOrDate', '$witnessedBy', '$preparedBy')"); //Inserts the value to table users

        $query = "UPDATE `reports` SET `status`= 'Completed' WHERE `report_id` = $id";
	    $results = mysqli_query($con, $query); //Query the users table

        $query = "DELETE FROM `p_assigned` WHERE `id` = $id";
	    $results = mysqli_query($con, $query); //Query the users table

        print '<script>alert("Report Successfully Filled!"); </script>'; // Prompts the user
        print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
    }
}
?>