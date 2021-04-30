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
    <link rel="stylesheet" href="./css/profilestyle.css">
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
    <br>
    <section>

    <div class="profileBox">
        <h1 style="margin-left: 7%;">PROFILE</h1>
            <div class="profilePicDiv">
                <a class="userdetailsheader">USER DETAILS</a>
                <br>
            
                
                <table class="profilePicTable">
                <?php
                require 'connection.php';    
                $query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                Print "<tr>";
                Print '<th class="profileInfoHeader">NAME</th>';
                Print '<td class="profileInfoContent">'. $row['name'] . "</td>";
                Print "</tr>";
                Print "<tr>";
                Print '<th class="profileInfoHeader">AGE</th>';
                Print '<td class="profileInfoContent">'. $row['age'] . "</td>";
                Print "</tr>";
                Print "<tr>";
                Print '<th class="profileInfoHeader">ACCOUNT</th>';
                Print '<td class="profileInfoContent">'."CIVILIAN" . "</td>";
                Print "</tr>";
                Print "</table>";
                Print '<a class="editAccountCivilian" href="changePassword.php?id='. $row['id'] .'">Change Password</a>';
                }
                ?>                
            </div>
            
        <table class="profileInfo">
        <a class="aboutdetailsheader">ABOUT</a>
 
        <?php
        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from civilians where username = '$user' "); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
          Print "<tr>";
          Print '<th class="profileInfoHeader">NAME</th>';
          Print '<td class="profileInfoContent">'. $row['name'] . "</td>";
          Print '<th class="profileInfoHeader">USERNAME</th>';
          Print '<td class="profileInfoContent">'. $row['username'] . "</td>";
          Print "</tr>";
          Print "<tr>";
          Print '<th class="profileInfoHeader">EMAIL</th>';
          Print '<td class="profileInfoContent">'. $row['email'] . "</td>";
          Print '<th class="profileInfoHeader">ADDRESS</th>';
          Print '<td class="profileInfoContent">'. $row['address'] . "</td>";
          Print "</tr>";
        }
		?>
        </table>

            <a href="C_reportIncident.php" class="profileReportBtn">REPORT INCIDENT</a>
            <a class="profileRepHisHeader" style="text-align:center;">INCIDENT REPORT HISTORY</a>

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
            $query = mysqli_query($con, "SELECT * from reports where username = '$user' "); // SQL Query
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
                     <button type="submit">View</button>
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



