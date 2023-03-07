<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// Ambil data di URL
$id = $_GET["id"];


// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
  
  // cek apakah data berhasil diubah atau tidak
  if( ubah($_POST) > 0 ) {
     echo "
         <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
          </script>
      ";
  } else {
      echo "
       <script>
          alert('data gagal diubah!');
          document.location.href = 'index.php';
       </script>
      ";
  }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ubah data mahasiswa</title>
  <link rel="stylesheet" href="css/ubah.css">
</head>
<body class="body">
  <h1 class="h1">ubah data mahasiswa</h1>

  <form action="" method="POST" enctype="multipart/form-data" class="form">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
    <div class="ubah">
    <ul class="ul">
      <li>
        <label for="nama" class="label">Nama : </label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>" class="input">
      </li>
      <li>
        <label for="nrp" class="label" >NRP : </label>
        <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?> " class="input">
      </li>
      <li>
        <label for="jurusan" class="label" >Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>" class="input">
      </li>
      <li>
        <label for="gambar" class="label" >Gambar : </label><br>
        <img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
        <input type="file" name="gambar" id="gambar" class="img">
      </li>
      <li>
        <button type="submit" name="submit" class="button">Ubah Data!</button>
      </li>
    </ul>
    </div>
  </form>
  
</body>
</html>

