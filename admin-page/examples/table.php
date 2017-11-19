<?php
	include("../../php/koneksi.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['login'] = "Anda Harus Login Dahulu";
        header("location:../index.php");
    }
	$saran = $koneksi->query("SELECT *FROM saran");
	$subscribed  = $koneksi->query("SELECT *FROM subscribed");
	$no = 1;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Saran dan Subcribe</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="../../index.php" class="simple-text">
                    Admin<br>
					Martabak Joeragan
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./user.php">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./table.php">
                            <i class="material-icons">content_paste</i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a href="./gallery.php">
                            <i class="material-icons">library_books</i>
                            <p>Gallery</p>
                        </a>
                    </li>
					<li>
                        <a href="./maps.php">
                            <i class="material-icons">location_on</i>
                            <p>Maps</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Saran dan Subcribe </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="dashboard.php">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li>
                                <a href="user.php">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Saran</h4>
                                    <p class="category">Saran dari pengunjung untuk Martabak Joeragan</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Saran</th>
                                        </thead>
                                        <tbody>
										<?php
											if($saran->num_rows > 0) {
												while($row=mysqli_fetch_array($saran,MYSQLI_ASSOC)) {
													echo '
														<tr>
															<td>'.$row["Nama"].'</td>
															<td>'.$row["Email"].'</td>
															<td class="text-primary">'.$row["Komentar"].'</td>
														</tr>
													
													';
												}
											}
											else {
												echo '
													<tr>
														<td colspan="3">Belum ada Saran !</td>
													</tr>
												';
											}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Subscribed</h4>
                                    <p class="category">Daftar Pengunjung yang telah Subscribed Martabak Joeragan</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>No</th>
                                            <th>E-Mail</th>
                                            <th>Tanggal Subscribed</th>
                                        </thead>
                                        <tbody>
                                            <?php
											if($subscribed->num_rows > 0) {
												while($row2 = mysqli_fetch_array($subscribed,MYSQLI_ASSOC)){
													echo '
														<tr>
															<td>'.$no.'</td>
															<td>'.$row2['Email'].'</td>
                                                            <td>'.$row2['Tanggal'].'</td>
														</tr>
													
													';
													$no++;
												}
											}
                                            else {
                                                echo '
                                                    <tr>
                                                        <td colspan="3">Belum ada Subscribed !</td>
                                                    </tr>
                                                ';
                                            }
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="../../index.php">Martabak Joeragan Coveration</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/chartist.min.js"></script>
<script src="../assets/js/arrive.min.js"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="../assets/js/demo.js"></script>

</html>