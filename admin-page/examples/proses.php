<?php
	include("../../php/koneksi.php");
	session_start();

	$nama = $_POST['nama'];
	$password = md5($_POST['password']);
  	$user = $koneksi->query("SELECT *FROM user where Nama='".$nama."' AND Password='".$password."'");

  	if ($user->num_rows > 0) {
  		$_SESSION['nama'] = $nama;
  		$_SESSION['status'] = "login";
  		header("location:dashboard.php");
  	}
  	else {
  		header("location:../index.php");
  		$_SESSION['status'] = "gagal login";
  	}
?>