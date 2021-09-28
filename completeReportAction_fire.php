<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';

    $assigned_id = $_POST['assigned_id'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $report_timesent = $_POST['time'];
    $place = $_POST['place'];
    $incident = $_POST['incident'];
    $description = $_POST['description'];
    $file = $_POST['file'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $barangay = $_POST['barangay'];
    $type = $_POST['type'];
    $status = "Completed/Finished";
    $emergency = $_POST['emergency'];
    $crime = $_POST['crime'];
    $when = $_POST['when'];

    //SECTION 1
    $building_address = $_POST['building_address'];
    $building_number = $_POST['building_number'];
    $fixed_property = $_POST['fixed_property'];
    $incident_type = $_POST['incident_type'];
    $occupants_status = $_POST['occupants_status'];
    $did_respond = $_POST['did_respond'];
    $called_via = $_POST['called_via'];
    $respond_within_minutes = $_POST['respond_within_minutes'];
    $history = $_POST['history'];
    $actions_recommendations = $_POST['actions_recommendations'];
    $num_injuries = $_POST['num_injuries'];
    $num_deaths = $_POST['num_deaths'];

    //SECTION 2
    $fire_origin = $_POST['fire_origin'];
    $equipment = $_POST['equipment'];
    $form_of_heat = $_POST['form_of_heat'];
    $type_material_ignited = $_POST['type_material_ignited'];
    $form_of_material = $_POST['form_of_material'];
    $method_of_extinguishment = $_POST['method_of_extinguishment'];
    $level_of_fire = $_POST['level_of_fire'];

    //SECTION 3
    $extent_flame = $_POST['extent_flame'];
    $extent_smoke = $_POST['extent_smoke'];
    $detector_performance = $_POST['detector_performance'];
    $sprinkler_performance = $_POST['sprinkler_performance'];
    $type_most_smoke = $_POST['type_most_smoke'];
    $form_most_smoke = $_POST['form_most_smoke'];
    $avenue_smoke_travel = $_POST['avenue_smoke_travel'];

    //SECTION 4
    $mobile_property = $_POST['mobile_property'];
    $year1 = $_POST['year1'];
    $make1 = $_POST['make1'];
    $model1 = $_POST['model1'];
    $serial_number1 = $_POST['serial_number1'];
    $license_number = $_POST['license_number'];
    $equipment_involved = $_POST['equipment_involved'];
    $year2 = $_POST['year2'];
    $make2 = $_POST['make2'];
    $model2 = $_POST['model2'];
    $serial_number2 = $_POST['serial_number2'];
    $voltage = $_POST['voltage'];

    //SECTION 5
    $reporter = $_POST['reporter'];
    $date_of_complete_report = $_POST['date_of_complete_report'];

    $bool = true;
    if($bool)
    {
        mysqli_query($con, "INSERT INTO complete_reports (username, reports_id, name, incident_time_date, place, barangay, description, file, type, incident, report_timesent, status, emergency, crime, latitude, longitude) VALUES ('$username','$id','$name','$involve','$why','$how', '$when', '$place', '$barangay', '$description', '$file', '$type', '$incident', '$report_timesent', '$status', '$emergency', '$crime', '$latitude', '$longitude')"); //Inserts the value to table users

        mysqli_query($con, "INSERT INTO complete_report_fire (username, reports_id, name, incident_time_date, place, barangay, description, file, type, incident, report_timesent, status, emergency, crime, latitude, longitude, building_address, building_number, fixed_property, incident_type, occupants_status, did_respond, called_via, respond_within_minutes, history, actions_recommendations, num_injuries, num_deaths, fire_origin, equipment, form_of_heat, type_material_ignited, form_of_material, method_of_extinguishment, level_of_fire, extent_flame, extent_smoke, detector_performance, sprinkler_performance, type_most_smoke, form_most_smoke, avenue_smoke_travel, mobile_property, year1, make1, model1, serial_number1, license_number, equipment_involved, year2, make2, model2, serial_number2, voltage, reporter, date_of_complete_report, latitude, longitude, building_address, building_number) VALUES ('$username','$id','$name','$when', '$place', '$barangay', '$description', '$file', '$type', '$incident', '$report_timesent', '$status', '$emergency', '$crime', '$latitude', '$longitude', '$building_address' , '$building_number', '$fixed_property', '$incident_type', '$occupants_status', '$did_respond', '$called_via', '$respond_within_minutes', '$history', '$actions_recommendations', '$num_injuries', '$num_deaths', '$fire_origin', '$equipment', '$form_of_heat', '$type_material_ignited', '$form_of_material', '$method_of_extinguishment', '$level_of_fire', '$extent_flame', '$extent_smoke', '$detector_performance', '$sprinkler_performance', '$type_most_smoke','$form_most_smoke','$avenue_smoke_travel','$mobile_property','$year1','$make1', '$model1', '$serial_number1', '$license_number', '$equipment_involved', '$year2', '$make2', '$model2', '$serial_number2', '$voltage', '$reporter', '$date_of_complete_report')"); //Inserts the value to table users

        $query = "UPDATE `reports` SET `status`= 'Completed' WHERE `report_id` = $id";
	    $results = mysqli_query($con, $query); //Query the users table

        $query = "DELETE FROM `f_assigned` WHERE `id` = $assigned_id";
	    $results = mysqli_query($con, $query); //Query the users table

        print '<script>alert("Report Successfully Filled!"); </script>'; // Prompts the user
        print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
    }
}
?>