<?php
session_start();
if($_SESSION['user']){ //checks if user is logged in
}else{
  header("location:index.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
//$id = $_SESSION['id']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Philippine National Police Profile (A)</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profilestyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
    <?php
include_once('P_Userheader.html');
?>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <section class="profileSection">

    <div class="profileBox"> 
        <h1>Philippine National Police (PNP)</h1>
        <div class="center">
        <form action="P_profile.php" method="POST">
            <div class="txt_field">
                <label>Name: </label>
                <span></span>
                <input type="text" id="name" required="required" name="name" placeholder=""><br>
            </div>    
            <div class="txt_field">
                <label>Username: </label>
                <span></span>
                <input type="text" id="username" required="required" name="username" placeholder=""><br>
            </div>
            <div class="txt_field">
                <label>Password: </label>
                <span></span>
                <input type="password" id="password" required="required" name="password" placeholder=""><br>
            </div>
            <div class="txt_field">
                <label>Position: </label>
                <span></span>
                <input type="text" id="position" required="required" name="position" placeholder=""><br>
            </div>
                <input type="submit" name="addP" value="Add Account +"></input><br><br>   
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        <table class="AdminProfileTable">
            <tr>
                <th>Account ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>View Profile</th>
                <th>Delete Profile</th>
            </tr>
            <tr>
                <td>123456</td>
                <td>Griffin</td>
                <td>Peter</td>
                <td>04/04/2021</td>
                <td id="AdminViewProfile" href="">View</td>
                <td id="AdminDelProfile" href="">Delete</td>
            </tr>
        </table>
        </div>
        </form>
    </div>
    </section>
</body>
</html>

<?php
if(isset($_POST['addP']))
{ 

	$name = ($_POST['name']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
    $password = md5($password);
    $position = ($_POST['position']);
    $bool = true;

   
	require 'connection.php';
	$query = "SELECT * from p_admin";
	$results = mysqli_query($con, $query); //Query the users table

	while($row = mysqli_fetch_array($results)) //display all rows from query    
	{
		
        $table_users = $row['name']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($name == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("This user already has an account!");</script>'; //Prompts the user
			Print '<script>window.location.assign("P_profile.php");</script>'; // redirects to register.php
		}

        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("This username has already been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("P_profile.php");</script>'; // redirects to register.php
		}
    }
    
    
        if ($bool) // checks if bool is true
        {
          mysqli_query($con, "INSERT INTO p_admin (name, username, password,position) VALUES ('$name','$username','$password', '$position')"); //Inserts the value to table users
          print '<script>alert("Police User added!"); </script>'; // Prompts the user
          print '<script>window.location.assign("P_profile.php");</script>'; // redirects to register.php
        }
      
	}
?>


