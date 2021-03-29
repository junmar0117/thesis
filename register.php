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

    <form action="register.php" method="POST">
    <div class="login-box">
        <img src="./assets/signup.png" style="float:left" width="80px" height="100px">
        <h1>Sign Up</h1>

        <div class="textbox">
            <i class="fas fa-info-circle"></i>
            <input type="text" placeholder="Full Name" name="name" required="required">
        </div>

        <div class="textbox">
            <i class="fas fa-info-circle"></i>
            <input type="number" placeholder="Age" name="age" required="required">
        </div>

        <div class="textbox">
            <i class="fas fa-map-marker"></i>
            <input type="text" placeholder="Address" name="address" required="required">
        </div>

        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" required="required">
        </div>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required="required">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required="required">
        </div>

        <input type="submit" value="Register">
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
        if ($username == $table_users) // checks if there are any matching fields
        {
          $bool = false; // sets bool to false
          print '<script>alert("The username already exist!");</script>'; //Prompts the user
          print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
    
        if (strlen($username) < 4) { //username is set to minimum of 5 characters
          $bool = false; // sets bool to false
          print '<script>alert("The username must be 5 characters and above");</script>'; //Prompts the user
          print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        } // username is set to minimum of 7 characters
    
        if (preg_match('/\s/', $username)) { // whitespace will not be accepted in username
          $bool = false; // sets bool to false
          print '<script>alert("The username must not have whitespace");</script>'; //Prompts the user
          print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
    
        //password validation 
        if (strlen($password) < 7) { //password is set to mimimum of 5 characters
          $bool = false; // sets bool to false
          print '<script>alert("The password must be 8 characters and above");</script>'; //Prompts the user
          print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        } // password is set to minimum of 7 characters
    
        if (!ctype_upper($password) && !ctype_lower($password)) { //password must have lower and uppercase on it
          $bool = true; // sets bool to true
        } else {
          $bool = false; // sets bool to false
          print '<script>alert("The password must have a lower and uppercase");</script>'; //Prompts the user
          print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
    
    
        if (preg_match('~[0-9]+~', $password)) { // check if there is/are numbers in string
          $bool = true; // sets bool to true
        } else {
          $bool = false; // sets bool to false
          print '<script>alert("The password must have 1 or more numbers");</script>'; //Prompts the user
          print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
    
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) { // one or more of the 'specialcharacters' found in $string
          $bool = true; // sets bool to true
        } else {
          $bool = false; // sets bool to false
          print '<script>
      alert("The password must have 1 or more special characters");
      </script>'; //Prompts the user
          print '<script>
      window.location.assign("register.php");
      </script>'; // redirects to register.php
        }
    
    
        if ($bool) // checks if bool is true
        {
          mysqli_query($con, "INSERT INTO civilians (name, age, address,email,username, password) VALUES
      ('$username','$password')"); //Inserts the value to table users
          print '<script>
      alert("Successfully Registered!");
      </script>'; // Prompts the user
          print '<script>
      window.location.assign("register.php");
      </script>'; // redirects to register.php
        }
      
	}
	
}
?>


