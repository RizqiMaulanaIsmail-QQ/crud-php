<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

  
  // cek apakah data berhasil di tambahkan atau tidak
  if( tambah($_POST) > 0 ) {
     echo "
         <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>
      ";
  } else {
      echo "
       <script>
          alert('data gagal ditambahkan!');
          document.location.href = 'index.php';
       </script>
      ";
  }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah data mahasiswa</title>
  <link rel="stylesheet" href="css/tambah.css">
</head>
<body class="body">
  <h1 class="h1">Tambah data mahasiswa</h1>

  <form action="" method="POST" enctype="multipart/form-data" class="form">
    <div class="tambah">
    <ul class="ul">
      <li>
        <label for="nama" class="label">Nama : </label>
        <input type="text" name="nama" id="nama" class="input" >
      </li>
      <li>
        <label for="nrp" class="label">NRP : </label>
        <input type="text" name="nrp" id="nrp" required class="input">
      </li>
      <li>
        <label for="jurusan" class="label">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" class="input">
      </li>
      <li>
        <label for="gambar" class="label">Gambar : </label>
        <input type="file" name="gambar" id="gambar" class="img">
      </li>
      <br>
      <li>
        <button type="submit" name="submit" class="button">Tambah Data!</button>
      </li>
      <br>
    </ul>
    </div>

  </form>
  
</body>
</html>




