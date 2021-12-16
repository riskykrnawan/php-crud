<?php 
    session_start();
    require 'functions.php';

    if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        $result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
        $rows = mysqli_fetch_assoc($result);
        if ($key === hash('sha256', $rows['username'])){
            $_SESSION["login"] = true;

        }
    }

    if ( isset($_SESSION["login"])){
      header('Location: index.php');
      exit;
    } 
    
    if( isset($_POST["submit"]) ){
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        if ( mysqli_num_rows($result) === 1 ){
            $rows = mysqli_fetch_assoc($result);
            if (password_verify($password, $rows["password"])){
                $_SESSION["login"] = true;
                if (isset($_POST["remember"])){
                    setcookie('id', $rows["id"], time()+ 3600);
                    setcookie('key', hash('sha256', $rows["username"]), time()+ 3600);
                };
                header("Location: index.php");
                exit;
            }// else {
                // echo " <script>
                // alert('Password yang anda masukkan salah!')
                // </script>";
           // }
            
        } //else {
            // echo " <script>
            //     alert('Username tidak ditemukan!')
            //     </script>";
        //}
        $error = true;
    };
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
    <form class="form-signin" action="" method="post">
        <img class="mb-4" src="img/blackbullspng.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-black ">Sign-in</h1>
        <input type="text" name="username" class="form-control" placeholder="Username..." required autocomplete="off">
        <br>
        <input type="password" name="password" class="form-control" placeholder="Add Password..." required autocomplete="off"> 
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember">
        <label class="form-check-label" for="flexCheckDefault">
            Remember me!
        </label>
        </div>
        <br>
        
        <?php if (isset($error)): ?>
            <p style="color: red; font-style:italic;">Username / Password salah!</p>
        <?php endif; ?>
        <p class="text-muted">Belum memiliki akun? <a href="registrasi.php">Sign-up!</a></p>
        <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Sign-in!</button>
        <p class="mt-5 mb-3 text-muted">&copy;Riss 2020</p>
        <script src="login.js"></script>
</body>
</html>