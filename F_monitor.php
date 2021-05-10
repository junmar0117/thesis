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
    <title> R & R | </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFP_profilestyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
    <?php
    include_once('F_Userheader.html');
    ?>
    </nav>
    <section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2>BUREAU OF FIRE PROTECTION REPORT MONITORING</h2>
    <div style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>Status</th>
                <th>View Report</th>
            </tr>
            <?php
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Fire' ORDER BY id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
                <tr>
                <td><?php echo $row['id']  ?></td>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['username']  ?></td>
                <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status']?></td>
                <td>
                    <form action="viewReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn">View</button>
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



