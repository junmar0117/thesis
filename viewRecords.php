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
    <title> R & R | View Records </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/C_profilestyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<nav>
<?php 
require 'connection.php'; 
$sql_b = "SELECT * FROM b_admin where username = '$user' ";
$row_b = mysqli_query($con, $sql_b);

$sql_f = "SELECT * FROM f_admin where username = '$user' ";
$row_f = mysqli_query($con, $sql_f);

$sql_p = "SELECT * FROM p_admin where username = '$user' ";
$row_p = mysqli_query($con, $sql_p);

if(mysqli_num_rows($row_b) > 0)    
{       
        Print '<nav>';
        include_once('B_Userheader.html');
        Print '</nav>';
}else if(mysqli_num_rows($row_f) > 0)
{
    Print '<nav>';
    include_once('F_Userheader.html');
    Print '</nav>';
}else if(mysqli_num_rows($row_p) > 0)
{
    Print '<nav>';
    include_once('P_Userheader.html');
    Print '</nav>';
}else{
    include_once('Userheader.html');
}
?>
</nav>
    
    <div class="profileBox">
    <div class="profileTagcontainer2">
    <br>
        <h1>Records</h1>
        <h2>View updated records.</h2>
            
        </div>

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
        </div>
</body>
</html>



