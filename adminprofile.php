<?php
  session_start();
  if (!isset($_SESSION['id'])) {
      header("Location:index.php");
  }
require 'config.php';
?>
<!Doctype html>
<!-- <html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Profile Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container" style="margin-top:50px">
    <h1 style="text-align:center;">User Profile Page</h1><br>
    <div class="row">
       <h5>Hello, <?php echo ucwords($_SESSION['fullname']); ?> <small><a href="logout.php">Logout</a></small></h5>   
    </div>
  </div>
</body>
</html>
 -->
<html>
 <head>
    <title><?= $WEB_CONFIG['app_name'] ?></title>
    <link rel="stylesheet" href="assets/style.css">
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#">
        <img src="<?= $WEB_CONFIG['base_url'] ?>assets/img/icon.png" width="30" height="30" alt="">
        <?= $WEB_CONFIG['app_name'] ?>
      </a>
       <a href="logout.php" class="navbar-brand pull-right">Logout</a>
    </nav>

    <?php session_start();
    //MENGAMBIL VALUE PAGE YANG TERDAPAT PADA URL
    $content = (isset($_GET["page"])) ? $_GET["page"] : ""; ?> 
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h2 class='text-uppercase'><?= $content ?> Data</h2>
            </div>
            <div class="col-md-10">
            <?php
            //UNTUK PEMBERITAHUAN SUCCES DATA SUDAH DIOLAH 
            if(isset($_SESSION['flash'])){
                echo $_SESSION['flash'];
                unset($_SESSION['flash']);
            }

            //PERPINDAHAAN PAGES WEBSITE
            switch ($content) {
                case 'add':
                    require 'create.php';
                    break;
                case 'delete':
                    require 'delete.php';
                    break;
                case 'update':
                    require 'update.php';
                    break;
                //YANG PERTAMA KALI DI JALANKAN SELAIN DARI CASE DIATAS
                default: 
                    require 'readdata.php';
                    break;
            } ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/script.js"></script>
    <script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
</body>
</html>
<?php require 'config.php'; ?>
