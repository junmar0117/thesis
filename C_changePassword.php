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
            header("Location: changePassword.php?error=Old Password is required");
            exit();
        }
        else if(empty($np))
        {
            header("Location: changePassword.php?error=New Password is required");
            exit();
        }
        else if($np !== $cnp)
        {
            header("Location: changePassword.php?error=Confirmation Password doesn't match");
            exit();
        }
        else
        {
            $np = password_hash($np, PASSWORD_DEFAULT);
            
            $query = "SELECT `password` FROM civilians WHERE id = $id";
            $results = mysqli_query($con, $query);
            if(mysqli_num_rows($results) === 1)
            {
                while($row = mysqli_fetch_assoc($results)) //display all rows from query
                {  
                    if(password_verify($op, $row['password'])) // checks if there are any matching fields
                    {
                        $query1 = "UPDATE civilians SET password = '$np' WHERE id = '$id'";
                        $results1 = mysqli_query($con, $query1);
                        header("Location: changePassword.php?success=Password successfully updated");
                        exit();
                    }
                }
            }
            else
            {
                header("Location: changePassword.php?error=Incorrect Password");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>
<div class="changePWContainer">
<h3>CIVILIAN CHANGE PASSWORD</h3>

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
  <input type="password" name="old_password" placeholder="Old Password"></input>
  <input type="password" name="new_password" placeholder="New Password" id="newPW"></input>
  <input type="password" name="confirm_newpassword" placeholder="Confirm New Password"></input>
  <br>
  <input type="submit" name="submit" value="Update"></input>
</form>
</div>
</body>
</html>