<?php
$url = "";
$url != 'viewReports.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: B_profile.php'); //redirect to some other page
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | View</title>
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
            $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
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
            $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$user."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {
                $b_id = $row['id'];
            }

            $query = mysqli_query($con, "SELECT * from reports LEFT JOIN b_admin ON reports.admin_id = b_admin.id where reports.report_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
            <h3>Accepted By: <?php echo $row['b_fname']; echo " "; echo $row['b_lname'];?></h3>
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
                <td><a id="myBtn">View Image</a></td>
                <!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <img src="<?php echo 'reportFIles/'.$row['file'];?>" alt="Proof">
  </div>

</div>
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
            var myLatlng = new google.maps.LatLng(<?php echo $row['lat']?>,<?php echo $row['lng']?>);

            var myOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                };

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            var marker = new google.maps.Marker({
                
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());

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

            
            
             <div class="viewReportStatusUpdate">  
                <?php
                if($user == "b_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports INNER JOIN civilians ON reports.usernames = civilians.username where report_id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST" id="myEmail">
                        <input type="hidden" id="name" value="AidPack | R & R">
                        <input type="hidden" id="email" value="<?php echo $row['email'];?>">
                        <input type="hidden" id="subject" value="Reports from AidPack | R & R">
                        <input type="hidden" id="body" value="Your report has been accepted! Please take note of the tips and keep calm! Thank you for reporting and stay safe!">

                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $b_id;?>">
                        <input type="submit" value="Accept Report" onclick="sendEmail1()">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="B_assigned.php" method="POST" id="myEmail">
                        <input type="hidden" id="name" value="AidPack | R & R">
                        <input type="hidden" id="email" value="<?php echo $row['email'];?>">
                        <input type="hidden" id="subject" value="Reports from AidPack | R & R">
                        <input type="hidden" id="body" value="Someone has been assigned to go to your place and they are on the way already! Thank you for your patience and keep safe again!">

                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch" onclick="sendEmail1()">
                        </form><br>
                    <?php
                    }
                }
                }
                ?>                   
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

        require 'connection.php';    
        $queryID = mysqli_query($con, "SELECT * from f_admin WHERE f_admin.username = '".$user."' LIMIT 1");
        while($row = mysqli_fetch_array($queryID))
        {
            $f_id = $row['id'];
        }

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = ($_POST['id']);
        }   
        $query = mysqli_query($con, "SELECT * from reports LEFT JOIN f_admin ON reports.admin_id = f_admin.id where reports.report_id = '$id'"); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <h3>Accepted By: <?php echo $row['f_name'];?></h3>
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
                <td><a id="myBtn">View Image</a></td>
                <!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php echo 'reportFIles/'.$row['file'];?>
  </div>

</div>

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



<div class="viewReportStatusUpdate">  
                <?php
                if($user == "f_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports INNER JOIN civilians ON reports.usernames = civilians.username where report_id = '$id'"); // SQL Query
                while($row = mysqli_fetch_array($query))
                {

                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST" id="myEmail">
                        <input type="hidden" id="name" value="AidPack | R & R">
                        <input type="hidden" id="email" value="<?php echo $row['email'];?>">
                        <input type="hidden" id="subject" value="Reports from AidPack | R & R">
                        <input type="hidden" id="body" value="Your report has been accepted! Please take note of the tips and keep calm! Thank you for reporting and stay safe!">

                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $f_id;?>">
                        <input type="submit" value="Accept Report" onclick="sendEmail1()">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="F_assigned.php" method="POST" id="myEmail">
                        <input type="hidden" id="name" value="AidPack | R & R">
                        <input type="hidden" id="email" value="<?php echo $row['email'];?>">
                        <input type="hidden" id="subject" value="Reports from AidPack | R & R">
                        <input type="hidden" id="body" value="Someone has been assigned to go to your place and they are on the way already! Thank you for your patience and keep safe again!">

                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch" onclick="sendEmail1()">
                        </form><br>
                    <?php
                    }
                }
                }
                ?>                   
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
        $queryID = mysqli_query($con, "SELECT * from p_admin WHERE p_admin.username = '".$user."' LIMIT 1");
        while($row = mysqli_fetch_array($queryID))
        {
            $p_id = $row['id'];
        }

        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from reports LEFT JOIN p_admin ON reports.admin_id = p_admin.id where reports.report_id = '$id'"); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <h3>Accepted By: <?php echo $row['p_name'];?></h3>
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
          
<div class="viewReportStatusUpdate">  
                <?php
                if($user == "p_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports INNER JOIN civilians ON reports.usernames = civilians.username where report_id = '$id'"); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST" id="myEmail">
                        <input type="hidden" id="name" value="AidPack | R & R">
                        <input type="hidden" id="email" value="<?php echo $row['email'];?>">
                        <input type="hidden" id="subject" value="Reports from AidPack | R & R">
                        <input type="hidden" id="body" value="Your report has been accepted! Please take note of the tips and keep calm! Thank you for reporting and stay safe!">

                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $p_id;?>">
                        <input type="submit" value="Accept Report" onclick="sendEmail1()">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="P_assigned.php" method="POST" id="myEmail">
                        <input type="hidden" id="name" value="AidPack | R & R">
                        <input type="hidden" id="email" value="<?php echo $row['email'];?>">
                        <input type="hidden" id="subject" value="Reports from AidPack | R & R">
                        <input type="hidden" id="body" value="Someone has been assigned to go to your place and they are on the way already! Thank you for your patience and keep safe again!">

                        <input type="hidden" name="id" value="<?php echo $id;?>">              
                        <input type="submit" value="Assign/Dispatch" onclick="sendEmail1()">
                        </form><br>
                    <?php
                    }
                    
                }
                }
                ?>                   
            </div>
<?php

}}else{
        include_once('Userheader.php');
        
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

            <?php
            }
        }
            ?>
        
</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function sendEmail1()
    {
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body))
        {
            $.ajax({
                url: 'sendEmail1.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val(),
                }, success: function(response){
                    $('#myEmail')[0].reset();
                    $('.sent-notification').text("Message Sent!");
                }
            });
        }
    }
    function isNotEmpty(caller){
        if(caller.val() == ""){
            caller.css('border', '1px solid red');
            return false;
        }else{
            caller.css('border', '');
            return true;
        }
    }
    </script>
</html>