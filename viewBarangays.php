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
    <title> AidPack | Barangays </title>
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
    <h2 class="vBHeader">View Barangays</h2>
    <h3 class="vBHeader2">Locate Barangay Addresses</h3>
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
    ?>
    <div id="Barangay 833" class="tabcontent">
        <h3>Barangay 833</h3>
        <p>Address: Mabini Bridge, Barangay 833, Zone 91, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8986 3178</p>    
        <p>Number of Total Reported Incidents: <?php echo $data['total']?></p>  
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.0636574800806!2d121.0021949148402!3d14.595448489805724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ef365fbebf%3A0x73c7675a319dbdb6!2sBrgy.%20833%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620705563113!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result1=mysqli_query($con,"SELECT count(*) as total1 from reports WHERE barangay='834'");
    $data1=mysqli_fetch_assoc($result1);
    ?>
    <div id="Barangay 834" class="tabcontent">
        <h3>Barangay 834</h3>
        <p>Address: Barangay 834, Zone 92, Pandacan, Manila, 1011, Philippines</p>
        <p>Contact Number: (02) 8986 3178</p>
        <p>Number of Total Reported Incidents: <?php echo $data1['total1']?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.0970414418734!2d121.00305861484009!3d14.593545889806983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9e92e1d18a9%3A0xd11797df32b8b519!2sBrgy.%20834%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620705921834!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result2=mysqli_query($con,"SELECT count(*) as total2 from reports WHERE barangay='835'");
    $data2=mysqli_fetch_assoc($result2);
    ?>
    <div id="Barangay 835" class="tabcontent">
        <h3>Barangay 835</h3>
        <p>Address: Jesus Street, Barangay 835, Zone 91, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8995 8332</p>
        <p>Number of Total Reported Incidents: <?php echo $data2['total2']?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7722.229789334235!2d121.00348767447102!3d14.592528309230342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9e9a02c05dd%3A0xc4419e30481c040c!2sBrgy.%20835%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706200468!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result3=mysqli_query($con,"SELECT count(*) as total3 from reports WHERE barangay='836'");
    $data3=mysqli_fetch_assoc($result3);
    ?>
    <div id="Barangay 836" class="tabcontent">
        <h3>Barangay 836</h3>
        <p>Address: 2601 Jesus St, 836 Pandacan, Manila, 1011 Metro Manila</p>
        <p>Contact Number: (02) 8516 7065</p>
        <p>Number of Total Reported Incidents: <?php echo $data3['total3']?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.073951585493!2d121.00685931492333!3d14.594861839806157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9e8403dfa53%3A0x5256ba5cb4f34d23!2sBrgy.%20836%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706530142!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
        
    <?php
    require 'connection.php';  
    $result4=mysqli_query($con,"SELECT count(*) as total4 from reports WHERE barangay='837'");
    $data4=mysqli_fetch_assoc($result4);
    ?>
    <div id="Barangay 837" class="tabcontent">
        <h3>Barangay 837</h3>
        <p>Address: Roadd 2, 837 Pandacan, Manila, 1011 Metro Manila</p>
        <p>Contact Number: 0906 214 1984</p>
        <p>Number of Total Reported Incidents: <?php echo $data4['total4'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.562182525247!2d121.01182940809187!3d14.591988497452016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9c2491ea96f%3A0x7b7548c20c402171!2sBrgy.%20837%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706551271!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result5=mysqli_query($con,"SELECT count(*) as total5 from reports WHERE barangay='838'");
    $data5=mysqli_fetch_assoc($result5);
    ?>
    <div id="Barangay 838" class="tabcontent">
        <h3>Barangay 838</h3>
        <p>Address: Roadd 2, 837 Pandacan, Manila, 1011 Metro Manila</p>
        <p>Contact Number: 0906 214 1984</p>
        <p>Number of Total Reported Incidents: <?php echo $data5['total5'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.1163959081236!2d121.01112656492327!3d14.592442739807662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9c252ed1b03%3A0x4490729bef4a50b4!2sBrgy.%20838%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706661677!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result6=mysqli_query($con,"SELECT count(*) as total6 from reports WHERE barangay='839'");
    $data6=mysqli_fetch_assoc($result6);
    ?>
    <div id="Barangay 839" class="tabcontent">
        <h3>Barangay 839</h3>
        <p>Address: Zone 91, Lorenzo Dela Paz, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8994 1953</p>
        <p>Number of Total Reported Incidents: <?php echo $data6['total6'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.5748422116856!2d121.01138685809177!3d14.59054519745222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9c227623115%3A0x9ea90d21ab98f46d!2sBrgy.%20839%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706808131!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result7=mysqli_query($con,"SELECT count(*) as total7 from reports WHERE barangay='840'");
    $data7=mysqli_fetch_assoc($result7);
    ?>
    <div id="Barangay 840" class="tabcontent">
        <h3>Barangay 840</h3>
        <p>Address: 840 Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8563 2793</p>
        <p>Number of Total Reported Incidents: <?php echo $data7['total7'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.5660762570312!2d121.00978285809184!3d14.591544597452064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9c208dadde7%3A0x7cacd8c12d41c549!2sBrgy.%20840%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706821327!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result8=mysqli_query($con,"SELECT count(*) as total8 from reports WHERE barangay='841'");
    $data8=mysqli_fetch_assoc($result8);
    ?>
    <div id="Barangay 841" class="tabcontent">
        <h3>Barangay 841</h3>
        <p>Address: Zone 92, Bagong Barangay, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8588 2530</p>
        <p>Number of Total Reported Incidents: <?php echo $data8['total8'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6114236870678!2d120.99857115809182!3d14.58637384745291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c992a4f14fb1%3A0x304fd81c0a21b581!2sBrgy.%20841%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706840628!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result10=mysqli_query($con,"SELECT count(*) as total10 from reports WHERE barangay='842'");
    $data10=mysqli_fetch_assoc($result10);
    ?>
    <div id="Barangay 842" class="tabcontent">
        <h3>Barangay 842</h3>
        <p>Address:West Zandra Street Corner President Quirino, 842 Pandacan, Manila, 1011 Metro Manila</p>
        <p>Contact Number: (02) 8255 2113</p>
        <p>Number of Total Reported Incidents: <?php echo $data10['total10'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6084006475507!2d121.00003565809183!3d14.58669579745285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c992ce77b379%3A0x9bece87521d77d1f!2sBrgy.%20842%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706867829!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result01=mysqli_query($con,"SELECT count(*) as total01 from reports WHERE barangay='843'");
    $data01=mysqli_fetch_assoc($result01);
    ?>
    <div id="Barangay 843" class="tabcontent">
        <h3>Barangay 843</h3>
        <p>Address: Zone 92, Remedios Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 7482 3630</p>
        <p>Number of Total Reported Incidents: <?php echo $data01['total01'] ?></p> 
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6022160305272!2d120.99781620805969!3d14.587423897452709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9f2ab264763%3A0xcbea7ed9317188e3!2sBarangay%20843%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706876994!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result02=mysqli_query($con,"SELECT count(*) as total02 from reports WHERE barangay='844'");
    $data02=mysqli_fetch_assoc($result02);
    ?>
    <div id="Barangay 844" class="tabcontent">
        <h3>Barangay 844</h3>
        <p>Address: 1952 Obesis Street,Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: None</p>
        <p>Number of Total Reported Incidents: <?php echo $data02['total02'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.5943279980388!2d121.00006515809177!3d14.58832339745255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ed17dfc90f%3A0x52492741fbad299!2sBrgy.%20844%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706893130!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result03=mysqli_query($con,"SELECT count(*) as total03 from reports WHERE barangay='845'");
    $data03=mysqli_fetch_assoc($result03);
    ?>
    <div id="Barangay 845" class="tabcontent">
        <h3>Barangay 845</h3>
        <p>Address: Quirino Avenue, Barangay 845, Zone 92, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8559 0266</p>
        <p>Number of Total Reported Incidents: <?php echo $data03['total03'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.5943279980388!2d121.00006515809177!3d14.58832339745255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ed1b15c9b9%3A0x6ea70c337e0f1687!2sBrgy.%20845%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706903808!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result04=mysqli_query($con,"SELECT count(*) as total04 from reports WHERE barangay='846'");
    $data04=mysqli_fetch_assoc($result04);
    ?>
    <div id="Barangay 846" class="tabcontent">
        <h3>Barangay 846</h3>
        <p>Address: 2137 Zamora Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8588 2530</p>
        <p>Number of Total Reported Incidents: <?php echo $data04['total04'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.587476555364!2d121.00138480805968!3d14.58910464745244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ecf97c460b%3A0xf033e7dc01e921c5!2sBrgy.%20846%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706913195!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
    </div>

    <?php
    require 'connection.php';  
    $result05=mysqli_query($con,"SELECT count(*) as total05 from reports WHERE barangay='847'");
    $data05=mysqli_fetch_assoc($result05);
    ?>
    <div id="Barangay 847" class="tabcontent">
        <h3>Barangay 847</h3>
        <p>Address: 1263 Industria Sreet, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8563 3322</p>
        <p>Number of Total Reported Incidents: <?php echo $data05['total05'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.587476555364!2d121.00138480805968!3d14.58910464745244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ec41b6eec1%3A0xa7f4412874088bd9!2sBrgy.%20847%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706926669!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result06=mysqli_query($con,"SELECT count(*) as total06 from reports WHERE barangay='848'");
    $data06=mysqli_fetch_assoc($result06);
    ?>
    <div id="Barangay 848" class="tabcontent">
        <h3>Barangay 848</h3>
        <p>Address: 1198 Rosario Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data06['total06'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.566097747232!2d121.00319545809171!3d14.591542147452065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ec0307b2db%3A0x2fc947d208eddd0c!2sBrgy.%20848%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706973010!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result07=mysqli_query($con,"SELECT count(*) as total07 from reports WHERE barangay='849'");
    $data07=mysqli_fetch_assoc($result07);
    ?>
    <div id="Barangay 849" class="tabcontent">
        <h3>Barangay 849</h3>
        <p>Address: 1423 Ilang-Ilang Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8563 3558</p>
        <p>Number of Total Reported Incidents: <?php echo $data07['total07'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.566097747232!2d121.00319545809171!3d14.591542147452065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9925fe7bbff%3A0x6aa83bdb0ac73fab!2sBrgy.%20849%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706984738!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result08=mysqli_query($con,"SELECT count(*) as total08 from reports WHERE barangay='850'");
    $data08=mysqli_fetch_assoc($result08);
    ?>
    <div id="Barangay 850" class="tabcontent">
        <h3>Barangay 850</h3>
        <p>Address:	1864 West Zamora Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8562 9637</p>
        <p>Number of Total Reported Incidents: <?php echo $data08['total08'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.256666187887!2d120.99838606492314!3d14.584445289812729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c992e3ff24b7%3A0x91c9f808896a8036!2sBrgy.%20850%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620706996555!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result09=mysqli_query($con,"SELECT count(*) as total09 from reports WHERE barangay='851'");
    $data09=mysqli_fetch_assoc($result09);
    ?>
    <div id="Barangay 851" class="tabcontent">
        <h3>Barangay 851</h3>
        <p>Address: 1985 Carlos Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8563 0039</p>
        <p>Number of Total Reported Incidents: <?php echo $data09['total09'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.262765552512!2d121.00012421492325!3d14.584097439813043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c993abd4eb67%3A0xc54308e817f5fca4!2sBrgy.%20851%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707017594!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result010=mysqli_query($con,"SELECT count(*) as total010 from reports WHERE barangay='852'");
    $data010=mysqli_fetch_assoc($result010);
    ?>
    <div id="Barangay 852" class="tabcontent">
        <h3>Barangay 852</h3>
        <p>Address: Lot 3 Block 2 Kahilom 3, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data010['total010'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.271959481746!2d120.99942411492312!3d14.583573089813294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9924dd5898f%3A0xc28eedaf7f4ce18f!2sBrgy.%20852%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707029430!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result001=mysqli_query($con,"SELECT count(*) as total001 from reports WHERE barangay='853'");
    $data001=mysqli_fetch_assoc($result001);
    ?>
    <div id="Barangay 853" class="tabcontent">
        <h3>Barangay 853</h3>
        <p>Address:  Kahilum, 869 Zone 95 District 6, Manila, 1009 Metro Manila</p>
        <p>Contact Number: (02) 8588 2530</p>
        <p>Number of Total Reported Incidents: <?php echo $data001['total001'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.278605525949!2d120.99888766492312!3d14.583194039813566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c992479d5395%3A0x5e699df3d89b031b!2sBrgy.%20853%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707041922!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result002=mysqli_query($con,"SELECT count(*) as total002 from reports WHERE barangay='855'");
    $data002=mysqli_fetch_assoc($result002);
    ?>
    <div id="Barangay 855" class="tabcontent">
        <h3>Barangay 855</h3>
        <p>Address: Candida Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data002['total002'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6194347545706!2d121.00188910809185!3d14.585460197453015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c993161df5c1%3A0xfb728474f8fac92a!2sBrgy.%20855%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707106131!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result003=mysqli_query($con,"SELECT count(*) as total003 from reports WHERE barangay='856'");
    $data003=mysqli_fetch_assoc($result003);
    ?>
    <div id="Barangay 856" class="tabcontent">
        <h3>Barangay 856</h3>
        <p>Address:1476 Eusebio Street, Zone 93, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8561 0915</p>
        <p>Number of Total Reported Incidents: <?php echo $data003['total003'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.2040621393076!2d121.00049361492304!3d14.587444989810846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ece873a7a7%3A0xb52160f5a23cfb53!2sBrgy.%20856%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707180130!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result004=mysqli_query($con,"SELECT count(*) as total004 from reports WHERE barangay='857'");
    $data004=mysqli_fetch_assoc($result004);
    ?>
    <div id="Barangay 857" class="tabcontent">
        <h3>Barangay 857</h3>
        <p>Address: 1445 Labores Extension, Barangay 857, Pandacan, Manila, 1000, Metro Manila</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data004['total004'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.2040621393076!2d121.00049361492304!3d14.587444989810846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9934917b677%3A0x3323b5862ad9ddb3!2sBrgy.%20857%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707191458!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>

    <?php
    //LAST
    require 'connection.php';  
    $result005=mysqli_query($con,"SELECT count(*) as total005 from reports WHERE barangay='858'");
    $data005=mysqli_fetch_assoc($result005);
    ?>
    <div id="Barangay 858" class="tabcontent">
        <h3>Barangay 858</h3>
        <p>Address: 1324 Librada Avelino Street, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data005['total005'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.612788930778!2d121.00257305809176!3d14.586218147452897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ec8ce2987d%3A0x16d9a556251d3c23!2sBrgy.%20858%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707205181!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>

    <?php
    require 'connection.php';  
    $result006=mysqli_query($con,"SELECT count(*) as total006 from reports WHERE barangay='859'");
    $data006=mysqli_fetch_assoc($result006);
    ?>
    <div id="Barangay 859" class="tabcontent">
        <h3>Barangay 859</h3>
        <p>Address: Baeta Street, Barangay 859, Zone 93, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8564 8063</p>
        <p>Number of Total Reported Incidents: <?php echo $data006['total006'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6098751660286!2d121.00317130809178!3d14.586550447452854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c99352d23685%3A0x8a81b1eea724818b!2sBrgy.%20859%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707230635!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result007=mysqli_query($con,"SELECT count(*) as total007 from reports WHERE barangay='860'");
    $data007=mysqli_fetch_assoc($result007);
    ?>
    <div id="Barangay 860" class="tabcontent">
        <h3>Barangay 860</h3>
        <p>Address: Gen. Osmalik St, Barangay 860, Manila, 1011, Philippines</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data007['total007'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6098751660286!2d121.00317130809178!3d14.586550447452854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ebaa1de7e7%3A0x4528322861c60ad2!2sBrgy.%20860%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707244456!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result008=mysqli_query($con,"SELECT count(*) as total008 from reports WHERE barangay='861'");
    $data008=mysqli_fetch_assoc($result008);
    ?>
    <div id="Barangay 861" class="tabcontent">
        <h3>Barangay 861</h3>
        <p>Address:Barangay 861, Zone 93, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data008['total008'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.575593000584!2d121.00602510809182!3d14.590459597452227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ebcf1096b1%3A0x9d2bd7d6fbe1551f!2sBrgy.%20861%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707259399!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>

    <?php
    require 'connection.php';  
    $result009=mysqli_query($con,"SELECT count(*) as total009 from reports WHERE barangay='862'");
    $data009=mysqli_fetch_assoc($result009);
    ?>
    <div id="Barangay 862" class="tabcontent">
        <h3>Barangay 862</h3>
        <p>Address:  Zone 93, Adolfo, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8589 0876</p>
        <p>Number of Total Reported Incidents: <?php echo $data009['total009'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.596012630594!2d121.00446395809183!3d14.588131297452597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9eb6f7ded95%3A0xbccc7b97ff517606!2sBrgy.%20862%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707332769!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0010=mysqli_query($con,"SELECT count(*) as total0010 from reports WHERE barangay='863'");
    $data0010=mysqli_fetch_assoc($result0010);
    ?>
    <div id="Barangay 863" class="tabcontent">
        <h3>Barangay 863</h3>
        <p>Address: Zone 93 Cisne, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8564 8355</p>
        <p>Number of Total Reported Incidents: <?php echo $data0010['total0010'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.596012630594!2d121.00446395809183!3d14.588131297452597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9eb87352995%3A0x86c54dc8aa750597!2sBrgy.%20863%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707343386!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0001=mysqli_query($con,"SELECT count(*) as total0001 from reports WHERE barangay='864'");
    $data0001=mysqli_fetch_assoc($result0001);
    ?>
    <div id="Barangay 864" class="tabcontent">
        <h3>Barangay 864</h3>
        <p>Address: Zone 93, 1000 Francisco Balagtas, Pandacan, Manila, 1011 Metro Manilaa</p>
        <p>Contact Number: (02) 8562 3290</p>
        <p>Number of Total Reported Incidents: <?php echo $data0001['total0001'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.170127027249!2d121.00275006492319!3d14.589379789809646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9eca8fe3c75%3A0x690d1fa055718ee3!2sBrgy.%20864%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707354858!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0002=mysqli_query($con,"SELECT count(*) as total0002 from reports WHERE barangay='865'");
    $data0002=mysqli_fetch_assoc($result0002);
    ?>
    <div id="Barangay 865" class="tabcontent">
        <h3>Barangay 865</h3>
        <p>Address:Barangay 865, Zone 93, Pandacan, Manila, Metro Manila</p>
        <p>Contact Number: 0920 483 6149</p>
        <p>Number of Total Reported Incidents: <?php echo $data0002['total0002'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.211876167848!2d121.00245506492332!3d14.586999439811134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9ea66ca3c4f%3A0xe8832f07404929a2!2sBrgy.%20865%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707368424!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0003=mysqli_query($con,"SELECT count(*) as total0003 from reports WHERE barangay='866'");
    $data0003=mysqli_fetch_assoc($result3);
    ?>
    <div id="Barangay 866" class="tabcontent">
        <h3>Barangay 866</h3>
        <p>Address:2099-C Felix Street, Pandacan, Manila, Metro Manila</p>
        <p>Contact Number: 523-7005</p>
        <p>Number of Total Reported Incidents: <?php echo $data0003['total0003'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.2760561861414!2d121.00485571484009!3d14.583339439813471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c99457685507%3A0x52a255337c44e24d!2sBrgy.%20866%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620712543396!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <?php
    require 'connection.php';  
    $result0004=mysqli_query($con,"SELECT count(*) as total0004 from reports WHERE barangay='867'");
    $data0004=mysqli_fetch_assoc($result0004);
    ?>
    <div id="Barangay 867" class="tabcontent">
        <h3>Barangay 867</h3>
        <p>Address: 1011 Rosal, Pandacan, Manila, 1011 Metro Manila</p>
        <p>Contact Number: (02) 8589 2794</p>
        <p>Number of Total Reported Incidents: <?php echo $data0004['total0004'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6320652286881!2d121.00415015809176!3d14.584019597453265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c99486da1b31%3A0xd5fd36bac4b1659e!2sBrgy.%20867%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707475220!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    <?php
    require 'connection.php';  
    $result0005=mysqli_query($con,"SELECT count(*) as total0005 from reports WHERE barangay='868'");
    $data0005=mysqli_fetch_assoc($result0005);
    ?>
    <div id="Barangay 868" class="tabcontent">
        <h3>Barangay 868</h3>
        <p>Address: Tent Along Railway Kahilom 2, Barangay 868, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: No Data Available</p>
        <p>Number of Total Reported Incidents: <?php echo $data0005['total0005'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6300172213894!2d121.0025167080597!3d14.584253197453243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9937453ebd5%3A0x28ae3affc424178!2sBrgy.%20868%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707501148!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0006=mysqli_query($con,"SELECT count(*) as total0006 from reports WHERE barangay='869'");
    $data0006=mysqli_fetch_assoc($result0006);
    ?>
    <div id="Barangay 869" class="tabcontent">
        <h3>Barangay 869</h3>
        <p>Address: 1845 Int. 12 Bo. Kapampangan, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8588 2530</p>
        <p>Number of Total Reported Incidents: <?php echo $data0006['total0006'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6300172213894!2d121.0025167080597!3d14.584253197453243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c996ac293a67%3A0xea7354ff70b97ddc!2sBrgy.%20869%2C%20Pandacan%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707513866!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0007=mysqli_query($con,"SELECT count(*) as total0007 from reports WHERE barangay='870'");
    $data0007=mysqli_fetch_assoc($result0007);
    ?>
    <div id="Barangay 870" class="tabcontent">
        <h3>Barangay 870</h3>
        <p>Address: Kahilum II Street, Barangay 870, Zone 95, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: (02) 8589 9972</p>
        <p>Number of Total Reported Incidents:  <?php echo $data0007['total0007'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.660282116265!2d121.00408310809182!3d14.580800747453763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c99380804949%3A0x16bcfdd13f5d6c6f!2sBrgy.%20870%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707580083!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0008=mysqli_query($con,"SELECT count(*) as total0008 from reports WHERE barangay='871'");
    $data0008=mysqli_fetch_assoc($result0008);
    ?>
    <div id="Barangay 871" class="tabcontent">
        <h3>Barangay 871</h3>
        <p>Address: 1803 Acacia Street Kahilom I, Barangay 871, Pandacan, Manila, 1004 Metro Manila</p>
        <p>Contact Number: 09753009033</p>
        <p>Number of Total Reported Incidents:  <?php echo $data0008['total0008'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6346374663615!2d121.00373720809178!3d14.583726197453295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c99392b316c1%3A0xa5592ef179768a21!2sBrgy.%20871%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707589789!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php
    require 'connection.php';  
    $result0009=mysqli_query($con,"SELECT count(*) as total0009 from reports WHERE barangay='872'");
    $data0009=mysqli_fetch_assoc($result0009);
    ?>
    <div id="Barangay 872" class="tabcontent">
        <h3>Barangay 872</h3>
        <p>Address:1731 Macopa Street Kahilom I, Pandacan, Manila, 1000 Metro Manila</p>
        <p>Contact Number: 226-8613</p>
        <p>Number of Total Reported Incidents: <?php echo $data0009['total0009'] ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.6410998367096!2d121.00144385805964!3d14.582989047453426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c993b7ce58bf%3A0x32d5ccfe4b774f6d!2sBrgy.%20872%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1620707601849!5m2!1sen!2sph" width="400" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
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