
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Civilian Register </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/C_register_login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav>
    <?php
        include_once('header.html');
    ?>
    </nav>
    
    <div class="register-box">
        <h2>Create your Account</h2>
        
        <form action="C_register.php" method="POST">
        <div class="register-box2">
            <input type="text" id="name" required="required" name="name" placeholder="">
            <label>Enter Name</label>
        </div>

        <div class="register-box2">
            <input type="int" id="age" required="required" name="age" placeholder="">
            <label>Enter Age</label>
        </div>

        <div class="register-box2">
            <input type="text" id="address" required="required" name="address" placeholder="">
            <label>Enter Home Address</label>
        </div>

        <div class="register-box2">
            <input type="text" id="email" required="required" name="email" placeholder="">
            <label>Enter Email</label>
        </div>

        <div class="register-box2">
            <input type="text" id="username" required="required" name="username" placeholder="">
            <label>Enter Username</label>
        </div>

        <div class="register-box2">
            <input type="password" id="password" required="required" name="password" placeholder="">
            <label>Enter Password</label>
        </div>

            <input type="submit" value="Register" class="C_registerbtn">
            <a href="C_login.php" id="signininstead">Already have an account? Log in here.</a>
        </form>
        </div>
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
    $password = md5($password);
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
          mysqli_query($con, "INSERT INTO civilians (name, age, address,email,username, password) VALUES ('$name','$age','$address','$email','$username','$password')"); //Inserts the value to table users
          print '<script>alert("Successfully Registered!"); </script>'; // Prompts the user
          print '<script>window.location.assign("C_login.php");</script>'; // redirects to register.php
        }
      
	}
?>


