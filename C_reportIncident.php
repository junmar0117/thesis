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
    <title> R & R | Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reportmainstyles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
<?php
include_once('Userheader.html');
?>
</nav>
    <div style="padding:40px" class="reportmainwrapper">
        
        <section class="reportmaincolumns">

            <div class="reportmaincolumn" href="#popobangbang">
                <img src="./assets/pnpfinallogo.jpg" width="390px" height="300px" class="imgreportmain">
                <h1 style="margin-left: 10px;" class="reportmainheader">Philippine National Police</h1>
                <p style="margin: 10px; text-align: justify; text-justify: inter-word; ">Lorem ipsum dolor sit amet, consetn ullamcosfdgggg laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="reportmaincontainer">
                        <div class="reportmainbtn-holder">
                        <button id="reportmainbtn" type="button"><a href="P_reports.php">REPORT</a></button>
                        </div>
                    </div>
            </div>

            <div class="reportmaincolumn" href="#">
                <img src="./assets/bfpfinallogo.jpg"  width="390px" height="300px" class="imgreportmain">
                <h1 style="margin-left: 10px;" class="reportmainheader">Bureau of Fire Protection</h1>
                <p style="margin: 10px; text-align: justify; text-justify: inter-word;">Lorem ipsum dolor sit amet, consetn ullamcosfdgggg laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="reportmaincontainer">
                        <div class="reportmainbtn-holder">
                        <button id="reportmainbtn" type="button"><a href="F_reports.php">REPORT</a></button>
                        </div>
                    </div>
            </div>

            <div class="reportmaincolumn" href="#">
                <img src="./assets/barangay2.jpg" width="390px" height="300px" class="imgreportmain">
                <h1 style="margin-left: 10px;" class="reportmainheader">Local Barangay</h1>
                <p style="margin: 10px; text-align: justify; text-justify: inter-word;">Lorem ipsum dolor sit amet, consetn ullamcosfdgggg laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="reportmaincontainer">
                        <div class="reportmainbtn-holder">
                        <button id="reportmainbtn" type="button"><a href="B_reports.php">REPORT</a></button>
                        </div>
                    </div>
            </div>

        </section>

    </div>
<footer>
<?php
include_once('Userfooter.html');
?>
</footer>    
</body>
</html>


