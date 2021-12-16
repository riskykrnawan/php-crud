<?php
// Connect ke Database
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// Ambil semua data yang berada di tabel
function query($query){                             //  query("SELECT * FROM blackbulls"); (Contoh Pengambilan data dari tabel query)
    global $db;                                     //  Variable Scope  
    $result = mysqli_query($db, $query);            //  $result ibarat Lemari, (mysqli_query(Sambung ke database, lalu Lakukan $query))
    $rows = [];                                     //  $rows ibarat Keranjang kosong
    while ($row = mysqli_fetch_assoc($result)){     //  Baju yang diambil setiap looping nya
        $rows[] = $row;                             //  Setelah itu Masukkan Ke keranjang
    }                                               //  Kembalikan Isi dari keranjangnya
    return $rows;
}
//                                                  Maksud dibuatnya fungsi query adalah agar user tidak perlu membawa lemarinya


// Pagination sebelum data ditampilkan
      
$jumlahDataPerHalaman = 10;
$halamanAktif = (isset($_GET['page'])) ?  $_GET['page'] :  1; 
$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;




function tambah($data){                                                     //  Fungsi Tambah data (DATA DIDAPAT DARI POST) Dikirim Ke Function, Ditangkap oleh $data              
    global $db;                                                             //  Variable Scope
    $Picture = upload();                                                    //  Ambil data dari tiap elemen dalam form
    if (!$Picture) {
        return false;
    }
    $Name = htmlspecialchars($data["Name"]);                                //  Buat variabel yang isinya sama dengan index
    $Power = htmlspecialchars($data["Power"]);                              //  htmlspecialchars agar data yang dimasukkan tidak bisa menampilkan elemen html
    $Magic = htmlspecialchars($data["Magic"]);                              //
    $Grimoire = htmlspecialchars($data["Grimoire"]);                        //  
    $Position = htmlspecialchars($data["Position"]);                        //
    $query = "INSERT INTO `blackbulls`                                      
    (`Picture`, `Name`, `Power`, `Magic`, `Grimoire`, `Position`)           
    VALUES 
    ('$Picture', '$Name', '$Power', '$Magic', '$Grimoire', '$Position')
    ";                                                                       //  Masukkan datanya kedalam Lemari, (Petik disamping angka 1).
    mysqli_query($db, $query);                                               //  Sambung Ke database, lalu Lakukan $query

    return (mysqli_affected_rows($db));                                      //  Kembalikan, pesan 1 / -1
}

function upload(){
    $nameFile = $_FILES["Picture"]["name"];
    $sizeFile = $_FILES["Picture"]["size"];
    $errorFile = $_FILES["Picture"]["error"];
    $tmpFile = $_FILES["Picture"]["tmp_name"];
    
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);              //  Pecah, dan batasi dengan delimiter
    $ekstensiGambar = strtolower(end($ekstensiGambar));     //  Ambil string akhir dari ekstensi gambar, lalu ubah menjadi huruf kecil
    if (in_array($ekstensiGambar, $ekstensiGambarValid) === False){   //  cari apakah ekstensi ada didalam array, in_array(jarum, jerami)
        echo " <script>
                alert('Yang anda upload bukan gambar!');
                </script>";
        return false;
    }
    if ($sizeFile > 2000000){                                         //  cek ukuran file
        echo " <script>
        alert('Ukuran melebihi batas!');
        </script>"; 
        return false;
    }

    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $ekstensiGambar;

    
    move_uploaded_file($tmpFile, 'img/' . $nameFileBaru);
    return $nameFileBaru;
}

// $rank = $_GET["Rank"];                                          //  Tangkap Rank dari URL (Dilakukan di hapus.php)

function hapus($rank){                                          //  Fungsi Hapus data (DATA DIDAPAT DARI POST)
    global $db;                                                 //  Variable Scope
    $query = "DELETE FROM blackbulls WHERE Rank = $rank";       //  Hapus data dari Lemari
    mysqli_query($db, $query);                                  //  Sambung ke Database lalu lakukan query              

    return (mysqli_affected_rows($db));                         //  Kembalikan, pesan 1 /  -1
}


