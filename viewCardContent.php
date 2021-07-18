<?php
session_start();
?>
<?php
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
			$id = $_POST['id'];   
			}
?>
<?php
$url = "";
$url != 'viewCardContent.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: index.php'); //redirect to some other page
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Incident Reporting</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/viewCC.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body style="background-color: #f1f1f1;">

    <nav>
        <?php
            if($_SESSION['type']=='civilian')
            {
              include_once('Userheader.html');
            }
            else if($_SESSION['type']=='barangay')
            {
              include_once('B_Userheader.html');
            }
            else if($_SESSION['type']=='police')
            {
              include_once('P_Userheader.html');
            }
            else
            {
              include_once('F_Userheader.html');
            }
        ?>
    </nav>
    <div class="vccc">
    <br>
    <br>
    <br>
    <br>
    <h1 class="vccch">View</h1><br>
    <div class="rowCard">
      <?php
      require 'connection.php';	
			$query = mysqli_query($con, "SELECT * FROM announcements LEFT JOIN b_admin ON announcements.b_admin_id = b_admin.id WHERE a_id = $id"); // SQL Query
						
			while($row = mysqli_fetch_array($query))
			{
			?>
        <div class="columnCard">
        <img src="<?php echo './assets/announcements/'.$row['image']?>" width="100%" height="350px" >
          <div class="card">
          <div class="ccontentc">
          <h3 class="ipbbthead"><?php echo $row['title']; ?></h3><hr>
            <p class="ipbbthead3"><?php echo $row['name']; echo " / "; echo date('F jS, Y',strtotime($row['date_created'])) ?></p>
          </div>
      </div>
        </div>
      

  <div class="columnCard">
    
    <div class="card">
    <div class="ccontentc2">
            <p class="ipbbthead2"><?php echo $row['contents']; ?></p><hr>
    </div>
      </div>
  </div>
  <?php 
      }
      ?>
</div>
<br>
  <br>
</div>
</body>
</html>