<?php
require 'connection.php';
$query = mysqli_query($con, "UPDATE `reports` SET featured = '".$_POST['val']."' WHERE `report_id` = '".$_POST['id']."'");
if($query)
{
    $q = mysqli_query($con, "SELECT * FROM reports WHERE report_id = '".$_POST['id']."'");
    $data = mysqli_fetch_assoc($query);
    echo $data['$featured'];
}
?>