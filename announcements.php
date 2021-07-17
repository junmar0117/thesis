<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Incident Reporting</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body style="background-color: #f1f1f1;">

    <nav>
        <?php
            include_once('header.html');
        ?>
    </nav>
    <br>
    <br>
    <hr>
    <div class="indexContent3">
        <div class="indexPBB">
            <div class="hpSecHeader3">Featured <a id="reportsColor">Reports</a></div>
            <br>
            <br>

<div class="rowCard">
  <div class="columnCard">
    <div class="card">
    <img src="./assets/pnpfinallogo.jpg" width="100%" height="300px" >
      <h3 class="ipbbthead">I</h3>
      <p class="ipbbthead2">i</p>
      <p class="ipbbthead3"> i </p>
      <a class="PBBvstbtn2">MORE <i class="far fa-arrow-alt-circle-right"></i></a>
      <br>
      <br>
    </div>
  </div>

  <div class="columnCard">
    <div class="card">
    <img src="./assets/bfpfinallogo.jpg"  width="100%" height="300px" >
      <h3 class="ipbbthead">I</h3>
      <p class="ipbbthead2">i</p>
      <p class="ipbbthead3"> i </p>
      <a class="PBBvstbtn2">MORE <i class="far fa-arrow-alt-circle-right"></i></a>
      <br>
      <br>
    </div>
  </div>
  
  <div class="columnCard">
    <div class="card">
    <img src="./assets/barangay2.jpg" width="100%" height="300px" >
      <h3 class="ipbbthead">I</h3>
      <p class="ipbbthead2">i</p>
      <p class="ipbbthead3"> i </p>
      <a class="PBBvstbtn2">MORE <i class="far fa-arrow-alt-circle-right"></i></a>
      <br>
      <br>
    </div>
  </div>
</div>

        </div>
    </div>

    <div class="indexContent4">
        <div class="indexPBB2">
            <div class="hpSecHeader3">Featured <a id="reportsColor">Reports</a></div>
            <br>
            <br>

            <div class="rowCard">
  <div class="columnCard">
  <img src="./assets/pnpfinallogo.jpg" width="100%" height="300px" >
    <div class="card">
      <h3 class="ipbbthead">I</h3>
      <p class="ipbbthead2">i</p>
      <p class="ipbbthead3"> i </p>
      <button class="PBBvstbtn" style="vertical-align:middle"><span>View More</span></button>
    </div>
  </div>

  <div class="columnCard">
  <img src="./assets/bfpfinallogo.jpg"  width="100%" height="300px" >
    <div class="card">
      <h3 class="ipbbthead">I</h3>
      <p class="ipbbthead2">i</p>
      <p class="ipbbthead3"> i </p>
      <button class="PBBvstbtn" style="vertical-align:middle"><span>View More</span></button>
    </div>
  </div>
  
  <div class="columnCard">
  <img src="./assets/barangay2.jpg" width="100%" height="300px" >
  <div class="card">
      <h3 class="ipbbthead">I</h3>
      <p class="ipbbthead2">i</p>
      <p class="ipbbthead3"> i </p>
      <button class="PBBvstbtn" style="vertical-align:middle"><span>View More</span></button>
    </div>
  </div>

</div>
        </div>
    </div>
    

</body>
<footer>
        <?php
            include_once('footer.html');
        ?>
</footer>
</html>



