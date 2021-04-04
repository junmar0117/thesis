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
    <title> Home Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profilestyles.css">
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
    <section>

    <div class="profileBox">
        <h1 style="margin-left: 7%;">PROFILE</h1>
        <form action="" method="POST">
            <div class="profilePicDiv">
                <a class="userdetailsheader">USER DETAILS</a>
                <br>
                <img src="./assets/dellyy.jpg" height="300px" width="300px">
                
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
                }
                ?>
                </table>
                <a class="editAccountCivilian" href="#">EDIT ACCOUNT</a>
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

        <div class="profileReportBtn">
            <a>REPORT INCIDENT</a>
        </div>

        <div class="profileRepHisHeader">
            <a>HISTORY</a>
        </div>

        <table class="ProfileReportHistory">

            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>View Report</th>
            </tr>
            <tr>
                <td>123456</td>
                <td>Griffin</td>
                <td>Peter</td>
                <td>04/04/2021</td>
                <td>Barangay</td>
                <td id="AdminViewProfile" href="">View</td>
            </tr>
        </table>
        </div>

        
        </form>
    </section>
</body>
</html>



