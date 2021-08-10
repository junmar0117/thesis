<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require "connection.php"; // Using database connection file here

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    require "connection.php";
    $id = $_GET['id']; // get id through query string

    if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_newpassword']))
    {
        $op = $_POST['old_password'];
        $np = $_POST['new_password'];
        $cnp = $_POST['confirm_newpassword'];

        if(empty($op))
        {
            header("Location: P_changePassword.php?error=Old Password is required");
            exit();
        }
        else if(empty($np))
        {
            header("Location: P_changePassword.php?error=New Password is required");
            exit();
        }
        else if($np !== $cnp)
        {
            header("Location: P_changePassword.php?error=Confirmation Password doesn't match");
            exit();
        }
        else
        {
            $np = password_hash($np, PASSWORD_DEFAULT);
            
            $query = "SELECT `password` FROM p_admin WHERE id = $id";
            $results = mysqli_query($con, $query);
            if(mysqli_num_rows($results) === 1)
            {
                while($row = mysqli_fetch_assoc($results)) //display all rows from query
                {  
                    if(password_verify($op, $row['password'])) // checks if there are any matching fields
                    {
                        $query1 = "UPDATE p_admin SET `password` = '$np' WHERE id = '$id'";
                        $results1 = mysqli_query($con, $query1);
                        header("Location: P_changePassword.php?success=Password successfully updated");
                        exit();
                    }
                }
            }
            else
            {
                header("Location: P_changePassword.php?error=Incorrect Password");
                exit();
            }
        }
    }
}
?>

<head>
    <meta charset = "utf-8">
    <title> Change Password | R & R</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/changePW.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
<nav>
<?php
include_once('P_Userheader.html');
?>
</nav>

<table class="changePWContainer">
<tr>
            <th class="rlinfo">
                <h1 class="rlch1">Change password?</h1>
                <h2 class="rlch2">Create a unique and strong password.</h2>
            </th>
            <td class="changePWContainer2">
<h3>Police Change Password</h3>
<h4>Include numbers, symbols, uppercase and lowercase letters</h4>
<hr>
<form method="POST">
          <?php 
						if(isset($_GET['error']))
						{
					?>
					<h3><?php echo $_GET['error']; ?></h1>
					<?php
						}
					?>

					<?php 
						if(isset($_GET['success']))
						{
					?>
					<h4><?php echo $_GET['success']; ?></h1>
					<?php
						}
					?>
  <input type="password" name="old_password" placeholder="Old Password" required></input>
  <input type="password" name="new_password" placeholder="New Password" required></input>
  <input type="password" name="confirm_newpassword" placeholder="Confirm New Password" required></input>
  <hr>
  <input type="submit" name="submit" value="Update"></input>
</form>

</td>
                    </tr>
                    </table>
                    <div class="footer2">
              <br>
          </div> 
</body>
</html>