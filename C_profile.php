<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='civilian')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='barangay'){ 
    header("location:B_profile.php ");//checks if user is barangay account
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | Civilian Profile </title>
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
        <div class="profileTagcontainer">
            <?php
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
            <h1><?php echo $row['username']?></h1>
                        
            <?php
            }
            ?>
                
                    <form action="C_changePassword.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $civID?>">
                        <button class="viewReportbtn" type="submit">Change Password </button><i class="fas fa-caret-down" style="padding-left: 5px;"></i>
                    </form>
                    <hr>
                    <a class="userdetailsheader">User Details</a>       
                    <hr>
                <table class="profileInfo">
                    <?php
                    require 'connection.php';    
                    $query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
                    while($row = mysqli_fetch_array($query))
                        {
                            $civID = $row['id'];
                            Print "<tr>";
                            Print '<th class="profileInfoHeader">Name</th>';
                            Print '<td class="profileInfoContent">'. $row['name'] . "</td>";
                            Print '<th class="profileInfoHeader">Username</th>';
                            Print '<td class="profileInfoContent">'. $row['username'] . "</td>";
                            Print "</tr>";
                            Print "<tr>";
                            Print '<th class="profileInfoHeader">Age</th>';
                            Print '<td class="profileInfoContent">'. $row['age'] . "</td>";
                            Print '<th class="profileInfoHeader">Email</th>';
                            Print '<td class="profileInfoContent">'. $row['email'] . "</td>";
                            Print "</tr>";
                            Print "<tr>";
                            Print '<th class="profileInfoHeader">Account Type</th>';
                            Print '<td class="profileInfoContent">'."Civilian" . "</td>";
                            Print '<th class="profileInfoHeader">Verification</th>';
                            if($row['verified'] == 1)
                            {
                                echo '<td class="profileInfoContent">VERIFIED</td>';
                            }
                            else
                            {
                                echo '<td class="profileInfoContent"><a href="getVerified.php"><button class="btn-subscribe">Get Verified</button></a></td>';
                            }
                            Print "</tr>";
                            Print "<tr>";
                            Print '<th class="profileInfoHeader">Address</th>';
                            Print '<td class="profileInfoContent">'. $row['address'] . "</td>";
                            Print "</tr>";
                            Print "</table>";
                        
                        }
		            ?>
                    <br>
                    
                    </div>
            <br>
            <div>
                <?php
                $query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['verified'] == 1)
                    {
                        echo '<a href="C_reportIncident.php" class="profileReportBtn">REPORT INCIDENT <i class="fas fa-unlock-alt" style="padding-left: 5px;"></i></a>';
                    }
                    else
                    {
                        echo '<a class="profileReportBtnDisabled">REPORT INCIDENT <i class="fas fa-user-lock" style="padding-left: 5px;"></i></a>';
                        
                    }
                }
                ?>
            </div>
                <br>
            <div class="profileRepHisHeader" style="text-align:right;">
                <a> Report History</a>
                <br>
                <br>
            </div>
            
        <div style="overflow-x:auto;">
        <table class="ProfileReportHistory">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Date Reported</th>
                <th>Concern</th>
                <th>Status</th>
                <th>View Report</th>
            </tr>
            <?php
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where usernames = '$user' ORDER BY report_id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo $row['id']  ?></td>
             <td><?php echo $row['name']  ?></td>
             <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
             <td><?php echo $row['incident']  ?></td>
             <td><?php echo $row['status'] ?></td>
             <td>
                <form action="viewReports.php" method="POST">
                     <input type="hidden" name="id" value="<?php echo $row['id']?>">
                     <button class="viewReportbtn" type="submit">View</button>
                </form>
            </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
</body>
</html>



