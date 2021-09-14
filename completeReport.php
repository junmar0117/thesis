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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> R & R | View Report </title>
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
            $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
                $id = $row['id'];
                $name = $row['name'];
                $username = $row['username'];
                $date = $row['date'];
                $time = $row['time'];
                $place = $row['place'];
                $incident = $row['incident'];
                $description = $row['description'];
                $file = $row['file'];
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
                $barangay = $row['barangay'];
                $type = $row['type'];
                $status = $row['status'];
                $emergency = $row['emergency'];
                $crime = $row['crime'];
            ?>
             <tr>
             <th><?php echo "Name"?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username"?></th>
             <td><?php echo $row['username']  ?></td>
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
            </div>

            <script>
            var map;

            function initialize() {
            var myLatlng = new google.maps.LatLng(<?php echo $row['latitude']?>,<?php echo $row['longitude']?>);

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
        <input type="text" name="who" placeholder="Who was involved?">
        <input type="datetime-local" name="when" placeholder="When did it take place?">
        <input type="text" name="why" placeholder="Why did it happen?">
        <input type="text" name="how" placeholder="How did it happen?">
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
        <input type="submit" name="submit">
        </form>  
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
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
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
            </div>

            
            <script>
            var map;

            function initialize() {
            var myLatlng = new google.maps.LatLng(<?php echo $row['latitude']?>,<?php echo $row['longitude']?>);

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
        <input type="text" name="who" placeholder="Who was involved?">
        <input type="datetime-local" name="when" placeholder="When did it take place?">
        <input type="text" name="why" placeholder="Why did it happen?">
        <input type="text" name="how" placeholder="How did it happen?">
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
        <input type="submit" name="submit">
        </form>  
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
        $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
                $id = $row['id'];
                $name = $row['name'];
                $username = $row['username'];
                $date = $row['date'];
                $time = $row['time'];
                $place = $row['place'];
                $incident = $row['incident'];
                $description = $row['description'];
                $file = $row['file'];
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
                $barangay = $row['barangay'];
                $type = $row['type'];
                $status = $row['status'];
                $emergency = $row['emergency'];
                $crime = $row['crime'];
        ?>
         <tr>
             <th><?php echo "Name"?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username"?></th>
             <td><?php echo $row['username']  ?></td>
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
            </div>
            
            <script>
            var map;

            function initialize() {
            var myLatlng = new google.maps.LatLng(<?php echo $row['latitude']?>,<?php echo $row['longitude']?>);

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
        <input type="text" name="who" placeholder="Who was involved?" required>
        <input type="datetime-local" name="when" placeholder="When did it take place?" required>
        <input type="text" name="why" placeholder="Why did it happen?" required>
        <input type="text" name="how" placeholder="How did it happen?" required>
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
        <input type="submit" name="submit">
        </form>  
<?php
}}
?>
        
</body>
</html>