<?php
session_start();
$username = ($_POST['username']);
$password = ($_POST['password']);

require 'connection.php';
$query = "SELECT * from civilians WHERE username='$username'";

$results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
$exists = mysqli_num_rows($con, $query); //Checks if username exists
$table_users = "";
$table_password = "";
if($results != "") //IF there are no returning rows or no existing username
{
	while($row = mysqli_fetch_assoc($results)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
	}
	if(($username == $table_users) && ($password == $table_password)) // checks if there areany matching fields
	{
		if($password == $table_password)
		{
			$_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
			Print '<script>alert("Logged in successfully!");</script>'; //Prompts the user
			header("location:C_profile.php"); // redirects the user to the authenticated home page
		}
	}
	else
	{
		Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
		Print '<script>window.location.assign("C_login.php");</script>'; // redirects to login.php
	}
}
else
{
	Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
	Print '<script>window.location.assign("C_login.php");</script>'; // redirects to login.php
}
?>