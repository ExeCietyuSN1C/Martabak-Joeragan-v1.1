<?php
    include("../../php/koneksi.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['login'] = "Anda Harus Login Dahulu";
        header("location:../index.php");
    }

    $gallery = $koneksi->query("SELECT *FROM gallery");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Gallery</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
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
                    <li>
                        <a href="./table.php">
                            <i class="material-icons">content_paste</i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a class="navbar-brand" href="#"> Gallery </a>
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
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Gallery</h4>
                                    <p class="category">Gallery dari Website Martabak Joeragan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                if ($_SESSION['pesan-gallery'] != "") {
                                    echo '
                                        <div class="alert alert-info" role="alert" align="center">
                                          <strong>'.$_SESSION["pesan-gallery"].'</strong>
                                        </div>
                                    ';
                                    $_SESSION["pesan-gallery"] = "";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 1</h3><br>
                                <img src=
                                    <?php
                                        while ($row1 = $gallery->fetch_assoc()) {
                                            echo $row1['Foto'];
                                        }
                                    ?>
                                 class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#deskripsi-galerry"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary ganti" name="submit" value="1">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery1'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery1"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery1"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 2</h3><br>
                                <img src="../../images/Portfolio02.png" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="2">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery2'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery2"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery2"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 3</h3><br>
                                <img src="../../images/Portfolio12.png" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="3">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery3'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery3"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery3"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 4</h3><br>
                                <img src="../../images/pandan.jpg" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="4">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery4'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery4"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery4"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 5</h3><br>
                                <img src="../../images/Portfolio04.png" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="5">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery5'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery5"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery5"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 6</h3><br>
                                <img src="../../images/Portfolio15.png" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="6">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery6'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery6"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery6"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 7</h3><br>
                                <img src="../../images/redvelvet.jpg" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="7">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery7'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery7"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery7"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 8</h3><br>
                                <img src="../../images/Portfolio05.png" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="8">GANTI</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gallery">
                                <h3 class="title">Gallery 9</h3><br>
                                <img src="../../images/Portfolio16.png" class="img-responsive" alt="project 1"/><br><br>
                                <form action="upload-gallery.php" method="post" enctype="multipart/form-data">Select image to upload:
                                    <input type="file" id="fileToUpload" name="gallery1" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                    <input id="filename" disabled="">
                                    <div class="deskripsi">
                                        <a href="#gallery1"><i class="fa fa-plus-square" aria-hidden="true"></i> Deskripsi</a>
                                    </div>
                                    <input type="button" value="Pilih Gambar / File" onclick="document.getElementById('fileToUpload').click()" class="btn btn-primary">
                                    <button type="submit" class="btn btn-primary" name="submit" value="9">GANTI</button>
                                </form>
                                <?php
                                    if ($_SESSION['pesan-gallery9'] != "") {
                                        echo '
                                            <div class="alert alert-info" role="alert" align="center">
                                              <strong>'.$_SESSION["pesan-gallery9"].'</strong>
                                            </div>
                                        ';
                                        $_SESSION["pesan-gallery9"] = "";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain" id="deskripsi-galerry">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Deskripsi Gallery</h4>
                                    <p class="category">Deskripsi Gallery dari Website Martabak Joeragan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-deskripsi">
                                <div class="row">
                                    <form action="gallery-deskripsi.php" method="POST">
                                        <h4 class="title">Pilih Gallery</h4>
                                        <p class="category">Pilih Gallery Untuk Ditampilkan : </p>
                                        <div class="col-md-8">
                                            <select class="form-control" id="gallery-deskripsi" name="gallery">
                                                <option value="1">Gallery 1</option>
                                                <option value="2">Gallery 2</option>
                                                <option value="3">Gallery 3</option>
                                                <option value="4">Gallery 4</option>
                                                <option value="5">Gallery 5</option>
                                                <option value="6">Gallery 6</option>
                                                <option value="7">Gallery 7</option>
                                                <option value="8">Gallery 8</option>
                                                <option value="9">Gallery 9</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" align="center">
                                            <button type="submit" class="btn btn-primary" name="submit">Open</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Deskripsi Gallery 1</h4>
                                    <p class="category">Isi Data Deskripsi Gallery 1</p>
                                </div>
                                <div class="card-content">
                                    <form action="update_deskripsi.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Judul Deskripsi</label>
                                                    <input name="judul-deskripsi" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"> Deskripsi</label>
                                                    <input name="deskripsi" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Category</label>
                                                    <input name="category" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 1</label>
                                                    <input name="rasa1" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 2 (*Optional)</label>
                                                    <input name="alamat" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 3 (*Optional)</label>
                                                    <input name="rasa3" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 4 (*Optional)</label>
                                                    <input name="rasa4" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 5 (*Optional)</label>
                                                    <input name="rasa5" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 6 (*Optional)</label>
                                                    <input name="rasa6" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 7 (*Optional)</label>
                                                    <input name="rasa7" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 8 (*Optional)</label>
                                                    <input name="rasa8" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right" name="submit" value="1">Update Deskripsi</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" id="deskripsi-galerry">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Deskripsi Gallery 2</h4>
                                    <p class="category">Isi Data Deskripsi Gallery 2</p>
                                </div>
                                <div class="card-content">
                                    <form action="update_deskripsi.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Judul Deskripsi</label>
                                                    <input name="judul-deskripsi" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"> Deskripsi</label>
                                                    <input name="deskripsi" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Category</label>
                                                    <input name="category" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 1</label>
                                                    <input name="rasa1" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 2 (*Optional)</label>
                                                    <input name="alamat" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 3 (*Optional)</label>
                                                    <input name="rasa3" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 4 (*Optional)</label>
                                                    <input name="rasa4" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 5 (*Optional)</label>
                                                    <input name="rasa5" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 6 (*Optional)</label>
                                                    <input name="rasa6" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 7 (*Optional)</label>
                                                    <input name="rasa7" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rasa 8 (*Optional)</label>
                                                    <input name="rasa8" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right" name="submit" value="1">Update Deskripsi</button>
                                        <div class="clearfix"></div>
                                    </form>
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