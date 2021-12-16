<?php 
    require 'functions.php';
    if (isset($_POST["submit"]) ){
        if (register($_POST) > 0){
            echo "
            <script>
            alert('Registrasi Berhasil!');
            </script>";
        } else {
            echo mysqli_error($db); 
            // echo "<script>
            // alert('Registrasi gagal!');
            // </script>";
        }
    };
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
    <form class="form-signin" action="" method="post">
        <img class="mb-4" src="img/blackbullspng.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-black ">Sign-up</h1>
        <input type="text" name="username" class="form-control" placeholder="Add Username..." required autocomplete="off">
        <br>
        <input type="email" name="email"class="form-control" placeholder="Add E-mail Address..." required autocomplete="off">
        <br>
        <input type="number" name="phonenumber" class="form-control" placeholder="Add Phone Number..." required autocomplete="off">
        <br>
        <input type="password" name="password" class="form-control" placeholder="Add Password..." required autocomplete="off">
        <br>
        <input type="password" name="password2" class="form-control" placeholder="Confirm your Password..." required autocomplete="off">
        <br>
        <p class="text-muted">Sudah memiliki akun?<a href="login.php">Sign-in!</a></p>
        <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Sign-up!</button>
        <p class="mt-5 mb-3 text-muted">&copy;Riss 2020</p>
</body>
</html>