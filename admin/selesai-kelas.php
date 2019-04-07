<?php
include '../config/koneksi.php';
session_start();
$id = $_POST['id'];
mysqli_query(conn(),"UPDATE kelas SET date=NULL,time=NULL,duration=NULL,user_id =NULL,status='kosong' WHERE id = '$id'");
$_SESSION['kelas'] = true;
header("Location: /pak-wd/admin/");
