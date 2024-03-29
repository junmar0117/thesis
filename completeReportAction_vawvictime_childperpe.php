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

    //forms
    $handling_organization = $_POST['handling_organization'];
    $address = $_POST['address'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangayy = $_POST['barangayy'];
    $intake_by = $_POST['intake_by'];
    $position = $_POST['position'];
    $case_manager = $_POST['case_manager'];
    $victim_name = $_POST['victim_name'];
    $sex = $_POST['sex'];
    $date_of_birth = $_POST['date_of_birth'];
    $age = $_POST['age'];
    $civil_status = $_POST['civil_status'];
    $educational_attainment = $_POST['educational_attainment'];
    $nationality = $_POST['nationality'];
    $passport_no = $_POST['passport_no'];
    $occupation = $_POST['occupation'];
    $religion = $_POST['religion'];
    $victim_address = $_POST['victim_address'];
    $victim_region = $_POST['victim_region'];
    $victim_province = $_POST['victim_province'];
    $victim_city = $_POST['victim_city'];
    $victim_barangayy = $_POST['victim_barangayy'];
    $with_disability = $_POST['with_disability'];
    $disability = $_POST['disability'];
    $no_of_children = $_POST['no_of_children'];
    $ages_of_children = $_POST['ages_of_children'];
    $perpetrator_name = $_POST['perpetrator_name'];
    $rel_guardian_to_victim = $_POST['rel_guardian_to_victim'];
    $guardian_address = $_POST['guardian_address'];
    $guardian_region = $_POST['guardian_region'];
    $guardian_province = $_POST['guardian_province'];
    $guardian_city = $_POST['guardian_city'];
    $guardian_barangayy = $_POST['guardian_barangayy'];
    $contact_parent = $_POST['contact_parent'];
    $sexual_abuse = isset($_POST['sexual_abuse']);
    $psychological = isset($_POST['psychological']);
    $physical1 = isset($_POST['physical1']);
    $economic = isset($_POST['economic']);
    $others_incident = isset($_POST['others_incident']);
    $rape_sexual_intercourse = isset($_POST['rape_sexual_intercourse']);
    $rape_sexual_assault = isset($_POST['rape_sexual_assault']);
    $verbal = isset($_POST['verbal']);
    $physical2 = isset($_POST['physical2']);
    $use_of_objects = isset($_POST['use_of_objects']);
    $child_prostitution = isset($_POST['child_prostitution']);
    $lascivious_conduct = isset($_POST['lascivious_conduct']);
    $anti_trafficking = isset($_POST['anti_trafficking']);
    $anti_child_porn = isset($_POST['anti_child_porn']);
    $anti_voyeurism = isset($_POST['anti_voyeurism']);
    $acts_of_lasciviousness = isset($_POST['acts_of_lasciviousness']);
    $others_penal_code = isset($_POST['others_penal_code']);
    $description_incident = $_POST['description_incident'];
    $date_latest_incident = $_POST['date_latest_incident'];
    $incident_address = $_POST['incident_address'];
    $incident_region = $_POST['incident_region'];
    $incident_province = $_POST['incident_province'];
    $incident_city = $_POST['incident_city'];
    $incident_barangayy = $_POST['incident_barangayy'];
    $place_of_incident = $_POST['place_of_incident'];
    $witness_names = $_POST['witness_names'];
    $witness_address = $_POST['witness_address'];
    $witness_contact_no = $_POST['witness_contact_no'];
    $lost_of_interest = isset($_POST['lost_of_interest']);
    $reconciled = isset($_POST['reconciled']);
    $transfer_residence = isset($_POST['transfer_residence']);
    $lack_of_support = isset($_POST['lack_of_support']);
    $lack_of_confidence = isset($_POST['lack_of_confidence']);
    $others_case = $_POST['others_case'];
    $bool = true;

    if($bool)
    {
        mysqli_query($con, "INSERT INTO complete_reports (username, reports_id, name, incident_time_date, place, barangay, description, file, type, incident, report_timesent, status, emergency, crime, latitude, longitude) VALUES ('$username','$id','$name','$involve','$why','$how', '$when', '$place', '$barangay', '$description', '$file', '$type', '$incident', '$report_timesent', '$status', '$emergency', '$crime', '$latitude', '$longitude')"); //Inserts the value to table users

        mysqli_query($con, "INSERT INTO complete_report_vaw (username, reports_id, name, incident_time_date, place, barangay, description, file, type, incident, report_timesent, status, emergency, crime, latitude, longitude, handling_organization , address, region, province, city, barangayy, intake_by, position, case_manager, victim_name, sex, date_of_birth, age, civil_status, educational_attainment, nationality, passport_no, occupation, religion, victim_address, victim_region, victim_province, victim_city, victim_barangayy, with_disability, disability, no_of_children, ages_of_children, perpetrator_name, rel_guardian_to_victim, guardian_address, guardian_region, guardian_province, guardian_city, guardian_barangayy, contact_parent, sexual_abuse, psychological, physical1, economic, others_incident, rape_sexual_intercourse, rape_sexual_assault, verbal, physical2, use_of_objects, child_prostitution, lascivious_conduct, anti_trafficking, anti_child_porn, anti_voyeurism, acts_of_lasciviousness, others_penal_code, description_incident, date_latest_incident, incident_address, incident_region, incident_province, incident_city, incident_barangayy, place_of_incident, witness_names, witness_address, witness_contact_no, lost_of_interest, reconciled, transfer_residence, lack_of_support, lack_of_confidence, others_case) VALUES ('$username','$id','$name','$when', '$place', '$barangay', '$description', '$file', '$type', '$incident', '$report_timesent', '$status', '$emergency', '$crime', '$latitude', '$longitude', '$handling_organization' , '$address', '$region', '$province', '$city', '$barangayy', '$intake_by', '$position', '$case_manager', '$victim_name', '$sex', '$date_of_birth', '$age', '$civil_status', '$educational_attainment', '$nationality', '$passport_no', '$occupation', '$religion', '$victim_address', '$victim_region', '$victim_province', '$victim_city', '$victim_barangayy','$with_disability','$disability','$no_of_children','$ages_of_children', '$perpetrator_name', '$rel_guardian_to_victim', '$guardian_address', '$guardian_region', '$guardian_province', '$guardian_city', '$guardian_barangayy', '$contact_parent','$sexual_abuse','$psychological','$physical1','$economic', '$others_incident', '$rape_sexual_intercourse', '$rape_sexual_assault', '$verbal', '$physical2', '$use_of_objects', '$child_prostitution', '$lascivious_conduct', '$anti_trafficking', '$anti_child_porn', '$anti_voyeurism', '$acts_of_lasciviousness', '$others_penal_code', '$description_incident', '$date_latest_incident', '$incident_address', '$incident_region', '$incident_province', '$incident_city', '$incident_barangayy', '$place_of_incident','$witness_names','$witness_address','$witness_contact_no','$lost_of_interest','$reconciled', '$transfer_residence', '$lack_of_support', '$lack_of_confidence', '$others_case')"); //Inserts the value to table users

        $query = "UPDATE `reports` SET `status`= 'Completed' WHERE `report_id` = $id";
	    $results = mysqli_query($con, $query); //Query the users table

        $query = "DELETE FROM `b_assigned` WHERE `id` = $assigned_id";
	    $results = mysqli_query($con, $query); //Query the users table

        print '<script>alert("Report Successfully Filled!"); </script>'; // Prompts the user
        print '<script>window.location.assign("B_profile.php");</script>'; // redirects to register.php
    }
}
?>