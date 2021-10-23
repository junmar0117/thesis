<?php
$url = "";
$url != 'B_featureAnnouncement.php';

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
    <title> AidPack | Report Monitoring</title>
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
include_once('B_Userheader.php');
    ?>
    </nav>

    <div class="monitorHeaderContainer">
    <h1>Feature Announcements</h1>
    <hr>
</div>
<br>
    <div class="tab">
        <button class="tablinks" id="defaultOpen" onclick="openTabForm(event, 'all')">Announcements</button>
    </div>    

    <div id="all" class="tabcontent" style="overflow-x:auto;">
    <table class="adminMonitorRep">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Contents</th>
                <th>Date Created</th>
                <th>Feature</th>
            </tr>
            <?php
            require 'connection.php';      
            $query = mysqli_query($con, "SELECT * from announcements ORDER BY a_id DESC"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {   
                $featured = "";
                $notFeatured = "";             
            ?>
            
                <tr>
                <td><?php echo $row['a_id']  ?></td>
                <td><?php echo $row['title']  ?></td>
                <td><?php echo $row['contents']  ?></td>
                <td><?php echo $row['date_created'];?></td>         
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
							<input type="checkbox" value="<?php if($row['featured'] == 0){echo 1;}else{echo 0;}?>" name="featured" onchange="featured_reports(this.value,<?php echo $row['a_id'];?>)" <?php echo $featured ?>></input><br>
                            <span class="checkmark"></span>   
                        </label>
                        </form>
                </tr>
                </td>
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
			url:'changesFeature.php',
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



