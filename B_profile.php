<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='barangay')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='civilian'){ 
    header("location:C_profile.php ");//checks if user is civilian account
}
if($_SESSION['type']=='fire'){ 
    header("location:F_profile.php ");//checks if user is fire account
}
if($_SESSION['type']=='police'){ 
    header("location:P_profile.php "); //checks if user is police account
}

$user = $_SESSION['user']; //assigns user value
//$id = $_SESSION['id']; 
?>
<?php
    require 'connection.php';    
    $query = mysqli_query($con, "SELECT * from b_admin where username = '".$_SESSION['user']."'"); // SQL Query
    while($row = mysqli_fetch_array($query))
    {
        $b_id = $row['id'];
        $position =$row['position'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>AidPack | Barangay Profile </title>
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
include_once('B_Userheader.php');
?>
    </nav>
    
    <section class="profileSection">

    <div class="profileBox">
    <div class="profileTagcontainer">
    <h1><?php echo $user;?></h1>
    <h2><?php echo $position;?></h2>
    <form action="B_changePassword.php" method="GET">
    <input type="hidden" name="id" value="<?php echo $b_id;?>">
    <button class="viewReportbtn" type="submit">Change Password</button><i class="fas fa-caret-down" style="padding-left: 5px;"></i>
    </form>
    <br>
</div>
    </div>
    <div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'Accounts')">Accounts</button>
  <button class="tablinks" onclick="openCity(event, 'Reports')">Reports</button>
</div>
<?php
if($user=="b_admin")
{
    Print '<div class="tabcontent" id="Accounts">';
    Print '<div class="adminAccAdd">';
    print '<table class="addAccTable">';
    print '<tr>';
    print '<td class="aaaHead">';
    Print '<h1>Add Account </h1>';
    Print '<h2>Input account information</h2>';
    print '</td>';
    print '<td class="aaaHead2">';
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

                Print' <div class="txt_field">';
                    Print'<span></span>';
                    Print'<input type="password" id="password" required="required" name="cpassword" placeholder="Confirm Password"><br>';
                Print '</div>';

                Print'<div class="txt_field">';
                     Print'<span></span>';
                     Print'<input type="text" id="position" required="required" name="position" placeholder="Position "><br>';
                Print '</div>';
                print '<hr>';
                    Print'<input class="adminAddAccbtn" type="submit" name="addB" value="Add Account +"></input><br>';
        Print'</form>';
        Print'</td>';
        Print'</tr>';
        Print'</table>';
    Print'</div>';
    print '<hr>';
}
?>


  <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

  <!--- <div id="id01" class="w3-modal"> 
    //<div class="w3-modal-content">
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
--->
    
<?php
if($user=="b_admin")
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
            $query = mysqli_query($con, "SELECT * from b_admin where username != 'b_admin' "); // SQL Query
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
            ?>
            </div>
            <div id="Reports" class="tabcontent">
            <h2 class="adminCreatedAccHead">Reports</h2>
            <div style="overflow-x:auto;">
            <table class="AdminProfileTable">
            <tr>
            <th>Report ID</th>
            <th>Name of Reporter</th>
            <th>Date Reported</th>
            <th>Concern</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            <br>
            <?php
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' AND status = 'In Progress' OR incident = 'Barangay' AND status = 'Needs Attention' ORDER BY report_id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
            
                <tr>
                <td><?php echo $row['report_id']  ?></td>
                <td><?php echo $row['names']  ?></td>
                <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                    <form action="viewReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['report_id']?>">
                        <button type="submit">View</button>
                    </form>
                </td>
                </tr>
            <?php
            }
            Print '</table>';
            Print '</div>';
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
    $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' AND status = 'In Progress' OR incident = 'Barangay' AND status = 'Needs Attention' ORDER BY report_id DESC"); // SQL Query
    while($row = mysqli_fetch_array($query))
    {
    ?>
        <tr>
        <td><?php echo $row['report_id']  ?></td>
        <td><?php echo $row['names']  ?></td>
        <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
        <td><?php echo $row['incident']  ?></td>
        <td><?php echo $row['status'] ?></td>
        <td>
            <form action="viewReports.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['report_id']?>">
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
    </div>
    </section>
    <br>
</body>
</html>

<?php
if(isset($_POST['addB']))
{ 

	$name = ($_POST['name']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
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
          if($password === $cpassword)
          {
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($con, "INSERT INTO b_admin (name, username, password,position) VALUES ('$name','$username','$password', '$position')"); //Inserts the value to table users
            print '<script>alert("Barangay User added!"); </script>'; // Prompts the user
            print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
          }
          else
          {
            print '<script>alert("Password did not match! Please Try Again!"); </script>'; // Prompts the user
            print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
          }
        }
      
	}
?>