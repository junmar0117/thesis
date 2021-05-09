<?php
session_start();
if($_SESSION['user']){ //checks if user is logged in
}else{
  header("location:index.php "); // redirects if user is not logged in
}

$user = $_SESSION['user']; //assigns user value
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> View Reports | R & R </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/viewReports.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section>
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
        include_once('B_Userheader.html');
        Print '</nav>';
        Print '<div class="viewRepHead">Report Details</div>';
        Print '<table class="viewReportsTable">';
            
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $id = ($_POST['id']);
            }
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
            </table>
            <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
            </tr>
            </table>
            <div class="reportProof"><?php echo "Proof of Incident"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
             <div class="viewReportStatusUpdate">  
             <?php echo "Status: "; echo $row['status'] ?>
                <button onclick="document.getElementById('id01').style.display='block'" class="viewRepEditbtn">UPDATE</button>
                <div  id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" style="color:#252525;">&times;</span>
                        <form action="editStatus.php" method="POST">
                            <br>
                            <br>
                            <div class="txt_field">
                                <select name="status" id="status">
                                    <option disabled selected>Select an Option: </option>
                                    <option value="Needs Attention">Needs Attention</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>     
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                            </div>   
                            <br>
                            <input class="viewRepStatusUpdtBtnModal" type="submit" value="Update"></input><br><br>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            
        

<?php
}}else if(mysqli_num_rows($row_f) > 0)
{
    Print '<nav>';
    include_once('F_Userheader.html');
    Print '</nav>';
    Print '<div class="viewRepHead">Report Details</div>';
    Print '<table class="viewReportsTable">';
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = ($_POST['id']);
        }
        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
        ?>
         <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
            </table>
            <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
            </tr>
            </table>
            <div class="reportProof"><?php echo "Proof of Incident"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
             <div class="viewReportStatusUpdate">  
             <?php echo "Status: "; echo $row['status'] ?>
                <button onclick="document.getElementById('id01').style.display='block'" class="viewRepEditbtn">UPDATE</button>
                <div  id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" style="color:#252525;">&times;</span>
                        <form action="editStatus.php" method="POST">
                            <br>
                            <br>
                            <div class="txt_field">
                                <select name="status" id="status">
                                    <option disabled selected>Select an Option: </option>
                                    <option value="Needs Attention">Needs Attention</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>     
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                            </div>   
                            <br>
                            <input class="viewRepStatusUpdtBtnModal" type="submit" value="Update"></input><br><br>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

<?php

}}else if(mysqli_num_rows($row_p) > 0)
{
    Print '<nav>';
    include_once('P_Userheader.html');
    Print '</nav>';
    Print '<div class="viewRepHead">Report Details</div>';
    Print '<table class="viewReportsTable">';
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = ($_POST['id']);
        }
        require 'connection.php';    
        $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
        while($row = mysqli_fetch_array($query))
        {
        ?>
         <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
            </table>
            <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
            </tr>
            </table>

            <div class="reportProof"><?php echo "Proof of Incident"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
             <div class="viewReportStatusUpdate">  
             <?php echo "Status: "; echo $row['status'] ?>
                <button onclick="document.getElementById('id01').style.display='block'" class="viewRepEditbtn">UPDATE</button>
                <div  id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" style="color:#252525;">&times;</span>
                        <form action="editStatus.php" method="POST">
                            <br>
                            <br>
                            <div class="txt_field">
                                <select name="status" id="status">
                                    <option disabled selected>Select an Option: </option>
                                    <option value="Needs Attention">Needs Attention</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>     
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                            </div>   
                            <br>
                            <input class="viewRepStatusUpdtBtnModal" type="submit" value="Update"></input><br><br>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

<?php

}}else{
        include_once('Userheader.html');
        Print '<div class="viewRepHead">Report Details</div>';
        Print '<table class="viewReportsTable">';
            
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $id = ($_POST['id']);
            }
            require 'connection.php';    
            $query = mysqli_query($con, "SELECT * from reports where id = '$id' "); // SQL Query
            while($row = mysqli_fetch_array($query))
            {
            ?>
             <tr>
             <td><?php echo "Name: "; echo $row['name']  ?></td>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
             </tr>
            </table>
             <table class="viewReportsTable">
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
             </tr>
            </table>
             
            <div class="reportProof"><?php echo "Proof of Incident"?></div>
            <div class="VRimgContainer">
            <img src='<?php echo 'reportFIles/'.$row['file'];?>' id="myImg" style="height: 300px; width: 300px;"/>
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>
            </div>
            
            <div class="viewReportStatusUpdate">  
            <?php echo "Status: "; echo $row['status'] ?>
            </div>
            
            <?php
            }
        }
            ?>
        </table>
        <br>
    </section>
</body>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</html>