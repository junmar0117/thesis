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
    <title> R & R |  </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/C_profilestyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
<?php
include_once('Userheader.html');
?>
</nav>
    <br>
    <br>
    <br>
    <br>
    <div class="profileBox">
        <h1 style="margin-left: 5%;">RECORDS</h1>
            <div class="profilePicDiv">
        <div style="overflow=x:auto;">
        <table class="ProfileReportHistory">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Report ID</th>
                <th>Safe?</th>
            </tr>
            <?php
            require 'connection.php';    
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $r_id = $_POST['report_id'];
            }  
            $query = mysqli_query($con, "SELECT * from saferecords where report_id = $r_id"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo $row['c_id']  ?></td>
             <td><?php echo $row['name']  ?></td>
             <td><?php echo $row['report_id']?></td>
             <td><?php echo $row['safe']  ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
</body>
</html>



