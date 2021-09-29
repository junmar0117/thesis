<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'connection.php';  
    $id = ($_POST['id']);
	$title =  ($_POST['title']);
    $time = ($_POST['time']);
    $content = ($_POST['content']);
    $image = ($_POST['file']);
    $featured = 0;

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

                    $fileDestination = './assets/announcements/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    mysqli_query($con, "INSERT INTO announcements (b_admin_id, `title`, `image`, `contents`,`date_created`,`featured`) VALUES ('$id','$title','$fileNameNew','$content','$time',`$featured`)"); //Inserts the value to table users
                    header("Location: B_addAnnouncements.php?success=Success");
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