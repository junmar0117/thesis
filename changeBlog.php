<?php
require 'connection.php';
$query = mysqli_query($con, "UPDATE `reports` SET `status` = '".$_POST['val']."' WHERE `id` = '".$_POST['id']."'");
if($query)
{
    $q = mysqli_query($con, "SELECT * FROM reports WHERE id = '".$_POST['id']."'");
    $data = mysqli_fetch_assoc($query);
    echo $data['$status'];
}
?>