<?php
	error_reporting(E_ALL ^ (E_NOTICE));
	//melakukan koneksi ke database dengan MySQL
	$koneksi = new mysqli("localhost", "root", "", "martabak_joeragan");
	if($koneksi->connect_error) {
		echo "Gagal melakukan koneksi ke MySQL: " . $koneksi->connect_error;
	}
?>