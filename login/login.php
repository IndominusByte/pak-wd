<?include_once("../layouts/header.php");?>
<style>
.hero.is-success {
  background: #F2F6FA;
}
.hero .nav, .hero.is-success .nav {
  -webkit-box-shadow: none;
  box-shadow: none;
}
.box {
  margin-top: 5rem;
}
.avatar {
  margin-top: -70px;
  padding-bottom: 20px;
}
.avatar img {
  padding: 5px;
  background: #fff;
  border-radius: 20%;
  -webkit-box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
  box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
}
</style>
<section class="hero is-success">
<div class="hero-body">
   <div class="container has-text-centered">
     <div class="column is-4 is-offset-4">
       <h3 class="title has-text-grey">Login</h3>
       <p class="subtitle has-text-grey">Please login to proceed.</p>
       <div class="box">
         <figure class="avatar is-128x128">
             <img src="/pak-wd/image/stikom.jpg">
         </figure>
           <form method="post" action="/pak-wd/login/cek_login.php">
             <div class="field">
               <div class="control">
                   <input class="input" type="text" name="nim" placeholder="Nim" autofocus="">
               </div>
             </div>
             <div class="field">
               <div class="control">
                   <input class="input" type="password" name="password" placeholder="Password">
               </div>
             </div>
               <button type="submit" class="button is-block is-info is-fullwidth">Login</button>
           </form>
          <?php
            if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal")
                echo "<script>swal('Upps!', 'nim atau password salah', 'error')</script>";
              if($_GET['pesan'] == "belum_login")
                echo "<script>swal('Upps!', 'kamu harus login dulu!', 'info')</script>";
            }
          ?>
       </div>
     </div>
   </div>
 </div>
</section>

<?include_once("../layouts/footer.php");?>
