<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Philippine National Police Profile (A)</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profilestyles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
    <?php
include_once('header.html');
?>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <section class="profileSection">

    <div class="profileBox">
        
        <h1>Philippine National Police (PNP)</h1>
        
        <form action="" method="POST">
        <input type="button" value="Add Account +"></input>
        <table class="AdminProfileTable">
            <tr>
                <th>Account ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>View Profile</th>
                <th>Delete Profile</th>
            </tr>
            <tr>
                <td>123456</td>
                <td>Griffin</td>
                <td>Peter</td>
                <td>04/04/2021</td>
                <td id="AdminViewProfile" href="">View</td>
                <td id="AdminDelProfile" href="">Delete</td>
            </tr>
        </table>
        </div>
        </form>
    </div>
    </section>
</body>
</html>



