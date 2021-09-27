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
    <title>AidPack | View</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/viewCC.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>

    <nav>
        <?php
            if($_SESSION['type']=='civilian')
            {
              include_once('Userheader.php');
            }
            else if($_SESSION['type']=='barangay')
            {
              include_once('B_Userheader.php');
            }
            else if($_SESSION['type']=='police')
            {
              include_once('P_Userheader.php');
            }
            else
            {
              include_once('F_Userheader.php');
            }
        ?>
    </nav>
    
    <?php
      require 'connection.php';	
			$query = mysqli_query($con, "SELECT * FROM announcements LEFT JOIN b_admin ON announcements.b_admin_id = b_admin.id WHERE a_id = $id"); // SQL Query
						
			while($row = mysqli_fetch_array($query))
			{
			?>

      <div class="vccch">
    <h1><?php echo $row['title']; ?></h1>
    <p><?php echo $row['name']; echo " / "; echo date('F jS, Y',strtotime($row['date_created'])) ?></p>
    <img src="<?php echo './assets/announcements/'.$row['image']?>" width="100%" height="500px">
      </div>
    <div class="vccc">
    <div class="vccc2">
    <p class="ipbbthead2"><?php echo $row['contents']; ?></p>
      </div>
      </div>
      <div class="vccc3">
          
            <p class="ipbbthead3"><?php echo $row['name']; echo " / "; echo date('F jS, Y',strtotime($row['date_created'])) ?></p>
            <hr>
      </div>
  <?php 
      }
      ?>
      
    <br>
</body>
</html>