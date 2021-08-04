<?php
  session_start();
  if (!isset($_SESSION['id'])) {
      header("Location:index.php");
  }
  require 'config.php';
?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Profile Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#">
        <img src="<?= $WEB_CONFIG['base_url'] ?>assets/img/icon.png" width="30" height="30" alt="">
        <?= $WEB_CONFIG['app_name'] ?>
      </a>
       <a href="logout.php" class="navbar-brand pull-right">Logout</a>
    </nav>
  <div class="container" style="margin-top:50px">
    <h1 style="text-align:center;">User Profile Page</h1><br>
    <div class="row">
       <h5>Hello, <?php echo ucwords($_SESSION['fullname']); ?> <small><a href="logout.php">Logout</a></small></h5>   
    </div>
  </div>
</body>
</html>
