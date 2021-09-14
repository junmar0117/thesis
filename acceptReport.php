<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    require "connection.php";
    $id = $_POST['id']; // get id through query string
    $admin_id = $_POST['admin_id'];

    $query = mysqli_query($con, "SELECT * from reports where report_id = '$id'"); // SQL Query
    if(mysqli_num_rows($query) === 1)
    {
        $query1 = "UPDATE reports SET status = 'In Progress', admin_id = $admin_id WHERE report_id = '$id'";
        $results1 = mysqli_query($con, $query1);
        Print '<script>alert("Status Updated!");</script>'; //Prompts the user
        Print '<script>window.location.assign("B_profile.php");</script>'; // redirects to login.php
        exit();
    }
}
?>