<?php
session_start();
if($_SESSION['user'] && $_SESSION['type']=='barangay')
{ //checks if user is logged in   
}else{
  header("location:index.php "); // redirects if user is not logged in
}

if($_SESSION['type']=='civilian'){ 
    header("location:B_profile.php ");//checks if user is barangay account
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
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $victim = $_POST['victim'];
    $id = $_POST['id'];
    $assigned_id = $_POST['assigned_id'];
}
?>
<?php
$url = "";
$url != 'B_suspectchildornot.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: index.php'); //redirect to some other page
  exit();
}
?>
<?php
    require 'connection.php';    
    $query = mysqli_query($con, "SELECT * from b_admin where username = '".$_SESSION['user']."'"); // SQL Query
    while($row = mysqli_fetch_array($query))
    {
        $b_id = $row['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Report </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reportmainstyles.css">
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
<table class="reportmainwrapper">
        <tr>
        <th class="reportmainwrapper2">
        <h1>Is it urgent?</h1>
        <h2>Select your choice</h2>
        </th>
        <td class="reportmainwrapper3">
        <h1>Is the child, the perpetrator/suspect?</h1>
        <hr>
        <form action="<?php if($victim == "Yes"){echo "completeReport_vawchild.php";}else if($victim == "No"){echo "completeReport_vawvictim_childperpe.php";}?>" method="POST">
        <input type="hidden" name="b_id" value="<?php echo $b_id;?>"></input>
        <input type="hidden" name="victim" value="<?php echo $victim?>"></input>
        <input type="hidden" name="suspect" value="Yes"></input>
        <input type="hidden" name="assigned_id" value="<?php echo $assigned_id;?>">
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
        <button class="RPbutton" style="vertical-align:middle">Yes</button><hr>
        </form>
        <form action="<?php if($victim == "Yes"){echo "completeReport_vawchildvictim.php";}else if($victim == "No"){echo "completeReport_vaw.php";}?>" method="POST">
        <input type="hidden" name="b_id" value="<?php echo $b_id;?>"></input>
        <input type="hidden" name="victim" value="<?php echo $victim;?>"></input>
        <input type="hidden" name="suspect" value="No"></input>
        <input type="hidden" name="assigned_id" value="<?php echo $assigned_id;?>">
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
        <button class="RPbutton" style="vertical-align:middle">No</button>
        </form>
        </td>
</tr>
</table>
<div class="footer2">
          </div> 
          
          <div class="CreportdashbCon">
<h1>Reports Today</h1>
          <table class="Creportdashb">
<tr>
              <td id="numberOfsR1">Local Barangay</td>
              <td id="numberOfsR1">Bureau of Fire Protection</td>
              <td id="numberOfsR1">Philippine National Police</td>
</tr>

<?php
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where incident = 'Fire' "); // SQL Query
            $fireCount = mysqli_num_rows($query);

            $query1 = mysqli_query($con, "SELECT * from reports where incident = 'Police' "); // SQL Query
            $policeCount= mysqli_num_rows($query1);

            $query2 = mysqli_query($con, "SELECT * from reports where incident = 'Barangay' "); // SQL Query
            $barangayCount= mysqli_num_rows($query2);
            ?>

<tr>
              <td id="numberOfsR2"><?php echo $barangayCount;?></td>
              <td id="numberOfsR2"><?php echo $fireCount;?></td>
              <td id="numberOfsR2"><?php echo $policeCount;?></td>
</tr>

<tr>
              <td id="numberOfsR3">Total Reports have been submitted. These reports needs the assistance of the local barangay to resolve community concerns or incidents.</td>
              <td id="numberOfsR3">Total Reports have been submitted. These reports needs the assistance of the BFP to resolve community concerns or incidents. </td>
              <td id="numberOfsR3">Total Reports have been submitted. These reports needs the assistance of the PNP to resolve community concerns or incidents.</td>
</tr>
</table>
<hr>
<p id="pnote">New reports are thoroughly investigated for proof. Response officials will be alerted of verified reports.</p>

</div>
</body>
</html>