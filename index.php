<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
  $mahasiswa = cari ($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halaman Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
</head>
<body class="body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href=""><img src="img/R.png" width="28" height="28"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><div class="home">HOME</div></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah.php"><div class="add">ADD</div></a>
        </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><div class="logout">LOGOUT</div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cetak.php"><div class="cetak">CETAK</div></a>
            </li>
      </ul>
    </div>
  </div>
</nav>

<h1 class="h1">Daftar Mahasiswa</h1>

<form action="" method="POST" class="example">

      <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off" id="keyword">
      <button type="submit" name="cari" id="tombol-cari">Cari!</button>

</form>
<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0" class="table1">


  <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Jurusan</th>
  </tr>

  <?php $i = 1; ?>
  <?php foreach( $mahasiswa as  $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="ubah.php?id=<?= $row["id"]; ?>" class="aksi">ubah</a> |
      <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm ('yakin?');" class="aksi">hapus</a>
    </td>
    <td><img src="img/<?= $row["gambar"]; ?>" width="50" height="50"></td>
    <td><?= $row["nrp"]; ?></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["jurusan"]; ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>

</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>