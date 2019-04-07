<?include_once("../layouts/header2.php");?>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/admin.css">
<?php
if(!isset($_GET['id']) || $_GET['id'] == null)
  header("Location: manage.php");

$id = $_GET['id'];
$result = mysqli_query(conn(),"select * from kelas where id='$id' limit 1");
$row = mysqli_fetch_object($result);
?>

<div class="wrapper">
  <div class="columns">

    <aside id="mySidenav" class="column is-2 aside is-hidden-touch" style="overflow: hidden; transition: 5s;">
      <nav class="menu">
        <p class="menu-label">
          General
          <a href="javascript:void(0)" class="closebtn is-pulled-right" onclick="closeNav()">&times;</a>
        </p>
        <ul class="menu-list">
          <li><a href="/pak-wd/admin/"><span class="icon margin-icon"><i class="fas fa-house-damage"></i></span>
 Dashboard</a></li>
          <li><a href="/pak-wd/"><span class="icon margin-icon"><i class="fas fa-arrow-circle-left"></i></span> Home</a></li>
        </ul>
        <p class="menu-label">
          Administration
        </p>
        <ul class="menu-list">
          <li><a href="add.php"><span class="icon margin-icon"><i class="fa
s fa-edit"></i></span> Add Item</a></li>
          <li><a class="is-active" href="manage.php"><span class="icon margin-icon"><i class="fa
s fa-desktop"></i></span> Manage Item</a></li>
        </ul>
      </nav>
    </aside>
     <main class="column main">
       <div class="nav-item is-hidden-touch">
         <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
       </div><br>

       <div class="dash">
        <div class="box">
          <form action="update-kelas.php?id=<?=$row->id?>" method="POST" enctype="multipart/form-data">
          <label class="label">Information Product</label>
          <hr>
          <!-- file upload -->
          <p>Images</p>
          <div class="upload-wrap">
          <div class="uploadpreview 01" style="background-image:url('../image/kelas/<?=$row->image?>')"></div>
            <div class="file is-small is-centered">
            <label class="file-label">
              <input class="file-input" id="01" type="file" accept="image/*" name="files[]">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
            </label>
          </div>
          </div>


          <div class="upload-wrap">
          <div class="uploadpreview 02" style="background-image:url('../image/kelas/<?=$row->image2?>')"></div>
            <div class="file is-small is-centered">
            <label class="file-label">
              <input class="file-input" id="02" type="file" accept="image/*" name="files[]">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
            </label>
          </div>
          </div>
        <div class="field">
        <p style="clear:both;">Nama Kelas</p>                                                                                                            
          <div class="control">                                                                                                         
          <input name="name" class="input" type="text" value="<?=$row->name?>" required>   
          </div>                                                                                                                        
        </div>             
        <div class="field">
        <p>Video Youtube</p>                                                                                                            
          <div class="control">                                                                                                         
          <input name="video" class="input" type="text" value="<?=$row->video?>" required>   
          </div>                                                                                                                        
        </div>  
        <div class="field">
        <p>Lantai</p>                                                                                                            
          <div class="control">
            <div class="select is-primary">
              <select name="lantai" required>
                <option value="1" <?=$row->lantai == '1' ? 'selected' : ' '?>>1</option>
                <option value="2" <?=$row->lantai == '2' ? 'selected' : ' '?>>2</option>
                <option value="3" <?=$row->lantai == '3' ? 'selected' : ' '?>>3</option>
                <option value="4" <?=$row->lantai == '4' ? 'selected' : ' '?>>4</option>
              </select>
            </div>
          </div>
        </div>
        <div class="field">                                                                                                                                        
          <p>Fasilitas</p>                                                                                                                            
          <div class="control">                                                                                                                                    
          <textarea name="fasilitas" class="textarea" required><?=$row->fasilitas?></textarea>  
          </div>                                                                                                                                                   
        </div>                                                                                                                                                     
        <button type="submit" class="button is-primary">Update Kelas</button>
        </form>
        </div>
       </div><!-- DASH -->
     </main>
                                                                                        
   </div><!--/columns-->                                                                
 </div><!--wrapper-->                                                                   

<?
if(isset($_SESSION['update'])){
  if($_SESSION['update'] === 'success')
    echo "<script>swal('Nice!', 'data berhasil di edit', 'success')</script>";
  if($_SESSION['update'] === 'ukuran')
    echo "<script>swal('Upps!', 'ukuran tidak boleh lebih dari 1 mb', 'error')</script>";
  if($_SESSION['update'] === 'extension')
    echo "<script>swal('Upps!', 'extension hanya boleh png dan jpg', 'info')</script>";

  unset($_SESSION['update']);
}
?>
<script src="../js/admin.js"></script>
