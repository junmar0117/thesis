<?php
session_start();
$user = $_SESSION['user']; //assigns user value
//$id = $_SESSION['id']; 
?>
<?php
$url = "";
$url != 'announcements.php';

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
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>
    <nav>
        <?php
          if($_SESSION['user'] && $_SESSION['type']=='civilian')
          {
            include_once('Userheader.php');
          }
          else if($_SESSION['user'] && $_SESSION['type']=='barangay')
          {
            include_once('B_Userheader.php');
          }
          else if($_SESSION['user'] && $_SESSION['type']=='police')
          {
            include_once('P_Userheader.php');
          }
          else if($_SESSION['user'] && $_SESSION['type']=='fire')
          {
            include_once('F_Userheader.php');
          }
        ?>
    </nav>
    <div class="indexContent3">
        <div class="indexPBB">
            <div class="hpSecHeader3"><a id="reportsColor">Announcements</a></div>
            <br>
            <br>

  <div class="rowCard">
  <?php
		require 'connection.php';

		$postQuery = "SELECT * FROM announcements LEFT JOIN b_admin ON announcements.b_admin_id = b_admin.id WHERE date_created < now()";
		$runPQ = mysqli_query($con, $postQuery);
		while($row = mysqli_fetch_assoc($runPQ))
		{
		?>
  <div class="columnCard">
    <div class="card">
    <img src="<?php echo './assets/announcements/'.$row['image']?>" width="100%" height="300px" >
    <div class="minorCC">
      <h3 class="ipbbthead"><?php echo $row['title']; ?></h3>
      <p class="ipbbthead2"><?php echo mb_strimwidth($row['contents'], 0, 150, "..."); ?></p>
    </div>
      <hr>
      <p class="ipbbthead3"> <?php echo $row['name']; echo " / "; echo date('F jS, Y',strtotime($row['date_created'])) ?> </p>
      <hr>
      <form method="POST" action="viewCardContent.php">
					<input type="hidden" name="id" value="<?php echo $row['a_id'];?>">
					<button class="PBBvstbtn2" style="vertical-align:middle"><span>View</span></button>
			</form>   
      <br>
      <br>
    </div>
    <br>
  </div>

  <?php
    }
  ?>
</div>

        </div>
    </div>
    <div class="footer2">
              <br>
          </div>  
</body>
</html>



