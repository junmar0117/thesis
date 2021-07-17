<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Incident Reporting</title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/viewCC.css">
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
    <div class="vccc">
    <br>
    <br>
    <br>
    <br>
    <h1 class="vccch">View</h1><br>
    <div class="rowCard">
  <div class="columnCard">
  <img src="./assets/pnpfinallogo.jpg" width="100%" height="350px" >
    <div class="card">
      <h3 class="ipbbthead">Card 1</h3>
      <p class="ipbbthead2">Some text</p>
      <p class="ipbbthead3">Some text</p>
    </div>
  </div>

  <div class="columnCard">
    <div class="card">
      <h3 class="ipbbthead">Card 2</h3>
      <p class="ipbbthead2">Some text</p>
      <p class="ipbbthead3">Some text</p>
      <h3 class="ipbbthead">Card 2</h3>
      <p class="ipbbthead2">Some text</p>
      <p class="ipbbthead3">Some text</p>
      <h3 class="ipbbthead">Card 2</h3>
      <p class="ipbbthead2">Some text</p>
      <p class="ipbbthead3">Some text</p>
      <h3 class="ipbbthead">Card 2</h3>
      <p class="ipbbthead2">Some text</p>
      <p class="ipbbthead3">Some text</p>
    </div>
  </div>
  
</div>
<br>
  <br>
</div>
</body>
</html>