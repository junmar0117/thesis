<?php
$url = "";
$url != 'B_pendingVerification.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: B_profile.php'); //redirect to some other page
  exit();
}
?>
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
    <title> AidPack | Verification</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFP_profilestyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <nav>
    <?php
include_once('B_Userheader.php');
    ?>
    </nav>
    <div class="monitorHeaderContainer">
    <h1 id="pendingV">Verification</h1>
    <h2> View pending civilian user's verification</h2>
    <br>
</div>
<br>
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
                <td><a href='<?php echo 'assets/validid/'.$row['image'];?>' target="_blank">View Proof</a></td>
                <td><?php echo $row['time_sent']?></td>          
                <td>

                <!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
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
            
        </table>
    </div>
</body>
<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>



