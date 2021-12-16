<?php 
    require '../functions.php';

    $search = $_GET['search'];
    $blbuls = cariData($_GET["search"]);
    $jumlahData = count(cari($_GET["search"])) > 0 ?  count(cari($_GET["search"])) : 0;
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $blackbulls = cari($search)

?>

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
      </div>
          </ul>
        </nav>
    </main>
  </div>