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
    <title> View Reports | R & R </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/viewR.css">
    <link rel="stylesheet" href="./css/popup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFimWZwIvDnYDZS0pKqz25yCBY10DTzm4&signed_in=true&libraries=visualization&callback=initMap">></script>
    <style> html, body, #map_canvas {
    margin: 0;
    padding: 0;
    height: 100%}
</style>
    <script>
            <?php 
            require 'connection.php';
            $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
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
    
    <section>
    <div class="blankWhite">
    <br>
</div>
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
        include_once('B_Userheader.html');
        Print '</nav>';
        Print '<div class="viewRepHead">Report Details</div>';
        Print '<table class="viewReportsTable">';
            
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
             <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
            </table>
            <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
            </tr>
            </table>
            <table class="viewReportsTable">
             <tr>
             <div class="reportProof"><?php echo "location of incident"?></div>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            
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

            <div class="reportProof"><?php echo "Proof of Incident"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
             <div class="viewReportStatusUpdate">  
                <?php
                $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form>
                    <?php
                    }
                }
                ?>                   
            </div>

                <div id="submitted" class="desc desc-submitted">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/reportsubmitted.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Submitted</label>
                        </div>
                    </div>
                </div>

                <div id="progress" class="desc desc-progress">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/processed.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">In progress</label>
                        </div>
                    </div>
                </div>

                <div id="otw" class="desc desc-otw">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/otw.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">On the way</label>
                        </div>
                    </div>
                </div>

                <div id="complete" class="desc desc-complete">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/finished.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Finish</label>
                        </div>
                    </div>
                </div>
<?php
}}else if(mysqli_num_rows($row_f) > 0)
{
    Print '<nav>';
    include_once('F_Userheader.html');
    Print '</nav>';
    Print '<div class="viewRepHead">Report Details</div>';
    Print '<table class="viewReportsTable">';
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = ($_POST['id']);
        }
        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
        ?>
         <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
            </table>
            <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
            </tr>
            </table>
            <table class="viewReportsTable">
             <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 500px; height: 500px;"></div></div></td>
             </tr>
            </table>
            
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



            <div class="reportProof"><?php echo "Proof of Incident"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
             <div class="viewReportStatusUpdate">  
             <?php
                $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form>
                    <?php
                    }
                }
                ?>
                </div>

                <div id="submitted" class="desc desc-submitted">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/reportsubmitted.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Submitted</label>
                        </div>
                    </div>
                </div>

                <div id="progress" class="desc desc-progress">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/processed.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">In progress</label>
                        </div>
                    </div>
                </div>

                <div id="otw" class="desc desc-otw">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/otw.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">On the way</label>
                        </div>
                    </div>
                </div>

                <div id="complete" class="desc desc-complete">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/finished.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Finish</label>
                        </div>
                    </div>
                </div>

<?php

}}else if(mysqli_num_rows($row_p) > 0)
{
    Print '<nav>';
    include_once('P_Userheader.html');
    Print '</nav>';
    Print '<div class="viewRepHead">Report Details</div>';
    Print '<table class="viewReportsTable">';
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = ($_POST['id']);
        }
        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
        ?>
         <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
            </table>
            <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
            </tr>
            </table>
            <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
            </tr>
            </table>
            


            <table class="viewReportsTable">
             <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 500px; height: 500px;"></div></div></td>
             </tr>
            </table>
            
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
                
            <div class="reportProof"><?php echo "Proof of Incidents"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
            <div class="viewReportStatusUpdate">  
            <?php
                $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form>
                    <?php
                    }
                }
                ?>
                </div>

                <div id="submitted" class="desc desc-submitted">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/reportsubmitted.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Submitted</label>
                        </div>
                    </div>
                </div>

                <div id="progress" class="desc desc-progress">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/processed.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">In progress</label>
                        </div>
                    </div>
                </div>

                <div id="otw" class="desc desc-otw">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/otw.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">On the way</label>
                        </div>
                    </div>
                </div>

                <div id="complete" class="desc desc-complete">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/finished.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Finish</label>
                        </div>
                    </div>
                </div>

<?php

}}else{
        include_once('Userheader.html');
        Print '<div class="viewRepHead">Report Details</div>';
        Print '<table class="viewReportsTable">';
            
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $id = ($_POST['id']);
            }
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
             </tr>
            </table>
             <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
             </tr>
            </table>
            <table class="viewReportsTable">
             <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 500px; height: 500px;"></div></div></td>
             </tr>
            </table>
            
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
             
            <div class="reportProof"><?php echo "Proof of Incident"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
            <div class="viewReportStatusUpdate">  
            </div>

                <div id="submitted" class="desc desc-submitted">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/reportsubmitted.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Submitted</label>
                        </div>
                    </div>
                </div>

                <div id="progress" class="desc desc-progress">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/processed.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">In progress</label>
                        </div>
                    </div>
                </div>

                <div id="otw" class="desc desc-otw">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/otw.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">On the way</label>
                        </div>
                    </div>
                </div>

                <div id="complete" class="desc desc-complete">
                <div class="progress--attention" style="text-align:center;">
                
                        <div class="inlineimage">
                                <h1 style="font-size:48px; margin-bottom: 1px black">Current status</h1>
                                <img src="./assets/status/finished.png" style="width: 200px; margin-left: 2em;">
                                
                        </div>

                        <div class="inlinetext">
                            <label style="font-size:32px;">Finish</label>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
            ?>

            
        </table>
        <br>
    </section>
</body>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</html>