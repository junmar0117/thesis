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
    <title>R & R | Local Barangay Profile (A)</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profilestyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
    <?php
include_once('B_Userheader.html');
?>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <section class="profileSection">

    <div class="profileBox">

    <h1>Local Barangay</h1>
    <a>USER: <?php echo $user;?></a>
    <br>
    <br>
    
<?php
if($user=="admin")
{

    Print '<div class="adminAccAdd">';
        Print '<form action="B_profile.php" method="POST">';
                Print '<div class="txt_field">';
                    Print '<span></span>';
                    Print '<input type="text" id="name" required="required" name="name" placeholder="Name "><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                    Print'<span></span>';
                    Print'<input type="text" id="username" required="required" name="username" placeholder="Username "><br>';
                Print '</div>';

                Print' <div class="txt_field">';
                    Print'<span></span>';
                    Print'<input type="password" id="password" required="required" name="password" placeholder="Password"><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                     Print'<span></span>';
                     Print'<input type="text" id="position" required="required" name="position" placeholder="Position "><br>';
                Print '</div>';
                
                    Print'<input class="adminAddAccbtn" type="submit" name="addP" value="Add Account +"></input><br><br>';
        Print'</form>';
    Print'</div>';
}
?>
  <button onclick="document.getElementById('id01').style.display='block'" class="adminAddSchedbtn">Add Schedule</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="" method="POST">
            <br>
            <br>
            <div class="txt_field">
                
                <input type="text" id="name" required="required" name="name" placeholder="ID"><br>
            </div>    
            <div class="txt_field">
                
                <input type="text" id="username" required="required" name="username" placeholder="Name"><br>
            </div>
            <div class="txt_field">
                
                <input type="text" id="position" required="required" name="position" placeholder="Position"><br>
            </div>
            <div class="txt_field">
                
                <input type="datetime-local" id="birthdaytime" name="birthdaytime" placeholder="Date/Time">
            </div>     
                <input class="adminAddAccbtn" type="submit" value="Add"></input><br><br>   
        </form>
      </div>
    </div>
  </div>
</div>
   
    <br>
    <br>
    <div>
        </div>
<?php
if($user=="admin")
{
            Print '<h2 class="adminCreatedAccHead">ACCOUNTS CREATED</h2>';
            Print '<table class="AdminProfileTable">';
            Print '<tr>';
            Print '<th>Account ID</th>';
            Print '<th>Name</th>';
            Print '<th>Username</th>';
            Print '<th>Position</th>';
            Print '</tr>';
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from b_admin where username != 'admin' "); // SQL Query
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
    Print '<h2 class="adminCreatedAccHead">REPORTS ASSIGNED</h2>';
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
    $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' "); // SQL Query
    while($row = mysqli_fetch_array($query))
    {
    ?>
        <tr>
        <td><?php echo $row['id']  ?></td>
        <td><?php echo $row['name']  ?></td>
        <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
        <td><?php echo $row['incident']  ?></td>
        <td><?php echo $row['status'] ?></td>
        <td>
            <form action="viewReports.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                <button type="submit">View</button>
            </form>
        </td>
        </tr>
    
    <?php
}
}
?>
</table>
        </div>
    </div>
    </section>
</body>
</html>

<?php
if(isset($_POST['addB']))
{ 

	$name = ($_POST['name']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
    $password = md5($password);
    $position = ($_POST['position']);
    $bool = true;

   
	require 'connection.php';
	$query = "SELECT * from b_admin";
	$results = mysqli_query($con, $query); //Query the users table

	while($row = mysqli_fetch_array($results)) //display all rows from query    
	{
		
        $table_users = $row['name']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($name == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("This user already has an account!");</script>'; //Prompts the user
			Print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
		}

        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("This username has already been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
		}
    }
    
    
        if ($bool) // checks if bool is true
        {
          mysqli_query($con, "INSERT INTO b_admin (name, username, password,position) VALUES ('$name','$username','$password', '$position')"); //Inserts the value to table users
          print '<script>alert("Barangay User added!"); </script>'; // Prompts the user
          print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
        }
      
	}
?>