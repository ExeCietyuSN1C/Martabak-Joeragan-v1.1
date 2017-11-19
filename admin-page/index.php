<?php
  error_reporting(0);
  session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Halaman Login admin page Martabak Joeragan Baros</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="form">
      <div align="center">
        <ul class="tab-group">
          <li class="tab active"><a href="#login">Login</a></li>
        </ul>
      </div>
        <div id="login">   
          <h1>Selamat Datang !</h1>
          
          <form action="examples/proses.php" method="post">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input name="nama" type="text"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="password" type="password"required autocomplete="off"/>
          </div>
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
  </div>
  <?php
    if ($_SESSION['status'] == "gagal login") {
      echo '
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-5">
            <div class="alert alert-danger pesan" role="alert" align="center">
              <strong>Username atau Password Salah !</strong> Mohon untuk coba lagi nanti...
            </div>
          </div>
        </div>
      ';
    }
  ?>
  
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script  src="assets/js/index.js"></script>
</body>
</html>
