<?
session_start();
if(isset($_SESSION['username']))
  include __DIR__.'/../config/init.php';

if(strpos($_SERVER['REQUEST_URI'],'login.php') == false && $_SESSION['status']!="login" )
  header("location:/pak-wd/login/login.php?pesan=belum_login");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WEB UAS</title>
  <link rel="icon" href="/pak-wd/image/logo.jpg">
  <link rel="stylesheet" href="/pak-wd/css/style.min.css">
  <link rel="stylesheet" href="/pak-wd/fontawesome/css/all.css">
  <script src="/pak-wd/js/sweetalert2.min.js"></script>
</head>
<body>
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item">
      STIKOM BALI
    </a>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="/pak-wd/" class="navbar-item">
        Home
      </a>
      <?
        if(isset($_SESSION['username']) && cekAdmin() == 2){
        echo"<a href='/pak-wd/admin' class='navbar-item'>
          Admin
         </a>";
        }
      ?>
  </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?
            if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
              echo"
              <a href='/pak-wd/login/logout.php' class='button is-light'>
                Log out
              </a>";
            }else{
              echo"
              <a href='/pak-wd/login/login.php' class='button is-primary'>
                Log in
              </a>";
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</nav>
<script src="/pak-wd/js/jquery.min.js"></script>
<script src="/pak-wd/js/bulma.js"></script>
