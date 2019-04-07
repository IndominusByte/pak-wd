<?include_once("layouts/header.php");?>

<section class="hero">
    <figure class="image">
        <img src="https://stikom-bali.ac.id/act/images/slideshow/jimbaran.jpg">
    </figure>
</section>

<div class="container" style="margin-top:2%;margin-bottom:2%;">
 <p class="title">Lantai 1</p>
 <p class="subtitle is-size-6">A selection of homes verified for quality and design</p>
  <div class="columns is-mobile is-multiline">
<?php 
$result = mysqli_query(conn(),"select * from kelas where status = 'kosong' and lantai = '1'");
while($kelas = mysqli_fetch_array($result)){
?>
<div class="column is-half-mobile is-half-tablet is-one-quarter-fullhd is-one-quarter-desktop is-one-quarter-fullhd">
<a href="show-kelas.php?kelas=<?=$kelas['name']?>">
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
      <img src="image/kelas/<?=$kelas['image']?>" alt="Placeholder image">
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
        <p class="title is-5">Kelas <?=$kelas['name']?></p>
        <p class="subtitle is-6">Lantai <?=$kelas['lantai']?></p>
        </div>
      </div>

      <div class="content">
        Fasilitas : <?=$kelas['fasilitas']?>
      </div>
    </div>
  </div><!-- CARD -->
</a>
</div>
<?php }?>
</div>

 <p class="title">Lantai 2</p>
 <p class="subtitle is-size-6">A selection of homes verified for quality and design</p>
  <div class="columns is-mobile is-multiline">
<?php 
$result = mysqli_query(conn(),"select * from kelas where status = 'kosong' and lantai = '2'");
while($kelas = mysqli_fetch_array($result)){
?>
<div class="column is-half-mobile is-half-tablet is-one-quarter-fullhd is-one-quarter-desktop is-one-quarter-fullhd">
<a href="show-kelas.php?kelas=<?=$kelas['name']?>">
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
      <img src="image/kelas/<?=$kelas['image']?>" alt="Placeholder image">
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
        <p class="title is-5">Kelas <?=$kelas['name']?></p>
        <p class="subtitle is-6">Lantai <?=$kelas['lantai']?></p>
        </div>
      </div>

      <div class="content">
        Fasilitas : <?=$kelas['fasilitas']?>
      </div>
    </div>
  </div><!-- CARD -->
</a>
</div>
<?php }?>
</div>

 <p class="title">Lantai 3</p>
 <p class="subtitle is-size-6">A selection of homes verified for quality and design</p>
  <div class="columns is-mobile is-multiline">
<?php 
$result = mysqli_query(conn(),"select * from kelas where status = 'kosong' and lantai = '3'");
while($kelas = mysqli_fetch_array($result)){
?>
<div class="column is-half-mobile is-half-tablet is-one-quarter-fullhd is-one-quarter-desktop is-one-quarter-fullhd">
<a href="show-kelas.php?kelas=<?=$kelas['name']?>">
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
      <img src="image/kelas/<?=$kelas['image']?>" alt="Placeholder image">
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
        <p class="title is-5">Kelas <?=$kelas['name']?></p>
        <p class="subtitle is-6">Lantai <?=$kelas['lantai']?></p>
        </div>
      </div>

      <div class="content">
        Fasilitas : <?=$kelas['fasilitas']?>
      </div>
    </div>
  </div><!-- CARD -->
</a>
</div>
<?php }?>
</div>

 <p class="title">Lantai 4</p>
 <p class="subtitle is-size-6">A selection of homes verified for quality and design</p>
  <div class="columns is-mobile is-multiline">
<?php 
$result = mysqli_query(conn(),"select * from kelas where status = 'kosong' and lantai = '4'");
while($kelas = mysqli_fetch_array($result)){
?>
<div class="column is-half-mobile is-half-tablet is-one-quarter-fullhd is-one-quarter-desktop is-one-quarter-fullhd">
<a href="show-kelas.php?kelas=<?=$kelas['name']?>">
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
      <img src="image/kelas/<?=$kelas['image']?>" alt="Placeholder image">
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
        <p class="title is-5">Kelas <?=$kelas['name']?></p>
        <p class="subtitle is-6">Lantai <?=$kelas['lantai']?></p>
        </div>
      </div>

      <div class="content">
        Fasilitas : <?=$kelas['fasilitas']?>
      </div>
    </div>
  </div><!-- CARD -->
</a>
</div>
<?php }?>
</div>

</div>

<?include_once("layouts/footer.php");?>
