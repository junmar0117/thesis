<?php
$url = "";
$url != 'F_monitor.php';

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Report Monitoring</title>
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

    <div class="monitorHeaderContainer">
    <h1>Bureau of Fire Protection Report Monitoring</h1>
    <h2>View submitted BFP reports</h2>
    <br>
</div>
<br>
    <div style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>Status</th>
                <th>Safe Count</th>
                <th>View Report</th>            
                <th>View Record</th>
            </tr>

            <?php
            require 'connection.php';   
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $r_id = $row['report_id'];   
            }

            $querySafe = mysqli_query($con, "SELECT * from saferecords where report_id = $r_id and `safe` = 'Yes'");
            $safeCount = array();
            while($row = mysqli_fetch_array($querySafe))
            {
                $safeCount[] = $row['safe'];
            } 
            $numSafeCount = count($safeCount);      

            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Fire' ORDER BY report_id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
                <tr>
                <td><?php echo $row['report_id']  ?></td>
                <td><?php echo $row['names']  ?></td>
                <td><?php echo $row['usernames']  ?></td>
                <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status']?></td>
                <td><?php echo $numSafeCount?></td>
                <td>
                    <form action="viewReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['report_id']?>">
                        <button type="submit" class="viewReportbtn2">View</button>
                    </form>
                </td>
                <td>
                    <form action="viewRecords.php" method="POST">
                        <input type="hidden" name="report_id" value="<?php echo $row['report_id']?>">
                        <button type="submit" class="viewReportbtn2">View</button>
                    </form>
                </td>
                </tr>
            <?php
        }
        ?>
        </table>
        </div>
    </section>
</body>
</html>



