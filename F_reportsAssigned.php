<?php
$url = "";
$url != 'F_reportsAssigned.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: F_profile.php'); //redirect to some other page
  exit();
}
?>
<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='fire')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='barangay'){ 
    header("location:B_profile.php ");//checks if user is barangay account
}
if($_SESSION['type']=='civilian'){ 
    header("location:C_profile.php ");//checks if user is civilian account
}
if($_SESSION['type']=='police'){ 
    header("location:P_profile.php "); //checks if user is police account
}

$user = $_SESSION['user']; //assigns user value
//$id = $_SESSION['id']; 
?>
<?php
    require 'connection.php';    
    $query = mysqli_query($con, "SELECT * from f_admin where username = '".$_SESSION['user']."'"); // SQL Query
    while($row = mysqli_fetch_array($query))
    {
        $f_id = $row['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>AidPack | Assigned</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFP_profilestyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <nav>
    <?php
include_once('F_Userheader.php');
?>
    </nav>
    <section class="profileSection">

    <div class="profileBox">
    <div class="profileTagcontainer">
    <h1><?php echo $user;?></h1>
        <h2>Bureau of Fire Protection (BFP) Administrator Account</h2>

    <form action="F_changePassword.php" method="GET">
        <input type="hidden" name="id" value="<?php echo $f_id;?>">
        <button class="viewReportbtn" type="submit">Change Password</button><i class="fas fa-caret-down" style="padding-left: 5px;"></i>
    </form>
    <br>
</div>
</div>
<br>
    <?php
    //Admin - Add Account
    if($user=="f_admin"){

        Print '<div class="adminAccAdd">';
        print '<table class="addAccTable">';
        print '<tr>';
        print '<td class="aaaHead">';
        Print '<h1>Add Account </h1>';
        Print '<h2>subhead</h2>';
        print '</td>';
        print '<td class="aaaHead2">';
        Print '<form action="F_profile.php" method="POST">';
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

                Print' <div class="txt_field">';
                    Print'<span></span>';
                    Print'<input type="password" id="password" required="required" name="cpassword" placeholder="Confirm Password: "><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                     Print'<span></span>';
                     Print'<input type="text" id="position" required="required" name="position" placeholder="Position: "><br>';
                Print '</div>';
                print '<hr>';
                    Print'<input  class="adminAddAccbtn" type="submit" name="addF" value="Add Account +"></input><br><br>';
                    Print'</form>';
                    Print'</td>';
                    Print'</tr>';
                    Print'</table>';
                Print'</div>';
                Print'</div>';
                print '<hr>';
}
?>
    <?php
if($user=="f_admin")
{           
            //Accounts Created by Administrator        
            
            Print '<h2 class="adminCreatedAccHead">Accounts</h2>';
            Print '<div style="overflow-x:auto;">';
            Print '<table class="AdminProfileTable">';
            Print '<tr>';
            Print '<th>Account ID</th>';
            Print '<th>Name</th>';
            Print '<th>Username</th>';
            Print '<th>Position</th>';
            Print '</tr>';
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from f_admin where username != 'f_admin' "); // SQL Query
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
    Print'<h2 class="adminCreatedAccHead">REPORTS ASSIGNED</h2>';
    Print '<table class="AdminProfileTable">';
    Print '<tr>';
    Print '<th>Assigned ID</th>';
    Print '<th>Name of Reporter</th>';
    Print '<th>Date Reported</th>';
    Print '<th>Concern</th>';
    Print '<th>Status</th>';
    Print '<th>Action</th>';
    Print '</tr>';
    require 'connection.php';    
    $query = mysqli_query($con, "SELECT * from reports INNER JOIN f_assigned ON reports.report_id = f_assigned.report_id where f_id = $f_id"); // SQL Query
    while($row = mysqli_fetch_array($query))
    {
    ?>
        <tr>
        <td><?php echo $row['id']  ?></td>
        <td><?php echo $row['names']  ?></td>
        <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
        <td><?php echo $row['incident']  ?></td>
        <td><?php echo $row['status'] ?></td>
        <td>
             <!-- Trigger/Open The Modal -->
<button id="myBtn" class="brabtn">False Alarm</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Are you sure you want to delete this and mark as false?</p>
    <table class="backcontab">
        <tr>
            <td></td>
            <td><button class="brabtn" onclick="document.location='F_reportsAssigned.php'">Back</button></td>
            <td><form action="F_falseReport.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['report_id']?>">
                <input type="hidden" name="assigned_id" value="<?php echo $row['id']?>">
                <button  class="brabtn" type="submit">Confirm</button>
            </form>
            </td>
    <td></td>
    </tr>
    </table>
  </div>

</div>
            
            <form action="<?php if($row['type'] == "House Fire"){echo "completeReport_fire.php";}else if($row['type'] == "Establishment Fire"){echo "completeReport_fire.php";}?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['report_id']?>">
                <input type="hidden" name="assigned_id" value="<?php echo $row['id']?>">
                <input type="hidden" name="f_id" value="<?php echo $f_id;?>">
                <button class="brabtn" type="submit">Complete</button>
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
    <br>
    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>

<?php
if(isset($_POST['addF']))
{ 

	$name = ($_POST['name']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
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
          if($password === $cpassword)
          {
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($con, "INSERT INTO f_admin (name, username, password,position) VALUES ('$name','$username','$password', '$position')"); //Inserts the value to table users
            print '<script>alert("Firefighter User added!"); </script>'; // Prompts the user
            print '<script>window.location.assign("F_profile.php");</script>'; // redirects to register.php
          }
          else
          {
            print '<script>alert("Password did not match! Please Try Again!"); </script>'; // Prompts the user
            print '<script>window.location.assign("F_profile.php");</script>'; // redirects to register.php
          }
        }
      
	}
?>

