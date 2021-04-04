<?php
//$user = $_SESSION['user'];
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
                    <tr>
                        <th class="profileInfoHeader">NAME</th>
                        <td class="profileInfoContent">bugabuga</td>
                    </tr>
                    <tr>
                        <th class="profileInfoHeader">AGE</th>
                        <td class="profileInfoContent">69</td>
                    </tr>
                    <tr>
                        <th class="profileInfoHeader">ACCOUNT</th>
                        <td class="profileInfoContent">Civilian</td>
                    </tr>
                </table>
                <a class="editAccountCivilian" href="#">EDIT ACCOUNT</a>
            </div>
            
        <table class="profileInfo">
        <a class="aboutdetailsheader">ABOUT</a>
            <tr>
                <th class="profileInfoHeader">NAME</th>
                <td class="profileInfoContent">bugabuga</td>
                <th class="profileInfoHeader">USERNAME</th>
                <td class="profileInfoContent">Griffin</td>
            </tr>
            <tr>
                <th class="profileInfoHeader">EMAIL</th>
                <td class="profileInfoContent">buga@rr.comrwerwerewr</td>
                <th class="profileInfoHeader">PASSWORD</th>
                <td class="profileInfoContent">********</td>
            </tr>
            <tr>
                <th class="profileInfoHeader">ADDRESS</th>
                <td class="profileInfoContent">Philippines</td>
                <th class="profileInfoHeader">AGE</th>
                <td class="profileInfoContent">69</td>
            </tr>
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



