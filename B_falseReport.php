<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    require 'connection.php';

    $id = ($_POST['id']);
    $assigned_id = ($_POST['assigned_id']);
    
	$query = "DELETE FROM `reports` WHERE `report_id` = $id";
	$results = mysqli_query($con, $query); //Query the users table

    if($results)
    {
    $query1 = "DELETE FROM `b_assigned` WHERE `id` = $assigned_id";
	$results1 = mysqli_query($con, $query1); //Query the users table
    Print '<script>alert("Marked as False, Deleted the report!");</script>'; //Prompts the user
    Print '<script>window.location.assign("B_reportsAssigned.php");</script>'; // redirects to login.php
    }
    else
    {
    Print '<script>alert("Error occurred, Please try again!");</script>'; //Prompts the user
    Print '<script>window.location.assign("B_reportsAssigned.php");</script>'; // redirects to login.php
    }
}
?>