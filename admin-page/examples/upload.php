<?php
    include("../../php/koneksi.php");
    session_start();

    $target_dir = "../assets/img/faces/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if ($_SESSION['nama'] == "admin") {
        $target_file2 = $target_dir . basename("foto.jpg");
    }
    elseif ($_SESSION['nama'] == "rpl") {
        $target_file2 = $target_dir . basename("foto2.jpg");
    }

    
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $_SESSION['pesan1'] = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $_SESSION['pesan1'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $_SESSION['pesan1'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['pesan1'] = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {
             $_SESSION['pesan1'] = "The file" . basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $input = $koneksi->query("UPDATE user SET Foto='".$target_file2."' WHERE Nama='".$_SESSION['nama']."'");
            header("location:user.php");
        } else {
            $_SESSION['pesan1'] = "Sorry, there was an error uploading your file.";
            header("location:user.php");
        }
    }
?>