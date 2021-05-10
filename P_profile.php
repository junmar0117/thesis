<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='police')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='barangay'){ 
    header("location:B_profile.php ");//checks if user is barangay account
}
if($_SESSION['type']=='fire'){ 
    header("location:F_profile.php ");//checks if user is fire account
}
if($_SESSION['type']=='civilian'){ 
    header("location:C_profile.php "); //checks if user is civilian account
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
    <link rel="stylesheet" href="./css/BFP_profilestyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        <a>USER: <?php echo $user;?></a>
    <br>
    <br>
    
    <?php
    if($user=="p_admin")
    {

    Print '<div class="adminAccAdd">';
        Print '<form action="P_profile.php" method="POST">';
                Print '<div class="txt_field">';
                    Print '<span></span>';
                    Print '<input type="text" id="name" required="required" name="name" placeholder="Name: "><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                    Print'<span></span>';
                    Print'<input type="text" id="username" required="required" name="username" placeholder="Username: "><br>';
                Print '</div>';

                Print' <div class="txt_field">';
                    Print'<span></span>';
                    Print'<input type="password" id="password" required="required" name="password" placeholder="Password: "><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                     Print'<span></span>';
                     Print'<input type="text" id="position" required="required" name="position" placeholder="Position: "><br>';
                Print '</div>';
                
                    Print'<input  class="adminAddAccbtn" type="submit" name="addP" value="Add Account +"></input><br><br>';
        Print'</form>';
    Print'</div>';
}
?>
    <?php
if($user=="p_admin")
{
            //Accounts Created by Administrator        
            Print  '<br>';
            Print '<h2 class="adminCreatedAccHead">ACCOUNTS CREATED</h2>';
            Print '<div style="overflow-x:auto;">';
            Print '<table class="AdminProfileTable">';
            Print '<tr>';
            Print '<th>Account ID</th>';
            Print '<th>Name</th>';
            Print '<th>Username</th>';
            Print '<th>Position</th>';
            Print '</tr>';
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from p_admin where username != 'p_admin' "); // SQL Query
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
            Print '</div>';

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
    ?>
    <?php
    require 'connection.php';    
    $query = mysqli_query($con, "SELECT * from reports where incident = 'Police' ORDER BY id DESC"); // SQL Query
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


