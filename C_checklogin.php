<?php
session_start();
$username = ($_POST['username']);
$password = ($_POST['password']);

	require 'connection.php';
	$query = "SELECT * from civilians WHERE username='$username'";
	$results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username

    $exists = mysqli_num_rows($results); //Checks if username exists
        if($exists==1)
        {
            while($row = mysqli_fetch_assoc($results)) //display all rows from query
            {  
                if(password_verify($password, $row['password'])) // checks if there are any matching fields
                {
                    $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
					$_SESSION['type'] = 'civilian';//set the type in a session. This serves as a global variable
                    $_SESSION['name'] = $row['name'];
					Print '<script>alert("Logged in successfully!");</script>'; //Prompts the user
					header("location:C_profile.php"); // redirects the user to the authenticated home page
                }
                else
                {
                    Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
                    Print '<script>window.location.assign("C_login.php");</script>'; // redirects to login.php
                }
            }
        }
        else
        {
        Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
        Print '<script>window.location.assign("C_login.php");</script>'; // redirects to login.php
        }
?>