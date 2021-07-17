<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='barangay')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='civilian'){ 
    header("location:C_profile.php ");//checks if user is civilian account
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
    <title> R & R | </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFP_profilestyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
    <?php
include_once('B_Userheader.html');
    ?>
    </nav>
    <div class="monitorHeaderContainer">
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2 id="pendingV">PENDING VERIFICATION</h2><br>
</div>
    <div style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Civilian ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Valid ID</th>
                <th>Proof</th>
                <th>Time Sent</th>
                <th>Action</th>
            </tr>
            <?php
            require 'connection.php';   
            $query = mysqli_query($con, "SELECT * from verification_proof LEFT JOIN civilians ON verification_proof.civilian_id = civilians.id"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {                   
            ?>         
                <tr>
                <td><?php echo $row['civilian_id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['valid_id']?></td>
                <td><img src='<?php echo 'assets/validid/'.$row['image'];?>' id="myImg" style="height: 100px; width: 100px;"/></td>
                <td><?php echo $row['time_sent']?></td>          
                <td>
                    <form action="verifyUser.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="ids" value="<?php echo $row['ids']?>">
                        <button type="submit" class="viewReportbtn">Accept</button>
                    </form>
                </td>
                </tr>
            <?php
            }
            ?>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
        </table>
    </div>
</body>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</html>



