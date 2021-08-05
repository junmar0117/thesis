<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Incident Reporting</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body style="background-color: #ffffff;">

    <nav>
        <?php
            include_once('header.html');
        ?>
    </nav>
    <br>
    <br>
    <div class="hpFirstSection">
        <div class="hpFirst">
            <div class="hfprb">
            <a class="hpFirstHeader">Arm ourselves with knowledge to take action,</a>
            <a class="hpFirstHeader" style="color:#000;">Report & Respond.</a>
            <br>
            <br>
            <div class="hpFirstleftborder">
                <br>
                <br>
                <p style="font-weight:bold;">Assistance to incident reporting with the support from</p>
                <p style="font-weight:bold;">Major response organizations from your local barangay to the</p>
                <p style="font-weight:bold;">Philippine National Police, and Bureau of Fire Protection.</p><br>
                <br>
                <p>R & R seeks to provide a variety of response to</p>
                <p>Pandacan, Manila</p>
                <br>
                <br>
                <button class="hpLoginbtn" onclick="location.href='C_register.php';" style="vertical-align:middle"><span>REGISTER NOW</span></button>
            </div>
</div>
        </div>
    </div>

    <div class="indexContent3">
        <div class="indexPBB">
            <div class="hpSecHeader3">Featured <a id="reportsColor">Reports</a></div>
            <br>
            <br>

<div class="rowCard">
        <?php
		require 'connection.php';

		$postQuery = "SELECT * FROM reports WHERE featured = 1 LIMIT 3";
		$runPQ = mysqli_query($con, $postQuery);
		while($row = mysqli_fetch_assoc($runPQ))
		{
		?>
  <div class="columnCard">
    <div class="card">
    <div class="zoomin frame">
    <img src="<?php echo './reportFiles/'.$row['file']?>" width="100%" height="300px" >
        </div>
        <br>
    <div class="minorCC2">
    <p class="ipbbthead3">i</p>
      <h3 class="ipbbthead"><?php echo $row['type']; ?></h3>
      <p class="ipbbthead2"><?php echo mb_strimwidth($row['description'], 0, 150, "..."); ?></p>
        </div>
      <hr>
      <p class="ipbbthead3"> <?php echo $row['date']; echo " / "; echo $row['time']; ?> </p>
      
   
        </div>
  </div>
  <?php
        }
        ?>
</div>

        </div>
    </div>

    <div class="indexContent4">
        <div class="indexPBB2">
            <div class="hpSecHeader4"><a id="reportsColor">Announcements</a></div>
            <br>
            <br>
            <div class="rowCard">
            <?php
		require 'connection.php';

		$postQuery = "SELECT * FROM announcements LEFT JOIN b_admin ON announcements.b_admin_id = b_admin.id WHERE date_created < now() AND featured = 1 LIMIT 3";
		$runPQ = mysqli_query($con, $postQuery);
		while($row = mysqli_fetch_assoc($runPQ))
		{
		?>
            <div class="columnCard">
            <div class="zoomin frame">
            <img src="<?php echo './assets/announcements/'.$row['image']?>" width="100%" height="300px">
            </div>
                <div class="card2">
                
                    <div class="minorCC">
                        <h3 class="ipbbthead"><?php echo $row['title']; ?></h3>
                        <p class="ipbbthead2"><?php echo mb_strimwidth($row['contents'], 0, 150, "..."); ?></p>
                    </div>
                    <hr>
                <p class="ipbbthead3"><?php echo $row['name']; echo " / "; echo date('F jS, Y',strtotime($row['date_created'])) ?></p>
                    <hr>
                <form method="POST" action="viewCardContent.php">
					<input type="hidden" name="id" value="<?php echo $row['a_id'];?>">
					<button class="PBBvstbtn" style="vertical-align:middle;"><span>Read More</span></button>
				</form>              
                </div>
            </div>
            <?php
        }
        ?>
            </div>
        

        </div>
    </div>
    
    <div class="indexContent2">
        <table class="indexAbout">
            <tr>
                <th class="hpSecHeader2">R & R</th> 
            </tr>   
            <tr>
                <td>
                    <a class="hpAboutHeader">ABOUT</a>
                        <br><br>
                    <a class="AboutSubhead">Report to Respond</a>
                        <br><br>
                    <p style="font-size: 18px;">R & R assists with incident reporting to connect response organizations with civilians.</p>
                </td>
                <td>
                    <a class="hpAboutHeader">+ US</a>
                        <br><br>
                    <a class="AboutSubhead">In Development</a>
                        <br><br>
                    <p style="font-size: 18px;">R & R is currently in its development phase to test the intended features for the public before release.</p>
                </td>
            </tr>
        </table>
    </div>
</body>
<footer>
        <?php
            include_once('footer.html');
        ?>
</footer>
</html>



