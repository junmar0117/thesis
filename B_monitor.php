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
    <title> R & R | Report Monitoring</title>
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
include_once('B_Userheader.html');
    ?>
    </nav>

    <div class="monitorHeaderContainer">
    <h1>Barangay Report Monitoring</h1>
    <h2>Subhead</h2>
    <br>
</div>
<br>
    <div class="tab">
        <button class="tablinks" onclick="openTabForm(event, 'alls')"  id="defaultOpen">All</button>
        <button class="tablinks" onclick="openTabForm(event, 'all')">All Barangay</button>
        <button class="tablinks" onclick="openTabForm(event, 'em')">Emergency</button>
        <button class="tablinks" onclick="openTabForm(event, 'nonem')">Non-Emergency</button>
    </div>    

    <div id="alls" class="tabcontent" style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>Status</th>
                <th>View Report</th>
                <th>View Record</th>
                <th>Show</th>
            </tr>
            <?php
            require 'connection.php';         

            $query = mysqli_query($con, "SELECT * from reports ORDER BY id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {          
                $featured = "";
								$notFeatured = "";         
            ?>
            
                <tr>
                <td><?php echo $row['id']  ?></td>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['username']  ?></td>
                <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status']?></td>
                <td>
                    <form action="viewReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn2">View</button>
                    </form>
                </td>
                <td>
                    <form action="viewRecords.php" method="POST">
                        <input type="hidden" name="report_id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn2">View</button>
                    </form>
                </td>
                <td>
                <?php
								if($row['featured'] == 1)
								{
									$featured = "Checked";
								}
								else
								{
									$notFeatured = "Checked";
								}
							?>
							<form>
                            <label class="CBcontainer">
							<input type="checkbox" value="<?php if($row['featured'] == 1){echo 2;}else{echo 1;}?>" name="featured" onchange="featured_reports(this.value,<?php echo $row['id'];?>)" <?php echo $featured ?>></input><br>
                            <span class="checkmark"></span>    
                        </label>
                        </form>
                </td>
                </tr>
            <?php
        }
        ?>
        </table>
    </div>

    <div id="all" class="tabcontent" style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>Status</th>
                <th>Safe Count</th>
                <th>View Report</th>
                <th>View Record</th>
            </tr>
            <?php
            require 'connection.php';   
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $r_id = $row['id'];   
            }

            $querySafe = mysqli_query($con, "SELECT * from saferecords where report_id = $r_id and `safe` = 'Yes'");
            $safeCount = array();
            while($row = mysqli_fetch_array($querySafe))
            {
                $safeCount[] = $row['safe'];
            } 
            $numSafeCount = count($safeCount);        

            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' ORDER BY id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {                   
            ?>
            
                <tr>
                <td><?php echo $row['id']  ?></td>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['username']  ?></td>
                <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status']?></td>
                <td><?php echo $numSafeCount?></td>
                <td>
                    <form action="viewReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn">View</button>
                    </form>
                </td>
                <td>
                    <form action="viewRecords.php" method="POST">
                        <input type="hidden" name="report_id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn">View</button>
                    </form>
                </td>
                </tr>
            <?php
        }
        ?>
        </table>
    </div>

    <div id="em" class="tabcontent" style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>Status</th>
                <th>Safe Count</th>
                <th>View Report</th>
                <th>View Record</th>
            </tr>
            <?php
            require 'connection.php';   
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $r_id = $row['id'];   
            }

            $querySafe = mysqli_query($con, "SELECT * from saferecords where report_id = $r_id and `safe` = 'Yes'");
            $safeCount = array();
            while($row = mysqli_fetch_array($querySafe))
            {
                $safeCount[] = $row['safe'];
            } 
            $numSafeCount = count($safeCount);        

            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' AND `emergency` = 'Yes' ORDER BY id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {                   
            ?>
            
                <tr>
                <td><?php echo $row['id']  ?></td>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['username']  ?></td>
                <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status']?></td>
                <td><?php echo $numSafeCount?></td>
                <td>
                    <form action="viewReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn">View</button>
                    </form>
                </td>
                <td>
                    <form action="viewRecords.php" method="POST">
                        <input type="hidden" name="report_id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn">View</button>
                    </form>
                </td>
                </tr>
            <?php
        }
        ?>
        </table>
    </div>

    <div id="nonem" class="tabcontent" style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>Report ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date Created</th>
                <th>Concern</th>
                <th>Status</th>
                <th>Safe Count</th>
                <th>View Report</th>
                <th>View Record</th>
            </tr>
            <?php
            require 'connection.php';   
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $r_id = $row['id'];   
            }

            $querySafe = mysqli_query($con, "SELECT * from saferecords where report_id = $r_id and `safe` = 'Yes'");
            $safeCount = array();
            while($row = mysqli_fetch_array($querySafe))
            {
                $safeCount[] = $row['safe'];
            } 
            $numSafeCount = count($safeCount);        

            $query = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' AND `emergency` = 'No' ORDER BY id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {                   
            ?>
            
                <tr>
                <td><?php echo $row['id']  ?></td>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['username']  ?></td>
                <td><?php echo $row['date']; echo " - "; echo $row['time']?></td>
                <td><?php echo $row['incident']  ?></td>
                <td><?php echo $row['status']?></td>
                <td><?php echo $numSafeCount?></td>
                <td>
                    <form action="viewReports.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn">View</button>
                    </form>
                </td>
                <td>
                    <form action="viewRecords.php" method="POST">
                        <input type="hidden" name="report_id" value="<?php echo $row['id']?>">
                        <button type="submit" class="viewReportbtn">View</button>
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



