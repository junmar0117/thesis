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
    <title> Montly Report for <?php echo date('F Y'); ?> </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/viewB.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body style="background-color: #FFFFFF;">
<nav>
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
        include_once('B_Userheader.php');
        Print '</nav>';
}else if(mysqli_num_rows($row_f) > 0)
{
    Print '<nav>';
    include_once('F_Userheader.php');
    Print '</nav>';
}else if(mysqli_num_rows($row_p) > 0)
{
    Print '<nav>';
    include_once('P_Userheader.php');
    Print '</nav>';
}else{
    include_once('Userheader.php');
}
?>
</nav>
<br>
<div class="verticalTabView">
    <h2 class="vBHeader"> Montly Report for <?php echo date('F Y'); ?> </h2>
    <h3 class="vBHeader2">Click each barangay to check how many were reported for the month of <?php echo date('F Y'); ?> </h3>
    <br>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Barangay 833')" id="defaultOpen">Barangay 833</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 834')">Barangay 834</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 835')">Barangay 835</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 836')">Barangay 836</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 837')">Barangay 837</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 838')">Barangay 838</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 839')">Barangay 839</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 840')">Barangay 840</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 841')">Barangay 841</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 842')">Barangay 842</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 843')">Barangay 843</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 844')">Barangay 844</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 845')">Barangay 845</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 846')">Barangay 846</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 847')">Barangay 847</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 848')">Barangay 848</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 849')">Barangay 849</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 850')">Barangay 850</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 851')">Barangay 851</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 852')">Barangay 852</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 853')">Barangay 853</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 855')">Barangay 855</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 856')">Barangay 856</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 857')">Barangay 857</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 858')">Barangay 858</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 859')">Barangay 859</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 860')">Barangay 860</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 861')">Barangay 861</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 862')">Barangay 862</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 863')">Barangay 863</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 864')">Barangay 864</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 865')">Barangay 865</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 867')">Barangay 867</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 868')">Barangay 868</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 869')">Barangay 869</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 870')">Barangay 870</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 871')">Barangay 871</button>
        <button class="tablinks" onclick="openCity(event, 'Barangay 872')">Barangay 872</button>
    </div>
    <?php
    require 'connection.php';  
    $result=mysqli_query($con,"SELECT count(*) as total from reports WHERE barangay='833'");
    $data=mysqli_fetch_assoc($result);
    $today = date("m");//date

    $totalVAWresult=mysqli_query($con,"SELECT count(*) as totalVAW from reports WHERE barangay='833' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata=mysqli_fetch_assoc($totalVAWresult);

    $totalCAresult=mysqli_query($con,"SELECT count(*) as totalCA from reports WHERE barangay='833' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata=mysqli_fetch_assoc($totalCAresult);
    ?>
    <div id="Barangay 833" class="tabcontent">
        <h3>Barangay 833</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata['totalVAW'] ?></p>
        <p>Child Abuse: <?php echo $CAdata['totalCA'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result1=mysqli_query($con,"SELECT count(*) as total1 from reports WHERE barangay='834'");
    $data1=mysqli_fetch_assoc($result1);

    $totalVAWresult1=mysqli_query($con,"SELECT count(*) as totalVAW1 from reports WHERE barangay='834' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata1=mysqli_fetch_assoc($totalVAWresult1);

    $totalCAresult1=mysqli_query($con,"SELECT count(*) as totalCA1 from reports WHERE barangay='834' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata1=mysqli_fetch_assoc($totalCAresult1);
    ?>
    <div id="Barangay 834" class="tabcontent">
        <h3>Barangay 834</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata1['totalVAW1'] ?></p>
        <p>Child Abuse: <?php echo $CAdata1['totalCA1'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result2=mysqli_query($con,"SELECT count(*) as total2 from reports WHERE barangay='835'");
    $data2=mysqli_fetch_assoc($result2);

    $totalVAWresult2=mysqli_query($con,"SELECT count(*) as totalVAW2 from reports WHERE barangay='835' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata2=mysqli_fetch_assoc($totalVAWresult2);

    $totalCAresult2=mysqli_query($con,"SELECT count(*) as totalCA2 from reports WHERE barangay='835' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata2=mysqli_fetch_assoc($totalCAresult2);
    ?>
    <div id="Barangay 835" class="tabcontent">
        <h3>Barangay 835</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata2['totalVAW2'] ?></p>
        <p>Child Abuse: <?php echo $CAdata2['totalCA2'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result3=mysqli_query($con,"SELECT count(*) as total3 from reports WHERE barangay='836'");
    $data3=mysqli_fetch_assoc($result3);

    $totalVAWresult3=mysqli_query($con,"SELECT count(*) as totalVAW3 from reports WHERE barangay='836' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata3=mysqli_fetch_assoc($totalVAWresult3);

    $totalCAresult3=mysqli_query($con,"SELECT count(*) as totalCA3 from reports WHERE barangay='836' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata3=mysqli_fetch_assoc($totalCAresult3);
    ?>
    <div id="Barangay 836" class="tabcontent">
        <h3>Barangay 836</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata3['totalVAW3'] ?></p>
        <p>Child Abuse: <?php echo $CAdata3['totalCA3'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result4=mysqli_query($con,"SELECT count(*) as total4 from reports WHERE barangay='837'");
    $data4=mysqli_fetch_assoc($result4);
    
    $totalVAWresult4=mysqli_query($con,"SELECT count(*) as totalVAW4 from reports WHERE barangay='837' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata4=mysqli_fetch_assoc($totalVAWresult4);

    $totalCAresult4=mysqli_query($con,"SELECT count(*) as totalCA4 from reports WHERE barangay='837' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata4=mysqli_fetch_assoc($totalCAresult4);
    ?>
    <div id="Barangay 837" class="tabcontent">
        <h3>Barangay 837</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata4['totalVAW4'] ?></p>
        <p>Child Abuse: <?php echo $CAdata4['totalCA4'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result5=mysqli_query($con,"SELECT count(*) as total5 from reports WHERE barangay='838'");
    $data5=mysqli_fetch_assoc($result5);

    $totalVAWresult5=mysqli_query($con,"SELECT count(*) as totalVAW5 from reports WHERE barangay='838' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata5=mysqli_fetch_assoc($totalVAWresult5);

    $totalCAresult5=mysqli_query($con,"SELECT count(*) as totalCA5 from reports WHERE barangay='838' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata5=mysqli_fetch_assoc($totalCAresult5);
    ?>
    <div id="Barangay 838" class="tabcontent">
        <h3>Barangay 838</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata5['totalVAW5'] ?></p>
        <p>Child Abuse: <?php echo $CAdata5['totalCA5'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result6=mysqli_query($con,"SELECT count(*) as total6 from reports WHERE barangay='839'");
    $data6=mysqli_fetch_assoc($result6);

    $totalVAWresult6=mysqli_query($con,"SELECT count(*) as totalVAW6 from reports WHERE barangay='839' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata6=mysqli_fetch_assoc($totalVAWresult6);

    $totalCAresult6=mysqli_query($con,"SELECT count(*) as totalCA6 from reports WHERE barangay='839' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata6=mysqli_fetch_assoc($totalCAresult6);
    ?>
    <div id="Barangay 839" class="tabcontent">
        <h3>Barangay 839</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata6['totalVAW6'] ?></p>
        <p>Child Abuse: <?php echo $CAdata6['totalCA6'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result7=mysqli_query($con,"SELECT count(*) as total7 from reports WHERE barangay='840'");
    $data7=mysqli_fetch_assoc($result7);

    $totalVAWresult7=mysqli_query($con,"SELECT count(*) as totalVAW7 from reports WHERE barangay='840' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata7=mysqli_fetch_assoc($totalVAWresult7);

    $totalCAresult7=mysqli_query($con,"SELECT count(*) as totalCA7 from reports WHERE barangay='840' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata7=mysqli_fetch_assoc($totalCAresult7);
    ?>
    <div id="Barangay 840" class="tabcontent">
        <h3>Barangay 840</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata7['totalVAW7'] ?></p>
        <p>Child Abuse: <?php echo $CAdata7['totalCA7'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result8=mysqli_query($con,"SELECT count(*) as total8 from reports WHERE barangay='841'");
    $data8=mysqli_fetch_assoc($result8);

    $totalVAWresult8=mysqli_query($con,"SELECT count(*) as totalVAW8 from reports WHERE barangay='841' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata8=mysqli_fetch_assoc($totalVAWresult8);

    $totalCAresult8=mysqli_query($con,"SELECT count(*) as totalCA8 from reports WHERE barangay='841' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata8=mysqli_fetch_assoc($totalCAresult8);
    ?>
    <div id="Barangay 841" class="tabcontent">
        <h3>Barangay 841</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata8['totalVAW8'] ?></p>
        <p>Child Abuse: <?php echo $CAdata8['totalCA8'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result10=mysqli_query($con,"SELECT count(*) as total10 from reports WHERE barangay='842'");
    $data10=mysqli_fetch_assoc($result10);

    $totalVAWresult10=mysqli_query($con,"SELECT count(*) as totalVAW10 from reports WHERE barangay='842' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata10=mysqli_fetch_assoc($totalVAWresult10);

    $totalCAresult10=mysqli_query($con,"SELECT count(*) as totalCA10 from reports WHERE barangay='842' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata10=mysqli_fetch_assoc($totalCAresult10);
    ?>
    <div id="Barangay 842" class="tabcontent">
        <h3>Barangay 842</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata9['totalVAW9'] ?></p>
        <p>Child Abuse: <?php echo $CAdata9['totalCA9'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result01=mysqli_query($con,"SELECT count(*) as total01 from reports WHERE barangay='843'");
    $data01=mysqli_fetch_assoc($result01);

    $totalVAWresult01=mysqli_query($con,"SELECT count(*) as totalVAW01 from reports WHERE barangay='843' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata01=mysqli_fetch_assoc($totalVAWresult01);

    $totalCAresult01=mysqli_query($con,"SELECT count(*) as totalCA01 from reports WHERE barangay='843' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata01=mysqli_fetch_assoc($totalCAresult01);
    ?>
    <div id="Barangay 843" class="tabcontent">
        <h3>Barangay 843</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata02['totalVAW02'] ?></p>
        <p>Child Abuse: <?php echo $CAdata02['totalCA02'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result02=mysqli_query($con,"SELECT count(*) as total02 from reports WHERE barangay='844'");
    $data02=mysqli_fetch_assoc($result02);

    $totalVAWresult02=mysqli_query($con,"SELECT count(*) as totalVAW02 from reports WHERE barangay='844' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata02=mysqli_fetch_assoc($totalVAWresult02);

    $totalCAresult02=mysqli_query($con,"SELECT count(*) as totalCA02 from reports WHERE barangay='844' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata02=mysqli_fetch_assoc($totalCAresult02);
    ?>
    <div id="Barangay 844" class="tabcontent">
        <h3>Barangay 844</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata02['totalVAW02'] ?></p>
        <p>Child Abuse: <?php echo $CAdata02['totalCA02'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result03=mysqli_query($con,"SELECT count(*) as total03 from reports WHERE barangay='845'");
    $data03=mysqli_fetch_assoc($result03);

    $totalVAWresult03=mysqli_query($con,"SELECT count(*) as totalVAW03 from reports WHERE barangay='845' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata03=mysqli_fetch_assoc($totalVAWresult03);

    $totalCAresult03=mysqli_query($con,"SELECT count(*) as totalCA03 from reports WHERE barangay='845' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata03=mysqli_fetch_assoc($totalCAresult03);
    ?>
    <div id="Barangay 845" class="tabcontent">
        <h3>Barangay 845</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata03['totalVAW03'] ?></p>
        <p>Child Abuse: <?php echo $CAdata03['totalCA03'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result04=mysqli_query($con,"SELECT count(*) as total04 from reports WHERE barangay='846'");
    $data04=mysqli_fetch_assoc($result04);

    $totalVAWresult04=mysqli_query($con,"SELECT count(*) as totalVAW04 from reports WHERE barangay='846' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata04=mysqli_fetch_assoc($totalVAWresult04);

    $totalCAresult04=mysqli_query($con,"SELECT count(*) as totalCA04 from reports WHERE barangay='846' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata04=mysqli_fetch_assoc($totalCAresult04);
    ?>
    <div id="Barangay 846" class="tabcontent">
        <h3>Barangay 846</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata04['totalVAW04'] ?></p>
        <p>Child Abuse: <?php echo $CAdata04['totalCA04'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result05=mysqli_query($con,"SELECT count(*) as total05 from reports WHERE barangay='847'");
    $data05=mysqli_fetch_assoc($result05);

    $totalVAWresult05=mysqli_query($con,"SELECT count(*) as totalVAW05 from reports WHERE barangay='847' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata05=mysqli_fetch_assoc($totalVAWresult05);

    $totalCAresult05=mysqli_query($con,"SELECT count(*) as totalCA05 from reports WHERE barangay='847' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata05=mysqli_fetch_assoc($totalCAresult05);
    ?>
    <div id="Barangay 847" class="tabcontent">
        <h3>Barangay 847</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata05['totalVAW05'] ?></p>
        <p>Child Abuse: <?php echo $CAdata05['totalCA05'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result06=mysqli_query($con,"SELECT count(*) as total06 from reports WHERE barangay='848'");
    $data06=mysqli_fetch_assoc($result06);

    $totalVAWresult06=mysqli_query($con,"SELECT count(*) as totalVAW06 from reports WHERE barangay='848' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata06=mysqli_fetch_assoc($totalVAWresult06);

    $totalCAresult06=mysqli_query($con,"SELECT count(*) as totalCA06 from reports WHERE barangay='848' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata06=mysqli_fetch_assoc($totalCAresult06);
    ?>
    <div id="Barangay 848" class="tabcontent">
        <h3>Barangay 848</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata06['totalVAW06'] ?></p>
        <p>Child Abuse: <?php echo $CAdata06['totalCA06'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result07=mysqli_query($con,"SELECT count(*) as total07 from reports WHERE barangay='849'");
    $data07=mysqli_fetch_assoc($result07);

    $totalVAWresult07=mysqli_query($con,"SELECT count(*) as totalVAW07 from reports WHERE barangay='849' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata07=mysqli_fetch_assoc($totalVAWresult07);

    $totalCAresult07=mysqli_query($con,"SELECT count(*) as totalCA07 from reports WHERE barangay='849' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata07=mysqli_fetch_assoc($totalCAresult07);
    ?>
    <div id="Barangay 849" class="tabcontent">
        <h3>Barangay 849</h3>
        <p>Address: 1423 Ilang-Ilang Street, Pandacan, Manila, 1000 Metro Manila</p>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata07['totalVAW07'] ?></p>
        <p>Child Abuse: <?php echo $CAdata07['totalCA07'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result08=mysqli_query($con,"SELECT count(*) as total08 from reports WHERE barangay='850'");
    $data08=mysqli_fetch_assoc($result08);

    $totalVAWresult08=mysqli_query($con,"SELECT count(*) as totalVAW08 from reports WHERE barangay='850' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata08=mysqli_fetch_assoc($totalVAWresult08);

    $totalCAresult08=mysqli_query($con,"SELECT count(*) as totalCA08 from reports WHERE barangay='850' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata08=mysqli_fetch_assoc($totalCAresult08);
    ?>
    <div id="Barangay 850" class="tabcontent">
        <h3>Barangay 850</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata08['totalVAW08'] ?></p>
        <p>Child Abuse: <?php echo $CAdata08['totalCA08'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result09=mysqli_query($con,"SELECT count(*) as total09 from reports WHERE barangay='851'");
    $data09=mysqli_fetch_assoc($result09);

    $totalVAWresult09=mysqli_query($con,"SELECT count(*) as totalVAW09 from reports WHERE barangay='851' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata09=mysqli_fetch_assoc($totalVAWresult09);

    $totalCAresult09=mysqli_query($con,"SELECT count(*) as totalCA09 from reports WHERE barangay='851' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata09=mysqli_fetch_assoc($totalCAresult09);
    ?>
    <div id="Barangay 851" class="tabcontent">
        <h3>Barangay 851</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata09['totalVAW09'] ?></p>
        <p>Child Abuse: <?php echo $CAdata09['totalCA09'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result010=mysqli_query($con,"SELECT count(*) as total010 from reports WHERE barangay='852'");
    $data010=mysqli_fetch_assoc($result010);

    $totalVAWresult010=mysqli_query($con,"SELECT count(*) as totalVAW010 from reports WHERE barangay='852' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata010=mysqli_fetch_assoc($totalVAWresult010);

    $totalCAresult010=mysqli_query($con,"SELECT count(*) as totalCA010 from reports WHERE barangay='852' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata010=mysqli_fetch_assoc($totalCAresult010);
    ?>
    <div id="Barangay 852" class="tabcontent">
        <h3>Barangay 852</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata010['totalVAW010'] ?></p>
        <p>Child Abuse: <?php echo $CAdata010['totalCA010'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result11=mysqli_query($con,"SELECT count(*) as total11 from reports WHERE barangay='853'");
    $data11=mysqli_fetch_assoc($result11);

    $totalVAWresult11=mysqli_query($con,"SELECT count(*) as totalVAW11 from reports WHERE barangay='853' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata11=mysqli_fetch_assoc($totalVAWresult11);

    $totalCAresult11=mysqli_query($con,"SELECT count(*) as totalCA11 from reports WHERE barangay='853' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata11=mysqli_fetch_assoc($totalCAresult11);
    ?>
    <div id="Barangay 853" class="tabcontent">
        <h3>Barangay 853</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata11['totalVAW11'] ?></p>
        <p>Child Abuse: <?php echo $CAdata11['totalCA11'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result12=mysqli_query($con,"SELECT count(*) as total12 from reports WHERE barangay='855'");
    $data12=mysqli_fetch_assoc($result12);

    $totalVAWresult12=mysqli_query($con,"SELECT count(*) as totalVAW12 from reports WHERE barangay='855' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata012=mysqli_fetch_assoc($totalVAWresult12);

    $totalCAresult12=mysqli_query($con,"SELECT count(*) as totalCA12 from reports WHERE barangay='855' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata12=mysqli_fetch_assoc($totalCAresult12);
    ?>
    <div id="Barangay 855" class="tabcontent">
        <h3>Barangay 855</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata12['totalVAW12'] ?></p>
        <p>Child Abuse: <?php echo $CAdata12['totalCA12'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result13=mysqli_query($con,"SELECT count(*) as total13 from reports WHERE barangay='856'");
    $data13=mysqli_fetch_assoc($result13);

    $totalVAWresult13=mysqli_query($con,"SELECT count(*) as totalVAW13 from reports WHERE barangay='856' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata13=mysqli_fetch_assoc($totalVAWresult13);

    $totalCAresult13=mysqli_query($con,"SELECT count(*) as totalCA13 from reports WHERE barangay='856' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata13=mysqli_fetch_assoc($totalCAresult13);
    ?>
    <div id="Barangay 856" class="tabcontent">
        <h3>Barangay 856</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata13['totalVAW13'] ?></p>
        <p>Child Abuse: <?php echo $CAdata13['totalCA13'] ?></p>
        </div>
    <?php
    require 'connection.php';  
    $result14=mysqli_query($con,"SELECT count(*) as total14 from reports WHERE barangay='857'");
    $data14=mysqli_fetch_assoc($result14);

    $totalVAWresult14=mysqli_query($con,"SELECT count(*) as totalVAW14 from reports WHERE barangay='8' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata14=mysqli_fetch_assoc($totalVAWresult14);

    $totalCAresult14=mysqli_query($con,"SELECT count(*) as totalCA14 from reports WHERE barangay='8' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata14=mysqli_fetch_assoc($totalCAresult14);
    ?>
    <div id="Barangay 857" class="tabcontent">
        <h3>Barangay 857</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata14['totalVAW14'] ?></p>
        <p>Child Abuse: <?php echo $CAdata14['totalCA14'] ?></p>
        </div>

    <?php
    //LAST
    require 'connection.php';  
    $result15=mysqli_query($con,"SELECT count(*) as total15 from reports WHERE barangay='858'");
    $data15=mysqli_fetch_assoc($result15);

    $totalVAWresult15=mysqli_query($con,"SELECT count(*) as totalVAW15 from reports WHERE barangay='858' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata15=mysqli_fetch_assoc($totalVAWresult15);

    $totalCAresult15=mysqli_query($con,"SELECT count(*) as totalCA15 from reports WHERE barangay='858' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata15=mysqli_fetch_assoc($totalCAresult15);
    ?>
    <div id="Barangay 858" class="tabcontent">
        <h3>Barangay 858</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata15['totalVAW15'] ?></p>
        <p>Child Abuse: <?php echo $CAdata15['totalCA15'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result16=mysqli_query($con,"SELECT count(*) as total16 from reports WHERE barangay='859'");
    $data16=mysqli_fetch_assoc($result16);

    $totalVAWresult16=mysqli_query($con,"SELECT count(*) as totalVAW16 from reports WHERE barangay='859' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata16=mysqli_fetch_assoc($totalVAWresult16);

    $totalCAresult16=mysqli_query($con,"SELECT count(*) as totalCA16 from reports WHERE barangay='859' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata16=mysqli_fetch_assoc($totalCAresult16);
    ?>
    <div id="Barangay 859" class="tabcontent">
        <h3>Barangay 859</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata16['totalVAW16'] ?></p>
        <p>Child Abuse: <?php echo $CAdata16['totalCA16'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result17=mysqli_query($con,"SELECT count(*) as total17 from reports WHERE barangay='860'");
    $data17=mysqli_fetch_assoc($result17);

    $totalVAWresult17=mysqli_query($con,"SELECT count(*) as totalVAW17 from reports WHERE barangay='860' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata17=mysqli_fetch_assoc($totalVAWresult17);

    $totalCAresult17=mysqli_query($con,"SELECT count(*) as totalCA17 from reports WHERE barangay='860' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata17=mysqli_fetch_assoc($totalCAresult17);
    ?>
    <div id="Barangay 860" class="tabcontent">
        <h3>Barangay 860</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata17['totalVAW17'] ?></p>
        <p>Child Abuse: <?php echo $CAdata17['totalCA17'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result18=mysqli_query($con,"SELECT count(*) as total18 from reports WHERE barangay='861'");
    $data18=mysqli_fetch_assoc($result18);

    $totalVAWresult18=mysqli_query($con,"SELECT count(*) as totalVAW18 from reports WHERE barangay='861' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata18=mysqli_fetch_assoc($totalVAWresult18);

    $totalCAresult18=mysqli_query($con,"SELECT count(*) as totalCA18 from reports WHERE barangay='861' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata18=mysqli_fetch_assoc($totalCAresult18);
    ?>
    <div id="Barangay 861" class="tabcontent">
        <h3>Barangay 861</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata18['totalVAW18'] ?></p>
        <p>Child Abuse: <?php echo $CAdata18['totalCA18'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result19=mysqli_query($con,"SELECT count(*) as total19 from reports WHERE barangay='862'");
    $data19=mysqli_fetch_assoc($result19);

    $totalVAWresult19=mysqli_query($con,"SELECT count(*) as totalVAW19 from reports WHERE barangay='862' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata19=mysqli_fetch_assoc($totalVAWresult19);

    $totalCAresult19=mysqli_query($con,"SELECT count(*) as totalCA19 from reports WHERE barangay='862' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata19=mysqli_fetch_assoc($totalCAresult19);
    ?>
    <div id="Barangay 862" class="tabcontent">
        <h3>Barangay 862</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata19['totalVAW19'] ?></p>
        <p>Child Abuse: <?php echo $CAdata19['totalCA19'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result20=mysqli_query($con,"SELECT count(*) as total20 from reports WHERE barangay='863'");
    $data20=mysqli_fetch_assoc($result20);

    $totalVAWresult20=mysqli_query($con,"SELECT count(*) as totalVAW20 from reports WHERE barangay='863' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata20=mysqli_fetch_assoc($totalVAWresult20);

    $totalCAresult20=mysqli_query($con,"SELECT count(*) as totalCA20 from reports WHERE barangay='863' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata20=mysqli_fetch_assoc($totalCAresult20);
    ?>
    <div id="Barangay 863" class="tabcontent">
        <h3>Barangay 863</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata20['totalVAW20'] ?></p>
        <p>Child Abuse: <?php echo $CAdata20['totalCA20'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result21=mysqli_query($con,"SELECT count(*) as total21 from reports WHERE barangay='864'");
    $data21=mysqli_fetch_assoc($result21);

    $totalVAWresult21=mysqli_query($con,"SELECT count(*) as totalVAW21 from reports WHERE barangay='864' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata21=mysqli_fetch_assoc($totalVAWresult21);

    $totalCAresult21=mysqli_query($con,"SELECT count(*) as totalCA21 from reports WHERE barangay='864' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata21=mysqli_fetch_assoc($totalCAresult21);
    ?>
    <div id="Barangay 864" class="tabcontent">
        <h3>Barangay 864</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata21['totalVAW21'] ?></p>
        <p>Child Abuse: <?php echo $CAdata21['totalCA21'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result22=mysqli_query($con,"SELECT count(*) as total22 from reports WHERE barangay='865'");
    $data22=mysqli_fetch_assoc($result22);

    $totalVAWresult22=mysqli_query($con,"SELECT count(*) as totalVAW22 from reports WHERE barangay='865' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata22=mysqli_fetch_assoc($totalVAWresult22);

    $totalCAresult22=mysqli_query($con,"SELECT count(*) as totalCA22 from reports WHERE barangay='865' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata22=mysqli_fetch_assoc($totalCAresult22);
    ?>
    <div id="Barangay 865" class="tabcontent">
        <h3>Barangay 865</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata22['totalVAW22'] ?></p>
        <p>Child Abuse: <?php echo $CAdata22['totalCA22'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result23=mysqli_query($con,"SELECT count(*) as total23 from reports WHERE barangay='866'");
    $data23=mysqli_fetch_assoc($result23);
    
    $totalVAWresult23=mysqli_query($con,"SELECT count(*) as totalVAW23 from reports WHERE barangay='866' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata23=mysqli_fetch_assoc($totalVAWresult23);

    $totalCAresult23=mysqli_query($con,"SELECT count(*) as totalCA23 from reports WHERE barangay='866' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata23=mysqli_fetch_assoc($totalCAresult23);
    ?>
    <div id="Barangay 866" class="tabcontent">
        <h3>Barangay 866</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata23['totalVAW23'] ?></p>
        <p>Child Abuse: <?php echo $CAdata23['totalCA23'] ?></p>
        </div>

        <?php
    require 'connection.php';  
    $result24=mysqli_query($con,"SELECT count(*) as total24 from reports WHERE barangay='867'");
    $data24=mysqli_fetch_assoc($result24);

    $totalVAWresult24=mysqli_query($con,"SELECT count(*) as totalVAW24 from reports WHERE barangay='867' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata24=mysqli_fetch_assoc($totalVAWresult24);

    $totalCAresult24=mysqli_query($con,"SELECT count(*) as totalCA24 from reports WHERE barangay='867' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata24=mysqli_fetch_assoc($totalCAresult24);
    ?>
    <div id="Barangay 867" class="tabcontent">
        <h3>Barangay 867</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata24['totalVAW24'] ?></p>
        <p>Child Abuse: <?php echo $CAdata24['totalCA24'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result25=mysqli_query($con,"SELECT count(*) as total25 from reports WHERE barangay='868'");
    $data25=mysqli_fetch_assoc($result25);

    $totalVAWresult25=mysqli_query($con,"SELECT count(*) as totalVAW25 from reports WHERE barangay='868' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata25=mysqli_fetch_assoc($totalVAWresult25);

    $totalCAresult25=mysqli_query($con,"SELECT count(*) as totalCA25 from reports WHERE barangay='868' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata25=mysqli_fetch_assoc($totalCAresult25);
    ?>
    <div id="Barangay 868" class="tabcontent">
        <h3>Barangay 868</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata25['totalVAW25'] ?></p>
        <p>Child Abuse: <?php echo $CAdata25['totalCA25'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result26=mysqli_query($con,"SELECT count(*) as total26 from reports WHERE barangay='869'");
    $data26=mysqli_fetch_assoc($result26);

    $totalVAWresult26=mysqli_query($con,"SELECT count(*) as totalVAW26 from reports WHERE barangay='869' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata26=mysqli_fetch_assoc($totalVAWresult26);

    $totalCAresult26=mysqli_query($con,"SELECT count(*) as totalCA26 from reports WHERE barangay='869' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata26=mysqli_fetch_assoc($totalCAresult26);
    ?>
    <div id="Barangay 869" class="tabcontent">
        <h3>Barangay 869</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata26['totalVAW26'] ?></p>
        <p>Child Abuse: <?php echo $CAdata26['totalCA26'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result27=mysqli_query($con,"SELECT count(*) as total27 from reports WHERE barangay='870'");
    $data27=mysqli_fetch_assoc($result27);

    $totalVAWresult27=mysqli_query($con,"SELECT count(*) as totalVAW27 from reports WHERE barangay='8' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata27=mysqli_fetch_assoc($totalVAWresult27);

    $totalCAresult27=mysqli_query($con,"SELECT count(*) as totalCA27 from reports WHERE barangay='8' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata27=mysqli_fetch_assoc($totalCAresult27);
    ?>
    <div id="Barangay 870" class="tabcontent">
        <h3>Barangay 870</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata27['totalVAW27'] ?></p>
        <p>Child Abuse: <?php echo $CAdata27['totalCA27'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result28=mysqli_query($con,"SELECT count(*) as total28 from reports WHERE barangay='871'");
    $data28=mysqli_fetch_assoc($result28);

    $totalVAWresult28=mysqli_query($con,"SELECT count(*) as totalVAW28 from reports WHERE barangay='871' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata28=mysqli_fetch_assoc($totalVAWresult28);

    $totalCAresult28=mysqli_query($con,"SELECT count(*) as totalCA28 from reports WHERE barangay='871' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata28=mysqli_fetch_assoc($totalCAresult28);
    ?>
    <div id="Barangay 871" class="tabcontent">
        <h3>Barangay 871</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata28['totalVAW28'] ?></p>
        <p>Child Abuse: <?php echo $CAdata28['totalCA28'] ?></p>
        </div>

    <?php
    require 'connection.php';  
    $result29=mysqli_query($con,"SELECT count(*) as total29 from reports WHERE barangay='872'");
    $data29=mysqli_fetch_assoc($result29);

    $totalVAWresult29=mysqli_query($con,"SELECT count(*) as totalVAW29 from reports WHERE barangay='8' AND type='Violence Against Women' AND MONTH(time)=$today ");
    $VAWdata29=mysqli_fetch_assoc($totalVAWresult29);

    $totalCAresult29=mysqli_query($con,"SELECT count(*) as totalCA29 from reports WHERE barangay='8' AND type='Child Abuse' AND MONTH(time)=$today ");
    $CAdata29=mysqli_fetch_assoc($totalCAresult29);
    ?>
    <div id="Barangay 872" class="tabcontent">
        <h3>Barangay 872</h3>
        <hr>
        <p>Number of Incidents reported for the month of <?php echo date('F Y'); ?></p>
        <p>Nature of Case | Total Number of Cases Reported</p>
        <p>Violation Against Women: <?php echo $VAWdata29['totalVAW29'] ?></p>
        <p>Child Abuse: <?php echo $CAdata29['totalCA29'] ?></p>
        </div>
</div>
<div class="footer2">
              <br>
          </div>
</body>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</html>