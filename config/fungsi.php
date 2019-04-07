<?php
require_once('koneksi.php');

function cekAdmin(){
  $nim = $_SESSION['username'];
  $result = mysqli_query(conn(),"select * from users where nim='$nim'");
  $row = mysqli_fetch_object($result);
  return $row->role;
}
?>
