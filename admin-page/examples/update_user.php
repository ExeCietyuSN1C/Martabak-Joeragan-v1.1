<?php
	include("../../php/koneksi.php");
	session_start();

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$deskripsi = $_POST['deskripsi'];

	$input = $koneksi->query("UPDATE user SET Nama='".$nama."', Email='".$email."', Alamat='".$alamat."', Deskripsi='".$deskripsi."' WHERE Nama='".$_SESSION['nama']."'");
	if ($input) {
		$_SESSION["nama"] = $nama;
		$_SESSION["pesan"] = "Data Profile Berhasil Diubah !";
		header("location:user.php");
	}
	else {
		$_SESSION["pesan"] = "Data Profile Gagal Diubah !";
		header("location:user.php");
	}
?>