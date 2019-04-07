<?include_once("../layouts/header2.php");?>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/admin.css">

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
          <li><a class="is-active" href="add.php"><span class="icon margin-icon"><i class="fa
s fa-edit"></i></span> Add Item</a></li>
          <li><a href="manage.php"><span class="icon margin-icon"><i class="fa
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
          <form action="input-kelas.php" method="POST" enctype="multipart/form-data">
          <label class="label">Information Product</label>
          <hr>
          <!-- file upload -->
          <p>Images</p>
          <div class="upload-wrap">
            <div class="uploadpreview 01"></div>
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
            <div class="uploadpreview 02"></div>
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
            <input name="name" class="input" type="text" required>   
          </div>                                                                                                                        
        </div>             
        <div class="field">
        <p>Video Youtube</p>                                                                                                            
          <div class="control">                                                                                                         
            <input name="video" class="input" type="text" required>   
          </div>                                                                                                                        
        </div>  
        <div class="field">
        <p>Lantai</p>                                                                                                            
          <div class="control">
            <div class="select is-primary">
              <select name="lantai" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
          </div>
        </div>
        <div class="field">                                                                                                                                        
          <p>Fasilitas</p>                                                                                                                            
          <div class="control">                                                                                                                                    
            <textarea name="fasilitas" class="textarea" required></textarea>  
          </div>                                                                                                                                                   
        </div>                                                                                                                                                     
        <button type="submit" class="button is-primary">Save Kelas</button>
        </form>
        </div>
       </div><!-- DASH -->
     </main>
                                                                                        
   </div><!--/columns-->                                                                
 </div><!--wrapper-->                                                                   

<?
if(isset($_SESSION['add'])){
  if($_SESSION['add'] === 'success')
    echo "<script>swal('Nice!', 'data berhasil dimasukan', 'success')</script>";
  if($_SESSION['add'] === 'ukuran')
    echo "<script>swal('Upps!', 'ukuran tidak boleh lebih dari 1 mb', 'error')</script>";
  if($_SESSION['add'] === 'extension')
    echo "<script>swal('Upps!', 'extension hanya boleh png dan jpg', 'info')</script>";

  unset($_SESSION['add']);
}
?>
<script src="../js/admin.js"></script>
