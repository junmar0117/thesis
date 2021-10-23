<?php
$url = "";
$url != 'P_completedReports.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: P_profile.php'); //redirect to some other page
  exit();
}
?>
<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='police')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='civilian'){ 
    header("location:C_profile.php ");//checks if user is civilian account
}
if($_SESSION['type']=='barangay'){ 
    header("location:B_profile.php ");//checks if user is fire account
}
if($_SESSION['type']=='fire'){ 
    header("location:F_profile.php "); //checks if user is police account
}

$user = $_SESSION['user']; //assigns user value
//$id = $_SESSION['id']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Completed Reports</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/BFP_profilestyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <nav>
    <?php
include_once('P_Userheader.php');
    ?>
    </nav>

    <div class="monitorHeaderContainer">
    <h1>Police Completed Reports</h1>
    <h2>View police completed reports</h2>
    <button  class="viewReportbtn" onclick="document.location='monthlyData.php'" type="submit">Check Monthly Data for the Month of <?php echo date('F Y'); ?></button>
    <hr>
</div>
<br>

<?php
            require 'connection.php';    

            $query6 = mysqli_query($con, "SELECT * from complete_report_injury"); // SQL Query
            $injury= mysqli_num_rows($query6);
            ?>

    <div class="tab">
        <button class="tablinks" onclick="openTabForm(event, 'physicalinjury')">Physical Injury</button>
    </div>    
  
    <div id="physicalinjury" class="tabcontent" style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>Status</th>
                <th>View Report</th>
            </tr>
            <?php echo '<h2><center>Total Cases: ' . $injury . '</center></h2>';?>
            <?php
            require 'connection.php';   
            $query = mysqli_query($con, "SELECT * from complete_report_injury ORDER BY c_id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {                   
            ?>
            
                <tr>
                <td><?php echo $row['c_id']  ?></td>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['username']  ?></td>
                <td><?php echo $row['incident_time_date'];?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status']?></td>
                <td>
                    <form action="viewCompletedReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['c_id']?>">
                        <input type="hidden" name="report_id" value="<?php echo $row['reports_id']?>">
                        <input type="submit" class="viewReportbtn2" value="View" name="injury"></input>
                    </form>
                </td>  
                </tr>
            <?php
        }
        ?>
        </table>
    </div>

    <script>
function openTabForm(evt, tabFormName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabFormName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function featured_reports(val, id)
	{
		$.ajax({
			type:'post',
			url:'changes.php',
			data:{val:val,id:id},
			success: function(result){
				if(result == 1){
					$('#str'+id).html('Featured');
				}else{
					$('#str'+id).html('Not Featured');
				}
			}
		});
	}
	</script>
</body>
</html>



