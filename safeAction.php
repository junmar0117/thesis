<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$c_id = ($_POST['c_id']);
    $name = ($_POST['name']);
	$report_id = ($_POST['report_id']);
	$safe = ($_POST['safe']);
    $bool = true;
 
	require 'connection.php';
	$query = "SELECT * from saferecords";
    $results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
    $table_c_id = "";
    $table_r_id = "";

	if($results != "") //IF there are no returning rows or no existing username
    {
    while($row = mysqli_fetch_assoc($results)) //display all rows from query
    {
    $table_c_id = $row['c_id']; // the first username row is passed on to $table_users, and so on until the query is finished
    $table_r_id = $row['report_id']; // the first password row is passed on to $table_users, and so on until the query is finished
    }
    if(($c_id == $table_c_id) && ($report_id == $table_r_id)) // checks if there are any matching fields
    {
        print '<script>alert("You Already Sent a Response!"); </script>'; // Prompts the user
        print '<script>window.location.assign("C_safe.php");</script>'; // redirects to register.php  
    }
    else
    {
    mysqli_query($con, "INSERT INTO saferecords (c_id, `name`, report_id,`safe`) VALUES ('$c_id','$name','$report_id','$safe')"); //Inserts the value to table users
    print '<script>alert("Sent!"); </script>'; // Prompts the user
    print '<script>window.location.assign("C_safe.php");</script>'; // redirects to register.php  
    }
}
}
?>