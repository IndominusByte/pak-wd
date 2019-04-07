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
          <li><a href="add.php"><span class="icon margin-icon"><i class="fa
s fa-edit"></i></span> Add Item</a></li>
          <li><a class="is-active"><span class="icon margin-icon"><i class="fa
s fa-desktop"></i></span> Manage Item</a></li>
        </ul>
      </nav>
    </aside>
     <main class="column main">
       <div class="nav-item is-hidden-touch">
         <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
       </div><br>

       <div class="dash">
        <div class="container">
          <div class="columns is-mobile is-multiline">
           <?php
           $result = mysqli_query(conn(),"select * from kelas");
           while($kelas = mysqli_fetch_array($result)){
           ?>
            <div class="column is-half-mobile is-half-tablet is-one-quarter-fullhd is-one-quarter-desktop is-one-quarter-fullhd">
              <div class="card">
                <header class="card-header">
                  <a href="edit-kelas.php?id=<?=$kelas['id']?>" class="card-header-icon">
                    Edit
                  </a>
                  <a class="delete_kelas card-header-icon" data-del="<?=$kelas['id']?>">
                    Delete
                  </a>
                </header>
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="../image/kelas/<?=$kelas['image']?>" alt="Placeholder image">
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
              </div><!-- CARD-->
            </div>
          <?php }?>
          </div>
        </div><!-- CONTAINER -->
       </div><!-- DASH -->
     </main>
                                                                                        
   </div><!--/columns-->                                                                
 </div><!--wrapper-->                                                                   

<script>
$('.delete_kelas').click(function(e){
var id = $(this).data('del');
swal({
  title: "Are you sure to delete?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) { 
   jQuery(document).ready(function(){                                        
       e.preventDefault();                                                   
       $.ajaxSetup({                                                         
          cache: false,                                                      
      });                                                                    
       jQuery.ajax({                                                         
         url: "delete-kelas.php?id="+id,                                           
          method: 'delete',                                                  
          data: {                                                            
             id: $(this).data('del'),                                        
          },                                                                 
          success: function(result){                                         
          if(result['success'] == true){
            swal("Kelas berhasil di delete")
            .then((value) => {
                location.reload();
            });
          }
          }});                                                               
      });
    } 
});

});

</script>
<script src="../js/admin.js"></script>
