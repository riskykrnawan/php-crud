<?php
    session_start();
    if ( !isset($_SESSION["login"])){
      header('Location: login.php');
      exit;
    } 
    require 'functions.php';
    
    #Ambil data dari tabel yang ada didalam database
    
      
    if(isset ($_GET["search"])){
        $blbuls = cariData($_GET["search"]);
        $jumlahData = count(cari($_GET["search"])) > 0 ?  count(cari($_GET["search"])) : 0;
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    } else {
      $blbuls = query("SELECT * FROM blackbulls ORDER BY Power DESC LIMIT $dataAwal, $jumlahDataPerHalaman");
      $jumlahData = count(query("SELECT * FROM blackbulls"));
      $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    };
?>



<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    
    <title>Black Clover</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    
    <!-- Bootstrap core CSS -->
<link href="bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="blackclover.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php">Black Clover</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="w-100" action="" method="get">
  <?php if ( isset($_GET['search'])): ?>
    <input class="form-control form-control-dark" type="text" placeholder="Search..." name="search" aria-label="Search Keyword" autofocus autocomplete="off" value="<?= $_GET['search'] ?>" id="search">
  <?php else: ?>
    <input class="form-control form-control-dark" type="text" placeholder="Search..." name="search" aria-label="Search Keyword" autofocus autocomplete="off" id="search">
  <?php endif; ?>
  </form>
  
  <ul class="navbar-nav px-3">
    <li>
    <i class="bi bi-person-circle"></i>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php"><?= $circlePerson?> Sign out</a>
    </li>
  </ul>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span><?= $clover ?></span>
              Clover Kingdom
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <span><?= $heart ?></span>
              Heart Kingdom
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <span><?= $diamond ?></span>
              Diamond Kingdom
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <span><?= $spade ?></span>
              Spade Kingdom
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <h2>Black Bulls Members</h2>
      <a href="tambah.php"> <?= $addPerson ?> Tambah Member</a>
      <br><br>    
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Action</th>
              <th>Picture</th>
              <th>Name</th>
              <th>Power</th>
              <th>Magic</th>
              <th>Grimoire</th>
              <th>Position</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 1;?>
          <?php foreach ($blbuls as $row): ?>
            <tr>
              <td><?= ($jumlahDataPerHalaman * $halamanAktif) + $i - $jumlahDataPerHalaman;?></td>
              <td><a href="ubah.php?Rank=<?= $row["Rank"]?>">Edit</a> || <a href="hapus.php?Rank=<?= $row["Rank"]?>" onclick = "return confirm('Apakah anda ingin menghapus File?')">Delete</a></td>
              <td><img src="img/<?= $row["Picture"]?>" alt="" width="50px"></td>
              <td><?= $row["Name"]?></td>
              <td><?= $row["Power"]?></td>
              <td><?= $row["Magic"]?></td>
              <td><?= $row["Grimoire"]?></td>
              <td><?= $row["Position"]?></td>
              </tr>
              <?php $i++; ?>
          <?php endforeach;?>
          <tr>
          <?php if(count($blbuls) === 0) : ?>
            <h2 class="featurette-heading">Data tidak ditemukan!</h2> <a class="text-muted" href="index.php"><?= $house ?>Kembali ke Halaman Utama</a>
            <?php endif; ?>
          </tr>  
          </tbody>
        </table>
      </div>


      <nav aria-label="Page navigation example">
          <ul class="pagination">
          <?php 
          $search = isset($_GET['search']) ? '&search='.$_GET['search'] : '' ;
          ?>
          <!-- Previous -->
          <?php if ($halamanAktif > 1) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif-1 ?><?= $search?>">Previous</a></li>          
          <?php endif; ?>

            <!-- Number -->
          <?php for ($i = 1; $i<= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
              <li class="page-item disabled"><span class="page-link"><?= $i ?></span></li>
            <?php else :  ?>
              <li class="page-item"><a href="?page=<?= $i ?><?= $search?>" class="page-link"><?= $i ?></a></li>
              <?php endif; ?>
          <?php endfor; ?>

          <!-- Next -->
          <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif+1 ?><?= $search?>">Next</a></li>           
          <?php endif; ?>

          </ul>
        </nav>
    </main>
  </div>
</div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="bootstrap-4.5.3-dist/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="js/blackclover.js"></script></body>
</html>