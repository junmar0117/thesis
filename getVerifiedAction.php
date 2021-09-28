<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';  
	$validID =  ($_POST['validID']);
    $civilian_id = ($_POST['id']);

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName =$file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','mp4');
    
    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                    $fileNameNew = uniqid('', true).".". $fileActualExt;

                    $fileDestination = './assets/validid/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    mysqli_query($con, "INSERT INTO verification_proof (civilian_id, `image`, `valid_id`) VALUES ('$civilian_id','$fileNameNew','$validID')"); //Inserts the value to table users
                    Print '<script>alert("Request for Verification Sent!");</script>'; //Prompts the user
                    Print '<script>window.location.assign("C_profile.php");</script>'; // redirects to login.php
                    //header("location:allreports.php ");
            }else{
                echo "Your file is too big!";
            }

        } else {
            echo "An error occured!";
        }

    }else{
        echo "You cannot upload file of this type! The following formats are allowed: .jpg, .jpeg, .png, .mp4";
    }

}
?>