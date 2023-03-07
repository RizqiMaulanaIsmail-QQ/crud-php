<?php
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa
            WHERE
          nama LIKE '%$keyword%' OR
          nrp LIKE '%$keyword%' OR
          jurusan LIKE '%$keyword%'
          ";
$mahasiswa = query($query);
?>
 <link rel="stylesheet" href="css/index.css">
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
    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm ('yakin?');">hapus</a>
  </td>
  <td><img src="img/<?= $row["gambar"]; ?>" width="50" height="50"></td>
  <td><?= $row["nrp"]; ?></td>
  <td><?= $row["nama"]; ?></td>
  <td><?= $row["jurusan"]; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>