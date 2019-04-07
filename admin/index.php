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
          <li><a class="is-active" href=""><span class="icon margin-icon"><i class="fas fa-house-damage"></i></span>
 Dashboard</a></li>
          <li><a href="/pak-wd/"><span class="icon margin-icon"><i class="fas fa-arrow-circle-left"></i></span> Home</a></li>
        </ul>
        <p class="menu-label">
          Administration
        </p>
        <ul class="menu-list">
          <li><a href="add.php"><span class="icon margin-icon"><i class="fa
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

       <div class="dash container">
          <h1 class="title is-4 has-text-centered">Data Booking Kelas</h1>
          <div class="box container">
          <table class="table" style="margin-left: auto;margin-right: auto;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Date Booking</th>
                <th>Time Booking</th>
                <th>Lantai</th>
                <th>Duration</th>
                <th>Nim Yang Booking</th>
                <th>Selesai</th>
              </tr>
            </thead>
            <?php
              $result = mysqli_query(conn(),"select * from kelas join users on users.id = kelas.user_id where status='booked'");
              while($kelas = mysqli_fetch_array($result)){
            ?>
            <tbody>
              <tr>
              <th><?=$kelas[0]?></th>
              <td><?=$kelas['name']?></td>
              <td><?=$kelas['date']?></td>
              <td><?=$kelas['time']?> Wita</td>
              <td><?=$kelas['lantai']?></td>
              <td><?=$kelas['duration']?> Jam</td>
              <td><?=$kelas['nim']?></td>
              <td>
              <form action="selesai-kelas.php" method="post">
              <input type="text" name="id" value="<?=$kelas[0]?>" hidden>
              <button type="submit" class="button is-primary">Selesai</button>
              </form>
              </td>
              </tr>
            </tbody>
          <?php }?>
          </table>
          </div><!--BOX-->
       </div>
     </main>
                                                                                        
   </div><!--/columns-->                                                                
 </div><!--wrapper-->                                                                   
<?
if(isset($_SESSION['kelas']) && $_SESSION['kelas'] == true){
  echo "<script>swal('Success!', 'berhasil mengupdate kelas', 'success')</script>";
  unset($_SESSION['kelas']);
}
?>                                                                                        
<script src="../js/admin.js"></script>
