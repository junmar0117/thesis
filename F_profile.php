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
    <link rel="stylesheet" href="./css/profilestyles.css">
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
        
        <div class="center">
        <form action="" method="POST">
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
                <input type="button" value="Add Account +"></input><br><br>   
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



