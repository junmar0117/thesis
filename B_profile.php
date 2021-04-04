<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> Home Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
<?php
include_once('header.html');
?>
</nav>
    </nav>
    <section>

    <div class="profileBox">
        <h1>Barangay User Profile</h1>
        <form action="" method="POST">
        
        <div class="textbox1">
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
        <a href=''><button type="button">ADD ACCOUNT</button></a>
        </div>
        </form>
    </div>
    </section>

    <footer>
<?php
include_once('footer.html');
?>
</footer>
</body>
</html>



