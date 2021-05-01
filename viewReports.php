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
    <br>
    <br>
    <br>
    <section>
        <table class="AllReportHistory1">
            <tr>
                <tr>
                <th>Report Details</th>
                </tr>
            </tr>
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $id = ($_POST['id']);
            }
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             </tr>
             <tr>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             </tr>
             <tr>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
             </tr>
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
             </tr>
             <tr>
             <td><?php echo "Proof: "?> <img src='<?php echo 'reportFIles/'.$row['file'];?>' style="height: 1080px; width: 1920px;"/></td>
             </tr>
             <tr>
             <td><?php echo "Status: "; echo $row['status'] ?></td>
             </tr>
             
            <?php
            }
            ?>
        </table>
    

    </section>
</body>
</html>



