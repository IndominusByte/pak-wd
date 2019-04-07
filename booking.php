<?php
include 'config/koneksi.php';
header('Content-type: application/json');
session_start();

$nim = $_SESSION['username'];
$id = $_POST['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$duration = $_POST['duration'];
if($duration == null){
  echo json_encode(['success' => false]);
  die();
}

$row = mysqli_query(conn(),"SELECT * from users where nim='$nim' limit 1");
$user = mysqli_fetch_object($row);
mysqli_query(conn(),"UPDATE kelas SET date='$date',time='$time',duration='$duration',status='booked',user_id='$user->id' WHERE id = $id");
echo json_encode(['success' => true]);
