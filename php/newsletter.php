<?php
	include("koneksi.php");
	
if($_POST){

    $fileName = 'newsletter.txt'; //set 777 permision for this file. 
    $error = false;
    $no = $_POST['no'];
    $email = $_POST['email'];
    $date = date('Y-m-d');
	$cek = $koneksi->query("SELECT *FROM subscribe where email='$email'");
	
    if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
		$error = true;
	}
	
	if ($cek->num_rows > 0) {
		$error = true;
	}
    
    //If all ok, save emali adress in file
    if($error == false){
        $file = fopen($fileName, a);
        fwrite($file, "$email,");
        fclose($file);
        echo 'OK';
		$input=$koneksi->query("INSERT INTO subscribed(Id_Subscribed, Email, Tanggal) VALUES('$no', '$email', '$date')") or die($koneksi->error);
    }
}