<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';  
	$id =  ($_POST['id']);
    $ids =  ($_POST['ids']);

    $query = "DELETE FROM `verification_proof` WHERE `ids` = $ids";
	$results = mysqli_query($con, $query); //Query the users table
    
    if($results)
    {
        Print '<script>alert("User Verification Request Rejected!");</script>'; //Prompts the user
        Print '<script>window.location.assign("B_pendingVerification.php");</script>'; // redirects to login.php
    }

}
?>