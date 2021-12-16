# PHP CRUD Dasar


### Hasil Latihan Pemrograman Web PHP Dasar

 - Tema: Black Clover
 - Menggunakan: 
  1. HTML 
  2. CSS
  3. Javascript
  4. AJAX
  5. PHP
  6. MySQL
  7. Bootstrap




## Fitur Dari Program:

| Fitur                        | Ket.           |
| ---------------------------- |:--------------:| 
| Create                       | ✔              |
| Update                       | ✔              |
| Delete                       | ✔              |
| System Login & Registrasi    | ✔              |
| Enkripsi Password            | ✔              |
| Sorting                      | ✔              |
| Searching                    | ✔              |
| MVC                          | ❌             |





## Tampilan Aplikasi CRUD: 

![Tampilan Aplikasi CRUD](https://github.com/riskykrnawan/php-crud/blob/main/img/example_app.png "Tampilan Aplikasi CRUD")








## Cara Penggunaan Aplikasi Berbasis Web ini

### Langkah 1:

  1. Download Telebih dahulu XAMPP/WAMP/MAMP (Pilih Salah Satu yang sesuai dengan sistem operasi, Rekomendasi: **XAMPP**) [Download XAMPP](https://www.apachefriends.org/download.html)

  2. Lakukan Penginstalan seperti biasa.
  3. Buka Aplikasi **XAMPP**
  4. Nyalakan **Apache** & **MySQL**
  5. Buka Browser & Pergi ke alamat URL _`localhost/phpmyadmin`_

___


### Langkah 2:

  1. Download Seluruh file yang ada di repostory ini (Bisa download Zip maupun menggunakan git clone). 
  
  `git clone https://github.com/riskykrnawan/php-crud.git`
  
  2. Extract zip (Jika anda mendownload menggunakan zip).

___


### Langkah 3:

  1. Buat Database Baru, dengan cara mengklik **New** pada **phpmyadmin**
  2. Beri nama **_phpdasar_** di Database Terbaru tadi.
  3. Import `phpdasar.sql` yang sudah anda download tadi kedalam database yang baru anda buat.

  Jika anda memberi nama database selain **phpdasar**, maka akan terjadi error,
  untuk mengatasinya, anda harus melakukan sedikit perubahan di file `function.php`

    
  ```$db = mysqli_connect("localhost", "root", "", "<Ubah ini sesuai nama database anda>"); ```
    

___


### Langkah 4: 

  1. Bukalah File Explorer.
  2. Pindahkan Folder yang anda download tadi kedalam folder `htdocs`.
  3. Buka kembali browser, lalu ketik ini `http://localhost/<Sesuaikan dengan nama folder didalam htdocs>`.
  4. Selesai. Silahkan Lakukan Registrasi jika ingin memulai programnya.


Lokasi folder htdocs tergantung dimana anda meletakkan tempat penginstallan xampp.
`C:\xampp\htdocs`

Jika saya memberi nama folder saya `php-crud-main`

Maka saya akan mengetik :
`http://localhost/php-crud-main` di URL Browser
