<?include_once("layouts/header.php");?>
<?php 
if(!isset($_GET['kelas']) || $_GET['kelas'] == null)
  header("Location: /pak-wd/");
$kelas = $_GET['kelas'];
$result = mysqli_query(conn(),"select * from kelas where name='$kelas' limit 1");
$row = mysqli_fetch_object($result);
if($row->status === "booked")
  header("Location: /pak-wd/");

preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $row->video, $matches);
$video = $matches[1];
?>
<link rel="stylesheet" href="css/show-kelas.css">
<link rel="stylesheet" href="css/pickadate.04.inline-fixed.css">
<link rel="stylesheet" href="css/time-picker/classic.css">
<link rel="stylesheet" href="css/time-picker/classic.time.css">

<div class="container" style="margin-top:2%;">
<nav class="breadcrumb" aria-label="breadcrumbs">
  <ul>
    <li><a href="/pak-wd/">All Class</a></li>
    <li><a href="#">Lantai <?=$row->lantai?></a></li>
    <li class="is-active"><a href="#" aria-current="page">Kelas <?=$row->name?></a></li>
  </ul>
</nav>

<div class="columns">
  <div class="column">
 <span class="zoom" id="ex1">
  <img class="big-image" src="image/kelas/<?=$row->image?>">
 </span>

     <div id="thumbs">                                                                                
         <img class="thumb" src="image/kelas/<?=$row->image?>" alt="" />     
         <img class="thumb" src="image/kelas/<?=$row->image2?>" alt="" />     
         <img class="thumb-play" src="image/play.png" alt="" />                      
   </div>                                                                                         
   <!-- POPUP YOUTUBE -->                                                                                                    
   <div class="modal" id="modal_youtube">                                                                                    
     <div class="modal-background"></div>                                                                                    
     <div class="modal-content">                                                                                             
       <iframe class="youtube-video" width="100%" height="500"                                                               
       src="https://youtube.com/embed/<?=$video?>?enablejsapi=1&version=3&playerapiid=ytplayer" allowfullscreen></iframe>    
     </div>                                                                                                                  
     <button class="modal-close is-large" aria-label="close"></button>                                                       
   </div>                                                                                                                    
   <!-- POPUP YOUTUBE -->                                                                                                    

  </div>
  <div class="column">
  <p class="is-size-3">Kelas <?=$row->name?></p>
  <p class="is-size-4">Lantai <?=$row->lantai?></p>
    <hr>
    <div class="content">
      <h5>Date : </h5>
      <input class="input is-medium" id="picker_inline_fixed" type="text" readonly>
      <br>
      <h5>Time : </h5>
      <input class="input is-medium" id="timepicker" type="text" readonly>
    </div><!--CONTENT-->
    <div class="field">
    <h4 style="font-size: 1.125em;color: #363636;font-weight: 600;line-height: 1.125;margin-bottom: .8888em; */">Duration</h4>
      <p class="control has-icons-left">
        <span class="select">
          <select id="duration">
            <option value="" selected>Durasi Meminjam Kelas</option>
            <option value="1">1 Jam</option>
            <option value="2">2 Jam</option>
            <option value="3">3 Jam</option>
          </select>
        </span>
        <span class="icon is-small is-left">
          <i class="fas fa-clock"></i>
        </span>
      </p>
    </div>
    <br>
   <form>
    <input type="hidden" name="id" id="id" value="<?=$row->id?>">
    <input type="hidden" name="date" id="date" value=""/>
    <input type="hidden" name="current_date" id="current_date" value=""/>
    <input type="hidden" name="time" id="time" value=""/>
    <input type="hidden" name="current_time" id="current_time" value=""/>
    <button type="submit" id="booking" class="button is-dark is-medium">Booking Kelas</button>
  </form>

  </div>
</div>

<div class="tabs is-boxed">
  <ul>
    <li class="is-active">
      <a>
        <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>
        <span>Pictures</span>
      </a>
    </li>
  </ul>
</div>
<div class="box">
  <article class="media">
    <div class="media-content">
      <div class="content">
        <p>
          <strong>Fasilitas</strong>
          <br>
            <?=$row->fasilitas?>
        </p>
      </div>
    </div>
  </article>
</div>
</div>
<br>
<script src="js/time-picker/picker.js"></script>
<script src="js/time-picker/picker.time.js"></script>
<script src="js/pickadate.min.js"></script>
<script src="js/picker.js"></script>
<script>
jQuery(document).ready(function(){
 jQuery('#booking').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
       cache: false,
   });
    jQuery.ajax({
      url: "booking.php",
       method: 'post',
       data: {
         id: $("#id").val(),
         date: $("#date").val(),
         current_date: $("#current_date").val(),
         time: $("#time").val(),                                                
         current_time: $("#current_time").val(),
         duration: $('#duration option:selected').val(),
       },
       success: function(result){
         if(result['success'] == false)
           swal("Upss!", "duration masih kosong", "info");
         else{
          swal("Berhasil!","Boking berhasil di buat, tunggu admin menghubungi anda","success")
          .then((value) => {
              window.location.href = "/pak-wd/";
          });
         }
    }});
 });
});

</script>
<script src="js/zoom.min.js"></script>
<script src="js/zoomimg.js"></script>
<?include_once("layouts/footer.php");?>
