<?php
    include("../../php/koneksi.php");
    session_start();

    $gallery = $_POST['submit'];
    $target_dir = "../../images/upload-gallery/";
    $target_file = $target_dir . basename($_FILES["gallery1"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if ($_POST['submit'] == "1") {
        $target_file2 = $target_dir . basename("gallery1.jpg");
    }
    elseif ($_POST['submit'] == "2") {
        $target_file2 = $target_dir . basename("gallery2.jpg");
    }
    elseif ($_POST['submit'] == "3") {
        $target_file2 = $target_dir . basename("gallery3.jpg");
    }
    elseif ($_POST['submit'] == "4") {
        $target_file2 = $target_dir . basename("gallery4.jpg");
    }
    elseif ($_POST['submit'] == "5") {
        $target_file2 = $target_dir . basename("gallery5.jpg");
    }
    elseif ($_POST['submit'] == "6") {
        $target_file2 = $target_dir . basename("gallery6.jpg");
    }
    elseif ($_POST['submit'] == "7") {
        $target_file2 = $target_dir . basename("gallery7.jpg");
    }
    elseif ($_POST['submit'] == "8") {
        $target_file2 = $target_dir . basename("gallery8.jpg");
    }
    elseif ($_POST['submit'] == "9") {
        $target_file2 = $target_dir . basename("gallery9.jpg");
    }
    
    $_SESSION['pesan-gallery'] = "Image " . basename( $_FILES["gallery1"]["name"]). " Berhasil Di Uploaded.";
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gallery1"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $_SESSION['pesan-gallery'] = "File Tidak Boleh Kosong !";
            header("location:gallery.php");
        }
    }
    // Check file size
    if ($_FILES["gallery1"]["size"] > 5000000) {
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $_SESSION['pesan-gallery'] = "Maap, Image Hanya Boleh JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['pesan-gallery'] = "Maap, Image Tidak Berhasil Di Uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gallery1"]["tmp_name"], $target_file2)) {
            $input = $koneksi->query("UPDATE gallery SET Foto='".$target_file2."' WHERE Id_Gallery='".$gallery."'");
            header("location:gallery.php");
        } else {

            header("location:gallery.php");
        }
    }
?>