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
    <title>R & R | Bureau of Fire Protection Profile (A)</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profilestyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
    <?php
include_once('F_Userheader.html');
?>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <section class="profileSection">

    <div class="profileBox">
        
        <h1>Bureau of Fire Protection (BFP)</h1>
        <h2>Hello <?php echo $user;?>!</h2>

    <?php
if($user=="admin"){

    Print '<div class="center">';
        Print '<form action="F_profile.php" method="POST">';
                Print '<div class="txt_field">';
                    Print '<label>Name: </label>';
                    Print '<span></span>';
                    Print '<input type="text" id="name" required="required" name="name" placeholder=""><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                    Print'<label>Username: </label>';
                    Print'<span></span>';
                    Print'<input type="text" id="username" required="required" name="username" placeholder=""><br>';
                Print '</div>';

                Print' <div class="txt_field">';
                    Print'<label>Password: </label>';
                    Print'<span></span>';
                    Print'<input type="password" id="password" required="required" name="password" placeholder=""><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                    Print'<label>Position: </label>';
                     Print'<span></span>';
                     Print'<input type="text" id="position" required="required" name="position" placeholder=""><br>';
                Print '</div>';
                
                    Print'<input type="submit" name="addF" value="Add Account +"></input><br><br>';
        Print'</form>';
    Print'</div>';
}
?>
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
    <?php
if($user=="admin")
{           Print'<a class="profileRepHisHeader" style="text-align:center;">ACCOUNTS CREATED</a>';
            Print '<table class="AdminProfileTable">';
            Print '<tr>';
            Print '<th>Account ID</th>';
            Print '<th>Name</th>';
            Print '<th>Username</th>';
            Print '<th>Position</th>';
            Print '</tr>';
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from f_admin where username != 'admin' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            Print "<tr>";
            Print '<td>'. $row['id'] . "</td>";
            Print '<td>'. $row['name'] . "</td>";
            Print '<td>'. $row['username'] . "</td>";
            Print '<td>'. $row['position'] . "</td>";
            Print "</tr>";
            }
            Print '</table>';
}
else {
    Print'<a class="profileRepHisHeader" style="text-align:center;">REPORTS ASSIGNED</a>';
    Print '<table class="AdminProfileTable">';
    Print '<tr>';
    Print '<th>Account ID</th>';
    Print '<th>Name of Reporter</th>';
    Print '<th>Date Reported</th>';
    Print '<th>Concern</th>';
    Print '<th>Status</th>';
    Print '<th>Action</th>';
    Print '</tr>';
    require 'connection.php';    
    $query = mysqli_query($con, "SELECT * from reports where incident = 'Fire' "); // SQL Query
    while($row = mysqli_fetch_array($query))
    {
    Print "<tr>";
    Print '<td>'. $row['id'] . "</td>";
    Print '<td>'. $row['name'] . "</td>";
    Print '<td>'.$row['date'] ." - ".$row['time']. "</td>";
    Print '<td>'. $row['incident'] . "</td>";
    Print '<td>'. $row['status'] . "</td>";
    Print '<td id="AdminViewProfile" href="">Change Status</td>';
    Print "</tr>";
    }
    Print '</table>';

}
?>
        </div>
        </form>
    </div>
    </section>
</body>
</html>

<?php
if(isset($_POST['addF']))
{ 

	$name = ($_POST['name']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
    $password = md5($password);
    $position = ($_POST['position']);
    $bool = true;

   
	require 'connection.php';
	$query = "SELECT * from f_admin";
	$results = mysqli_query($con, $query); //Query the users table

	while($row = mysqli_fetch_array($results)) //display all rows from query    
	{
		
        $table_users = $row['name']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($name == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("This user already has an account!");</script>'; //Prompts the user
			Print '<script>window.location.assign("F_profile.php");</script>'; // redirects to register.php
		}

        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("This username has already been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("F_profile.php");</script>'; // redirects to register.php
		}
    }
    
    
        if ($bool) // checks if bool is true
        {
          mysqli_query($con, "INSERT INTO f_admin (name, username, password,position) VALUES ('$name','$username','$password', '$position')"); //Inserts the value to table users
          print '<script>alert("Firefighter User added!"); </script>'; // Prompts the user
          print '<script>window.location.assign("F_profile.php");</script>'; // redirects to register.php
        }
      
	}
?>

