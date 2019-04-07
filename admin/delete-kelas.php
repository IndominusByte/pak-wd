<?php
include '../config/koneksi.php';
header('Content-type: application/json');

$id = $_GET['id'];
mysqli_query(conn(),"DELETE FROM kelas WHERE id = '$id'");

echo json_encode(['success' => true]);
