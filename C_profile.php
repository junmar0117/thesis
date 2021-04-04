<?php
//$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> Home Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
<?php
include_once('header.html');
?>
</nav>
    <section>

    <div class="profileBox">
        <h1>Civilian User Profile</h1>
        <form action="" method="POST">
        
        <div class="textbox1">
        <h3>Hello, <?php print "" ?>!</h3>
        <table>
            <tr>
                <th><img src="./assets/dellyy.jpg" height="250px" width="250px"></th>
            </tr>
            <tr>
                <td>Peter</td>
                <td>Griffin</td>
            </tr>
            <tr>
                <td>Lois</td>
                <td>Griffin</td>
            </tr>
            <tr>
                <td>Joe</td>
                <td>Swanson</td>
            </tr>
            <tr>
                <td>Cleveland</td>
                <td>Brown</td>
            </tr>
        </table>
        </div>
        <div class="btn1">
        <a href=''><button type="button">REPORT INCIDENT</button></a>
        </div>
        </form>
    </section>
</body>
<footer>
<?php
include_once('footer.html');
?>
</footer>
</html>



