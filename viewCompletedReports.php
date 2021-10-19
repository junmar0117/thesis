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
    $report_id = ($_POST['report_id']);
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
            $query = mysqli_query($con, "SELECT * from reports where report_id = '$report_id' "); // SQL Query
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
        Print '<h1>User Information</h1>';
        Print '<table class="viewReportsTable">';
            if(isset($_POST['vaw']))
            {
            require 'connection.php';    
            $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$user."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {
                $b_id = $row['id'];
            }

            $query = mysqli_query($con, "SELECT * from complete_report_vaw LEFT JOIN b_admin ON complete_report_vaw.completed_by_admin_id = b_admin.id where complete_report_vaw.c_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
            <h3>Accepted By: <?php echo $row['b_fname']; echo " "; echo $row['b_lname'];?></h3>
            <tr>
             <th><?php echo "ID: ";?></th> 
             <td><?php  echo $row['c_id']; ?></td>
             <th><?php echo "Time Report Sent: "?></th>
             <td><?php echo $row['report_timesent']  ?></td>
             </tr>

             <tr>
             <th><?php echo "Name: "?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username: "?></th>
             <td><?php echo $row['username']  ?></td>
             </tr>
            </table>

            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Type: "?></th>
             <td><?php echo $row['type']  ?></td>            
             <th><?php echo "Incident: "?></th>
             <td><?php echo $row['incident'];?></td>
            </tr>
             <th><?php echo "Date: "?></th>
             <td><?php echo $row['incident_time_date']?></td>
             </tr>
             <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']?></td>
             <th><?php echo "Place: "?></th>
             <td><?php echo $row['place']?></td>         
            </tr>
            <tr>
            <th><?php echo "Crime: "?></th>
             <td><?php echo $row['crime']  ?></td>
             <th><?php echo "Emergency: "?></th>
             <td><?php echo $row['emergency']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>
            
            <h1>Description</h1>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>     

            <h1><?php echo "Proof of Incident: "?></h1>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>

            <h1><?php echo "Location of Incident: "?></h1>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
        
            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Handling Organization: "?></th>
             <td><?php echo $row['handling_organization']  ?></td>            
             <th><?php echo "When did it take place?: "?></th>
             <td><?php echo $row['when'];?></td>
            </tr>
            </table>

            <h1>Location Address</h1>

            <table class="viewReportsTable">
             <th><?php echo "Address: "?></th>
             <td><?php echo $row['address']?></td>
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['region']?></td>
            </tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['province']?></td>   
             <th><?php echo "City: "?></th>
             <td><?php echo $row['city']  ?></td>
            </tr>
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']  ?></td>              
             </tr>           
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>

            <h1>Intake By</h1>

            <table class="viewReportsTable">
             <th><?php echo "Intake By: "?></th>
             <td><?php echo $row['intake_by']?></td>
             <th><?php echo "Position: "?></th>
             <td><?php echo $row['position']?></td>
            </tr>
            <tr>
             <th><?php echo "Case Manager: "?></th>
             <td><?php echo $row['case_manager']?></td> 
            </tr>  
            </table>

            <h1>Victim Information</h1>

            <table class="viewReportsTable">
             <th><?php echo "Victim Name: "?></th>
             <td><?php echo $row['victim_name']?></td>
             <th><?php echo "Victim Sex: "?></th>
             <td><?php echo $row['sex']?></td>
            </tr>
            <tr>
             <th><?php echo "Victim Date of Birth: "?></th>
             <td><?php echo $row['date_of_birth']?></td> 
             <th><?php echo "Victim Age: "?></th>
             <td><?php echo $row['age']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Victim Civil Status: "?></th>
             <td><?php echo $row['civil_status']?></td> 
             <th><?php echo "Victim Educational Attainment: "?></th>
             <td><?php echo $row['educational_attainment']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Nationality: "?></th>
             <td><?php echo $row['nationality']?></td> 
             <th><?php echo "Victim Passport No: "?></th>
             <td><?php echo $row['passport_no']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Occupation: "?></th>
             <td><?php echo $row['occupation']?></td> 
             <th><?php echo "Victim Religion: "?></th>
             <td><?php echo $row['religion']?></td> 
            </tr>
            <tr>
             <th><?php echo "Victim Address: "?></th>
             <td><?php echo $row['victim_address']?></td> 
             <th><?php echo "Victim Region: "?></th>
             <td><?php echo $row['victim_region']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Province: "?></th>
             <td><?php echo $row['victim_province']?></td> 
             <th><?php echo "Victim City: "?></th>
             <td><?php echo $row['victim_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Barangay: "?></th>
             <td><?php echo $row['victim_barangayy']?></td> 
            </tr>  
            <tr>
             <th><?php echo "With Disability: "?></th>
             <td><?php echo $row['with_disability']?></td> 
             <th><?php echo "Disability: "?></th>
             <td><?php echo $row['disability']?></td> 
            </tr>   
            <tr>
             <th><?php echo "No. Of Children: "?></th>
             <td><?php echo $row['no_of_children']?></td> 
             <th><?php echo "Ages Of Children: "?></th>
             <td><?php echo $row['ages_of_children']?></td> 
            </tr>   
            </table>

            <h1>Perpetrator Information</h1>

            <table class="viewReportsTable">
             <th><?php echo "Perpetrator Name: "?></th>
             <td><?php echo $row['perpetrator_name']?></td>
             <th><?php echo "Perpetrator Alias: "?></th>
             <td><?php echo $row['alias']?></td>
            </tr>
            <tr>
             <th><?php echo "Perpetrator Sex: "?></th>
             <td><?php echo $row['perpetrator_sex']?></td> 
             <th><?php echo "Perpetrator Date of Birth: "?></th>
             <td><?php echo $row['perpetrator_date_of_birth']?></td>             
            </tr> 
            <tr>
            <th><?php echo "Perpetrator Age: "?></th>
             <td><?php echo $row['perpetrator_age']?></td> 
             <th><?php echo "Perpetrator Civil Status: "?></th>
             <td><?php echo $row['perpetrator_civil_status']?></td>             
            </tr>   
            <tr>
             <th><?php echo "Perpetrator Educational Attainment: "?></th>
             <td><?php echo $row['perpetrator_educational_attainment']?></td> 
             <th><?php echo "Perpetrator Nationality: "?></th>
             <td><?php echo $row['perpetrator_nationality']?></td>              
            </tr>   
            <tr>
             <th><?php echo "Perpetrator Passport No: "?></th>
             <td><?php echo $row['perpetrator_passport_no']?></td> 
             <th><?php echo "Perpetrator Occupation: "?></th>
             <td><?php echo $row['perpetrator_occupation']?></td>             
            </tr>
            <tr>
             <th><?php echo "Perpetrator Religion: "?></th>
             <td><?php echo $row['perpetrator_religion']?></td> 
             <th><?php echo "Perpetrator Address: "?></th>
             <td><?php echo $row['perpetrator_address']?></td>              
            </tr>   
            <tr>
             <th><?php echo "Perpetrator Region: "?></th>
             <td><?php echo $row['perpetrator_region']?></td>
             <th><?php echo "Perpetrator Province: "?></th>
             <td><?php echo $row['perpetrator_province']?></td>            
            </tr>   
            <tr>
             <th><?php echo "Perpetrator City: "?></th>
             <td><?php echo $row['perpetrator_city']?></td> 
             <th><?php echo "Perpetrator Barangay: "?></th>
             <td><?php echo $row['perpetrator_barangayy']?></td>            
            </tr>  
            <tr>
             <th><?php echo "Relationship of Perpetrator to Victim: "?></th>
             <td><?php echo $row['relationship_perpetrator_to_victim']?></td>
            </tr>
            </table>

            <h1><b>Additional Incident Information</b></h1>
            <h3>RA9262: Anti Violence Against Women and Their Children Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Sexual Abuse: "?></th>
             <td><?php echo $row['sexual_abuse']?></td> 
             <th><?php echo "Psychological: "?></th>
             <td><?php echo $row['psychological']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical1']?></td> 
             <th><?php echo "Economic: "?></th>
             <td><?php echo $row['economic']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_incident']?></td> 
            </tr>
            </table>

            <h3>RA8353: Anti-Rape Law of 1995</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Rape by Sexual Intercourse: "?></th>
             <td><?php echo $row['rape_sexual_intercourse']?></td> 
             <th><?php echo "Rape by Sexual Assault: "?></th>
             <td><?php echo $row['rape_sexual_assault']?></td> 
            </tr>   
            </table>

            <h3>RA7877: Anti-Sexual Harassment Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Verbal: "?></th>
             <td><?php echo $row['verbal']?></td> 
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical2']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Use of objects, pictures, letters, or notes with sexual under-pinnings: "?></th>
             <td><?php echo $row['use_of_objects']?></td> 
            </tr>
            </table>

            <h3>RA7610: Special Protection of Children Against Child Abuse, Exploitation and Discrimination Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Engage, facilitate, promote, or attempt to commit child prostitution: "?></th>
             <td><?php echo $row['child_prostitution']?></td> 
             <th><?php echo "Sexual intercourse or lascivious conduct: "?></th>
             <td><?php echo $row['lascivious_conduct']?></td> 
            </tr>   
            </table>

            <h3>RA9208: Anti-Trafficking in Persons Act of 2003</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9208: Anti-Trafficking in Persons Act of 2003: "?></th>
             <td><?php echo $row['anti_trafficking']?></td> 
            </tr>   
            </table>

            <h3>RA9775: Anti-Child Pornography Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9775: Anti-Child Pornography Act: "?></th>
             <td><?php echo $row['anti_child_porn']?></td> 
            </tr>   
            </table>

            <h3>RA9995: Anti-Photo and Video Voyeurism Act 2009</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9995: Anti-Photo and Video Voyeurism Act 2009: "?></th>
             <td><?php echo $row['anti_voyeurism']?></td>  
            </tr>   
            </table>

            <h3>Revised Penal Code</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Art 336: Acts of Lasciviousness: "?></th>
             <td><?php echo $row['acts_of_lasciviousness']?></td> 
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_penal_code']?></td> 
            </tr>   
            </table>

            <br>
            
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Description:"?></th>
            <td><?php echo $row['description_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Date of Latest Incident: "?></th>
            <td><?php echo $row['date_latest_incident']?></td> 
            <th><?php echo "Geographic Location of Incident: "?></th>
            <td><?php echo $row['incident_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Region: "?></th>
            <td><?php echo $row['incident_region']?></td> 
            <th><?php echo "Province: "?></th>
            <td><?php echo $row['incident_province']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "City/Mun: "?></th>
            <td><?php echo $row['incident_city']?></td> 
            <th><?php echo "Barangay: "?></th>
            <td><?php echo $row['incident_barangayy']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <h1>Witnesses</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Names: "?></th>
            <td><?php echo $row['witness_names']?></td> 
            <th><?php echo "Witness Address: "?></th>
            <td><?php echo $row['witness_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Contact No.: "?></th>
            <td><?php echo $row['witness_contact_no']?></td> 
            </tr>   
            </table>

            <h1>Note</h1>
            <h3>If the victim does not want to continue or pursue the case, please indicate herein the reason: </h3>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lost of interest to file: "?></th>
            <td><?php echo $row['lost_of_interest']?></td> 
            <th><?php echo "Reconciled with the perpetrator (w/o mediation): "?></th>
            <td><?php echo $row['reconciled']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Transfer Residence: "?></th>
            <td><?php echo $row['transfer_residence']?></td> 
            <th><?php echo "Lack of support: "?></th>
            <td><?php echo $row['lack_of_support']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lack of confidence with service provider: "?></th>
            <td><?php echo $row['lack_of_confidence']?></td> 
            <th><?php echo "Others: "?></th>
            <td><?php echo $row['others_case']?></td> 
            </tr>   
            </table>
            </div>

            <!-- -->
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
                
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script>

            
            
             <div class="viewReportStatusUpdate">  
                <?php
                if($user == "b_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $b_id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="B_assigned.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form><br>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="completeReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form><br>
                    <?php
                    }
                }
                }
            }
                ?>                   
            </div>
            
<?php
}else if(isset($_POST['vawchild']))
{
            require 'connection.php';    
            $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$user."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {
                $b_id = $row['id'];
            }

            $query = mysqli_query($con, "SELECT * from complete_report_vawchild LEFT JOIN b_admin ON complete_report_vawchild.completed_by_admin_id = b_admin.id where complete_report_vawchild.c_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
            <h3>Accepted By: <?php echo $row['b_fname']; echo " "; echo $row['b_lname'];?></h3>
            <tr>
             <th><?php echo "ID: ";?></th> 
             <td><?php  echo $row['c_id']; ?></td>
             <th><?php echo "Time Report Sent: "?></th>
             <td><?php echo $row['report_timesent']  ?></td>
             </tr>

             <tr>
             <th><?php echo "Name: "?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username: "?></th>
             <td><?php echo $row['username']  ?></td>
             </tr>
            </table>

            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Type: "?></th>
             <td><?php echo $row['type']  ?></td>            
             <th><?php echo "Incident: "?></th>
             <td><?php echo $row['incident'];?></td>
            </tr>
             <th><?php echo "Date: "?></th>
             <td><?php echo $row['incident_time_date']?></td>
             </tr>
             <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']?></td>
             <th><?php echo "Place: "?></th>
             <td><?php echo $row['place']?></td>         
            </tr>
            <tr>
            <th><?php echo "Crime: "?></th>
             <td><?php echo $row['crime']  ?></td>
             <th><?php echo "Emergency: "?></th>
             <td><?php echo $row['emergency']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>
            
            <h1>Description</h1>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>     

            <h1><?php echo "Proof of Incident: "?></h1>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>

            <h1><?php echo "Location of Incident: "?></h1>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
        
            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Handling Organization: "?></th>
             <td><?php echo $row['handling_organization']  ?></td>            
             <th><?php echo "When did it take place?: "?></th>
             <td><?php echo $row['when'];?></td>
            </tr>
            </table>

            <h1>Location Address</h1>

            <table class="viewReportsTable">
             <th><?php echo "Address: "?></th>
             <td><?php echo $row['address']?></td>
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['region']?></td>
            </tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['province']?></td>   
             <th><?php echo "City: "?></th>
             <td><?php echo $row['city']  ?></td>
            </tr>
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']  ?></td>              
             </tr>           
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>

            <h1>Intake By</h1>

            <table class="viewReportsTable">
             <th><?php echo "Intake By: "?></th>
             <td><?php echo $row['intake_by']?></td>
             <th><?php echo "Position: "?></th>
             <td><?php echo $row['position']?></td>
            </tr>
            <tr>
             <th><?php echo "Case Manager: "?></th>
             <td><?php echo $row['case_manager']?></td> 
            </tr>  
            </table>

            <h1>Victim Information (Child)</h1>

            <table class="viewReportsTable">
             <th><?php echo "Name of Parent/Guardian: "?></th>
             <td><?php echo $row['parent_guardian']?></td>
             <th><?php echo "Relationship of Guardian to Victim-Survivor: "?></th>
             <td><?php echo $row['relationship_of_guardain']?></td>
            </tr>
            <tr>
             <th><?php echo "Address of the Guardian: "?></th>
             <td><?php echo $row['parentguardian_address']?></td> 
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['parentguardian_region']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['parentguardian_province']?></td> 
             <th><?php echo "City/Mun.: "?></th>
             <td><?php echo $row['parentguardian_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['parentguardian_barangayy']?></td> 
             <th><?php echo "Contact No. of Parent/Guardian: "?></th>
             <td><?php echo $row['contact_no_parent_guardian']?></td> 
            </tr>  
            </table>

            <h1>Perpetrator Information (Child)</h1>

            <table class="viewReportsTable">
             <th><?php echo "Name of Parent/Guardian: "?></th>
             <td><?php echo $row['perpetrator_name']?></td>
             <th><?php echo "Relationship of Guardian to Victim-Survivor: "?></th>
             <td><?php echo $row['rel_guardian_to_victim']?></td>
            </tr>
            <tr>
             <th><?php echo "Address of the Guardian: "?></th>
             <td><?php echo $row['guardian_address']?></td> 
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['guardian_region']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['guardian_province']?></td> 
             <th><?php echo "City/Mun.: "?></th>
             <td><?php echo $row['guardian_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['guardian_barangayy']?></td> 
             <th><?php echo "Contact No. of Parent/Guardian: "?></th>
             <td><?php echo $row['contact_parent']?></td> 
            </tr>  
            </table>

            <h1><b>Additional Incident Information</b></h1>
            <h3>RA9262: Anti Violence Against Women and Their Children Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Sexual Abuse: "?></th>
             <td><?php echo $row['sexual_abuse']?></td> 
             <th><?php echo "Psychological: "?></th>
             <td><?php echo $row['psychological']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical1']?></td> 
             <th><?php echo "Economic: "?></th>
             <td><?php echo $row['economic']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_incident']?></td> 
            </tr>
            </table>

            <h3>RA8353: Anti-Rape Law of 1995</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Rape by Sexual Intercourse: "?></th>
             <td><?php echo $row['rape_sexual_intercourse']?></td> 
             <th><?php echo "Rape by Sexual Assault: "?></th>
             <td><?php echo $row['rape_sexual_assault']?></td> 
            </tr>   
            </table>

            <h3>RA7877: Anti-Sexual Harassment Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Verbal: "?></th>
             <td><?php echo $row['verbal']?></td> 
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical2']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Use of objects, pictures, letters, or notes with sexual under-pinnings: "?></th>
             <td><?php echo $row['use_of_objects']?></td> 
            </tr>
            </table>

            <h3>RA7610: Special Protection of Children Against Child Abuse, Exploitation and Discrimination Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Engage, facilitate, promote, or attempt to commit child prostitution: "?></th>
             <td><?php echo $row['child_prostitution']?></td> 
             <th><?php echo "Sexual intercourse or lascivious conduct: "?></th>
             <td><?php echo $row['lascivious_conduct']?></td> 
            </tr>   
            </table>

            <h3>RA9208: Anti-Trafficking in Persons Act of 2003</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9208: Anti-Trafficking in Persons Act of 2003: "?></th>
             <td><?php echo $row['anti_trafficking']?></td> 
            </tr>   
            </table>

            <h3>RA9775: Anti-Child Pornography Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9775: Anti-Child Pornography Act: "?></th>
             <td><?php echo $row['anti_child_porn']?></td> 
            </tr>   
            </table>

            <h3>RA9995: Anti-Photo and Video Voyeurism Act 2009</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9995: Anti-Photo and Video Voyeurism Act 2009: "?></th>
             <td><?php echo $row['anti_voyeurism']?></td>  
            </tr>   
            </table>

            <h3>Revised Penal Code</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Art 336: Acts of Lasciviousness: "?></th>
             <td><?php echo $row['acts_of_lasciviousness']?></td> 
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_penal_code']?></td> 
            </tr>   
            </table>

            <br>
            
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Description:"?></th>
            <td><?php echo $row['description_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Date of Latest Incident: "?></th>
            <td><?php echo $row['date_latest_incident']?></td> 
            <th><?php echo "Geographic Location of Incident: "?></th>
            <td><?php echo $row['incident_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Region: "?></th>
            <td><?php echo $row['incident_region']?></td> 
            <th><?php echo "Province: "?></th>
            <td><?php echo $row['incident_province']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "City/Mun: "?></th>
            <td><?php echo $row['incident_city']?></td> 
            <th><?php echo "Barangay: "?></th>
            <td><?php echo $row['incident_barangayy']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <h1>Witnesses</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Names: "?></th>
            <td><?php echo $row['witness_names']?></td> 
            <th><?php echo "Witness Address: "?></th>
            <td><?php echo $row['witness_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Contact No.: "?></th>
            <td><?php echo $row['witness_contact_no']?></td> 
            </tr>   
            </table>

            <h1>Note</h1>
            <h3>If the victim does not want to continue or pursue the case, please indicate herein the reason: </h3>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lost of interest to file: "?></th>
            <td><?php echo $row['lost_of_interest']?></td> 
            <th><?php echo "Reconciled with the perpetrator (w/o mediation): "?></th>
            <td><?php echo $row['reconciled']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Transfer Residence: "?></th>
            <td><?php echo $row['transfer_residence']?></td> 
            <th><?php echo "Lack of support: "?></th>
            <td><?php echo $row['lack_of_support']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lack of confidence with service provider: "?></th>
            <td><?php echo $row['lack_of_confidence']?></td> 
            <th><?php echo "Others: "?></th>
            <td><?php echo $row['others_case']?></td> 
            </tr>   
            </table>
            </div>

            <!-- -->
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
                
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script>

            
            
             <div class="viewReportStatusUpdate">  
                <?php
                if($user == "b_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $b_id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="B_assigned.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form><br>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="completeReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form><br>
                    <?php
                    }
                }
                }
            }
                ?>                   
            </div>
            
<?php
}
else if(isset($_POST['vawchild']))
{
            require 'connection.php';    
            $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$user."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {
                $b_id = $row['id'];
            }

            $query = mysqli_query($con, "SELECT * from complete_report_vawchild LEFT JOIN b_admin ON complete_report_vawchild.completed_by_admin_id = b_admin.id where complete_report_vaw.c_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
            <h3>Accepted By: <?php echo $row['b_fname']; echo " "; echo $row['b_lname'];?></h3>
            <tr>
             <th><?php echo "ID: ";?></th> 
             <td><?php  echo $row['c_id']; ?></td>
             <th><?php echo "Time Report Sent: "?></th>
             <td><?php echo $row['report_timesent']  ?></td>
             </tr>

             <tr>
             <th><?php echo "Name: "?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username: "?></th>
             <td><?php echo $row['username']  ?></td>
             </tr>
            </table>

            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Type: "?></th>
             <td><?php echo $row['type']  ?></td>            
             <th><?php echo "Incident: "?></th>
             <td><?php echo $row['incident'];?></td>
            </tr>
             <th><?php echo "Date: "?></th>
             <td><?php echo $row['incident_time_date']?></td>
             </tr>
             <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']?></td>
             <th><?php echo "Place: "?></th>
             <td><?php echo $row['place']?></td>         
            </tr>
            <tr>
            <th><?php echo "Crime: "?></th>
             <td><?php echo $row['crime']  ?></td>
             <th><?php echo "Emergency: "?></th>
             <td><?php echo $row['emergency']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>
            
            <h1>Description</h1>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>     

            <h1><?php echo "Proof of Incident: "?></h1>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>

            <h1><?php echo "Location of Incident: "?></h1>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
        
            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Handling Organization: "?></th>
             <td><?php echo $row['handling_organization']  ?></td>            
             <th><?php echo "When did it take place?: "?></th>
             <td><?php echo $row['when'];?></td>
            </tr>
            </table>

            <h1>Location Address</h1>

            <table class="viewReportsTable">
             <th><?php echo "Address: "?></th>
             <td><?php echo $row['address']?></td>
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['region']?></td>
            </tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['province']?></td>   
             <th><?php echo "City: "?></th>
             <td><?php echo $row['city']  ?></td>
            </tr>
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']  ?></td>              
             </tr>           
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>

            <h1>Intake By</h1>

            <table class="viewReportsTable">
             <th><?php echo "Intake By: "?></th>
             <td><?php echo $row['intake_by']?></td>
             <th><?php echo "Position: "?></th>
             <td><?php echo $row['position']?></td>
            </tr>
            <tr>
             <th><?php echo "Case Manager: "?></th>
             <td><?php echo $row['case_manager']?></td> 
            </tr>  
            </table>

            <h1>Victim Information (Child)</h1>

            <table class="viewReportsTable">
             <th><?php echo "Name of Parent/Guardian: "?></th>
             <td><?php echo $row['parent_guardian']?></td>
             <th><?php echo "Relationship of Guardian to Victim-Survivor: "?></th>
             <td><?php echo $row['relationship_of_guardain']?></td>
            </tr>
            <tr>
             <th><?php echo "Address of the Guardian: "?></th>
             <td><?php echo $row['parentguardian_address']?></td> 
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['parentguardian_region']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['parentguardian_province']?></td> 
             <th><?php echo "City/Mun.: "?></th>
             <td><?php echo $row['parentguardian_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['parentguardian_barangayy']?></td> 
             <th><?php echo "Contact No. of Parent/Guardian: "?></th>
             <td><?php echo $row['contact_no_parent_guardian']?></td> 
            </tr>  
            </table>

            <h1>Perpetrator Information (Child)</h1>

            <table class="viewReportsTable">
             <th><?php echo "Name of Parent/Guardian: "?></th>
             <td><?php echo $row['perpetrator_name']?></td>
             <th><?php echo "Relationship of Guardian to Victim-Survivor: "?></th>
             <td><?php echo $row['rel_guardian_to_victim']?></td>
            </tr>
            <tr>
             <th><?php echo "Address of the Guardian: "?></th>
             <td><?php echo $row['guardian_address']?></td> 
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['guardian_region']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['guardian_province']?></td> 
             <th><?php echo "City/Mun.: "?></th>
             <td><?php echo $row['guardian_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['guardian_barangayy']?></td> 
             <th><?php echo "Contact No. of Parent/Guardian: "?></th>
             <td><?php echo $row['contact_parent']?></td> 
            </tr>  
            </table>

            <h1><b>Additional Incident Information</b></h1>
            <h3>RA9262: Anti Violence Against Women and Their Children Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Sexual Abuse: "?></th>
             <td><?php echo $row['sexual_abuse']?></td> 
             <th><?php echo "Psychological: "?></th>
             <td><?php echo $row['psychological']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical1']?></td> 
             <th><?php echo "Economic: "?></th>
             <td><?php echo $row['economic']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_incident']?></td> 
            </tr>
            </table>

            <h3>RA8353: Anti-Rape Law of 1995</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Rape by Sexual Intercourse: "?></th>
             <td><?php echo $row['rape_sexual_intercourse']?></td> 
             <th><?php echo "Rape by Sexual Assault: "?></th>
             <td><?php echo $row['rape_sexual_assault']?></td> 
            </tr>   
            </table>

            <h3>RA7877: Anti-Sexual Harassment Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Verbal: "?></th>
             <td><?php echo $row['verbal']?></td> 
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical2']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Use of objects, pictures, letters, or notes with sexual under-pinnings: "?></th>
             <td><?php echo $row['use_of_objects']?></td> 
            </tr>
            </table>

            <h3>RA7610: Special Protection of Children Against Child Abuse, Exploitation and Discrimination Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Engage, facilitate, promote, or attempt to commit child prostitution: "?></th>
             <td><?php echo $row['child_prostitution']?></td> 
             <th><?php echo "Sexual intercourse or lascivious conduct: "?></th>
             <td><?php echo $row['lascivious_conduct']?></td> 
            </tr>   
            </table>

            <h3>RA9208: Anti-Trafficking in Persons Act of 2003</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9208: Anti-Trafficking in Persons Act of 2003: "?></th>
             <td><?php echo $row['anti_trafficking']?></td> 
            </tr>   
            </table>

            <h3>RA9775: Anti-Child Pornography Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9775: Anti-Child Pornography Act: "?></th>
             <td><?php echo $row['anti_child_porn']?></td> 
            </tr>   
            </table>

            <h3>RA9995: Anti-Photo and Video Voyeurism Act 2009</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9995: Anti-Photo and Video Voyeurism Act 2009: "?></th>
             <td><?php echo $row['anti_voyeurism']?></td>  
            </tr>   
            </table>

            <h3>Revised Penal Code</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Art 336: Acts of Lasciviousness: "?></th>
             <td><?php echo $row['acts_of_lasciviousness']?></td> 
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_penal_code']?></td> 
            </tr>   
            </table>

            <br>
            
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Description:"?></th>
            <td><?php echo $row['description_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Date of Latest Incident: "?></th>
            <td><?php echo $row['date_latest_incident']?></td> 
            <th><?php echo "Geographic Location of Incident: "?></th>
            <td><?php echo $row['incident_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Region: "?></th>
            <td><?php echo $row['incident_region']?></td> 
            <th><?php echo "Province: "?></th>
            <td><?php echo $row['incident_province']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "City/Mun: "?></th>
            <td><?php echo $row['incident_city']?></td> 
            <th><?php echo "Barangay: "?></th>
            <td><?php echo $row['incident_barangayy']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <h1>Witnesses</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Names: "?></th>
            <td><?php echo $row['witness_names']?></td> 
            <th><?php echo "Witness Address: "?></th>
            <td><?php echo $row['witness_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Contact No.: "?></th>
            <td><?php echo $row['witness_contact_no']?></td> 
            </tr>   
            </table>

            <h1>Note</h1>
            <h3>If the victim does not want to continue or pursue the case, please indicate herein the reason: </h3>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lost of interest to file: "?></th>
            <td><?php echo $row['lost_of_interest']?></td> 
            <th><?php echo "Reconciled with the perpetrator (w/o mediation): "?></th>
            <td><?php echo $row['reconciled']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Transfer Residence: "?></th>
            <td><?php echo $row['transfer_residence']?></td> 
            <th><?php echo "Lack of support: "?></th>
            <td><?php echo $row['lack_of_support']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lack of confidence with service provider: "?></th>
            <td><?php echo $row['lack_of_confidence']?></td> 
            <th><?php echo "Others: "?></th>
            <td><?php echo $row['others_case']?></td> 
            </tr>   
            </table>
            </div>

            <!-- -->
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
                
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script>

            
            
             <div class="viewReportStatusUpdate">  
                <?php
                if($user == "b_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $b_id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="B_assigned.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form><br>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="completeReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form><br>
                    <?php
                    }
                }
                }
            }
                ?>                   
            </div>
            
<?php
}else if(isset($_POST['vawchildvictim']))
{
            require 'connection.php';    
            $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$user."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {
                $b_id = $row['id'];
            }

            $query = mysqli_query($con, "SELECT * from complete_report_vawchildvictim LEFT JOIN b_admin ON complete_report_vawchildvictim.completed_by_admin_id = b_admin.id where complete_report_vawchildvictim.c_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
            <h3>Accepted By: <?php echo $row['b_fname']; echo " "; echo $row['b_lname'];?></h3>
            <tr>
             <th><?php echo "ID: ";?></th> 
             <td><?php  echo $row['c_id']; ?></td>
             <th><?php echo "Time Report Sent: "?></th>
             <td><?php echo $row['report_timesent']  ?></td>
             </tr>

             <tr>
             <th><?php echo "Name: "?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username: "?></th>
             <td><?php echo $row['username']  ?></td>
             </tr>
            </table>

            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Type: "?></th>
             <td><?php echo $row['type']  ?></td>            
             <th><?php echo "Incident: "?></th>
             <td><?php echo $row['incident'];?></td>
            </tr>
             <th><?php echo "Date: "?></th>
             <td><?php echo $row['incident_time_date']?></td>
             </tr>
             <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']?></td>
             <th><?php echo "Place: "?></th>
             <td><?php echo $row['place']?></td>         
            </tr>
            <tr>
            <th><?php echo "Crime: "?></th>
             <td><?php echo $row['crime']  ?></td>
             <th><?php echo "Emergency: "?></th>
             <td><?php echo $row['emergency']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>
            
            <h1>Description</h1>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>     

            <h1><?php echo "Proof of Incident: "?></h1>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>

            <h1><?php echo "Location of Incident: "?></h1>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
        
            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Handling Organization: "?></th>
             <td><?php echo $row['handling_organization']  ?></td>            
             <th><?php echo "When did it take place?: "?></th>
             <td><?php echo $row['when'];?></td>
            </tr>
            </table>

            <h1>Location Address</h1>

            <table class="viewReportsTable">
             <th><?php echo "Address: "?></th>
             <td><?php echo $row['address']?></td>
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['region']?></td>
            </tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['province']?></td>   
             <th><?php echo "City: "?></th>
             <td><?php echo $row['city']  ?></td>
            </tr>
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']  ?></td>              
             </tr>           
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>

            <h1>Intake By</h1>

            <table class="viewReportsTable">
             <th><?php echo "Intake By: "?></th>
             <td><?php echo $row['intake_by']?></td>
             <th><?php echo "Position: "?></th>
             <td><?php echo $row['position']?></td>
            </tr>
            <tr>
             <th><?php echo "Case Manager: "?></th>
             <td><?php echo $row['case_manager']?></td> 
            </tr>  
            </table>

            <h1>Victim Information (Child)</h1>

            <table class="viewReportsTable">
             <th><?php echo "Name of Parent/Guardian: "?></th>
             <td><?php echo $row['parent_guardian']?></td>
             <th><?php echo "Relationship of Guardian to Victim-Survivor: "?></th>
             <td><?php echo $row['relationship_of_guardain']?></td>
            </tr>
            <tr>
             <th><?php echo "Address of the Guardian: "?></th>
             <td><?php echo $row['parentguardian_address']?></td> 
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['parentguardian_region']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['parentguardian_province']?></td> 
             <th><?php echo "City/Mun.: "?></th>
             <td><?php echo $row['parentguardian_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['parentguardian_barangayy']?></td> 
             <th><?php echo "Contact No. of Parent/Guardian: "?></th>
             <td><?php echo $row['contact_no_parent_guardian']?></td> 
            </tr>  
            </table>

            <h1>Perpetrator Information</h1>

            <table class="viewReportsTable">
             <th><?php echo "Perpetrator Name: "?></th>
             <td><?php echo $row['perpetrator_name']?></td>
             <th><?php echo "Perpetrator Alias: "?></th>
             <td><?php echo $row['alias']?></td>
            </tr>
            <tr>
             <th><?php echo "Perpetrator Sex: "?></th>
             <td><?php echo $row['perpetrator_sex']?></td> 
             <th><?php echo "Perpetrator Date of Birth: "?></th>
             <td><?php echo $row['perpetrator_date_of_birth']?></td>             
            </tr> 
            <tr>
            <th><?php echo "Perpetrator Age: "?></th>
             <td><?php echo $row['perpetrator_age']?></td> 
             <th><?php echo "Perpetrator Civil Status: "?></th>
             <td><?php echo $row['perpetrator_civil_status']?></td>             
            </tr>   
            <tr>
             <th><?php echo "Perpetrator Educational Attainment: "?></th>
             <td><?php echo $row['perpetrator_educational_attainment']?></td> 
             <th><?php echo "Perpetrator Nationality: "?></th>
             <td><?php echo $row['perpetrator_nationality']?></td>              
            </tr>   
            <tr>
             <th><?php echo "Perpetrator Passport No: "?></th>
             <td><?php echo $row['perpetrator_passport_no']?></td> 
             <th><?php echo "Perpetrator Occupation: "?></th>
             <td><?php echo $row['perpetrator_occupation']?></td>             
            </tr>
            <tr>
             <th><?php echo "Perpetrator Religion: "?></th>
             <td><?php echo $row['perpetrator_religion']?></td> 
             <th><?php echo "Perpetrator Address: "?></th>
             <td><?php echo $row['perpetrator_address']?></td>              
            </tr>   
            <tr>
             <th><?php echo "Perpetrator Region: "?></th>
             <td><?php echo $row['perpetrator_region']?></td>
             <th><?php echo "Perpetrator Province: "?></th>
             <td><?php echo $row['perpetrator_province']?></td>            
            </tr>   
            <tr>
             <th><?php echo "Perpetrator City: "?></th>
             <td><?php echo $row['perpetrator_city']?></td> 
             <th><?php echo "Perpetrator Barangay: "?></th>
             <td><?php echo $row['perpetrator_barangayy']?></td>            
            </tr>  
            <tr>
             <th><?php echo "Relationship of Perpetrator to Victim: "?></th>
             <td><?php echo $row['relationship_perpetrator_to_victim']?></td>
            </tr>
            </table>

            <h1><b>Additional Incident Information</b></h1>
            <h3>RA9262: Anti Violence Against Women and Their Children Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Sexual Abuse: "?></th>
             <td><?php echo $row['sexual_abuse']?></td> 
             <th><?php echo "Psychological: "?></th>
             <td><?php echo $row['psychological']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical1']?></td> 
             <th><?php echo "Economic: "?></th>
             <td><?php echo $row['economic']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_incident']?></td> 
            </tr>
            </table>

            <h3>RA8353: Anti-Rape Law of 1995</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Rape by Sexual Intercourse: "?></th>
             <td><?php echo $row['rape_sexual_intercourse']?></td> 
             <th><?php echo "Rape by Sexual Assault: "?></th>
             <td><?php echo $row['rape_sexual_assault']?></td> 
            </tr>   
            </table>

            <h3>RA7877: Anti-Sexual Harassment Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Verbal: "?></th>
             <td><?php echo $row['verbal']?></td> 
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical2']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Use of objects, pictures, letters, or notes with sexual under-pinnings: "?></th>
             <td><?php echo $row['use_of_objects']?></td> 
            </tr>
            </table>

            <h3>RA7610: Special Protection of Children Against Child Abuse, Exploitation and Discrimination Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Engage, facilitate, promote, or attempt to commit child prostitution: "?></th>
             <td><?php echo $row['child_prostitution']?></td> 
             <th><?php echo "Sexual intercourse or lascivious conduct: "?></th>
             <td><?php echo $row['lascivious_conduct']?></td> 
            </tr>   
            </table>

            <h3>RA9208: Anti-Trafficking in Persons Act of 2003</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9208: Anti-Trafficking in Persons Act of 2003: "?></th>
             <td><?php echo $row['anti_trafficking']?></td> 
            </tr>   
            </table>

            <h3>RA9775: Anti-Child Pornography Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9775: Anti-Child Pornography Act: "?></th>
             <td><?php echo $row['anti_child_porn']?></td> 
            </tr>   
            </table>

            <h3>RA9995: Anti-Photo and Video Voyeurism Act 2009</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9995: Anti-Photo and Video Voyeurism Act 2009: "?></th>
             <td><?php echo $row['anti_voyeurism']?></td>  
            </tr>   
            </table>

            <h3>Revised Penal Code</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Art 336: Acts of Lasciviousness: "?></th>
             <td><?php echo $row['acts_of_lasciviousness']?></td> 
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_penal_code']?></td> 
            </tr>   
            </table>

            <br>
            
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Description:"?></th>
            <td><?php echo $row['description_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Date of Latest Incident: "?></th>
            <td><?php echo $row['date_latest_incident']?></td> 
            <th><?php echo "Geographic Location of Incident: "?></th>
            <td><?php echo $row['incident_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Region: "?></th>
            <td><?php echo $row['incident_region']?></td> 
            <th><?php echo "Province: "?></th>
            <td><?php echo $row['incident_province']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "City/Mun: "?></th>
            <td><?php echo $row['incident_city']?></td> 
            <th><?php echo "Barangay: "?></th>
            <td><?php echo $row['incident_barangayy']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <h1>Witnesses</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Names: "?></th>
            <td><?php echo $row['witness_names']?></td> 
            <th><?php echo "Witness Address: "?></th>
            <td><?php echo $row['witness_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Contact No.: "?></th>
            <td><?php echo $row['witness_contact_no']?></td> 
            </tr>   
            </table>

            <h1>Note</h1>
            <h3>If the victim does not want to continue or pursue the case, please indicate herein the reason: </h3>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lost of interest to file: "?></th>
            <td><?php echo $row['lost_of_interest']?></td> 
            <th><?php echo "Reconciled with the perpetrator (w/o mediation): "?></th>
            <td><?php echo $row['reconciled']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Transfer Residence: "?></th>
            <td><?php echo $row['transfer_residence']?></td> 
            <th><?php echo "Lack of support: "?></th>
            <td><?php echo $row['lack_of_support']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lack of confidence with service provider: "?></th>
            <td><?php echo $row['lack_of_confidence']?></td> 
            <th><?php echo "Others: "?></th>
            <td><?php echo $row['others_case']?></td> 
            </tr>   
            </table>
            </div>

            <!-- -->
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
                
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script>

            
            
             <div class="viewReportStatusUpdate">  
                <?php
                if($user == "b_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $b_id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="B_assigned.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form><br>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="completeReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form><br>
                    <?php
                    }
                }
                }
            }
                ?>                   
            </div>
            
<?php
}else if(isset($_POST['vawvictimchildperpe']))
{
            require 'connection.php';    
            $queryID = mysqli_query($con, "SELECT * from b_admin WHERE b_admin.username = '".$user."' LIMIT 1");
            while($row = mysqli_fetch_array($queryID))
            {
                $b_id = $row['id'];
            }

            $query = mysqli_query($con, "SELECT * from complete_report_vawvictim_childperpe LEFT JOIN b_admin ON complete_report_vawvictim_childperpe.completed_by_admin_id = b_admin.id where complete_report_vawvictim_childperpe.c_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
            <h3>Accepted By: <?php echo $row['b_fname']; echo " "; echo $row['b_lname'];?></h3>
            <tr>
             <th><?php echo "ID: ";?></th> 
             <td><?php  echo $row['c_id']; ?></td>
             <th><?php echo "Time Report Sent: "?></th>
             <td><?php echo $row['report_timesent']  ?></td>
             </tr>

             <tr>
             <th><?php echo "Name: "?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username: "?></th>
             <td><?php echo $row['username']  ?></td>
             </tr>
            </table>

            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Type: "?></th>
             <td><?php echo $row['type']  ?></td>            
             <th><?php echo "Incident: "?></th>
             <td><?php echo $row['incident'];?></td>
            </tr>
             <th><?php echo "Date: "?></th>
             <td><?php echo $row['incident_time_date']?></td>
             </tr>
             <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']?></td>
             <th><?php echo "Place: "?></th>
             <td><?php echo $row['place']?></td>         
            </tr>
            <tr>
            <th><?php echo "Crime: "?></th>
             <td><?php echo $row['crime']  ?></td>
             <th><?php echo "Emergency: "?></th>
             <td><?php echo $row['emergency']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>
            
            <h1>Description</h1>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>     

            <h1><?php echo "Proof of Incident: "?></h1>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>

            <h1><?php echo "Location of Incident: "?></h1>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
        
            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Handling Organization: "?></th>
             <td><?php echo $row['handling_organization']  ?></td>            
             <th><?php echo "When did it take place?: "?></th>
             <td><?php echo $row['when'];?></td>
            </tr>
            </table>

            <h1>Location Address</h1>

            <table class="viewReportsTable">
             <th><?php echo "Address: "?></th>
             <td><?php echo $row['address']?></td>
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['region']?></td>
            </tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['province']?></td>   
             <th><?php echo "City: "?></th>
             <td><?php echo $row['city']  ?></td>
            </tr>
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']  ?></td>              
             </tr>           
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>

            <h1>Intake By</h1>

            <table class="viewReportsTable">
             <th><?php echo "Intake By: "?></th>
             <td><?php echo $row['intake_by']?></td>
             <th><?php echo "Position: "?></th>
             <td><?php echo $row['position']?></td>
            </tr>
            <tr>
             <th><?php echo "Case Manager: "?></th>
             <td><?php echo $row['case_manager']?></td> 
            </tr>  
            </table>

            <h1>Victim Information</h1>

            <table class="viewReportsTable">
             <th><?php echo "Victim Name: "?></th>
             <td><?php echo $row['victim_name']?></td>
             <th><?php echo "Victim Sex: "?></th>
             <td><?php echo $row['sex']?></td>
            </tr>
            <tr>
             <th><?php echo "Victim Date of Birth: "?></th>
             <td><?php echo $row['date_of_birth']?></td> 
             <th><?php echo "Victim Age: "?></th>
             <td><?php echo $row['age']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Victim Civil Status: "?></th>
             <td><?php echo $row['civil_status']?></td> 
             <th><?php echo "Victim Educational Attainment: "?></th>
             <td><?php echo $row['educational_attainment']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Nationality: "?></th>
             <td><?php echo $row['nationality']?></td> 
             <th><?php echo "Victim Passport No: "?></th>
             <td><?php echo $row['passport_no']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Occupation: "?></th>
             <td><?php echo $row['occupation']?></td> 
             <th><?php echo "Victim Religion: "?></th>
             <td><?php echo $row['religion']?></td> 
            </tr>
            <tr>
             <th><?php echo "Victim Address: "?></th>
             <td><?php echo $row['victim_address']?></td> 
             <th><?php echo "Victim Region: "?></th>
             <td><?php echo $row['victim_region']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Province: "?></th>
             <td><?php echo $row['victim_province']?></td> 
             <th><?php echo "Victim City: "?></th>
             <td><?php echo $row['victim_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Victim Barangay: "?></th>
             <td><?php echo $row['victim_barangayy']?></td> 
            </tr>  
            <tr>
             <th><?php echo "With Disability: "?></th>
             <td><?php echo $row['with_disability']?></td> 
             <th><?php echo "Disability: "?></th>
             <td><?php echo $row['disability']?></td> 
            </tr>   
            <tr>
             <th><?php echo "No. Of Children: "?></th>
             <td><?php echo $row['no_of_children']?></td> 
             <th><?php echo "Ages Of Children: "?></th>
             <td><?php echo $row['ages_of_children']?></td> 
            </tr>   
            </table>

            <h1>Perpetrator Information (Child)</h1>

            <table class="viewReportsTable">
             <th><?php echo "Name of Parent/Guardian: "?></th>
             <td><?php echo $row['perpetrator_name']?></td>
             <th><?php echo "Relationship of Guardian to Victim-Survivor: "?></th>
             <td><?php echo $row['rel_guardian_to_victim']?></td>
            </tr>
            <tr>
             <th><?php echo "Address of the Guardian: "?></th>
             <td><?php echo $row['guardian_address']?></td> 
             <th><?php echo "Region: "?></th>
             <td><?php echo $row['guardian_region']?></td> 
            </tr> 
            <tr>
             <th><?php echo "Province: "?></th>
             <td><?php echo $row['guardian_province']?></td> 
             <th><?php echo "City/Mun.: "?></th>
             <td><?php echo $row['guardian_city']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['guardian_barangayy']?></td> 
             <th><?php echo "Contact No. of Parent/Guardian: "?></th>
             <td><?php echo $row['contact_parent']?></td> 
            </tr>  
            </table>

            <h1><b>Additional Incident Information</b></h1>
            <h3>RA9262: Anti Violence Against Women and Their Children Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Sexual Abuse: "?></th>
             <td><?php echo $row['sexual_abuse']?></td> 
             <th><?php echo "Psychological: "?></th>
             <td><?php echo $row['psychological']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical1']?></td> 
             <th><?php echo "Economic: "?></th>
             <td><?php echo $row['economic']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_incident']?></td> 
            </tr>
            </table>

            <h3>RA8353: Anti-Rape Law of 1995</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Rape by Sexual Intercourse: "?></th>
             <td><?php echo $row['rape_sexual_intercourse']?></td> 
             <th><?php echo "Rape by Sexual Assault: "?></th>
             <td><?php echo $row['rape_sexual_assault']?></td> 
            </tr>   
            </table>

            <h3>RA7877: Anti-Sexual Harassment Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Verbal: "?></th>
             <td><?php echo $row['verbal']?></td> 
             <th><?php echo "Physical: "?></th>
             <td><?php echo $row['physical2']?></td> 
            </tr>   
            <tr>
             <th><?php echo "Use of objects, pictures, letters, or notes with sexual under-pinnings: "?></th>
             <td><?php echo $row['use_of_objects']?></td> 
            </tr>
            </table>

            <h3>RA7610: Special Protection of Children Against Child Abuse, Exploitation and Discrimination Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Engage, facilitate, promote, or attempt to commit child prostitution: "?></th>
             <td><?php echo $row['child_prostitution']?></td> 
             <th><?php echo "Sexual intercourse or lascivious conduct: "?></th>
             <td><?php echo $row['lascivious_conduct']?></td> 
            </tr>   
            </table>

            <h3>RA9208: Anti-Trafficking in Persons Act of 2003</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9208: Anti-Trafficking in Persons Act of 2003: "?></th>
             <td><?php echo $row['anti_trafficking']?></td> 
            </tr>   
            </table>

            <h3>RA9775: Anti-Child Pornography Act</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9775: Anti-Child Pornography Act: "?></th>
             <td><?php echo $row['anti_child_porn']?></td> 
            </tr>   
            </table>

            <h3>RA9995: Anti-Photo and Video Voyeurism Act 2009</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "RA9995: Anti-Photo and Video Voyeurism Act 2009: "?></th>
             <td><?php echo $row['anti_voyeurism']?></td>  
            </tr>   
            </table>

            <h3>Revised Penal Code</h3>

            <table class="viewReportsTable">
            <tr>
             <th><?php echo "Art 336: Acts of Lasciviousness: "?></th>
             <td><?php echo $row['acts_of_lasciviousness']?></td> 
             <th><?php echo "Others: "?></th>
             <td><?php echo $row['others_penal_code']?></td> 
            </tr>   
            </table>

            <br>
            
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Description:"?></th>
            <td><?php echo $row['description_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Date of Latest Incident: "?></th>
            <td><?php echo $row['date_latest_incident']?></td> 
            <th><?php echo "Geographic Location of Incident: "?></th>
            <td><?php echo $row['incident_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Region: "?></th>
            <td><?php echo $row['incident_region']?></td> 
            <th><?php echo "Province: "?></th>
            <td><?php echo $row['incident_province']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "City/Mun: "?></th>
            <td><?php echo $row['incident_city']?></td> 
            <th><?php echo "Barangay: "?></th>
            <td><?php echo $row['incident_barangayy']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Place of Incident: "?></th>
            <td><?php echo $row['place_of_incident']?></td> 
            </tr>   
            </table>

            <h1>Witnesses</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Names: "?></th>
            <td><?php echo $row['witness_names']?></td> 
            <th><?php echo "Witness Address: "?></th>
            <td><?php echo $row['witness_address']?></td> 
            </tr>   
            </table>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Witness Contact No.: "?></th>
            <td><?php echo $row['witness_contact_no']?></td> 
            </tr>   
            </table>

            <h1>Note</h1>
            <h3>If the victim does not want to continue or pursue the case, please indicate herein the reason: </h3>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lost of interest to file: "?></th>
            <td><?php echo $row['lost_of_interest']?></td> 
            <th><?php echo "Reconciled with the perpetrator (w/o mediation): "?></th>
            <td><?php echo $row['reconciled']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Transfer Residence: "?></th>
            <td><?php echo $row['transfer_residence']?></td> 
            <th><?php echo "Lack of support: "?></th>
            <td><?php echo $row['lack_of_support']?></td> 
            </tr>   
            </table>
            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Lack of confidence with service provider: "?></th>
            <td><?php echo $row['lack_of_confidence']?></td> 
            <th><?php echo "Others: "?></th>
            <td><?php echo $row['others_case']?></td> 
            </tr>   
            </table>
            </div>

            <!-- -->
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
                
                position: myLatlng,
                map: map,
                title: "Your location"
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
            </script>

            
            
             <div class="viewReportStatusUpdate">  
                <?php
                if($user == "b_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $b_id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="B_assigned.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form><br>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="completeReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form><br>
                    <?php
                    }
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
        Print '<h1>User Information</h1>';
        Print '<table class="viewReportsTable">';
        if(isset($_POST['fire']))
        {
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
        
        $query = mysqli_query($con, "SELECT * from complete_report_fire LEFT JOIN f_admin ON complete_report_fire.completed_by_admin_id = f_admin.id where complete_report_fire.c_id = '$id'"); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <h3>Accepted By: <?php echo $row['f_fname']; echo " "; echo $row['f_lname'];?></h3>
            <tr>
             <th><?php echo "ID: ";?></th> 
             <td><?php  echo $row['c_id']; ?></td>
             <th><?php echo "Time Report Sent: "?></th>
             <td><?php echo $row['report_timesent']  ?></td>
             </tr>

             <tr>
             <th><?php echo "Name: "?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username: "?></th>
             <td><?php echo $row['username']  ?></td>
             </tr>
            </table>

            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Type: "?></th>
             <td><?php echo $row['type']  ?></td>            
             <th><?php echo "Incident: "?></th>
             <td><?php echo $row['incident'];?></td>
            </tr>
             <th><?php echo "Date: "?></th>
             <td><?php echo $row['incident_time_date']?></td>
             </tr>
             <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']?></td>
             <th><?php echo "Place: "?></th>
             <td><?php echo $row['place']?></td>         
            </tr>
            <tr>
            <th><?php echo "Crime: "?></th>
             <td><?php echo $row['crime']  ?></td>
             <th><?php echo "Emergency: "?></th>
             <td><?php echo $row['emergency']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>
            
            <h1>Description</h1>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>     

            <h1><?php echo "Proof of Incident: "?></h1>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>

            <h1><?php echo "Location of Incident: "?></h1>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
        
            <h1>Section 1 - INCIDENT</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Building Name and Address: "?></th>
             <td><?php echo $row['building_address']  ?></td>            
             <th><?php echo "Building Number: "?></th>
             <td><?php echo $row['building_number'];?></td>
            </tr>
            <tr>
             <th><?php echo "Fixed Property: "?></th>
             <td><?php echo $row['fixed_property']?></td>
             <th><?php echo "Type of Incident: "?></th>
             <td><?php echo $row['incident_type']?></td>
             </tr>
             <tr>
             <th><?php echo "Occupants Were: "?></th>
             <td><?php echo $row['occupants_status']?></td>
             <th><?php echo "Did the Fire Department Respond?: "?></th>
             <td><?php echo $row['did_respond']?></td>         
            </tr>
            <tr>
            <th><?php echo "Fire Department Called Via: "?></th>
             <td><?php echo $row['called_via']  ?></td>
             <th><?php echo "Fire Department Respond Within Minutes of Notification: "?></th>
             <td><?php echo $row['respond_within_minutes']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Brief History of Incident: "?></th> 
            <td><?php echo $row['history'] ?></td> 
            <th><?php echo "Action(s) Taken and Recommendations to Prevent Recurrence: "?></th> 
            <td><?php echo $row['actions_recommendations'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "No. of Injuries: "?></th> 
            <td><?php echo $row['num_injuries'] ?></td> 
            <th><?php echo "No. of Deaths: "?></th> 
            <td><?php echo $row['num_deaths'] ?></td>   
            </tr>
            </table>

            <h1>Section 2 - FIRE</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Area of Origin: "?></th> 
            <td><?php echo $row['fire_origin'] ?></td> 
            <th><?php echo "Equipment Involved in Ignition: "?></th> 
            <td><?php echo $row['equipment'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Form of Heat of Ignition: "?></th> 
            <td><?php echo $row['form_of_heat'] ?></td> 
            <th><?php echo "Type of Material Ignited: "?></th> 
            <td><?php echo $row['type_material_ignited'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Form of Material Ignition: "?></th> 
            <td><?php echo $row['form_of_material'] ?></td> 
            <th><?php echo "Method of Extinguishment: "?></th> 
            <td><?php echo $row['method_of_extinguishment'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Level of Fire Origin: "?></th> 
            <td><?php echo $row['level_of_fire'] ?></td>   
            </tr>
            </table>

            <h1>Section 3 - STRUCTURE FIRE</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Extent of Flame Damage: "?></th> 
            <td><?php echo $row['extent_flame'] ?></td>
            <th><?php echo "Extent of Smoke Damage: "?></th> 
            <td><?php echo $row['extent_smoke'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Detector Performance: "?></th> 
            <td><?php echo $row['detector_performance'] ?></td>
            <th><?php echo "Sprinkler Performance: "?></th> 
            <td><?php echo $row['sprinkler_performance'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Type of Material Generating Most Smoke: "?></th> 
            <td><?php echo $row['type_most_smoke'] ?></td>
            <th><?php echo "Form of Material Generating Most Smoke: "?></th> 
            <td><?php echo $row['form_most_smoke'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Avenue of Smoke Travel: "?></th> 
            <td><?php echo $row['avenue_smoke_travel'] ?></td>
            </tr>
            </table>

            <h1>Section 4 - PROPERTY</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Mobile Property: "?></th> 
            <td><?php echo $row['mobile_property'] ?></td>
            <th><?php echo "YR.: "?></th> 
            <td><?php echo $row['year1'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Make: "?></th> 
            <td><?php echo $row['make1'] ?></td>
            <th><?php echo "Model: "?></th> 
            <td><?php echo $row['model1'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Serial No.: "?></th> 
            <td><?php echo $row['serial_number1'] ?></td>
            <th><?php echo "License No. (if any): "?></th> 
            <td><?php echo $row['license_number'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Equipment Involved in Ignition: "?></th> 
            <td><?php echo $row['equipment_involved'] ?></td>
            <th><?php echo "YR.: "?></th> 
            <td><?php echo $row['year2'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Make: "?></th> 
            <td><?php echo $row['make2'] ?></td>
            <th><?php echo "Model: "?></th> 
            <td><?php echo $row['model2'] ?></td>   
            </tr>
            <tr>
            <th><?php echo "Serial No.: "?></th> 
            <td><?php echo $row['serial_number2'] ?></td>
            <th><?php echo "Voltage (if any): "?></th> 
            <td><?php echo $row['voltage'] ?></td>   
            </tr>
            </table>

            <h1>Section 5 - PREPARER OF THIS REPORT</h1>

            <table class="viewReportsTable">
            <tr>
            <th><?php echo "Investigator Signature: "?></th> 
            <td><?php echo $row['reporter'] ?></td>
            <th><?php echo "Date Now: "?></th> 
            <td><?php echo $row['date_of_complete_report'] ?></td>   
            </tr>
            </table>
            
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



<div class="viewReportStatusUpdate">  
                <?php
                if($user == "f_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports where report_id = '$id' "); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $f_id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="F_assigned.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Assign/Dispatch">
                        </form><br>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="completeReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form><br>
                    <?php
                    }
                }
                }
            }
                ?>                   
            </div>

<?php
}
}else if(mysqli_num_rows($row_p) > 0)
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
        if(isset($_POST['injury']))
        {
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
        $query = mysqli_query($con, "SELECT * from complete_report_injury LEFT JOIN p_admin ON complete_report_injury.completed_by_admin_id = p_admin.id where complete_report_injury.c_id = '$id'"); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                $featured = "";
				$notFeatured = "";
                $otw = "";
				$completed = "";
            ?>
            <h3>Accepted By: <?php echo $row['p_fname']; echo " "; echo $row['p_lname'];?></h3>
            <tr>
             <th><?php echo "ID: ";?></th> 
             <td><?php  echo $row['c_id']; ?></td>
             <th><?php echo "Time Report Sent: "?></th>
             <td><?php echo $row['report_timesent']  ?></td>
             </tr>

             <tr>
             <th><?php echo "Name: "?></th> 
             <td><?php echo $row['name'] ?></td>
             <th><?php echo "Username: "?></th>
             <td><?php echo $row['username']  ?></td>
             </tr>
            </table>

            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Type: "?></th>
             <td><?php echo $row['type']  ?></td>            
             <th><?php echo "Incident: "?></th>
             <td><?php echo $row['incident'];?></td>
            </tr>
             <th><?php echo "Date: "?></th>
             <td><?php echo $row['incident_time_date']?></td>
             </tr>
             <tr>
             <th><?php echo "Barangay: "?></th>
             <td><?php echo $row['barangay']?></td>
             <th><?php echo "Place: "?></th>
             <td><?php echo $row['place']?></td>         
            </tr>
            <tr>
            <th><?php echo "Crime: "?></th>
             <td><?php echo $row['crime']  ?></td>
             <th><?php echo "Emergency: "?></th>
             <td><?php echo $row['emergency']  ?></td>               
            </tr>
            <tr>
            <th><?php echo "Status: "?></th> 
            <td><?php echo $row['status'] ?></td>   
            </tr>
            </table>
            
            <h1>Description</h1>

            <table class="viewReportsTable">
             <tr>
             <td><?php echo $row['description']?></td>
            </tr>
            </table>     

            <h1><?php echo "Proof of Incident: "?></h1>
            <table class="viewReportsTable">
                <tr>
                <td><a href='<?php echo 'reportFIles/'.$row['file'];?>' target="_blank">View Image</a></td>
            </tr>
            </table>

            <h1><?php echo "Location of Incident: "?></h1>
            <table class="viewReportsTable">
            <tr>
            <td><div class="reportProof"><div id="map_canvas" style="width: 100%; height: 400px;"></div></div></td>
             </tr>
            </table>
            <hr>
        
            <h1>Incident Information</h1>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Rank and Names of First Responders: "?></th>
             <td><?php echo $row['firstResponders']  ?></td>            
             <th><?php echo "Time First Responders Arrived at Crime Scene: "?></th>
             <td><?php echo $row['timeResponder'];?></td>
            </tr>
            </table>

            <table class="viewReportsTable">
             <tr>
             <th><?php echo "Weather Condition: "?></th>
             <td><?php echo $row['weather']?></td>
             <th><?php echo "Names of Victims and Status: "?></th>
             <td><?php echo $row['victims']?></td>
            </tr>
             <tr>
             <th><?php echo "Names of Persons Found at (inside) the Crime Scene by FR (Address/Contact Nrs): "?></th>
             <td><?php echo $row['foundAtCS']?></td>   
             <th><?php echo "Names of Suspects and Status (Arrested/At-large, etc..) and Weapons, if any: "?></th>
             <td><?php echo $row['suspect']  ?></td>
            </tr>
            <tr>
             <th><?php echo "Names of Person Found Near or at the Vicinity of CS (Address/Contact Nr): "?></th>
             <td><?php echo $row['nearCS']  ?></td>              
            <th><?php echo "Names of Persons Interviewed by the FR (Address/Contact Nr): "?></th> 
            <td><?php echo $row['interviewedPerson'] ?></td>   
            </tr>
            <tr>
             <th><?php echo "Names of Persons Who Entered the CS after the Arrival of FR and Prior to Arrival of Investigator (Medics, Local Officials, etc) (Address/Contact Nr): "?></th>
             <td><?php echo $row['enteredCS']?></td>
             <th><?php echo "List of Evidence That Have Been Seized/Collected/Recovered by the FR (If Any): "?></th>
             <td><?php echo $row['evidence']?></td>
            </tr>
            <tr>
             <th><?php echo "Areas where Initial Search were conducted: "?></th>
             <td><?php echo $row['initialSearch']?></td> 
            </tr>  
            <tr>
             <th><?php echo "On-Scene Command Post (OSCP) established at: "?></th>
             <td><?php echo $row['oscp']?></td>
             <th><?php echo "Time and Date of Arrival of Investigator at the CS: "?></th>
             <td><?php echo $row['arrivalInvestigator']?></td>
            </tr>
            <tr>
             <th><?php echo "CS Received By Duty Investigator/ IOC: "?></th>
             <td><?php echo $row['csReceivedDutyInvestigator']?></td>
             <th><?php echo "Time/Date: "?></th>
             <td><?php echo $row['timeOrDate']?></td>
            </tr>
            <tr>
             <th><?php echo "Witnessed By: "?></th>
             <td><?php echo $row['witnessedBy']?></td>
             <th><?php echo "Prepared and Submitted by (Rank/Name/Designation of Officer): "?></th>
             <td><?php echo $row['preparedBy']?></td>
            </tr>
            </table>

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
          
<div class="viewReportStatusUpdate">  
                <?php
                if($user == "p_admin")
                {
                $query = mysqli_query($con, "SELECT * from reports where report_id = '$id'"); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    if($row['status'] == "Needs Attention")
                    {
                    ?>
                        <form action="acceptReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="admin_id" value="<?php echo $p_id;?>">
                        <input type="submit" value="Accept Report">
                        </form>
                        <br>
                    <?php
                    }
                    else if($row['status'] == "In Progress")
                    {
                    ?>
                        <form action="P_assigned.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">              
                        <input type="submit" value="Assign/Dispatch">
                        </form><br>
                    <?php
                    }
                    else if($row['status'] == "On The Way")
                    {           
                    ?>
                        <form action="completeReport.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Complete/Finish">
                        </form><br>
                    <?php
                    }
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

            <?php
            }
        }
            ?>
        
</body>
</html>