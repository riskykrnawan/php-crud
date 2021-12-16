<?php 
session_start();
if ( !isset($_SESSION["login"])){
  header('Location: login.php');
  exit;
} 
    require 'functions.php';

    // Ambil Rank dari dari URL
    $Rank = $_GET["Rank"];
    // Query mahasiswa berdasarkan Rank
    $blbuls = query("SELECT * FROM blackbulls WHERE Rank = $Rank")[0];
    
    // Cek apakah tombol sudah ditekan atau belum
    if (isset($_POST["submit"])){

    // Cek apakah data diubah atau tidak
    if(ubah($_POST)> 0):
        echo "
        <script>
        alert('Data Berhasil Diubah');
        document.location.href = 'index.php';
        </script>
        ";
    else:
        $feedback = "Data Gagal Diubah";
        echo mysqli_error($db);
    endif;
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riss</title>
    <link rel="icon" href="img/blackbullspng.png">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-center">
    <form class="form-signin" action="" method="post" enctype="multipart/form-data">
        <?php if (isset($_POST["submit"])):?>
        <h3 class="text-black"><?= $feedback?></h3>
        <?php endif;?>
        <img class="mb-4" src="img/blackbullspng.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-black ">Edit a Member</h1>
        <input type="hidden" name="Rank" value="<?= $blbuls["Rank"]?>">
        <input type="hidden" name="samePicture" value="<?= $blbuls["Picture"]?>">
        <img src="img/<?= $blbuls['Picture']?>" alt="" width=50"> 
        <input type="file" name="Picture" class="form-control" placeholder="Add Picture..." value="<?= $blbuls["Picture"]?>"> 
        <br>
        <input type="text" name="Name" class="form-control" placeholder="Add Name..." required value="<?= $blbuls["Name"]?>">
        <br>
        <input type="number" name="Power" class="form-control" placeholder="Add Power..." required value="<?= $blbuls["Power"]?>">
        <br>
        <input type="text" name="Magic"class="form-control" placeholder="Add Magic..." required value="<?= $blbuls["Magic"]?>">
        <br>
        <input type="text" name="Grimoire" class="form-control" placeholder="Add Grimoire..." required value="<?= $blbuls["Grimoire"]?>">
        <br>
        <input type="text" name="Position" class="form-control" placeholder="Add Position..." required value="<?= $blbuls["Position"]?>">
        <br>
        </div>
        <br>
        <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Edit Member</button>
        <br>
        <p class="mt-5 mb-3 text-muted">&copy;Riss 2020</p>
</body>
</html>