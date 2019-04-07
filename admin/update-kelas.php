<?php
include '../config/koneksi.php';
include 'image.php';
session_start();

$id = $_GET['id'];
$nama_kelas = $_POST['name'];
$video = $_POST['video'];
$lantai = $_POST['lantai'];
$fasilitas = $_POST['fasilitas'];

if(file_exists($_FILES['files']['tmp_name'][0])){
  $files = reArrayFiles($_FILES['files']);
  $image = array();
  $i = 0;
  foreach($files as $file){
    $boleh = array('png','jpg');
    $nama = $file['name'];
    $x = explode('.',$nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $file['size'];
    $file_tmp = $file['tmp_name'];
    $ext = strrchr($nama, ".");

    if(in_array($ekstensi,$boleh) === true){
      if($ukuran < 1048576){
        $nama_file = uniqid();
        move_uploaded_file($file_tmp,'../image/kelas/'.$nama_file.$ext);
        if($ekstensi == 'png'){
          $png = resize_imagepng('../image/kelas/'.$nama_file.$ext, 700, 700);
          imagepng($png,'../image/kelas/'.$nama_file.$ext);
        }else{
          $img = resize_imagejpg('../image/kelas/'.$nama_file.$ext, 700, 700);
          imagejpeg($img, '../image/kelas/'.$nama_file.$ext);
        }
        $_SESSION['update'] = 'success';
      }else
        $_SESSION['update'] = 'ukuran';
    }else
      $_SESSION['update'] = 'extension';  

    $image[$i] = $nama_file.$ext;
    $i++;
  }
}
if(!isset($_SESSION['update']))
  $_SESSION['update'] = 'success';

mysqli_query(conn(),"UPDATE kelas SET name='$nama_kelas',image='$image[0]',image2='$image[1]',video='$video',fasilitas='$fasilitas',lantai='$lantai' WHERE id = $id");
header("Location: edit-kelas.php?id=$id");
