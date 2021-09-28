
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Civilian Register </title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/C_register_login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    
    <nav>
    <?php
        include_once('header.php');
    ?>
    </nav>
    <table class="rlcontain">
        <tr>
            <th class="rlinfo">
                <h1 class="rlch1">Hello, Citizen!</h1>
                <h2 class="rlch2">Create your account to access and report with R&R.</h2>
            </th>
                <td class="register-box">
    <div >
        <h2 class="rlch1">Create Account</h2>
        
        <form action="C_register.php" method="POST">
            
        <div class="register-box2">
        <label>Enter Name</label>
            <input type="text" id="name" required="required" name="name" placeholder="">
            
        </div>

        <div class="register-box2">
        <label>Enter Age</label>
            <input type="int" id="age" required="required" name="age" placeholder="">
           
        </div>

        <div class="register-box2">
        <label>Enter Home Address</label>
            <input type="text" id="address" required="required" name="address" placeholder="">
            
        </div>

        <div class="register-box2">
        <label>Enter Email</label>
            <input type="text" id="email" required="required" name="email" placeholder="">
            
        </div>

        <div class="register-box2">
        <label>Enter Username</label>
            <input type="text" id="username" required="required" name="username" placeholder="">
            
        </div>

        <div class="register-box2">
        <label>Enter Password</label>
            <input type="password" id="password" required="required" name="password" placeholder="">
            
        </div>

        <div class="register-box2">
        <label>Confirm Password</label>
            <input type="password" id="cpassword" required="required" name="cpassword" placeholder="">
            
        </div>
<br>
            <input type="submit" value="Register" class="C_registerbtn">
            <a href="C_login.php" id="signininstead">Already have an account? Log in here.</a>
        </form>
    </div>
</td>
</tr>
</table>
<div class="footer3">
          </div>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = ($_POST['name']);
	$age = ($_POST['age']);
	$address = ($_POST['address']);
	$email = ($_POST['email']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
    
    $bool = true;

   
	require 'connection.php';
	$query = "SELECT * from civilians";
	$results = mysqli_query($con, $query); //Query the users table

	while($row = mysqli_fetch_array($results)) //display all rows from query    
	{
		
        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("C_register.php");</script>'; // redirects to register.php
		}
    }
    
    
        if ($bool) // checks if bool is true
        {
          if($password === $cpassword)
          {
          $password = password_hash($password, PASSWORD_DEFAULT);
          mysqli_query($con, "INSERT INTO civilians (name, age, address,email,username, password) VALUES ('$name','$age','$address','$email','$username','$password')"); //Inserts the value to table users
          print '<script>alert("Successfully Registered!"); </script>'; // Prompts the user
          print '<script>window.location.assign("C_login.php");</script>'; // redirects to register.php
          }
          else
          {
            print '<script>alert("Password did not match! Please Try Again!"); </script>'; // Prompts the user
            print '<script>window.location.assign("C_login.php");</script>'; // redirects to register.php
          }
        }
      
	}
?>


