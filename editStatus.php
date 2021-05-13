<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';

    $id = ($_POST['id']);
    $status = ($_POST['status']);
   
	$query = "UPDATE `reports` SET `id`='".$id."',`status`='".$status."' WHERE `id` = $id";
	$results = mysqli_query($con, $query); //Query the users table

    if($results)
    {
    Print '<script>alert("Status Updated!");</script>'; //Prompts the user
    Print '<script>window.location.assign("B_monitor.php");</script>'; // redirects to login.php
    }
    else
    {
    Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
    Print '<script>window.location.assign("B_monitor.php");</script>'; // redirects to login.php
    }
}
?>