<?php
session_start();
if ( !isset($_SESSION["login"])){
  header('Location: login.php');
  exit;
} 
require 'functions.php';
$rank = $_GET["Rank"];                                          //  Tangkap Rank dari URL
if (hapus($rank) > 0):
    echo "
        <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'index.php';
        </script>
    ";
else:
    echo "
        <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'index.php';
        </script>
        ";
endif;
?>