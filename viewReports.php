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
    <title> Home Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profilestyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<nav>

</nav>
    <br>
    <br>
    <br>
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
        include_once('BUserheader.html');
        Print '</nav>';
        Print '<table class="AllReportHistory1">';
        Print    '<tr>';
        Print        '<tr>';
        Print        '<th>Report Details</th>';
        Print        '</tr>';
        Print   '</tr>';
            
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
             </tr>
             <tr>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             </tr>
             <tr>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             </tr>
             <tr>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
             </tr>
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
             </tr>
             <tr>
             <td><?php echo "Proof: "?> <img src='<?php echo 'reportFIles/'.$row['file'];?>' style="height: 1080px; width: 1920px;"/></td>
             </tr>
             <tr>
             <td>
             <div class="w3-container">  
             <?php echo "Status: "; echo $row['status'] ?>
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Edit</button>
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <form action="editStatus.php" method="POST">
                            <div class="txt_field">
                                <select name="status" id="status">
                                    <option disabled selected>Select an Option: </option>
                                    <option value="Needs Attention">Needs Attention</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>     
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                            </div>   
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
             </td>
             </tr>
            
        </table>

<?php
}}else if(mysqli_num_rows($row_f) > 0)
{
    Print '<nav>';
    include_once('F
    _Userheader.html');
    Print '</nav>';
    Print '<table class="AllReportHistory1">';
    Print    '<tr>';
    Print        '<tr>';
    Print        '<th>Report Details</th>';
    Print        '</tr>';
    Print   '</tr>';
        
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
         </tr>
         <tr>
         <td><?php echo "Username: "; echo $row['username']  ?></td>
         </tr>
         <tr>
         <td><?php echo "Date: "; echo $row['date']?></td>
         </tr>
         <tr>
         <td><?php echo "Time: "; echo $row['time']?></td>
         </tr>
         <tr>
         <td><?php echo "Place: "; echo $row['place']?></td>
         </tr>
         <tr>
         <td><?php echo "Incident: "; echo $row['incident']?></td>
         </tr>
         <tr>
         <td><?php echo "Incident Description: "; echo $row['description']?></td>
         </tr>
         <tr>
         <td><?php echo "Proof: "?> <img src='<?php echo 'reportFIles/'.$row['file'];?>' style="height: 1080px; width: 1920px;"/></td>
         </tr>
         <tr>
         <td>
         <div class="w3-container">  
         <?php echo "Status: "; echo $row['status'] ?>
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Edit</button>
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <form action="editStatus.php" method="POST">
                        <div class="txt_field">
                            <select name="status" id="status">
                                <option disabled selected>Select an Option: </option>
                                <option value="Needs Attention">Needs Attention</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>     
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                        </div>   
                        <button type="submit">Submit</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
         </td>
         </tr>
        
    </table>

<?php

}}else if(mysqli_num_rows($row_p) > 0)
{
    Print '<nav>';
    include_once('P_Userheader.html');
    Print '</nav>';
    Print '<table class="AllReportHistory1">';
    Print    '<tr>';
    Print        '<tr>';
    Print        '<th>Report Details</th>';
    Print        '</tr>';
    Print   '</tr>';
        
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
         </tr>
         <tr>
         <td><?php echo "Username: "; echo $row['username']  ?></td>
         </tr>
         <tr>
         <td><?php echo "Date: "; echo $row['date']?></td>
         </tr>
         <tr>
         <td><?php echo "Time: "; echo $row['time']?></td>
         </tr>
         <tr>
         <td><?php echo "Place: "; echo $row['place']?></td>
         </tr>
         <tr>
         <td><?php echo "Incident: "; echo $row['incident']?></td>
         </tr>
         <tr>
         <td><?php echo "Incident Description: "; echo $row['description']?></td>
         </tr>
         <tr>
         <td><?php echo "Proof: "?> <img src='<?php echo 'reportFIles/'.$row['file'];?>' style="height: 1080px; width: 1920px;"/></td>
         </tr>
         <tr>
         <td>
         <div class="w3-container">  
         <?php echo "Status: "; echo $row['status'] ?>
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Edit</button>
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <form action="editStatus.php" method="POST">
                        <div class="txt_field">
                            <select name="status" id="status">
                                <option disabled selected>Select an Option: </option>
                                <option value="Needs Attention">Needs Attention</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>     
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                        </div>   
                        <button type="submit">Submit</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
         </td>
         </tr>
        
    </table>

<?php

}}else{
        include_once('Userheader.html');
        Print '<table class="AllReportHistory1">';
        Print    '<tr>';
        Print        '<tr>';
        Print        '<th>Report Details</th>';
        Print        '</tr>';
        Print   '</tr>';
            
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
             </tr>
             <tr>
             <td><?php echo "Username: "; echo $row['username']  ?></td>
             </tr>
             <tr>
             <td><?php echo "Date: "; echo $row['date']?></td>
             </tr>
             <tr>
             <td><?php echo "Time: "; echo $row['time']?></td>
             </tr>
             <tr>
             <td><?php echo "Place: "; echo $row['place']?></td>
             </tr>
             <tr>
             <td><?php echo "Incident: "; echo $row['incident']?></td>
             </tr>
             <tr>
             <td><?php echo "Incident Description: "; echo $row['description']?></td>
             </tr>
             <tr>
             <td><?php echo "Proof: "?> <img src='<?php echo 'reportFIles/'.$row['file'];?>' style="height: 1080px; width: 1920px;"/></td>
             </tr>
             <tr>
             <td><?php echo "Status: "; echo $row['status'] ?>
             </td>
             </tr>
            <?php
            }
        }
            ?>
        </table>
    </section>
</body>
</html>