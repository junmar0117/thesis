<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';  
	$f_id =  ($_POST['f_id']);
    $id = $_POST['id'];
    
    $query = "INSERT INTO f_assigned (f_id,report_id) VALUES ('$f_id','$id')";
    $results = mysqli_query($con, $query);

    if($results)
    {
        $query1 = "UPDATE `reports` SET `status`= 'On The Way' WHERE `report_id` = $id";
        $results1 = mysqli_query($con, $query1);
        Print '<script>alert("Status Updated and Admin Assigned!");</script>'; //Prompts the user
        Print '<script>window.location.assign("F_profile.php");</script>'; // redirects to login.php
    }
    else
    {
        Print '<script>alert("Error Occurred!");</script>'; //Prompts the user
        Print '<script>window.location.assign("F_profile.php");</script>'; // redirects to login.php
    }
}
?>