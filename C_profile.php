<?php
//$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> Home Page </title>
    <meta name ="viewport" content="width=devoce-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
<?php
include_once('header.html');
?>
</nav>
    <section>
    <div class="login-page">
    <div class="box">
      <div class="form">
        <!-- Login form Start -->
        <form class="login-form">
          <h3>Profile</h3>
          <div class="pic">
            <img src="assets/admin.png" alt="">
          </div>
          <p>Hello, <?php print "$user" ?>!</p>
          <button class="submit-btn"><a href="register.php"> Add New Admin<a/></button>
        </form>
        <!-- Login form End -->
      </div>
    </div>
  </div>
    </section>
</body>
<footer>
<?php
include_once('footer.html');
?>
</footer>
</html>



