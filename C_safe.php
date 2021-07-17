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
    <title> R & R | Safety </title>
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
        <div class="profileTagcontainer">
            <br>
            <h1>ARE YOU SAFE?</h1>
            <br>
        </div>
        <div style="overflow-x:auto;">
        <table class="ProfileReportHistory">
            <tr>
                <th>Incident</th>
                <th>Barangay</th>
                <th>Name of Reporter</th>
                <th>Date Reported</th>
                <th>Concern</th>
                <th>Status</th>
                <th>View Report</th>
                <th>Safe?</th>
            </tr>
            <?php
            require 'connection.php';   

            $query1 = mysqli_query($con, "SELECT * from civilians where username = '$user'"); // SQL Query
            while($row = mysqli_fetch_array($query1))
            {
                $user_id = $row['id'];   
                $name = $row['name'];
            }

            $query = mysqli_query($con, "SELECT * from reports ORDER BY id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo $row['type']  ?></td>
             <td><?php echo $row['barangay']  ?></td>
             <td><?php echo $row['name']  ?></td>
             <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
             <td><?php echo $row['incident']  ?></td>
             <td><?php echo $row['status'] ?></td>
             <td>
                <form action="viewReports.php" method="POST">
                     <input type="hidden" name="id" value="<?php echo $row['id']?>">
                     <button class="viewReportbtn2" type="submit">View</button>
                </form>
            </td>
            <td>
            <form action="safeAction.php" method="POST">
                     <input type="hidden" name="report_id" value="<?php echo $row['id']?>">
                     <input type="hidden" name="c_id" value="<?php echo $user_id?>">
                     <input type="hidden" name="name" value="<?php echo $name?>">
                     <input type="radio" id="Yes" name="safe" value="Yes">
                     <label for="male">Yes</label>
                     <input type="radio" id="No" name="safe" value="No">
                     <label for="female">No</label>
                     <button class="viewReportbtn" type="submit">Submit</button>
            </form>
            </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
        </div>
</body>
</html>



