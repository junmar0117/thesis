<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> Sign Up </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">R&R</label>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
            <li><a href="#">HOME</a></li>
        </ul>
    </nav>

  
    <div class="login-box">
    <img src="./assets/signup.png" style="float:left" width="80px" height="100px">
        
        <h1>Sign Up</h1>
        <form action="register.php" method="POST">
            <input type="text" id="name" required="required" name="name" placeholder="Enter Name"><br>
            <input type="int" id="age" required="required" name="age" placeholder="Enter Age"><br>
            <input type="text" id="address" required="required" name="address" placeholder="Enter Address"><br>
            <input type="email" id="email" required="required" name="email" placeholder="Enter Email"><br>
            <input type="text" id="username" required="required" name="username" placeholder="Enter Username"><br>
            <input type="password" id="password" required="required" name="password" placeholder="Enter Password"><br>
            <input type="submit" value="Register"><br>
            <a href="login.php">Have an Account? Login Here!</a>
        </form>
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
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
    }
    
    
        if ($bool) // checks if bool is true
        {
          mysqli_query($con, "INSERT INTO civilians (name, age, address,email,username, password) VALUES ('$name','$age','$address','$email','$username','$password')"); //Inserts the value to table users
          print '<script>alert("Successfully Registered!"); </script>'; // Prompts the user
          print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
      
	}
?>


