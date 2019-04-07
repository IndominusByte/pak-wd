<?php
include '../config/koneksi.php';
include 'image.php';

session_start();

$nama_kelas = $_POST['name'];
$video = $_POST['video'];
$lantai = $_POST['lantai'];
$fasilitas = $_POST['fasilitas'];

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
      $_SESSION['add'] = 'success';
    }else
      $_SESSION['add'] = 'ukuran';
  }else
    $_SESSION['add'] = 'extension';  

  $image[$i] = $nama_file.$ext;
  $i++;
}
mysqli_query(conn(),"INSERT INTO `kelas` (`id`, `name`, `image`, `image2`, `video`, `date`, `time`, `fasilitas`, `lantai`, `duration`, `status`, `user_id`) VALUES (NULL, '$nama_kelas', '$image[0]', '$image[1]', '$video', NULL, NULL, '$fasilitas', '$lantai', NULL, 'kosong', NULL)"); 
header("Location: add.php");
