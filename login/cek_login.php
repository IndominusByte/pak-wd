<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/koneksi.php';

// menangkap data yang dikirim dari form
$nim = mysqli_real_escape_string(conn(),$_POST['nim']);
$password = mysqli_real_escape_string(conn(),$_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query(conn(),"select * from users where nim='$nim' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $nim;
	$_SESSION['status'] = "login";
	header("location:../index.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>
