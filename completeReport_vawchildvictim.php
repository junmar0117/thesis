<?php
$url = "";
$url != 'completeReport_vaw.php';

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
        <form action="completeReportAction_vawchildvictim.php" method="POST">
        <h3><b>National Violence Against Women (NVAW) Documentation System</b></h3>
        <h3>Handling Organization</h3>
        <input type="text" name="handling_organization" placeholder="...">
        <h3>When did it take place?</h3>
        <input type="date" name="when" placeholder="...">
        <h3>Address</h3>
        <input type="text" name="address" placeholder="...">
        <h3>Region</h3>
        <input type="text" name="region" placeholder="...">
        <h3>Province</h3>
        <input type="text" name="province" placeholder="...">
        <h3>City/Municipality</h3>
        <input type="text" name="city" placeholder="...">
        <h3>Barangay</h3>
        <input type="text" name="barangayy" placeholder="...">
        <h3>Intake By</h3>
        <input type="text" name="intake_by" placeholder="Last Name, First Name, Middle Name">
        <h3>Position</h3>
        <input type="text" name="position" placeholder="...">
        <h3>Case Manager</h3>
        <input type="text" name="case_manager" placeholder="Last Name, First Name, Middle Name">

        <h3><b>If Victim-Survivor is a Child</b></h3>
        <h3>Name of Parent/Guardian</h3>
        <input type="text" name="parent_guardian" placeholder="Last Name, First Name, Middle Name">
        <h3>Relationship of Guardian to Victim-Survivor</h3>
        <input type="text" name="relationship_of_guardain" placeholder="...">
        <h3>Address of Guardian</h3>
        <input type="text" name="parentguardian_address" placeholder="...">
        <h3>Region</h3>
        <input type="text" name="parentguardian_region" placeholder="...">
        <h3>Province</h3>
        <input type="text" name="parentguardian_province" placeholder="...">
        <h3>City/Municipality</h3>
        <input type="text" name="parentguardian_city" placeholder="...">
        <h3>Barangay</h3>
        <input type="text" name="parentguardian_barangayy" placeholder="...">
        <h3>Contact No. of Parent/Guardian</h3>
        <input type="number" name="contact_no_parent_guardian" placeholder="...">

        <h3><b>Perpetrator Information</b></h3>
        <h3>Name</h3>
        <input type="text" name="perpetrator_name" placeholder="Last Name, First Name, Middle Name">
        <h3>Alias</h3>
        <input type="text" name="alias" placeholder="...">
        <h3>Sex</h3>
        <input type="radio" id="male" name="perpetrator_sex" value="Male">
        <label for="Male">Male</label><br>
        <input type="radio" id="female" name="perpetrator_sex" value="Female">
        <label for="Female">Female</label><br>
        <h3>Date of Birth</h3>
        <input type="date" name="perpetrator_date_of_birth" placeholder="...">
        <h3>Age</h3>
        <input type="number" name="perpetrator_age" placeholder="...">

        <h3>Civil Status</h3>
        <input type="radio" id="single" name="perpetrator_civil_status" value="Single">
        <label for="Single">Single</label><br>
        <input type="radio" id="married" name="perpetrator_civil_status" value="Married">
        <label for="Married">Married</label><br>
        <input type="radio" id="livein" name="perpetrator_civil_status" value="Live-In">
        <label for="Live-In">Live-In</label><br>
        <input type="radio" id="widowed" name="perpetrator_civil_status" value="Widowed">
        <label for="Widowed">Widowed</label><br>
        <input type="radio" id="separated" name="perpetrator_civil_status" value="Separated">
        <label for="Separated">Separated</label><br>

        <h3>Highest Educational Attainment</h3>
        <input type="radio" id="noformaleducation" name="perpetrator_educational_attainment" value="No Formal Education">
        <label for="noformaleducation">No Formal Education</label><br>
        <input type="radio" id="elementary" name="perpetrator_educational_attainment" value="Elementary Level Graduated">
        <label for="elementary">Elementary Level Graduated</label><br>
        <input type="radio" id="highschool" name="perpetrator_educational_attainment" value="High School Level Graduated">
        <label for="highschool">High School Level Graduated</label><br>
        <input type="radio" id="vocational" name="perpetrator_educational_attainment" value="Vocational">
        <label for="vocational">Vocational</label><br>
        <input type="radio" id="college" name="perpetrator_educational_attainment" value="College Level Graduated">
        <label for="college">College Level Graduated</label><br>
        <input type="radio" id="postgraduate" name="perpetrator_educational_attainment" value="Post Graduate">
        <label for="postgraduate">Post Graduate</label><br>
        <input type="radio" id="noresponse" name="perpetrator_educational_attainment" value="No Response">
        <label for="noresponse">No Response</label><br>
        <input type="radio" id="others" name="perpetrator_educational_attainment" value="Others">
        <label for="others">Others</label><br>

        <h3>Nationality</h3>
        <input type="text" name="perpetrator_nationality" placeholder="...">
        <h3>Passport No. (If non-Filipino)</h3>
        <input type="number" name="perpetrator_passport_no" placeholder="...">
        <h3>Occupation</h3>
        <input type="text" name="perpetrator_occupation" placeholder="...">
        <h3>Identifying Marks</h3>
        <input type="text" name="identifying_marks" placeholder="...">

        <h3>Religion</h3>
        <input type="radio" id="romancatholic" name="perpetrator_religion" value="Roman Catholic">
        <label for="romancatholic">Roman Catholic</label><br>
        <input type="radio" id="islam" name="perpetrator_religion" value="Islam">
        <label for="islam">Islam</label><br>
        <input type="radio" id="protestant" name="perpetrator_religion" value="Protestant">
        <label for="protestant">Protestant</label><br>
        <input type="radio" id="aglipayan" name="perpetrator_religion" value="Aglipayan">
        <label for="aglipayan">Aglipayan</label><br>
        <input type="radio" id="others" name="perpetrator_religion" value="Others">
        <label for="others">Others</label><br>

        <h3>Address</h3>
        <input type="text" name="perpetrator_address" placeholder="...">
        <h3>Region</h3>
        <input type="text" name="perpetrator_region" placeholder="...">
        <h3>Province</h3>
        <input type="text" name="perpetrator_province" placeholder="...">
        <h3>City/Municipality</h3>
        <input type="text" name="perpetrator_city" placeholder="...">
        <h3>Barangay</h3>
        <input type="text" name="perpetrator_barangayy" placeholder="...">

        <h3>Relationship of Perpetrator to Victim</h3>
        <input type="radio" id="currentspouse" name="relationship_perpetrator_to_victim" value="Current Spouse/Partner">
        <label for="currentspouse">Current Spouse/Partner</label><br>
        <input type="radio" id="formerspouse" name="relationship_perpetrator_to_victim" value="Former Spouse/Partner">
        <label for="formerspouse">Former Spouse/Partner</label><br>
        <input type="radio" id="currentfiance" name="relationship_perpetrator_to_victim" value="Current Fiance/Dating Relationship">
        <label for="currentfiance">Current Fiance/Dating Relationship</label><br>
        <input type="radio" id="formerfiance" name="relationship_perpetrator_to_victim" value="Former Fiance/Dating Relationship">
        <label for="formerfiance">Former Fiance/Dating Relationship</label><br>
        <input type="radio" id="employee_manager_supervisor" name="relationship_perpetrator_to_victim" value="Employee/Manager/Supervisor">
        <label for="employee_manager_supervisor">Employee/Manager/Supervisor</label><br>
        <input type="radio" id="agent_of_employer" name="relationship_perpetrator_to_victim" value="Agent of the Employer">
        <label for="agent_of_employer">Agent of the Employer</label><br>
        <input type="radio" id="teacher_instructor_professor" name="relationship_perpetrator_to_victim" value="Teacher/Instructor/Professor">
        <label for="teacher_instructor_professor">Teacher/Instructor/Professor</label><br>
        <input type="radio" id="coach_trainer" name="relationship_perpetrator_to_victim" value="Coach/Trainer">
        <label for="coach_trainer">Coach/Trainer</label><br>
        <input type="radio" id="authority_service_provider" name="relationship_perpetrator_to_victim" value="People of Authority/Service Provider">
        <label for="authority_service_provider">People of Authority/Service Provider</label><br>
        <input type="radio" id="neighbors_peers" name="relationship_perpetrator_to_victim" value="Neighbors/Peers/Co-Workers/Associates">
        <label for="neighbors_peers">Neighbors/Peers/Co-Workers/Associates</label><br>
        <input type="radio" id="stranger" name="relationship_perpetrator_to_victim" value="Stranger">
        <label for="stranger">Stranger</label><br>
        <input type="radio" id="immediate_family" name="relationship_perpetrator_to_victim" value="Immediate Family (e.g. Father, Mother)">
        <label for="immediate_family">Immediate Family (e.g. father, mother)</label><br>
        <input type="radio" id="other_relatives" name="relationship_perpetrator_to_victim" value="Other Relatives (e.g. Uncle, Cousin)">
        <label for="other_relatives">Other Relatives (e.g. Uncle, Cousin)</label><br>
        <input type="radio" id="others" name="relationship_perpetrator_to_victim" value="Others">
        <label for="others">Others</label><br>

        <h3><b>Incident Information</b></h3>
        <h3>RA 9262 Anti Violence Against Women and Their Children Act</h3>
        <input type="checkbox" id="sexual" name="sexual_abuse" value="Yes">
        <label for="sexual">Sexual Abuse</label>
        <input type="checkbox" id="psychological" name="psychological" value="Yes">
        <label for="psychological">Psychological</label>
        <input type="checkbox" id="physical" name="physical1" value="Yes">
        <label for="physical">Physical</label>
        <input type="checkbox" id="economic" name="economic" value="Yes">
        <label for="economic">Economic</label>
        <input type="checkbox" id="others" name="others_incident" value="Yes">
        <label for="others">Others</label>

        <br>

        <h3>RA 8353 Anti-Rape Law of 1995</h3>
        <input type="checkbox" id="rape_sexual_intercourse" name="rape_sexual_intercourse" value="Yes">
        <label for="rape_sexual_intercourse">Rape by Sexual Intercourse</label>
        <input type="checkbox" id="rape_sexual_assault" name="rape_sexual_assault" value="Yes">
        <label for="rape_sexual_assault">Rape by Sexual Assault</label>

        <br>

        <h3>RA 7877 Anti-Sexual Harassment Act</h3>
        <input type="checkbox" id="verbal" name="verbal" value="Yes">
        <label for="verbal">Verbal</label>
        <input type="checkbox" id="physical" name="physical2" value="Yes">
        <label for="physical">Physical</label>
        <input type="checkbox" id="use_of_objects" name="use_of_objects" value="Yes">
        <label for="use_of_objects">Use of Objects, Pictures, Letters, or Notes with sexual under-pinnings</label>

        <br>

        <h3>RA 7610 Special Protection of Children Against Child Abuse, Exploitation and Discrimination Act</h3>
        <input type="checkbox" id="child_prostitution" name="child_prostitution" value="Yes">
        <label for="child_prostitution">Engage, facilitate, promote, or attempt to commit child prostitution</label>
        <input type="checkbox" id="lascivious_conduct" name="lascivious_conduct" value="Yes">
        <label for="lascivious_conduct">Sexual Intercourse or Lascivious Conduct</label>

        <br>

        <input type="checkbox" id="anti_trafficking" name="anti_trafficking" value="RA 9208: Anti-Trafficking in Persons Act of 2003">
        <label for="anti_trafficking">RA 9208: Anti-Trafficking in Persons Act of 2003</label><br>
        <input type="checkbox" id="anti_child_porn" name="anti_child_porn" value="RA 9775: Anti-Child Pornography Act">
        <label for="anti_child_porn">RA 9775: Anti-Child Pornography Act</label><br>
        <input type="checkbox" id="anti_voyeurism" name="anti_voyeurism" value="RA 9995: Anti-Photo and Video Voyeurism Act 2009">
        <label for="anti_voyeurism">RA 9995: Anti-Photo and Video Voyeurism Act 2009</label><br>
        <h3>Revised Penal Code</h3>
        <input type="checkbox" id="acts_of_lasciviousness" name="acts_of_lasciviousness" value="Art 336: Acts of Lasciviousness">
        <label for="acts_of_lasciviousness">Art 336: Acts of Lasciviousness</label><br>
        <input type="checkbox" id="others" name="others_penal_code" value="Others">
        <label for="others">Others</label><br>

        <h3>Description of Incident</h3>
        <input type="text" name="description_incident" placeholder="...">
        <h3>Date of Latest Incident</h3>
        <input type="date" name="date_latest_incident" placeholder="...">
        <h3>Geographic Location of Incident</h3>
        <input type="text" name="incident_address" placeholder="...">
        <h3>Region</h3>
        <input type="text" name="incident_region" placeholder="...">
        <h3>Province</h3>
        <input type="text" name="incident_province" placeholder="...">
        <h3>City/Municipality</h3>
        <input type="text" name="incident_city" placeholder="...">
        <h3>Barangay</h3>
        <input type="text" name="incident_barangayy" placeholder="...">

        <h3>Place of Incident</h3>
        <input type="radio" id="home" name="place_of_incident" value="Home">
        <label for="home">Home</label><br>
        <input type="radio" id="work" name="place_of_incident" value="Work">
        <label for="work">Work</label><br>
        <input type="radio" id="school" name="place_of_incident" value="School">
        <label for="school">School</label><br>
        <input type="radio" id="commerical_places" name="place_of_incident" value="Commercial Places">
        <label for="commerical_places">Commercial Places</label><br>
        <input type="radio" id="religious_institutions" name="place_of_incident" value="Religious Institutions">
        <label for="religious_institutions">Religious Institutions</label><br>
        <input type="radio" id="medical_treatment" name="place_of_incident" value="Places of Medical Treatment">
        <label for="medical_treatment">Places of Medical Treatment</label><br>
        <input type="radio" id="transport" name="place_of_incident" value="Transport and Connecting Sites">
        <label for="transport">Transport and Connecting Sites</label><br>
        <input type="radio" id="brothels" name="place_of_incident" value="Brothels and Similar Establishments">
        <label for="brothels">Brothels and Similar Establishments</label><br>
        <input type="radio" id="others" name="place_of_incident" value="Others">
        <label for="others">Others</label><br>
        <input type="radio" id="noresponse" name="place_of_incident" value="No Response">
        <label for="noresponse">No Response</label><br>

        <h3>Witnesses</h3>
        <h3>Name</h3>
        <input type="text" name="witness_names" placeholder="...">
        <h3>Address</h3>
        <input type="text" name="witness_address" placeholder="...">
        <h3>Contact No.</h3>
        <input type="number" name="witness_contact_no" placeholder="...">

        <h3>Note to Barangay VAW Desk Officer: If the victim does not want to continue or pursue the case, please indicate herein the reason</h3>
        <input type="checkbox" id="lost_of_interest" name="lost_of_interest" value="Lost of interest to file">
        <label for="lost_of_interest">Lost of interest to file</label><br>
        <input type="checkbox" id="reconciled" name="reconciled" value="Reconciled with the Perpetrator (w/o mediation)">
        <label for="reconciled">Reconciled with the Perpetrator (w/o mediation)</label><br>
        <input type="checkbox" id="transfer_residence" name="transfer_residence" value="Transfer Residence">
        <label for="transfer_residence">Transfer Residence</label><br>
        <input type="checkbox" id="lack_of_support" name="lack_of_support" value="Lack of Support">
        <label for="lack_of_support">Lack of Support</label><br>
        <input type="checkbox" id="lack_of_confidence" name="lack_of_confidence" value="Lack of Confidence with Service Provider">
        <label for="lack_of_confidence">Lack of Confidence with Service Provider</label><br>
        <input type="text" id="others" name="others_case" placeholder="If others, Please Specify">

        <input type="hidden" name="assigned_id" value="<?php echo $assigned_id;?>">
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
        <h3>When did it take place?</h3>
        <input type="datetime-local" name="when" placeholder="...">
        <h3>Building Name and Address</h3>
        <input type="text" name="building_address" placeholder="...">
        <h3>Building No.</h3>
        <input type="number" name="building_number" placeholder="...">
        <h3>Fixed Property</h3>
        <input type="text" name="fixed_property" placeholder="...">
        <h3>Type of Incident</h3>
        <input type="text" name="incident_type" placeholder="...">
        <h3>Occupants Were</h3>
        <input type="radio" name="occupants_status" value="Not Evacuated">
        <label for="notevacuated">Not Evacuated</label><br>
        <input type="radio" name="occupants_status" value="Evacuated">
        <label for="evacuated">Evacuated</label><br>
        <input type="radio" name="occupants_status" value="Relocated">
        <label for="relocated">Relocated</label><br>
        <input type="radio" name="occupants_status" value="Both B and C">
        <label for="both">Both B and C</label><br>
        <h3>Did the Fire Department Respond?</h3>
        <input type="radio" name="did_respond" value="Yes">
        <label for="Yes">Yes</label><br>
        <input type="radio" name="did_respond" value="No">
        <label for="No">No</label><br>
        <h3>Fire Department Called Via</h3>
        <input type="number" name="called_via" placeholder="...">
        <h3>Fire Department Respond Within Minutes Of Notification</h3>
        <input type="radio" name="respond_within_minutes" value="Yes">
        <label for="Yes">Yes</label><br>
        <input type="radio" name="respond_within_minutes" value="No">
        <label for="No">No</label><br>
        <h3>Brief History of Incident</h3>
        <input type="text" name="history" placeholder="...">
        <h3>Action(s) Taken and Recommendations to Prevent Recurrence</h3>
        <input type="text" name="actions_recommendations" placeholder="...">
        <h3>No. of Injuries</h3>
        <input type="number" name="num_injuries" placeholder="...">
        <h3>No. of Deaths</h3>
        <input type="number" name="num_deaths" placeholder="...">

        <h3>SECTION 2 - FIRE (Complete for all fires)</h3>
        <h3>Area of Fire Origin</h3>
        <input type="text" name="fire_origin" placeholder="...">
        <h3>Equipment Involved in Ignition</h3>
        <input type="text" name="equipment" placeholder="...">
        <h3>Form of Heat of Ignition</h3>
        <input type="text" name="form_of_heat" placeholder="...">
        <h3>Type of Material Ignited</h3>
        <input type="text" name="type_material_ignited" placeholder="...">
        <h3>Form of Material Ignited</h3>
        <input type="text" name="form_of_material" placeholder="...">
        <h3>Method of Extinguishment</h3>
        <input type="text" name="method_of_extinguishment" placeholder="...">
        <h3>Level of Fire Origin</h3>
        <input type="text" name="level_of_fire" placeholder="...">

        <h3>SECTION 3 - STRUCTURE FIRE (Complete if structure fires)</h3>
        <h3>Extent of Flame Damage</h3>
        <input type="text" name="extent_flame" placeholder="...">
        <h3>Extent of Smoke Damage</h3>
        <input type="text" name="extent_smoke" placeholder="...">
        <h3>Detector Performance</h3>
        <input type="text" name="detector_performance" placeholder="...">
        <h3>Sprinkler Performance</h3>
        <input type="text" name="sprinkler_performance" placeholder="...">
        <h3>Type of Material Generating Most Smoke</h3>
        <input type="text" name="type_most_smoke" placeholder="...">
        <h3>Form of Material Generating Most Smoke</h3>
        <input type="text" name="form_most_smoke" placeholder="...">
        <h3>Avenue of Smoke Travel</h3>
        <input type="text" name="avenue_smoke_travel" placeholder="...">

        <h3>SECTION 4 - PROPERTY</h3>
        <h3>Mobile Property</h3>
        <input type="text" name="mobile_property" placeholder="...">
        <h3>YR.</h3>
        <input type="text" name="year1" placeholder="...">
        <h3>Make</h3>
        <input type="text" name="make1" placeholder="...">
        <h3>Model</h3>
        <input type="text" name="model1" placeholder="...">
        <h3>Serial No.</h3>
        <input type="text" name="serial_number1" placeholder="...">
        <h3>License No. (if any)</h3>
        <input type="text" name="license_number" placeholder="...">
        <h3>Equipment Involved in Ignition</h3>
        <input type="text" name="equipment_involved" placeholder="...">
        <h3>YR.</h3>
        <input type="text" name="year2" placeholder="...">
        <h3>Make</h3>
        <input type="text" name="make2" placeholder="...">
        <h3>Model</h3>
        <input type="text" name="model2" placeholder="...">
        <h3>Serial No.</h3>
        <input type="text" name="serial_number2" placeholder="...">
        <h3>Voltage (if any)</h3>
        <input type="text" name="voltage" placeholder="...">

        <h3>SECTION 5 - PREPARER OF THIS REPORT</h3>
        <h3>Investigator's Signature</h3>
        <input type="text" name="reporter" placeholder="...">
        <h3>Date Now</h3>
        <input type="datetime-local" name="date_of_complete_report">


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