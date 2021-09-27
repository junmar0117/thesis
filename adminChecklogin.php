<?php
session_start();
require 'connection.php';
if(isset($_POST['b_login']))
{    
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        $query = "SELECT * from b_admin WHERE username = '$username'";
        $results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
        $exists = mysqli_num_rows($results); //Checks if username exists
        if($exists==1)
        {
            while($row = mysqli_fetch_assoc($results)) //display all rows from query
            {  
                if(password_verify($password, $row['password'])) // checks if there are any matching fields
                {
                  $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                  $_SESSION['b_user'] = $username; 
                  $_SESSION['type'] = 'barangay';//set the type in a session. This serves as a global variable
                  $_SESSION['name'] = $row['name'];
                  header("location: B_profile.php"); // redirects the user to the authenticated home page
                }
                else
                {
                    Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
                    Print '<script>window.location.assign("B_login.php");</script>'; // redirects to login.php
                }
            }
        }
        else
        {
        Print '<script>alert("Incorrect Credentialsss, Please try again!");</script>'; //Prompts the user
        Print '<script>window.location.assign("B_login.php");</script>'; // redirects to login.php
        }
}
?>

<?php
//session_start();
require 'connection.php';
if(isset($_POST['f_login']))
{ 
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        $query = "SELECT * from f_admin WHERE username='$username'";
        $results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
        $exists = mysqli_num_rows($results); //Checks if username exists
        if($exists==1)
        {
            while($row = mysqli_fetch_assoc($results)) //display all rows from query
            {  
                if(password_verify($password, $row['password'])) // checks if there are any matching fields
                {
                  $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                  $_SESSION['f_user'] = $username;
                  $_SESSION['type'] = 'fire';//set the type in a session. This serves as a global variable
                  $_SESSION['name'] = $row['name'];
                  header("location: F_profile.php"); // redirects the user to the authenticated home page
                }
                else
                {
                    Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
                    Print '<script>window.location.assign("F_login.php");</script>'; // redirects to login.php
                }
            }
        }
        else
        {
        Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
        Print '<script>window.location.assign("F_login.php");</script>'; // redirects to login.php
        }
}
?>

<?php
//session_start();
require 'connection.php';
if(isset($_POST['p_login']))
{ 
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        $query = "SELECT * from p_admin WHERE username='$username'";
        $results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
        $exists = mysqli_num_rows($results); //Checks if username exists
        if($exists==1)
        {
            while($row = mysqli_fetch_assoc($results)) //display all rows from query
            {  
                if(password_verify($password, $row['password'])) // checks if there are any matching fields
                {
                  $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                  $_SESSION['p_user'] = $username;
                  $_SESSION['type'] = 'police';//set the type in a session. This serves as a global variable
                  $_SESSION['name'] = $row['name'];
                  header("location: P_profile.php"); // redirects the user to the authenticated home page
                }
                else
                {
                    Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
                    Print '<script>window.location.assign("P_login.php");</script>'; // redirects to login.php
                }
            }
        }
        else
        {
        Print '<script>alert("Incorrect Credential, Please try again!");</script>'; //Prompts the user
        Print '<script>window.location.assign("P_login.php");</script>'; // redirects to login.php
        }
}
?>