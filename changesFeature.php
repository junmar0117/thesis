<?php
require 'connection.php';
$query = mysqli_query($con, "UPDATE `announcements` SET featured = '".$_POST['val']."' WHERE `a_id` = '".$_POST['id']."'");
if($query)
{
    $q = mysqli_query($con, "SELECT * FROM announcements WHERE a_id = '".$_POST['id']."'");
    $data = mysqli_fetch_assoc($query);
    echo $data['$featured'];
}
?>