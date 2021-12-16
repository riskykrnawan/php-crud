<?php 
session_start();
if ( !isset($_SESSION["login"])){
  header('Location: login.php');
  exit;
} 
    require 'functions.php';
    // Cek apakah tombol sudah ditekan atau belum
    if (isset($_POST["submit"])){
        // Cek apakah data ditambahkan atau tidak
        if(tambah($_POST)> 0):
            echo "
            <script>
            alert('Data Berhasil dikirim');
            document.location.href = 'index.php';
            </script>
            ";
        else:
            $feedback = "Data Gagal Dikirim";
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
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-center">
    <form class="form-signin" action="" method="post" enctype="multipart/form-data">
        <?php if (isset($_POST["submit"])):?>
        <h3 class="text-black"><?= $feedback?></h3>
        <?php endif;?>
        <img class="mb-4" src="img/blackbullspng.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-black ">Add a Member</h1>
        <input type="file" name="Picture" class="form-control" placeholder="Add Picture..." required>
        <br>
        <input type="text" name="Name" class="form-control" placeholder="Add Name..." required autocomplete="off">
        <br>
        <input type="number" name="Power" class="form-control" placeholder="Add Power..." required autocomplete="off">
        <br>
        <input type="text" name="Magic"class="form-control" placeholder="Add Magic..." required autocomplete="off">
        <br>
        <input type="text" name="Grimoire" class="form-control" placeholder="Add Grimoire..." required autocomplete="off">
        <br>
        <input type="text" name="Position" class="form-control" placeholder="Add Position..." required autocomplete="off">
        <br>
        </div>
        <br>
        <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Add Member</button>
        <br>
        <p class="mt-5 mb-3 text-muted">&copy;Riss 2020</p>
</body>
</html>