function ubah ($data){                                                          //  Fungsi Ubah data
    global $db, $Rank;                                                          //  Variabel Scope
    $Rank = $data["Rank"];                                                      //  Buat Variabel yang menjadi primary key untuk membedakan satu sama lain
    $samePicture = htmlspecialchars($data["samePicture"]);

    if ($_FILES ['Picture']['error'] === 4){
        $Picture =  $samePicture;   
    } else {
        $Picture = upload();                                                    //
    }
    $Name = htmlspecialchars($data["Name"]);                                    //
    $Power = htmlspecialchars($data["Power"]);                                  //
    $Magic = htmlspecialchars($data["Magic"]);                                  //
    $Grimoire = htmlspecialchars($data["Grimoire"]);                            //
    $Position = htmlspecialchars($data["Position"]);                            //

    $query = "UPDATE blackbulls SET
                Picture = '$Picture',
                Name = '$Name',
                Power = $Power,
                Magic = '$Magic',
                Grimoire = '$Grimoire',
                Position = '$Position'
                WHERE Rank = $Rank
                ";                                                              //  Update isi data dari Lemari
    mysqli_query($db, $query);                                                  //  Sambungkan ke Database, lalu lakukan Query    

    return (mysqli_affected_rows($db));                                         //  Kembalikan 1 / -1
}




function cari($keyword){                              //  Contoh variabel baru bernama keyword
    $query = "SELECT * FROM blackbulls
             WHERE
             Name LIKE '%$keyword%' OR
             Power LIKE '%$keyword%' OR
             Magic LIKE '%$keyword%' OR
             Position LIKE '%$keyword%' ORDER BY Power
    ";                                                //  %$keyword, sama dari arah kanan, $keyword% kiri, %$keyword% kiri dan kanan
    return query($query);                             //  Kembalikan $query, lalu jalankan fungsi query
}


function cariData($keyword){                              //  Contoh variabel baru bernama keyword
     
    global $jumlahDataPerHalaman, $dataAwal;
    $query = "SELECT * FROM blackbulls
             WHERE
             Name LIKE '%$keyword%' OR
             Power LIKE '%$keyword%' OR
             Magic LIKE '%$keyword%' OR
             Position LIKE '%$keyword%' ORDER BY Power DESC LIMIT $dataAwal, $jumlahDataPerHalaman
    ";                                                //  %$keyword, sama dari arah kanan, $keyword% kiri, %$keyword% kiri dan kanan
    return query($query);                             //  Kembalikan $query, lalu jalankan fungsi query
}

function register($data){
    global $db;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $email = $data["email"];
    $phoneNumber = $data["phonenumber"];

    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username telah digunakan')
        </script>";
        return false;
    } 

    if ($password !== $password2) {
        echo "<script>
            alert('Password Konfirmasi salah')
        </script>";
        return false;
    };

    // Enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO users VALUES ('', '$username', '$password', '$email', '$phoneNumber')");
    return (mysqli_affected_rows($db));   
};





$clover = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-club-fill" viewBox="0 0 16 16">
<path d="M11.5 12.5a3.493 3.493 0 0 1-2.684-1.254 19.92 19.92 0 0 0 1.582 2.907c.231.35-.02.847-.438.847H6.04c-.419 0-.67-.497-.438-.847a19.919 19.919 0 0 0 1.582-2.907 3.5 3.5 0 1 1-2.538-5.743 3.5 3.5 0 1 1 6.708 0A3.5 3.5 0 1 1 11.5 12.5z"/>
</svg>';
$heart = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
<path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
</svg>';
$spade = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-spade-fill" viewBox="0 0 16 16">
<path d="M7.184 11.246A3.5 3.5 0 0 1 1 9c0-1.602 1.14-2.633 2.66-4.008C4.986 3.792 6.602 2.33 8 0c1.398 2.33 3.014 3.792 4.34 4.992C13.86 6.367 15 7.398 15 9a3.5 3.5 0 0 1-6.184 2.246 19.92 19.92 0 0 0 1.582 2.907c.231.35-.02.847-.438.847H6.04c-.419 0-.67-.497-.438-.847a19.919 19.919 0 0 0 1.582-2.907z"/>
</svg>';
$diamond = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-diamond-fill" viewBox="0 0 16 16">
<path d="M2.45 7.4L7.2 1.067a1 1 0 0 1 1.6 0L13.55 7.4a1 1 0 0 1 0 1.2L8.8 14.933a1 1 0 0 1-1.6 0L2.45 8.6a1 1 0 0 1 0-1.2z"/>
</svg>';
$house = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>';
$addPerson = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>';
$circlePerson = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>';



















?>


