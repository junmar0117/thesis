<?php
$url = "";
$url != 'completeReport_fire.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: F_profile.php'); //redirect to some other page
  exit();
}
?>
<?php
session_start();
if($_SESSION['user']){ //checks if user is logged in
}else{
  header("location:index.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = ($_POST['id']);
    $assigned_id = ($_POST['assigned_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/viewR.css">
    <link rel="stylesheet" href="./css/popup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script>
            <?php 
            require 'connection.php';
            $query = mysqli_query($con, "SELECT * from reports where report_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                if($row['status'] == "Needs Attention")
                {
                ?>    
                $(document).ready(function() {
                $("div.desc-progress").hide();
                $("div.desc-otw").hide();
                $("div.desc-complete").hide();
                $("input[name$='status']").click(function(){
                    var test = $(this).val();
                    $("div.desc").hide();
                    $("#" + test).show();
                    });
                });
            <?php
                }
                else if($row['status'] == "In Progress")
                {
                ?>    
                $(document).ready(function() {
                $("div.desc-submitted").hide();
                $("div.desc-otw").hide();
                $("div.desc-complete").hide();
                $("input[name$='status']").click(function(){
                    var test = $(this).val();
                    $("div.desc").hide();
                    $("#" + test).show();
                    });
                });
            <?php
                }
                else if($row['status'] == "On The Way")
                {
                ?>  
                $(document).ready(function() {
                $("div.desc-progress").hide();
                $("div.desc-submitted").hide();
                $("div.desc-complete").hide();
                $("input[name$='status']").click(function(){
                    var test = $(this).val();
                    $("div.desc").hide();
                    $("#" + test).show();
                    });
                }); 
            <?php
                }
                else if($row['status'] == "Completed")
                {
            ?>  
                $(document).ready(function() {
                $("div.desc-progress").hide();
                $("div.desc-submitted").hide();
                $("div.desc-otw").hide();
                $("input[name$='status']").click(function(){
                    var test = $(this).val();
                    $("div.desc").hide();
                    $("#" + test).show();
                    });
                }); 
            <?php
                }
            }
            ?>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
	function status_update(val, id)
	{
		$.ajax({
			type:'post',
			url:'changeBlog.php',
			data:{val:val,id:id},
			success: function(result){
				if(result == 1){
					$('#str'+id).html('Status Updated');
				}else{
					$('#str'+id).html('Status Update Failed');
				}
			}
		});
	}
	</script>
</head>
<body>
    
<?php 
require 'connection.php'; 
$sql_b = "SELECT * FROM b_admin where username = '$user' ";
$row_b = mysqli_query($con, $sql_b);

$sql_f = "SELECT * FROM f_admin where username = '$user' ";
$row_f = mysqli_query($con, $sql_f);

$sql_p = "SELECT * FROM p_admin where username = '$user' ";
$row_p = mysqli_query($con, $sql_p);

if(mysqli_num_rows($row_b) > 0)    
{       
        Print '<nav>';
        include_once('B_Userheader.php');
        Print '</nav>';

        Print '<div class="viewRepHead">';
        Print '<h1>Report Details</h1>';
        Print '<div id="submitted" class="desc desc-submitted">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: Submitted<i class="fas fa-file-import" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '<div id="progress" class="desc desc-progress">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: In Progress<i class="fas fa-spinner" style="padding-left: 5px;"></i></h3>';                      
        Print '</div></div></div>';

        Print '<div id="otw" class="desc desc-otw">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: On the Way<i class="fas fa-car" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '<div id="complete" class="desc desc-complete">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: Finish<i class="fas fa-check-circle" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '</div>';
        Print '<div class="vrtContain">';
        Print '<h2>Reports are subjected for verification by the administrator.</h2><hr>';
        Print '<h3>User Information</h3>';
        Print '<table class="viewReportsTable">';
            
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
                $id = $row['report_id'];
                $name = $row['names'];
                $username = $row['usernames'];
                $date = $row['date'];
                $time = $row['time'];
                $place = $row['place'];
                $incident = $row['incident'];
                $description = $row['description'];
                $file = $row['file'];
                $latitude = $row['lat'];
                $longitude = $row['lng'];
                $barangay = $row['barangay'];
                $type = $row['type'];
                $status = $row['status'];
                $emergency = $row['emergency'];
                $crime = $row['crime'];
            ?>
             <tr>
             <th><?php echo "Name"?></th> 
             <td><?php echo $row['names'] ?></td>
             <th><?php echo "Username"?></th>
             <td><?php echo $row['usernames']  ?></td>
             </tr>
            </table>

            <h3>Incident Information</h3>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Date"?></th>
             <td><?php echo $row['date']?></td>
             <th><?php echo "Time"?></th>
             <td><?php echo $row['time']?></td>
             </tr>
             <tr>
             <th><?php echo "Place"?></th>
             <td><?php echo $row['place']?></td>
             <th><?php echo "Incident"?></th>
             <td><?php echo $row['incident']?></td>
            </tr>
            </table>
            
            <h3>Description</h3>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>
            

            <h3><?php echo "Proof of Incident"?></h3>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>
            
            <h3><?php echo "Location of Incident"?></h3>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
            

            <script>
            var map;

            function initialize() {
            var myLatlng = new google.maps.LatLng(<?php echo $row['lat']?>,<?php echo $row['lng']?>);

            var myOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                };

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            var marker = new google.maps.Marker({
                draggable: true,
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script>      
        <form action="completeReportAction.php" method="POST">
        <h3>When did it take place?</h3>
        <input type="datetime-local" name="when" placeholder="...">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="name" value="<?php echo $name;?>">
        <input type="hidden" name="username" value="<?php echo $username;?>">
        <input type="hidden" name="place" value="<?php echo $place;?>">
        <input type="hidden" name="barangay" value="<?php echo $barangay;?>">
        <input type="hidden" name="description" value="<?php echo $description;?>">
        <input type="hidden" name="file" value="<?php echo $file;?>">
        <input type="hidden" name="type" value="<?php echo $type;?>">
        <input type="hidden" name="incident" value="<?php echo $incident;?>">
        <input type="hidden" name="time" value="<?php echo $time;?>">
        <input type="hidden" name="status" value="<?php echo $status;?>">
        <input type="hidden" name="emergency" value="<?php echo $emergency;?>">
        <input type="hidden" name="crime" value="<?php echo $crime;?>">
        <input type="hidden" name="latitude" value="<?php echo $latitude;?>">
        <input type="hidden" name="longitude" value="<?php echo $longitude;?>">
        <hr>
        <input type="submit" name="submit" >
        </form> 
        </div> 
<?php
}}else if(mysqli_num_rows($row_f) > 0)
{
    Print '<nav>';
    include_once('F_Userheader.php');
    Print '</nav>';

    Print '<div class="viewRepHead">';
    
        Print '<h1>Report Details</h1>';
        Print '<div id="submitted" class="desc desc-submitted">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: Submitted<i class="fas fa-file-import" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '<div id="progress" class="desc desc-progress">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: In Progress<i class="fas fa-spinner" style="padding-left: 5px;"></i></h3>';                      
        Print '</div></div></div>';

        Print '<div id="otw" class="desc desc-otw">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: On the Way<i class="fas fa-car" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '<div id="complete" class="desc desc-complete">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: Finish<i class="fas fa-check-circle" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '</div>';
        Print '<div class="vrtContain">';
        Print '<h2>Reports are subjected for verification by the administrator.</h2><hr>';
        Print '<h3>User Information</h3>';
        Print '<table class="viewReportsTable">';
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = ($_POST['id']);
        }
        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from reports where report_id = '$id'"); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
                $id = $row['report_id'];
                $name = $row['names'];
                $username = $row['usernames'];
                $date = $row['date'];
                $time = $row['time'];
                $place = $row['place'];
                $incident = $row['incident'];
                $description = $row['description'];
                $file = $row['file'];
                $latitude = $row['lat'];
                $longitude = $row['lng'];
                $barangay = $row['barangay'];
                $type = $row['type'];
                $status = $row['status'];
                $emergency = $row['emergency'];
                $crime = $row['crime'];
        ?>
         <tr>
             <th><?php echo "Name"?></th> 
             <td><?php echo $row['names'] ?></td>
             <th><?php echo "Username"?></th>
             <td><?php echo $row['usernames']  ?></td>
             </tr>
            </table>

            <h3>Incident Information</h3>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Date"?></th>
             <td><?php echo $row['date']?></td>
             <th><?php echo "Time"?></th>
             <td><?php echo $row['time']?></td>
             </tr>
             <tr>
             <th><?php echo "Place"?></th>
             <td><?php echo $row['place']?></td>
             <th><?php echo "Incident"?></th>
             <td><?php echo $row['incident']?></td>
            </tr>
            </table>
            
            <h3>Description</h3>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>
            

            <h3><?php echo "Proof of Incident"?></h3>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>
            
            <h3><?php echo "Location of Incident"?></h3>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
            

            
            <script>
            var map;

            function initialize() {
            var myLatlng = new google.maps.LatLng(<?php echo $row['lat']?>,<?php echo $row['lng']?>);

            var myOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                };

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            var marker = new google.maps.Marker({
                draggable: true,
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script> 
            <form action="completeReportAction_fire.php" method="POST">
        <h3>SECTION 1 - INCIDENT (Complete for all incidents)</h3>
        <hr>
        <table class="coretab">
            <tr>
                <td>
        <h3>When did it take place?</h3>
        <input type="datetime-local" name="when" placeholder="...">
        </td>
        <td>
        <h3>Building Name and Address</h3>
        <input type="text" name="building_address" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Building No.</h3>
        <input type="number" name="building_number" placeholder="...">
        </td>
        <td>
        <h3>Fixed Property</h3>
        <input type="text" name="fixed_property" placeholder="...">
        </td>
        </tr>
        </table>
        <h3>Type of Incident</h3>
        <input type="text" name="incident_type" placeholder="...">
        <hr>
        <h3>Occupants Were</h3>
        <table class="coretab">
            <tr>
                <td>
        <input type="radio" name="occupants_status" value="Not Evacuated">
        <label id="corelabel" for="notevacuated">Not Evacuated</label><br>
        <input type="radio" name="occupants_status" value="Evacuated">
        <label id="corelabel" for="evacuated">Evacuated</label><br>
        </td>
        <td>
        <input type="radio" name="occupants_status" value="Relocated">
        <label id="corelabel" for="relocated">Relocated</label><br>
        <input type="radio" name="occupants_status" value="Both B and C">
        <label id="corelabel" for="both">Both B and C</label><br>
        </td>
        </tr>
        </table>
        <h3>Did the Fire Department Respond?</h3>
        <input type="radio" name="did_respond" value="Yes">
        <label id="corelabel" for="Yes">Yes</label><br>
        <input type="radio" name="did_respond" value="No">
        <label id="corelabel" for="No">No</label><br>
        <h3>Fire Department Called Via</h3>
        <input type="number" name="called_via" placeholder="...">
        <h3>Fire Department Respond Within Minutes Of Notification</h3>
        <input type="radio" name="respond_within_minutes" value="Yes">
        <label id="corelabel" for="Yes">Yes</label><br>
        <input type="radio" name="respond_within_minutes" value="No">
        <label id="corelabel" for="No">No</label><br>
        <h3>Brief History of Incident</h3>
        <input type="text" name="history" placeholder="...">
        <h3>Action(s) Taken and Recommendations to Prevent Recurrence</h3>
        <input type="text" name="actions_recommendations" placeholder="...">
        <table class="coretab">
            <tr>
                <td>
        <h3>No. of Injuries</h3>
        <input type="number" name="num_injuries" placeholder="...">
        </td>
        <td>
        <h3>No. of Deaths</h3>
        <input type="number" name="num_deaths" placeholder="...">
        </td>
        </tr>
        </table>
<hr>
        <h3>SECTION 2 - FIRE (Complete for all fires)</h3>
        <hr>
        <h3>Area of Fire Origin</h3>
        <input type="text" name="fire_origin" placeholder="...">
        <table class="coretab">
            <tr>
                <td>
        <h3>Equipment Involved in Ignition</h3>
        <input type="text" name="equipment" placeholder="...">
        </td>
        <td>
        <h3>Form of Heat of Ignition</h3>
        <input type="text" name="form_of_heat" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Type of Material Ignited</h3>
        <input type="text" name="type_material_ignited" placeholder="...">
        </td>
        <td>
        <h3>Form of Material Ignited</h3>
        <input type="text" name="form_of_material" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Method of Extinguishment</h3>
        <input type="text" name="method_of_extinguishment" placeholder="...">
        </td>
        <td>
        <h3>Level of Fire Origin</h3>
        <input type="text" name="level_of_fire" placeholder="...">
        </td>
        </tr>
        </table>
        <hr>
        <h3>SECTION 3 - STRUCTURE FIRE (Complete if structure fires)</h3>
        <hr>
        <table class="coretab">
            <tr>
                <td>
        <h3>Extent of Flame Damage</h3>
        <input type="text" name="extent_flame" placeholder="...">
        </td>
        <td>
        <h3>Extent of Smoke Damage</h3>
        <input type="text" name="extent_smoke" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Detector Performance</h3>
        <input type="text" name="detector_performance" placeholder="...">
        </td>
        <td>
        <h3>Sprinkler Performance</h3>
        <input type="text" name="sprinkler_performance" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Type of Material Generating Most Smoke</h3>
        <input type="text" name="type_most_smoke" placeholder="...">
        </td>
        <td>
        <h3>Form of Material Generating Most Smoke</h3>
        <input type="text" name="form_most_smoke" placeholder="...">
        </td>
        </tr>
        </table>
        <h3>Avenue of Smoke Travel</h3>
        <input type="text" name="avenue_smoke_travel" placeholder="...">
<hr>
        <h3>SECTION 4 - PROPERTY</h3>
        <hr>
        <table class="coretab">
            <tr>
                <td>
        <h3>Mobile Property</h3>
        <input type="text" name="mobile_property" placeholder="...">
        </td>
        <td>
        <h3>YR.</h3>
        <input type="text" name="year1" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Make</h3>
        <input type="text" name="make1" placeholder="...">
        </td>
        <td>
        <h3>Model</h3>
        <input type="text" name="model1" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Serial No.</h3>
        <input type="text" name="serial_number1" placeholder="...">
        </td>
        <td>
        <h3>License No. (if any)</h3>
        <input type="text" name="license_number" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Equipment Involved in Ignition</h3>
        <input type="text" name="equipment_involved" placeholder="...">
        </td>
        <td>
        <h3>YR.</h3>
        <input type="text" name="year2" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Make</h3>
        <input type="text" name="make2" placeholder="...">
        </td>
        <td>
        <h3>Model</h3>
        <input type="text" name="model2" placeholder="...">
        </td>
        </tr>
        <tr>
            <td>
        <h3>Serial No.</h3>
        <input type="text" name="serial_number2" placeholder="...">
        </td>
        <td>
        <h3>Voltage (if any)</h3>
        <input type="text" name="voltage" placeholder="...">
        </td>
        </tr>
        </table>
<hr>
        <h3>SECTION 5 - PREPARER OF THIS REPORT</h3>
        <hr>
        <table class="coretab">
            <tr>
                <td>
        <h3>Investigator's Signature</h3>
        <input type="text" name="reporter" placeholder="...">
        </td>
        <td>
        <h3>Date Now</h3>
        <input type="datetime-local" name="date_of_complete_report">
        </td>
        </tr>
        </table>

        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="assigned_id" value="<?php echo $assigned_id;?>">
        <input type="hidden" name="name" value="<?php echo $name;?>">
        <input type="hidden" name="username" value="<?php echo $username;?>">
        <input type="hidden" name="place" value="<?php echo $place;?>">
        <input type="hidden" name="barangay" value="<?php echo $barangay;?>">
        <input type="hidden" name="description" value="<?php echo $description;?>">
        <input type="hidden" name="file" value="<?php echo $file;?>">
        <input type="hidden" name="type" value="<?php echo $type;?>">
        <input type="hidden" name="incident" value="<?php echo $incident;?>">
        <input type="hidden" name="time" value="<?php echo $time;?>">
        <input type="hidden" name="status" value="<?php echo $status;?>">
        <input type="hidden" name="emergency" value="<?php echo $emergency;?>">
        <input type="hidden" name="crime" value="<?php echo $crime;?>">
        <input type="hidden" name="latitude" value="<?php echo $latitude;?>">
        <input type="hidden" name="longitude" value="<?php echo $longitude;?>">
        <hr>
        <input type="submit" name="submit">
        </form>  
        </div>
<?php
}}else if(mysqli_num_rows($row_p) > 0)
{
    Print '<nav>';
    include_once('P_Userheader.php');
    Print '</nav>';


    Print '<div class="viewRepHead">';
    
        Print '<h1>Report Details</h1>';
        Print '<div id="submitted" class="desc desc-submitted">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: Submitted<i class="fas fa-file-import" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '<div id="progress" class="desc desc-progress">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: In Progress<i class="fas fa-spinner" style="padding-left: 5px;"></i></h3>';                      
        Print '</div></div></div>';

        Print '<div id="otw" class="desc desc-otw">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: On the Way<i class="fas fa-car" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '<div id="complete" class="desc desc-complete">';
        Print '<div class="progress--attention">';
        Print '<div class="inlinetext">';
        Print '<h3>Status: Finish<i class="fas fa-check-circle" style="padding-left: 5px;"></i></h3>';
        Print '</div></div></div>';

        Print '</div>';
        Print '<div class="vrtContain">';
        Print '<h2>Reports are subjected for verification by the administrator.</h2><hr>';
        Print '<h3>User Information</h3>';
        Print '<table class="viewReportsTable">';
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = ($_POST['id']);
        }
        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
                $id = $row['report_id'];
                $name = $row['names'];
                $username = $row['usernames'];
                $date = $row['date'];
                $time = $row['time'];
                $place = $row['place'];
                $incident = $row['incident'];
                $description = $row['description'];
                $file = $row['file'];
                $latitude = $row['lat'];
                $longitude = $row['lng'];
                $barangay = $row['barangay'];
                $type = $row['type'];
                $status = $row['status'];
                $emergency = $row['emergency'];
                $crime = $row['crime'];
        ?>
         <tr>
             <th><?php echo "Name"?></th> 
             <td><?php echo $row['names'] ?></td>
             <th><?php echo "Username"?></th>
             <td><?php echo $row['usernames']  ?></td>
             </tr>
            </table>

            <h3>Incident Information</h3>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Date"?></th>
             <td><?php echo $row['date']?></td>
             <th><?php echo "Time"?></th>
             <td><?php echo $row['time']?></td>
             </tr>
             <tr>
             <th><?php echo "Place"?></th>
             <td><?php echo $row['place']?></td>
             <th><?php echo "Incident"?></th>
             <td><?php echo $row['incident']?></td>
            </tr>
            </table>
            
            <h3>Description</h3>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>
            

            <h3><?php echo "Proof of Incident"?></h3>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>
            
            <h3><?php echo "Location of Incident"?></h3>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
            
            
            <script>
            var map;

            function initialize() {
            var myLatlng = new google.maps.LatLng(<?php echo $row['lat']?>,<?php echo $row['lng']?>);

            var myOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                };

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            var marker = new google.maps.Marker({
                draggable: true,
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script>
            <form action="completeReportAction_injury.php" method="POST">
            <h3>Who was involved</h3>
        <input type="text" name="who" placeholder="..." required>
        <h3>When did it take place?</h3>
        <input type="datetime-local" name="when" placeholder="..." required>
        <h3>Why did it happen?</h3>
        <input type="text" name="why" placeholder="..." required>
        <h3>How did it happen?</h3>
        <input type="text" name="how" placeholder="..." required>

        <h3>Rank and Names of First Responders</h3>
        <input type="text" name="firstResponders" placeholder="...">
        <h3>Time First Responders Arrived at Crime Scene</h3>
        <input type="datetime-local" name="timeResponder" placeholder="...">
        <h3>Weather Condition</h3>
        <input type="text" name="weather" placeholder="...">
        <h3>Names of Victims and Status</h3>
        <input type="text" name="victims" placeholder="...">
        <h3>Names of Persons Found at (inside) the Crime Scene by FR (Address/Contact Nrs)</h3>
        <input type="text" name="foundAtCS" placeholder="...">
        <h3>Names of Suspects and Status (Arrested/At-large, etc..) and Weapons, if any</h3>
        <input type="text" name="suspect" placeholder="...">
        <h3>Names of Person Found Near or at the Vicinity of CS (Address/Contact Nr)</h3>
        <input type="text" name="nearCS" placeholder="...">
        <h3>Names of Persons Interviewed by the FR (Address/Contact Nr)</h3>
        <input type="text" name="interviewedPerson" placeholder="...">
        <h3> Names of Persons Who Entered the CS after the Arrival of FR and Prior to Arrival
of Investigator (Medics, Local Officials, etc) (Address/Contact Nr)</h3>
        <input type="text" name="enteredCS" placeholder="...">
        <h3>List of Evidence That Have Been Seized/Collected/Recovered by the FR (If Any)</h3>
        <input type="text" name="evidence" placeholder="...">
        <h3>Areas where Initial Search were conducted</h3>
        <input type="text" name="initialSearch" placeholder="...">
        <h3>On-Scene Command Post (OSCP) established at</h3>
        <input type="text" name="oscp" placeholder="...">
        <h3>Time and Date of Arrival of Investigator at the CS</h3>
        <input type="text" name="arrivalInvestigator" placeholder="...">
        <h3>CS Received By Duty Investigator/ IOC</h3>
        <input type="text" name="csReceivedDutyInvestigator" placeholder="...">
        <h3>Time/Date</h3>
        <input type="datetime-local" name="timeOrDate" placeholder="...">
        <h3>Witnessed By</h3>
        <input type="text" name="witnessedBy" placeholder="...">
        <h3>Prepared and Submitted by (Rank/Name/Designation of Officer)</h3>
        <input type="text" name="preparedBy" placeholder="...">

        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="name" value="<?php echo $name;?>">
        <input type="hidden" name="username" value="<?php echo $username;?>">
        <input type="hidden" name="place" value="<?php echo $place;?>">
        <input type="hidden" name="barangay" value="<?php echo $barangay;?>">
        <input type="hidden" name="description" value="<?php echo $description;?>">
        <input type="hidden" name="file" value="<?php echo $file;?>">
        <input type="hidden" name="type" value="<?php echo $type;?>">
        <input type="hidden" name="incident" value="<?php echo $incident;?>">
        <input type="hidden" name="time" value="<?php echo $time;?>">
        <input type="hidden" name="status" value="<?php echo $status;?>">
        <input type="hidden" name="emergency" value="<?php echo $emergency;?>">
        <input type="hidden" name="crime" value="<?php echo $crime;?>">
        <input type="hidden" name="latitude" value="<?php echo $latitude;?>">
        <input type="hidden" name="longitude" value="<?php echo $longitude;?>">
        <hr>
        <input type="submit" name="submit">
        </form>  
        </div>
<?php
}}
?>
        
</body>
</html>