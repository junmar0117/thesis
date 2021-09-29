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
    <title> AidPack | Safety </title>
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
include_once('Userheader.php');
?>
</nav>
    <div class="profileBox">
        <div class="profileTagcontainer2">
            <br>
            <h1>Are you Safe?</h1>
            <h2>Update your status with incidents around you.</h2>
            
        </div>
        <div style="overflow-x:auto;">
        <table class="ProfileReportHistory">
            <tr>
                <th>Report ID</th>
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

            $query = mysqli_query($con, "SELECT * from reports where status = 'In Progress' ORDER BY report_id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo $row['report_id']  ?></td>
             <td><?php echo $row['type']  ?></td>
             <td><?php echo $row['barangay']  ?></td>
             <td><?php echo $row['names']  ?></td>
             <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
             <td><?php echo $row['incident']  ?></td>
             <td><?php echo $row['status'] ?></td>
             <td>
                <form action="viewReports.php" method="POST">
                     <input type="hidden" name="id" value="<?php echo $row['report_id']?>">
                     <button class="viewReportbtn2" type="submit">View</button>
                </form>
            </td>
            <td>
            <form action="safeAction.php" method="POST">
                     <input type="hidden" name="report_id" value="<?php echo $row['report_id']?>">
                     <input type="hidden" name="c_id" value="<?php echo $user_id?>">
                     <input type="hidden" name="name" value="<?php echo $name?>">
                     <input type="radio" id="Yes" name="safe" value="Yes" required>
                     <label for="male">Yes</label>
                     <input type="radio" id="No" name="safe" value="No">
                     <label for="female">No</label>
                     <button class="viewReportbtn3" type="submit">Submit</button>
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



