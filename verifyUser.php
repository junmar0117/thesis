<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';  
	$id =  ($_POST['id']);
    $ids =  ($_POST['ids']);
    
    $query = "UPDATE `civilians` SET `verified`= 1 WHERE id = $id";
    $results = mysqli_query($con, $query);
    
    if($results)
    {
        $query1 = "DELETE FROM `verification_proof` WHERE `ids` = $ids";
	    $results1 = mysqli_query($con, $query1); //Query the users table
        header("Location:B_pendingVerification.php?success=Verification Request Accepted!");
    }

}
?>